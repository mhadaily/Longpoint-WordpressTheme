<?php
/**************************************
 * RCHTHEME Button Shortcode
 *
 * @package  RCHTHEME/Framework
 * @author   RCHTHEME
 * @link     http://www.rchtheme.com
**************************************/

/**************************************
 * RCHTHEME Button Shortcode
**************************************/
if ( !function_exists('RCHButton') ) {
	function RCHButton($atts, $content=null)
	{			
		extract( shortcode_atts( array( 
			'link' => '',
			'type' => 'default',			
			'size' => '',			
			'icon' => '',
			'spinning' => '',
			'rotation' => '',			
			'color' => '',
			'background' => '',
			'bordercolor' => '',
			'bordersize' => '',			
			'display_large' => 1,
			'display_medium' => 1,
			'display_small' => 1,
			'display_extrasmall' => 1,	
			'animation' => '',			
			'class' => '',
			'style' => ''
		), $atts, 'button' ) );
			
		$content = remove_tags($content, array('p'));
		
		$id_attr = "rch-button-" . mt_rand (10,1000);

		$classes =  $type . 				
					($class != '' ? " {$class}" : ' ') .
					($size != '' ? " btn-{$size}" : ' ') .					
					($display_large == 0 ? ' hidden-lg' : '' ) . 
					($display_medium == 0 ? ' hidden-md' : '') . 
					($display_small == 0 ? ' hidden-sm' : '') . 
					($display_extrasmall == 0 ? ' hidden-xs' : '');		
		
		$styles = 	($color != '' ? "color:{$color};" : '') .
					($background != '' ? "background-color:{$background};background-image: none;" : '') .
					($bordercolor != '' ? "border-color:{$bordercolor};" : '') . 
					($bordersize != '' ? "border-width:{$bordersize}px;" : '') .
					$style;
		
		$icon = ($icon != '' ? '<i class="fa ' . $icon . ($spinning == 1 ? ' fa-spin' : '') . ($rotation != '' ? " fa-{$rotation}" : '') . '"></i> ' : '');
		
		$return = '<a id="' . $id_attr . '" href="'. $link .'" class="btn btn-' . $classes . '" ' . ($animation != '' ? "data-wow-duration='0.15s' data-animation=' animate {$animation}'" : '') . ' role="button">' . $icon . $content .'</a>';		
				
		if( $styles != '' ){
			$return  .= "<style type='text/css'>#{$id_attr}{ {$styles} }</style>";
		}
		
		return $return;
	}
}
add_shortcode('button', 'RCHButton');
