<?php 
define('THEME_NAME', 'Longpoint');
// Translation
load_theme_textdomain('Longpoint', get_template_directory_uri() . '/languages');

require_once (get_template_directory() . '/framework/functions.php');

add_image_size( 'team-thumb', 65, 65, true );
add_image_size( 'testimonial-thumb', 65, 65, true );
add_image_size( 'blog-thumb', 340, 150, true );
add_image_size( 'blog-full', 1100, 425, true );
add_image_size( 'portfolio-thumb', 300, 225, true );
add_image_size( 'portfolio-large', 600, 450, true );
add_image_size( 'gallery-thumb', 211, 337, true );
/*
add_action( 'init', 'rev_disable_notification' );
function rev_disable_notification() {
	set_revslider_as_theme();
}*/