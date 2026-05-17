<?php
/**
 * Template Name: About Us
 *
 * Hero + Story Section content is editable via the ACF field group
 * attached to this page.
 *
 * @package raisekuwa
 */

if ( ! defined( 'ABSPATH' ) ) exit;

get_header();

$img_base = esc_url( get_template_directory_uri() ) . '/assets/images/';

/* Resolve an ACF image value (array | attachment ID | URL) to a URL. */
$rsk_img_url = static function ( $val, $size = 'large' ) {
	if ( is_array( $val ) ) {
		return $val['url'] ?? '';
	}
	if ( is_numeric( $val ) ) {
		return wp_get_attachment_image_url( $val, $size );
	}
	return (string) $val;
};

/* ── Hero ───────────────────────────────────────────────── */
$hero_bg  = $rsk_img_url( get_field( 'about_hero_bg' ), 'full' );
$hero_bg  = $hero_bg ?: $img_base . 'about-chef-DB7vu_D2.jpg';
$subtitle = get_field( 'about_hero_subtitle' )    ?: '';
$title    = get_field( 'about_hero_title' )       ?: '';
$desc     = get_field( 'about_hero_description' ) ?: '';

/* ── Story Section ──────────────────────────────────────── */
$about_img   = $rsk_img_url( get_field( 'about_image' ) );
$about_img   = $about_img ?: $img_base . 'about-chef-DB7vu_D2.jpg';
$about_badge = get_field( 'about_badge_text' ) ?: 'Charcoal grilled, every single skewer.';
$about_sub   = get_field( 'about_subtitle' )   ?: '';
$about_h2    = get_field( 'about_title' )      ?: 'A taste of <span class="text-gradient-fire">home</span>, far from home.';
$about_desc  = get_field( 'about_description' ) ?: "Rai's Sekuwa Corner began with a simple promise — to bring the bold, smoky flavours of Nepali street food to Australia, without shortcuts. Every momo is folded by hand. Every sekuwa is marinated overnight and grilled over real charcoal.\n\nFrom our kitchen in Southport to your table, our recipes carry the warmth of family, the depth of generations-old spice blends, and the soul of authentic Nepali street food.";
// Each blank line in the textarea starts a new paragraph.
$about_paras = array_values( array_filter( array_map( 'trim', preg_split( '/\n\s*\n/', trim( (string) $about_desc ) ) ) ) );
?>

