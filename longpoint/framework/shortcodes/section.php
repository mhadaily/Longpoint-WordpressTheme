<?php
/**************************************
 * RCHTHEME Section Shortcode
 *
 * @package  RCHTHEME/Framework
 * @author   RCHTHEME
 * @link     http://www.rchtheme.com
**************************************/

if ( !function_exists('RCHSection') ) {
	function RCHSection($atts, $content=null)
	{			
		extract( shortcode_atts( array( 			
			'type' => '',
			'display_large' => 1,
			'display_medium' => 1,
			'display_small' => 1,
			'display_extrasmall' => 1,
			'align' => '',
			'animation' => '',
			'class' => '',
			'style' => ''
		), $atts, 'section' ));
		
		$id = "rch-section-" . mt_rand (10,1000);
		
		$classes =   $class . 					
					($type != '' ? " {$type}" : '') .
					($animation != '' ? " animate {$animation}" : '') .
					($align != '' ? " align-{$align}" : '') . 
					($display_large == 0 ? ' hidden-lg' : '' ) . 
					($display_medium == 0 ? ' hidden-md' : '') . 
					($display_small == 0 ? ' hidden-sm' : '') . 
					($display_extrasmall == 0 ? ' hidden-xs' : '');	
		
		$content = remove_tags($content, array('p'));
		
		$return = '<section id="' . $id . '"' . ($classes != '' ? " class='{$classes}'" : '' ) . '>';
		$return .= do_shortcode($content);
		$return .= '</section>';
		
		if($style != '' ){
			$return  .= "<style type='text/css'>#{$id}{ {$style} }</style>";
		}
		
		return $return;
	}
}
add_shortcode('section', 'RCHSection');