<?php
/**
 * Rai's Sekuwa Corner — theme setup.
 *
 * @package raisekuwa
 */

if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! function_exists( 'raisekuwa_setup' ) ) :
	function raisekuwa_setup() {
		load_theme_textdomain( 'raisekuwa', get_template_directory() . '/languages' );

		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );

		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		add_theme_support( 'custom-background', apply_filters( 'raisekuwa_custom_background_args', array(
			'default-color' => '0a0907',
			'default-image' => '',
		) ) );

		add_theme_support( 'customize-selective-refresh-widgets' );

		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'raisekuwa_setup' );

function raisekuwa_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'raisekuwa_content_width', 1280 );
}
add_action( 'after_setup_theme', 'raisekuwa_content_width', 0 );
