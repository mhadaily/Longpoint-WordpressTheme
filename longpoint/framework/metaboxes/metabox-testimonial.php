<?php
/**************************************
 * @package  RCHTHEME/Framework
 * @author   RCHTHEME
 * @link     http://www.rchtheme.com
**************************************/
$config  = array(
	'title' => sprintf( '%s Testimonials Options', THEME_NAME ),
	'id' => 'rch-metaboxes',
	'pages' => array('rch_testimonial'),
	'callback' => '',
	'context' => 'normal',
	'priority' => 'core'
);
$options = array(
	array(
		"name" => __( "Testimonial Author Position", "rchtheme" ),
		"id" => "quotecompany",
		"default" => "",
		"type" => "text"
	),
	
	array(
		"name" => __( "Testimonial Author Company Name", "rchtheme" ),
		"id" => "quotecompanyname",
		"default" => "",
		"type" => "text"
	),
	
	array(
		"name" => __( "URL to Testimonial Author's Website (optional)", "rchtheme" ),
		"desc" => __( "include http://", "rchtheme" ),
		"id" => "quotewebsite",
		"default" => "",
		"type" => "text"
	),
);
new RCHMetaboxesGenerator( $config, $options );