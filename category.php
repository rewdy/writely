<?php
/**
 * The template for displaying Category Archive pages.
 *
 */

get_header(); ?>

<h1><?php printf( __( 'Entries in the category <em>%s</em>'), '' . single_cat_title( '', false ) . '' ); ?></h1>
<?php
	$category_description = category_description();
	if (!empty($category_description)) {
		echo '<p class="help">' . $category_description . '</p>';
	}

	/* Run the loop for the category page to output the posts.*/
	get_template_part( 'loop', 'category' );
?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>