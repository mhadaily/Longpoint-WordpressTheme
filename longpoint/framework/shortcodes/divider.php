<?php
/**************************************
 * RCHTHEME Dividers & Lines Shortcode
 *
 * @package  RCHTHEME/Framework
 * @author   RCHTHEME
 * @link     http://www.rchtheme.com
**************************************/

/**************************************
 * RCHTHEME Divider Shortcode
**************************************/
if ( !function_exists('RCHDivider') ) {
	function RCHDivider($atts)
	{			
		extract( shortcode_atts( array( 
			'display_large' => 1,
			'display_medium' => 1,
			'display_small' => 1,
			'display_extrasmall' => 1,			
			'animation' => '',
			'class' => '',
			'style' => ''
		), $atts, 'divider' ) );
			
		$id_attr = "rch-divider-" . mt_rand (10,1000);
		
		$classes =   $class . 
					($animation != '' ? " animate {$animation} " : '') . 
					($display_large == 0 ? ' hidden-lg' : '' ) . 
					($display_medium == 0 ? ' hidden-md' : '') . 
					($display_small == 0 ? ' hidden-sm' : '') . 
					($display_extrasmall == 0 ? ' hidden-xs' : '');	
		
		$output   = '<div id="' . $id_attr . '" class="clear '. $classes . '"></div>';
		
		if( $style != '' ){
			$output  .= "<style type='text/css'>#{$id_attr}{{$style}}</style>";
		}
		
		return $output;		
	}
}
add_shortcode('divider', 'RCHDivider');

/**************************************
 * RCHTHEME Gap Shortcode
**************************************/
if ( !function_exists('RCHGap') ) {
	function RCHGap($atts)
	{			
		extract( shortcode_atts( array( 
			'h' => '',
			'display_large' => 1,
			'display_medium' => 1,
			'display_small' => 1,
			'display_extrasmall' => 1,			
			'animation' => '',
			'class' => '',
			'style' => ''
		), $atts, 'gap' ) );
		
		$id_attr = "rch-gap-" . mt_rand (10,1000);
		
		$classes =   $class . 
					($animation != '' ? " animate {$animation} " : '') . 
					($display_large == 0 ? ' hidden-lg' : '' ) . 
					($display_medium == 0 ? ' hidden-md' : '') . 
					($display_small == 0 ? ' hidden-sm' : '') . 
					($display_extrasmall == 0 ? ' hidden-xs' : '');	
					
		$output  = '<div id="' . $id_attr . '" class="clear '. $classes . '"></div>';
		
		if( ($h != '') || ($style != '') ){
			$output  .= "<style type='text/css'>#{$id_attr}{ height:{$h}px;{$style} }</style>";
		}
		
		return $output;		
	}
}
add_shortcode('gap', 'RCHGap');


/**************************************
 * RCHTHEME Break Line Shortcode
**************************************/
if ( !function_exists('RCHBreak_line') ) {
	function RCHBreak_line()
	{					
		return '<span class="rch-breakline"><br></span>';
	}
}
add_shortcode('br', 'RCHBreak_line');


/**************************************
 * RCHTHEME Horizental Line Shortcode
**************************************/
if ( !function_exists('RCHHorizontal_line') ) {
	function RCHHorizontal_line($atts)
	{			
		extract( shortcode_atts( array( 
			'display_large' => 1,
			'display_medium' => 1,
			'display_small' => 1,
			'display_extrasmall' => 1,
			'animation' => '',
			'class' => '',
			'style' => ''
		), $atts, 'horizontal_line' ) );
				
		$id_attr = "rch-horizontal-line-" . mt_rand (10,1000);
		
		$classes =   $class . 
					($animation != '' ? " animate {$animation} " : '') . 
					($display_large == 0 ? ' hidden-lg' : '' ) . 
					($display_medium == 0 ? ' hidden-md' : '') . 
					($display_small == 0 ? ' hidden-sm' : '') . 
					($display_extrasmall == 0 ? ' hidden-xs' : '');	
					
		$output  = '<div id="' . $id_attr . '" class="hr '. $classes . '"></div>';
		
		if( $style != '' ){
			$output  .= "<style type='text/css'>#{$id_attr}{ {$style} }</style>";
		}
		
		return $output;
	}
}
add_shortcode('horizontal_line', 'RCHHorizontal_line');


