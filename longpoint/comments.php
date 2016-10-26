<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains comments and the comment form.
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() )
    return;
?>
<section id="comments">
	<div class="divider"></div>
	<h3 class="general-title">
		<span><?php comments_number( __('0 Comment', 'Longpoint'), __('1 Comment', 'Longpoint'), __('% Comment', 'Longpoint') ); ?></span>
	</h3>
	
	<div class="general">
	  
	   <?php if ( have_comments() ) { ?>   
		<ul class="comment-list">
				<?php wp_list_comments('callback=rchtheme_theme_comment'); ?>
			  
		</ul>
			 <?php
		// Are there comments to navigate through?
		if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
			?>
				<footer class="navigation comment-navigation" role="navigation">					
					<div class="previous"><?php previous_comments_link( __( '&larr; Older Comments', 'Longpoint' ) ); ?></div>
					<div class="next right"><?php next_comments_link( __( 'Newer Comments &rarr;', 'Longpoint' ) ); ?></div>
				</footer><!-- .comment-navigation -->
			<?php endif; // Check for comment navigation ?>

			<?php if ( ! comments_open() && get_comments_number() ) : ?>
				<p class="no-comments"><?php _e( 'Comments are closed.' , 'Longpoint' ); ?></p>
			<?php endif; ?>
		<?php } ?>
	</div>
	
	<?php 
		if(is_user_logged_in()){
			$text_class = "col-sm-12 col-lg-12 col-md-12";
		}else{
			$text_class = "col-sm-6 col-lg-6 col-md-6";
		}
		$aria_req = ( $req ? " aria-required='true'" : '' );
		$comment_args = array(
						'title_reply'=> __('<h3 class="general-title">' . __('Leave a Reply','Longpoint') . '</h3>','Longpoint'),
						'fields' => apply_filters( 'comment_form_default_fields', array(
							'author' => '<div class="col-sm-6 col-lg-6 col-md-6">
										<input type="text" name="author" class="form-control" placeholder="Name" id="author" value="' . esc_attr( $commenter['comment_author'] ) . '" ' . $aria_req . ' />
										',
							'email' => '
										<input id="email" name="email" class="form-control" placeholder="Email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" ' . $aria_req . ' />
										',
							'url' => '
										<input id="url" name="url" class="form-control" placeholder="Website" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '"  /></div>
										',
						) ),
						'comment_field' => '<div class="'.$text_class.'">
												<textarea cols="45" rows="6" id="comment" class="form-control" placeholder="Your Comment"  name="comment"'.$aria_req.'></textarea>
											</div>    ',
						'label_submit' => 'Post Comment',
						 'comment_notes_before' => '<p class="h-info">'.__('Your email address will not be published.','Longpoint').'</p>',
						 'comment_notes_after' => '',
						);
	?>
	
	<?php global $post; ?>
			<?php if('open' == $post->comment_status){ ?>
	<div class="comment-form">
	
	 <?php comment_form($comment_args); ?>
	
	
	</div>    
	<?php } ?>
	</section> <!-- end comments -->