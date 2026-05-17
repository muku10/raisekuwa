<?php
/**
 * Rai's Sekuwa Corner — functions bootstrap.
 *
 * Keep this file lean: it only wires up the theme. All real logic lives
 * in /core (setup, registration, enqueue, hooks) and /inc (fields, CPTs).
 *
 * @package raisekuwa
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$raisekuwa_dir = get_template_directory();

require_once $raisekuwa_dir . '/core/init.php';
require_once $raisekuwa_dir . '/inc/acf-fields.php';
require_once $raisekuwa_dir . '/inc/cpt-gallery.php';

/**
 * Force the GD image editor ahead of Imagick.
 * Avoids common XAMPP upload / thumbnail failures on Windows.
 */
add_filter( 'wp_image_editors', function ( $editors ) {
	return array( 'WP_Image_Editor_GD', 'WP_Image_Editor_Imagick' );
} );

/**
 * Contact Form 7 — disable automatic <p>/<br> insertion.
 *
 * The CF7 forms used by this theme (contact, booking, catering inquiry)
 * are built from custom block-level markup — grids, <label> blocks and
 * inline SVG icons. CF7's auto-paragraph would inject stray <p>/<br>
 * tags and break that layout, so it is turned off for every form.
 */
add_filter( 'wpcf7_autop_or_not', '__return_false' );
