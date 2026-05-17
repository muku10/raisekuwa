<?php
/**
 * Template Name: Catering
 *
 * @package raisekuwa
 */

if ( ! defined( 'ABSPATH' ) ) exit;

get_header();

// ─── Hero Data ───
$hero_bg_raw = get_field( 'catering_hero_bg' );
if ( is_array( $hero_bg_raw ) ) {
	$hero_bg = $hero_bg_raw['url'];
} elseif ( is_numeric( $hero_bg_raw ) ) {
	$hero_bg = wp_get_attachment_image_url( $hero_bg_raw, 'full' );
} else {
	$hero_bg = $hero_bg_raw ?: get_template_directory_uri() . '/assets/images/parallax-grill-CQrKh_B_.jpg';
}

$subtitle   = get_field( 'catering_hero_subtitle' ) ?: 'Catering Menu';
$title      = get_field( 'catering_hero_title' )    ?: 'Bring the <span class="text-gradient-fire">fire</span> to your event';
$desc       = get_field( 'catering_hero_description' ) ?: 'Authentic Nepali street food, charcoal-grilled Sekuwa and hand-folded momo — catered for weddings, parties, corporate events and gatherings of every size.';

// ─── Main Package Data ───
$pkg_image_raw = get_field( 'catering_package_image' );
if ( is_array( $pkg_image_raw ) ) {
	$pkg_image = $pkg_image_raw['url'];
} elseif ( is_numeric( $pkg_image_raw ) ) {
	$pkg_image = wp_get_attachment_image_url( $pkg_image_raw, 'large' );
} else {
	$pkg_image = $pkg_image_raw ?: get_template_directory_uri() . '/assets/images/dish-sekuwa-mix-BtfJtQ-w.jpg';
}

$pkg_price  = get_field( 'catering_package_price' ) ?: '$25';
$pkg_title  = get_field( 'catering_package_title' ) ?: '$25 <span class="text-gradient-fire">per person</span>';
$pkg_desc   = get_field( 'catering_package_description' ) ?: 'Our signature catering package — a balanced spread of vibrant entrées and hearty mains, perfect for sit-down dinners or buffet-style service.';

// ─── Add-Ons ───
$addons = get_field( 'catering_addons' );
?>

