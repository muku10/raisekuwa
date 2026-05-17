<?php
/**
 * Rai's Sekuwa Corner — theme constants.
 *
 * @package raisekuwa
 */

if ( ! defined( 'ABSPATH' ) ) exit;

$get_theme = wp_get_theme();

define( 'DK_THEME_NAME',    $get_theme );
define( 'DK_THEME_VERSION', '1.0.0' );
define( 'DK_THEME_SLUG',    'raisekuwa' );
define( 'DK_PREFIX',        'rsk_' );

define( 'DK_TEXT_DOMAIN', 'raisekuwa' );

define( 'DK_BASE_URL', get_template_directory_uri() );
define( 'DK_BASE',     wp_normalize_path( get_template_directory() ) );

define( 'DK_CORE',      DK_BASE . '/core' );
define( 'DK_FUNCTION',  DK_BASE . '/core/functions' );
define( 'DK_ADMIN_DIR', DK_CORE . '/admin' );

define( 'DK_THEME_ADMIN_URL', DK_BASE_URL . '/core/admin' );
define( 'DK_THEME_LIBS_URL',  DK_BASE_URL . '/core/lib' );

define( 'DK_ASSEST_URI', DK_BASE_URL . '/assets' );
define( 'DK_JS',         DK_BASE_URL . '/assets/js' );
define( 'DK_CSS',        DK_BASE_URL . '/assets/css' );
define( 'DK_DIST_CSS',   DK_BASE_URL . '/assets/dist/css' );
define( 'DK_IMG',        DK_BASE_URL . '/assets/images' );
define( 'DK_FILE',       DK_BASE_URL . '/assets/files' );
