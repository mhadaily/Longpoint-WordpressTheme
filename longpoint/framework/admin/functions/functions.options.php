<?php

add_action('init','of_options');

if (!function_exists('of_options'))
{
	function of_options()
	{
		//Access the WordPress Categories via an Array
		$of_categories 		= array();  
		$of_categories_obj 	= get_categories('hide_empty=0');
		foreach ($of_categories_obj as $of_cat) {
		    $of_categories[$of_cat->cat_ID] = $of_cat->cat_name;}
		$categories_tmp 	= array_unshift($of_categories, "Select a category:");    
	       
		//Access the WordPress Pages via an Array
		$of_pages 			= array();
		$of_pages_obj 		= get_pages('sort_column=post_parent,menu_order');    
		foreach ($of_pages_obj as $of_page) {
		    $of_pages[$of_page->ID] = $of_page->post_name; }
		$of_pages_tmp 		= array_unshift($of_pages, "Select a page:");       
	
		//Testing 
		$of_options_select 	= array("one","two","three","four","five"); 
		$of_options_radio 	= array("one" => "One","two" => "Two","three" => "Three","four" => "Four","five" => "Five");
		
		//Homepage blocks for the layout manager (sorter)
		$args = array(
			'post_type' => 'rch_parallax_section',
			'post_status' => 'publish',
			'posts_per_page'    => -1,			
		);
		$query = get_posts($args);
		
		$blocks = array();		
		foreach ( $query as $post ){ 
			$blocks['id_' . $post->ID] = $post->post_title;
		}
		wp_reset_query(); 
		
		$of_options_homepage_blocks = array
		( 
			"disabled" => $blocks ,
			"enabled" => array (),
		);


		//Stylesheets Reader
		$alt_stylesheet_path = LAYOUT_PATH;
		$alt_stylesheets = array();
		
		if ( is_dir($alt_stylesheet_path) ) 
		{
		    if ($alt_stylesheet_dir = opendir($alt_stylesheet_path) ) 
		    { 
		        while ( ($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false ) 
		        {
		            if(stristr($alt_stylesheet_file, ".css") !== false)
		            {
		                $alt_stylesheets[] = substr($alt_stylesheet_file, 0, -4);//$alt_stylesheet_file;
		            }
		        }    
		    }
		}


		//Background Images Reader
		$bg_images_path = get_stylesheet_directory(). '/images/bg/'; // change this to where you store your bg images
		$bg_images_url = get_template_directory_uri().'/images/bg/'; // change this to where you store your bg images
		$bg_images = array();
		
		if ( is_dir($bg_images_path) ) {
		    if ($bg_images_dir = opendir($bg_images_path) ) { 
		        while ( ($bg_images_file = readdir($bg_images_dir)) !== false ) {
		            if(stristr($bg_images_file, ".png") !== false || stristr($bg_images_file, ".jpg") !== false) {
		            	natsort($bg_images); //Sorts the array into a natural order
		                $bg_images[] = $bg_images_url . $bg_images_file;
		            }
		        }    
		    }
		}
		

		/*-----------------------------------------------------------------------------------*/
		/* TO DO: Add options/functions that use these */
		/*-----------------------------------------------------------------------------------*/
		
		//More Options
		$uploads_arr 		= wp_upload_dir();
		$all_uploads_path 	= $uploads_arr['path'];
		$all_uploads 		= get_option('of_uploads');
		$other_entries 		= array("Select a number:","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19");
		$body_repeat 		= array("no-repeat","repeat-x","repeat-y","repeat");
		$body_pos 			= array("top left","top center","top right","center left","center center","center right","bottom left","bottom center","bottom right");
		
		// Image Alignment radio box
		$of_options_thumb_align = array("alignleft" => "Left","alignright" => "Right","aligncenter" => "Center"); 
		
		// Image Links to Options
		$of_options_image_link_to = array("image" => "The Image","post" => "The Post"); 
		
		// Google Font
		$google_fonts = array_merge( theme_options_get_os_fonts() , theme_options_get_google_fonts() );		
		asort($google_fonts);
		$google_fonts = array_merge( array("none" => "Select a font"), $google_fonts );		
				
		global $default_sidebars;
		$default_sidebars = array(				
			array('order' => '0', 'title' => 'Blog','name' => 'Blog', 'description' => __( 'Appears in the single post.', 'Longpoint' )),
			array('order' => '1', 'title' => 'Page','name' => 'Page', 'description' => __( 'Appears in the page.', 'Longpoint' )),
		);

/*-----------------------------------------------------------------------------------*/
/* The Options Array */
/*-----------------------------------------------------------------------------------*/

// Set the Options Array
global $of_options;
$of_options = array();

		$of_options[] = array( 	"name" 		=> "General Settings",
								"type" 		=> "heading"
						);

        $of_options[] = array( "name" => "Import Demo Content",
            "desc" => "Importing demo content will copy sliders, theme options, posts, pages and portfolio posts, parallax sections,team,testimonial, comments, this will replicate the live demo. WARNING: clicking this button will replace your current theme options, sliders and widgets.  It can also take a minute to complete.",
            "id" => "rch_demo_data",
            "std" => admin_url('themes.php?page=optionsframework') . "&import_data_content=true",
            "btntext" => "Import Demo Content",
            "type" => "button");

        $of_options[] = array( "name" => "Favicon",
            "desc" => "Favicon for your website (16px x 16px).",
            "id" => "favicon",
            "std" => get_template_directory_uri()."/images/favicon.png",
            "type" => "upload");


        $of_options[] = array( "name" => "Apple iPhone Icon Upload",
            "desc" => "Favicon for Apple iPhone (57px x 57px).",
            "id" => "iphone_icon",
            "std" => get_template_directory_uri()."/images/apple-icons/icon-57x57.png",
            "type" => "upload");

        $of_options[] = array( "name" => "Apple iPhone Retina Icon Upload",
            "desc" => "Favicon for Apple iPhone Retina Version (114px x 114px).",
            "id" => "iphone_icon_retina",
            "std" => get_template_directory_uri()."/images/apple-icons/icon-114x114.png",
            "type" => "upload");

        $of_options[] = array( "name" => "Apple iPad Icon Upload",
            "desc" => "Favicon for Apple iPad (72px x 72px).",
            "id" => "ipad_icon",
            "std" => get_template_directory_uri()."/images/apple-icons/icon-72x72.png",
            "type" => "upload");

        $of_options[] = array( "name" => "Apple iPad Retina Icon Upload",
            "desc" => "Favicon for Apple iPad Retina Version (144px x 144px).",
            "id" => "ipad_icon_retina",
            "std" => get_template_directory_uri()."/images/apple-icons/icon-144x144.png",
            "type" => "upload");
												
		$of_options[] = array( 	"name" 		=> "Tracking Code",
								"desc" 		=> "Paste your Google Analytics (or other) tracking code here. This will be added into the footer template of your theme.",
								"id" 		=> "analytics_code",
								"std" 		=> "",
								"type" 		=> "textarea"
						);				
		
		$of_options[] = array( 	"name" 		=> "Header Options",
								"type" 		=> "heading",
								"icon"		=> ADMIN_IMAGES . "icon-headeroptions.png"
						);
		$of_options[] = array( 	"name" 		=> "100% Header",
								"desc" 		=> "This option allows you to enable 100% width for header",
								"id" 		=> "header_100_header_on_off",
								"std" 		=> 1,
								"type" 		=> "switch"
						);		
		$of_options[] = array( 	"name" 		=> "Header Sticky Navigation",
								"desc" 		=> "This option allows you to enable a fixed postion for header.",
								"id" 		=> "header_sticky_nav_on_off",
								"std" 		=> 1,
								"type" 		=> "switch"
						);
		
		$of_options[] = array( 	"name" 		=> "Image Logo / Text Logo",
								"desc" 		=> "This option allows you to upload an image for logo or put yout website title instead of an image.",
								"id" 		=> "pic_txt_logo_on_off",
								"std" 		=> 1,
								"folds"		=> 1,
								"on" 		=> "Custom Image",
								"off" 		=> "Website Title",
								"type" 		=> "switch"
						);
						
		$of_options[] = array( 	"name" 		=> "Main logo",
								"desc" 		=> "Upload your main logo. (Best size 220px x 49px)",
								"id" 		=> "main_logo",
								"std" => get_template_directory_uri()."/images/logo-1x.png",
								"fold" => "pic_txt_logo_on_off",
								"type" 		=> "upload"
						);
						
		$of_options[] = array( 	"name" 		=> "Retina Logo",
								"desc" 		=> "Select an image file for the retina version of the logo.It should be exactly 2x the size of main logo..(Best size 440px x 98px)",
								"id" 		=> "main_logo_retina",
								"std" 		=> get_template_directory_uri()."/images/logo-2x.png",
								"fold" => "pic_txt_logo_on_off",
								"type" 		=> "upload"
						);
		
        $of_options[] = array( "name" => "Standard Logo Width for Retina Logo",
            "desc" => "If retina logo is uploaded, enter the standard logo (1x) version width, do not enter the retina logo width.Only enter number without px",
            "id" => "retina_logo_width",
            "std" => "220",
			 "fold" => "pic_txt_logo_on_off",
            "type" => "text");

        $of_options[] = array( "name" => "Standard Logo Height for Retina Logo",
            "desc" => "If retina logo is uploaded, enter the standard logo (1x) version height, do not enter the retina logo height.Only enter number without px",
            "id" => "retina_logo_height",
            "std" => "50",
			"fold" => "pic_txt_logo_on_off",
            "type" => "text");			
		
		$of_options[] = array( 	"name" 		=> "Home Settings",
								"type" 		=> "heading"
						);
							
		$of_options[] = array( "name" => "Fullsreen Slider",
								"desc" => "Default is Elastic Slider. Please select your homepage fullscreen slider.",
								"std" => "Elastic",
								"id" => "home_slider",
								"type" => "radio",
								"options" => array('Elastic' => 'Elastic', 
													'Revolution' => 'Revolution Slider', 
                                                    'Youtube' => 'Youtube or Vimeo - Fullscreen',                                                    
													'kenburnsexport' => 'Fullscreen Ken Burns Gallery',
													'parallaxslider' => 'Parallax Slider'),

						);

        $of_options[] = array( "name" => "Revolution Slider Shortcode",
            "desc" => "please copy your slider shortcode for Revolution Slider and paste here.",
            "id" => "Revolution_shortcode",
            "std" => "[rev_slider Home_res_slider]",
            "type" => "text");	

        $of_options[] = array( "name" => "Ken Burns Gallery Shortcode",
            "desc" => "please copy your slider shortcode fro Revolution Slider and paste here.",
            "id" => "Ken_shortcode",
            "std" => "[rev_slider kenburnsexport]",
            "type" => "text");	

        $of_options[] = array( "name" => "Parallax Slider Shortcode",
            "desc" => "please copy your slider shortcode fro Revolution Slider and paste here.",
            "id" => "parallax_slider",
            "std" => "[rev_slider parallax_slider]",
            "type" => "text");	        

		$of_options[] = array( 	"name" 		=> "Homepage Layout Manager",
								"desc" 		=> "Organize how you want the layout to appear on the homepage",
								"id" 		=> "homepage_blocks",
								"std" 		=> $of_options_homepage_blocks,
								"type" 		=> "sorter"
						);
		
					
	/*	$of_options[] = array( 	"name" 		=> "Background Images",
								"desc" 		=> "Select a background pattern.",
								"id" 		=> "custom_bg",
								"std" 		=> $bg_images_url."none.png",
								"type" 		=> "tiles",
								"options" 	=> $bg_images,
						);*/
		
		$of_options[] = array( "name" => "Video Settings",
           					 "type" => "heading",
							 	 "icon"		=> ADMIN_IMAGES . "icon-video.png"
						);
		

		$of_options[] = array( "name" => "Revolution Slider Shortcode",
								"desc" => "",
								"id" => "video_slider_shortcode",
								"std" => "[rev_slider youtube]",			
								"type" => "text"
							);
		
		$of_options[] = array( "name" => "Youtube or Vimeo Video Id",
								"desc" => "ex: Video ID for https://www.youtube.com/watch?v=2AJJFNMWEkM is 2AJJFNMWEkM",
								"id" => "video_id",
								"std" => "63036234",			
								"type" => "text"
							);
		
		$of_options[] = array( 	"name" 		=> "Loop Video",
								"desc" 		=> "",
								"id" 		=> "video_loop",
								"std" 		=> 1,								
								"on" 		=> "On",
								"off" 		=> "Off",
								"type" 		=> "switch"
						);
		
		$of_options[] = array( 	"name" 		=> "Set The Volume Level Of The Video",
								"desc" 		=> "",
								"id" 		=> "video_audio_volume",
								"std" 		=> "0",
								"min" 		=> "0",
								"max" 		=> "100",
								"step" 		=> "1",								
								"type" 		=> "sliderui"
						);			
		
		$of_options[] = array( 	"name" 		=> "Contact Settings",
								"type" 		=> "heading",
								"icon"		=> ADMIN_IMAGES . "icon-info.png"
						);
		
		$of_options[] = array( "name" => "Title",
            "desc" => "",
            "id" => "contactus_title",
            "std" => "Longpoint",			
            "type" => "text");
			
		$of_options[] = array( 	"name" 		=> "Address",
								"desc" 		=> "You can add your HTML tags.",
								"id" 		=> "contactus_address",
								"std" 		=> "<p class='bold'>Los Angeles Office</p>Level 2, 74 Pitt Street S",
								"type" 		=> "textarea"
						);
		
		$of_options[] = array( "name" => "Telephone",
            "desc" => "",
            "id" => "contactus_show_phone",
            "std" => "+01800 123 4567",			
            "type" => "text");
			
		$of_options[] = array( "name" => "Latitude",
            "desc" => "Use this website to find your Longitude & Latitude (<a href='http://itouchmap.com/latlong.html' target='_blank'>itouchmap.com/latlong.html</a>)",
            "id" => "contactus_latitude",
            "std" => "33.985224",			
            "type" => "text");
						
		$of_options[] = array( "name" => "Longitude",
            "desc" => "Use this website to find your Longitude & Latitude (<a href='http://itouchmap.com/latlong.html' target='_blank'>itouchmap.com/latlong.html</a>)",
            "id" => "contactus_longitude",
            "std" => "-118.287743",			
            "type" => "text");

		$of_options[] = array( 	"name" 		=> "Marker",
								"desc" 		=> "Upload your map marker.",
								"id" 		=> "contactus_marker",
								"std" => get_template_directory_uri()."/images/map.png",								
								"type" 		=> "upload"
						);
						
		$of_options[] = array( "name" => "Email",
            "desc" => "",
            "id" => "contactus_show_email",
            "std" => "info@demo.rchtheme.com",			
            "type" => "text");
			
		$of_options[] = array( "name" => "Email Recipients",
            "desc" => "The email address where you would like notifications to be sent. To send the same notification to multiple recipients, separate them with a comma.",
            "id" => "contactus_recipients_email",
            "std" => "info@demo.rchtheme.com",			
            "type" => "text");
		
		$of_options[] = array( 	"name" 		=> "Success Message",
								"desc" 		=> "",
								"id" 		=> "contactus_success_message",
								"std" 		=> "Your message has been sent. Thank you!",
								"type" 		=> "textarea"
						);						
			
		$of_options[] = array( 	"name" 		=> "Footer Options",
								"type" 		=> "heading",
								"icon"		=> ADMIN_IMAGES . "icon-footeroptions.png"
						);
		
		$of_options[] = array( 	"name" 		=> "Image Logo / Text Logo",
								"desc" 		=> "This option allows you to upload an image for logo or put yout website title instead of an image.",
								"id" 		=> "footer_pic_txt_logo_on_off",
								"std" 		=> 1,
								"folds"		=> 1,
								"on" 		=> "Custom Image",
								"off" 		=> "Website Title",
								"type" 		=> "switch"
						);
						
		$of_options[] = array( 	"name" 		=> "Main logo",
								"desc" 		=> "Upload your main logo. (Best size 220px x 49px)",
								"id" 		=> "footer_main_logo",
								"std" => get_template_directory_uri()."/images/logo-1x.png",
								"fold" => "footer_pic_txt_logo_on_off",
								"type" 		=> "upload"
						);
						
		$of_options[] = array( 	"name" 		=> "Retina Logo",
								"desc" 		=> "Select an image file for the retina version of the logo.It should be exactly 2x the size of main logo..(Best size 440px x 98px)",
								"id" 		=> "footer_main_logo_retina",
								"std" 		=> get_template_directory_uri()."/images/logo-2x.png",
								"fold" => "footer_pic_txt_logo_on_off",
								"type" 		=> "upload"
						);
		
        $of_options[] = array( "name" => "Standard Logo Width for Retina Logo",
            "desc" => "If retina logo is uploaded, enter the standard logo (1x) version width, do not enter the retina logo width.Only enter number without px",
            "id" => "footer_retina_logo_width",
            "std" => "220",
			 "fold" => "footer_pic_txt_logo_on_off",
            "type" => "text");

        $of_options[] = array( "name" => "Standard Logo Height for Retina Logo",
            "desc" => "If retina logo is uploaded, enter the standard logo (1x) version height, do not enter the retina logo height.Only enter number without px",
            "id" => "footer_retina_logo_height",
            "std" => "50",
			 "fold" => "footer_pic_txt_logo_on_off",
            "type" => "text");	
		
		$of_options[] = array( 	"name" 		=> "Display Social",
								"desc" 		=> "You can enable or disable footer section using this option.",
								"id" 		=> "display_footer_icons",
								"std" 		=> 1,
								"type" 		=> "switch"
						);
						
		
		$of_options[] = array( 	"name" 		=> "Footer copyright",
								"desc" 		=> "This option allows you to enable copyright text.",
								"id" 		=> "display_footer_copyright",
								"std" 		=> 1,
								"type" 		=> "switch"
						);
						
		$of_options[] = array( 	"name" 		=> "Copyright Text",
								"desc" 		=> "",
								"id" 		=> "copyright_text",
								"folds"		=> "display_footer_copyright",
								"std" 		=> "Design and develop by <a href=\"http://www.rchtheme.com\">RCHTHEME</a>",
								"type" 		=> "textarea"
						);

		$of_options[] = array( 	"name" 		=> "Rel=Nofollow",
								"desc" 		=> "Add 'rel=Nofollow' to footer icon links",
								"id" 		=> "rel_nofollow",
								"std" 		=> 1,
								"on" 		=> "Yes",
								"off" 		=> "No",
								"type" 		=> "switch"
						);		

		$of_options[] = array( 	"name" 		=> "Target=_blank",
								"desc" 		=> "Open icon links in a new window.",
								"id" 		=> "target_blank",
								"std" 		=> 1,
								"on" 		=> "Yes",
								"off" 		=> "No",
								"type" 		=> "switch"
						);	

		$of_options[] = array( 	"name" 		=> "Styling Options",
								"type" 		=> "heading"
						);
		
		
		$of_options[] = array( 	"name" 		=> "Theme Skin Layout",
								"desc" 		=> "Open icon links in a new window.",
								"id" 		=> "theme_skin_layout_light",
								"std" 		=> 1,
								"on" 		=> "Light",
								"off" 		=> "Dark",
								"type" 		=> "switch"
						);	

		$of_options[] = array( 	"name" 		=> "Theme Skin Color",
								"desc" 		=> "The theme main color that will be applied to some elements.",
								"id" 		=> "theme_primary_color",
								"std" 		=> "#008797",
								"type" 		=> "color"
						);			


		$of_options[] = array( 	"name" 		=> "Preloader style",
								"desc" 		=> "",
								"id" 		=> "introduction_header_colors",
								"std" 		=> "<h3 style=\"margin: 0;\">Preloader style</h3>",
								"icon" 		=> true,
								"type" 		=> "info"
						);
		$of_options[] = array( 	"name" 		=> "Preloader Background Color",
								"desc" 		=> "",
								"id" 		=> "preloader_background_color",
								"std" 		=> "#008797",
								"type" 		=> "color"
						);
		$of_options[] = array( 	"name" 		=> "Preloader Precentage Color",
								"desc" 		=> "",
								"id" 		=> "preloader_precentage_color",
								"std" 		=> "#fff",
								"type" 		=> "color"
						);		
		$of_options[] = array( 	"name" 		=> "Slider Colors",
								"desc" 		=> "",
								"id" 		=> "introduction_slider_colors",
								"std" 		=> "<h3 style=\"margin: 0;\">Slider Colors</h3>",
								"icon" 		=> true,
								"type" 		=> "info"
						);												
		$of_options[] = array( 	"name" 		=> "Slider Title Color",
								"desc" 		=> "",
								"id" 		=> "header_slider_title_color",
								"std" 		=> "#FFF",
								"type" 		=> "color"
						);
				
		$of_options[] = array( 	"name" 		=> "Slider Alternative Title Color",
								"desc" 		=> "",
								"id" 		=> "header_slider_alternative_title_color",
								"std" 		=> "#FFF",
								"type" 		=> "color"
						);
						
		$of_options[] = array( 	"name" 		=> "Slider Text Color",
								"desc" 		=> "",
								"id" 		=> "header_slider_text_color",
								"std" 		=> "#FFF",
								"type" 		=> "color"
						);
		
		$of_options[] = array( 	"name" 		=> "Slider Button Text Color",
								"desc" 		=> "",
								"id" 		=> "header_slider_button_text_color",
								"std" 		=> "#FFF",
								"type" 		=> "color"
						);					
		
		$of_options[] = array( 	"name" 		=> "Main Navigation Colors",
								"desc" 		=> "",
								"id" 		=> "introduction_main_navigation_colors",
								"std" 		=> "<h3 style=\"margin: 0;\">Main Navigation Colors</h3>",
								"icon" 		=> true,
								"type" 		=> "info"
						);
								
		$of_options[] = array( 	"name" 		=> "Main Navigation Background Color",
								"desc" 		=> "",
								"id" 		=> "main_navigation_background_color",
								"std" 		=> "#000",
								"type" 		=> "color"
						);
		
		$of_options[] = array( 	"name" 		=> "Sticky Navigation Background Color",
								"desc" 		=> "",
								"id" 		=> "sticky_navigation_background_color",
								"std" 		=> "#1c1c1c",
								"type" 		=> "color"
						);
		
		$of_options[] = array( 	"name" 		=> "Sticky Navigation Opacity",
								"desc" 		=> "",
								"id" 		=> "sticky_navigation_opacity",
								"std" 		=> "10",
								"min" 		=> "1",
								"max" 		=> "10",
								"step" 		=> "1",								
								"type" 		=> "sliderui"
						);
		
		$of_options[] = array( 	"name" 		=> "Top Level Text Color",
								"desc" 		=> "",
								"id" 		=> "main_navigation_top_level_text_color",
								"std" 		=> "#FFF",
								"type" 		=> "color"
						);
		
		$of_options[] = array( 	"name" 		=> "Top Level Background Color",
								"desc" 		=> "",
								"id" 		=> "main_navigation_top_level_background_color",
								"std" 		=> "",
								"type" 		=> "color"
						);		
								
		$of_options[] = array( 	"name" 		=> "Top Level Hover Text Color",
								"desc" 		=> "",
								"id" 		=> "main_navigation_top_level_hover_text_color",
								"std" 		=> "#fff",
								"type" 		=> "color"
						);
						
		$of_options[] = array( 	"name" 		=> "Top Level Hover Background Color",
								"desc" 		=> "",
								"id" 		=> "main_navigation_top_level_hover_background_color",
								"std" 		=> "#059ba5",
								"type" 		=> "color"
						);				
									
			
		$of_options[] = array( 	"name" 		=> "Content Colors",
								"desc" 		=> "",
								"id" 		=> "introduction_body_colors",
								"std" 		=> "<h3 style=\"margin: 0;\">Body Colors</h3>",
								"icon" 		=> true,
								"type" 		=> "info"
						);
		
		$of_options[] = array( 	"name" 		=> "Body Background Color",
								"desc" 		=> "",
								"id" 		=> "body_background_color",
								"std" 		=> "#FFF",
								"type" 		=> "color"
						);		
		
		$of_options[] = array( 	"name" 		=> "Body Text Color",
								"desc" 		=> "",
								"id" 		=> "body_text_color",
								"std" 		=> "#666666",
								"type" 		=> "color"
						);
				
		$of_options[] = array( 	"name" 		=> "Heading 1 (h1) Color",
								"desc" 		=> "",
								"id" 		=> "heading_h1_text_color",
								"std" 		=> "#434343",
								"type" 		=> "color"
						);
				
		$of_options[] = array( 	"name" 		=> "Heading 2 (h2) Color",
								"desc" 		=> "",
								"id" 		=> "heading_h2_text_color",
								"std" 		=> "#434343",
								"type" 		=> "color"
						);
		
		$of_options[] = array( 	"name" 		=> "Heading 3 (h3) Color",
								"desc" 		=> "",
								"id" 		=> "heading_h3_text_color",
								"std" 		=> "#434343",
								"type" 		=> "color"
						);
		
		$of_options[] = array( 	"name" 		=> "Heading 4 (h4) Color",
								"desc" 		=> "",
								"id" 		=> "heading_h4_text_color",
								"std" 		=> "#434343",
								"type" 		=> "color"
						);
		
		$of_options[] = array( 	"name" 		=> "Heading 5 (h5) Color",
								"desc" 		=> "",
								"id" 		=> "heading_h5_text_color",
								"std" 		=> "#434343",
								"type" 		=> "color"
						);
		
		$of_options[] = array( 	"name" 		=> "Heading 6 (h6) Color",
								"desc" 		=> "",
								"id" 		=> "heading_h6_text_color",
								"std" 		=> "#434343",
								"type" 		=> "color"
						);
		
		$of_options[] = array( 	"name" 		=> "Footer Colors",
								"desc" 		=> "",
								"id" 		=> "introduction_footer_colors",
								"std" 		=> "<h3 style=\"margin: 0;\">Footer Colors</h3>",
								"icon" 		=> true,
								"type" 		=> "info"
						);
		
		$of_options[] = array( 	"name" 		=> "Footer Background Color",
								"desc" 		=> "",
								"id" 		=> "footer_background_color",
								"std" 		=> "#1c1c1c",
								"type" 		=> "color"
						);		
		
		$of_options[] = array( 	"name" 		=> "Footer Text Color",
								"desc" 		=> "",
								"id" 		=> "footer_text_color",
								"std" 		=> "#fff",
								"type" 		=> "color"
						);
						
		$of_options[] = array( 	"name" 		=> "Footer Link Color",
								"desc" 		=> "",
								"id" 		=> "footer_link_color",
								"std" 		=> "#008493",
								"type" 		=> "color"
						);

		$of_options[] = array( 	"name" 		=> "Footer Link Hover Color",
								"desc" 		=> "",
								"id" 		=> "footer_link_hover_color",
								"std" 		=> "#828282",
								"type" 		=> "color"
						);	

		
		$of_options[] = array( 	"name" 		=> "Copyright Text Color",
								"desc" 		=> "",
								"id" 		=> "copyright_text_color",
								"std" 		=> "#666666",
								"type" 		=> "color"
						);
		
		$of_options[] = array( 	"name" 		=> "Social Network Icon Background",
								"desc" 		=> "",
								"id" 		=> "social_background_color",
								"std" 		=> "#828282",
								"type" 		=> "color"
						);
		
		$of_options[] = array( 	"name" 		=> "Social Network Icon Hover Background",
								"desc" 		=> "",
								"id" 		=> "social_background_color_hover",
								"std" 		=> "#008D9E",
								"type" 		=> "color"
						);	
		
		$of_options[] = array( 	"name" 		=> "Social Network Icon Colors",
								"desc" 		=> "",
								"id" 		=> "copyright_social_icon_color",
								"std" 		=> "#323232",
								"type" 		=> "color"
						);	
						
		$of_options[] = array( 	"name" 		=> "Social Network Icon Hover Color",
								"desc" 		=> "",
								"id" 		=> "copyright_social_icon_hover_color",
								"std" 		=> "#FFF",
								"type" 		=> "color"
						);
		
		$of_options[] = array( 	"name" 		=> "Custom Styles",
								"desc" 		=> "",
								"id" 		=> "introduction_custom_styles",
								"std" 		=> "<h3 style=\"margin: 0;\">Custom Styles</h3>",
								"icon" 		=> true,
								"type" 		=> "info"
						);	
		
		$of_options[] = array( 	"name" 		=> "Custom CSS",
								"desc" 		=> "Quickly add some CSS to your theme by adding it to this block.",
								"id" 		=> "custom_css",
								"std" 		=> "",
								"type" 		=> "textarea"
						);
		
		$of_options[] = array( 	"name" 		=> "Typography",
								"type" 		=> "heading",
								"icon"		=> ADMIN_IMAGES . "typography.png"
						);
						
		$of_options[] = array( 	"name" 		=> "Body Font",	
								"desc" 		=> "Google Fonts & Your OS fonts, Simply search for it.",
								"id" 		=> "body_font",
								"std" 		=> "Open Sans",
								"type" 		=> "select_google_font",
								"options" 	=> $google_fonts
						);
		$of_options[] = array( 	"name" 		=> "",
								"desc" 		=> "",
								"id" 		=> "body_font_size",
								"std" 		=> "14",
								"min" 		=> "10",
								"max" 		=> "30",
								"step" 		=> "1",								
								"type" 		=> "sliderui"
						);
						
		$of_options[] = array( 	"name" 		=> "Heading Font",		
								"desc" 		=> "Google Fonts & Your OS fonts, Simply search for it.",
								"id" 		=> "heading_font",
								"std" 		=> "Lato",
								"type" 		=> "select_google_font",
								"options" 	=> $google_fonts
						);
		
		$of_options[] = array( 	"name" 		=> "",
								"desc" 		=> "H1",
								"id" 		=> "heading_h1_font_size",
								"std" 		=> "55",
								"min" 		=> "10",
								"max" 		=> "80",
								"step" 		=> "1",								
								"type" 		=> "sliderui"
						);
		
		$of_options[] = array( 	"name" 		=> "",
								"desc" 		=> "H2",
								"id" 		=> "heading_h2_font_size",
								"std" 		=> "45",
								"min" 		=> "10",
								"max" 		=> "80",
								"step" 		=> "1",								
								"type" 		=> "sliderui"
						);
		
		$of_options[] = array( 	"name" 		=> "",
								"desc" 		=> "H3",
								"id" 		=> "heading_h3_font_size",
								"std" 		=> "30",
								"min" 		=> "10",
								"max" 		=> "80",
								"step" 		=> "1",								
								"type" 		=> "sliderui"
						);
		
		$of_options[] = array( 	"name" 		=> "",
								"desc" 		=> "H4",
								"id" 		=> "heading_h4_font_size",
								"std" 		=> "25",
								"min" 		=> "10",
								"max" 		=> "80",
								"step" 		=> "1",								
								"type" 		=> "sliderui"
						);
		
		$of_options[] = array( 	"name" 		=> "",
								"desc" 		=> "H5",
								"id" 		=> "heading_h5_font_size",
								"std" 		=> "20",
								"min" 		=> "10",
								"max" 		=> "80",
								"step" 		=> "1",								
								"type" 		=> "sliderui"
						);
		
		$of_options[] = array( 	"name" 		=> "",
								"desc" 		=> "H6",
								"id" 		=> "heading_h6_font_size",
								"std" 		=> "15",
								"min" 		=> "10",
								"max" 		=> "80",
								"step" 		=> "1",								
								"type" 		=> "sliderui"
						);
		
		$of_options[] = array( 	"name" 		=> "Navigation Font",	
								"desc" 		=> "Google Fonts & Your OS fonts, Simply search for it.",
								"id" 		=> "navigation_font",
								"std" 		=> "Carrois Gothic SC",
								"type" 		=> "select_google_font",
								"options" 	=> $google_fonts
						);
		

		$of_options[] = array( 	"name" 		=> "",
								"desc" 		=> "",
								"id" 		=> "navigation_font_size",
								"std" 		=> "17",
								"min" 		=> "10",
								"max" 		=> "30",
								"step" 		=> "1",								
								"type" 		=> "sliderui"
						);		
			
		$of_options[] = array( 	"name" 		=> "Footer Font",	
								"desc" 		=> "Google Fonts & Your OS fonts, Simply search for it.",
								"id" 		=> "footer_font",
								"std" 		=> "Open Sans",
								"type" 		=> "select_google_font",
								"options" 	=> $google_fonts
						);
		
		$of_options[] = array( 	"name" 		=> "",
								"desc" 		=> "",
								"id" 		=> "footer_font_size",
								"std" 		=> "12",
								"min" 		=> "10",
								"max" 		=> "30",
								"step" 		=> "1",								
								"type" 		=> "sliderui"
						);		
				
		
 		$of_options[] = array( "name" => "Elastic Slider",
           					 "type" => "heading",
							 	 "icon"		=> ADMIN_IMAGES . "icon-slider.png"
						);

		$of_options[] = array( 	"name" 		=> "Show all text on slider",
								"desc" 		=> "You can select on / off to show or hide your text",
								"id" 		=> "all_txt_slider_on_off",
								"std" 		=> 1,
								"folds"		=> 1,
								"on" 		=> "Show",
								"off" 		=> "Hide",
								"type" 		=> "switch"
						);

        $of_options[] = array( "name" => "Show / Hide Title",
            "desc" => "",
            "id" => "elastic_title_on_off",
            "std" => "1",
			"on" 		=> "Show",
			"off" 		=> "Hide",            
			"fold" => "all_txt_slider_on_off", /* the switch hook */
            "type" => "switch"
			);

        $of_options[] = array( "name" => "Show / Hide Alternative Text",
            "desc" => "",
            "id" => "elastic_alternative_on_off",
            "std" => "1",
			"on" 		=> "Show",
			"off" 		=> "Hide",            
			"fold" => "all_txt_slider_on_off", /* the switch hook */
            "type" => "switch"
			);

        $of_options[] = array( "name" => "Show / Hide Description",
            "desc" => "",
            "id" => "elastic_description_on_off",
            "std" => "1",
			"on" 		=> "Show",
			"off" 		=> "Hide",            
			"fold" => "all_txt_slider_on_off", /* the switch hook */
            "type" => "switch"
			);

        $of_options[] = array( "name" => "Show / Hide Buttons",
            "desc" => "",
            "id" => "elastic_buttons_on_off",
            "std" => "1",
			"on" 		=> "Show",
			"off" 		=> "Hide",            
			"fold" => "all_txt_slider_on_off", /* the switch hook */
            "type" => "switch"
			);


        $of_options[] = array( "name" => "Social Media",
           					 "type" => "heading",
							 	 "icon"		=> ADMIN_IMAGES . "social.png"
						);
						
		$of_options[] = array( 	"name" 		=> "Social Media Links",
								"desc" 		=> "",
								"id" 		=> "introduction_social_media",
								"std" 		=> "<h3 style=\"margin: 0 0 10px;\">Social Media Custom Links</h3>
								Insert your custom links to show the social media icons. Leave blank to hide icons.",
								"icon" 		=> true,
								"type" 		=> "info"
						);
											
        $of_options[] = array( "name" => "Facebook",
            "desc" => "Your Facebook link. Leave blank to hide icon.",
            "id" => "facebook_link",
            "std" => "http://www.facebook.com",
            "type" => "text"
			);
			
		 $of_options[] = array( "name" => "LinkedIn",
            "desc" => "Your LinkedIn link. Leave blank to hide icon.",
            "id" => "linkedin_link",
            "std" => "http://www.linkedin.com",
            "type" => "text"
			);	

        $of_options[] = array( "name" => "Google+",
            "desc" => "Your Google+ link. Leave blank to hide icon.",
            "id" => "google_link",
            "std" => "http://plus.google.com",
            "type" => "text"
			);
			
        $of_options[] = array( "name" => "Twitter",
            "desc" => "Your Twitter link. Leave blank to hide icon.",
            "id" => "twitter_link",
            "std" => "http://www.twitter.com",
            "type" => "text"
			);

        $of_options[] = array( "name" => "Youtube",
            "desc" => "Your Youtube link. Leave blank to hide icon.",
            "id" => "youtube_link",
            "std" => "http://www.youtube.com",
            "type" => "text"
			);
			
        $of_options[] = array( "name" => "Skype",
            "desc" => "Your Skype link. Leave blank to hide icon.",
            "id" => "skype_link",
            "std" => "http://www.skype.com",
            "type" => "text"
			);	
								
        $of_options[] = array( "name" => "Flickr",
            "desc" => "Your Flickr link. Leave blank to hide icon.",
            "id" => "flickr_link",
            "std" => "http://www.fliker.com",
            "type" => "text"
			);

        $of_options[] = array( "name" => "Vimeo",
            "desc" => "Your Vimeo link. Leave blank to hide icon.",
            "id" => "vimeo_link",
            "std" => "http://www.vimeo.com",
            "type" => "text"
			);

        $of_options[] = array( "name" => "Pinterest",
            "desc" => "Your Pinterest link. Leave blank to hide icon.",
            "id" => "pinterest_link",
            "std" => "http://www.pinterest.com",
            "type" => "text"
			);

        $of_options[] = array( "name" => "Dribbble",
            "desc" => "Your Dribbble link. Leave blank to hide icon.",
            "id" => "dribbble_link",
            "std" => "http://www.dribbble.com",
            "type" => "text"
			);

        $of_options[] = array( "name" => "Instagram",
            "desc" => "Your Instagram link. Leave blank to hide icon.",
            "id" => "instagram_link",
            "std" => "http://www.instagram.com",
            "type" => "text"
			);

        $of_options[] = array( "name" => "Tumblr",
            "desc" => "Your Tumblr link. Leave blank to hide icon.",
            "id" => "tumblr_link",
            "std" => "http://www.Tumblr.com",
            "type" => "text"
			);

        $of_options[] = array( "name" => "Yahoo",
            "desc" => "Your Yahoo link. Leave blank to hide icon.",
            "id" => "yahoo_link",
            "std" => "http://www.yahoo.com",
            "type" => "text"
			);

        $of_options[] = array( "name" => "RSS",
            "desc" => "Your RSS link. Leave blank to hide icon.",
            "id" => "rss_link",
            "std" => "http://www.rss.com",
            "type" => "text"
			);

		$of_options[] = array( 	"name" 		=> "Custom Icon 1",
								"desc" 		=> "Enable custom icon 1 settings.",
								"id" 		=> "custom_icon1",
								"std" 		=> 0,
								"folds"		=> 1,
								"type" 		=> "switch"
						);

        $of_options[] = array( "name" => "Custom Icon Name",
            "desc" => "This name shows in the hover tooltip.",
            "id" => "custom_icon_name",
            "std" => "",
			 "fold" => "custom_icon1", /* the switch hook */
            "type" => "text"
			);

        $of_options[] = array( "name" => "Custom Icon Link",
            "desc" => "Insert a link for your custom icon.",
            "id" => "custom_icon_link",
            "std" => "",
			 "fold" => "custom_icon1", /* the switch hook */
            "type" => "text"
			);			

        $of_options[] = array( "name" => "Custom Icon Image",
            "desc" => "Select an image file for your custom icon.(PNG/JPG/GIF). Best size 50px X 50px ",
            "id" => "custom_icon_image",
            "std" => "",
            "mod" => "",
			 "fold" => "custom_icon1", /* the switch hook */
            "type" => "media"
			);

        $of_options[] = array( "name" => "Custom Icon Image Retina",
            "desc" => "Select an image file for the retina version of the icon. It should be 2x the size of main icon.Leave it blank if you want to use the main icon image.",
            "id" => "custom_icon_image_retina",
            "std" => "",
            "mod" => "",
			 "fold" => "custom_icon1", /* the switch hook */
            "type" => "media"
			);

        $of_options[] = array( "name" => "Standard Icon Width for Retina Icon",
            "desc" => "If retina icon is added, enter the standard icon (1x) version width, do not enter the retina icon width.",
            "id" => "retina_icon_width",
            "std" => "50",
			 "fold" => "custom_icon1", /* the switch hook */
            "type" => "text"
			);

        $of_options[] = array( "name" => "Standard Icon Height for Retina Icon",
            "desc" => "If retina icon is added, enter the standard icon (1x) version height, do not enter the retina icon height.",
            "id" => "retina_icon_height",
            "std" => "50",
			 "fold" => "custom_icon1", /* the switch hook */
            "type" => "text"
			);
			
		$of_options[] = array( 	"name" 		=> "Custom Icon 2",
								"desc" 		=> "Enable custom icon 2 settings.",
								"id" 		=> "custom_icon2",
								"std" 		=> 0,
								"folds"		=> 1,
								"type" 		=> "switch"
						);
						
        $of_options[] = array( "name" => "Custom Icon Name",
            "desc" => "This name shows in the hover tooltip.",
            "id" => "custom_icon_name2",
            "std" => "",
			 "fold" => "custom_icon2", /* the switch hook */
            "type" => "text"
			);

        $of_options[] = array( "name" => "Custom Icon Link",
            "desc" => "Insert a link for your custom icon.(PNG/JPG/GIF)",
            "id" => "custom_icon_link2",
            "std" => "",
			 "fold" => "custom_icon2", /* the switch hook */
            "type" => "text"
			);			

        $of_options[] = array( "name" => "Custom Icon Image",
            "desc" => "Select an image file for your custom icon.",
            "id" => "custom_icon_image2",
            "std" => "",
            "mod" => "",
			 "fold" => "custom_icon2", /* the switch hook */
            "type" => "media"
			);

        $of_options[] = array( "name" => "Custom Icon Image Retina",
            "desc" => "Select an image file for the retina version of the icon. It should be 2x the size of main icon.Leave it blank if you want to use the main icon image.",
			  "id" => "custom_icon_image_retina2",
            "std" => "",
            "mod" => "",
			 "fold" => "custom_icon2", /* the switch hook */
            "type" => "media"
			);

        $of_options[] = array( "name" => "Standard Icon Width for Retina Icon",
            "desc" => "If retina icon is added, enter the standard icon (1x) version width, do not enter the retina icon width.",
            "id" => "retina_icon_width2",
            "std" => "",
			 "fold" => "custom_icon2", /* the switch hook */
            "type" => "text"
			);

        $of_options[] = array( "name" => "Standard Icon Height for Retina Icon",
            "desc" => "If retina icon is added, enter the standard icon (1x) version height, do not enter the retina icon height.",
            "id" => "retina_icon_height2",
            "std" => "",
			 "fold" => "custom_icon2", /* the switch hook */
            "type" => "text"
			);
			
		// $of_options[] = array( 	"name" 		=> "Page Settings",
								// "icon"		=> ADMIN_IMAGES . "icon-docs.png",
								// "type" 		=> "heading"
						// );
		
		// $of_options[] = array( 	"name" 		=> "Full Width Page",
								// "desc" 		=> "",
								// "id" 		=> "page_full_width",
								// "std" 		=> 1,
								// "type" 		=> "switch"
							// );
		
		// $of_options[] = array( 	"name" 		=> "Display Sidebar",
								// "desc" 		=> "",
								// "id" 		=> "page_show_sidebar",
								// "std" 		=> 1,
								// "type" 		=> "switch"
							// );
		
		// $of_options[] = array( "name" => "Select Default Sidebar",
								// "desc" => "",
								// "std" => "Page",
								// "id" => "page_sidebar",
								// "type" => "select",
								// "options" => getSidebars(),
						// );

		$of_options[] = array( 	"name" 		=> "Single Post",
								"icon"		=> ADMIN_IMAGES . "icon-docs.png",
								"type" 		=> "heading"
						);								
		
		$of_options[] = array( "name" => "Select Default Sidebar",
								"desc" => "",
								"std" => "Blog",
								"id" => "single_post_sidebar",
								"type" => "select",
								"options" => getSidebars(),

						);
		
		$of_options[] = array( 	"name" 		=> "Display Sidebar",
								"desc" 		=> "",
								"id" 		=> "blog_display_sidebar",
								"std" 		=> 1,
								"type" 		=> "switch"
		);
		$of_options[] = array( 	"name" 		=> "Enable Comments",
								"desc" 		=> "",
								"id" 		=> "blog_enable_comments",
								"std" 		=> 1,
								"type" 		=> "switch"
		);
		$of_options[] = array( 	"name" 		=> "Display Date",
								"desc" 		=> "",
								"id" 		=> "blog_display_date",
								"std" 		=> 1,
								"type" 		=> "switch"
		);
		$of_options[] = array( 	"name" 		=> "Display Share Buttons",
								"desc" 		=> "",
								"id" 		=> "blog_display_share",
								"std" 		=> 1,
								"type" 		=> "switch"
		);
		$of_options[] = array( 	"name" 		=> "Display Meta",
								"desc" 		=> "",
								"id" 		=> "blog_display_meta",
								"std" 		=> 1,
								"type" 		=> "switch"
		);
		$of_options[] = array( 	"name" 		=> "Display Author",
								"desc" 		=> "",
								"id" 		=> "blog_display_author",
								"std" 		=> 1,
								"type" 		=> "switch"
		);		
		$of_options[] = array( 	"name" 		=> "Display Post Category",
								"desc" 		=> "",
								"id" 		=> "blog_display_category",
								"std" 		=> 1,
								"type" 		=> "switch"
		);
		$of_options[] = array( 	"name" 		=> "Display Author Box",
								"desc" 		=> "",
								"id" 		=> "blog_display_author_box",
								"std" 		=> 1,
								"type" 		=> "switch"
		);
		
		$of_options[] = array( 	"name" 		=> "Display Tags",
								"desc" 		=> "",
								"id" 		=> "blog_display_tags",
								"std" 		=> 1,
								"type" 		=> "switch"
		);

		//Sidebar Settings
		$of_options[] = array( 	"name" 		=> "Sidebars",
								"icon"		=> ADMIN_IMAGES . "sidebar.png",
								"type" 		=> "heading"
						);	
						
		$of_options[] = array( 	"name" 		=> "Slidebar Options",
								"desc" 		=> "Add Custom slidebar.",
								"id" 		=> "sidebars",
								"std" 		=> $default_sidebars,
								"type" 		=> "sidebar"
						);
						
		//SEO Settings
		/*
		$of_options[] = array( 	"name" 		=> "SEO Settings",
								"type" 		=> "heading"
						);		
		
        $of_options[] = array( "name" => "Homepage Custom Title",
            "desc" =>  __( "Google typically displays the first 50-60 characters of a title tag, or as many characters as will fit into a 512-pixel display. ", "rchtheme" ),
            "id" => "rch_home_seo_title",
            "std" => "",
            "type" => "text"
			);

        $of_options[] = array( "name" => "Homepage Custom Description",
            "desc" =>  __( "The description should optimally be between 150-160 characters.", "rchtheme" ),
            "id" => "rch_home_seo_desc",
            "std" => "",
            "type" => "text"
			);

		$of_options[] = array( 	"name" 		=> "Use Keywords",
								"desc" 		=> "",
								"id" 		=> "rch_seo_use_keywords",
								"std" 		=> 0,
								"folds"		=> 1,
								"type" 		=> "switch"
						);

        $of_options[] = array( "name" => "Homepage Custom Keywords",
            "desc" =>  __( "Please Enter your keywords. Separate them with a , (Comma).", "rchtheme" ),
            "id" => "rch_home_seo_keywords",
            "std" => "",
            "fold" => "rch_seo_use_keywords",
            "type" => "text"
			);
			*/

		// Backup Options
		$of_options[] = array( 	"name" 		=> "Backup Options",
								"type" 		=> "heading",
								"icon"		=> ADMIN_IMAGES . "icon-slider.png"
						);
						
		$of_options[] = array( 	"name" 		=> "Backup and Restore Options",
								"id" 		=> "of_backup",
								"std" 		=> "",
								"type" 		=> "backup",
								"desc" 		=> 'You can use the two buttons below to backup your current options, and then restore it back at a later time. This is useful if you want to experiment on the options but would like to keep the old settings in case you need it back.',
						);
						
		$of_options[] = array( 	"name" 		=> "Transfer Theme Options Data",
								"id" 		=> "of_transfer",
								"std" 		=> "",
								"type" 		=> "transfer",
								"desc" 		=> 'You can tranfer the saved options data between different installs by copying the text inside the text box. To import data from another install, replace the data in the text box with the one from another install and click "Import Options".',
						);

	}//End function: of_options()
}//End chack if function exists: of_options()
?>
