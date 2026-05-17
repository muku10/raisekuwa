<?php
/**
 * Template Part: Home — Testimonials Slider
 *
 * Dynamic via ACF repeater (testimonials) on the front page.
 * Falls back to all 6 static review cards from index.html when no rows exist.
 * Floating ingredient images and carousel controls match the static layout exactly.
 *
 * @package raisekuwa
 */

$subtitle = get_field( 'test_subtitle' ) ?: 'Guest Love';
$title    = get_field( 'test_title' )    ?: 'What our diners say';
$img_base = esc_url( get_template_directory_uri() ) . '/assets/images/';

/* --- Reusable SVG helpers ---------------------------------------- */
$star = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-star w-4 h-4 fill-primary text-primary"><path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"/></svg>';

$quote_icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-quote w-8 h-8 text-primary/50 mx-auto mb-5"><path d="M16 3a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2 1 1 0 0 1 1 1v1a2 2 0 0 1-2 2 1 1 0 0 0-1 1v2a1 1 0 0 0 1 1 6 6 0 0 0 6-6V5a2 2 0 0 0-2-2z"/><path d="M5 3a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2 1 1 0 0 1 1 1v1a2 2 0 0 1-2 2 1 1 0 0 0-1 1v2a1 1 0 0 0 1 1 6 6 0 0 0 6-6V5a2 2 0 0 0-2-2z"/></svg>';

/* --- Build reviews array ----------------------------------------- */
$reviews = [];

if ( have_rows( 'testimonials' ) ) {
	while ( have_rows( 'testimonials' ) ) {
		the_row();
		$reviews[] = [
			'quote'  => get_sub_field( 'quote' )  ?: '',
			'author' => get_sub_field( 'author' ) ?: '',
			'rating' => intval( get_sub_field( 'rating' ) ?: 5 ),
		];
	}
}

/* Static fallback — all 6 reviews from index.html */
if ( empty( $reviews ) ) {
	$reviews = [
		[ 'quote' => 'The pork sekuwa is unreal — smoky, juicy and full of flavour. Best Nepali food in Southport, hands down.', 'author' => 'Aarav S.', 'rating' => 5 ],
		[ 'quote' => 'Their jhol momo is exceptional. The broth is rich, spicy and so comforting. We come every weekend.',         'author' => 'Priya K.', 'rating' => 5 ],
		[ 'quote' => "First time trying Nepali food and now I'm hooked. The chilli beef and kothey momo are addictive. Warm staff, beautiful vibes.", 'author' => 'Daniel T.', 'rating' => 5 ],
		[ 'quote' => 'Authentic flavours that took me right back to Kathmandu. The chowmein and choila are absolutely brilliant.', 'author' => 'Sophie M.', 'rating' => 5 ],
		[ 'quote' => 'Finally a true taste of Nepal on the Gold Coast. The thali set is generous and packed with flavour.',        'author' => 'Rajan B.',  'rating' => 5 ],
		[ 'quote' => 'Hidden gem of Southport! The mutton sekuwa is to die for and the staff treat you like family.',             'author' => 'Emily R.',  'rating' => 5 ],
	];
}

