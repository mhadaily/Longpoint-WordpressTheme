<?php
/**************************************
 * @package  RCHTHEME/Framework
 * @author   RCHTHEME
 * @link     http://www.rchtheme.com
**************************************/
$config  = array(
	'title' => sprintf( '%s Member Options', THEME_NAME ),
	'id' => 'rch-metaboxes',
	'pages' => array('rch_team'),
	'callback' => '',
	'context' => 'normal',
	'priority' => 'core'
);
$options = array(
	array(
		"name" => __( "Member Position", "rchtheme" ),
		"desc" => __( "Please enter team member's Position in the company.", "rchtheme" ),
		"id" => "teamposition",
		"default" => "",
		"type" => "text"
	),
	array(
		"name" => __( "Email Address", "rchtheme" ),
		"desc" => __( "Please Enter a Valid Email", "rchtheme" ),
		"id" => "teamemail",
		"default" => "",
		"type" => "text"
	),
		array(
		"name" => __( "Facebook", "rchtheme" ),
		"desc" => __( "Please Enter Facebook URL (include http://).", "rchtheme" ),
		"id" => "teamfacebook",
		"type" => "text"
	),

		array(
		"name" => __( "Twitter", "rchtheme" ),
		"desc" => __( "Please Enter Twitter URL (include http://).", "rchtheme" ),
		"id" => "teamtwitter",
		"default" => "",
		"type" => "text"
	),
		array(
		"name" => __( "Google Plus", "rchtheme" ),
		"desc" => __( "Please Enter Google Plus URL (include http://).", "rchtheme" ),
		"id" => "teamgoogleplus",
		"default" => "",
		"type" => "text"
	),

		array(
		"name" => __( "Linked In", "rchtheme" ),
		"desc" => __( "Please Enter Linked In URL (include http://).", "rchtheme" ),
		"id" => "teamlinkedin",
		"default" => "",
		"type" => "text"
	),
		

);
new RCHMetaboxesGenerator( $config, $options );