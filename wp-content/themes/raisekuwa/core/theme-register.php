<?php
/**
 * Rai's Sekuwa Corner — menus, options, CPT registrations.
 *
 * @package raisekuwa
 */

if ( ! defined( 'ABSPATH' ) ) exit;

/* ------------------------------------------------------------------ */
/*  ACF Options Page                                                    */
/* ------------------------------------------------------------------ */
if ( function_exists( 'acf_add_options_page' ) ) {
	acf_add_options_page( [
		'page_title' => __( 'Theme Settings', 'raisekuwa' ),
		'menu_title' => __( 'Theme Settings', 'raisekuwa' ),
		'menu_slug'  => 'raisekuwa-theme-settings',
		'capability' => 'edit_posts',
		'redirect'   => false,
	] );
}

/* ------------------------------------------------------------------ */
/*  Navigation Menus                                                    */
/* ------------------------------------------------------------------ */
function raisekuwa_register_menus() {
	register_nav_menus( [
		'primary-menu'  => __( 'Primary Menu (Desktop & Mobile Nav)', 'raisekuwa' ),
		'footer-menu-1' => __( 'Footer Menu — Explore', 'raisekuwa' ),
		'footer-menu-2' => __( 'Footer Menu — Menu Items', 'raisekuwa' ),
	] );
}
add_action( 'init', 'raisekuwa_register_menus' );

/* ------------------------------------------------------------------ */
/*  Testimonial CPT (legacy — kept for any existing posts)             */
/*  The homepage section uses the ACF repeater on the front page;      */
/*  this CPT is kept for backward compatibility only.                  */
/* ------------------------------------------------------------------ */
function raisekuwa_register_cpts() {
	register_post_type( 'testimonial', [
		'labels'      => [
			'name'          => __( 'Testimonials', 'raisekuwa' ),
			'singular_name' => __( 'Testimonial',  'raisekuwa' ),
			'add_new_item'  => __( 'Add New Testimonial', 'raisekuwa' ),
			'edit_item'     => __( 'Edit Testimonial', 'raisekuwa' ),
		],
		'public'      => false,
		'show_ui'     => true,
		'menu_icon'   => 'dashicons-format-quote',
		'supports'    => [ 'title' ],
		'has_archive' => false,
	] );
}
add_action( 'init', 'raisekuwa_register_cpts' );
