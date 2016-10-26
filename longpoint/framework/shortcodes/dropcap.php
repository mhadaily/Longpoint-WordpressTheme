<?php
/**************************************
 * RCHTHEME Dropcap Shortcode
 *
 * @package  RCHTHEME/Framework
 * @author   RCHTHEME
 * @link     http://www.rchtheme.com
**************************************/

/**************************************
 * RCHTHEME dropcap Shortcode
**************************************/
if ( !function_exists('RCHDropcap') ) {
	function RCHDropcap($atts)
	{			
		extract( shortcode_atts( array( 			
			'character' => '',	
			'size' => '1x',			
			'circle' => '',
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
		), $atts, 'dropcap' ) );
		
		$id_attr = "rch-dropcap-" . mt_rand (10,1000);

		$classes =  $class .
					($size != '' ? " size-{$size} " : '') .
					($circle == 1 ? ' circle': '') .
					($animation != '' ? " animate {$animation}" : '') . 
					($display_large == 0 ? ' hidden-lg' : '' ) . 
					($display_medium == 0 ? ' hidden-md' : '') . 
					($display_small == 0 ? ' hidden-sm' : '') . 
					($display_extrasmall == 0 ? ' hidden-xs' : '');		
		
		$styles = 	($background != '' ? "background-color:{$background};" : '') . 
					($bordercolor != '' ? "border-color:{$bordercolor};" : '') . 
					($bordersize != '' ? "border-width:{$bordersize}px;" : '') .
					($color != '' ? "color:{$color};" : '') . 
					$style;
		
		$return = '<span id="' . $id_attr . '" class="dropcap ' .  $classes . '">' . $character . '</span>';		
						
		if( $styles != '' ){
			$return  .= "<style type='text/css'>#{$id_attr}{ {$styles} }</style>";
		}
		
		return $return;
	}
}
add_shortcode('dropcap', 'RCHDropcap');
