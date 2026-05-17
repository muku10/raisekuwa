<?php
/**
 * Custom Post Type: Gallery
 *
 * @package raisekuwa
 */

function raisekuwa_register_gallery_cpt() {

	// Gallery Taxonomy (Categories)
	register_taxonomy( 'gallery_category', array( 'gallery' ), array(
		'labels' => array(
			'name'              => 'Gallery Categories',
			'singular_name'     => 'Category',
			'search_items'      => 'Search Categories',
			'all_items'         => 'All Categories',
			'parent_item'       => 'Parent Category',
			'parent_item_colon' => 'Parent Category:',
			'edit_item'         => 'Edit Category',
			'update_item'       => 'Update Category',
			'add_new_item'      => 'Add New Category',
			'new_item_name'     => 'New Category Name',
			'menu_name'         => 'Categories',
		),
		'hierarchical'      => true,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'gallery-category' ),
		'show_in_rest'      => true,
	) );

	// Gallery Post Type
	register_post_type( 'gallery', array(
		'labels' => array(
			'name'               => 'Gallery Items',
			'singular_name'      => 'Gallery Item',
			'menu_name'          => 'Gallery',
			'name_admin_bar'     => 'Gallery Item',
			'add_new'            => 'Add New',
			'add_new_item'       => 'Add New Gallery Item',
			'new_item'           => 'New Gallery Item',
			'edit_item'          => 'Edit Gallery Item',
			'view_item'          => 'View Gallery Item',
			'all_items'          => 'All Gallery Items',
			'search_items'       => 'Search Gallery',
			'parent_item_colon'  => 'Parent Gallery Items:',
			'not_found'          => 'No gallery items found.',
			'not_found_in_trash' => 'No gallery items found in Trash.',
		),
		'public'              => true,
		'has_archive'         => true,
		'publicly_queryable'  => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'query_var'           => true,
		'rewrite'             => array( 'slug' => 'gallery' ),
		'capability_type'     => 'post',
		'hierarchical'        => false,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-format-gallery',
		'supports'            => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
		'taxonomies'          => array( 'gallery_category' ),
		'show_in_rest'        => true,
	) );
}
add_action( 'init', 'raisekuwa_register_gallery_cpt' );
