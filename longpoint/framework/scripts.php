<?php
/**************************************
 * RCHTHEME Scripts&Syles
 *
 * @package  RCHTHEME/Framework
 * @author   RCHTHEME
 * @link     http://www.rchtheme.com
**************************************/
 
//include stylesheet files
	if ( !function_exists('rchtheme_include_stylesheet') ) {
		function rchtheme_include_stylesheet() {
			
			wp_register_style( 'bootstrap', get_template_directory_uri() . '/framework/assets/bootstrap/css/bootstrap.min.css', false, '3.1.1', 'all' );
			wp_enqueue_style( 'bootstrap' );
			
			wp_register_style( 'bootstrap-theme', get_template_directory_uri() . '/framework/assets/bootstrap/css/bootstrap-theme.min.css', false, '3.1.1', 'all' );
			wp_enqueue_style( 'bootstrap-theme' );			
			
			wp_register_style( 'animate-styles', get_template_directory_uri() . '/framework/assets/css/animate.min.css', false, '3.1.0', 'all' );
			wp_enqueue_style( 'animate-styles' );
			
			wp_register_style( 'shortcode-styles', get_template_directory_uri() . '/framework/assets/css/shortcode.css', false, '1.0', 'all' );
			wp_enqueue_style( 'shortcode-styles' );

			wp_register_style( 'prettyPhoto', get_template_directory_uri() . '/framework/assets/css/prettyPhoto.css', false, '1.0', 'all' );
			wp_enqueue_style( 'prettyPhoto' );

			wp_register_style( 'font_awesome', get_template_directory_uri() . '/framework/assets/font-awesome/css/font-awesome.css', null, '4.1.0' );
			wp_enqueue_style( 'font_awesome' );
						
			wp_register_style( 'owl-carousel', get_template_directory_uri() . '/framework/assets/owl-carousel/owl.carousel.css', false, '1.3.2', 'all' );
			wp_enqueue_style( 'owl-carousel' );
			
			wp_register_style( 'owl-carousel-theme', get_template_directory_uri() . '/framework/assets/owl-carousel/owl.theme.css', false, '1.3.2', 'all' );
			wp_enqueue_style( 'owl-carousel-theme' );
			
			wp_deregister_style( 'style-css' );
			wp_register_style( 'style-css', get_stylesheet_uri() );
			wp_enqueue_style( 'style-css' );
			
			/*Enqueue Color Stylesheet */
			wp_register_style( 'color-styles', get_template_directory_uri() . '/framework/assets/css/color.php', null, '1.0' );
			wp_enqueue_style( 'color-styles' );

		}
		add_action( 'wp_enqueue_scripts', 'rchtheme_include_stylesheet', 9);
	}

//include script files
	if ( !function_exists('rchtheme_include_script') ) {
		function rchtheme_include_script(){
			
			wp_register_script( 'preloader', get_template_directory_uri() . '/js/jquery.queryloader2.min.js', array( 'jquery' ) );			
			wp_enqueue_script( 'preloader' );

			wp_register_script('googlemaps', ('http' . ( is_ssl() ? 's' : '' ) . '://maps.google.com/maps/api/js?sensor=false'), false, null, true);
			wp_enqueue_script('googlemaps');

			wp_register_script( 'bootstrap-script', get_template_directory_uri() . '/framework/assets/bootstrap/js/bootstrap.min.js', array( 'jquery' ), null, true );			
			wp_enqueue_script( 'bootstrap-script' );

			 if ( is_singular() && get_option( 'thread_comments' ) ) {
        		wp_enqueue_script( 'comment-reply' );
    		}

			wp_register_script( 'modernize-script', get_template_directory_uri() . '/js/modernizr.js',null, null, true);			
			wp_enqueue_script( 'modernize-script' );
	
			global $smof_data;
			if ($smof_data['header_sticky_nav_on_off'] == 1) {			
			wp_register_script( 'jquery-sticky', get_template_directory_uri() . '/js/jquery.sticky.js',null, null, true);			
			wp_enqueue_script( 'jquery-sticky' );
			}
			wp_register_script( 'jquery-waypoints', get_template_directory_uri() . '/js/waypoints.min.js',  array( 'jquery' ), null, true  );			
			wp_enqueue_script( 'jquery-waypoints' );
						
			wp_register_script( 'owl-carousel', get_template_directory_uri() . '/framework/assets/owl-carousel/owl.carousel.min.js',  array( 'jquery' ), null, true  );			
			wp_enqueue_script( 'owl-carousel' );
		
			wp_register_script( 'jquery.stellar.min', get_template_directory_uri() . '/js/jquery.stellar.min.js', array( 'jquery' ), null, true  );			
			wp_enqueue_script( 'jquery.stellar.min' );	

			wp_register_script( 'jquery.prettyPhoto', get_template_directory_uri() . '/framework/assets/js/jquery.prettyPhoto.js', array( 'jquery' ), null, true  );			
			wp_enqueue_script( 'jquery.prettyPhoto' );	

			wp_register_script( 'jquery.mixitup', get_template_directory_uri() . '/framework/assets/grid/jquery.mixitup.min.js',  array( 'jquery' ), null, true );			
			wp_enqueue_script( 'jquery.mixitup' );
									
			wp_register_script( 'portfolio-grid', get_template_directory_uri() . '/framework/assets/grid/grid.js', array( 'jquery' ), null, true  );			
			wp_enqueue_script( 'portfolio-grid' );
			
			wp_register_script( 'okvideo.min', get_template_directory_uri() . '/js/okvideo.min.js', array( 'jquery' ), null, true  );			
			wp_enqueue_script( 'okvideo.min' );	

			wp_register_script( 'rch-backstretch', get_template_directory_uri() . '/framework/assets/js/jquery.backstretch.min.js', array( 'jquery' ), null, true );			
			wp_enqueue_script( 'rch-backstretch' );

			wp_register_script( 'woo-script', get_template_directory_uri() . '/framework/assets/js/wow.min.js', array( 'jquery' ), null, true );			
			wp_enqueue_script( 'woo-script' );

			wp_register_script( 'jquery-app', get_template_directory_uri() . '/js/app.js', array( 'jquery' ), null, true );			
			wp_enqueue_script( 'jquery-app' );
		}
		add_action( 'wp_enqueue_scripts', 'rchtheme_include_script' );
	}


