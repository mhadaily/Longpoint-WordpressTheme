<?php
/**************************************
 * @package  RCHTHEME/Framework
 * @author   RCHTHEME
 * @link     http://www.rchtheme.com
**************************************/
get_header(); 
?>
<?php global $smof_data; ?> 
<div id="conetnt">
    <div class="container-fluid voffset5 voffsetd5">
		 <article class="<?php echo $smof_data['blog_display_sidebar'] ? 'col-md-9' :'col-md-12' ?> ">
    	 
			<div class="col-sm-12">					
				<div class="row">	
	  				<?php 
						if(have_posts()  && strlen( trim(get_search_query()) ) != 0){?>
						<h1 class="general-title"><?php echo __('Search Result', 'Longpoint'); ?></h1>	
						<h2><?php echo $wp_query->found_posts; ?> <?php _e( 'Search Results Found For', 'Longpoint' ); ?>: "<?php the_search_query(); ?>"</h2>
						<?php while(have_posts()) : the_post();
								get_template_part( 'content', ( post_type_supports( get_post_type(), 'post-formats' ) ? get_post_format() : get_post_type() ) ); 
							endwhile;
						}else{ ?>
						<div class="no-result">
						<div class="gap divier hidden-sm hidden-xs"></div>
						<h2><?php echo __('Nothing Found Here!','Longpoint'); ?></h2>
						<p><?php echo __('Sorry, but nothing matched your search criteria. Please try again with some different keywords.','Longpoint'); ?></p>
							
							<?php get_search_form( true ); ?>

						</div>
						<?php } ?>																
					
				</div>					
				<?php global $wp_query; ?>
				<?php if( $wp_query->max_num_pages>1){ ?>					
				<div class="row">
					<div class="divider"></div>
					<div class="pagination">
						<ul>
						<?php rchtheme_pagination( $pages='');?>
						</ul>
					</div>
				</div>	
				<?php } ?>
			</div>	
	
        </article> 
		<?php if( $smof_data['blog_display_sidebar'] ): ?>
		<article class="col-md-3 hidden-sm hidden-xs">
			<div class="sidebar">			
            <?php dynamic_sidebar( 'blog' ); ?>
            </div>
        </article> 
		<?php endif;?>
	</div>
</div>
<?php get_footer(); ?>