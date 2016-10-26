<?php
$full_path = __FILE__;
$path = explode( 'wp-content', $full_path );
if ( file_exists( $path[0].'/wp-load.php' ) ) {
    require_once( $path[0].'/wp-load.php' );
} elseif ( file_exists( $path[0].'/wp-config.php' ) ) {
    require_once( $path[0].'/wp-config.php' );
}

header("Content-type: text/css; charset=utf-8");
global $smof_data;
?>
/*
*****************************
HEADER SECTIONS *************
*****************************
*/
/* Slider */
#home-elastic-slider .carousel .carousel-inner .carousel-text h2{color: <?php echo $smof_data['header_slider_title_color']; ?>;}
#home-elastic-slider .carousel .carousel-inner .carousel-text h4{color: <?php echo $smof_data['header_slider_alternative_title_color']; ?>;}
#home-elastic-slider .carousel .carousel-inner .carousel-text p{color: <?php echo $smof_data['header_slider_text_color']; ?>;}
#home-elastic-slider .carousel .muscots .container h3{color: <?php echo $smof_data['header_slider_button_text_color']; ?>;}
.themecolor,.contact-us .address .heading{ color:<?php echo $smof_data['theme_primary_color']; ?>; }
.contact-us .contact-form input[type="submit"]{ background-color: <?php echo hexTorgba($smof_data['theme_primary_color'],1); ?>; }
.contact-us .contact-form input[type="submit"]:hover{ background-color: <?php echo hexTorgba($smof_data['theme_primary_color'],0.8); ?>; }

