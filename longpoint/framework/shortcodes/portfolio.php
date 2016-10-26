<?php
/**************************************
 * RCHTHEME Portfolio Shortcode
 *
 * @package  RCHTHEME/Framework
 * @author   RCHTHEME
 * @link     http://www.rchtheme.com
**************************************/

/**************************************
 * RCHTHEME Portfolio Shortcode
**************************************/
if ( !function_exists('RCHPortfolio') ) {
	function RCHPortfolio($atts)
	{			
		extract( shortcode_atts( array( 												
			'show_filter' => 1,
			'count' => -1,			
			'display_large' => 1,
			'display_medium' => 1,
			'display_small' => 1,
			'display_extrasmall' => 1,	
			'animation' => '',			
			'class' => '',
			'style' => ''
		), $atts, 'portfolio' ) );
		
		$id_attr = "rch-portfolio-" . mt_rand (10,1000);
		
		$output = ''; // no errors				
		$terms = array();
		
		//filter
		if($show_filter == 1){			
			$terms = get_terms('portfolio_category', 'hide_empty=1');	
			
			if(!empty($terms)){ 
				$output .= '<div id="' . $id_attr . '-filter" class="portfolio-filter"><ul class="controls">';
				$output .= '<li><a class="filter" data-filter="all" data-filter="*">' . __('All', 'Longpoint') . '</a></li>';
				foreach ($terms as $term) {
					$output .= '<li><a class="filter" data-filter=".' . $term->slug . '">' . $term->name . '</a></li>';
				}
				$output .= '</ul>';
				$output .= '</div>';
			}
		}

		//query 
		$args = array(
			'post_type' => 'rch_portfolio',
			'posts_per_page' => $count			
		);				
		$query = new WP_Query( $args );
		
		// The Loop
		if ( $query->have_posts() ) {
			
			$output .= '<div id="portfolio-grid" class="portfolio-grid">';

				while ( $query->have_posts() ) {	
					
					$query->the_post();
					
					//terms
					$terms      = get_the_terms(get_the_id(), 'portfolio_category');
					$terms_slug = array();
					$terms_name = array();
					if (is_array($terms)) {
					  foreach ($terms as $term) {
						   $terms_slug[] = $term->slug;
						   $terms_name[] = '<span>' . $term->name . '</span>';
					  }
					}
					$imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'portfolio-large' );
					
					$output .= '<div class="mix ' . implode(' ', $terms_slug) . '">';
					$output .= '<a href="' . get_permalink( get_the_ID() ) . '" data-largesrc="' . $imgsrc[0] . '" data-title="' . get_the_title() . '" data-description="' . remove_tags(get_the_content(), array('p')) . '"><figure>';
					$output .= get_the_post_thumbnail(get_the_id(), "portfolio-thumb");
					$output .= '</figure><div class="portfolio-hover-layer"><div class="portfolio-info"><h3 class="portfolio-title">' . get_the_title() . '</h3><span><i class="fa fa-external-link fa-2"></i></span></div></div>';
					$output .= '</a>';
					$output .= '</div>';
				}						
			
			$output .= '</div>';
			
		}		
		
		wp_reset_postdata();
		
		$classes =  ($class != '' ? " {$class}" : '') . 
					($animation != '' ? " animate {$animation}" : '') . 
					($display_large == 0 ? ' hidden-lg' : '' ) . 
					($display_medium == 0 ? ' hidden-md' : '') . 
					($display_small == 0 ? ' hidden-sm' : '') . 
					($display_extrasmall == 0 ? ' hidden-xs' : '');	
		
		$output = '<section id="' . $id_attr . '-section" class="portfolio-wrapper ' . $classes .'">' . $output . '</section>';
		
		if($style != ''){
			$output  .= "<style type='text/css'>#{$id_attr}-section{ {$style} }</style>";
		}
		
		return $output;		
	}
	
}
add_shortcode('portfolio', 'RCHPortfolio');
