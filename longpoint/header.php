<!DOCTYPE html>
<html xmlns="http<?php echo (is_ssl())? 's' : ''; ?>://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>
	<?php
	if ( defined('WPSEO_VERSION') ) {
		 wp_title('');
	} else {
		bloginfo('name'); ?> <?php wp_title(' - ', true, 'left');
	}
	?>
	</title>

    <?php global $smof_data, $styles; ?>  

  <!--[if lt IE 9]>
    <script src="<?php echo get_template_directory_uri();?>/framework/assets/js/html5shiv.min.js"></script>
    <script src="<?php echo get_template_directory_uri();?>/framework/assets/js/respond.min.js"></script>
    <script src="<?php echo get_template_directory_uri();?>/framework/assets/js/es5-shim.js"></script>
  <![endif]-->    
	
	<?php if($smof_data['favicon']): ?>
	<link rel="shortcut icon" href="<?php echo $smof_data['favicon']; ?>" type="image/x-icon" />
	<?php endif; ?>
	<?php if($smof_data['iphone_icon']): ?>
	<!-- For iPhone -->
	<link rel="apple-touch-icon-precomposed" href="<?php echo $smof_data['iphone_icon']; ?>">
	<?php endif; ?>
	<?php if($smof_data['iphone_icon_retina']): ?>
	<!-- For iPhone 4 Retina display -->
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo $smof_data['iphone_icon_retina']; ?>">
	<?php endif; ?>
	<?php if($smof_data['ipad_icon']): ?>
	<!-- For iPad -->
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $smof_data['ipad_icon']; ?>">
	<?php endif; ?>
	<?php if($smof_data['ipad_icon_retina']): ?>
	<!-- For iPad Retina display -->
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo $smof_data['ipad_icon_retina']; ?>">
	<?php endif; ?>   

    <?php wp_head(); ?>

    
        <script type="text/javascript">
        jQuery(document).ready(function($) {

            $("body").queryLoader2({
                barColor: "<?php echo $smof_data['preloader_precentage_color']; ?>",
                backgroundColor: "<?php echo $smof_data['preloader_background_color']; ?>",
                percentage: true,
                barHeight: 5,
                completeAnimation: "grow"
            });

        });
        </script>


</head>

<?php $layout_skin = $smof_data['theme_skin_layout_light'] == 1 ? 'light'  : 'dark' ;?>
<body <?php body_class($layout_skin); ?> data-sticky="<?php echo $smof_data['header_sticky_nav_on_off']; ?>" data-spy="scroll" data-target=".navbar">

<?php
if (is_front_page()) {
$slider = $smof_data['home_slider'];
switch ($slider) {
    case "Elastic":
        get_template_part("includes/slider");
        break;
    case "parallaxslider":
        get_template_part("includes/parallax-slider");
        break;
    case "Youtube":
        get_template_part("includes/video-youtube");
        break;
    case "Revolution":
        get_template_part("includes/revslider");
        break;
    case "Static":
        get_template_part("includes/slider");
        break;
    case "kenburnsexport":
        get_template_part("includes/slider-ken");
        break;            
}
}
?>
<nav class="navbar navbar-inverse navbar-static-top" role="navigation">
 <?php if( $smof_data['header_100_header_on_off'] == 0) { ?>
   <div class="container">
   <?php } else { ?>
    <div class="container-fluid">
   <?php } ?>
         <div class="navbar-header page-scroll">
                <button class="navbar-toggle collapsed" data-target=".navbar-collapse" data-toggle="collapse" type="button">
                    <i class="fa fa-bars"></i>
                </button>
                 <a href="<?php echo site_url(); ?>" class="toTop navbar-brand">
                       <?php if( $smof_data['pic_txt_logo_on_off'] == 0 )  : ?>          
                           <h1> <?php bloginfo('name'); ?>  </h1>         
                        <?php else : ?>
                            <img class="normal_res img-responsive" src="<?php echo $smof_data['main_logo']; ?>" alt="<?php bloginfo('name'); ?>" />                  
                            <?php if($smof_data['main_logo_retina'] && $smof_data['retina_logo_width'] && $smof_data['retina_logo_height']): ?>
                                <img class="retina_res img-responsive" src="<?php echo $smof_data['main_logo_retina']; ?>" alt="<?php bloginfo('name'); ?>" style="width:<?php echo $smof_data['retina_logo_width']; ?>px; max-height:<?php echo $smof_data['retina_logo_height']; ?>px;height: auto !important" />
                            <?php endif; ?>
                        <?php endif; ?>
                        
                    </a>
            </div>

            <?php 
                wp_nav_menu( array(               
                    'theme_location'    => 'main_menu',
                    'depth'             => 2,
                    'container'         => 'div',
                    'container_class'   => 'navbar-collapse collapse',
                 //   'container_id'      => 'navbar',
                    'menu_class'        => 'nav navbar-nav navbar-right',
                    'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                    'walker'            => new wp_bootstrap_navwalker())
                );          
                //rchtheme_navigation();
            ?>
        </div>
    </nav>
