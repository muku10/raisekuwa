<?php
/**
 * Template Part: Home — Signature Plates
 *
 * Dynamic via ACF repeater (signature_plates); falls back to static dishes.
 * Matches index.html #signature section exactly.
 *
 * @package raisekuwa
 */

$subtitle = get_field( 'signature_subtitle' );
$title    = get_field( 'signature_title' );
$img_base = esc_url( get_template_directory_uri() ) . '/assets/images/';
?>
<section id="signature" class="py-24 lg:py-32 relative overflow-hidden">

	<!-- Floating ingredient images -->
	<img src="<?php echo $img_base; ?>float-chili-D48owxuK.png" alt="" aria-hidden="true" class="pointer-events-none select-none will-change-transform absolute top-20 right-10 w-24 opacity-50" style="transform:translate3d(0px,0px,0px);transition:transform 0.6s cubic-bezier(0.22,1,0.36,1);">
	<img src="<?php echo $img_base; ?>float-momo2-Cc2KgrIM.png" alt="" aria-hidden="true" class="pointer-events-none select-none will-change-transform absolute top-1/2 -left-8 w-28 opacity-60" style="transform:translate3d(0px,0px,0px);transition:transform 0.6s cubic-bezier(0.22,1,0.36,1);">
	<img src="<?php echo $img_base; ?>float-rosemary-CSKLiwLz.png" alt="" aria-hidden="true" class="pointer-events-none select-none will-change-transform absolute bottom-10 right-1/4 w-32 opacity-60" style="transform:translate3d(0px,0px,0px);transition:transform 0.6s cubic-bezier(0.22,1,0.36,1);">

	<div class="container relative">

		<div class="reveal" style="transition-delay:0ms;">
			<div class="text-center mb-16">
				<span class="text-primary uppercase text-xs tracking-[0.4em]"><?php echo esc_html( $subtitle ); ?></span>
				<h2 class="font-serif text-4xl sm:text-5xl lg:text-6xl mt-4 max-w-3xl mx-auto"><?php echo wp_kses_post( $title ); ?></h2>
			</div>
		</div>

		<div class="grid grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-6">

			<?php if ( have_rows( 'signature_plates' ) ) : ?>

				<?php $i = 0; while ( have_rows( 'signature_plates' ) ) : the_row(); ?>
					<?php
					$img_val  = get_sub_field( 'image' );
					$img_url  = is_array( $img_val ) ? esc_url( $img_val['url'] ) : esc_url( $img_val );
					$cat      = esc_html( get_sub_field( 'subtitle' ) );
					$name     = esc_html( get_sub_field( 'title' ) );
					$link     = esc_url( get_sub_field( 'link' ) ?: '#menu' );
					$delay    = $i * 100;
					$i++;
					?>
					<div class="reveal" style="transition-delay:<?php echo $delay; ?>ms;">
						<a href="<?php echo $link; ?>" class="group relative block aspect-[3/4] overflow-hidden bg-card shadow-soft">
							<?php if ( $img_url ) : ?>
								<img src="<?php echo $img_url; ?>" alt="<?php echo $name; ?>" loading="lazy" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
							<?php endif; ?>
							<div class="absolute inset-0 bg-gradient-to-t from-black/85 via-black/30 to-transparent"></div>
							<div class="absolute inset-0 p-6 flex flex-col justify-end text-white">
								<?php if ( $cat ) : ?>
									<span class="text-primary text-xs uppercase tracking-widest mb-1"><?php echo $cat; ?></span>
								<?php endif; ?>
								<h3 class="font-serif text-2xl lg:text-3xl"><?php echo $name; ?></h3>
								<div class="h-px w-0 bg-primary mt-3 transition-all duration-500 group-hover:w-12"></div>
							</div>
						</a>
					</div>
				<?php endwhile; ?>

			<?php endif; ?>

		</div><!-- /grid -->

		<div class="reveal" style="transition-delay:200ms;">
			<div class="text-center mt-14">
				<a href="<?php echo esc_url( site_url( '/menu' ) ); ?>" class="btn-fire text-primary-foreground px-8 py-4 text-xs font-semibold uppercase tracking-widest inline-flex">
					<span>View Full Menu</span>
				</a>
			</div>
		</div>

	</div>
</section>