/**************************************
 * RCHTHEME Double Horizental Line Shortcode
**************************************/
if ( !function_exists('RCHDouble_horizontal_line') ) {
	function RCHDouble_horizontal_line($atts)
	{			
		extract( shortcode_atts( array( 
			'display_large' => 1,
			'display_medium' => 1,
			'display_small' => 1,
			'display_extrasmall' => 1,
			'animation' => '',
			'class' => '',
			'style' => ''
		), $atts, 'double_horizontal_line' ));			
				
		$id_attr = "rch-double-horizontal-line-" . mt_rand (10,1000);
		
		$classes =   $class . 
					($animation != '' ? " animate {$animation} " : '') . 
					($display_large == 0 ? ' hidden-lg' : '' ) . 
					($display_medium == 0 ? ' hidden-md' : '') . 
					($display_small == 0 ? ' hidden-sm' : '') . 
					($display_extrasmall == 0 ? ' hidden-xs' : '');	
							
		$output  = '<div id="' . $id_attr . '" class="hr double '. $classes . '"></div>';		
		
		if( $style != '' ){
			$output  .= "<style type='text/css'>#{$id_attr}{ {$style} }</style>";
		}
		
		return $output;
	}
}
add_shortcode('double_horizontal_line', 'RCHDouble_horizontal_line');


/**************************************
 * RCHTHEME Dotted Line Shortcode
**************************************/
if ( !function_exists('RCHDotted_line') ) {
	function RCHDotted_line($atts)
	{			
		extract( shortcode_atts( array( 
			'display_large' => 1,
			'display_medium' => 1,
			'display_small' => 1,
			'display_extrasmall' => 1,
			'animation' => '',
			'class' => '',
			'style' => ''
		), $atts, 'divider_dotted' ) );
		
		$id_attr = "rch-divider-dotted-" . mt_rand (10,1000);
		
		$classes =   $class . 
					($animation != '' ? " animate {$animation} " : '') . 
					($display_large == 0 ? ' hidden-lg' : '' ) . 
					($display_medium == 0 ? ' hidden-md' : '') . 
					($display_small == 0 ? ' hidden-sm' : '') . 
					($display_extrasmall == 0 ? ' hidden-xs' : '');	
														
		$output = '<div id="' . $id_attr . '" class="divider divider-dotted '. $classes . '"></div>';
		
		if( $style != '' ){
			$output  .= "<style type='text/css'>#{$id_attr}{ {$style} }</style>";
		}
		
		return $output;
	}
}
add_shortcode('divider_dotted', 'RCHDotted_line');

/**************************************
 * RCHTHEME Double Dotted Line Shortcode
**************************************/
if ( !function_exists('RCHDouble_dotted_line') ) {
	function RCHDouble_dotted_line($atts)
	{			
		extract( shortcode_atts( array( 
			'display_large' => 1,
			'display_medium' => 1,
			'display_small' => 1,
			'display_extrasmall' => 1,
			'animation' => '',
			'class' => '',
			'style' => ''
		), $atts, 'double_divider_dotted' ) );
		
		$id_attr = "rch-double-divider-dotted-" . mt_rand (10,1000);
		
		$classes =   $class . 
					($animation != '' ? " animate {$animation} " : '') . 
					($display_large == 0 ? ' hidden-lg' : '' ) . 
					($display_medium == 0 ? ' hidden-md' : '') . 
					($display_small == 0 ? ' hidden-sm' : '') . 
					($display_extrasmall == 0 ? ' hidden-xs' : '');	
																												
		$output = '<div id="' . $id_attr . '" class="divider divider-dotted double'. $classes . '"></div>';
		
		if( $style != '' ){
			$output  .= "<style type='text/css'>#{$id_attr}{ {$style} }</style>";
		}
		
		return $output;
	}
}
add_shortcode('double_divider_dotted', 'RCHDouble_dotted_line');

