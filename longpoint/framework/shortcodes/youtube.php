<?php
/**************************************
 * RCHTHEME Youtube Shortcode
 *
 * @package  RCHTHEME/Framework
 * @author   RCHTHEME
 * @link     http://www.rchtheme.com
**************************************/

/**************************************
 * RCHTHEME Youtube Shortcode
**************************************/
if ( !function_exists('RCHYoutube') ) {
	function RCHYoutube($atts)
	{			
		extract( shortcode_atts( array( 						
			'id' => '',
			'width' => '',	
			'height' => '',			
			'autoplay' => 0,			
			'display_large' => 1,
			'display_medium' => 1,
			'display_small' => 1,
			'display_extrasmall' => 1,	
			'animation' => '',			
			'class' => '',
			'style' => ''
		), $atts, 'youtube' ) );
		
		$id_attr = "rch-youtube-" . mt_rand (10,1000);

		$classes =   $class . 
					($animation != '' ? " animate {$animation} " : '') . 
					($display_large == 0 ? ' hidden-lg' : '' ) . 
					($display_medium == 0 ? ' hidden-md' : '') . 
					($display_small == 0 ? ' hidden-sm' : '') . 
					($display_extrasmall == 0 ? ' hidden-xs' : '');	
				
		$output = '<div id="' . $id_attr . '" class="rch-youtube responsive-video' . $classes . '"><iframe title="YouTube video player" width="' . $width . '" height="' . $height . '" src="http://www.youtube.com/embed/' . $id . '?wmode=transparent' . ( $autoplay == 1 ? '&amp;autoplay=1' : '' ) . '" frameborder="0" allowfullscreen></iframe></div>';
		
		$output  .= "<style type='text/css'>#{$id_attr}{ max-width:{$width}px;max-height:{$height}px; {$style} }</style>";
					
		return $output;		
	}
	
}
add_shortcode('youtube', 'RCHYoutube');