$total_slides = count( $reviews );
$per_page     = 3; /* visible on desktop; JS will adjust for mobile */
$total_dots   = (int) ceil( $total_slides / $per_page );
?>
<section class="py-24 lg:py-32 bg-card/50 border-y border-border relative overflow-hidden">

	<!-- Floating ingredient images — matching index.html -->
	<img src="<?php echo $img_base; ?>float-chili-D48owxuK.png"     alt="" aria-hidden="true" class="pointer-events-none select-none will-change-transform absolute top-12 left-6 w-24 opacity-60"      style="transform:translate3d(0px,0px,0px);transition:transform 0.6s cubic-bezier(0.22,1,0.36,1);">
	<img src="<?php echo $img_base; ?>float-coriander-YuyKodgj.png" alt="" aria-hidden="true" class="pointer-events-none select-none will-change-transform absolute bottom-10 right-6 w-32 opacity-50"  style="transform:translate3d(0px,0px,0px);transition:transform 0.6s cubic-bezier(0.22,1,0.36,1);">
	<img src="<?php echo $img_base; ?>float-ginger-GRnBOhka.png"    alt="" aria-hidden="true" class="pointer-events-none select-none will-change-transform absolute top-1/3 right-12 w-20 opacity-60"    style="transform:translate3d(0px,0px,0px);transition:transform 0.6s cubic-bezier(0.22,1,0.36,1);">
	<img src="<?php echo $img_base; ?>float-rosemary-CSKLiwLz.png"  alt="" aria-hidden="true" class="pointer-events-none select-none will-change-transform absolute bottom-16 left-1/4 w-28 opacity-50" style="transform:translate3d(0px,0px,0px);transition:transform 0.6s cubic-bezier(0.22,1,0.36,1);">
	<img src="<?php echo $img_base; ?>float-garlic-CXkdT1Ri.png"    alt="" aria-hidden="true" class="pointer-events-none select-none will-change-transform absolute top-20 right-1/4 w-16 opacity-50"   style="transform:translate3d(0px,0px,0px);transition:transform 0.6s cubic-bezier(0.22,1,0.36,1);">

	<div class="container">

		<!-- Section heading -->
		<div class="reveal" style="transition-delay:0ms;">
			<div class="text-center mb-12">
				<span class="text-primary uppercase text-xs tracking-[0.4em]"><?php echo esc_html( $subtitle ); ?></span>
				<h2 class="font-serif text-4xl sm:text-5xl mt-4"><?php echo esc_html( $title ); ?></h2>
			</div>
		</div>

		<!-- Slider -->
		<div class="reveal" style="transition-delay:0ms;">
			<div class="relative overflow-hidden" data-testimonial-slider>

				<!-- Track -->
				<div class="flex transition-transform duration-700 ease-out" data-slider-track style="transform:translateX(0%);">

					<?php foreach ( $reviews as $review ) : ?>
						<div class="shrink-0 px-3" style="width:33.3333%;">
							<div class="bg-background border border-border p-8 lg:p-10 text-center h-full flex flex-col">

								<?php echo $quote_icon; ?>

								<!-- Stars -->
								<div class="flex justify-center gap-1 mb-5">
									<?php for ( $s = 0; $s < min( 5, $review['rating'] ); $s++ ) echo $star; ?>
								</div>

								<p class="font-serif text-lg leading-relaxed text-foreground/90 mb-6 flex-1">
									"<?php echo esc_html( $review['quote'] ); ?>"
								</p>

								<div class="text-xs uppercase tracking-widest text-muted-foreground">
									— <?php echo esc_html( $review['author'] ); ?>
								</div>

							</div>
						</div>
					<?php endforeach; ?>

				</div><!-- /track -->
			</div><!-- /slider -->

			<!-- Navigation controls -->
			<div class="flex justify-center items-center gap-4 mt-10">

				<button aria-label="Previous" data-slider-prev class="border border-border p-3 hover:border-primary hover:text-primary transition-colors">
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-left w-4 h-4"><path d="m15 18-6-6 6-6"/></svg>
				</button>

				<div class="flex gap-2" data-slider-dots>
					<?php for ( $d = 0; $d < $total_dots; $d++ ) : ?>
						<button
							aria-label="Page <?php echo $d + 1; ?>"
							data-dot="<?php echo $d; ?>"
							class="h-1.5 transition-all <?php echo $d === 0 ? 'w-8 bg-primary' : 'w-4 bg-border'; ?>"
						></button>
					<?php endfor; ?>
				</div>

				<button aria-label="Next" data-slider-next class="border border-border p-3 hover:border-primary hover:text-primary transition-colors">
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-right w-4 h-4"><path d="m9 18 6-6-6-6"/></svg>
				</button>

			</div>
		</div><!-- /reveal -->

		<!-- View more reviews -->
		<div class="reveal" style="transition-delay:150ms;">
			<div class="text-center mt-12">
				<a href="https://www.google.com/search?q=Rai%27s+Sekuwa+Corner+Southport+reviews" target="_blank" rel="noopener noreferrer" class="btn-fire text-primary-foreground px-8 py-4 text-xs font-semibold uppercase tracking-widest inline-flex">
					<span>View More Reviews</span>
				</a>
			</div>
		</div>

	</div>
</section>