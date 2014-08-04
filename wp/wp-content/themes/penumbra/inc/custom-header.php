<?php
/**
 * Setup the WordPress core custom header feature.
 *
 * Use add_theme_support to register support for WordPress 3.4+
 * as well as provide backward compatibility for previous versions.
 * Use feature detection of wp_get_theme() which was introduced
 * in WordPress 3.4.
 *
 *
 * @uses penumbra_header_style()
 * @uses penumbra_admin_header_style()
 * @uses penumbra_admin_header_image()
 *
 * @since Penumbra 1.0
 */
function penumbra_custom_header_setup() {
	$args = array(
		'default-image'          => '',
		'default-text-color'     => 'e9e0e1',
		'width'                  => 1050,
		'height'                 => 250,
		'flex-height'            => true,
		'wp-head-callback'       => 'penumbra_header_style',
		'admin-head-callback'    => 'penumbra_admin_header_style',
		'admin-preview-callback' => 'penumbra_admin_header_image',
	);

	$args = apply_filters( 'penumbra_custom_header_args', $args );

	if ( function_exists( 'wp_get_theme' ) ) {
		add_theme_support( 'custom-header', $args );
	} else {
		// Compat: Versions of WordPress prior to 3.4.
		define( 'HEADER_TEXTCOLOR',    $args['default-text-color'] );
		define( 'HEADER_IMAGE',        $args['default-image'] );
		define( 'HEADER_IMAGE_WIDTH',  $args['width'] );
		define( 'HEADER_IMAGE_HEIGHT', $args['height'] );
		add_custom_image_header( $args['wp-head-callback'], $args['admin-head-callback'], $args['admin-preview-callback'] );
	}
}
add_action( 'after_setup_theme', 'penumbra_custom_header_setup' );

/**
 * Shiv for get_custom_header().
 *
 * get_custom_header() was introduced to WordPress
 * in version 3.4. To provide backward compatibility
 * with previous versions, we will define our own version
 * of this function.
 *
 * @return stdClass All properties represent attributes of the curent header image.
 *
 * @since Penumbra 1.0
 */

if ( ! function_exists( 'get_custom_header' ) ) {
	function get_custom_header() {
		return (object) array(
			'url'           => get_header_image(),
			'thumbnail_url' => get_header_image(),
			'width'         => HEADER_IMAGE_WIDTH,
			'height'        => HEADER_IMAGE_HEIGHT,
		);
	}
}

if ( ! function_exists( 'penumbra_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see penumbra_custom_header_setup().
 *
 * @since Penumbra 1.0
 */
function penumbra_header_style() {

	// If no custom options for text are set, let's bail
	// get_header_textcolor() options: HEADER_TEXTCOLOR is default, hide text (returns 'blank') or any hex value
	if ( HEADER_TEXTCOLOR == get_header_textcolor() )
		return;
	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css">
	<?php
		// Has the text been hidden?
		if ( 'blank' == get_header_textcolor() ) :
	?>
		.site-title,
		.site-description {
			position: absolute !important;
			clip: rect(1px 1px 1px 1px); /* IE6, IE7 */
			clip: rect(1px, 1px, 1px, 1px);
		}
	<?php
		// If the user has set a custom color for the text use that
		else :
	?>
		.site-title a,
		.site-description {
			color: #<?php echo get_header_textcolor(); ?> !important;
		}
	<?php endif; ?>
	</style>
	<?php
}
endif; // penumbra_header_style

if ( ! function_exists( 'penumbra_admin_header_style' ) ) :
/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * @see penumbra_custom_header_setup().
 *
 * @since Penumbra 1.0
 */
function penumbra_admin_header_style() {
?>
    <style type="text/css">
    .appearance_page_custom-header #headimg { /* This is the container for the Custom Header preview. Notice how the min-height value on this element matches the "height" value we specified earlier in the Custom Header $args array. */
        background: #4c4c4c;
        border: none;
    }
    #headimg h1 { /* This is the site title displayed in the preview */
		font-size: 45px;
        font-family: Cambria, Georgia, Times, "Times New Roman", serif;
        font-style: italic;
        font-weight: normal;
        padding: 0.8em 0.5em 0;
    }
    #desc { /* This is the site description (tagline) displayed in the preview */
        padding: 0 2em 2em;
    }
    #headimg h1 a,
    #desc {
 
        text-decoration: none;
    }
    </style>
<?php
}
endif; // penumbra_admin_header_style

if ( ! function_exists( 'penumbra_admin_header_image' ) ) :
/**
 * Custom header image markup displayed on the Appearance > Header admin panel.
 *
 * @see penumbra_custom_header_setup().
 *
 * @since Penumbra 1.0
 */
function penumbra_admin_header_image() { ?>
	<div id="headimg">
		<?php
		if ( 'blank' == get_header_textcolor() || '' == get_header_textcolor() )
			$style = ' style="display:none;"';
		else
			$style = ' style="color:#' . get_header_textcolor() . ';"';
		?>
		<h1><a id="name"<?php echo $style; ?> onclick="return false;" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
		<div id="desc"<?php echo $style; ?>><?php bloginfo( 'description' ); ?></div>
		<?php $header_image = get_header_image();
		if ( ! empty( $header_image ) ) : ?>
			<img src="<?php echo esc_url( $header_image ); ?>" alt="" />
		<?php endif; ?>
	</div>
<?php }
endif; // penumbra_admin_header_image