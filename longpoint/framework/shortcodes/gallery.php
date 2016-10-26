<?php
/**************************************
 * RCHTHEME Gallery Shortcode
 *
 * @package  RCHTHEME/Framework
 * @author   RCHTHEME
 * @link     http://www.rchtheme.com
**************************************/

/**************************************
 * RCHTHEME Portfolio Shortcode
**************************************/
if ( !function_exists('RCHGallery') ) {
	function RCHGallery($atts)
	{			
		extract( shortcode_atts( array(			
			'ids' => '',	
			'title' => '',
			'slideshow' => 0,
			'show_title' => 1,						
			'display_large' => 1,
			'display_medium' => 1,
			'display_small' => 1,
			'display_extrasmall' => 1,	
			'animation' => '',			
			'class' => '',
			'style' => ''
		), $atts, 'gallery' ) );
		
		if( empty($ids) )
			return null;
		
		$id_attr = "rch-gallery-" . mt_rand (10,1000);
		
		$output  = ''; // no-error
		$output .= $show_title == 1 ? "<h2 class='title'>{$title}</h2>" : '';
		$output .= '<div id="' . $id_attr . '" class="gallery-grid">										
					<ul class="gallery-grid">';
		
		$ids = explode( ',', $ids );
		foreach($ids as $id){
			$attribute = '';
			$src = wp_get_attachment_image_src( $id, 'large' );
			$attribute = " rel='prettyPhoto[{$id_attr}]' href='{$src[0]}'";	
			$output .= '<li><a class="' . $id_attr . '-cls"' . $attribute . '><figure>' . wp_get_attachment_image($id, "gallery-thumb") . '</figure><div class="hover"></div></a></li>';
		}
		
		$output .= '</div></div></ul>';		
		
		$classes =  ($class != '' ? " {$class}" : '') . 
					($animation != '' ? " animate {$animation}" : '') . 
					($display_large == 0 ? ' hidden-lg' : '' ) . 
					($display_medium == 0 ? ' hidden-md' : '') . 
					($display_small == 0 ? ' hidden-sm' : '') . 
					($display_extrasmall == 0 ? ' hidden-xs' : '');	
		
		$output = '<div id="section-' . $id_attr . '" class="gallery-wrapper ' . $classes .'">' . $output . '</div>';
		
		if($style != ''){
			$output  .= "<style type='text/css'>#section-{$id_attr}{ {$style} }</style>";
		}
		
		$slideshow = $slideshow == 1 ? 'true' : 'false';
		
		$output  .= "";

		return $output;		
	}
	
}
add_shortcode('gallery', 'RCHGallery');