/**************************************
 * RCHTHEME Dashed Line Shortcode
**************************************/
if ( !function_exists('RCHDashed_line') ) {
	function RCHDashed_line($atts)
	{			
		extract( shortcode_atts( array( 
			'display_large' => 1,
			'display_medium' => 1,
			'display_small' => 1,
			'display_extrasmall' => 1,
			'animation' => '',
			'class' => '',
			'style' => ''
		), $atts, 'divider_dashed' ) );
		
		$id_attr = "rch-divider-dashed-" . mt_rand (10,1000);
		
		$classes =   $class . 
					($animation != '' ? " animate {$animation} " : '') . 
					($display_large == 0 ? ' hidden-lg' : '' ) . 
					($display_medium == 0 ? ' hidden-md' : '') . 
					($display_small == 0 ? ' hidden-sm' : '') . 
					($display_extrasmall == 0 ? ' hidden-xs' : '');	
					
		$output = '<div id="' . $id_attr . '" class="divider divider-dashed '. $classes . '"></div>';
				
		if( $style != '' ){
			$output  .= "<style type='text/css'>#{$id_attr}{ {$style} }</style>";
		}
		
		return $output;
	}
}
add_shortcode('divider_dashed', 'RCHDashed_line');


/**************************************
 * RCHTHEME Double Dashed Line Shortcode
**************************************/
if ( !function_exists('RCHDouble_dashed_line') ) {
	function RCHDouble_dashed_line($atts)
	{			
		extract( shortcode_atts( array( 
			'display_large' => 1,
			'display_medium' => 1,
			'display_small' => 1,
			'display_extrasmall' => 1,
			'animation' => '',
			'class' => '',
			'style' => ''
		), $atts, 'double_divider_dashed' ) );
		
		$id_attr = "rch-double-divider-dashed-" . mt_rand (10,1000);
		
		$classes =   $class . 
					($animation != '' ? " animate {$animation} " : '') . 
					($display_large == 0 ? ' hidden-lg' : '' ) . 
					($display_medium == 0 ? ' hidden-md' : '') . 
					($display_small == 0 ? ' hidden-sm' : '') . 
					($display_extrasmall == 0 ? ' hidden-xs' : '');	
					
		$output = '<div id="' . $id_attr . '" class="divider divider-dashed double'. $classes . '"></div>';
				
		if( $style != '' ){
			$output  .= "<style type='text/css'>#{$id_attr}{ {$style} }</style>";
		}
		
		return $output;
	}
}
add_shortcode('double_divider_dashed', 'RCHDouble_dashed_line');

/**************************************
 * RCHTHEME Shadow Line Shortcode
**************************************/
if ( !function_exists('RCHShadow_line') ) {
	function RCHShadow_line($atts)
	{			
		extract( shortcode_atts( array( 
			'display_large' => 1,
			'display_medium' => 1,
			'display_small' => 1,
			'display_extrasmall' => 1,
			'animation' => '',
			'class' => '',
			'style' => ''
		), $atts, 'divider_shadow' ) );
		
		$id_attr = "rch-divider-shadow-" . mt_rand (10,1000);
		
		$classes =   $class . 
					($animation != '' ? " animate {$animation} " : '') . 
					($display_large == 0 ? ' hidden-lg' : '' ) . 
					($display_medium == 0 ? ' hidden-md' : '') . 
					($display_small == 0 ? ' hidden-sm' : '') . 
					($display_extrasmall == 0 ? ' hidden-xs' : '');	
						
		$output = '<div id="' . $id_attr . '" class="divider divider-shadow '. $classes . '"></div>';
			
		if( $style != '' ){
			$output  .= "<style type='text/css'>#{$id_attr}{ {$style} }</style>";
		}
		
		return $output;
	}
}
add_shortcode('divider_shadow', 'RCHShadow_line');


