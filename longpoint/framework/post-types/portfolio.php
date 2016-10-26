<?php
/**************************************
 * RCHTHEME Portfolio Custom Post TYpe
 *
 * @package  RCHTHEME/Framework
 * @author   RCHTHEME
 * @link     http://www.rchtheme.com
**************************************/
 

// Register Portfolio custom post types

function rch_portfolio(){
	//global $data;
	register_post_type('rch_portfolio', array(
		'labels' => array(
			'name' => __('Portfolio', 'post type general name', 'rchtheme' ),
			'singular_name' => __('Portfolio', 'post type singular name', 'rchtheme' ),
			'add_new' => __('Add New', 'portfolio', 'rchtheme' ),
			'add_new_item' => __('Add New Portfolio', 'rchtheme' ),
			'edit_item' => __('Edit Portfolio', 'rchtheme' ),
			'new_item' => __('New Portfolio', 'rchtheme' ),
			'view_item' => __('View Portfolio', 'rchtheme' ),
			'search_items' => __('Search Portfolios', 'rchtheme' ),
			'not_found' =>  __('No portfolios found', 'rchtheme' ),
			'not_found_in_trash' => __('No portfolios found in Trash', 'rchtheme' ), 
			'parent_item_colon' => '',
		),
		'singular_label' => __('Portfolio', 'rchtheme' ),
		'public' => true,
		'has_archive' => true,
		'exclude_from_search' => false,
		'show_ui' => true,
		'query_var' => false,
		'menu_icon' => 'dashicons-portfolio',
		'capability_type' => 'post',
		'menu_position' => 1005,
		'hierarchical' => false,
		//'rewrite' => array('slug' => $data['portfolio_slug']),
		'rewrite' => array('slug' => 'portfolio'),
		'show_in_nav_menus' => false,
		'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'custom-fields', 'page-attributes'),
		'can_export' => true,

	));

	//register taxonomy for portfolio
	register_taxonomy('portfolio_category','rch_portfolio',array(
		'hierarchical' => true,
		'labels' => array(
			'name' => __( 'Portfolio Categories', 'taxonomy general name', 'rchtheme' ),
			'singular_name' => __( 'Portfolio Category', 'taxonomy singular name', 'rchtheme' ),
			'search_items' =>  __( 'Search Categories', 'rchtheme' ),
			'popular_items' => __( 'Popular Categories', 'rchtheme' ),
			'all_items' => __( 'All Categories', 'rchtheme' ),
			'parent_item' => null,
			'parent_item_colon' => null,
			'edit_item' => __( 'Edit Portfolio Category', 'rchtheme' ), 
			'update_item' => __( 'Update Portfolio Category', 'rchtheme' ),
			'add_new_item' => __( 'Add New Portfolio Category', 'rchtheme' ),
			'new_item_name' => __( 'New Portfolio Category Name', 'rchtheme' ),
			'separate_items_with_commas' => __( 'Separate Portfolio category with commas', 'rchtheme' ),
			'add_or_remove_items' => __( 'Add or remove portfolio category', 'rchtheme' ),
			'choose_from_most_used' => __( 'Choose from the most used portfolio category', 'rchtheme' ),
			
		),
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => true,
		'show_in_nav_menus' => false,
	));

}
add_action('init','rch_portfolio');

/*-----------------------------------------------------------------------------------*/
/* Manage portfolio's columns */
/*-----------------------------------------------------------------------------------*/
function edit_rchportfolio_columns($gallery_columns) {
	$columns = array(
		"cb" => "<input type=\"checkbox\" />",
		"title" => _x('Portfolio Name', 'column name', 'rchtheme' ),
		"portfolio_categories" => __('Categories', 'rchtheme' ),
		"description" => __('Description', 'rchtheme' ),
		"thumbnail" => __('Thumbnail', 'rchtheme' )
	);

	return $columns;
}
add_filter('manage_edit-rch_portfolio_columns', 'edit_rchportfolio_columns');

function manage_rchportfolio_columns($column) {
	global $post;
	
	if ($post->post_type == "rch_portfolio") {
		switch($column){
			case "description":
				the_excerpt();
				break;
			case "portfolio_categories":
				$terms = get_the_terms($post->ID, 'portfolio_category');
				
				if (! empty($terms)) {
					foreach($terms as $t)
						$output[] = "<a href='edit.php?post_type=rch_portfolio&portfolio_tag=$t->slug'> " . esc_html(sanitize_term_field('name', $t->name, $t->term_id, 'portfolio_tag', 'display')) . "</a>";
					$output = implode(', ', $output);
				} else {
					$t = get_taxonomy('portfolio_category');
					$output = "No $t->label";
				}
				
				echo $output;
				break;
			
			case 'thumbnail':
				echo the_post_thumbnail('thumbnail');
				break;
		}
	}
}
add_action('manage_posts_custom_column', 'manage_rchportfolio_columns', 10, 2);