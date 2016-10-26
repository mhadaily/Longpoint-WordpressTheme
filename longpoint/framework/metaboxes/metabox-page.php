<?php
/**************************************
 * @package  RCHTHEME/Framework
 * @author   RCHTHEME
 * @link     http://www.rchtheme.com
**************************************/

//------------------------------------------------------
// Get Sidebars
//------------------------------------------------------
if(!function_exists('getSidebars')){
function getSidebars() {
		global $smof_data;
		$sidebars = array();
		if(!empty($smof_data['sidebars'])){
			if(count($smof_data['sidebars']) > 0){
				foreach($smof_data['sidebars'] as $sidebar){
					$sidebars[$sidebar['name']] = $sidebar['title'];		
				}
			}
		}
		return $sidebars;
	}
}

$config  = array(
	'title' => __('Page Options', 'Longpoint'),
	'id' => 'rch-metaboxes',
	'pages' => array('page'),
	'callback' => '',
	'context' => 'normal',
	'priority' => 'core'
);
$options = array(
	
	array(
		"name" => __( "Custom Page Title", 'Longpoint' ),
		"id" => "custom_page_title",
		"desc" => __( "If left Blank the global title which you defined in masterkey settings will be used. You can optionally use a different page title in banner section from this option.", 'Longpoint' ),
		"default" => "",
		"type" => "text"
	),
	array(
		"name" => __( "Page Sub Title", 'Longpoint' ),
		"id" => "custom_page_sub_title",
		"desc" => __( "Set Page Sub Title", 'Longpoint' ),		
		"default" => "",
		"type" => "text"
	),
	array(
		"name" => __( "Full Width", 'Longpoint' ),
		'desc' => __( "Full width content of the page.", 'Longpoint' ),
		"id" => "page_full_width_activation",
		"default" => '',
		"options" => array(			
			"yes" => __( "Yes", 'Longpoint' ),
			"no" => __( "No", 'Longpoint' ),
		),
		"type" => "select",
	),
	array(
		"name" => __( "Show Header", 'Longpoint' ),
		'desc' => __( "Show/Hide header.", 'Longpoint' ),
		"id" => "page_show_header",
		"default" => '',
		"options" => array(			
			"yes" => __( "Yes", 'Longpoint' ),
			"no" => __( "No", 'Longpoint' ),
		),
		"type" => "select",
	),
	array(
		"name" => __( "Show Sidebar", 'Longpoint' ),
		'desc' => __( "Show/Hide sidebar.", 'Longpoint' ),
		"id" => "page_show_sidebar",
		"default" => '',
		"options" => array(			
			"yes" => __( "Yes", 'Longpoint' ),
			"no" => __( "No", 'Longpoint' ),
		),
		"type" => "select",
	),
	array(
		"name" => __( "Select Sidebar", 'Longpoint' ),		
		"id" => "page_sidebar",
		"default" => '',
		"options" => getSidebars(),
		"type" => "select",
	),
	array(
		"name" => __( "Header Background Image", 'Longpoint' ),
		"id" => "page_header_background_image",
		'desc' => __( "Choose a background image for header.", 'Longpoint' ),
		"default" => "",
		"type" => "media"
	),	
	array(
		"name" => __( "Background Repeat Options", 'Longpoint' ),
		"id" => "page_header_background_repeat",
		"default" => '',
		"options" => array(			
			"no-repeat" => __( "No Repeat", 'Longpoint' ),
			"repeat" => __( "Repeat", 'Longpoint' ),
			"cover" => __( "Cover", 'Longpoint' ),
		),
		"type" => "select",
	),
	array(
		"name" => __( "Header Background Attachment", 'Longpoint' ),
		"id" => "page_header_background_attachment",
		"default" => '',
		"options" => array(			
			"scroll" => __( "Scroll", 'Longpoint' ),
			"fixed" => __( "Fixed", 'Longpoint' ),
		),
		"type" => "select",
	),
	array(
		"name" => __( "Header Background Speed", 'Longpoint' ),
		'desc' => __( "Set it If you want background to scroll at a different speed. ( Between 0.5 - 2. 1 is normal speed ) ", 'Longpoint' ),
		"id" => "page_header_background_speed",
		"default" => '',		
		"type" => "text"
	),
	array(
		"name" => __( "Header Background color", 'Longpoint' ),
		'desc' => __( "You can set a custom background color using the color picker, or enter a hex value (i.e #ff0000).", 'Longpoint' ),
		"id" => "page_header_background_color",
		"default" => "",
		"type" => "color"
	),
	array(
		"name" => __( "Header Title color", 'Longpoint' ),
		'desc' => __( "You can set a custom title and sub title color using the color picker, or enter a hex value (i.e #ff0000).", 'Longpoint' ),
		"id" => "page_header_text_color",
		"default" => "",
		"type" => "color"
	),
	array(
		"name" => __( "Header Height", 'Longpoint' ),
		"desc" => __( "Change the height(by pixel) of the header.", 'Longpoint' ),
		"id" => "page_header_height",
		"default" => "",
		"type" => "text"
	),	
	array(
		"name" => __( "Page Custom Class", 'Longpoint' ),
		"id" => "page_custom_class",		
		"default" => "",
		"type" => "text"
	),
	array(
		"name" => __( "Revolution Slider Shortcode", 'Longpoint' ),
		"id" => "page_revolution_shortcode",		
		"default" => "",
		"type" => "text"
	),
	/*	
		array(
		"name" => __( "SEO Options", 'Longpoint' ),
		"id" => "heading",		
		"default" => "",
		"type" => "heading"
	)	,

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
	*/

);
new RCHMetaboxesGenerator( $config, $options );