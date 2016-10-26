<?php 
/**************************************
 * @package  RCHTHEME/Framework
 * @author   RCHTHEME
 * @link     http://www.rchtheme.com
**************************************/
get_header(); ?> 
<?php global $smof_data; ?> 
<div id="conetnt">
    <div class="container voffset5 voffsetd5">
		 <article class="<?php echo $smof_data['blog_display_sidebar'] ? 'col-md-9' :'col-md-12' ?> ">
    	 <?php
			// Start the Loop.
			while ( have_posts() ) : the_post();?>	
			<?php $display_date_column = $smof_data['blog_display_date'] || $smof_data['blog_display_share'];
			if ($display_date_column):
			?>
			<div class="row voffsetd5 <?php if (is_sticky()) { ?>sticky_post<?php } ?>">
			<div class="col-sm-2 hidden-xs">
				
				<?php if( $smof_data['blog_display_date'] ): ?>
				<div class="date">
					<span class="day"><?php echo get_the_date('j'); ?></span>
					<span class="year"><?php echo get_the_date('F Y'); ?></span>
				</div>
				<?php endif; ?>
			</div>
			<?php endif;?>
			<div class="voffset3 <?php echo $display_date_column ? 'col-sm-10' : 'col-sm-12' ?>">
					<?php 
					if ( has_post_thumbnail() ) { ?>
						<div class="post-image">
						<?php the_post_thumbnail('blog-full', array('class' => 'img-responsive')); ?>
						</div>
					<?php } ?>
					<h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
	  				<?php //the_excerpt(); ?>
	  				<?php the_content('Read on...'); ?>
	  				<?php wp_link_pages(); ?>
			</div>	
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
			<div class="row">
					<!-- === PAGINATION === -->
                    <?php
                    global $wp_query;
                    $big = 999999999; // need an unlikely integer
                    $total_pages = $wp_query->max_num_pages;
                    if ($total_pages > 1) {
                        $current_page = max(1, get_query_var('paged'));
                        echo paginate_links(array(
                            'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                            'format' => '/page/%#%',
                            'current' => $current_page,
                            'total' => $total_pages,
                            'type' => 'list',
                            'next_text' => _x('NEXT', 'pagination', 'biznex'),
                            'prev_text' => _x('PREV', 'pagination', 'biznex'),
                        ));
                    }
                    ?>
        <!-- === PAGINATION === -->
		</div>
</div>

<?php get_footer(); ?>