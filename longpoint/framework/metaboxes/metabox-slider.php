<?php
/**************************************
 * @package  RCHTHEME/Framework
 * @author   RCHTHEME
 * @link     http://www.rchtheme.com
**************************************/
$config  = array(
	'title' => __('Elastic Slider Options', 'Longpoint'),
	'id' => 'rch-metaboxes',
	'pages' => array('rch_elastic'),
	'callback' => '',
	'context' => 'normal',
	'priority' => 'core'
);
$options = array(
	array(
		"name" => __( "Alternative Title", 'Longpoint' ),
		"id" => "slider_alternativetitle",
		"default" => "",
		"type" => "text"
	),
	array(
		"name" => __( "Description", 'Longpoint' ),
		"id" => "slider_description",
		"default" => "",
		"type" => "textarea"
	),
	array(
		"name" => __( "Button Image", 'Longpoint' ),
		"id" => "slider_buttonicon",
		"default" => "",
		"type" => "media"
	),

	array(
		"name" => __( "Button Title", 'Longpoint' ),
		"id" => "slider_buttontitle",
		"default" => "",
		"type" => "text"
	),
	
);
new RCHMetaboxesGenerator( $config, $options );