/* Navigation */
.navbar-inverse .navbar-nav>.active>a, .navbar-inverse .navbar-nav>.active>a:hover, .navbar-inverse .navbar-nav>.active>a:focus{ background-color:transparent;}
.navbar{ background-color: <?php echo $smof_data['main_navigation_background_color']; ?>;}
.navbar.stuck{ background-color: <?php echo hexTorgba($smof_data['sticky_navigation_background_color'],$smof_data['sticky_navigation_opacity']/10); ?>;}
.navbar .navbar-collapse li{ background-color: <?php echo $smof_data['main_navigation_top_level_background_color']; ?>; color: <?php echo $smof_data['main_navigation_top_level_text_color']; ?>; font-family: "<?php echo $smof_data['navigation_font']; ?>"; font-size: <?php echo $smof_data['navigation_font_size']; ?>px; }
.navbar .navbar-collapse li a{ color: <?php echo $smof_data['main_navigation_top_level_text_color']; ?>; }
.navbar .navbar-collapse li a:hover, .navbar .navbar-collapse li a.active,.navbar-inverse .navbar-nav > li > a.active,.menu-item > a.active{ background-color: <?php echo $smof_data['main_navigation_top_level_hover_background_color']; ?>; color: <?php echo $smof_data['main_navigation_top_level_hover_text_color']; ?>; }
.page .navbar .navbar-collapse li.active a{ background-color: <?php echo $smof_data['main_navigation_top_level_hover_background_color']; ?>; color: <?php echo $smof_data['main_navigation_top_level_hover_text_color']; ?>; }
@media (max-width: 992px) {
	.navbar-collapse{ background-color: <?php echo hexTorgba($smof_data['sticky_navigation_background_color'],$smof_data['sticky_navigation_opacity']/10); ?>;}
}
/*
*****************************
GENERAL SECTIONS ************
*****************************
*/
body{ <?php echo (strpos($smof_data['custom_bg'], 'none.png') !== False ? '' : "background-image: url({$smof_data['custom_bg']}); "); ?>background-color: <?php echo $smof_data['body_background_color']; ?>; color: <?php echo $smof_data['body_text_color']; ?>; font-family: "<?php echo $smof_data['body_font']; ?>"; font-size: <?php echo $smof_data['body_font_size']; ?>px; }
h1,h2,h3,h4,h5,h6,h1 span,h2 span,h3 span,h4 span,h5 span,h6 span,.rev_slider .parallax-title{color: <?php echo $smof_data['theme_primary_color']; ?>; font-family: "<?php echo $smof_data['heading_font']; ?>";}
::selection { background:<?php echo $smof_data['theme_primary_color']; ?>; }
::-moz-selection { background:<?php echo $smof_data['theme_primary_color']; ?>; }
a, a:hover, a:focus, a:active{ color: <?php echo $smof_data['theme_primary_color']; ?>; }
section.feature1{background-color: <?php echo $smof_data['theme_primary_color']; ?>;}
h1, h1 span,h1 small{color: <?php echo $smof_data['heading_h1_text_color']; ?>; font-size: <?php echo $smof_data['heading_h1_font_size']; ?>px; }
h2, h2 span,h2 small{color: <?php echo $smof_data['heading_h2_text_color']; ?>; font-size: <?php echo $smof_data['heading_h2_font_size']; ?>px;}
h3, h3 span,h3 small{color: <?php echo $smof_data['heading_h3_text_color']; ?>; font-size: <?php echo $smof_data['heading_h3_font_size']; ?>px;}
h4, h4 span,h4 small{color: <?php echo $smof_data['heading_h4_text_color']; ?>; font-size: <?php echo $smof_data['heading_h4_font_size']; ?>px;}
h5, h5 span,h5 small{color: <?php echo $smof_data['heading_h5_text_color']; ?>; font-size: <?php echo $smof_data['heading_h5_font_size']; ?>px;}
h6, h6 span,h6 small{color: <?php echo $smof_data['heading_h6_text_color']; ?>; font-size: <?php echo $smof_data['heading_h6_font_size']; ?>px;}
.iconwrapp.circle, .btn-default{ background-color: <?php echo $smof_data['theme_primary_color']; ?>;}
a.readmore{color: <?php echo $smof_data['theme_secondary_color']; ?>;}
.divider-top .to-top,.divider-text.alignleft,.divider-text.alignright,.divider-text .textcenter{background-color: <?php echo $smof_data['body_background_color']; ?>; color: <?php echo $smof_data['body_text_color']; ?>;}
.nav-tabs.nav-justified > .active > a, .nav-tabs.nav-justified > .active > a:hover, .nav-tabs.nav-justified > .active > a:focus {border-bottom-color: <?php echo $smof_data['body_background_color']; ?>;}
.nav-tabs > li.active > a, .nav-tabs > li.active > a:hover, .nav-tabs > li.active > a:focus{background-color: <?php echo $smof_data['body_background_color']; ?>;}
i.fa-circle{color: <?php echo $smof_data['theme_primary_color']; ?>;}
.portfolio-filter ul li a.active { background: <?php echo $smof_data['theme_primary_color']; ?>; border-color: <?php echo $smof_data['theme_primary_color']; ?>; }
.portfolio-grid div.mix:hover .portfolio-hover-layer{background: <?php echo hexTorgba($smof_data['theme_primary_color'], 0.4); ?>;}
section.team .thumbnail{background: <?php echo $smof_data['theme_primary_color']; ?>;}
.blog h4{color: <?php echo $smof_data['theme_primary_color']; ?>;}
#news .carousel-blocks .thumbnail p.date{color: <?php echo hexTorgba($smof_data['theme_primary_color'], 0.4); ?>;}

