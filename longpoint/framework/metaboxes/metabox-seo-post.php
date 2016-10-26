<?php
/**************************************
 * @package  RCHTHEME/Framework
 * @author   RCHTHEME
 * @link     http://www.rchtheme.com
**************************************/
$config  = array(
	'title' => sprintf( '%s SEO Options', THEME_NAME ),
	'id' => 'rch-metaboxes',
	'pages' => array('post'),
	'callback' => '',
	'context' => 'normal',
	'priority' => 'core'
);
$options = array(
	array(
		"name" => __( "Title", "rchtheme" ),
		"id" => "rch_title_seo",
		"desc" => __( "Google typically displays the first 50-60 characters of a title tag, or as many characters as will fit into a 512-pixel display. ", "rchtheme" ),
		"default" => "",
		"type" => "text"
	),
	
	array(
		"name" => __( "Description", "rchtheme" ),
		"id" => "rch_desc_seo",
		"desc" => __( "The description should optimally be between 150-160 characters.", "rchtheme" ),
		"default" => "",
		"type" => "textarea"
	),
	
	array(
		"name" => __( "Keywords", "rchtheme" ),
		"desc" => __( "Please Enter your keywords. Separate them with a , (Comma).", "rchtheme" ),
		"id" => "rch_keywords_seo",
		"default" => "",
		"type" => "text"
	),
);
new RCHMetaboxesGenerator( $config, $options );