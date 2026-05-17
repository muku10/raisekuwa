<?php
/**
 * Functions which enhance the theme by hooking into WordPress.
 *
 * @package raisekuwa
 */

if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Meta tags injected into <head>.
 */
if ( ! function_exists( 'raisekuwa_add_meta' ) ) :
	function raisekuwa_add_meta() {
		echo '<meta name="geo.placename" content="Southport, Queensland, Australia">';
		echo '<meta name="geo.region" content="AU-QLD">';
	}
endif;
add_action( 'wp_head', 'raisekuwa_add_meta' );

/**
 * Favicons.
 */
if ( ! function_exists( 'raisekuwa_add_links' ) ) :
	function raisekuwa_add_links() {
		$base = esc_url( get_stylesheet_directory_uri() );
		?>
		<link rel="icon" type="image/png" href="<?php echo $base; ?>/assets/images/logo-Cnuh_jvp.png" />
		<link rel="apple-touch-icon" href="<?php echo $base; ?>/assets/images/logo-Cnuh_jvp.png">
		<?php
	}
endif;
add_action( 'wp_head', 'raisekuwa_add_links' );

/**
 * Hide admin bar for non-admins.
 */
if ( ! current_user_can( 'administrator' ) ) {
	add_filter( 'show_admin_bar', '__return_false' );
}

/**
 * Site-wide contact details, pulled from the ACF "Theme Settings"
 * options page. Empty fields return an empty string — the header and
 * footer hide each item when its value is empty.
 *
 * @return array
 */
function raisekuwa_contact_info() {
	$get = static function ( $name ) {
		return function_exists( 'get_field' ) ? ( get_field( $name, 'option' ) ?: '' ) : '';
	};

	return array(
		'phone_primary'   => $get( 'phone_primary' ),
		'phone_secondary' => $get( 'phone_secondary' ),
		'email'           => $get( 'email' ),
		'whatsapp'        => $get( 'whatsapp_number' ),
		'facebook'        => $get( 'facebook_url' ),
		'instagram'       => $get( 'instagram_url' ),
		'address'         => $get( 'address' ),
		'hours'           => $get( 'opening_hours' ),
	);
}

/**
 * Build a `tel:` href from a human-readable phone number.
 */
function raisekuwa_tel_href( $number ) {
	return 'tel:' . preg_replace( '/[^0-9+]/', '', (string) $number );
}

/**
 * Parse a "Day | Time" multi-line string into an array of [ day, time ] rows.
 */
function raisekuwa_parse_hours( $raw ) {
	$rows = array();
	foreach ( preg_split( '/\r\n|\r|\n/', (string) $raw ) as $line ) {
		if ( ! trim( $line ) ) {
			continue;
		}
		$parts  = array_map( 'trim', explode( '|', $line, 2 ) );
		$rows[] = array( $parts[0] ?? '', $parts[1] ?? '' );
	}
	return $rows;
}
