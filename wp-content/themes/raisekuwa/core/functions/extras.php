<?php
/**
 * Misc helpers — SVG uploads and HTTPS enforcement on image srcset/src URLs.
 *
 * @package raisekuwa
 */

if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Allow SVG uploads from the media library.
 */
add_filter( 'upload_mimes', function ( $mimes ) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
} );

/**
 * Force HTTPS on srcset and src image URLs to prevent mixed-content blocking.
 */
add_filter( 'wp_calculate_image_srcset', function ( $sources ) {
	if ( ! is_ssl() || ! is_array( $sources ) ) return $sources;
	foreach ( $sources as $key => $source ) {
		if ( isset( $source['url'] ) && strpos( $source['url'], 'http://' ) === 0 ) {
			$sources[ $key ]['url'] = str_replace( 'http://', 'https://', $source['url'] );
		}
	}
	return $sources;
}, 99 );

add_filter( 'wp_get_attachment_image_src', function ( $image ) {
	if ( ! is_ssl() || ! is_array( $image ) ) return $image;
	if ( isset( $image[0] ) && strpos( $image[0], 'http://' ) === 0 ) {
		$image[0] = str_replace( 'http://', 'https://', $image[0] );
	}
	return $image;
}, 99 );
