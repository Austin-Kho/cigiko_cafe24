<?php
/**
 * Omega functions and definitions
 *
 * @package Omega
 */


/* Load the core theme framework. */
require ( trailingslashit( get_template_directory() ) . 'lib/hybrid.php' );
new Hybrid();

/* Load omega functions */
require get_template_directory() . '/lib/omega.php';

if ( ! function_exists( 'omega_theme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function omega_theme_setup() {

	/* Get the theme prefix. */
	$prefix = hybrid_get_prefix();

	/**
	 * Enable support for Post Thumbnails on posts and pages
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	
	/* Register menus. */
	add_theme_support( 
		'hybrid-core-menus', 
		array( 'primary') 
	);

	/* Register sidebars. */
	add_theme_support( 
		'hybrid-core-sidebars', 
		array( 'primary' ) 
	);

	/* Load scripts. */
	add_theme_support( 
		'hybrid-core-scripts', 
		array( 'comment-reply' ) 
	);

	/* Load shortcodes. */
	add_theme_support( 'hybrid-core-shortcodes' );
	
	/* Enable custom template hierarchy. */
	add_theme_support( 'hybrid-core-template-hierarchy' );
	

	/* Enable theme layouts (need to add stylesheet support). */
	add_theme_support( 
		'theme-layouts', 
		array( '1c', '2c-l', '2c-r' ), 
		array( 'default' => '2c-l', 'customizer' => true ) 
	);
	 
	
	/* implement editor styling, so as to make the editor content match the resulting post output in the theme. */
	add_editor_style();

	/* Support pagination instead of prev/next links. 
	add_theme_support( 'loop-pagination' );
	*/

	/* Better captions for themes to style. */
	add_theme_support( 'cleaner-caption' );

	/* Add default posts and comments RSS feed links to <head>.  */
	add_theme_support( 'automatic-feed-links' );

	/* Handle content width for embeds and images. */
	hybrid_set_content_width( 640 );

	/* custom excerpt */
	add_filter( 'excerpt_length', 'omega_excerpt_length', 999 );
	add_filter('excerpt_more', 'omega_excerpt_more');

	add_action( 'wp_enqueue_scripts', 'omega_scripts' );
	add_action( 'widgets_init', 'omega_widgets_init' );
	add_action( 'wp_head', 'omega_styles' );

	/* Header actions. */
	add_action( "{$prefix}_header", 'omega_site_title' );
	add_action( "{$prefix}_header", 'omega_site_description' );

	/* footer insert to the footer. */
	add_action( "{$prefix}_footer", 'omega_footer_insert' );

	/* Load the primary menu. */
	add_action( "{$prefix}_before_header", 'omega_get_primary_menu' );

	/* Filter the sidebar widgets. */
	add_filter( 'sidebars_widgets', 'omega_disable_sidebars' );
	add_action( 'template_redirect', 'omega_one_column' );
}
endif; // omega_theme_setup

add_action( 'after_setup_theme', 'omega_theme_setup' );


/**
 * Dynamic element to wrap the site title in.  If it is the front page, wrap it in an <h1> element.  One other 
 * pages, wrap it in a <div> element. 
 */
function omega_site_title() {

	/* Get the site title.  If it's not empty, wrap it with the appropriate HTML. */
	if ( $title = get_bloginfo( 'name' ) )
		$title = sprintf( '<h1 class="site-title"><a href="%1$s" title="%2$s" rel="home"><span>%3$s</span></a></h1>', home_url(), esc_attr( $title ), $title );

	/* Display the site title and apply filters for developers to overwrite. */
	echo apply_atomic( 'site_title', $title );
}

/**
 * Dynamic element to wrap the site description in.  If it is the front page, wrap it in an <h2> element.  
 * On other pages, wrap it in a <div> element.*
 */
function omega_site_description() {

	/* Get the site description.  If it's not empty, wrap it with the appropriate HTML. */
	if ( $desc = get_bloginfo( 'description' ) )
		$desc = sprintf( '<h2 class="site-description"><span>%1$s</span></h2>', $desc );

	/* Display the site description and apply filters for developers to overwrite. */
	echo apply_atomic( 'site_description', $desc );
}


function omega_footer_insert() {
	echo do_shortcode( '<p class="copyright">' . __( 'Copyright &copy; [the-year] [site-link].', 'omega' ) . '</p>' . '<p class="credit">' . __( 'Powered by [wp-link] and [theme-link].', 'omega' ) . '</p>' ); 
}

/**
 * Loads the menu-primary.php template.
 */
function omega_get_primary_menu() {
	get_template_part( 'menu', 'primary' );
}

/**
 * Register widgetized area and update sidebar with default widgets
 */
function omega_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'omega' ),
		'id'            => 'sidebar',
		'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="widget-wrap">',
		'after_widget'  => '</div></section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
}

/**
 * Enqueue scripts and styles
 */
function omega_scripts() {
	wp_enqueue_style( 'omega-style', get_stylesheet_uri() );
}

/**
 * Insert conditional script / style for the theme used sitewide.
 */
function omega_styles() {
?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php 
}

/**
 * Sets the post excerpt length to 100 words.
 */
function omega_excerpt_length( $length ) {
	return 100;
}

/**
 * Replaces the excerpt "more" text by a link
 */
function omega_excerpt_more($more) {
    global $post;
	return ' ... <a class="more-link" href="'. get_permalink($post->ID) . '">'.__( '[Read more ...]', 'omega' ).'</a>';
}


/**
 * Function for deciding which pages should have a one-column layout.
 */
function omega_one_column() {

	if ( is_attachment() && wp_attachment_is_image() && 'default' == get_post_layout( get_queried_object_id() ) )
		add_filter( 'theme_mod_theme_layout', 'omega_theme_layout_one_column' );

}

/**
 * Filters 'get_theme_layout' by returning 'layout-1c'.
 */
function omega_theme_layout_one_column( $layout ) {
	return '1c';
}


/**
 * Disables sidebars if viewing a one-column page.
 */

function omega_disable_sidebars( $sidebars_widgets ) {
	global $wp_customize;

	$customize = ( is_object( $wp_customize ) && $wp_customize->is_preview() ) ? true : false;

	if ( !is_admin() && !$customize && '1c' == get_theme_mod( 'theme_layout' ) )
		$sidebars_widgets['primary'] = false;

	return $sidebars_widgets;
}