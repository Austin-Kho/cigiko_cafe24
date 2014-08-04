<?php
/**
 * Penumbra Theme Customizer
 *
 * @since Penumbra 1.0
 */
 
add_action ('admin_menu', 'penumbra_customizer_menu');
function penumbra_customizer_menu() {

	// add the Customize link to the admin menu
	add_theme_page( __( ' Customize', 'penumbra' ), __( ' Customize', 'penumbra' ), 'edit_theme_options', 'customize.php' ); 
}

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 *
 * @since Penumbra 1.0
 */
function penumbra_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	/**
	 * Add theme options support in the Customizer
	 */	
	$wp_customize->add_section( 'penumbra_theme_options', array(
		'title'          => __( 'Theme Options Preview', 'penumbra' ),
		'priority'       => 35,
	) );

	$wp_customize->add_setting( 'penumbra_theme_options[enable_socials]', array(
		'default'        => '',
		'type'           => 'option',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'penumbra_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'penumbra_theme_enable_socials', array(
		'label'   => 'Activate Socials widget in sidebar',
		'section' => 'penumbra_theme_options',
		'settings'	=> 'penumbra_theme_options[enable_socials]',
		'type'    => 'checkbox',
	) );
	
	$wp_customize->add_setting( 'penumbra_theme_options[socials_title]', array(
		'default'        => __('Social Stuff', 'penumbra'),
		'type'           => 'option',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'penumbra_sanitize_text',
	) );

	$wp_customize->add_control( 'penumbra_theme_socials_title', array(
		'label'   => 'Socials Widget Title',
		'section' => 'penumbra_theme_options',
		'settings'	=> 'penumbra_theme_options[socials_title]',
		'type'    => 'text',
	) );
	
	$wp_customize->add_setting( 'penumbra_theme_options[hide_search]', array(
		'default'        => '',
		'type'           => 'option',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'penumbra_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'penumbra_theme_hide_search', array(
		'label'   => 'Hide search box in header',
		'section' => 'penumbra_theme_options',
		'settings'	=> 'penumbra_theme_options[hide_search]',
		'type'    => 'checkbox',
	) );
	
		$wp_customize->add_setting( 'penumbra_theme_options[footer_text]', array(
		'default'        => '',
		'type'           => 'option',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'penumbra_sanitize_text',
	) );

	$wp_customize->add_control( 'penumbra_theme_footer_text', array(
		'label'   => 'Footer Text',
		'section' => 'penumbra_theme_options',
		'settings'	=> 'penumbra_theme_options[footer_text]',
		'type'    => 'text',
	) );
	
}
add_action( 'customize_register', 'penumbra_customize_register' );

/**
 * Sanitize and validate form input.
 */

function penumbra_sanitize_checkbox( $input ) {
    if ( $input == 1 ) {
        return 1;
    } else {
        return '';
    }
}

function penumbra_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 *
 * @since Penumbra 1.0
 */
function penumbra_customize_preview_js() {
	wp_enqueue_script( 'penumbra_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20120827', true );
}
add_action( 'customize_preview_init', 'penumbra_customize_preview_js' );
