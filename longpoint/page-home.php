<?php
/**************************************
 * Template Name: Home Page
 * @package  RCHTHEME/Framework
 * @author   RCHTHEME
 * @link     http://www.rchtheme.com
**************************************/
?>
<?php get_header(); ?> 

	<?php if ( count($smof_data['homepage_blocks']['enabled']) > 0 ): $styles = '';?>			
		<?php foreach($smof_data['homepage_blocks']['enabled'] as $key => $value): $_post = get_post(str_replace('id_', '', $key));?>
			<?php if( !empty ( $_post ) ): 
			$options = get_post_meta($_post->ID);
			$options = initialParallaxMetabox($options);
			?>
		
		<section id="<?php echo $_post->post_name;?>" class="<?php echo ($options['parallax_display_pattern_background'][0] != '') || ($options['parallax_full_width_activation'][0] == 'yes') ? '' : 'marginSection'; ?> <?php echo $options['parallax_extra_class'][0] ?>" <?php echo $options['parallax_background_attachment'][0] == 'fixed' ? (!empty($options['parallax_background_speed'][0]) ? "data-stellar-background-ratio='{$options['parallax_background_speed'][0]}'" : "data-stellar-background-ratio='0.5'") : ''?>>

			<?php if($options['parallax_display_pattern_background'][0] != '') { ?>
				<div class="marginSection pattern <?php echo $options['parallax_display_pattern_background'][0] ?>">
			<?php } ?>
			<?php if($options['parallax_full_width_activation'][0] != 'yes') { ?>
				<div class="container voffset5 voffsetd5 ">
				<div class="row">
			<?php } ?>
				<?php if($options['parallax_show_title'][0] != 'hide'):?>
				<h2 class="centered animate fadeInLeft"><?php echo $_post->post_title; ?></h2>
				<?php endif;?>
				<?php echo do_shortcode($_post->post_content); ?>
				<?php 										
					$style  = $options['parallax_background_image'][0] != '' ? "background-image: url('" . $options['parallax_background_image'][0] . "');" : '';
					$style .= $options['parallax_background_repeat'][0] != '' ? ( $options['parallax_background_repeat'][0] == 'no-repeat' ? 'background-repeat: no-repeat;' : '-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;' ) : '';
					$style .= $options['parallax_background_attachment'][0] == 'fixed' ? 'background-attachment: fixed;' : '';
					$style .= $options['parallax_background_color'][0] != '' ? "background-color: " . $options['parallax_background_color'][0] . ";" : '';
					$style .= $options['parallax_section_height'][0] != '' ? "max-height: " . $options['parallax_section_height'][0] . "px;overflow: hidden;" : '';
					$style .= $options['parallax_text_color'][0] != '' ? "color: " . $options['parallax_text_color'][0] . ";" : '';
					
					if($style != '' || ($options['parallax_inline_style'][0] != '')){
						$styles .= "section#{$_post->post_name} { {$style}{$options['parallax_inline_style'][0]} }";
					}
					
					if($options['parallax_text_color'][0] != ''){
						$styles .= "section#{$_post->post_name} p{ color:{$options['parallax_text_color'][0]} }";
					}
					
					if($options['parallax_heading_color'][0] != ''){
						$styles .= "section#{$_post->post_name} h1, section#{$_post->post_name} h2, section#{$_post->post_name} h3, section#{$_post->post_name} h4, section#{$_post->post_name} h5, section#{$_post->post_name} h6{ color: {$options['parallax_heading_color'][0]}; }";
					}
					
					if($options['parallax_title_color'][0] != ''){
						$styles .= "section#{$_post->post_name} h2.centered{ color: {$options['parallax_title_color'][0]}; }";
					}
					
					if($options['parallax_link_color'][0] != ''){
						$styles .= "section#{$_post->post_name} a{ color: {$options['parallax_link_color'][0]}; }";
					}
					
					if($options['parallax_link_hover_color'][0] != ''){
						$styles .= "section#{$_post->post_name} a:hover{ color: {$options['parallax_link_hover_color'][0]}; }";
					}
					
				?>
			<?php if($options['parallax_full_width_activation'][0] != 'yes') { ?>
					</div>
				</div>
			<?php } ?>
			<?php if($options['parallax_display_pattern_background'][0] != '') { ?>
				</div>
			<?php } ?>	
		</section>
			<?php endif; ?>
		<?php endforeach; ?>
		
	<?php if($styles != ''):?>
		<style>
			<?php echo $styles; ?>
		</style>			
	<?php endif;?>
	
	<?php else: ?>		
		<p><?php printf( __('Please pass to <a href="%s">theme options</a>, in Home Setting tab organize how you want the layout to come out on the home page.', 'Longpoint'), site_url() . '/wp-admin/themes.php?page=optionsframework' );?></p>
	<?php endif; ?>
<?php get_footer(); ?>