.rch-pricing-table .plan-popular li.price { background-color: <?php echo $smof_data['theme_primary_color']; ?>; }
.rch-pricing-table .plan-popular li.heading { background-color: <?php echo hexTorgba($smof_data['theme_primary_color'], 0.8); ?>; }
.rch-pricing-table .plan-popular li.content a.btn { background-color: <?php echo $smof_data['theme_primary_color']; ?>; }
.rch-pricing-table li.content a.btn:hover { background-color: <?php echo $smof_data['theme_primary_color']; ?>; }
.call-to-action{ background-color: <?php echo $smof_data['theme_primary_color']; ?>; }
section.social a:hover i.fa-circle{color: <?php echo hexTorgba($smof_data['theme_primary_color'], 0.8); ?>;}
.highlight{ color: <?php echo $smof_data['theme_primary_color']; ?>; }
.sidebar .post-date{ color: <?php echo hexTorgba($smof_data['theme_primary_color'], 0.6); ?>; }
.single .share a:hover{ color: <?php echo hexTorgba($smof_data['theme_primary_color'], 0.6); ?>; }
#commentform input[type=submit]{ background-color: <?php echo $smof_data['theme_primary_color']; ?>; }
#comments a{ color: <?php echo hexTorgba($smof_data['theme_primary_color'], 0.6); ?>; }
.search .post-container .more, .blog .thumbnail .more{ background-color: <?php echo hexTorgba($smof_data['theme_primary_color'], 0.6); ?>; }
.search .post-container:hover .more, .blog .thumbnail:hover .more{ background-color: <?php echo hexTorgba($smof_data['theme_primary_color'], 1); ?>; }
.page-numbers.current,.page-numbers li a.prev,.page-numbers li a.next,.page-numbers li a.prev:hover,.page-numbers li a.next:hover {background-color: <?php echo $smof_data['theme_primary_color']; ?>;border:1px solid <?php echo $smof_data['theme_primary_color']; ?>;}
.page-numbers li a:hover{color: <?php echo $smof_data['theme_primary_color']; ?>}
.widget_nav_menu ul li a:hover{ color: <?php echo $smof_data['theme_primary_color']; ?> }
.sticky_post{border: 1px solid <?php echo $smof_data['theme_primary_color']; ?>}
.more-link{ border: 1px solid <?php echo $smof_data['theme_primary_color']; ?>;}
.more-link:hover{ background: <?php echo $smof_data['theme_primary_color']; ?>; color:<?php echo $smof_data['body_text_color']; ?>}
/*
*****************************
Shortcodes ******************
*****************************
*/
.accordions span.icon{ background-color: <?php echo $smof_data['theme_primary_color']; ?>; }
.panel-default>.panel-heading a:hover{ color:<?php echo $smof_data['theme_primary_color']; ?>; }
.btn-default,.btn-default:hover, .btn-default:focus{ background-color: <?php echo $smof_data['theme_primary_color']; ?>; font-family: "<?php echo $smof_data['navigation_font']; ?>"; }
.dropcap{ font-family: "<?php echo $smof_data['heading_font']; ?>"; }
table.table th{ background-color: <?php echo $smof_data['theme_primary_color']; ?>; font-family: "<?php echo $smof_data['heading_font']; ?>"; }
.table-hover>tbody>tr:hover>td, .table-hover>tbody>tr:hover>th{ background-color: <?php echo hexTorgba($smof_data['theme_primary_color'], 0.1); ?>;}
.btn-outer{color: <?php echo $smof_data['theme_primary_color']; ?>; border-color: <?php echo $smof_data['theme_primary_color']; ?>;}
.portfolio-filter ul li a:hover { border-color: <?php echo $smof_data['theme_primary_color']; ?>; color: <?php echo $smof_data['theme_primary_color']; ?>;}
.dark .nav-tabs>li.active>a, .dark .nav-tabs>li.active>a:hover, .dark .nav-tabs>li.active>a:focus{color: <?php echo $smof_data['theme_primary_color']; ?>;}
/*
*****************************
FOOTER SECTIONS *************
*****************************
*/
footer{ background-color: <?php echo $smof_data['footer_background_color']; ?>; color: <?php echo $smof_data['footer_text_color']; ?>; font-family: "<?php echo $smof_data['navigation_font']; ?>"; font-size: <?php echo $smof_data['footer_font_size']; ?>px; }
footer a{ color: <?php echo $smof_data['footer_link_color']; ?>; }
footer a:hover,footer a:focus{ color: <?php echo $smof_data['footer_link_hover_color']; ?>; }

#copyright{color: <?php echo $smof_data['copyright_text_color']; ?>; }
footer[role="contentinfo"] .container .row .social div{ background-color: <?php echo $smof_data['social_background_color']; ?>; ; }
footer[role="contentinfo"] .container .row .social i {color:<?php echo $smof_data['copyright_social_icon_color']; ?>;}

footer[role="contentinfo"] .container .row .social div:hover{ background-color: <?php echo $smof_data['social_background_color_hover']; ?>; ; }
footer[role="contentinfo"] .container .row .social div:hover i {color:<?php echo $smof_data['copyright_social_icon_hover_color']; ?>;}
#toTop{ background-color: <?php echo $smof_data['theme_primary_color']; ?>; }
<?php echo $smof_data['custom_css']; ?>