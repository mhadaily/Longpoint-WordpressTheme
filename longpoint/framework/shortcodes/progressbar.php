<?php
/**************************************
 * RCHTHEME Progress Bar Shortcode
 *
 * @package  RCHTHEME/Framework
 * @author   RCHTHEME
 * @link     http://www.rchtheme.com
**************************************/

/**************************************
 * RCHTHEME Progress Bar Shortcode
**************************************/
if ( !function_exists('RCHProgressBar') ) {
	function RCHProgressBar($atts)
	{			
		extract( shortcode_atts( array( 						
			'label' => '',
			'filled' => '',	
			'filled_color' => '',
			'unfilled_color' => '',
			'striped' => 0,	
			'active' => 0,	
			'display_large' => 1,
			'display_medium' => 1,
			'display_small' => 1,
			'display_extrasmall' => 1,	
			'animation' => '',			
			'class' => '',
			'style' => ''
		), $atts, 'progress_bar' ) );				
		
		$id_attr = "rch-progress-bar-" . mt_rand (10,1000);
		
		$classes = $class . 
				   ($striped == 1 ? ' progress-striped' : '') . 
				   ($active == 1 ? ' active' : '') . 
				   //($animation != '' ? " animate {$animation} " : '') . 
				   ($display_large == 0 ? ' hidden-lg' : '' ) . 
				   ($display_medium == 0 ? ' hidden-md' : '') . 
			  	   ($display_small == 0 ? ' hidden-sm' : '') . 
				   ($display_extrasmall == 0 ? ' hidden-xs' : '');		
		
		$animation = ($animation != '' ? $animation : (is_rtl() ? 'slideInRight' : 'slideInLeft' ));
		
		$styles = ($unfilled_color !='' ? "background-color:{$unfilled_color};background-image: none;" : '') . $style ;
		
		$progress_style = ($filled != '' ? "width:{$filled}%;" : '') .
						 ($filled_color !='' ? ( $striped == 1 ? "background-color:{$filled_color};" : "background:{$filled_color};" ) : '');
		
		$output  = '<div id="' . $id_attr . '" class="progress ' . $classes . '" data-placement="top" data-toggle="tooltip" title="' . $filled . '%" data-original-title="' . $filled . '%">';
		$output .= '<div class="progress-bar animate ' . $animation . '"  role="progressbar" aria-valuenow="' . $filled . '" aria-valuemin="0" aria-valuemax="100">';
		$output .= '<span>' . $label . '</span>';
		$output .= '</div></div>';
		
		if( ($styles != '') || ($progress_style != '') ){
			$output .= "<style type='text/css'>";
			$output .= ($styles != '' ? "#{$id_attr}{ {$styles} }" : '');
			$output .= ($progress_style != '' ? "#{$id_attr} .progress-bar{ {$progress_style} }" : '' );
			$output .= "</style>";
		}		
		return $output;	
	}
	
}
add_shortcode('progress_bar', 'RCHProgressBar');
