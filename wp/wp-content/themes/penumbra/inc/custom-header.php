<?php
/**
 * Setup the WordPress core custom header feature.
 *
 * @uses penumbra_header_style()
 * @uses penumbra_admin_header_style()
 * @uses penumbra_admin_header_image()
 *
 * @since Penumbra 1.0
 */
function penumbra_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'penumbra_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => 'e9e0e1',
		'width'                  => 1050,
		'height'                 => 250,
		'flex-height'            => true,
		'wp-head-callback'       => 'penumbra_header_style',
		'admin-head-callback'    => 'penumbra_admin_header_style',
		'admin-preview-callback' => 'penumbra_admin_header_image',
	) ) );
}
add_action( 'after_setup_theme', 'penumbra_custom_header_setup' );

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