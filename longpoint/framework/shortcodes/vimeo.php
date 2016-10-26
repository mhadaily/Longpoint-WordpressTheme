<?php
/**************************************
 * RCHTHEME Vimeo Shortcode
 *
 * @package  RCHTHEME/Framework
 * @author   RCHTHEME
 * @link     http://www.rchtheme.com
**************************************/

/**************************************
 * RCHTHEME Vimeo Shortcode
**************************************/
if ( !function_exists('RCHVimeo') ) {
	function RCHVimeo($atts)
	{			
		extract( shortcode_atts( array( 						
			'id' => '',
			'width' => '',	
			'height' => '',			
			'autoplay' => 0,
			'ssl' => 0,			
			'display_large' => 1,
			'display_medium' => 1,
			'display_small' => 1,
			'display_extrasmall' => 1,	
			'animation' => '',			
			'class' => '',
			'style' => ''
		), $atts, 'vimeo' ) );
		
		$id_attr = "rch-vimeo-" . mt_rand (10,1000);

		$classes =   $class . 
					($animation != '' ? " animate {$animation} " : '') . 
					($display_large == 0 ? ' hidden-lg' : '' ) . 
					($display_medium == 0 ? ' hidden-md' : '') . 
					($display_small == 0 ? ' hidden-sm' : '') . 
					($display_extrasmall == 0 ? ' hidden-xs' : '');	
		
		$output = '<div  id="' . $id_attr . '" class="responsive-video rch-vimeo ' . $classes . '"><iframe src="http' . ( $ssl == 1 ? 's' : '' ) . '://player.vimeo.com/video/' . $id . ( $autoplay == 1 ? '?autoplay=1' : '' ) . '" width="' . $width . '" height="' . $height . '" frameborder="0"></iframe></div>';
		
		$output  .= "<style type='text/css'>#{$id_attr}{ max-width:{$width}px;max-height:{$height}px; {$style} }</style>";
					
		return $output;		
	}
	
}
add_shortcode('vimeo', 'RCHVimeo');
