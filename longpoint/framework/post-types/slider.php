<?php
/**************************************
 * RCHTHEME Slider Custom Post TYpe
 *
 * @package  RCHTHEME/Framework
 * @author   RCHTHEME
 * @link     http://www.rchtheme.com
**************************************/
 

// Register custom post types
add_action('init', 'rch_elastic');
function rch_elastic() {
	global $data;
	register_post_type(
		'rch_elastic',
		array(
			'labels' => array(
				'name' => __('Elastic Slider', 'Longpoint'),
				'singular_name' => __('Elastic Slider', 'Longpoint'),
				'add_new' => __('Add New Elastic Slider','Longpoint'),
				'add_new_item' => __('Add New Elastic Slider', 'Longpoint' ),
				'edit_item' => __('Edit Elastic Slider','Longpoint'),
				'new_item' => __('New Elastic Slider','Longpoint'),
				'view_item' => __('View Elastic Slider','Longpoint'),
				'search_items' => __('Search Elastic Sliders','Longpoint'),
				'not_found' =>  __('No Elastic Slider found','Longpoint'),
				'not_found_in_trash' => __('No Elastic Sliders found in Trash','Longpoint'),
				'parent_item_colon' => '',
			),
			'public' => true,
			'has_archive' => false,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => false,	
			'capability_type' => 'post',
			'hierarchical' => false,
			'rewrite' => array('slug' => 'elastic-slide'),
			'supports' => array('title', 'thumbnail'),
			'can_export' => true,
			'menu_position' => 1009,
			'menu_icon' => 'dashicons-images-alt',
			'show_in_nav_menus' => false
		)
	);

	//register taxonomy for slider
	register_taxonomy('rch_eslastic_groups','rch_elastic',array(
		'hierarchical' => true,
		'labels' => array(
			'name' => __( 'Slider Groups', 'taxonomy general name', 'Longpoint' ),
			'singular_name' => __( 'Slider Group', 'taxonomy singular name', 'Longpoint' ),
			'search_items' =>  __( 'Search Slider Groups', 'Longpoint' ),
			'popular_items' => __( 'Popular Slider Groups', 'Longpoint' ),
			'all_items' => __( 'All Slider Groups', 'Longpoint' ),
			'parent_item' => null,
			'parent_item_colon' => null,
			'edit_item' => __( 'Edit Slider Group', 'Longpoint' ), 
			'update_item' => __( 'Update Slider Group', 'Longpoint' ),
			'add_new_item' => __( 'Add New Slider Group', 'Longpoint' ),
			'new_item_name' => __( 'New Slider Group Name', 'Longpoint' ),
			'separate_items_with_commas' => __( 'Separate Slider Group with commas', 'Longpoint' ),
			'add_or_remove_items' => __( 'Add or remove Slider Group', 'Longpoint' ),
			'choose_from_most_used' => __( 'Choose from the most used Slider Group', 'Longpoint' ),
		),
		'query_var' => true,
		'rewrite' => true,
		'show_in_nav_menus' => false
	));
}