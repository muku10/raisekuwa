<?php
/**
 * Template Name: Homepage Page
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
  <?php get_template_part( 'template-parts/home/reviews' ); ?>
  <?php get_template_part( 'template-parts/home/booking' ); ?>
  <?php get_template_part( 'template-parts/home/menu' ); ?>
</main>
<?php get_footer(); ?>
