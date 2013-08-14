<?php

function omega_theme_inc() {


	/* Custom template tags for this theme. */
	require get_template_directory() . '/inc/template-tags.php';

	/* Custom functions that act independently of the theme templates. */
	require get_template_directory() . '/inc/extras.php';

	/* Customizer additions. */
	require get_template_directory() . '/inc/customizer.php';

	/* override hybrid code. */
	require get_template_directory() . '/inc/override.php';

	/* image function */
	require get_template_directory() . '/inc/image.php';

	/* customize-css */
	require get_template_directory() . '/inc/customize-css.php';

	/* Load the footer widgets extension if supported. */
	require_if_theme_supports( 'cleaner-caption', get_template_directory() . '/inc/footer-widgets.php' );

	remove_action( 'wp_head', 'hybrid_meta_template', 4 );

	remove_action( 'wp_head', 'wp_generator', 4 );

}

add_action( 'after_setup_theme', 'omega_theme_inc', 20 );