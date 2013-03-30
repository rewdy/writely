<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	wp_title(' &#x2605;', true, 'right');

	bloginfo('name');

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<!-- stylesheet -->
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link href="http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
<!-- make html5 work for pre ie9 -->
<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>

<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Pull in my favorite library and the global js */

	/* DISABLED FOR VOIDTHEME DEFAULT SETUP. Uncomment the follwing links to link to JS files */
	// wp_enqueue_script('jquery');
	// wp_enqueue_script('name-of-script', get_bloginfo('template_directory').'/js/name-of-file.js');

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
</head>

<body <?php body_class(); ?>>
	<header>
		<div id="title">
			<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo('name', 'display')); ?>" rel="home"><?php bloginfo('name'); ?></a>
		</div>
		<nav>
			<div id="access" role="navigation">
			<?php /*  Allow screen readers / text browsers to skip the navigation menu and get right to the good stuff */ ?>
				<a href="#content" title="<?php esc_attr_e( 'Skip to content', 'bpbase' ); ?>" id="jump_link"><?php _e( 'Skip to content', 'bpbase' ); ?></a>
				<?php /* Navigation menu  */
					wp_nav_menu(
						array(
							'menu' => 1,
							'menu_id' => 'nav_list',
							'theme_location' => 'main-menu',
							'container' => false
						)
					); ?>
			</div><!-- #access -->
		</nav>
	</header>
	<section id="content">