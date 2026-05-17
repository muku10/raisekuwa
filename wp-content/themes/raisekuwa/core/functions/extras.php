<?php
/**
 * Misc helpers — uploads, srcset HTTPS, single-product description placement,
 * thumbnail sizing, and the same-page category filter.
 *
 * @package nepalkochino
 */

if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Allow SVG uploads from the media library.
 */
add_filter( 'upload_mimes', function ( $mimes ) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
} );

/**
 * Use the long description in the single-product summary instead of the short
 * description, then drop the duplicate Description tab below.
 */
add_action( 'init', function () {
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
	add_action( 'woocommerce_single_product_summary', 'nkc_single_product_long_description', 20 );
}, 20 );

function nkc_single_product_long_description() {
	global $product;
	if ( ! $product ) return;
	$description = $product->get_description();
	if ( ! $description ) return;
	echo '<div class="woocommerce-product-details__short-description">';
	echo apply_filters( 'the_content', $description );
	echo '</div>';
}

add_filter( 'woocommerce_product_tabs', function ( $tabs ) {
	unset( $tabs['description'] );
	return $tabs;
}, 99 );

/**
 * Restrict "Related products" to same category only (default also matches tags).
 */
add_filter( 'woocommerce_product_related_posts_relate_by_tag', '__return_false' );

/**
 * Buy now — submit the add-to-cart form with `nkc_buy_now=1` and we redirect
 * to checkout instead of staying on the product page.
 */
add_filter( 'woocommerce_add_to_cart_redirect', function ( $url ) {
	if ( ! empty( $_REQUEST['nkc_buy_now'] ) ) {
		return wc_get_checkout_url();
	}
	return $url;
} );

/**
 * Force HTTPS on srcset and src image URLs to prevent mixed-content blocking.
 */
add_filter( 'wp_calculate_image_srcset', function ( $sources ) {
	if ( ! is_ssl() || ! is_array( $sources ) ) return $sources;
	foreach ( $sources as $key => $source ) {
		if ( isset( $source['url'] ) && strpos( $source['url'], 'http://' ) === 0 ) {
			$sources[ $key ]['url'] = str_replace( 'http://', 'https://', $source['url'] );
		}
	}
	return $sources;
}, 99 );

add_filter( 'wp_get_attachment_image_src', function ( $image ) {
	if ( ! is_ssl() || ! is_array( $image ) ) return $image;
	if ( isset( $image[0] ) && strpos( $image[0], 'http://' ) === 0 ) {
		$image[0] = str_replace( 'http://', 'https://', $image[0] );
	}
	return $image;
}, 99 );

/**
 * Tighter WooCommerce thumbnail sizes — portrait product cards.
 */
add_action( 'after_setup_theme', function () {
	add_theme_support( 'woocommerce', array(
		'thumbnail_image_width'         => 600,
		'gallery_thumbnail_image_width' => 120,
		'single_image_width'            => 900,
	) );
}, 20 );

/**
 * Drop inline width/height on shop loop images so CSS aspect-ratio takes over.
 */
add_filter( 'wp_get_attachment_image_attributes', function ( $attr ) {
	if ( is_shop() || is_product_category() || is_product_tag() || is_front_page() ) {
		unset( $attr['width'] );
		unset( $attr['height'] );
	}
	return $attr;
}, 10 );

/**
 * Shop archive filters — `?filter_cat[]=ID` narrows by category, `?max_price`
 * narrows by price ceiling. The category filter runs on `pre_get_posts` at
 * priority 20 (after WC's own pre_get_posts at priority 10) so by the time we
 * fire the query is already typed as `post_type=product` and our tax_query
 * addition sticks. Price clauses run via `posts_clauses` since price lives in
 * postmeta and needs a JOIN/WHERE pair.
 */
add_action( 'pre_get_posts', function ( $q ) {
	if ( is_admin() || ! $q->is_main_query() ) return;

	$post_type = (array) $q->get( 'post_type' );
	if ( ! in_array( 'product', $post_type, true ) ) return;

	if ( ! empty( $_GET['filter_cat'] ) ) {
		$cat_ids = array_filter( array_map( 'absint', (array) $_GET['filter_cat'] ) );
		if ( ! empty( $cat_ids ) ) {
			$tax_query = $q->get( 'tax_query' );
			if ( ! is_array( $tax_query ) ) $tax_query = array();
			$tax_query[] = array(
				'taxonomy' => 'product_cat',
				'field'    => 'term_id',
				'terms'    => $cat_ids,
				'operator' => 'IN',
			);
			$q->set( 'tax_query', $tax_query );
		}
	}
}, 20 );

add_filter( 'posts_clauses', function ( $clauses, $query ) {
	if ( is_admin() || ! $query->is_main_query() ) return $clauses;
	$post_type = (array) $query->get( 'post_type' );
	if ( ! in_array( 'product', $post_type, true ) ) return $clauses;

	$max = isset( $_GET['max_price'] ) ? floatval( $_GET['max_price'] ) : null;
	if ( ! $max || $max <= 0 ) return $clauses;

	global $wpdb;
	$clauses['join']    .= " INNER JOIN {$wpdb->postmeta} nkc_pm ON nkc_pm.post_id = {$wpdb->posts}.ID AND nkc_pm.meta_key = '_price' ";
	$clauses['where']   .= $wpdb->prepare( ' AND CAST(nkc_pm.meta_value AS DECIMAL(20,2)) <= %f ', $max );
	$clauses['groupby']  = "{$wpdb->posts}.ID";

	return $clauses;
}, 10, 2 );

/**
 * Highest published product price — used as the slider ceiling on the shop
 * archive. Cached in a transient since most stores rarely change top price.
 */
function nkc_max_product_price() {
	$cached = get_transient( 'nkc_max_product_price' );
	if ( $cached !== false ) return (int) $cached;

	global $wpdb;
	$max = (float) $wpdb->get_var( "SELECT MAX(CAST(meta_value AS DECIMAL(20,2))) FROM {$wpdb->postmeta} WHERE meta_key = '_price' AND meta_value > 0" );
	$max = $max > 0 ? (int) ceil( $max ) : 1000;

	set_transient( 'nkc_max_product_price', $max, HOUR_IN_SECONDS );
	return $max;
}

// Bust the cache when a product is saved/deleted.
add_action( 'save_post_product',   function () { delete_transient( 'nkc_max_product_price' ); } );
add_action( 'deleted_post',        function () { delete_transient( 'nkc_max_product_price' ); } );
