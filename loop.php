<?php
/**
 * The loop that displays posts.
 *
 * The loop displays the posts and the post content.  See
 * http://codex.wordpress.org/The_Loop to understand it and
 * http://codex.wordpress.org/Template_Tags to understand
 * the tags used in it.
 *
 * This can be overridden in child themes with loop.php or
 * loop-template.php, where 'template' is the loop context
 * requested by a template. For example, loop-index.php would
 * be used if it exists and we ask for the loop with:
 * <code>get_template_part( 'loop', 'index' );</code>
 *
 */
?>

<?php /* If there are no posts to display, such as an empty archive page */ ?>
<?php if ( ! have_posts() ) : ?>
		<h2 class="bad"><?php _e( 'Not Found', 'bpbase' ); ?></h2>
		<p><?php _e( 'No entries found. If you are looking for something specific, please try searching:'); ?></p>
		<?php get_search_form(); ?>

<?php endif; ?>

<?php
	/* Start the Loop.
	 *
	 */ ?>

<div id="entry_listing">
	<?php while ( have_posts() ) : the_post(); ?>

	<?php /* How to display posts in the Gallery category. */ ?>
	<?php if ( in_category( _x('gallery', 'gallery category slug', 'bpbase') ) ) : ?>
		<article class="entry gallery_item">

			<h2><a href="<?php the_permalink(); ?>" title="<?php printf(esc_attr__( 'Permalink to %s'), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

			<div class="entry_date"><span><?php the_time(get_option('date_format')); ?></span></div>

			<?php if ( post_password_required() ) : ?>
				<?php the_content(); ?>
			<?php else : ?>
			<?php
				$images = get_children( array( 'post_parent' => $post->ID, 'post_type' => 'attachment', 'post_mime_type' => 'image', 'orderby' => 'menu_order', 'order' => 'ASC', 'numberposts' => 999 ) );
				$total_images = count( $images );
				$image = array_shift( $images );
				$image_img_tag = wp_get_attachment_image( $image->ID, 'thumbnail' );
			?>
				<a href="<?php the_permalink(); ?>"><?php echo $image_img_tag; ?></a>

				<p><?php printf( __('This gallery contains <a %1$s>%2$s photos</a>.'),
						'href="' . get_permalink() . '" title="' . sprintf( esc_attr__( 'Permalink to %s', 'bpbase' ), the_title_attribute( 'echo=0' ) ) . '" rel="bookmark"',
						$total_images
					); ?></p>

				<?php the_excerpt(); ?>
			<?php endif; ?>

			<div class="details">
				<a href="<?php echo get_term_link( _x('gallery', 'gallery category slug', 'bpbase'), 'category' ); ?>" title="<?php esc_attr_e( 'View posts in the Gallery category', 'bpbase' ); ?>"><?php _e( 'More Galleries', 'bpbase' ); ?></a> |
				<?php comments_popup_link( __( 'Leave a comment', 'bpbase' ), __( '1 Comment', 'bpbase' ), __( '% Comments', 'bpbase' ) ); ?>
				<?php edit_post_link( __( 'Edit', 'bpbase' ), '|', '' ); ?>
			</div>
		</article>
<?php /* How to display posts in the asides category */ ?>

	<?php elseif ( in_category( _x('asides', 'asides category slug', 'bpbase') ) ) : ?>
		<article class="entry aside">

			<div class="entry_date"><span><?php the_time(get_option('date_format')); ?></span></div>

			<?php
			if ( is_archive() || is_search() ) {
				the_excerpt();
			} else {
				the_content();
			}
			?>

			<div class="details">
				<?php comments_popup_link( __( 'Leave a comment', 'bpbase' ), __( '1 Comment', 'bpbase' ), __( '% Comments', 'bpbase' ) ); ?>
				<?php edit_post_link( __( 'Edit', 'bpbase' ), '| ', '' ); ?>
			</div>
		</article>


<?php /* How to display all other posts. */ ?>

	<?php else : ?>
		<article class="entry listed">

			<h2><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'bpbase' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

			<div class="entry_date"><span><?php the_time(get_option('date_format')); ?></span></div>

			<?php
			if (is_archive() || is_search()) {
				the_excerpt();
			} else {
				the_content();

				wp_link_pages( array( 'before' => '<div class="page_links">' . __( 'Pages:', 'bpbase' ), 'after' => '</div>' ) );
			}
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
		</article>
	<?php endif; // This was the if statement that broke the loop into three parts based on categories. ?>

<?php endwhile; // End the loop. ?>
</div>

<?php /* Display navigation to next/previous pages when applicable */ ?>
<?php if (  $wp_query->max_num_pages > 1 ) : ?>
<div id="directional_links">
	<?php next_posts_link( __( '&larr; Older posts') ); ?>
	<?php previous_posts_link( __( 'Newer posts &rarr;') ); ?>
</div>
<?php endif; ?>