<?php
/**
 * Theme Options
 *
 *
 * @file theme-options.php
 * @package xclusive 
 * @author Hafid Trujillo
 * @copyright 2010 - 2012 Xpark Media
 * @license license.txt 
 * @version release: 0.1.0
 * @filesource  wp-content/themes/xclusive/_inc/theme-options.php
 * @since   available since Release 0.1.0
 */
 ?>
<?php

  // Avoid direct access
  if ( ! defined( 'ABSPATH' ) ) exit;
  
  /*
  * Add options to customizer controls
  */
  function xclusive_customize_register( $wp_customize ){
	
	// image header logo option
	$wp_customize->add_section( 'xclusive_logo', array(
		'title'    		=> __( 'Logo', 'xclusive '),
		'priority' 	=> 15,
	));
		
	$wp_customize->add_setting( 'xclusive_theme_options[logo]', array(
		'default'      => false,
		'capability'  => 'edit_theme_options',
		'type'          => 'option',
	));
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'xclusive_theme_options_logo', array(
		'settings' 	=> 'xclusive_theme_options[logo]',
		'label'    	=> __( 'Logo', 'xclusive' ),
		'section'  	=> 'xclusive_logo',
	)));
	
	
	//header text option
	$wp_customize->add_setting( 'xclusive_theme_options[header_text]', array(
		'default'      => true,
		'capability'  => 'edit_theme_options',
		'type'          => 'option',
	));
	
	$wp_customize->add_control( 'xclusive_header_text', array(
		'settings' 	=> 'xclusive_theme_options[header_text]',
		'label'    	=> __( 'Display Header Text', 'xclusive' ),
		'section'  	=> 'title_tagline',
		'type'     	=> 'checkbox',
	));

	
	// header options
	if( get_header_image() ){
		
		// image header front only option 
		$wp_customize->add_setting( 'xclusive_theme_options[headimg_front_only]', array(
			'default'       => false,
			'capability'   => 'edit_theme_options',
			'type'           => 'option',
		));
		
		$wp_customize->add_control( 'xclusive_headimg_front_only', array(
			'settings' 	=> 'xclusive_theme_options[headimg_front_only]',
			'label'    	=> __( 'Home Page only', 'xclusive' ),
			'section'  	=> 'header_image',
			'type'     	=> 'checkbox',
		));
		
		 // image header slideshow option 
		$wp_customize->add_setting( 'xclusive_theme_options[headimg_slideshow]', array(
			'default'       => false,
			'capability'   => 'edit_theme_options',
			'type'           => 'option',
		));
		
		$wp_customize->add_control( 'xclusive_headimg_slideshow', array(
			'settings' 	=> 'xclusive_theme_options[headimg_slideshow]',
			'label'    	=> __( 'Slideshow', 'xclusive' ),
			'section'  	=> 'header_image',
			'type'     	=> 'checkbox',
		));
	
	}
	
	// color scheme section
 	$wp_customize->add_section( 'xclusive_color_scheme', array(
		'title'    		=> __( 'Color Scheme', 'xclusive '),
		'priority' 	=> 100,
	));
	
	
	//Front page option
	$wp_customize->add_setting( 'xclusive_theme_options[landing_home]', array(
		'default'      => true,
		'capability'  => 'edit_theme_options',
		'type'          => 'option',
	));
	
	$wp_customize->add_control( 'xclusive_landing_home', array(
		'settings' 	=> 'xclusive_theme_options[landing_home]',
		'label'    	=> __( 'XClusive landing template', 'xclusive' ),
		'section'  	=> 'static_front_page',
		'type'     	=> 'checkbox',
	));

	
	// color scheme option
	$wp_customize->add_setting( 'xclusive_theme_options[color_scheme]', array(
		'default'       => 'green',
		'capability'   => 'edit_theme_options',
		'type'           => 'option',
	));
	
	$wp_customize->add_control( 'xclusive_color_scheme_select', array(
		'settings' 	=> 'xclusive_theme_options[color_scheme]',
		'label'   		=> __( 'Select color', 'xclusive' ),
		'section' 	=> 'xclusive_color_scheme',
		'type'    	=> 'select',
		'choices'	=> xclusive_get_color_scheme_options(),
	));
	
	// social links section
 	$wp_customize->add_section( 'xclusive_social_links', array(
		'title'    		=> __( 'Default Social Menu', 'xclusive '),
		'priority' 	=> 200,
	));
	
	// Add social links settings
	$priority = 1;
	$options = xclusive_get_social_links_options();
	$default = xclusive_get_default_theme_options();
	foreach( $options as $social_id => $link ){
		
		$social_id = sanitize_title( $social_id );
		$wp_customize->add_setting( 'xclusive_theme_options[social_links][' . $social_id. ']', array(
			'default'       => $default['social_links'][$social_id],
			'capability'   => 'edit_theme_options',
			'type'           => 'option',
		));

		$wp_customize->add_control( 'xclusive_social_links_' . $social_id , array(
			'settings' 	=> 'xclusive_theme_options[social_links][' . $social_id. ']',
			'label'   		=> sprintf( __( "%s link", 'xclusive'), $link['name'] ),
			'section' 	=> 'xclusive_social_links',
			'priority' 	=> $priority,     	
		));
		
		$priority++;
	}
  }
  add_action( 'customize_register', 'xclusive_customize_register' );
  
  
  /**
   * Return color array options
   *
   * @returns array
   */
  function xclusive_get_color_scheme_options( ){
	return apply_filters( 'xclusive_color_scheme_options', array(
		'0' 		=> __( 'None', 'xclusive' ),
		'green' 	=> __( 'Green', 'xclusive' ),
		'blue' 	=> __( 'Blue', 'xclusive' ),
		'black' 	=> __( 'Black', 'xclusive' ),
	));
  }
  
  
  /**
   * Return social links array options
   *
   * @returns array
   */
  function xclusive_get_social_links_options( ){
	return apply_filters( 'xclusive_social_links_options', array( 
			'eml' => array( 'name' =>__('eMail'), 'href' => '' ), 
			'fbk' 	=> array( 'name' =>__('Facebook'), 'href' => '' ), 
			'flr'	=> array( 'name' =>__('Flattr'), 'href' => '' ),
			'fck'	=> array( 'name' =>__('Flickr'), 'href' => '' ),
			'lin'	=> array( 'name' =>__('LinkedIn'), 'href' => '' ), 
			'gps'	=> array( 'name' =>__('Google Plus'), 'href' => '' ),  
			'ppl'	=> array( 'name' =>__('PayPal'), 'href' => '' ),  
			'pnt'	=> array( 'name' =>__('Pinterest'), 'href' => '' ), 
			'rss'	=> array( 'name' =>__('RSS'), 'href' => '' ), 
			'sun'	=> array( 'name' =>__('StumbleUpon'), 'href' => '' ), 
			'twr'	=> array( 'name' =>__('Twitter'), 'href' => '' ), 
			'ytb'	=> array( 'name' =>__('YouTube'), 'href' => '' ), 
			'veo'	=> array( 'name' =>__('Vimeo'), 'href' => '' ), 
			'wey'	=> array( 'name' =>__('WePay'), 'href' => '' ), 
			'wps' => array( 'name' =>__('WordPress'), 'href' => '' ),  
	));
  }
  
  /**
   * Return default theme options array
   *
   * @returns array
   */
  function xclusive_get_default_theme_options() {
	$default_theme_options = array(
		'logo' => false,
		'header_text' => true,
		'landing_home' => false,
		'color_scheme' => 'blue',
		'headimg_front_only' => false,
		'headimg_slideshow' => false,
		'social_links' 	=> array( 
			'eml' => 'mailto:' . get_bloginfo('admin_email'), 
			'fbk' 	=> '',
			'flr'	=> '',
			'fck'	=> '',
			'lin'	=> '', 
			'gps'	=> '',  
			'ppl'	=> '',  
			'pnt'	=> '', 
			'rss'	=>  get_feed_link ('rss') , 
			'sun'	=> '', 
			'twr'	=> '', 
			'ytb'	=> '', 
			'veo'	=> '', 
			'wey'	=> '', 
			'wps' => '',  
		),
	);
	return apply_filters( 'xclusive_default_theme_options', $default_theme_options );
  }
  
  
   /**
   * Return theme options array
   *
   * @returns array
   */
  function xclusive_get_theme_options() {
	return get_option( 'xclusive_theme_options', xclusive_get_default_theme_options()  );
  }
  
  
  /**
  * Validate theme options
  */
  function xclusive_theme_options_validate( $input ) {
	
	$defaults 	= xclusive_get_default_theme_options();
	$output 	= wp_parse_args( $input, $defaults );
	
	return apply_filters( 'xclusive_theme_options_validate', $output, $input, $defaults );
  }
  
  
  /**
  * Validate theme options in the "reading" admin page
  */
  function xclusive_theme_reading_options_validate( $input ){
	  
	  if( empty( $_POST['xclusive_theme_options']['landing_home'] ) )
	 	$input['landing_home'] = false;

	 return xclusive_theme_options_validate( $input );
  }
  
  
  /**
  * Add options to white list our options
  */
  function xclusive_theme_options_init() {
		
	// register theme settings
    register_setting( 'xclusive_options', 'xclusive_theme_options', 'xclusive_theme_options_validate' );
	
	
	// add front page template option
	add_action( 'load-options-reading.php', 'xclusive_add_help_to_reading_page', 100 );
	if( 'posts' == get_option( 'show_on_front' ) ){
		register_setting( 'reading', 'xclusive_theme_options', 'xclusive_theme_reading_options_validate' );
		add_settings_field( 'xclusive_landing_home', __( 'XClusive landing template', 'xclusive' ), 'xclusive_settings_field_landing_home', 'reading' );
	}

	// display custom header settings if there is a custom header
	if( get_header_image() ){
		// add a new section to the custom head page
		$custom_header_page = 'admin_head-appearance_page_custom-header';
		add_settings_section( 'xclusive_header_options', __( 'Header Options', 'xclusive' ),  '__return_false', $custom_header_page );
	
		// Hack: Save custom-header settings
		//register_setting( $custom_header_page, 'xclusive_theme_options', 'xclusive_theme_custom_header_options_validate' );
		add_action( 'admin_head-appearance_page_custom-header', 'xclusive_theme_custom_header_options_validate' );
	
		add_settings_field( 'headimg_front_only',  __( 'Home Page only', 'xclusive' ), 'xclusive_settings_field_headimg_front_only', $custom_header_page, 'xclusive_header_options' );
		add_settings_field( 'headimg_slideshow',  __( 'Slideshow', 'xclusive' ), 'xclusive_settings_field_headimg_slideshow', $custom_header_page, 'xclusive_header_options' );
	}
  }
  add_action('admin_init', 'xclusive_theme_options_init' );


  /**
  * Update custom header theme settings
  */  
  function xclusive_theme_custom_header_options_validate(){
	  
	if ( ! current_user_can('edit_theme_options') || empty( $_POST ) || empty( $_REQUEST['step'] ) || $_REQUEST['step'] != 1)
		return;
	
	check_admin_referer( 'custom-header-options', '_wpnonce-custom-header-options' );

	global $xclusive_options;
	$input = isset( $_POST['xclusive_theme_options'] ) ? $_POST['xclusive_theme_options'] : array();
		
	$xclusive_options = xclusive_theme_options_validate( $input );
	update_option( 'xclusive_theme_options', apply_filters( 'xclusive_theme_options_validate', $xclusive_options, $input ) );
  }
  
  
  /**
  * Add help section to reading page for the Xclusive front page option
  */  
  function xclusive_add_help_to_reading_page(){	  
	  get_current_screen()->add_help_tab( array(
		'id'      => 'xclusive-front-template',
		'title'   => __( 'XClusive Template', 'xclusive' ),
		'content' => '<p>' . __( 'By default the XClusive theme uses the "Landing" page template to display in the front page if you also have the "Your latest posts" option selected. Uncheck the "Xclusive front page template" option to display your latest post.', 'xclusive' ) . '</p>' .
		  '<p>' . __( 'If you use a static page for the front page this option is not available. Use the page template option to change your page template.', 'xclusive' ) . '</p>',
	) );
  }
  
  /**
  * Render custom xclusive header options section
  */  
  function xclusive_custom_header_options(){
	  do_settings_sections( 'admin_head-appearance_page_custom-header', 'xclusive_custom_header' );
  }
  add_action( 'custom_header_options', 'xclusive_custom_header_options' );
  
  
  /**
  * Render field for headimg_slideshow setting
  */  
  function xclusive_settings_field_headimg_slideshow(){
	global $xclusive_options;	
	echo '<label><input type="checkbox" value="1" name="xclusive_theme_options[headimg_slideshow]"'. checked( 1, $xclusive_options['headimg_slideshow'], false ) .'> ' .
	__( 'Use all images as a slideshow.', 'xclusive' ) . '</label>' ;
  }
  
  
   /**
  * Render field for headimg_front_only setting
  */  
  function xclusive_settings_field_headimg_front_only(){
	global $xclusive_options;	
	echo '<label><input type="checkbox" value="1" name="xclusive_theme_options[headimg_front_only]"'. checked( 1, $xclusive_options['headimg_front_only'], false ) .'> ' .
	__( 'Display custom header in the home page only.', 'xclusive' ) . '</label>' ;
  }
  
   /**
  * Render field for landing_home setting
  */  
  function xclusive_settings_field_landing_home(){
	global $xclusive_options;
	echo '<label><input type="checkbox" value="1" name="xclusive_theme_options[landing_home]"'. checked( 1, $xclusive_options['landing_home'], false ) .'> ' .
	__( 'Display front page using XClusive "Landing" template.', 'xclusive' ) . '</label>
	<p class="description">' . __( 'Overwrites the "Your latest posts" option for the front page, otherwise it uses the default values.' ) . '</p>' ;
  }