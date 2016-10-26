<?php
/**************************************
 * RCHTHEME Font Icon Shortcode
 *
 * @package  RCHTHEME/Framework
 * @author   RCHTHEME
 * @link     http://www.rchtheme.com
**************************************/

/**************************************
 * RCHTHEME fonticon Shortcode
**************************************/
if ( !function_exists('RCHFonticon') ) {
	function RCHFonticon($atts)
	{			
		extract( shortcode_atts( array( 
			'icon' => '',
			'size' => 'lg',
			'customsize' => 0,
			'spinning' => '',
			'rotation' => '',
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
		), $atts, 'fonticon' ) );
				
		$id_attr = "rch-font-icon-" . mt_rand (10,1000);

		$classes =  $size .					
					($class != '' ? " {$class}" : '') .									
					($animation != '' ? " animate {$animation}" : '') . 
					($display_large == 0 ? ' hidden-lg' : '' ) . 
					($display_medium == 0 ? ' hidden-md' : '') . 
					($display_small == 0 ? ' hidden-sm' : '') . 
					($display_extrasmall == 0 ? ' hidden-xs' : '');						
					
		$iconClasses =  $icon . 
						(($background != '') || ($bordercolor != '') || ($bordersize != '') ? "  fa-fw" : '') .	
						($spinning == 1 ? ' fa-spin' : '') . 
						($rotation != '' ? " fa-{$rotation}" : '');
				
		$iconStyles = ($color != '' ? "color:{$color};" : '') .
					  (intval($customsize) != 0 ? "font-size:{$customsize}px;" : '') .
					   $style;		
		
		if($circle == 1){
			$return = '<span id="' . $id_attr . '" class="fa-stack fa-' . $size . '"><i class="fa fa-circle fa-stack-2x"></i><i class="fa ' . $iconClasses . ' fa-stack-1x fa-inverse"></i></span>';	
			
			$styles   = ($background != '' ? "#{$id_attr} i.fa-circle{ color: {$background};}" : '');	
			$styles  .= ($iconStyles != '' ? "#{$id_attr} i{ {$iconStyles} }" : '');
		}else{
			$return = '<span id="' . $id_attr . '" class="iconwrapp size-' . $classes  . '"><i class="fa fa-' . $size . ' ' . $iconClasses . '"></i></span>';
			
			$styles = 	($background  != '' ? "background-color:{$background};" : '') . 
						($bordercolor != '' ? "border-color:{$bordercolor};" 	: '') . 
						($bordersize  != '' ? "border-width:{$bordersize}px;" 	: '');

			$styles   = ($styles != '' ? "#{$id_attr}{ {$styles} }" : '');	
			$styles  .= ($iconStyles != '' ? "#{$id_attr} i{ {$iconStyles} }" : '');				
		}
		if( $styles != '' ){
			$return  .= "<style type='text/css'>{$styles}</style>";
		}
		return $return;
	}
}
add_shortcode('fonticon', 'RCHFonticon');
