<?php
/**
 * The template for displaying Author Archive pages.
 *
 */

get_header(); ?>

<?php
	/* Queue the first post, that way we know who
	 * the author is when we try to get their name,
	 * URL, description, avatar, etc.
	 *
	 * We reset this later so we can run the loop
	 * properly with a call to rewind_posts().
	 */
	if ( have_posts() )
		the_post();
?>

	<h1><?php printf( __( 'Entries by <em>%s<em>'), "<a class='url fn n' href='" . get_author_posts_url( get_the_author_meta( 'ID' ) ) . "' title='" . esc_attr( get_the_author() ) . "' rel='me'>" . get_the_author() . "</a>" ); ?></h1>

<?php
// If a user has filled out their description, show a bio on their entries.
if ( get_the_author_meta( 'description' ) ) : ?>

	<div class="author_info">
		<h2><?php printf(esc_attr__('About %s'), get_the_author()); ?></h2>
		<?php echo get_avatar(get_the_author_meta('user_email')); ?>
		<p><?php the_author_meta( 'description' ); ?></p>
	</div>

<?php endif; ?>

<?php
	/* Since we called the_post() above, we need to
	 * rewind the loop back to the beginning that way
	 * we can run the loop properly, in full.
	 */
	rewind_posts();

	/* Run the loop for the author archive page to output the authors posts
	 * If you want to overload this in a child theme then include a file
	 * called loop-author.php and that will be used instead.
	 */
	 get_template_part( 'loop', 'author' );
?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>