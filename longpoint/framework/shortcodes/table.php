<?php
/**************************************
 * RCHTHEME Table Shortcode
 *
 * @package  RCHTHEME/Framework
 * @author   RCHTHEME
 * @link     http://www.rchtheme.com
**************************************/

/**************************************
 * RCHTHEME Table Shortcode
**************************************/
if ( !function_exists('RCHTable') ) {
	function RCHTable($atts, $content=null)
	{			
		extract( shortcode_atts( array( 						
			'type' => '',
			'align' => '',				
			'hover' => 1,					
			'display_large' => 1,
			'display_medium' => 1,
			'display_small' => 1,
			'display_extrasmall' => 1,	
			'animation' => '',			
			'class' => '',
			'style' => ''
		), $atts, 'table' ) );
		
		$content = remove_tags($content, array('p'));
		$id = "rch-table-" . mt_rand (10,1000);
				
		switch($type){
			case 'style-2':
				$type = ' table table-striped';
			break;
			case 'style-3':
				$type = ' table table-bordered';
			break;
			default:
				$type = ' table';			
		}
		
		$classes =   $class . $type .
					($align != '' ? " align-{$align}" : '') .
					($hover == 0 ? '' : ' table-hover ') .
					($animation != '' ? " animate {$animation} " : '') . 
					($display_large == 0 ? ' hidden-lg' : '' ) . 
					($display_medium == 0 ? ' hidden-md' : '') . 
					($display_small == 0 ? ' hidden-sm' : '') . 
					($display_extrasmall == 0 ? ' hidden-xs' : '');				

		$output = '<div id="' . $id . '" class="' . $classes . '" data-type="rch-table">' . do_shortcode($content) . '</div>';
		
		if( $style != ''){
			$output  .= "<style type='text/css'>#{$id} table{ {$style} }</style>";
		}				
		return $output;
	}
	
}
add_shortcode('table', 'RCHTable');
