<?php
/**
 * Rai's Sekuwa Corner — functions bootstrap.
 *
 * @package raisekuwa
 */

require_once ( 'core/init.php' );
require_once ( 'inc/acf-fields.php' );
require_once ( 'inc/cpt-gallery.php' );
add_action( 'admin_notices', function() {
    $uploads = wp_upload_dir();
    $is_writable = is_writable( $uploads['basedir'] );
    $supports_thumbnails = current_theme_supports( 'post-thumbnails' );
    $rest_url = get_rest_url();
    $image_editor = wp_get_image_editor( ABSPATH . 'wp-admin/images/align-left.png' );
    $editor_name = is_wp_error( $image_editor ) ? 'None' : get_class( $image_editor );

    $class = $is_writable && $supports_thumbnails ? 'notice-success' : 'notice-error';
    $msg = "<strong>Diagnostic:</strong> ";
    $msg .= $supports_thumbnails ? "✅ Thumbnails Supported. " : "❌ Thumbnails NOT Supported. ";
    $msg .= $is_writable ? "✅ Uploads folder is Writable. " : "❌ Uploads folder is NOT Writable. ";
    $msg .= "Image Editor: <strong>$editor_name</strong>. ";
    $msg .= "REST URL: <code>$rest_url</code>";
    
    echo "<div class='notice $class is-dismissible'><p>$msg</p></div>";
} );

// Force GD instead of Imagick (Fixes many XAMPP upload issues)
add_filter( 'wp_image_editors', function( $editors ) {
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
