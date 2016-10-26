<?php
/**************************************
 * RCHTHEME Blog Shortcode
 *
 * @package  RCHTHEME/Framework
 * @author   RCHTHEME
 * @link     http://www.rchtheme.com
**************************************/

/**************************************
 * RCHTHEME Blog Shortcode
**************************************/
if ( !function_exists('RCHBlog') ) {
	function RCHBlog($atts)
	{		
		global $smof_data;
		extract( shortcode_atts( array( 															
			'count' => 9,
			'limit' => 100,
			'display_large' => 1,
			'display_medium' => 1,
			'display_small' => 1,
			'display_extrasmall' => 1,	
			'animation' => '',			
			'class' => '',
			'archive_link' => '',
			'style' => ''
		), $atts, 'blog' ) );
		
		$id_attr = "rch-blog-" . mt_rand (10,1000);
		
		$args = array(
			'numberposts' => $count,
			'offset' => 0,			
			'orderby' => 'post_date',
			'order' => 'DESC',			
			'post_type' => 'post',
			'post_status' => 'publish'			
		);
		
		$recent_posts = wp_get_recent_posts( $args, ARRAY_A );
		$i = 0; 
		$col = 3;
		$posts = '';// no errors
		foreach( $recent_posts as $post ){			
			$posts .= '<div class="item">';
			$posts .= '<div class="thumbnail">';
			$posts .= '<a class="figure" href="' . get_permalink($post["ID"]) . '" title="'.$post["post_title"].'" ><figure>';
			$posts .= get_the_post_thumbnail($post["ID"], 'blog-thumb');
			$posts .= '</figure></a>';
			$posts .= '<a href="' . get_permalink($post["ID"]) . '" title="' . __('Read more', 'Longpoint') . '"><div class="more"><i class="fa fa-angle-right"></i></div></a>';
			$posts .= '<div class="caption">';
			$posts .= '<a href="' . get_permalink($post["ID"]) . '" title="'.$post["post_title"].'" ><h4>' . $post["post_title"] . '</h4></a>';			
			$posts .= '<p>'. substr(remove_tags($post["post_content"], array('p')), 0, $limit) . '</p>';
			$posts .= '</div>';
			if ( ($smof_data['blog_enable_comments'] && comments_open()) || $smof_data['blog_display_date']){
				$posts .= '<div class="post-details">';
				if ( $smof_data['blog_enable_comments'] && comments_open()){
				$posts .= '<span class="comments"><i class="fa fa-comments-o"></i>' . get_comments_number() . '</span>';
				}
				if( $smof_data['blog_display_date'] ){
				$posts .= '<span class="date"><i class="fa fa-calendar"></i>' . get_the_time('M d, Y', $post["ID"]) . '</span>';
				}			
				$posts .= '</div>';
			}
			
			$posts .= '</div></div>';
			$i++;		
		}
		
		$output  = '<div id="carousel-' . $id_attr . '" class="carousel-blocks">' . $posts . '</div><!--<a class="btn btn-default pull-right" href="'. $archive_link.'" title="Back to homepage"><i class="fa fa-archive"></i> Archive</a>-->';	
		$output .= '
<script>
jQuery.noConflict();
jQuery(document).ready(function($) {	 
	$("#carousel-' . $id_attr . '").owlCarousel({ 
	autoPlay: 10000, 
	items : 3, 
	//navigation : true	  
});
 
});</script>';
		$classes =  ($class != '' ? " {$class}" : '') . 
					($animation != '' ? " animate {$animation}" : '') . 
					($display_large == 0 ? ' hidden-lg' : '' ) . 
					($display_medium == 0 ? ' hidden-md' : '') . 
					($display_small == 0 ? ' hidden-sm' : '') . 
					($display_extrasmall == 0 ? ' hidden-xs' : '');			
					
		$output = '<section  id="section-' . $id_attr . '" class="blog ' . $classes .'">' . $output . '</section>';
		
		if($style != ''){
			$output  .= "<style type='text/css'>#section-{$id_attr}{ {$style} }</style>";
		}
		
		return $output;		
	}
	
}
add_shortcode('blog', 'RCHBlog');
