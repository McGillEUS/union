<?php
/**
 * The template for displaying comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package Evmet laread
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}

$form_message = __('Please be polite. We appreciate that.' , 'laread');
?>
<div id="comments" class="comments-area no-margin-top">

<div class="comment-box">
	<a class="btn btn-golden" href="#addcomment">Leave a comment</a>
	<div class="comment-tab">
		<?php if (get_comments_number()): ?>
		<a href="#" class="comment-info"><?php echo __('Comments','laread'); ?> (<?php echo get_comments_number(); ?>)</a>	
		<?php endif ?>
	
	</div>

	<div class="comment-block">
		
		<?php if ( have_comments() ) : ?>
		
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-above" class="comment-navigation" role="navigation">
			<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'laread' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'laread' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'laread' ) ); ?></div>
		</nav><!-- #comment-nav-above -->
		<?php endif; // check for comment navigation ?>

			<?php  wp_list_comments(array('type' => 'all' , 'style' => 'div' , 'callback' => 'laread_list_comments')); ?>
			

		

		<?php endif; // check for comment navigation ?>

		<div class="comment-form main-comment-form">
				<a id="addcomment"></a>
				<?php 
                /**
                 * [$comment_form_args custom comment form fields]
                 * @var array
                 */
                $reqs = '';
                if($req) $reqs = '('.esc_html__('required','laread').')'; else $reqs = '';
                $commenter = wp_get_current_commenter();
                $comment_form_args = array(
                    'id_form' => 'commentform',
                    'comment_notes_before' => '<p class="light-font">' . $form_message
                    . '</p>' ,
                    'comment_notes_after' => '',
                    'id_submit' => 'comment-submit',
                    'class_submit' => 'comment-submit',
                    'title_reply' => '' ,
                      'title_reply_to' => __( 'Leave a Reply to %s or' , 'laread' ),
                      'cancel_reply_link' => __( 'Cancel Reply' , 'laread' ),
                      'label_submit' => __( 'Post Comment' , 'laread' ),
                      

                      'fields' => apply_filters( 'comment_form_default_fields', array(
                                    
                                    'author' => '<input type="text" value="'.esc_attr( $commenter['comment_author'] ).'" name="author" class="comment-input"  id="comment-name" placeholder="'.__('Your Name *' , 'laread').'" />' ,


                                    'email' => '<input type="text" value="'. esc_attr(  $commenter['comment_author_email'] ).'" name="email" class="comment-input"  id="comment-email" placeholder="'.__('Your Email *' , 'laread').'" />' 

                                  ) ),
                      'comment_field' => '<textarea name="comment" id="comment-text" placeholder="'.__('Write Message' , 'laread').'" class="comment-textarea on-focus"></textarea>' 
                  );

                comment_form($comment_form_args);  ?>
		</div>

	</div>
</div>



<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php _e( 'Comments are closed.', 'laread' ); ?></p>

	<?php endif; ?>

	

</div><!-- #comments -->
