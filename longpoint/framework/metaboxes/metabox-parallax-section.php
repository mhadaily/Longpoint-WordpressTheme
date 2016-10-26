<?php
/**************************************
 * @package  RCHTHEME/Framework
 * @author   RCHTHEME
 * @link     http://www.rchtheme.com
**************************************/
$config  = array(
	'title' => __('Parallax Section Options', 'Longpoint'),
	'id' => 'rch-metaboxes',
	'pages' => array('rch_parallax_section'),
	'callback' => '',
	'context' => 'normal',
	'priority' => 'core'
);
$options = array(
		
	array(
		"name" => __( "Show Title", 'Longpoint' ),
		'desc' => __( "Show/Hide parallax section title.", 'Longpoint' ),
		"id" => "parallax_show_title",
		"default" => '',
		"options" => array(			
			"show" => __( "Show", 'Longpoint' ),
			"hide" => __( "Hide", 'Longpoint' ),
		),
		"type" => "select",
	),
	array(
		"name" => __( "Full Width", 'Longpoint' ),
		'desc' => __( "Full width content of parallax section", 'Longpoint' ),
		"id" => "parallax_full_width_activation",
		"default" => '',
		"options" => array(			
			"yes" => __( "Yes", 'Longpoint' ),
			"no" => __( "No", 'Longpoint' ),
		),
		"type" => "select",
	),
	array(
		"name" => __( "Background Image", 'Longpoint' ),
		"id" => "parallax_background_image",
		'desc' => __( "Choose a background image for this section.", 'Longpoint' ),
		"default" => "",
		"type" => "media"
	),
	array(
		"name" => __( "Pattern Background", 'Longpoint' ),		
		"id" => "parallax_display_pattern_background",
		"default" => '',
		"options" => array(			
			"dotted" => __( "Dotted 1", 'Longpoint' ),
			"dotted2" => __( "Dotted 2", 'Longpoint' ),
			"solid90" => __( "Solid 90% Opacity", 'Longpoint' ),
			"solid80" => __( "Solid 80% Opacity", 'Longpoint' ),
			"solid70" => __( "Solid 70% Opacity", 'Longpoint' ),
			"solid60" => __( "Solid 60% Opacity", 'Longpoint' ),
			"solid50" => __( "Solid 50% Opacity", 'Longpoint' ),
			"solid40" => __( "Solid 40% Opacity", 'Longpoint' ),
			"solid30" => __( "Solid 30% Opacity", 'Longpoint' ),
			"solid20" => __( "Solid 20% Opacity", 'Longpoint' ),
			"solid10" => __( "Solid 10% Opacity", 'Longpoint' )
		),
		"type" => "select",
	),
	array(
		"name" => __( "Background Repeat Options", 'Longpoint' ),
		"id" => "parallax_background_repeat",
		"default" => '',
		"options" => array(			
			"no-repeat" => __( "No Repeat", 'Longpoint' ),
			"cover" => __( "Cover", 'Longpoint' ),
		),
		"type" => "select",
	),
	array(
		"name" => __( "Background Attachment", 'Longpoint' ),
		"id" => "parallax_background_attachment",
		"default" => '',
		"options" => array(			
			"scroll" => __( "Scroll", 'Longpoint' ),
			"fixed" => __( "Fixed", 'Longpoint' ),
		),
		"type" => "select",
	),
	array(
		"name" => __( "Background Speed", 'Longpoint' ),
		'desc' => __( "Set it If you want background to scroll at a different speed. ( Between 0.5 till 2 - 1 is normal speed ) ", 'Longpoint' ),
		"id" => "parallax_background_speed",
		"default" => '',		
		"type" => "text"
	),
	array(
		"name" => __( "Background color", 'Longpoint' ),
		'desc' => __( "You can set a custom background color using the color picker, or enter a hex value (i.e #ff0000).", 'Longpoint' ),
		"id" => "parallax_background_color",
		"default" => "",
		"type" => "color"
	),
	array(
		"name" => __( "Parallax Section Size", 'Longpoint' ),
		"desc" => __( "Change the max height(by pixel) of the parallax section.", 'Longpoint' ),
		"id" => "parallax_section_height",
		"default" => "",
		"type" => "text"
	),
	array(
		"name" => __( "Title Bar Heading Color", 'Longpoint' ),
		'desc' => __( "This is for the font color for the heading tag used in the title. Use color picker or enter a hex value (i.e #ff0000).", 'Longpoint' ),
		"id" => "parallax_title_color",
		"default" => "",
		"type" => "color"
	),
	array(
		"name" => __( "Heading Tag Color", 'Longpoint' ),
		'desc' => __( "Sets custom color to all h1-h6 tags in this section. Use color picker or enter a hex value (i.e #ff0000).", 'Longpoint' ),
		"id" => "parallax_heading_color",
		"default" => "",
		"type" => "color"
	),
	array(
		"name" => __( "Font Color", 'Longpoint' ),
		'desc' => __( "Sets custom color to all body font in this section. Use color picker or enter a hex value (i.e #ff0000).", 'Longpoint' ),
		"id" => "parallax_text_color",
		"default" => "",
		"type" => "color"
	),
	array(
		"name" => __( "Link Color", 'Longpoint' ),
		'desc' => __( "Sets custom color to all links for this section. Use color picker or enter a hex value (i.e #ff0000).", 'Longpoint' ),
		"id" => "parallax_link_color",
		"default" => "",
		"type" => "color"
	),
	array(
		"name" => __( "Link Hover Color", 'Longpoint' ),
		'desc' => __( "Sets custom color to all links hover state for this section. Use color picker or enter a hex value (i.e #ff0000).", 'Longpoint' ),
		"id" => "parallax_link_hover_color",
		"default" => "",
		"type" => "color"
	),
	array(
		"name" => __( "Class", 'Longpoint' ),
		"id" => "parallax_extra_class",
		'desc' => __( "Insert the extra class.", 'Longpoint' ),
		"default" => "",
		"type" => "text"
	),
	array(
		"name" => __( "Style", 'Longpoint' ),
		"id" => "parallax_inline_style",
		'desc' => __( "The style attribute can contain any CSS property. [ex: color: red;]", 'Longpoint' ),
		"default" => "",
		"type" => "text"
	),

	// array(
		// "name" => __( "Title", "rchtheme" ),
		// "id" => "rch_title_seo",
		// "desc" => __( "Google typically displays the first 50-60 characters of a title tag, or as many characters as will fit into a 512-pixel display. ", "rchtheme" ),
		// "default" => "",
		// "type" => "text"
	// ),
	
	// array(
		// "name" => __( "Description", "rchtheme" ),
		// "id" => "rch_desc_seo",
		// "desc" => __( "The description should optimally be between 150-160 characters.", "rchtheme" ),
		// "default" => "",
		// "type" => "textarea"
	// ),
	
	// array(
		// "name" => __( "Keywords", "rchtheme" ),
		// "desc" => __( "Please Enter your keywords. Separate them with a , (Comma).", "rchtheme" ),
		// "id" => "rch_keywords_seo",
		// "default" => "",
		// "type" => "text"
	// ),
);
new RCHMetaboxesGenerator( $config, $options );