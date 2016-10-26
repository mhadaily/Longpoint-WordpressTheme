<?php
/**************************************
 * RCHTHEME Text Block Shortcode
 *
 * @package  RCHTHEME/Framework
 * @author   RCHTHEME
 * @link     http://www.rchtheme.com
**************************************/

/**************************************
 * RCHTHEME Text Block Shortcode
**************************************/
if ( !function_exists('RCHTextblock') ) {
	function RCHTextblock($atts, $content=null)
	{			
		extract( shortcode_atts( array( 									
			'align' => '',			
			'color' => '',				
			'font_size' => '',
			'font_weight' => '',				
			'display_large' => 1,
			'display_medium' => 1,
			'display_small' => 1,
			'display_extrasmall' => 1,	
			'animation' => '',			
			'class' => '',
			'style' => ''
		), $atts, 'textblock' ) );
		
		$content = remove_tags($content, array('p'));
		
		$id_attr = "rch-textblock-" . mt_rand (10,1000);
		
		$classes = $class . 
				($align != '' ? " align-{$align} " : '') . 
				($animation != '' ? " animate {$animation} " : '') . 
				($display_large == 0 ? ' hidden-lg' : '' ) . 
				($display_medium == 0 ? ' hidden-md' : '') . 
				($display_small == 0 ? ' hidden-sm' : '') . 
				($display_extrasmall == 0 ? ' hidden-xs' : '');
		
		$styles = ($color != '' ? "color: {$color};" : '') . 
				  ($font_size != '' ? "font-size: {$font_size}px;" : '') . 
				  ($font_weight != '' ? "font-weight: {$font_weight};" : '') . 				  
				  $style;		
				  
		$output = '<p id="' . $id_attr . '" class="textblock ' . $classes .'">' . do_shortcode($content) . '</p>';
		
		if( $styles != '' ){
			$output .= "<style type='text/css'>#{$id_attr}{ {$styles} }</style>";
		}		
		return $output;	
	}
	
	
}
add_shortcode('textblock', 'RCHTextblock');
