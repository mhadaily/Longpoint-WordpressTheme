<?php 
/**************************************
 * @package  RCHTHEME/Framework
 * @author   RCHTHEME
 * @link     http://www.rchtheme.com
**************************************/
get_header(); ?>
<?php 
if ( have_posts() ) : while ( have_posts() ) : the_post(); 
$options = get_post_meta($post->ID); 
$options = initialPageMetabox($options);
$container_class = $options['page_full_width_activation'][0] != 'yes' ? 'container' : 'container-fluid';

$style  = $options['page_header_background_image'][0] != '' ? "background-image: url('" . $options['page_header_background_image'][0] . "');" : '';
switch($options['page_header_background_repeat'][0]){
	case 'no-repeat':
		$style .= 'background-repeat: no-repeat;';
	break;
	case 'cover':
		$style .= '-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;';
	break;
	case 'repeat':
		$style .= 'background-repeat: repeat;';
	break;
}

$style .= $options['page_header_background_attachment'][0] == 'fixed' ? 'background-attachment: fixed;' : '';
$style .= $options['page_header_background_color'][0] != '' ? "background-color: " . $options['page_header_background_color'][0] . ";" : '';
$style .= $options['page_header_height'][0] != '' ? "height: " . $options['page_header_height'][0] . "px;overflow: hidden;" : '';
$font_color = $options['page_header_text_color'][0] != '' ? "color: " . $options['page_header_text_color'][0] . "!important;" : '';
?>
<?php if($style != '' || $font_color != ''):?>
	<style>
		<?php if($style != ''):?>
		#page-heading-<?php the_ID(); ?>{
			<?php echo $style; ?>
		}
		<?php endif;?>
		<?php if($font_color != ''):?>
		#page-heading-<?php the_ID(); ?> h1,#page-heading-<?php the_ID(); ?> h1 small{
			<?php echo $font_color; ?>
		}
		<?php endif;?>
	</style>			
<?php endif;?>
<div class="<?php echo $options['page_custom_class'][0]; echo $options['page_full_width_activation'][0] != 'yes' ? '' : 'fullwidth' ?>">
	<?php if($options['page_show_header'][0] != 'no'): ?>
	<section id="page-heading-<?php the_ID(); ?>" class="page-heading page-heading-<?php the_ID(); ?>" <?php echo $options['page_header_background_attachment'][0] == 'fixed' ? (!empty($options['page_header_background_speed'][0]) ? "data-stellar-background-ratio='{$options['page_header_background_speed'][0]}'" : "data-stellar-background-ratio='0.5'") : ''?>>
		<?php if($options['page_revolution_shortcode'][0] != ''){
			echo do_shortcode("{$options['page_revolution_shortcode'][0]}");
		}else{ ?>
		<div class="<?php echo $container_class; ?>">
		  <h1 class="animate fadeInLeft"><?php echo $options['custom_page_title'][0] != '' ? $options['custom_page_title'][0] : get_the_title();?><small><?php echo $options['custom_page_sub_title'][0]; ?></small></h1>		  
		</div>
		<?php }?>
	</section>
	<?php endif;?>
	<div id="content" <?php echo $options['page_show_header'][0] == 'no' ? "class='header-off'" : '' ?>>
		<div class="<?php echo $container_class; ?>">
		<div class="<?php echo $options['page_show_sidebar'][0] != 'no' ? 'col-xs-12 col-md-9' : 'col-xs-12 col-md-12'; ?>">				
			<?php the_content(); ?>
			<?php wp_link_pages(); ?>
		</div>
        <?php if($options['page_show_sidebar'][0] != 'no'): ?>
		<div class="col-md-3 hidden-sm hidden-xs">
			<div class="sidebar">
				<?php 
				$sidebar = $options['page_sidebar'][0] != '' ? $options['page_sidebar'][0] : 'page';
				dynamic_sidebar( $sidebar ); 				
				?>
			</div>
		</div>
		<?php endif; ?>
		</div>
	</div>
</div>
                <?php endwhile; else: ?>
				<p><?php echo __('Sorry, this page does not exist.','Longpoint'); ?></p>
		<?php endif; ?>
<?php get_footer(); ?>