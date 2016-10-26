<?php
/**************************************
 * RCHTHEME Notification Shortcode
 *
 * @package  RCHTHEME/Framework
 * @author   RCHTHEME
 * @link     http://www.rchtheme.com
**************************************/

/**************************************
 * RCHTHEME Notification Shortcode
**************************************/
if ( !function_exists('RCHNotification') ) {
	function RCHNotification($atts, $content=null)
	{			
		extract( shortcode_atts( array( 						
			'type' => 'default',
			'hide_close_button' => 0,						
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
		), $atts, 'notification' ) );		
		
		$content = remove_tags($content, array('p'));
		
		$id_attr = "rch-notification-" . mt_rand (10,1000);
		
		$classes =  $type .
					($class != '' ? " {$class}" : '') . 
					($hide_close_button == 1 ? '' : ' alert-dismissable') . 
					($animation != '' ? " animate {$animation}" : '') . 
					($display_large == 0 ? ' hidden-lg' : '' ) . 
					($display_medium == 0 ? ' hidden-md' : '') . 
					($display_small == 0 ? ' hidden-sm' : '') . 
					($display_extrasmall == 0 ? ' hidden-xs' : '');
		
		$icon = ($icon != '' ? '<i class="fa pull-left fa-3x ' . $icon . ($spinning == 1 ? ' fa-spin' : '') . ($rotation != '' ? " fa-{$rotation}" : '') . '"></i> '  : '');
		
		$closable = ($hide_close_button == 1 ? '' : '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>');
		
		$output = '<div id="' . $id_attr . '" class="alert alert-' . $classes . '">' . $closable . $icon . do_shortcode($content) . '</div>';
		
		if( $style != '' ){
			$output .= "<style type='text/css'>#{$id_attr}{ {$style} }</style>";
		}		
		return $output;	
	}
	
	
}
add_shortcode('notification', 'RCHNotification');
