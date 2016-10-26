<?php
/**************************************
 * RCHTHEME Container Shortcode
 *
 * @package  RCHTHEME/Framework
 * @author   RCHTHEME
 * @link     http://www.rchtheme.com
**************************************/

if ( !function_exists('RCHContainer') ) {
	function RCHContainer($atts, $content=null)
	{			
		extract( shortcode_atts( array( 			
			'full_width' => 1,
			'display_large' => 1,
			'display_medium' => 1,
			'display_small' => 1,
			'display_extrasmall' => 1,
			'animation' => '',
			'class' => '',
			'style' => ''
		), $atts, 'container' ) );
		
		$content = remove_tags($content, array('p'));
		
		$id_attr = "rch-qoute-" . mt_rand (10,1000);
		
		$classes = 	($full_width == 0 ? '-fluid' : '' ) . 					
					($class != '' ? " {$class}" : '') .
					($animation != '' ? " animate {$animation}" : '') . 
					($display_large == 0 ? ' hidden-lg' : '' ) . 
					($display_medium == 0 ? ' hidden-md' : '') . 
					($display_small == 0 ? ' hidden-sm' : '') . 
					($display_extrasmall == 0 ? ' hidden-xs' : '');	
					
		$output = '<div id="' . $id_attr . '" class="container' . $classes . '">';
		$output .= do_shortcode($content);
		$output .= '</div>';
		
		if( $style != '' ){
			$output .= "<style type='text/css'>#{$id_attr}{ {$style} }</style>";
		}	
		
		return $output;
	}
}
add_shortcode('container', 'RCHContainer');