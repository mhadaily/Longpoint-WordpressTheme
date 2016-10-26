<?php
/**************************************
 * RCHTHEME Tooltip Shortcode
 *
 * @package  RCHTHEME/Framework
 * @author   RCHTHEME
 * @link     http://www.rchtheme.com
**************************************/

/**************************************
 * RCHTHEME Tooltip Shortcode
**************************************/
if ( !function_exists('RCHTooltip') ) {
	function RCHTooltip($atts, $content=null)
	{			
		extract( shortcode_atts( array( 						
			'tooltip_content' => '',
			'popover' => 0,						
			'title' => '',	
			'link' => '',			
			'position' => 'top',
			'link_type' => '',				
			'display_large' => 1,
			'display_medium' => 1,
			'display_small' => 1,
			'display_extrasmall' => 1,	
			'animation' => '',			
			'class' => '',
			'style' => ''
		), $atts, 'tooltip' ) );		
		
		$content = remove_tags($content, array('p'));
		
		$id_attr = "rch-tooltip-" . mt_rand (10,1000);
		
		$classes = 	$class . 
					($link_type == 'button' ? ' btn btn-default ' : '') . 
					($animation != '' ? " animate {$animation} " : '') . 
					($display_large == 0 ? ' hidden-lg' : '' ) . 
					($display_medium == 0 ? ' hidden-md' : '') . 
					($display_small == 0 ? ' hidden-sm' : '') . 
					($display_extrasmall == 0 ? ' hidden-xs' : '');
		
		$data  = ($popover == 1 ? " data-toggle='popover' data-original-title='{$title}' data-container='body' data-content='{$tooltip_content}'" : " data-toggle='tooltip' title='{$tooltip_content}'");
		
		$output = '<a id="' . $id_attr . '" class="' . $classes . '"' . ' href="' . ($link != '' ? $link : 'javascript:void(0);') . '" data-placement="' . $position . '" ' . $data . '>'. $content . '</a>';
		
		if( $style != '' ){
			$output .= "<style type='text/css'>#{$id_attr}{ {$style} }</style>";
		}	
		
		return $output;
		
	}
	
}
add_shortcode('tooltip', 'RCHTooltip');
