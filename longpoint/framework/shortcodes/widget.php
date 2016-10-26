<?php
/**************************************
 * RCHTHEME Widget Shortcode
 *
 * @package  RCHTHEME/Framework
 * @author   RCHTHEME
 * @link     http://www.rchtheme.com
**************************************/

if ( !function_exists('RCHWidget') ) {
	function RCHWidget($atts)
	{	
		// global $wp_widget_factory;
		extract( shortcode_atts( array( 			
			'name' => '',
			'display_large' => 1,
			'display_medium' => 1,
			'display_small' => 1,
			'display_extrasmall' => 1,
			'animation' => '',
			'class' => '',
			'style' => ''
		), $atts, 'widget' ));
		
		$id = "rch-widget-" . mt_rand (10,1000);
		
		$classes =   $class . 										
					($animation != '' ? " animate {$animation}" : '') .
					($display_large == 0 ? ' hidden-lg' : '' ) . 
					($display_medium == 0 ? ' hidden-md' : '') . 
					($display_small == 0 ? ' hidden-sm' : '') . 
					($display_extrasmall == 0 ? ' hidden-xs' : '');	
		
		$args = array(
			'before_widget' => '<div class="box widget">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title">',
			'after_title'   => '</div>',
		);

		ob_start();		
		dynamic_sidebar( $name );
		
		$output = '<section id="' . $id . '"' . ($classes != '' ? " class='{$classes}'" : '' ) . '>';
		$output = ob_get_clean();
		$output .= '</section>';
		
		if($style != '' ){
			$output  .= "<style type='text/css'>#{$id}{ {$style} }</style>";
		}
		
		return $output;
	}
}
add_shortcode('widget', 'RCHWidget');