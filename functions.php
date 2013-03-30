<?php
/**
 * Void Theme functions and definitions
 *
 * File empty, but here for reference
 */

# Add Menus
add_action('init', 'writely_register_menus');
function writely_register_menus() {
	register_nav_menus(
		array(
			'main-menu' => __( 'Main Menu' ),
			'footer-menu' => __( 'Footer Menu' )
		)
	);
}

# Add Sidebar
add_action( 'widgets_init', 'writely_register_sidebars' );
function writely_register_sidebars() {
	register_sidebar(
		array(
			'id' => 'footer',
			'name' => __( 'Footer' ),
			'description' => __( 'The "sidebar" that is actually the footer. (3 column lined up.)' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>'
		)
	);
}

// # Settings

// function writely_settings_api_init() {
//  	// Add the section to reading settings so we can add our
//  	// fields to it
//  	add_settings_section('writely_setting_section',
// 		'Writely Theme Settings',
// 		'writely_settings_callback_function',
// 		'reading');

//  	// Add the field with the names and function to use for our new
//  	// settings, put it in our new section
//  	add_settings_field('writely_show_author',
// 		'Show author info on entries?',
// 		'writely_show_author_callback',
// 		'reading',
// 		'writely_setting_section');

//  	// Register our setting so that $_POST handling is done for us and
//  	// our callback function just has to echo the <input>
//  	register_setting('reading','writely_setting_section');
//  }// eg_settings_api_init()

//  add_action('admin_init', 'writely_settings_api_init');


//  // ------------------------------------------------------------------
//  // Settings section callback function
//  // ------------------------------------------------------------------
//  //
//  // This function is needed if we added a new section. This function
//  // will be run at the start of our section
//  //

//  function writely_settings_callback_function() {
//  	echo '<p>These settings are for the Writely Theme display.</p>';
//  }

//  // ------------------------------------------------------------------
//  // Callback function for our example setting
//  // ------------------------------------------------------------------
//  //
//  // creates a checkbox true/false option. Other types are surely possible
//  //

//  function writely_show_author_callback() {
//  	echo '<input name="writely_show_author" id="writely_show_author" type="checkbox" value="1" ' . checked( 1, get_option('writely_show_author'), false ) . ' /> Show author info';
//  }


if (! function_exists('show_author')) :

	function show_author() {
		// make this return false if no author information is to be shown.
		return true;
	}

endif;

/**
 * The default Wordpress comment form
 * is pretty terrible. This adds a bit
 * more markup to make it easier to style.
 */

if (! function_exists('comment_form_better_defaults')) :

	function comment_form_better_defaults() {
		// define fields
		$fields = array(
			'author' => '<p class="comment-form-author">' . '<label for="author">' . __( 'Name' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) .
			'<span class="input_holder"><input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></span></p>',
			'email'  => '<p class="comment-form-email"><label for="email">' . __( 'Email' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) .
			'<span class="input_holder"><input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></span></p>',
			'url'    => '<p class="comment-form-url"><label for="url">' . __( 'Website' ) . '</label>' .
			'<span class="input_holder"><input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></span></p>',
		);

		// build our new defaults array (based off of default defaults. customized values noted.
		$defaults = array(
			'fields'               => apply_filters('comment_form_default_fields', $fields ), /* customized */
			'comment_field'        => '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun' ) . '</label><span class="input_holder"><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></span></p>', /* customized */
			'must_log_in'          => '<p class="must-log-in help">' .  sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
			'logged_in_as'         => '<p class="logged-in-as help">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
			'comment_notes_before' => '<p class="comment-notes help">' . __( 'Your email address will not be published.' ) . ( $req ? $required_text : '' ) . '</p>',
			'comment_notes_after'  => '<p class="allowed-html help">' . sprintf(__('Allowed <abbr title="Hyper Text Markup Language">HTML</abbr>: <code>%s</code>.'), allowed_tags()) . '</p>', /* customized */
			'id_form'              => 'commentform',
			'id_submit'            => 'submit',
			'title_reply'          => __( 'Leave a Reply' ),
			'title_reply_to'       => __( 'Leave a Reply to %s' ),
			'cancel_reply_link'    => __( 'Cancel reply' ),
			'label_submit'         => __( 'Post Comment' )
		);

		// send them back out! Bam!
		return $defaults;
	}

	add_filter('comment_form_defaults', 'comment_form_better_defaults');

endif;

?>