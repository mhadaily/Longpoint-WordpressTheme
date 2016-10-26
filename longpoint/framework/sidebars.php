<?php
/**************************************
 * RCHTHEME Sidebars Functions
 *
 * @package  RCHTHEME/Framework
 * @author   RCHTHEME
 * @link     http://www.rchtheme.com
**************************************/
global $smof_data;

if ( function_exists('register_sidebar') ){	
	if (!empty($smof_data['sidebars'])) {
	if(count($smof_data['sidebars']) > 0){
		foreach($smof_data['sidebars'] as $sidebar){
			register_sidebar( array(
				'name'          => $sidebar['title'],
				'id'            => $sidebar['name'],
				'description'   => $sidebar['description'],
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3>',
				'after_title'   => '</h3>',
			) );
		}
	}	
  }
}