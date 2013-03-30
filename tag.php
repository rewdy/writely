<?php
/**
 * The template for displaying Tag Archive pages.
 *
 */

get_header(); ?>

<h1><?php printf( __( 'Entires tagged with <em>%s</em>'), '' . single_tag_title( '', false ) . '' ); ?></h1>
<?php
	/* Run the loop for the category page to output the posts.*/
	get_template_part( 'loop', 'tag' );
?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>