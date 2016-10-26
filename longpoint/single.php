<?php
/**************************************
 * @package  RCHTHEME/Framework
 * @author   RCHTHEME
 * @link     http://www.rchtheme.com
**************************************/
get_header(); ?>
<?php global $smof_data; ?> 
<div id="conetnt" <?php echo post_class(); ?>>
    <div class="container-fluid voffset5 voffsetd5">
		 <article class="<?php echo $smof_data['blog_display_sidebar'] ? 'col-md-9' :'col-md-12' ?> ">
    	 <?php
			// Start the Loop.
			while ( have_posts() ) : the_post();?>	
			<?php $display_date_column = $smof_data['blog_display_date'] || $smof_data['blog_display_share'];
			if ($display_date_column):
			?>
			<div class="col-sm-2 hidden-xs">
				
				<?php if( $smof_data['blog_display_date'] ): ?>
				<div class="date">
					<span class="day"><?php echo get_the_date('j'); ?></span>
					<span class="year"><?php echo get_the_date('F Y'); ?></span>
				</div>
				<div class="hr"></div>
				<?php endif; ?>
				<?php if( $smof_data['blog_display_share'] ): ?>
				<div class="share">
					<a class="facebook-share" href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>&title=<?php the_title(); ?>" target="blank" rel="nofollow" data-placement="top" data-toggle="tooltip" title="<?php echo __('Share This', 'Longpoint')?>" data-original-title="<?php echo __('Share This', 'Longpoint')?>"> <i class="fa fa-facebook"></i></a>
					<a class="twitter-share" href="http://twitter.com/home?status=<?php the_title(); ?>+<?php the_permalink(); ?>" target="blank" rel="nofollow" data-placement="top" data-toggle="tooltip" title="<?php echo __('Tweet This', 'Longpoint')?>" data-original-title="<?php echo __('Tweet This', 'Longpoint')?>"> <i class="fa fa-twitter"></i></a>
					<a class="google-plus-share" href="https://plus.google.com/share?url=<?php the_permalink(); ?>" target="blank" rel="nofollow" data-placement="top" data-toggle="tooltip" title="<?php echo __('Plus This', 'Longpoint')?>" data-original-title="<?php echo __('Plus This', 'Longpoint')?>"> <i class="fa fa-google-plus"></i></a>
				</div>
				<?php endif; ?>
				
			</div>
			<?php endif;?>
			<div class="<?php echo $display_date_column ? 'col-sm-10' : 'col-sm-12' ?>">
						
				<div class="row">
					<?php 
					if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.?>
						<div class="post-image">
						<?php 
						if($smof_data['blog_display_sidebar']){
							the_post_thumbnail('blog-full', array('class' => 'img-responsive'));
						}else{
							the_post_thumbnail('blog-full', array('class' => 'img-responsive'));
						}?>
						</div>
					<?php }?>
					<h1><?php the_title(); ?></h1>
					<?php if( $smof_data['blog_display_meta'] ): ?>
					<div class="meta">
						<?php if( $smof_data['blog_display_author'] ): ?>
						<span class="author"><i class="fa fa-user"></i>  <?php the_author(); ?></span>
						<?php endif; ?>
						<?php if ( $smof_data['blog_enable_comments'] && comments_open()): ?>
						<span class="comments"><a href="#comments"><i class="fa fa-comments-o"></i> <?php comments_number(); ?></a></span>
						<?php endif; ?>
						<?php if( $smof_data['blog_display_category'] ): ?>
						<span class="category"><i class="fa fa-folder-open"></i> <?php the_category(', '); ?></span>
						<?php endif; ?>
					 	<?php if( $smof_data['blog_display_tags'] ): ?>
						<span class="tags"><i class="fa fa-tag"></i> <?php the_tags( '',', ' ); ?></span>
						<?php endif; ?>						
					</div>
					<?php endif; ?>
	  				<?php the_content(); ?>
	  				<?php wp_link_pages(); ?>
				</div>	
				<?php if($smof_data['blog_display_author_box']==1){?>
				<div class="row">				
					<div class="authorbox">
						<div class="col-lg-12">
							<div class="author-thumb">
								<figure class="inverse">
								<?php 
									echo get_avatar(get_the_author_meta('user_email'),$size='74',$default='http://0.gravatar.com/avatar/ad516503a11cd5ca435acc9bb6523536?s=74' );
								 ?>
								<figcaption>
								<h3><?php echo get_the_author_meta('display_name');?></h3>								
								<div class="author-desc">
									<p> <?php echo get_the_author_meta('description');?>  </p>
								</div>
								</figcaption>
								</figure>
							</div>
						</div>
						
					</div> <!-- end author -->
				</div>
                <?php } ?>
				<?php if( $smof_data['blog_enable_comments'] ): ?>
				<div class="row">
				<?php
					// If comments are open or we have at least one comment, load up the comment template.					
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}	
				?>
				</div>	
				<?php endif;?>
			</div>	
		<?php endwhile; ?>
        </article> 
		<?php if( $smof_data['blog_display_sidebar'] ): ?>
		<article class="col-md-3 hidden-sm hidden-xs">
			<div class="sidebar">
            <?php 
			if(!empty($smof_data['single_post_sidebar'])){
				dynamic_sidebar( $smof_data['single_post_sidebar'] ); 
			}?>
            </div>
        </article> 
		<?php endif;?>
	</div>
</div>

<?php
get_footer();
