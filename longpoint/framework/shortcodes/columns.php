<?php
/**************************************
 * RCHTHEME Grid Columns Shortcode
 *
 * @package  RCHTHEME/Framework
 * @author   RCHTHEME
 * @link     http://www.rchtheme.com
**************************************/

if ( !function_exists('grid_column') ) {
	function grid_column($atts, $content=null, $shortcodename ="")
	{		
		extract( shortcode_atts( array(
			'align' => '',
			'display_large' => 1,
			'display_medium' => 1,
			'display_small' => 1,
			'display_extrasmall' => 1,
			'animation' => '',
			'class' => '',
			'style' => ''		
		), $atts ) );
		$content = remove_tags($content, array('p'));
		$columnNumber = '';
		switch($shortcodename){
			case 'full_width':
				$columnNumber = 12;
			break;
			case 'one_half':
				$columnNumber = 6;
			break;
			case 'one_third':
				$columnNumber = 4;
			break;
			case 'two_third':
				$columnNumber = 8;
			break;
			case 'one_fourth':
				$columnNumber = 3;
			break;
			case 'three_fourth':
				$columnNumber = 9;
			break;
			case 'one_sixth':
				$columnNumber = 2;
			break;
			case 'five_sixth':
				$columnNumber = 10;
			break;
		}		
		
		$id_attr = "rch-column-" . mt_rand (10,1000);

		$classes =   $class . 
					($align != '' ? " align-{$align}" : '') .
					($animation != '' ? " animate {$animation} " : '') . 
					($display_large == 0 ? ' hidden-lg' : '' ) . 
					($display_medium == 0 ? ' hidden-md' : '') . 
					($display_small == 0 ? ' hidden-sm' : '') . 
					($display_extrasmall == 0 ? ' hidden-xs' : '');					
		
		// add divs to the content
		$return = '<div id="' . $id_attr . '" class="col-md-'. $columnNumber . " {$classes}" . '">';
		$return .= do_shortcode($content);
		$return .= '</div>';
				
		if( $style != '' ){
			$return  .= "<style type='text/css'>#{$id_attr}{ {$style} }</style>";
		}
		
		return $return;
	}
}
add_shortcode('full_width', 'grid_column');
add_shortcode('one_half', 'grid_column');
add_shortcode('one_third', 'grid_column');
add_shortcode('two_third', 'grid_column');
add_shortcode('one_fourth', 'grid_column');
add_shortcode('three_fourth', 'grid_column');
add_shortcode('one_sixth', 'grid_column');
add_shortcode('five_sixth', 'grid_column');

// Grid Columns

if ( !function_exists('grid_column_numeric') ) {
	function grid_column_numeric($atts, $content=null, $shortcodename ="")
	{		
		extract( shortcode_atts( array(
			'align' => '',
			'display_large' => 1,
			'display_medium' => 1,
			'display_small' => 1,
			'display_extrasmall' => 1,
			'animation' => '',
			'class' => '',
			'style' => ''			
		), $atts, 'one_half' ) );
		$content = remove_tags($content, array('p'));

		$id_attr = "rch-column-" . mt_rand (10,1000);

		$classes =   $class . 
					($align != '' ? " align-{$align}" : '') .
					($animation != '' ? " animate {$animation} " : '') . 
					($display_large == 0 ? ' hidden-lg' : '' ) . 
					($display_medium == 0 ? ' hidden-md' : '') . 
					($display_small == 0 ? ' hidden-sm' : '') . 
					($display_extrasmall == 0 ? ' hidden-xs' : '');					
		
		
		// add divs to the content
		$return = '<div id="' . $id_attr . '" class="col-md-'. intval(str_replace('column', '' ,$shortcodename)) . " {$classes}" . '">';		
		$return .= do_shortcode($content);
		$return .= '</div>';
		
		if( $style != '' ){
			$return  .= "<style type='text/css'>#{$id_attr}{ {$style} }</style>";
		}
		
		return $return;
	}
}
add_shortcode('column1', 'grid_column_numeric');
add_shortcode('column2', 'grid_column_numeric');
add_shortcode('column3', 'grid_column_numeric');
add_shortcode('column4', 'grid_column_numeric');
add_shortcode('column5', 'grid_column_numeric');
add_shortcode('column6', 'grid_column_numeric');
add_shortcode('column7', 'grid_column_numeric');
add_shortcode('column8', 'grid_column_numeric');
add_shortcode('column9', 'grid_column_numeric');
add_shortcode('column10', 'grid_column_numeric');
add_shortcode('column11', 'grid_column_numeric');
add_shortcode('column12', 'grid_column_numeric');