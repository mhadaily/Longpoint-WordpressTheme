<?php
/**************************************
 * RCHTHEME Qoute Shortcode
 *
 * @package  RCHTHEME/Framework
 * @author   RCHTHEME
 * @link     http://www.rchtheme.com
**************************************/

if ( !function_exists('blockqoute') ) {
	function blockqoute($atts, $content=null)
	{			
		extract( shortcode_atts( array( 
			'type' => '',
			'author' => '',
			'align' => '',
			'display_large' => 1,
			'display_medium' => 1,
			'display_small' => 1,
			'display_extrasmall' => 1,
			'animation' => '',
			'class' => '',
			'style' => ''
		), $atts, 'qoute' ) );
		
		$content = remove_tags($content, array('p'));
		
		$id_attr = "rch-qoute-" . mt_rand (10,1000);
		
		$classes = 	$class . 
					($type != '' ? " {$type}" : '') .
					($align != '' ? " blockquote-{$align}" : '') .
					($animation != '' ? " animate {$animation}" : '') . 
					($display_large == 0 ? ' hidden-lg' : '' ) . 
					($display_medium == 0 ? ' hidden-md' : '') . 
					($display_small == 0 ? ' hidden-sm' : '') . 
					($display_extrasmall == 0 ? ' hidden-xs' : '');	
		
		$author = $author != '' ? '<footer><cite title="' . $author . '">' . $author . '</cite></footer>' : '';
		
		$output = '<blockquote id="' . $id_attr . '" class="'. $classes . '"><div class="content"><p>' . do_shortcode($content) . '</p>' . $author . '</div></blockquote>';
		
		if( $style != '' ){
			$output .= "<style type='text/css'>#{$id_attr}{ {$style} }</style>";
		}	
		
		return $output;
	}
}
add_shortcode('qoute', 'blockqoute');