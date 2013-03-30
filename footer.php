<?php
/**
 * The template for displaying the footer.
 *
 */
?>
	</section> <!-- close #content -->
	<footer>
		<?php /* Footer menu  */
			wp_nav_menu(
				array(
					'menu' => 1,
					'menu_id' => 'footer_nav_list',
					'theme_location' => 'footer-menu',
					'container' => false
				)
			); ?>
	</footer>

<?php
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */

	wp_footer();
?>
</body>
</html>