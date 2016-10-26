<?php
/**************************************
 * RCHTHEME Team Custom Post TYpe
 *
 * @package  RCHTHEME/Framework
 * @author   RCHTHEME
 * @link     http://www.rchtheme.com
**************************************/

// Register Team Custom Post Types

function rch_team(){
	register_post_type('rch_team', array(
		'labels' => array(
			'name' => __('Team','rchtheme'), __('post type general name','rchtheme'),
			'singular_name' => __('Team','rchtheme'), __('post type singular name','rchtheme'),
			'add_new' => __('Add New Member','rchtheme'), __('member','rchtheme'),
			'add_new_item' => __('Add New Team Member', 'rchtheme' ),
			'edit_item' => __('Edit Team Member','rchtheme'),
			'new_item' => __('New Team Member','rchtheme'),
			'view_item' => __('View Team Member','rchtheme'),
			'search_items' => __('Search Team Members','rchtheme'),
			'not_found' =>  __('No Team Member found','rchtheme'),
			'not_found_in_trash' => __('No Team Members found in Trash','rchtheme'),
			'parent_item_colon' => '',

		),
		'singular_label' => __('Team', 'rchtheme' ),
		'public' => true,
		'has_archive' => false,
		'exclude_from_search' => false,
		'show_ui' => true,
		'query_var' => false,
		'menu_icon' => 'dashicons-groups',
		'capability_type' => 'post',
		'hierarchical' => false,
		'rewrite' => array('slug' => 'members'),
		'menu_position' => 1001,
		'supports' => array('title', 'editor', 'author','comments','custom-fields','thumbnail','revisions', 'page-attributes'),
		'can_export' => true,
		'show_in_nav_menus' => false
	));
	//register taxonomy for Member
	register_taxonomy('team_department','rch_team',array(
		'hierarchical' => true,
		'labels' => array(
			'name' => __( 'Departments', 'taxonomy general name', 'rchtheme' ),
			'singular_name' => __( 'Department', 'taxonomy singular name', 'rchtheme' ),
			'search_items' =>  __( 'Search Departments', 'rchtheme' ),
			'popular_items' => __( 'Popular Departments', 'rchtheme' ),
			'all_items' => __( 'All Departments', 'rchtheme' ),
			'parent_item' => null,
			'parent_item_colon' => null,
			'edit_item' => __( 'Edit Member Department', 'rchtheme' ), 
			'update_item' => __( 'Update Member Department', 'rchtheme' ),
			'add_new_item' => __( 'Add New Member Department', 'rchtheme' ),
			'new_item_name' => __( 'New Member Department Name', 'rchtheme' ),
			'separate_items_with_commas' => __( 'Separate Member Department with commas', 'rchtheme' ),
			'add_or_remove_items' => __( 'Add or remove Member Department', 'rchtheme' ),
			'choose_from_most_used' => __( 'Choose from the most used Member Department', 'rchtheme' ),
		),
		'query_var' => true,
		'rewrite' => true,
		'show_in_nav_menus' => false
	));
}
add_action('init','rch_team');

/*-----------------------------------------------------------------------------------*/
/* Manage Team's columns */
/*-----------------------------------------------------------------------------------*/

function edit_team_columns($team_columns) {
	$columns = array(
		"cb" => "<input type=\"checkbox\" />",
		'title' => __('Member Name', 'rchtheme'),
		"position" => __('Position', 'rchtheme' ),
		"team_department" => __('Member Department', 'rchtheme' ),
		"thumbnail" => __('Thumbnail', 'rchtheme' ),
	);

	return $columns;
}
add_filter('manage_edit-rch_team_columns', 'edit_team_columns');

function manage_team_columns($column) {
	global $post;
	
	if ($post->post_type == "rch_team") {
		switch($column){
			case "position":
				echo get_post_meta($post->ID, 'teamposition', true);
				break;
				
			case "team_department":
				$terms = get_the_terms($post->ID, 'team_department');
				
				if (! empty($terms)) {
					foreach($terms as $t)
						$output[] = "<a href='edit.php?post_type=rch_team&team_tag=$t->slug'> " . esc_html(sanitize_term_field('name', $t->name, $t->term_id, 'team_tag', 'display')) . "</a>";
					$output = implode(', ', $output);
				} else {
					$t = get_taxonomy('team_department');
					$output = "No $t->label";
				}
				
				echo $output;
				break;
				
			case 'thumbnail':
				echo the_post_thumbnail('team-thumb');
				break;
		}
	}
}
add_action('manage_posts_custom_column', 'manage_team_columns', 10, 2);