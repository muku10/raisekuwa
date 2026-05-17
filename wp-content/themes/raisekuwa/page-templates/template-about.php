<?php
/**
 * Template Name: About Us
 *
 * @package raisekuwa
 */

if ( ! defined( 'ABSPATH' ) ) exit;

get_header();

// ─── Hero Data ───
$hero_bg_raw = get_field( 'about_hero_bg' );
if ( is_array( $hero_bg_raw ) ) {
	$hero_bg = $hero_bg_raw['url'];
} elseif ( is_numeric( $hero_bg_raw ) ) {
	$hero_bg = wp_get_attachment_image_url( $hero_bg_raw, 'full' );
} else {
	$hero_bg = $hero_bg_raw ?: get_template_directory_uri() . '/assets/images/about-chef-DB7vu_D2.jpg';
}
$subtitle   = get_field( 'about_hero_subtitle' ) ?: 'Our Story';
$title      = get_field( 'about_hero_title' )    ?: 'A taste of <span class="text-gradient-fire">home</span>, far from home.';
$desc       = get_field( 'about_hero_description' ) ?: 'From the streets of Kathmandu to the heart of Southport — the soul of Nepal, served with fire.';
?>

<main>
	<!-- About Hero Section -->
	<section class="relative pt-40 pb-24 lg:pt-52 lg:pb-32 overflow-hidden text-white">
		<div class="absolute inset-0">
			<img src="<?php echo esc_url( $hero_bg ); ?>" alt="" aria-hidden="true" class="w-full h-full object-cover">
			<div class="absolute inset-0 bg-gradient-to-b from-black/80 via-black/60 to-[#0b0a09]"></div>
		</div>

		<!-- Floating Decorative Elements (Parallax) -->
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

	<!-- Story Section (Reused from Home) -->
	<?php get_template_part( 'template-parts/home/about' ); ?>

</main>

<?php
get_footer();
