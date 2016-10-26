<?php global $smof_data; ?>      
<footer role="contentinfo">
    <div class="container">
     <div class="row text-center">
     		<div class="logo">
                    <?php if( $smof_data['footer_pic_txt_logo_on_off'] == 0 )  : ?>          
                       <h1> <?php bloginfo('name'); ?>  </h1>         
                    <?php else : ?>
                        <img class="normal_res img-responsive" src="<?php echo $smof_data['footer_main_logo']; ?>" alt="<?php bloginfo('name'); ?>" />                  
                        <?php if($smof_data['footer_main_logo_retina'] && $smof_data['footer_retina_logo_width'] && $smof_data['footer_retina_logo_height']): ?>
                            <img class="retina_res img-responsive" src="<?php echo $smof_data['footer_main_logo_retina']; ?>" alt="<?php bloginfo('name'); ?>" style="width:<?php echo $smof_data['footer_retina_logo_width']; ?>px; max-height:<?php echo $smof_data['footer_retina_logo_height']; ?>px;height: auto !important" />
                        <?php endif; ?>
                    <?php endif; ?>
            </div>
	</div>
     <div class="row text-center">
    		 <?php if ($smof_data['rel_nofollow'] == 1) : 
	         $nofollow_icon = 'rel="nofollow"';
	          endif; ?>

             <?php if ($smof_data['target_blank'] == 1) : 
	         $blank_link = 'target="_blank" ';
	          endif; ?>

            <?php if ($smof_data['display_footer_icons'] == 1) : ?>
	       
	        <div class="social">
	        	<?php if($smof_data['facebook_link']): ?>
	            <div><a href="<?php echo $smof_data['facebook_link']; ?>" <?php echo $blank_link; ?> <?php echo $nofollow_icon; ?>><i class="fa fa-facebook"></i></a></div>
	        	<?php endif; ?>

	        	<?php if($smof_data['twitter_link']): ?>
	            <div><a href="<?php echo $smof_data['twitter_link']; ?>" <?php echo $blank_link; ?> <?php echo $nofollow_icon; ?>><i class="fa fa-twitter"></i></a></div>
	        	<?php endif; ?>

	        	<?php if($smof_data['linkedin_link']): ?>
	            <div><a href="<?php echo $smof_data['linkedin_link']; ?>" <?php echo $blank_link; ?> <?php echo $nofollow_icon; ?>><i class="fa fa-linkedin"></i></a></div>
	        	<?php endif; ?>

	        	<?php if($smof_data['vimeo_link']): ?>
	            <div><a href="<?php echo $smof_data['vimeo_link']; ?>" <?php echo $blank_link; ?> <?php echo $nofollow_icon; ?>><i class="fa fa-vimeo-square"></i></a></div>
	        	<?php endif; ?>

	        	<?php if($smof_data['youtube_link']): ?>
	            <div><a href="<?php echo $smof_data['youtube_link']; ?>" <?php echo $blank_link; ?> <?php echo $nofollow_icon; ?>><i class="fa fa-youtube"></i></a></div>
	        	<?php endif; ?>

	        	<?php if($smof_data['skype_link']): ?>
	            <div><a href="<?php echo $smof_data['skype_link']; ?>" <?php echo $blank_link; ?> <?php echo $nofollow_icon; ?>><i class="fa fa-skype"></i></a></div>
	        	<?php endif; ?>

	        	<?php if($smof_data['google_link']): ?>
	            <div><a href="<?php echo $smof_data['google_link']; ?>" <?php echo $blank_link; ?> <?php echo $nofollow_icon; ?>><i class="fa fa-google-plus"></i></a></div>
	        	<?php endif; ?>

	        	<?php if($smof_data['flickr_link']): ?>
	            <div><a href="<?php echo $smof_data['flickr_link']; ?>" <?php echo $blank_link; ?> <?php echo $nofollow_icon; ?>><i class="fa fa-flickr"></i></a></div>
	        	<?php endif; ?>

	        	<?php if($smof_data['pinterest_link']): ?>
	            <div><a href="<?php echo $smof_data['pinterest_link']; ?>" <?php echo $blank_link; ?> <?php echo $nofollow_icon; ?>><i class="fa fa-pinterest"></i></a></div>
	        	<?php endif; ?>

	        	<?php if($smof_data['dribbble_link']): ?>
	            <div><a href="<?php echo $smof_data['dribbble_link']; ?>" <?php echo $blank_link; ?> <?php echo $nofollow_icon; ?>><i class="fa fa-dribbble"></i></a></div>
	        	<?php endif; ?>

	        	<?php if($smof_data['instagram_link']): ?>
	            <div><a href="<?php echo $smof_data['instagram_link']; ?>" <?php echo $blank_link; ?> <?php echo $nofollow_icon; ?>><i class="fa fa-instagram"></i></a></div>
	        	<?php endif; ?>

	        	<?php if($smof_data['tumblr_link']): ?>
	            <div><a href="<?php echo $smof_data['tumblr_link']; ?>" <?php echo $blank_link; ?> <?php echo $nofollow_icon; ?>><i class="fa fa-tumblr"></i></a></div>
	        	<?php endif; ?>

	        	<?php if($smof_data['yahoo_link']): ?>
	            <div><a href="<?php echo $smof_data['yahoo_link']; ?>" <?php echo $blank_link; ?> <?php echo $nofollow_icon; ?>><i class="fa fa-yahoo"></i></a></div>
	        	<?php endif; ?>

	        	<?php if($smof_data['rss_link']): ?>
	            <div><a href="<?php echo $smof_data['rss_link']; ?>" <?php echo $blank_link; ?> <?php echo $nofollow_icon; ?>><i class="fa fa-rss"></i></a></div>
	        	<?php endif; ?>	  

	        	<?php if($smof_data['custom_icon1'] == 1): ?>
	            <div><a href="<?php echo $smof_data['custom_icon_link']; ?>" <?php echo $blank_link; ?> <?php echo $nofollow_icon; ?>>
  						<img class="normal_res img-responsive" src="<?php echo $smof_data['custom_icon_image']; ?>" alt="<?php echo $smof_data['custom_icon_name']; ?>" />                  
                        <?php if($smof_data['custom_icon_image_retina'] && $smof_data['retina_icon_width'] && $smof_data['retina_icon_height']): ?>
                            <img class="retina_res img-responsive" src="<?php echo $smof_data['custom_icon_image_retina']; ?>" alt="<?php echo $smof_data['custom_icon_name']; ?>" style="width:<?php echo $smof_data['retina_icon_width']; ?>px; max-height:<?php echo $smof_data['retina_icon_height']; ?>px;height: auto !important" />
                        <?php endif; ?>
	            </a></div>
	        	<?php endif; ?>	  

        		<?php if($smof_data['custom_icon2'] == 1): ?>
	            <div><a href="<?php echo $smof_data['custom_icon_link2']; ?>" <?php echo $blank_link; ?> <?php echo $nofollow_icon; ?>>
  						<img class="normal_res img-responsive" src="<?php echo $smof_data['custom_icon_image2']; ?>" alt="<?php echo $smof_data['custom_icon_name2']; ?>" />                  
                        <?php if($smof_data['custom_icon_image_retina2'] && $smof_data['retina_icon_width2'] && $smof_data['retina_icon_height2']): ?>
                            <img class="retina_res img-responsive" src="<?php echo $smof_data['custom_icon_image_retina2']; ?>" alt="<?php echo $smof_data['custom_icon_name2']; ?>" style="width:<?php echo $smof_data['retina_icon_width2']; ?>px; max-height:<?php echo $smof_data['retina_icon_height2']; ?>px;height: auto !important" />
                        <?php endif; ?>
	            </a></div>
	        	<?php endif; ?>	 

	        </div>
	        
	        <?php endif; ?>

            <?php if ($smof_data['display_footer_copyright'] == 1) : ?>

	        <p class="copyright"><?php echo $smof_data['copyright_text']; ?></p>

	        <?php endif; ?>
        </div>
    </div>
</footer>	
<a id="toTop" href="a#toTop"><i class="fa fa-chevron-up"></i></a>
 <?php wp_footer(); ?>	

<?php 
$slider_header = $smof_data['home_slider'];
if ($slider_header == "Elastic") { ?>
  <script type="text/javascript">
    jQuery(document).ready(function ($) {

<?php 
if (is_front_page()) {
if ($slider_header == "Elastic") {
    $args = array(
        'post_type' => 'rch_elastic',
        'post_status' => 'publish',
        'posts_per_page' => 3,
        // 'caller_get_posts'=> 1
    );
    $query = new WP_Query($args);
    if( $query->have_posts() ):
        $i = 0;
        while ($query->have_posts()) : 
            $query->the_post(); 
            $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
?>             
      $("#id-slider-<?php echo $i; ?>").backstretch("<?php echo $thumbnail[0]; ?>");
<?php                        
            $i++;
        endwhile;
    endif;
    wp_reset_query();  // Restore global post data stomped by the_post().
}
};
?>
    });
    </script>
<?php } ?>

<?php echo $smof_data['analytics_code']; ?>
   </body>
</html>