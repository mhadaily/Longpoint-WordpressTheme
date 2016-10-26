<?php
/**************************************
 * RCHTHEME Framworks Functions
 *
 * @package  RCHTHEME/Framework
 * @author   RCHTHEME
 * @link     http://www.rchtheme.com
**************************************/

// Default RSS feed links
add_theme_support('automatic-feed-links');
//Support Featured image
add_theme_support( 'post-thumbnails' );
// Post Formats
//add_theme_support('post-formats', array('gallery', 'link', 'image', 'quote', 'video', 'audio', 'chat'));
// Allow shortcodes in widget text
add_filter('widget_text', 'do_shortcode');
// Register Navigation
register_nav_menu('main_menu', 'Main Menu');
 
// Content Width
if (!isset( $content_width )) $content_width = '669px';

//add_theme_support( 'custom-header');
//add_theme_support( 'custom-background');

require_once (get_template_directory() . '/framework/init.php');
require_once (get_template_directory() . '/framework/sidebars.php');
require_once (get_template_directory() . '/framework/plugins/menuwalker.php');
require_once (get_template_directory() . '/framework/admin/shortcodes/shortcodes.php');
require_once (get_template_directory() . '/framework/admin/shortcodes/ajax.php');


//------------------------------------------------------
// Remove tags
//------------------------------------------------------
if(!function_exists('remove_tags')){
	function remove_tags($str, $tags) {
		foreach($tags as $tag) {
			$str = preg_replace('#^<\/'.$tag.'>|<'.$tag.'>$#', '', trim($str));
		}
		return $str;
	}
}

//------------------------------------------------------
// Shortcode Filters
//------------------------------------------------------
add_filter( 'widget_text', 'do_shortcode' );
add_filter( 'the_excerpt', 'do_shortcode' );


//------------------------------------------------------
// Custom comment List
//------------------------------------------------------
if(!function_exists('rchtheme_theme_comment')){
function rchtheme_theme_comment($comment, $args, $depth) {
     $GLOBALS['comment'] = $comment; ?>
	 
	 <li <?php comment_class('media general'); ?> id="comment-<?php comment_ID() ?>">
	  
	  <div class="pull-left">
		<?php echo get_avatar($comment,$size='74',$default='http://0.gravatar.com/avatar/ad516503a11cd5ca435acc9bb6523536?s=74' ); ?>
	  </div>
	  <div class="media-body">
		<h5 class="media-heading"><?php printf(__('%s','Longpoint'), get_comment_author_link()) ?></h5>
		<span class="meta-date"><a class="comment_id" href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s at %2$s','Longpoint'), get_comment_date(),  get_comment_time()) ?></a></span>
		<?php comment_text() ?>
		<div class="reply pull-right">
		  <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
		</div>
		<?php if ($comment->comment_approved == '0') : ?>
		 <em><?php echo __('Your comment is awaiting moderation.','Longpoint') ?></em>
		 <br />
	  <?php endif; ?>
	  </div>
	
<?php
}
}

//------------------------------------------------------
// Filter search result
//------------------------------------------------------
if(!function_exists('rchtheme_GetCertainPostTypes')){
function rchtheme_GetCertainPostTypes($query) {
    if ($query->is_search) {
        $query->set('post_type',array('post','page'));
    }
return $query;
}
add_filter('pre_get_posts','rchtheme_GetCertainPostTypes');
}

//------------------------------------------------------
// Get Sidebars
//------------------------------------------------------
if(!function_exists('getSidebars')){
function getSidebars() {
	global $smof_data;
	$sidebars = array();
	foreach($smof_data['sidebars'] as $sidebar){
		$sidebars[$sidebar['name']] = $sidebar['title'];		
	}
	return $sidebars;
}
}

//------------------------------------------------------
// Pagination
//------------------------------------------------------
if(!function_exists('rchtheme_pagination')){
function rchtheme_pagination( $pages='') {
    global $wp_query, $wp_rewrite;
    $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
    if($pages==''){
        global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
    }
    $pagination = array(
        'base' => @add_query_arg('paged','%#%'),
        'format' => '',
        'total' => $pages,
        'current' => $current,
        'prev_text' => '<i class="fa fa-angle-left"></i>',
        'next_text' => '<i class="fa fa-angle-right"></i>',
        'type' => 'plain'
);
    if( $wp_rewrite->using_permalinks() )
        $pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' );

    if( !empty($wp_query->query_vars['s']) )
        $pagination['add_args'] = array( 's' => get_query_var( 's' ) );
        //var_dump($pagination);
    echo '<li>'.paginate_links( $pagination ).'</li>';
}
}

//------------------------------------------------------
// Initial Parallax Metabox
//------------------------------------------------------
if(!function_exists('initialParallaxMetabox')){
function initialParallaxMetabox($var) {
	$meta = array('parallax_show_title', 'parallax_full_width_activation', 'parallax_background_image', 'parallax_display_pattern_background', 'parallax_background_repeat', 'parallax_background_attachment', 'parallax_background_speed', 'parallax_background_color', 'parallax_section_height', 'parallax_title_color', 'parallax_heading_color', 'parallax_text_color', 'parallax_link_color', 'parallax_link_hover_color', 'parallax_extra_class', 'parallax_inline_style');
    
	foreach($meta as $val) {
		if(empty($var[$val])){
			$var[$val][0] = '';
		}			
	}
    return $var;
}
}

//------------------------------------------------------
// Initial Page Metabox
//------------------------------------------------------
if(!function_exists('initialPageMetabox')){
function initialPageMetabox($var) {
	$meta = array('custom_page_title', 'custom_page_sub_title', 'page_full_width_activation', 'page_show_header', 'page_show_sidebar', 'page_sidebar', 'page_header_background_image', 'page_header_background_repeat', 'page_header_background_attachment', 'page_header_background_speed', 'page_header_background_color', 'page_header_text_color', 'page_header_height', 'page_custom_class', 'page_revolution_shortcode');
    
	foreach($meta as $val) {
		if(empty($var[$val])){
			$var[$val][0] = '';
		}			
	}
    return $var;
}
}

