<?php
/**************************************
 * RCHTHEME Testimonial Custom Post TYpe
 *
 * @package  RCHTHEME/Framework
 * @author   RCHTHEME
 * @link     http://www.rchtheme.com
**************************************/

// Register Testimonial Custom Post Types

function rch_testimonial(){
	register_post_type('rch_testimonial', array(
		'labels' => array(
			'name' => __('Testimonials','rchtheme'), __('post type general name','rchtheme'),
			'singular_name' => __('Testimonial','rchtheme'), __('post type singular name','rchtheme'),
			'add_new' => __('Add New Testimonial','rchtheme'), __('Testimonial','rchtheme'),
			'add_new_item' => __('Add New Testimonial', 'rchtheme' ),
			'edit_item' => __('Edit Testimonial','rchtheme'),
			'new_item' => __('New Testimonial','rchtheme'),
			'view_item' => __('View Testimonial','rchtheme'),
			'search_items' => __('Search Testimonial','rchtheme'),
			'not_found' =>  __('No Testimonials found','rchtheme'),
			'not_found_in_trash' => __('No Testimonials found in Trash','rchtheme'),
			'parent_item_colon' => '',
			
		),
		'singular_label' => __('Testimonial', 'rchtheme' ),
		'public' => true,
		'has_archive' => true,
		'exclude_from_search' => false,
		'show_ui' => true,
		'query_var' => false,
		'menu_icon' => 'dashicons-testimonial',
		'capability_type' => 'post',
		'hierarchical' => false,
		'rewrite' => array('slug' => 'testimonials'),
		'menu_position' => 1003,
		'show_in_nav_menus' => false,
		'supports' => array('title', 'editor','author','thumbnail','revisions', 'page-attributes'),
		'can_export' => true,
		'show_in_nav_menus' => false
	));
}
add_action('init','rch_testimonial');

/*-----------------------------------------------------------------------------------*/
/* Manage Testimonial's columns */
/*-----------------------------------------------------------------------------------*/

function edit_testimonial_columns( $testimonial_columns ) {
	$columns = array(
		"cb" => "<input type=\"checkbox\" />",
		'title' => __( 'Name', 'rchtheme' ),
		"quotecompany" => __( 'Company', 'rchtheme' ),
		"thumbnail" => __( 'Photo', 'rchtheme' ),
	);

	return $columns;
}
add_filter( 'manage_edit-rch_testimonial_columns', 'edit_testimonial_columns' );

function manage_testimonials_columns( $column ) {
	global $post;

	if ( $post->post_type == "rch_testimonial" ) {
		switch ( $column ) {
			case "quotecompany":
				echo get_post_meta( $post->ID, 'quotecompanyname', true );
				break;
			case 'thumbnail':
				echo the_post_thumbnail( 'testimonial-thumb' );
				break;
		}
	}
}
add_action( 'manage_posts_custom_column', 'manage_testimonials_columns', 10, 2 );