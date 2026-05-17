<?php
/**
 * Reusable product card — matches nkc-static/index.html best-sellers grid.
 *
 * @package raisekuwa
 *
 * Expected variables:
 *   $product (WC_Product) — required
 */

if ( ! defined( 'ABSPATH' ) ) exit;
if ( ! isset( $product ) || ! $product ) return;

$card_link  = get_permalink( $product->get_id() );
$card_title = $product->get_name();
$card_sale  = $product->is_on_sale();
$card_stock = $product->is_in_stock();

$image_id = $product->get_image_id();
$main_img = $image_id ? wp_get_attachment_image_url( $image_id, 'large' ) : wc_placeholder_img_src();

$review_count = (int) $product->get_review_count();

// Prices — show current price; if on sale, show crossed-out regular price.
$price_current = $product->get_price();
$price_regular = $product->get_regular_price();
$price_html_current = $price_current !== '' ? wc_price( $price_current ) : '';
$price_html_regular = ( $card_sale && $price_regular !== '' ) ? wc_price( $price_regular ) : '';
?>
<a href="<?php echo esc_url( $card_link ); ?>" class="group block overflow-hidden rounded-2xl bg-surface shadow-soft hover-lift">
	<div class="relative aspect-square overflow-hidden bg-muted">
		<img src="<?php echo esc_url( $main_img ); ?>" alt="<?php echo esc_attr( $card_title ); ?>" class="h-full w-full object-cover transition group-hover:scale-105" loading="lazy" />
		<?php if ( ! $card_stock ) : ?>
			<span class="absolute top-3 left-3 rounded-full bg-primary-deep px-2.5 py-1 text-xs font-bold text-white"><?php esc_html_e( 'SOLD OUT', 'raisekuwa' ); ?></span>
		<?php elseif ( $card_sale ) : ?>
			<span class="absolute top-3 left-3 rounded-full bg-crimson px-2.5 py-1 text-xs font-bold text-white"><?php esc_html_e( 'SALE', 'raisekuwa' ); ?></span>
		<?php endif; ?>
	</div>
	<div class="p-4">
		<div class="flex items-center gap-1 text-gold">
			<?php for ( $i = 0; $i < 5; $i++ ) : ?>
				<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
			<?php endfor; ?>
			<?php if ( $review_count > 0 ) : ?>
				<span class="ml-1 text-xs text-muted-foreground">(<?php echo esc_html( $review_count ); ?>)</span>
			<?php endif; ?>
		</div>
		<h3 class="mt-2 font-bold text-primary-deep"><?php echo esc_html( $card_title ); ?></h3>
		<?php if ( $price_html_current ) : ?>
			<div class="mt-1 flex items-baseline gap-2">
				<span class="text-lg font-black text-crimson"><?php echo $price_html_current; ?></span>
				<?php if ( $price_html_regular ) : ?>
					<span class="text-sm text-muted-foreground line-through"><?php echo $price_html_regular; ?></span>
				<?php endif; ?>
			</div>
		<?php endif; ?>
	</div>
</a>
