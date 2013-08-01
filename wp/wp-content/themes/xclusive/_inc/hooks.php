<?php
/**
 * Theme's Action Hooks
 *
 *
 * @file hooks.php
 * @package xclusive 
 * @author Hafid Trujillo
 * @copyright 2013 Xpark Media
 * @license license.txt 
 * @version release: 0.1.0
 * @filesource  wp-content/themes/xclusive/includes/hooks.php
 * @since available since 0.1.0
 */

  // Avoid direct access
  if ( ! defined( 'ABSPATH' ) ) exit;

  if ( ! function_exists( 'xclusive_setup' ) ):
    function xclusive_setup() {
		
		global $content_width, $xclusive_options;
		
		/**
        * Global content width.
        */
        if ( ! isset( $content_width ) )
            $content_width = 540;
			
		/**
        * Global theme options.
        */
        if ( ! isset( $xclusive_options ) )
        	$xclusive_options = xclusive_get_theme_options();
		
		/**
        * Add your files into /languages/ directory.
		* @see http://codex.wordpress.org/Function_Reference/load_theme_textdomain
        */
	    load_theme_textdomain( 'xclusive', get_template_directory() . '/languages' );
		
		/**
        * Add custom TinyMCE editor stylesheets. (editor-style.css)
        * @see http://codex.wordpress.org/Function_Reference/add_editor_style
        */
   		add_editor_style( '_css/editor-style.css' );

		/**
        * Enables post and comment RSS feed links to head.
        * @see http://codex.wordpress.org/Function_Reference/add_theme_support#Feed_Links
        */
        add_theme_support( 'automatic-feed-links' );
		
		/**
        * Switches default core markup for search form to output valid HTML5.
        * @see http://codex.wordpress.org/Function_Reference/add_theme_support#Feed_Links
        */
		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );
		
		/*
		* This theme supports all available post formats by default.
		* See http://codex.wordpress.org/Post_Formats
		*/
		add_theme_support( 'post-formats', array(
			'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video'
		) );

		/**
         * Enables post-thumbnail support for a theme.
         * @see http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
        */
       	add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 545, 210, true );
			 
		 /**
         * Enables post-thumbnail support for a theme.
         * @seehttp://codex.wordpress.org/Function_Reference/add_theme_support#Custom_Background
        */
		 add_theme_support( 'custom-background', array(
			'default-color' => ( $xclusive_options['color_scheme'] == 'black' ) ? '282828' : 'f5f5f5',
		) );
	
		 // This theme uses its own gallery styles.
		 add_filter( 'use_default_gallery_style', '__return_false' );
	
		 /**
         * This feature enables custom-menus support for a theme.
         * @see http://codex.wordpress.org/Function_Reference/register_nav_menus
         */	
        register_nav_menus(array(
			'top'         		=> __('Top Menu', 'xclusive'),
			'social'      	=> __('Social Menu', 'xclusive'),
	        'primary'      	=> __('Header Menu', 'xclusive'),
			'footer'      	=> __('Footer Menu', 'xclusive')
		   )
	    );
	}
  endif;
  add_action( 'after_setup_theme', 'xclusive_setup' );

  
  /**
  * Register theme's widget areas
  *
  * @see http://codex.wordpress.org/Function_Reference/register_sidebar
  * @return void 
  */
  function xclusive_widgets_init() {
  	register_sidebar( array(
		'name'          		=> __( 'Main Widget Area', 'xclusive' ),
		'id'            			=> 'sidebar',
		'description'   		=> __( 'Main sidebar: displays on pages and posts. Sidebar is hidden on mobile devices.', 'xclusive' ),
		'before_widget' 	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  		=> '</aside>',
		'before_title'  		=> '<h3 class="widget-title">',
		'after_title'   		=> '</h3>',
	) );
	register_sidebar( array(
		'name'          		=> __( 'Landing Widget Area 1', 'xclusive' ),
		'id'            			=> 'landing-1',
		'description'   		=> __( 'Landing template: displays on top of  "Landing" page template only.', 'xclusive' ),
		'before_widget' 	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  		=> '</aside>',
		'before_title'  		=> '<h3 class="widget-title">',
		'after_title'   		=> '</h3>',
	) );
	register_sidebar( array(
		'name'          		=> __( 'Landing Widget Area 2', 'xclusive' ),
		'id'            			=> 'landing-2',
		'description'   		=> __( 'Landing template: displays on the middel of "Landing" page template only.', 'xclusive' ),
		'before_widget' 	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  		=> '</aside>',
		'before_title'  		=> '<h3 class="widget-title">',
		'after_title'   		=> '</h3>',
	) );
	register_sidebar( array(
		'name'          		=> __( 'Landing Widget Area 3', 'xclusive' ),
		'id'            			=> 'landing-3',
		'description'   		=> __( 'Landing template: displays on the bottom of "Landing" page template only.', 'xclusive' ),
		'before_widget' 	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  		=> '</aside>',
		'before_title'  		=> '<h3 class="widget-title">',
		'after_title'   		=> '</h3>',
	) );
  }
  add_action( 'widgets_init', 'xclusive_widgets_init' );


  /**
  * Load theme's stylessheets
  *
  * @see http://codex.wordpress.org/Function_Reference/wp_enqueue_style
  * @return void 
  */
  function xclusive_style_enqueues() {
	 if( is_admin() ) 
		return;
		
	$theme 	= wp_get_theme();
	$options 	= xclusive_get_theme_options();
	
	wp_enqueue_style( 'font-roboto',  "http://fonts.googleapis.com/css?family=Roboto:300,400,700" );
	wp_enqueue_style( 'xclusive', get_template_directory_uri() . "/style.css", false, $theme->version, 'all' );
	
	wp_enqueue_style( 'xclusive-layout', get_template_directory_uri() . "/_css/layout.css", array( 'xclusive' ), $theme->version );
	wp_enqueue_style( 'xclusive-color', get_template_directory_uri() . "/_css/color.css", array( 'xclusive-layout' ), $theme->version );
	wp_enqueue_style( 'xclusive-mobile', get_template_directory_uri() . "/_css/mobile.css", array( 'xclusive-layout' ), $theme->version );
	
	if( $options['color_scheme'] )
		wp_enqueue_style( 'xclusive-scheme', get_template_directory_uri() . "/_css/" . $options['color_scheme'] . ".css", array( 'xclusive-color' ), $theme->version );
  }
  add_action( 'wp_enqueue_scripts', 'xclusive_style_enqueues' );
  
  
  /**
  * Load theme's JavaScript
  *
  * @see http://codex.wordpress.org/Function_Reference/wp_enqueue_script
  * @return void 
  */
  function xclusive_scripts_enqueues(){
	if( is_admin() ) 
		return;
	
	global $wp_scripts;
	
	/*
	 * Adds JavaScript to pages with the comment form to support sites with
	 * threaded comments (when in use).
	 */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
	
	$theme 	= wp_get_theme();
	$options 	= xclusive_get_theme_options();
	
	// Loads JavaScript file with functionality specific to Twenty Thirteen.
	wp_enqueue_script( 'xclusive-script', get_template_directory_uri() . '/_js/xclusive.js', array( 'jquery' ), $theme->version, true );
	
	// Load  JavaScript for slideshow header
	if( $options['headimg_slideshow'] ){
		if( ( is_front_page() && $options['headimg_front_only'] ) || ! $options['headimg_front_only'] )
			wp_enqueue_script( 'xclusive-slideshow', get_template_directory_uri() . '/_js/slideshow.js', array( 'jquery' ), $theme->version, true );
	}

	// Loads the Internet Explorer specific stylesheet.
	// see: http://codex.wordpress.org/Conditional_Comment_CSS
	// see: http://wordpress.stackexchange.com/questions/54327/register-and-enqueue-conditional-browser-specific-javascript-files
	wp_enqueue_script( 'xclusive-html5', get_template_directory_uri() . '/_js/html5.js', false, $theme->version, false );
	$wp_scripts->add_data(  'xclusive-html5', 'conditional', ' lt IE 9' );
  }
  add_action( 'wp_enqueue_scripts', 'xclusive_scripts_enqueues' );
  
  
  /**
  * Change the standar HTML tags for HTML5
  *
  * @param array $atts default gallery tags.
  * @return array HTML5 tags.
  */
  function xclusive_gallery_atts( $atts ) {
	$replace = array( 'captiontag' => 'figcaption', 'itemtag' => 'figure', 'icontag' => 'span' );
	
	if ( has_post_format( 'gallery' ) && ! is_single() )
		 $replace['size'] = 'post-thumbnail';
		 
	return apply_filters( 'xclusive_gallery_atts', wp_parse_args( $replace, $atts ), $atts );
  }
  add_filter( 'shortcode_atts_gallery', 'xclusive_gallery_atts' );
  
  
  /**
  * Add paragrahs to chat post format for formating
  *
  * @param string $content default content.
  * @return string modified content.
  */
  function xclusive_add_chat_style( $content ){
	if ( ! has_post_format( 'chat' ) )
		return $content;
		
	$content = preg_replace("/(\r\n|\n|\r)/", "\n", strip_tags($content) ); 
	return preg_replace('/\n?(.+?)(\n|\z)/s', "<p>$1</p>",  $content );
  }
  add_filter( "the_content", "xclusive_add_chat_style" );
  
  
  /**
  * Add front-end body classes
  *
  * @param array $atts default body classes.
  * @return array with body classes.
  */
  function xclusive_body_class( $classes ){
	
	if( is_admin() )
		return;
	
	$sidebar = true;
	
	if( $them_name = get_option( 'template' ) )
		$classes[] = $them_name;
	
	if(  false !== ( $key = array_search( 'page-template-no-sidebar-php', $classes ) ) ) {
		$sidebar = false;
		unset( $classes[$key] ); 
		$classes[] = 'template-no-sidebar';
	} 
	
	if(  xclusive_using_landing_template() ) {
		$sidebar = false;
		if( isset( $classes['page-template-landing-php'] ) )
			unset( $classes['page-template-landing-php'] ); 
		$classes[] = 'template-landing';
	} 
	
	if ( is_active_sidebar( 'sidebar' ) && ! is_attachment() && ! is_404() && $sidebar )
		$classes[] = 'sidebar';
	
	if ( ! get_option( 'show_avatars' ) )
		$classes[] = 'no-avatars';
	
	$options = xclusive_get_theme_options();
	
	if( ! $options['header_text'] )
		$classes[] = 'no-header-text';
	
	if( ! $options['logo'] )
		$classes[] = 'no-logo';
	
	if( wp_is_mobile() )
		$classes[] = 'mobile';
	
	return array_unique( $classes );
  }
  add_filter( 'body_class', 'xclusive_body_class' );
  
  
  /**
  * Improve the page title based on current url.
  *
  * @param string $title title text.
  * @param string $sep Optional separator.
  * @return string page title.
  */
  function xclusive_wp_title( $title, $sep ){
  	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= esc_html( get_bloginfo( 'name' ) );

	// Add the site description for the home/front page.
	$site_description = esc_html( get_bloginfo( 'description', 'display' ) );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'xclusive' ), max( $paged, $page ) );

	return $title;
  }
  add_filter( 'wp_title', 'xclusive_wp_title', 10, 2 );
  
  
  /**
  * Add scroll up link at the bottom of the content area #main
  *
  * @return void.
  */
  function xclusive_add_sidebar_toggle_button( ) {
	printf( '<a href="#" class="collapse-sidebar" title="%2$s" rel="nofollow" data-label="%1$s">%2$s</a>',
		esc_attr__( 'show sidebar', 'xclusive' ),
		esc_attr__( 'collapse sidebar', 'xclusive' )
	);
  }
  add_filter( 'xclusive_before_sidebar_content', 'xclusive_add_sidebar_toggle_button' );
  
  
  /**
  * Add scroll up link at the bottom of the content area #main
  *
  * @return void.
  */
  function xclusive_add_scroll_up_button( ) {
	printf( '<a href="#" class="window-scroll-up" title="%1$s" rel="nofollow">%1$s</a>',  esc_attr__( 'Move Up', 'xclusive' ) );
  }
  add_filter( 'xclusive_after_content', 'xclusive_add_scroll_up_button' );  