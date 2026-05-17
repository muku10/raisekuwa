<?php
/**
 * Rai's Sekuwa Corner — boot loader.
 *
 * @package raisekuwa
 */

if ( ! defined( 'ABSPATH' ) ) exit;

require trailingslashit( get_template_directory() ) . 'core/theme-constants.php';

require_once DK_CORE     . '/theme-setup.php';
require_once DK_CORE     . '/theme-register.php';
require_once DK_CORE     . '/enqueue.php';
require_once DK_FUNCTION . '/theme-functions.php';
require_once DK_FUNCTION . '/extras.php';
require_once DK_FUNCTION . '/ajax-functions.php';
require_once DK_CORE     . '/theme-hooks.php';
