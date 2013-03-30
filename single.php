<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.0
 */

get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	<article class="entry single">
		<h1><?php the_title(); ?></h1>

		<div class="entry_date"><span><?php the_time(get_option('date_format')); ?></span></div>

		<?php
			/* show the content */
			the_content();
		?>

		<?php
		/* show the links to the various pages if there are more than one */
		wp_link_pages( array( 'before' => '<div class="page_links">' . __( 'Pages:', 'bpbase' ), 'after' => '</div>' ) );
		?>

		<div class="details">
			<?php if ( count( get_the_category() ) ) : ?>
				<?php printf( __( 'Posted in %2$s'), 'entry-utility-prep entry-utility-prep-cat-links', get_the_category_list( ', ' ) ); ?>
				|
			<?php endif; ?>
			<?php
				$tags_list = get_the_tag_list( '', ', ' );
				if ( $tags_list ):
			?>
				<?php printf( __( 'Tagged %2$s'), 'entry-utility-prep entry-utility-prep-tag-links', $tags_list ); ?>
				|
			<?php endif; ?>
			<?php comments_popup_link( __( 'Leave a comment', 'bpbase' ), __( '1 Comment', 'bpbase' ), __( '% Comments', 'bpbase' ) ); ?>
			<?php edit_post_link( __( 'Edit', 'bpbase' ), '| ', '' ); ?>
		</div>

		<? if (show_author()): ?>
		<div class="author_info">
			<?php if ( get_the_author_meta( 'description' ) ) : // If a user has filled out their description, show a bio on their entries  ?>
				<?php echo get_avatar(get_the_author_meta('user_email')); ?>
				<h4><?php printf(esc_attr__('About %s'), get_the_author()); ?></h4>
				<p><?php the_author_meta( 'description' ); ?></p>
				<p><a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" class="more_link"><?php printf( __( 'View all posts by %s &rarr;'), get_the_author()); ?></a></p>
			<?php endif; ?>
		</div>
		<? endif; ?>
	</article>

	<div id="directional_links">
		<?php previous_post_link( '%link', '' . _x( '&larr;', 'Previous post link') . ' %title' ); ?>
		<?php next_post_link( '%link', '%title ' . _x( '&rarr;', 'Next post link') . '' ); ?>
	</div>

	<div id="comments">
		<?php comments_template('', true); ?>
	</div>

<?php endwhile; // end of the loop. ?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>