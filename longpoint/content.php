<?php global $smof_data;?>

<div class="<?php echo $smof_data['blog_display_sidebar'] ? 'col-lg-6 col-md-6 col-sm-6' :'col-lg-4 col-md-4 col-sm-4' ?> ">
<div <?php post_class('post-container'); ?>>
	
	<div class="image-container">
		<a href="<?php the_permalink(); ?>" title="<?php the_title();?>">			
			<?php 
			if ( has_post_thumbnail() ) {
				the_post_thumbnail('blog-thumb',array('class'=>'img-responsive')); 
			}else{
				echo '<img class="img-responsive" src="' . get_template_directory_uri() . '/images/no-image.jpg" />';
			}?>				
		</a>
		<div class="more">
			<a href="<?php the_permalink(); ?>" title="<?php echo __('Read more', 'Longpoint'); ?>"><i class="fa fa-angle-right"></i></a>
		</div>
	</div>
	
		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
			<h3><?php the_title(); ?></h3>
		</a>		
	<p><?php 
	$content = apply_filters('the_content', get_the_content());
	$content = wp_strip_all_tags( $content ); // remove shortcodes
	//$content = remove_tags( $content, array('p', 'ul', 'li', 'div', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6') ); // remove tags
	
	echo substr($content, 0, 150); ?></p>
	
	<?php if ( ($smof_data['blog_enable_comments'] && comments_open()) || $smof_data['blog_display_date']): ?>
	<div class="post-details">
		<?php if ( $smof_data['blog_enable_comments'] && comments_open()): ?>
		<span class="comments"><i class="fa fa-comments-o"></i> <?php comments_number(); ?></span>
		<?php endif; ?>
		<?php if( $smof_data['blog_display_date'] ): ?>
		<span class="date"><i class="fa fa-calendar"></i> <?php the_time('M d, Y'); ?></span>
		<?php endif; ?>
	</div>
	<?php endif; ?>
</div>
</div>