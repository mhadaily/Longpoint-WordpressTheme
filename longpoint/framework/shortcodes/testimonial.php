<?php
/**************************************
 * RCHTHEME Testimonials Shortcode
 *
 * @package  RCHTHEME/Framework
 * @author   RCHTHEME
 * @link     http://www.rchtheme.com
**************************************/

/**************************************
 * RCHTHEME Testimonials Shortcode
**************************************/
if ( !function_exists('RCHTestimonials') ) {
	function RCHTestimonials($atts)
	{			
		extract( shortcode_atts( array( 												
			'show_title' => 1,
			'title' => __('Testimonials', 'Longpoint'),
			'count' => 5,
			'display_large' => 1,
			'display_medium' => 1,
			'display_small' => 1,
			'display_extrasmall' => 1,	
			'animation' => '',			
			'class' => '',
			'style' => ''
		), $atts, 'testimonials' ) );
		

		$args = array(
			'post_type' => 'rch_testimonial',
			'post_count' => $count
		);		
		
		$query = new WP_Query( $args );
		
		$id_attr = "rch-testimonials-" . mt_rand (10,1000);
		
		$testimonials = $navigator = ''; // no errors
		
		// The Loop
		if ( $query->have_posts() ) {
			$i = 0;
			
				while ( $query->have_posts() ) {	
					
					$query->the_post();

					$postion=get_post_meta(get_the_ID(), "quotecompany", true);
					$company=get_post_meta(get_the_ID(), "quotecompanyname", true);
					$website=get_post_meta(get_the_ID(), "quotewebsite", true);

					$testimonials .= '<div class="item' . ($i == 0 ? ' active' : '') . '"><div class="container-fluid"><div class="row">';
					$testimonials .= '<blockquote class="blockquote-center">';
					$testimonials .= '<div class="content"><p>' . get_the_content() . '</p></div>';
					$testimonials .= '<footer>' . get_the_title() . ' - '.$postion.' - '.$company.' <a title="' . get_the_title() . '" target="_blank" href="'.$website.'"><i class="fa fa-external-link"></i></a></footer>';
					$testimonials .= '</blockquote>';
					$testimonials .='</div></div></div>';
					
					$navigator .= '<li data-target="#' . $id_attr . '" data-slide-to="' . $i . '"' . ($i == 0 ? ' class="active"' : '') . '></li>';				
					$i++;
				}
			
				$output = '<div class="section-pattern-overlay"></div><div class="prallax-content">';			
				$output .= $show_title == 1 ? '<h2 class="title align-center animate fadeInDown">' . $title . '</h2>' : '';
				$output .= '<div id="' . $id_attr . '" class="carousel slide  animate fadeInLeft" data-ride="carousel">
							  <ol class="carousel-indicators">' . $navigator . '</ol>
							  <div class="carousel-inner">' . $testimonials . '</div>					 
							</div></div>';
				
		}		
		/* Restore original Post Data */
		wp_reset_postdata();
		
		$classes =  ($class != '' ? " {$class}" : '') . 
					($animation != '' ? " animate {$animation}" : '') . 
					($display_large == 0 ? ' hidden-lg' : '' ) . 
					($display_medium == 0 ? ' hidden-md' : '') . 
					($display_small == 0 ? ' hidden-sm' : '') . 
					($display_extrasmall == 0 ? ' hidden-xs' : '');	
		
		$output = '<section  id="section-' . $id_attr . '" class="testimonials ' . $classes .'">' . $output . '</section>';
		
		if($style != ''){
			$output  .= "<style type='text/css'>#section-{$id_attr}{ {$style} }</style>";
		}
		
		return $output;		
	}
	
}
add_shortcode('testimonials', 'RCHTestimonials');
