<?php
/**
 * The pre-footer "sidebar" area.
 *
 */
?>

<?php
if (is_active_sidebar('footer')) : ?>

<section id="prefooter">
	<?php dynamic_sidebar( 'footer' ); ?>
</section>

<?php endif; ?>