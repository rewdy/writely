<?php
/**
 * The template for displaying 404 pages (Not Found).
 */

get_header(); ?>

<h1>Error 404: Not Found!</h1>

<p>Oops! It appears that the page you have request cannot be found.</p>

<p class="help">Try searching for the information you want:</p>

<?php get_search_form(); ?>

<p>If you still can't find it, <a href="<?=get_bloginfo('url')?>">go to the front page</a> and see if you can find it from there.</p>

<?php get_footer(); ?>