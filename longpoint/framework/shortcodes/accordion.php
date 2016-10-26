<?php
/**************************************
 * RCHTHEME Accordion Shortcode
 *
 * @package  RCHTHEME/Framework
 * @author   RCHTHEME
 * @link     http://www.rchtheme.com
**************************************/

/**************************************
 * RCHTHEME Accordion Shortcode
**************************************/
// this variable will hold your divs
$toggles_icon = '';
$accordion_id = '';
$toggle_no = 1;
if ( !function_exists('RCHAccordion') ) {
	function RCHAccordion($atts, $content=null)
	{	
		global $toggles_icon;
		global $accordion_id;
		global $toggle_no;
		// reset variables
		$toggles_icon = '';
		$accordion_id = '';		
		$toggle_no = 1;
		extract( shortcode_atts( array( 
			'toggle' => '',
			'open_icon' => '',			
			'close_icon' => '',	
			'spinning' => '',	
			'rotation' => '',					
			'display_large' => 1,
			'display_medium' => 1,
			'display_small' => 1,
			'display_extrasmall' => 1,	
			'animation' => '',			
			'class' => '',
			'style' => ''
		), $atts, 'accordion' ) );
		$toggles_icon = '<span class="icon"><i class="fa ' . $open_icon . ($spinning == 1 ? ' fa-spin' : '') . ($rotation != '' ? " fa-{$rotation}" : '') . ' toggle-open"></i><i class="fa ' . $close_icon . ($spinning == 1 ? ' fa-spin' : '') . ($rotation != '' ? " fa-{$rotation}" : '') . ' toggle-close"></i></span>';
		$accordion_id = ($toggle == 1 ? '' : "accordion" . $toggle_no . rand(100,999));
		$return =	'<div id="'. $accordion_id .'" class="panel-group accordions ' . $class . ($animation != '' ? " animate {$animation}" : '') . ($display_large == 0 ? ' hidden-lg' : '' ) . ($display_medium == 0 ? ' hidden-md' : '') . ($display_small == 0 ? ' hidden-sm' : '') . ($display_extrasmall == 0 ? ' hidden-xs' : '') . '" ' . ($style != '' ? " data-style='{$style}' style='{$style}'" : '') . '>';
		$return .= do_shortcode($content);		
		$return .=	'</div>';		
		return $return;
	}
}
add_shortcode('accordion', 'RCHAccordion');



/**************************************
 * RCHTHEME Tab Item Shortcode
**************************************/
if ( !function_exists('RCHToggle') ) {
	function RCHToggle($atts, $content=null)
	{			
		global $toggles_icon;
		global $accordion_id;
		global $toggle_no;		
		extract( shortcode_atts( array( 			
			'title' => '',
			'active' => '',	
			'display_large' => 1,
			'display_medium' => 1,
			'display_small' => 1,
			'display_extrasmall' => 1,
		), $atts, 'toggle' ) );						
		
		$toggle_id = "toggle" . $toggle_no . rand(100,999);
		$return = '<div class="panel panel-default' . ($display_large == 0 ? ' hidden-lg' : '' ) . ($display_medium == 0 ? ' hidden-md' : '') . ($display_small == 0 ? ' hidden-sm' : '') . ($display_extrasmall == 0 ? ' hidden-xs' : '') . '">';
		$return .= '<div class="panel-heading"><a href="#' . $toggle_id . '" data-toggle="collapse" data-parent="#' . $accordion_id . '" ' . ($active != 1 ? 'class="collapsed"' : '') . '>' . $toggles_icon . '<h4 class="panel-title">' . $title . '</h4></a></div>';
		$return .= '<div class="panel-collapse collapse' . ($active == 1 ? ' in' : '') . '" id="' . $toggle_id . '"><div class="panel-body">';
		$return .= do_shortcode($content);
		$return .= '</div></div></div>';	
		$toggle_no++;
		return $return;
	}
}
add_shortcode('toggle', 'RCHToggle');