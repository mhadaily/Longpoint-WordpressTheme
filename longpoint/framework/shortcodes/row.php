<?php
/**************************************
 * RCHTHEME Row Shortcode
 *
 * @package  RCHTHEME/Framework
 * @author   RCHTHEME
 * @link     http://www.rchtheme.com
**************************************/

if ( !function_exists('RCHRow') ) {
	function RCHRow($atts, $content=null)
	{			
		extract( shortcode_atts( array( 
			'display_large' => 1,
			'display_medium' => 1,
			'display_small' => 1,
			'display_extrasmall' => 1,
			'animation' => '',
			'class' => '',
			'style' => ''
		), $atts, 'row' ) );
		
		$content = remove_tags($content, array('p'));
		
		$id_attr = "rch-row-" . mt_rand (10,1000);

		$classes =   $class . 					
					($animation != '' ? " animate {$animation} " : '') . 
					($display_large == 0 ? ' hidden-lg' : '' ) . 
					($display_medium == 0 ? ' hidden-md' : '') . 
					($display_small == 0 ? ' hidden-sm' : '') . 
					($display_extrasmall == 0 ? ' hidden-xs' : '');		
		
		$return = '<div id="' . $id_attr . '" class="row '. $classes . '">';
		
		$return .= do_shortcode($content);
		
		$return .= '</div>';
						
		if( $style != '' ){
			$return  .= "<style type='text/css'>#{$id_attr}{ {$style} }</style>";
		}
		
		return $return;
	}
}
add_shortcode('row', 'RCHRow');