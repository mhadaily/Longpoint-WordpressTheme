<?php
/**************************************
 * RCHTHEME List Shortcode
 *
 * @package  RCHTHEME/Framework
 * @author   RCHTHEME
 * @link     http://www.rchtheme.com
**************************************/

/**************************************
 * RCHTHEME List Shortcode
**************************************/
if ( !function_exists('RCHList') ) {
	function RCHList($atts, $content=null)
	{			
		extract( shortcode_atts( array( 
			'icon' => '',			
			'spinning' => '',
			'rotation' => '',
			'circle' => '',
			'color' => '',
			'background' => '',
			'bordercolor' => '',
			'bordersize' => '',			
			'display_large' => 1,
			'display_medium' => 1,
			'display_small' => 1,
			'display_extrasmall' => 1,	
			'animation' => '',			
			'class' => '',
			'style' => ''
		), $atts, 'list' ) );
		
		$content = remove_tags($content, array('p'));		
				   
		$doc = new DOMDocument();
		if(!empty($content)){
			$doc->loadHTML($content);
			$liList = $doc->getElementsByTagName('li');
		}
		
		$id_attr = "rch-list-" . mt_rand (10,1000);
		
		$classes = 	$class . 					
					($animation != '' ? " animate {$animation}" : '') . 
					($display_large == 0 ? ' hidden-lg' : '' ) . 
					($display_medium == 0 ? ' hidden-md' : '') . 
					($display_small == 0 ? ' hidden-sm' : '') . 
					($display_extrasmall == 0 ? ' hidden-xs' : '');	
		
		$icon = ($icon == '' ? 'fa-check' : $icon) .
				($spinning == 1 ? ' fa-spin' : '') . 
				($rotation != '' ? " fa-{$rotation}" : '') ; 
		
		if($circle == 1){
					
			$icon = '<span class="fa-stack fa-lg">' .
					'<i class="fa fa-circle fa-stack-2x"></i>' .
					'<i class="fa ' . $icon . ' fa-stack-1x fa-inverse"></i>' . 
					'</span>';
			
			$icon_style  = 	($color 	 != '' ? "#{$id_attr} i{ color:{$color}; }" : '' );
			$icon_style .= 	($background != '' ? "#{$id_attr} i.fa-circle{ color:{$background}; }" : '');
		}else{
			$icon = '<span class="iconwrapp">' .
					'<i class="fa ' . $icon . '"></i>' . 
					'</span>';
					
			$icon_style = 	( $color != '' ? "color:{$color};" : '') .
							($background != '' ? "background-color:{$background};" : '') . 
							($bordercolor != '' ? "border:" .($bordersize != '' ? $bordersize : 1) . "px solid {$bordercolor};" : '');
			
			$icon_style = 	($icon_style != '' ? "#{$id_attr} .iconwrapp{ {$icon_style} }" : '' );
		}
		$output = '';
		if(!empty($liList) )
		foreach($liList as $li){			
			$output .= '<li>' . $icon . $li->nodeValue .'</li>';
		}
		$output = '<ul id="' . $id_attr . '" class="list fa-ul ' . $classes .'">' . $output . '</ul>';
		
		if( ($style != '') || ($icon_style != '') ){
			$output .= "<style type='text/css'>";
			$output .= ($style != '' ? "#{$id_attr}{ {$style} }" : '');
			$output .= $icon_style;
			$output .= "</style>";
		}		
		
		return $output;	
	}
}
add_shortcode('list', 'RCHList');


/**************************************
 * RCHTHEME List Group Shortcode
**************************************/
if ( !function_exists('RCHListgroup') ) {
	function RCHListgroup($atts, $content=null)
	{			
		extract( shortcode_atts( array( 			
			'horizental' => '',			
			'display_large' => 1,
			'display_medium' => 1,
			'display_small' => 1,
			'display_extrasmall' => 1,	
			'animation' => '',			
			'class' => '',
			'style' => ''
		), $atts, 'listgroup' ) );
		
		$content = remove_tags($content, array('p'));						
		
		$id_attr = "rch-listgroup-" . mt_rand (10,1000);
		
		$classes = 	$class . 
					($horizental == 1 ? ' dl-horizontal': '') .
					($animation != '' ? " animate {$animation}" : '') . 
					($display_large == 0 ? ' hidden-lg' : '' ) . 
					($display_medium == 0 ? ' hidden-md' : '') . 
					($display_small == 0 ? ' hidden-sm' : '') . 
					($display_extrasmall == 0 ? ' hidden-xs' : '');	
		
		$output = '<dl id="' . $id_attr . '" class="list ' . $classes .'">' . do_shortcode($content) . '</dl>';
		
		if( $style != '' ){
			$output .= "<style type='text/css'>#{$id_attr}{ {$style} }</style>";
		}	
		
		return $output;	
	}
}
add_shortcode('listgroup', 'RCHListgroup');



/**************************************
 * RCHTHEME List Group Item Shortcode
**************************************/
if ( !function_exists('RCHListgroupitem') ) {
	function RCHListgroupitem($atts, $content=null)
	{			
		extract( shortcode_atts( array( 			
			'heading' => ''	
		), $atts, 'dlitem' ) );
		$content = remove_tags($content, array('p'));						
		$output = do_shortcode($content);		
		return "<dt>{$heading}</dt><dd>{$output}</dd>";
	}
}
add_shortcode('dlitem', 'RCHListgroupitem');