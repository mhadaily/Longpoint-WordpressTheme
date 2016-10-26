<?php
/**************************************
 * RCHTHEME Content Box Shortcode
 *
 * @package  RCHTHEME/Framework
 * @author   RCHTHEME
 * @link     http://www.rchtheme.com
**************************************/

/**************************************
 * RCHTHEME Content Box Shortcode
**************************************/
if ( !function_exists('RCHContentBox') ) {
	function RCHContentBox($atts, $content=null)
	{			
		extract( shortcode_atts( array( 						
			'border_size' => '',
			'border_color' => '',	
			'background_color' => '',
			'background_image' => '',
			'stretch_background' => 0,
			'fixed_background' => 0,
			'fixed_background_speed' => 0.5,	
			'background_pattern' => '',
			'padding_vertical' => '',
			'padding_horizental' => '',	
			'min_height' => '',			
			'display_large' => 1,
			'display_medium' => 1,
			'display_small' => 1,
			'display_extrasmall' => 1,	
			'animation' => '',			
			'class' => '',
			'style' => ''
		), $atts, 'content_box' ) );
		
		$id = "rch-content-box-" . mt_rand (10,1000);
		
		$style = ($border_size != '' ? "border-width:{$border_size}px;" : '') .
				 ($border_color != '' ? "border-color:{$border_color};" : '') . 
				 ($background_color != '' ? "background-color:{$background_color};" : '') . 
				 ($background_pattern != '' ? "background-image:url('" . get_template_directory_uri() . "/images/bg/{$background_pattern}');" : '') . 
				 ($background_image != '' ? "background-image:url('{$background_image}');" : '') . 				  
				 ($stretch_background == 1 ? "background-size: cover;" : '') . 
				 ($padding_vertical != '' ? "padding-top:{$padding_vertical}px;padding-bottom:{$padding_vertical}px;" : '') . 
				 ($padding_horizental != '' ? "padding-left:{$padding_horizental}px;padding-right:{$padding_horizental}px;" : '') . 
				 ($min_height != '' ? "min-height:{$min_height}px;" : '') . 
				 $style;

		$classes =   $class . 
					($animation != '' ? " animate {$animation} " : '') . 
					($display_large == 0 ? ' hidden-lg' : '' ) . 
					($display_medium == 0 ? ' hidden-md' : '') . 
					($display_small == 0 ? ' hidden-sm' : '') . 
					($display_extrasmall == 0 ? ' hidden-xs' : '');	
		
		$attribute = $fixed_background == 1 ? "data-stellar-background-ratio='{$fixed_background_speed}'" : '';
		
		$output = '<div id="' . $id . '" class="content-boxed rch-shortcode ' . $classes . '" ' . $attribute . '>' . do_shortcode($content) . '</div>';
		
		if( $style != ''){
			$output  .= "<style type='text/css'>#{$id}{ {$style} }</style>";
		}				
		return $output;
	}
	
}
add_shortcode('content_box', 'RCHContentBox');
