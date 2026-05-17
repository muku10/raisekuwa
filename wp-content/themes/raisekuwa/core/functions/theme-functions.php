<?php
/**
 * Functions which enhance the theme by hooking into WordPress.
 *
 * @package raisekuwa
 */

if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Meta tags injected into <head>.
 */
if ( ! function_exists( 'raisekuwa_add_meta' ) ) :
	function raisekuwa_add_meta() {
		echo '<meta name="geo.placename" content="Southport, Queensland, Australia">';
		echo '<meta name="geo.region" content="AU-QLD">';
	}
endif;
add_action( 'wp_head', 'raisekuwa_add_meta' );

/**
 * Favicons.
 */
if ( ! function_exists( 'raisekuwa_add_links' ) ) :
	function raisekuwa_add_links() {
		$base = esc_url( get_stylesheet_directory_uri() );
		?>
		<link rel="icon" type="image/png" href="<?php echo $base; ?>/assets/images/logo-Cnuh_jvp.png" />
		<link rel="apple-touch-icon" href="<?php echo $base; ?>/assets/images/logo-Cnuh_jvp.png">
		<?php
	}
endif;
add_action( 'wp_head', 'raisekuwa_add_links' );

/**
 * Hide admin bar for non-admins.
 */
if ( ! current_user_can( 'administrator' ) ) {
	add_filter( 'show_admin_bar', '__return_false' );
}

/**
 * Sale / Sold-out badge after the price on the single product page.
 */
add_filter( 'woocommerce_get_price_html', function ( $price_html, $product ) {
	if ( is_product() ) {
		if ( ! $product->is_in_stock() ) {
			$price_html .= ' <span class="nkc-sale-badge nkc-badge-soldout-inline">' . esc_html__( 'Sold out', 'nepalkochino' ) . '</span>';
		} elseif ( $product->is_on_sale() ) {
			$price_html .= ' <span class="nkc-sale-badge">' . esc_html__( 'Sale', 'nepalkochino' ) . '</span>';
		}
	}
	return $price_html;
}, 10, 2 );

/**
 * Suppress the default WooCommerce sale flash — our card template handles badges.
 */
add_filter( 'woocommerce_sale_flash', '__return_empty_string' );

/**
 * Hide product meta (SKU, categories, tags) on the single product page.
 */
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );

/**
 * Friendlier related-products heading.
 */
add_filter( 'woocommerce_product_related_products_heading', function () {
	return __( 'You may also like', 'nepalkochino' );
} );

/**
 * Hide stock display text ("X in stock", "Out of stock").
 */
add_filter( 'woocommerce_get_stock_html', '__return_empty_string' );

/**
 * Drop the Additional Information tab.
 */
add_filter( 'woocommerce_product_tabs', function ( $tabs ) {
	unset( $tabs['additional_information'] );
	return $tabs;
} );

/**
 * Convert variation dropdowns to pill/button selectors.
 */
add_filter( 'woocommerce_dropdown_variation_attribute_options_html', function ( $html, $args ) {
	$options   = $args['options'];
	$attribute = $args['attribute'];
	$selected  = isset( $args['selected'] ) ? $args['selected'] : '';

	$attr_name = isset( $args['name'] ) ? $args['name'] : 'attribute_' . sanitize_title( $attribute );

	if ( empty( $options ) ) return $html;

	$hidden_select = preg_replace( '/<select /', '<select style="display:none !important;position:absolute;" ', $html, 1 );

	$pills = '<div class="nkc-variation-pills" data-select-name="' . esc_attr( $attr_name ) . '">';
	foreach ( $options as $option ) {
		$label = $option;
		if ( taxonomy_exists( $attribute ) ) {
			$term = get_term_by( 'slug', $option, $attribute );
			if ( $term ) $label = $term->name;
		}
		$is_active = ( sanitize_title( $selected ) === sanitize_title( $option ) ) ? ' active' : '';
		$pills .= '<button type="button" class="nkc-variation-pill' . $is_active . '" data-value="' . esc_attr( $option ) . '">' . esc_html( $label ) . '</button>';
	}
	$pills .= '</div>';

	return $hidden_select . $pills;
}, 10, 2 );
