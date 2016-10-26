<?php
/**************************************
 * @package  RCHTHEME/Framework
 * @author   RCHTHEME
 * @link     http://www.rchtheme.com
**************************************/
/**
 * The Template for displaying all single posts of RCH_Portfolio custom post type
 */

get_header(); ?>

			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();
?>
						<h1><?php the_title(); ?></h1>
	  	<?php the_content(); ?>
	  	<?php wp_link_pages(); ?>
<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}
				endwhile;
			?>
		

<?php
get_footer();
