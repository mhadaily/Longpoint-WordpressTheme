<?php
/**************************************
 * RCHTHEME Title Shortcode
 *
 * @package  RCHTHEME/Framework
 * @author   RCHTHEME
 * @link     http://www.rchtheme.com
**************************************/

/**************************************
 * RCHTHEME Title Shortcode
**************************************/
if ( !function_exists('RCHTitle') ) {
	function RCHTitle($atts, $content=null)
	{			
		extract( shortcode_atts( array( 			
			'second_title' => '',
			'type' => 'h3',
			'pattern' => 0,			
			'color' => '',
			'pattern_color' => '',
			'font_size' => '',
			'font_weight' => '',
			'align' => '',		
			'icon' => '',			
			'spinning' => '',
			'rotation' => '',			
			'display_large' => 1,
			'display_medium' => 1,
			'display_small' => 1,
			'display_extrasmall' => 1,	
			'animation' => '',			
			'class' => '',
			'style' => ''
		), $atts, 'title' ) );
		
		$content = remove_tags($content, array('p'));
		
		$id_attr = "rch-title-" . mt_rand (10,1000);
		
		$classes =  $class . 
					($pattern == 1 ? ' pattern': '') . 
					($align != '' ? " align-{$align}": '') . 
					($animation != '' ? " animate {$animation} " : '') . 
					($display_large == 0 ? ' hidden-lg' : '' ) . 
					($display_medium == 0 ? ' hidden-md' : '') . 
					($display_small == 0 ? ' hidden-sm' : '') . 
					($display_extrasmall == 0 ? ' hidden-xs' : '');
		
		$style = ($color != '' ? "color: {$color};" : '') . 
				 ($font_size != '' ? "font-size: {$font_size}px;" : '') . 
				 ($font_weight != '' ? "font-weight: {$font_weight};" : '') . 
				 (($pattern == 1) && ($pattern_color != '') ? "background-color:{$pattern_color};" : '') . 
				 $style;
		
		$icon = ($icon != '' ? '<i class="fa ' . $icon . ($spinning == 1 ? ' fa-spin' : '') . ($rotation != '' ? " fa-{$rotation}" : '') . '"></i> '  : '');
		
		$output = '<' . $type . ' id="' . $id_attr . '"' . ($classes != '' ? " class='{$classes}'" : '') . '>' . $icon . do_shortcode($content) . ($second_title != '' ? ' <small' . ($color != '' ? " style='color: {$color};'" : '') . ">{$second_title}</small>" : '') . "</{$type}>";
		
		if( $style != '' ){
			$output .= "<style type='text/css'>#{$id_attr}{ {$style} }</style>";
		}	
		
		return $output;
	}	
}
add_shortcode('title', 'RCHTitle');
