<?php
/**************************************
 * RCHTHEME Highlight Text Shortcode
 *
 * @package  RCHTHEME/Framework
 * @author   RCHTHEME
 * @link     http://www.rchtheme.com
**************************************/

/**************************************
 * RCHTHEME Highlight Text Shortcode
**************************************/
if ( !function_exists('RCHHighlight') ) {
	function RCHHighlight($atts, $content=null)
	{			
		extract( shortcode_atts( array( 						
			'color' => '',				
			'background' => '',			
			'font_size' => '',
			'font_weight' => '',				
			'display_large' => 1,
			'display_medium' => 1,
			'display_small' => 1,
			'display_extrasmall' => 1,	
			'animation' => '',			
			'class' => '',
			'style' => ''
		), $atts, 'highlight' ) );
		
		$content = remove_tags($content, array('p'));
		
		$id_attr = "rch-highlight-" . mt_rand (10,1000);
		
		$classes = $class . 
				($animation != '' ? " animate {$animation} " : '') . 
				($display_large == 0 ? ' hidden-lg' : '' ) . 
				($display_medium == 0 ? ' hidden-md' : '') . 
				($display_small == 0 ? ' hidden-sm' : '') . 
				($display_extrasmall == 0 ? ' hidden-xs' : '');
		
		$styles = ($color != '' ? "color: {$color};" : '') . 
				  ($font_size != '' ? "font-size: {$font_size}px;" : '') . 
				  ($font_weight != '' ? "font-weight: {$font_weight};" : '') . 
				  ($background != '' ? "background-color:{$background};" : '') . 
				  $style;		
				  
		$output = '<span id="' . $id_attr . '" class="highlight ' . $classes .'">' . $content . '</span>';
		
		if( $styles != '' ){
			$output .= "<style type='text/css'>#{$id_attr}{ {$styles} }</style>";
		}		
		return $output;	
	}
	
	
}
add_shortcode('highlight', 'RCHHighlight');
