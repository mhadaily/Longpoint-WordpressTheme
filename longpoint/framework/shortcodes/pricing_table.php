<?php
/**************************************
 * RCHTHEME Pricing Table Shortcode
 *
 * @package  RCHTHEME/Framework
 * @author   RCHTHEME
 * @link     http://www.rchtheme.com
**************************************/

/**************************************
 * RCHTHEME Pricing Table Shortcode
**************************************/
// this variable will hold your divs
$column_no = 1;
if ( !function_exists('RCHPricingTable') ) {
	function RCHPricingTable($atts, $content=null)
	{	
		global $column_no;
		// reset variables		
		extract( shortcode_atts( array( 			
			'column' => '',					
			'display_large' => 1,
			'display_medium' => 1,
			'display_small' => 1,
			'display_extrasmall' => 1,	
			'animation' => '',			
			'class' => '',
			'style' => ''
		), $atts, 'pricing_table' ) );
				
		$column_no = $column;
		$attr_id = "rch-pricing-table-" . mt_rand (10,1000);

		$classes =   $class . 
					("rch-pricing-table").
					($animation != '' ? " animate {$animation}" : '') . 
					($display_large == 0 ? ' hidden-lg' : '' ) . 
					($display_medium == 0 ? ' hidden-md' : '') . 
					($display_small == 0 ? ' hidden-sm' : '') . 
					($display_extrasmall == 0 ? ' hidden-xs' : '');					
		
		$output =	'<div id="'. $attr_id .'"' . ($classes!='' ? " class='{$classes}'" : '') . '>';
		$output .= do_shortcode($content);		
		$output .=	'</div>';
		if($style != ''){
			$output  .= "<style type='text/css'>#{$id_attr}{ {$style} }</style>";
		}
		return $output;			
	}
}
add_shortcode('pricing_table', 'RCHPricingTable');



/**************************************
 * RCHTHEME Pricing Column Shortcode
**************************************/
if ( !function_exists('RCHPricingColumn') ) {
	function RCHPricingColumn($atts, $content=null)
	{					
		global $column_no;		
		extract( shortcode_atts( array(
			'title' => '',			
			'price' => '',
			'feature' => 0,
			'currency' => '',			
			'button_title' => '',
			'link' => '',
			'display_large' => 1,
			'display_medium' => 1,
			'display_small' => 1,
			'display_extrasmall' => 1,
			'animation' => '',			
			'class' => '',
			'style' => ''
		), $atts, 'pricing_column' ) );						
		
		switch($column_no){
			case '1':
				$columnNumber = 12;
			break;
			case '2':
				$columnNumber = 6;
			break;
			case '3':
				$columnNumber = 4;
			break;			
			case '4':
				$columnNumber = 3;
			break;				
		}	
		
		$attr_id = "rch-pricing-column-" . rand(100,999);
		
		$classes =  "col-xs-{$columnNumber} " . 
					($feature != 1 ? 'plan-standard' : 'plan-popular') . 
					($class != '' ? " {$class}" : '') . 
					($animation != '' ? " animate {$animation}" : '') . 
					($display_large == 0 ? ' hidden-lg' : '' ) . 
					($display_medium == 0 ? ' hidden-md' : '') . 
					($display_small == 0 ? ' hidden-sm' : '') . 
					($display_extrasmall == 0 ? ' hidden-xs' : '');	
		
		$output  = "<ul id='{$attr_id}' class='{$classes}'>";
		$output .= "<li class='heading'>{$title}</li>";
		$output .= "<li class='price'><span>{$currency}</span>{$price}</li>";
		$output .= "<li class='content'>";
		$output .= do_shortcode($content);
		$output .= $link != '' ? "<a href='{$link}' title='{$button_title}' class='btn btn-inverse'>{$button_title}</a>" : '';
		$output .= '</li>';
		$output .= '</ul>';     
		
		if($style != ''){
			$output  .= "<style type='text/css'>#{$id_attr}{ {$style} }</style>";
		}
		
		return $output;			
	}
}
add_shortcode('pricing_column', 'RCHPricingColumn');