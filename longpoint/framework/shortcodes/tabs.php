<?php
/**************************************
 * RCHTHEME Tabs Shortcode
 *
 * @package  RCHTHEME/Framework
 * @author   RCHTHEME
 * @link     http://www.rchtheme.com
**************************************/

/**************************************
 * RCHTHEME Tabs Shortcode
**************************************/
// this variable will hold your divs
$tabs_content = '';
$tab_no = 1;
if ( !function_exists('RCHTabs') ) {
	function RCHTabs($atts, $content=null)
	{	
		global $tabs_content;
		global $tab_no;
		// reset contents
		$tabs_content = '';
		// reset tab number
		$tab_no = 1;
		extract( shortcode_atts( array( 
			'justified' => '',
			'vertical' => '',			
			'align' => '',					
			'display_large' => 1,
			'display_medium' => 1,
			'display_small' => 1,
			'display_extrasmall' => 1,	
			'animation' => '',			
			'class' => '',
			'style' => ''
		), $atts, 'tabs	' ) );
				
		$id_attr = "rch-tabs-" . mt_rand (10,1000);
		
		$classes = 	$class . 										
					($animation != '' ? " animate {$animation}" : '') . 
					($display_large == 0 ? ' hidden-lg' : '' ) . 
					($display_medium == 0 ? ' hidden-md' : '') . 
					($display_small == 0 ? ' hidden-sm' : '') . 
					($display_extrasmall == 0 ? ' hidden-xs' : '');			
		
		$output  = '<div id="' . $id_attr . '" class="' . $classes  . '">';
		$output .= ($vertical == 1 ? '<div class="row"><div class="col-xs-3' . ($align == 'right' ? ' pull-right' : '') . '">' : '');
		$output .= '<ul class="nav nav-tabs ' . ($vertical == 1 ? ($align == 'right' ? 'tabs-right' : 'tabs-left') : ($justified == 1 ? ' nav-justified' : ''))  . '">';
		$output .= do_shortcode($content);
		$output .= '</ul>';
		$output .= ($vertical == 1 ? '</div><div class="col-xs-9">' : '');
		$output .= '<div class="tab-content">' . $tabs_content . '</div>';
		$output .= ($vertical == 1 ? '</div></div>' : '');
		$output .= '</div>';
		
		if( $style != '' ){
			$output .= "<style type='text/css'>#{$id_attr}{ {$style} }</style>";
		}
		
		return $output;
	}
}
add_shortcode('tabs', 'RCHTabs');



/**************************************
 * RCHTHEME Tab Item Shortcode
**************************************/
if ( !function_exists('RCHTabitem') ) {
	function RCHTabitem($atts, $content=null)
	{			
		global $tabs_content;
		global $tab_no;
		
		extract( shortcode_atts( array( 			
			'title' => '',
			'active' => '',	
			'display_large' => 1,
			'display_medium' => 1,
			'display_small' => 1,
			'display_extrasmall' => 1,
		), $atts, 'tab' ) );						
		
		$tab_id = "tab" . $tab_no . rand(100,999);
		
		$classes =  ($active == 1 ? 'active in' : '') . 
					($display_large == 0 ? ' hidden-lg' : '' ) . 
					($display_medium == 0 ? ' hidden-md' : '') . 
					($display_small == 0 ? ' hidden-sm' : '') . 
					($display_extrasmall == 0 ? ' hidden-xs' : '');
					
		$output = '<li class="' . $classes . '"><a href="#' . $tab_id . '" data-toggle="tab">' . $title . '</a></li>';
		
		$tabs_content .= '<div class="tab-pane fade ' . $classes . '" id="' . $tab_id . '">';
		$tabs_content .= do_shortcode($content);
		$tabs_content .= '</div>';
		
		$tab_no++;
		
		return $output;
	}
}
add_shortcode('tab', 'RCHTabitem');