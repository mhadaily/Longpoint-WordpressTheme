<?php
/**************************************
 * RCHTHEME Parallax Section Custom Post TYpe
 *
 * @package  RCHTHEME/Framework
 * @author   RCHTHEME
 * @link     http://www.rchtheme.com
**************************************/
 

// Register custom post types
add_action('init', 'rch_parallax_section');
function rch_parallax_section() {
	global $data;
	register_post_type(
		'rch_parallax_section',
		array(
			'labels' => array(
				'name' => __('Parallax Sections', 'Longpoint'),
				'singular_name' => __('Parallax Section', 'Longpoint'),
				'add_new' => __('Add New section','Longpoint'),
				'add_new_item' => __('Add New section', 'Longpoint' ),
				'edit_item' => __('Edit section','Longpoint'),
				'new_item' => __('New section','Longpoint'),
				'view_item' => __('View section','Longpoint'),
				'search_items' => __('Search section','Longpoint'),
				'not_found' =>  __('No Image found','Longpoint'),
				'not_found_in_trash' => __('No Images found in Trash','Longpoint'),
				'parent_item_colon' => '',
			),
			'public' => true,
			'has_archive' => false,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => false,	
			'capability_type' => 'post',
			'hierarchical' => false,
			'rewrite' => array('slug' => 'parallax-section'),
			'supports' => array('title', 'editor'),
			'can_export' => true,
			'menu_position' => 1010,
			'menu_icon' => 'dashicons-align-center',
		)
	);

}