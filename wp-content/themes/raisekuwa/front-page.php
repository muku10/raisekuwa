<?php
/**
 * Front page template — loaded automatically when "A static page" is set
 * as the homepage in Settings → Reading.
 *
 * Section order matches the static index.html exactly:
 *  Hero → Intro → Signature → About → Catering Parallax
 *  → Testimonials → Booking Form → Menu
 *
 * @package raisekuwa
 */

get_header(); ?>

<main>
    <?php get_template_part( 'template-parts/home/hero' ); ?>
    <?php get_template_part( 'template-parts/home/intro' ); ?>
    <?php get_template_part( 'template-parts/home/signature' ); ?>
    <?php get_template_part( 'template-parts/home/about' ); ?>
    <?php get_template_part( 'template-parts/home/catering' ); ?>
    <?php get_template_part( 'template-parts/home/testimonials' ); ?>
    <?php get_template_part( 'template-parts/home/booking' ); ?>
    <?php get_template_part( 'template-parts/home/menu' ); ?>
</main>

<?php get_footer(); ?>
