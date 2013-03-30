<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 */
?>

<?php if ( post_password_required() ) : ?>
		<p class="help"><?php _e( 'This post is password protected. Enter the password to view any comments.'); ?></p>
<?php
		/* Stop the rest of comments.php from being processed,
		 * but don't kill the script entirely -- we still have
		 * to fully load the template.
		 */
		return;
	endif;
?>

<?php
	// You can start editing here -- including this comment!
?>

<?php if ( have_comments() ) : ?>
			<h2 id="comments-title"><?php
			printf( _n( 'One Response to "%2$s"', '%1$s Responses to "%2$s"', get_comments_number() ),
			number_format_i18n( get_comments_number() ), '' . get_the_title() . '' );
			?></h2>

<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
			<?php previous_comments_link( __( '&larr; Older Comments' ) ); ?>
			<?php next_comments_link( __( 'Newer Comments &rarr;' ) ); ?>
<?php endif; // check for comment navigation ?>

			<ol id="comments_list">
				<?php
					/* Loop through and list the comments. */
					wp_list_comments();
				?>
			</ol>

<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
				<?php previous_comments_link( __( '&larr; Older Comments' ) ); ?>
				<?php next_comments_link( __( 'Newer Comments &rarr;' ) ); ?>
<?php endif; // check for comment navigation ?>

<?php else : // or, if we don't have comments:

	/* If there are no comments and comments are closed,
	 * you can leave a note here.
	 */

	if ( ! comments_open() ) :

	// do something if there are no comments.

	endif; // end ! comments_open() ?>

<?php endif; // end have_comments() ?>

<?php comment_form(); ?>