<?php
/**
 * Template Name: Homepage
 *
 * Optional page template that outputs the full homepage layout on any
 * regular Page. The site's real front page is rendered automatically by
 * front-page.php — use this template only if you want the homepage
 * layout on a different Page as well.
 *
 * @package raisekuwa
 */

get_header(); ?>

<main>
	<?php
	get_template_part( 'template-parts/home/hero' );
	get_template_part( 'template-parts/home/intro' );
	get_template_part( 'template-parts/home/signature' );
	get_template_part( 'template-parts/home/about' );
	get_template_part( 'template-parts/home/catering' );
	get_template_part( 'template-parts/home/testimonials' );
	get_template_part( 'template-parts/home/booking' );
	get_template_part( 'template-parts/home/menu' );
	?>
</main>

<?php get_footer(); ?>