<main>
	<!-- Catering Hero Section -->
	<section class="relative pt-40 pb-24 lg:pt-52 lg:pb-32 overflow-hidden text-white">
		<div class="absolute inset-0">
			<img src="<?php echo esc_url( $hero_bg ); ?>" alt="" aria-hidden="true" class="w-full h-full object-cover">
			<div class="absolute inset-0 bg-gradient-to-b from-black/80 via-black/60 to-background"></div>
		</div>
		
		<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/float-chili-D48owxuK.png" 
			 alt="" aria-hidden="true" 
			 class="pointer-events-none select-none absolute top-24 right-10 w-24 opacity-70 float-med" 
			 data-speed="0.2">
		
		<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/float-tomato-CXuafqOm.png" 
			 alt="" aria-hidden="true" 
			 class="pointer-events-none select-none absolute bottom-12 left-10 w-20 opacity-60 float-slow" 
			 data-speed="-0.1">

		<div class="container relative text-center max-w-3xl">
			<span class="text-primary uppercase text-xs tracking-[0.4em] reveal"><?php echo esc_html( $subtitle ); ?></span>
			<h1 class="font-serif text-4xl sm:text-5xl lg:text-6xl mt-4 leading-tight reveal" style="transition-delay: 100ms;">
				<?php echo wp_kses_post( $title ); ?>
			</h1>
			<p class="text-white/75 mt-6 max-w-xl mx-auto leading-relaxed reveal" style="transition-delay: 200ms;">
				<?php echo esc_html( $desc ); ?>
			</p>
		</div>
	</section>

	<!-- Package Details -->
	<section class="py-24 lg:py-32 bg-background">
		<div class="container max-w-6xl">
			<div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-start">
				<div class="reveal">
					<div class="relative">
						<div class="aspect-[4/5] overflow-hidden shadow-card">
							<img src="<?php echo esc_url( $pkg_image ); ?>" alt="Catering platter" class="w-full h-full object-cover ken-burns">
						</div>
						<div class="absolute -bottom-6 -right-6 bg-gradient-fire text-primary-foreground px-8 py-6 shadow-fire hidden sm:block">
							<div class="text-xs uppercase tracking-[0.3em]">From</div>
							<div class="font-serif text-4xl"><?php echo esc_html( $pkg_price ); ?></div>
							<div class="text-xs uppercase tracking-widest">per person</div>
						</div>
					</div>
				</div>
				<div class="reveal" style="transition-delay: 120ms;">
					<div>
						<span class="text-primary uppercase text-xs tracking-[0.4em]">Catering Package</span>
						<h2 class="font-serif text-4xl sm:text-5xl mt-4"><?php echo wp_kses_post( $pkg_title ); ?></h2>
						<p class="text-muted-foreground mt-5 leading-relaxed"><?php echo esc_html( $pkg_desc ); ?></p>
						
						<div class="mt-10 space-y-8">
							<!-- Entrées -->
							<?php 
							$entrees = get_field( 'catering_package_entrees' );
							if ( $entrees ) : 
							?>
							<div>
								<h3 class="font-serif text-2xl mb-4 flex items-center gap-3">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-flame w-5 h-5 text-primary"><path d="M8.5 14.5A2.5 2.5 0 0 0 11 12c0-1.38-.5-2-1-3-1.072-2.143-.224-4.054 2-6 .5 2.5 2 4.9 4 6.5 2 1.6 3 3.5 3 5.5a7 7 0 1 1-14 0c0-1.153.433-2.294 1-3a2.5 2.5 0 0 0 2.5 2.5z"></path></svg> 
									Entrées
								</h3>
								<ul class="grid sm:grid-cols-2 gap-y-2 gap-x-6">
									<?php foreach ( $entrees as $item ) : ?>
										<li class="flex items-center gap-2 text-foreground/85">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check w-4 h-4 text-primary shrink-0"><circle cx="12" cy="12" r="10"></circle><path d="m9 12 2 2 4-4"></path></svg>
											<span><?php echo esc_html( $item['item_name'] ); ?></span>
										</li>
									<?php endforeach; ?>
								</ul>
							</div>
							<?php endif; ?>

							<!-- Main Course -->
							<?php 
							$mains = get_field( 'catering_package_mains' );
							if ( $mains ) : 
							?>
							<div>
								<h3 class="font-serif text-2xl mb-4 flex items-center gap-3">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-flame w-5 h-5 text-primary"><path d="M8.5 14.5A2.5 2.5 0 0 0 11 12c0-1.38-.5-2-1-3-1.072-2.143-.224-4.054 2-6 .5 2.5 2 4.9 4 6.5 2 1.6 3 3.5 3 5.5a7 7 0 1 1-14 0c0-1.153.433-2.294 1-3a2.5 2.5 0 0 0 2.5 2.5z"></path></svg> 
									Main Course
								</h3>
								<ul class="grid sm:grid-cols-2 gap-y-2 gap-x-6">
									<?php foreach ( $mains as $item ) : ?>
										<li class="flex items-center gap-2 text-foreground/85">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check w-4 h-4 text-primary shrink-0"><circle cx="12" cy="12" r="10"></circle><path d="m9 12 2 2 4-4"></path></svg>
											<span><?php echo esc_html( $item['item_name'] ); ?></span>
										</li>
									<?php endforeach; ?>
								</ul>
							</div>
							<?php endif; ?>
						</div>

						<div class="mt-10">
							<a href="#catering-inquiry" class="btn-fire inline-flex px-8 py-4 text-xs font-semibold uppercase tracking-widest text-primary-foreground items-center gap-2 rounded-full">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-send w-4 h-4"><path d="M14.536 21.686a.5.5 0 0 0 .937-.024l6.5-19a.496.496 0 0 0-.635-.635l-19 6.5a.5.5 0 0 0-.024.937l7.93 3.18a2 2 0 0 1 1.112 1.11z"></path><path d="m21.854 2.147-10.94 10.939"></path></svg> 
								<span>Enquire Now</span>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Add-Ons Section -->
	<section class="py-24 lg:py-32 bg-card/50 border-y border-border">
		<div class="container">
			<div class="reveal">
				<div class="text-center mb-14 max-w-2xl mx-auto">
					<span class="text-primary uppercase text-xs tracking-[0.4em]">Add-Ons</span>
					<h2 class="font-serif text-4xl sm:text-5xl lg:text-6xl mt-4">Add to your <span class="text-gradient-fire">package</span></h2>
					<p class="text-muted-foreground mt-5">Customise your package with chargrilled Sekuwa, hand-folded momo and bold Nepali classics. All add-ons priced per person unless noted.</p>
				</div>
			</div>

			<div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
				<?php if ( $addons ) : foreach ( $addons as $addon ) : ?>
					<div class="reveal">
						<article class="group bg-background border border-border overflow-hidden hover:border-primary/60 transition-colors shadow-card h-full flex flex-col">
							<div class="p-6 flex-1 flex flex-col">
								<div class="flex items-start justify-between gap-3">
									<h3 class="font-serif text-2xl"><?php echo esc_html( $addon['title'] ); ?></h3>
									<span class="shrink-0 bg-gradient-fire text-primary-foreground px-3 py-1.5 text-sm font-semibold shadow-fire">
										<?php echo esc_html( $addon['price_label'] ); ?>
									</span>
								</div>
								<p class="text-xs uppercase tracking-[0.25em] text-primary mt-3"><?php echo esc_html( $addon['subtitle'] ); ?></p>
								<ul class="mt-4 space-y-1.5 text-sm text-foreground/80">
									<?php 
									$items = explode( "\n", $addon['items_list'] );
									foreach ( $items as $item ) : if ( trim( $item ) ) :
									?>
										<li class="flex items-center gap-2">
											<span class="w-1 h-1 bg-primary rounded-full"></span>
											<?php echo esc_html( trim( $item ) ); ?>
										</li>
									<?php endif; endforeach; ?>
								</ul>
							</div>
						</article>
					</div>
				<?php endforeach; endif; ?>
			</div>

			<div class="reveal">
				<div class="text-center mt-14">
					<a href="#catering-inquiry" class="btn-fire inline-flex px-8 py-4 text-xs font-semibold uppercase tracking-widest text-primary-foreground items-center gap-2 rounded-full">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-send w-4 h-4"><path d="M14.536 21.686a.5.5 0 0 0 .937-.024l6.5-19a.496.496 0 0 0-.635-.635l-19 6.5a.5.5 0 0 0-.024.937l7.93 3.18a2 2 0 0 1 1.112 1.11z"></path><path d="m21.854 2.147-10.94 10.939"></path></svg> 
						<span>Enquire Now</span>
					</a>
				</div>
			</div>
		</div>
	</section>

	<!-- How It Works -->
	<section class="py-24 lg:py-32 bg-background">
		<div class="container max-w-5xl">
			<div class="reveal">
				<div class="text-center mb-14">
					<span class="text-primary uppercase text-xs tracking-[0.4em]">How It Works</span>
					<h2 class="font-serif text-4xl sm:text-5xl mt-4">Catering, made <span class="text-gradient-fire">simple</span></h2>
				</div>
			</div>
			<div class="grid md:grid-cols-3 gap-8">
				<div class="reveal">
					<div class="border border-border p-8 h-full bg-card/40 hover:border-primary/60 transition-colors">
						<div class="font-serif text-5xl text-gradient-fire mb-3">01</div>
						<h3 class="font-serif text-2xl mb-3">Get in touch</h3>
						<p class="text-muted-foreground leading-relaxed">Call, email or message us with your date, guest count and any dietary needs.</p>
					</div>
				</div>
				<div class="reveal" style="transition-delay: 120ms;">
					<div class="border border-border p-8 h-full bg-card/40 hover:border-primary/60 transition-colors">
						<div class="font-serif text-5xl text-gradient-fire mb-3">02</div>
						<h3 class="font-serif text-2xl mb-3">We deliver food</h3>
						<p class="text-muted-foreground leading-relaxed">Start with the $25 package and add Sekuwa, momo or chowmein to suit your crowd.</p>
					</div>
				</div>
				<div class="reveal" style="transition-delay: 240ms;">
					<div class="border border-border p-8 h-full bg-card/40 hover:border-primary/60 transition-colors">
						<div class="font-serif text-5xl text-gradient-fire mb-3">03</div>
						<h3 class="font-serif text-2xl mb-3">We bring the fire</h3>
						<p class="text-muted-foreground leading-relaxed">Freshly prepared, delivered hot and ready to serve — buffet or platter style.</p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Enquire Now CTA -->
	<section class="relative py-24 lg:py-32 overflow-hidden text-white">
		<div class="absolute inset-0">
			<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/parallax-grill-CQrKh_B_.jpg" alt="" aria-hidden="true" class="w-full h-full object-cover">
			<div class="absolute inset-0 bg-gradient-to-r from-black/90 via-black/75 to-black/60"></div>
		</div>
		<div class="relative container text-center max-w-3xl">
			<div class="reveal">
				<span class="text-primary uppercase text-xs tracking-[0.4em] flex items-center justify-center gap-2">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users w-4 h-4"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M22 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
					Enquire Now
				</span>
				<h2 class="font-serif text-4xl sm:text-5xl lg:text-6xl mt-4 leading-tight">Let's plan your <span class="text-gradient-fire">next event</span></h2>
				<p class="text-white/75 mt-6 max-w-xl mx-auto leading-relaxed">Weddings, birthdays, office lunches or family gatherings — we cater for every occasion across the Gold Coast.</p>
				<div class="flex flex-wrap justify-center gap-4 mt-10">
					<a href="tel:+61755275944" class="btn-fire text-primary-foreground px-8 py-4 text-xs font-semibold uppercase tracking-widest flex items-center gap-2">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-phone w-4 h-4"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
						<span>07 5527 5944</span>
					</a>
					<a href="tel:+61400483912" class="btn-ghost-fire text-white border-white/40 px-8 py-4 text-xs font-semibold uppercase tracking-widest flex items-center gap-2">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-phone w-4 h-4"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
						<span>0400 483 912</span>
					</a>
					<a href="mailto:info@raisekuwacorner.com.au" class="btn-ghost-fire text-white border-white/40 px-8 py-4 text-xs font-semibold uppercase tracking-widest flex items-center gap-2">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-mail w-4 h-4"><rect width="20" height="16" x="2" y="4" rx="2"></rect><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path></svg>
						<span>Email Us</span>
					</a>
				</div>
			</div>
		</div>
	</section>

	<!-- Inquiry Form Section -->
	<section id="catering-inquiry" class="py-24 lg:py-32 bg-card/40 border-t border-border">
		<div class="container max-w-4xl">
			<div class="reveal">
				<div class="text-center mb-10">
					<span class="text-primary uppercase text-xs tracking-[0.4em]">Catering Inquiry</span>
					<h2 class="font-serif text-3xl sm:text-5xl mt-4">Request a <span class="text-gradient-fire">quote</span></h2>
					<p class="text-muted-foreground mt-4 max-w-xl mx-auto">Tell us about your event and we'll send a tailored catering proposal back to you within 24 hours.</p>
				</div>
			</div>

			<div class="reveal" style="transition-delay: 120ms;">
				<?php
				/*
				 * Contact Form 7 — paste the matching catering inquiry form
				 * markup (see the "Catering inquiry form" definition supplied
				 * with this build) into a new CF7 form, then replace the id
				 * below with that form's id.
				 */
				echo do_shortcode( '[contact-form-7 id="REPLACE_CATERING_FORM_ID" title="Catering Inquiry"]' );
				?>
			</div>
		</div>
	</section>
</main>

<?php
get_footer();
