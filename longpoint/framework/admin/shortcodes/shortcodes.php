<?php 
/**************************************
 * RCHTHEME Framworks Shortcodes
 *
 * @package  RCHTHEME/Framework
 * @author   RCHTHEME
 * @link     http://www.rchtheme.com
**************************************/

// Add only in Rich Editor mode
if (get_user_option('rich_editing') == 'true' && (current_user_can('edit_posts') || current_user_can('edit_pages'))) {
	add_action( 'admin_enqueue_scripts', 'rchtheme_shortcodes_include_stylesheet' );
	add_action( 'admin_enqueue_scripts', 'rchtheme_shortcodes_include_script' );
	add_action('media_buttons', 'admin_shortcodes_button', 11);	
}

//include stylesheet files
	if ( !function_exists('rchtheme_shortcodes_include_stylesheet') ) {
		function rchtheme_shortcodes_include_stylesheet() {
			
			wp_register_style('rch_dialogstyle', get_template_directory_uri() . '/framework/admin/assets/css/tinymce-shortcodes.css');		
			wp_enqueue_style( 'rch_dialogstyle' );
			
			/* Enqueue Font Awesome Stylesheet */
			wp_register_style( 'font_awesome', get_template_directory_uri() . '/framework/assets/font-awesome/css/font-awesome.css', null, '4.0.3' );
			wp_enqueue_style( 'font_awesome' );
			
			/* Color Picker */
			wp_register_style( 'wp-color-picker', get_template_directory_uri() . '/framework/admin/assets/css/color-picker.min.css' );			
			wp_enqueue_style( 'wp-color-picker' );
			
			
			wp_register_style( 'jquery-ui-custom', get_template_directory_uri() . '/framework/admin/assets/css/jquery-ui-custom.css' );			
			wp_enqueue_style( 'jquery-ui-custom' );
		}
	}
	
//include stylesheet files
	if ( !function_exists('rchtheme_shortcodes_include_script') ) {
		function rchtheme_shortcodes_include_script() {
		
			wp_enqueue_script('jquery-ui-sortable');
			
			wp_register_script('rch_scripts', get_template_directory_uri() . '/framework/admin/shortcodes/js/scripts.js', array('jquery'));		
			wp_enqueue_script( 'rch_scripts' );	
			
			wp_register_script('rch_dialogscripts', get_template_directory_uri() . '/framework/admin/shortcodes/js/dialog.js', array('jquery'));		
			wp_enqueue_script( 'rch_dialogscripts' );	

			/* Color Picker */
			wp_register_script( 'iris', get_template_directory_uri() . '/framework/admin/assets/js/iris.min.js', array( 'jquery-ui-draggable', 'jquery-ui-slider', 'jquery-touch-punch' ), false, 1 );
			wp_register_script( 'wp-color-picker', get_template_directory_uri() . '/framework/admin/assets/js/color-picker.min.js', array( 'jquery', 'iris' ) );
			wp_enqueue_script( 'wp-color-picker' );
		}
	}



/**
* 
* add shortcode button
*
* @return void
*/
if ( !function_exists('admin_shortcodes_button') ) {
	function admin_shortcodes_button() {	
	?>	
	<a href="#" id="insert-shortcodes-button" class="button insert-shortcodes add_shortcodes" data-editor="content" title="Insert Shortcodes"><span class="wp-menu-image"></span> <?php echo __('Insert Shortcodes', 'Longpoint');?></a>	
	<?php
	}
}