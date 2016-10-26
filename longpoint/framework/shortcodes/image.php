<?php
/**************************************
 * RCHTHEME Image Shortcode
 *
 * @package  RCHTHEME/Framework
 * @author   RCHTHEME
 * @link     http://www.rchtheme.com
**************************************/

/**************************************
 * RCHTHEME Image Shortcode
**************************************/
if ( !function_exists('RCHImage') ) {
	function RCHImage($atts)
	{			
		extract( shortcode_atts( array( 						
			'src' => '',
			'width' => '',	
			'height' => '',	
			'frame' => '',	
			'border_size' => '',	
			'border_color' => '',
			'align' => '',	
			'alt' => '',			
			'lightbox' => 0,			
			'display_large' => 1,
			'display_medium' => 1,
			'display_small' => 1,
			'display_extrasmall' => 1,	
			'animation' => '',			
			'class' => '',
			'style' => ''
		), $atts, 'image' ) );
		
		$id = "rch-image-" . mt_rand (10,1000);

		$classes =   $class . 					
					($animation != '' ? " animate {$animation} " : '') .
					($align != '' ? " align-{$align} " : '') . 
					($display_large == 0 ? ' hidden-lg' : '' ) . 
					($display_medium == 0 ? ' hidden-md' : '') . 
					($display_small == 0 ? ' hidden-sm' : '') . 
					($display_extrasmall == 0 ? ' hidden-xs' : '');	
		
		$attributes = 	"id='{$id}'" .						
						($alt != '' ? " alt='{$alt}' " : '') .
						($width != '' ? " width='{$width}' " : '') .
						($height != '' ? " height='{$height}' " : '') .
						($src != '' ? " src='{$src}' " : '');
		
		$output = '';
		
		if( $lightbox == 1 ){
			$output .= '<a href="' . $src . '" class="cboxElement" rel="lightbox"' . ($alt != '' ? " title='{$alt}' " : '') . '>';
		}
		
		$output .= '<div id=' . $id . ' class="rch-image-wrapper ' . $classes . '"><img src="' . $src . '" class="rch-image ' . ($frame != '' ? " img-{$frame}" : '') .  '" ' . $attributes . '/></div>';				
		
		if( $lightbox == 1 ){
			$output .= '</a>';
		}
		
		$styles = '';
		if($frame == 'thumbnail'){
			$styles  = ($border_size != '' ? "border-width:{$border_size}px;" : '');
			$styles .= ($border_color != '' ? "border-color:{$border_color};" : '');
		}
		$styles .= $style;
				
		if($styles != '' ){
			$output  .= "<style type='text/css'>#{$id} img{ {$styles} }</style>";
		}
					
		return $output;		
	}
	
}
add_shortcode('image', 'RCHImage');
