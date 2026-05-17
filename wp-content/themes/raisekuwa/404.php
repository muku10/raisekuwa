<?php
/**
 * 404 template.
 *
 * @package raisekuwa
 */

get_header(); ?>

<section class="mx-auto max-w-3xl px-4 py-24 lg:px-8 text-center">
	<span class="text-7xl font-black text-crimson">404</span>
	<h1 class="mt-6 text-4xl font-black text-primary-deep"><?php esc_html_e( 'Page not found', 'raisekuwa' ); ?></h1>
	<p class="mt-4 text-muted-foreground"><?php esc_html_e( 'Sorry, the page you are looking for does not exist or has been moved.', 'raisekuwa' ); ?></p>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-crimson mt-8"><?php esc_html_e( 'Back to home', 'raisekuwa' ); ?></a>
</section>

<?php get_footer(); ?>