/**************************************
 * RCHTHEME To Top Line Shortcode
**************************************/
if ( !function_exists('RCHTotop_line') ) {
	function RCHTotop_line($atts)
	{			
		extract( shortcode_atts( array( 
			'display_large' => 1,
			'display_medium' => 1,
			'display_small' => 1,
			'display_extrasmall' => 1,
			'animation' => '',
			'class' => '',
			'style' => ''
		), $atts, 'divider_top' ) );
		
		$id_attr = "rch-divider-top-" . mt_rand (10,1000);
		
		$classes =   $class . 
					($animation != '' ? " animate {$animation} " : '') . 
					($display_large == 0 ? ' hidden-lg' : '' ) . 
					($display_medium == 0 ? ' hidden-md' : '') . 
					($display_small == 0 ? ' hidden-sm' : '') . 
					($display_extrasmall == 0 ? ' hidden-xs' : '');					
		
		$output = '<div id="' . $id_attr . '" class="divider divider-top '. $classes . '"><a href="#" class="to-top">' . __('Top', 'Longpoint') . '<i class="fa fa-angle-up"></i></a></div>';
			
		if( $style != '' ){
			$output  .= "<style type='text/css'>#{$id_attr}{ {$style} }</style>";
		}
		
		return $output;
	}
}
add_shortcode('divider_top', 'RCHTotop_line');


/**************************************
 * RCHTHEME Divider Text Shortcode
**************************************/
if ( !function_exists('RCHDividertext_line') ) {
	function RCHDividertext_line($atts)
	{			
		extract( shortcode_atts( array( 
			'display_large' => 1,
			'display_medium' => 1,
			'display_small' => 1,
			'display_extrasmall' => 1,
			'text' => '',
			'icon' => '',
			'align' => '',
			'animation' => '',
			'class' => '',
			'style' => ''
		), $atts, 'divider_text' ) );
					
		$id_attr = "rch-divider-text-" . mt_rand (10,1000);
		
		$classes =   $class . 
					($animation != '' ? " animate {$animation} " : '') . 
					($display_large == 0 ? ' hidden-lg' : '' ) . 
					($display_medium == 0 ? ' hidden-md' : '') . 
					($display_small == 0 ? ' hidden-sm' : '') . 
					($display_extrasmall == 0 ? ' hidden-xs' : '');					
		
		$output = '<div id="' . $id_attr . '" class="divider divider-line '. $classes . '"><div class="divider-text align' . $align . '"><div class="text' . $align . '">' . $text . ($icon != '' ? " <i class='fa {$icon}'></i>" : '') . '</div></div></div>';
		
		if( $style != '' ){
			$output  .= "<style type='text/css'>#{$id_attr}{ {$style} }</style>";
		}
		
		return $output;
	}
}
add_shortcode('divider_text', 'RCHDividertext_line');

/**************************************
 * RCHTHEME Double Divider Text Shortcode
**************************************/
if ( !function_exists('RCHDouble_dividertext_line') ) {
	function RCHDouble_dividertext_line($atts)
	{			
		extract( shortcode_atts( array( 
			'display_large' => 1,
			'display_medium' => 1,
			'display_small' => 1,
			'display_extrasmall' => 1,
			'text' => '',
			'icon' => '',
			'align' => '',
			'animation' => '',
			'class' => '',
			'style' => ''
		), $atts, 'double_divider_text' ) );
			
		$id_attr = "rch-double-divider-text-" . mt_rand (10,1000);
		
		$classes =   $class . 
					($animation != '' ? " animate {$animation} " : '') . 
					($display_large == 0 ? ' hidden-lg' : '' ) . 
					($display_medium == 0 ? ' hidden-md' : '') . 
					($display_small == 0 ? ' hidden-sm' : '') . 
					($display_extrasmall == 0 ? ' hidden-xs' : '');					
		
		$output = '<div id="' . $id_attr . '" class="divider divider-line double '. $classes . '"><div class="divider-text align' . $align . '"><div class="text' . $align . '">' . $text . ($icon != '' ? " <i class='fa {$icon}'></i>" : '') . '</div></div></div>';
		
		if( $style != '' ){
			$output  .= "<style type='text/css'>#{$id_attr}{ {$style} }</style>";
		}
		
		return $output;
	}
}
add_shortcode('double_divider_text', 'RCHDouble_dividertext_line');