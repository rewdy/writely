<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the wordpress construct of pages
 * and that other 'pages' on your wordpress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.0
 */

get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<article class="page">
	<h1><?php the_title(); ?></h1>

	<?php the_content(); ?>

	<?php wp_link_pages( array( 'before' => '<div class="page_links">' . __( 'Pages:', 'bpbase' ), 'after' => '</div>' ) ); ?>

	<?php edit_post_link( __( 'Edit'), '<div class="details">', '</div>' ); ?>
</article>

<div id="comments">
	<?php comments_template( '', true ); ?>
</div>

<?php endwhile; ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>