// Admin Script Files
	if ( !function_exists('rch_admin_script') ) {
		function rch_admin_script() {
			 global $post_type;
  			 if( 'rch_portfolio' != $post_type ) { return; }
			 			 
			wp_enqueue_script( 'jquery-ui-datepicker' );
			wp_register_style( 'rch-datapicker-style' , get_template_directory_uri() . '/framework/assets/css/datepicker.css' );			
			wp_enqueue_style( 'rch-datapicker-style' );
			wp_register_script( 'rch-admin-script' , get_template_directory_uri() . '/framework/assets/js/admin.js', array( 'jquery' ) );			
			wp_enqueue_script( 'rch-admin-script' );
			
			
			
		}
		add_action( 'admin_enqueue_scripts', 'rch_admin_script' );	
	}
	
	
/**
 * Checks font options to see if a Google font is selected.
 * If so, theme_options_enqueue_google_font is called to enqueue the font.
 * Ensures that each Google font is only enqueued once.
 */
	if ( !function_exists( 'theme_options_google_fonts' ) ) {
		function theme_options_google_fonts() {
			
			global $smof_data;
			$all_google_fonts = array_keys( theme_options_get_google_fonts() );
			
			// Define all the options that possibly have a unique Google font
			$body_font = $smof_data['body_font'];
			$heading_font = $smof_data['heading_font'];
			$navigation_font = $smof_data['navigation_font'];
			$footer_font = $smof_data['footer_font'];
			
			// Get the font face for each option and put it in an array
			$selected_fonts = array(
				$body_font,
				$heading_font,
				$navigation_font,
				$footer_font );
			
			// Remove any duplicates in the list
			$selected_fonts = array_unique($selected_fonts);
			
			// Check each of the unique fonts against the defined Google fonts
			// If it is a Google font, go ahead and call the function to enqueue it
			$fonts = 'Source+Sans+Pro:300,700,300italic|';
			foreach ( $selected_fonts as $font ) {
				if ( in_array( $font, $all_google_fonts ) ) {
					if ( $font == 'Open Sans' )
						$font = 'Open Sans:400,800,300,700,600';
					if ( $font == 'Lato' )
						$font = 'Lato:300,400,700';
					$fonts .= str_replace(" ", "+", $font) . '|';
				}
			}
			theme_options_enqueue_google_font(trim($fonts, '|'));
		}
	}
	add_action( 'wp_enqueue_scripts', 'theme_options_google_fonts' );

/**
 * Enqueues the Google $font that is passed
 */
	function theme_options_enqueue_google_font($fonts) {	
		if(!empty($fonts))
			wp_enqueue_style( "google_fonts", "http" . ( is_ssl() ? 's' : '' ) . "://fonts.googleapis.com/css?family=$fonts", false, null, 'all' );
	}