<main>
	<!-- About Hero Section -->
	<section class="relative pt-40 pb-24 lg:pt-52 lg:pb-32 overflow-hidden text-white">
		<div class="absolute inset-0">
			<img src="<?php echo esc_url( $hero_bg ); ?>" alt="" aria-hidden="true" class="w-full h-full object-cover">
			<div class="absolute inset-0 bg-gradient-to-b from-black/80 via-black/60 to-background"></div>
		</div>

		<!-- Floating Decorative Elements (Parallax) -->
		<img src="<?php echo $img_base; ?>float-chili-D48owxuK.png"
			 alt="" aria-hidden="true"
			 class="pointer-events-none select-none absolute top-24 right-10 w-24 opacity-70 float-med"
			 data-speed="0.2">

		<img src="<?php echo $img_base; ?>float-tomato-CXuafqOm.png"
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

	<!-- Story Section -->
	<section id="about" class="py-24 lg:py-32 relative overflow-hidden bg-secondary/40">
		<img src="<?php echo $img_base; ?>float-skewer-CD5_ADvy.png" alt="" aria-hidden="true" class="pointer-events-none select-none will-change-transform absolute top-10 right-4 w-32 opacity-70" style="transform: translate3d(0px, 0px, 0px); transition: transform 0.6s cubic-bezier(0.22, 1, 0.36, 1);">
		<img src="<?php echo $img_base; ?>float-momo-B2nYv8fZ.png" alt="" aria-hidden="true" class="pointer-events-none select-none will-change-transform absolute bottom-20 left-4 w-28 opacity-60" style="transform: translate3d(0px, 0px, 0px); transition: transform 0.6s cubic-bezier(0.22, 1, 0.36, 1);">
		<img src="<?php echo $img_base; ?>float-tomato-CXuafqOm.png" alt="" aria-hidden="true" class="pointer-events-none select-none will-change-transform absolute top-1/2 right-1/4 w-20 opacity-60" style="transform: translate3d(0px, 0px, 0px); transition: transform 0.6s cubic-bezier(0.22, 1, 0.36, 1);">
		<img src="<?php echo $img_base; ?>float-garlic-CXkdT1Ri.png" alt="" aria-hidden="true" class="pointer-events-none select-none will-change-transform absolute bottom-1/3 right-8 w-24 opacity-50" style="transform: translate3d(0px, 0px, 0px); transition: transform 0.6s cubic-bezier(0.22, 1, 0.36, 1);">
		<div class="container grid lg:grid-cols-2 gap-12 lg:gap-20 items-center">
			<div class="reveal-left" style="transition-delay: 0ms;">
				<div class="relative aspect-[4/5] overflow-hidden shadow-card">
					<img src="<?php echo esc_url( $about_img ); ?>" alt="Chef grilling sekuwa over charcoal" loading="lazy" class="w-full h-full object-cover">
					<div class="absolute -bottom-6 -right-6 bg-gradient-fire text-primary-foreground p-6 lg:p-8 max-w-[220px] shadow-fire"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-flame w-8 h-8 mb-3"><path d="M8.5 14.5A2.5 2.5 0 0 0 11 12c0-1.38-.5-2-1-3-1.072-2.143-.224-4.054 2-6 .5 2.5 2 4.9 4 6.5 2 1.6 3 3.5 3 5.5a7 7 0 1 1-14 0c0-1.153.433-2.294 1-3a2.5 2.5 0 0 0 2.5 2.5z"></path></svg>
						<p class="font-serif text-2xl leading-tight"><?php echo esc_html( $about_badge ); ?></p>
					</div>
				</div>
			</div>
			<div class="reveal-right" style="transition-delay: 150ms;"><span class="text-primary uppercase text-xs tracking-[0.4em]"><?php echo esc_html( $about_sub ); ?></span>
				<h2 class="font-serif text-4xl sm:text-5xl lg:text-6xl mt-4 mb-6"><?php echo wp_kses_post( $about_h2 ); ?></h2>
				<?php foreach ( $about_paras as $i => $para ) : ?>
					<p class="<?php echo 0 === $i ? 'text-foreground/75 text-lg leading-relaxed mb-5' : 'text-muted-foreground leading-relaxed mb-8'; ?>"><?php echo nl2br( esc_html( $para ) ); ?></p>
				<?php endforeach; ?>
				<div class="grid grid-cols-2 gap-3 mb-8">
					<?php if ( have_rows( 'about_highlights' ) ) : ?>
						<?php while ( have_rows( 'about_highlights' ) ) : the_row();
							$hl_icon  = $rsk_img_url( get_sub_field( 'icon' ), 'thumbnail' );
							$hl_title = get_sub_field( 'title' );
						?>
							<div class="flex items-center gap-3 border-l-2 border-primary/70 pl-3 py-1">
								<div class="w-9 h-9 shrink-0 bg-gradient-fire flex items-center justify-center text-primary-foreground">
									<?php if ( $hl_icon ) : ?>
										<img src="<?php echo esc_url( $hl_icon ); ?>" alt="" class="w-4 h-4 object-contain filter brightness-0 invert">
									<?php endif; ?>
								</div>
								<h3 class="font-serif text-sm sm:text-base uppercase tracking-wide"><?php echo esc_html( $hl_title ); ?></h3>
							</div>
						<?php endwhile; ?>
					<?php else : ?>
						<div class="flex items-center gap-3 border-l-2 border-primary/70 pl-3 py-1">
							<div class="w-9 h-9 shrink-0 bg-gradient-fire flex items-center justify-center text-primary-foreground"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-flame w-4 h-4"><path d="M8.5 14.5A2.5 2.5 0 0 0 11 12c0-1.38-.5-2-1-3-1.072-2.143-.224-4.054 2-6 .5 2.5 2 4.9 4 6.5 2 1.6 3 3.5 3 5.5a7 7 0 1 1-14 0c0-1.153.433-2.294 1-3a2.5 2.5 0 0 0 2.5 2.5z"></path></svg></div>
							<h3 class="font-serif text-sm sm:text-base uppercase tracking-wide">Real Charcoal</h3>
						</div>
						<div class="flex items-center gap-3 border-l-2 border-primary/70 pl-3 py-1">
							<div class="w-9 h-9 shrink-0 bg-gradient-fire flex items-center justify-center text-primary-foreground"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-hand w-4 h-4"><path d="M18 11V6a2 2 0 0 0-2-2a2 2 0 0 0-2 2"></path><path d="M14 10V4a2 2 0 0 0-2-2a2 2 0 0 0-2 2v2"></path><path d="M10 10.5V6a2 2 0 0 0-2-2a2 2 0 0 0-2 2v8"></path><path d="M18 8a2 2 0 1 1 4 0v6a8 8 0 0 1-8 8h-2c-2.8 0-4.5-.86-5.99-2.34l-3.6-3.6a2 2 0 0 1 2.83-2.82L7 15"></path></svg></div>
							<h3 class="font-serif text-sm sm:text-base uppercase tracking-wide">Hand-Folded Daily</h3>
						</div>
						<div class="flex items-center gap-3 border-l-2 border-primary/70 pl-3 py-1">
							<div class="w-9 h-9 shrink-0 bg-gradient-fire flex items-center justify-center text-primary-foreground"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-leaf w-4 h-4"><path d="M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.48 19 2c1 2 2 4.18 2 8 0 5.5-4.78 10-10 10Z"></path><path d="M2 21c0-3 1.85-5.36 5.08-6C9.5 14.52 12 13 13 12"></path></svg></div>
							<h3 class="font-serif text-sm sm:text-base uppercase tracking-wide">Fresh &amp; Authentic</h3>
						</div>
						<div class="flex items-center gap-3 border-l-2 border-primary/70 pl-3 py-1">
							<div class="w-9 h-9 shrink-0 bg-gradient-fire flex items-center justify-center text-primary-foreground"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users w-4 h-4"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M22 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg></div>
							<h3 class="font-serif text-sm sm:text-base uppercase tracking-wide">Made for Sharing</h3>
						</div>
					<?php endif; ?>
				</div>
				<div class="flex flex-wrap gap-4 mt-10"><a href="<?php echo esc_url( site_url( '/contact' ) ); ?>" class="btn-fire text-primary-foreground px-7 py-3.5 text-xs font-semibold uppercase tracking-widest"><span>Contact Us</span></a></div>
			</div>
		</div>
	</section>

</main>

<?php
get_footer();
