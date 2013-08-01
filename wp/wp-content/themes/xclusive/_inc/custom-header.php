<?php
/**
 * Theme's custom header functions
 *
 *
 * @file custom-header.php
 * @package xclusive 
 * @author Hafid Trujillo
 * @copyright 2013 Xpark Media
 * @license license.txt 
 * @version release: 0.1.0
 * @filesource  wp-content/themes/xclusive/_inc/custom-header.php
 * @since available since 0.1.0
 */
 
  /**
  * Sets up the WordPress core custom header arguments and settings.
  *
  * @return void 
  */
  function xclusive_custom_header_setup() {
  	
	$args = array(
		// Text color and image (empty to use none).
		'header-text'    	=> false,
		'default-image'	=> false, //'%s/_img/headers/yosemite-lake.jpg',

		// Set height and width, with a maximum value for the width.
		'height'                 => 300,
		'width'                  => 1000,

		// Callbacks for styling the header and the admin preview.
		'admin-preview-callback' 	=> 'xclusive_header_image',
		'admin-head-callback'    	=> 'xclusive_admin_header_style',
	);
	
	add_theme_support( 'custom-header', $args );
	
	/*
	 * Default custom headers packaged with the theme.
	 * %s is a placeholder for the theme template directory URI.
	 */
	register_default_headers( array(
		'yosemite' => array(
			'url'           => '%s/_img/headers/yosemite-lake.jpg',
			'thumbnail_url' => '%s/_img/headers/yosemite-lake-thumbnail.jpg',
			'description'   => _x( 'Yosemite', 'header image description', 'xclusive' )
		),
		'lanterns' => array(
			'url'           => '%s/_img/headers/chinese-lanterns.jpg',
			'thumbnail_url' => '%s/_img/headers/chinese-lanterns-thumbnail.jpg',
			'description'   => _x( 'Lanterns', 'header image description', 'xclusive' )
		),
		'hotel' => array(
			'url'           => '%s/_img/headers/hotel.jpg',
			'thumbnail_url' => '%s/_img/headers/hotel-thumbnail.jpg',
			'description'   => _x( 'Hotel', 'header image description', 'xclusive' )
		),
	) );
	
	add_action( 'admin_print_scripts-appearance_page_custom-header', 'xclusive_admin_header_scripts' );
  }
  add_action( 'after_setup_theme', 'xclusive_custom_header_setup' );
 
  
  /**
  * Styles the header image displayed on the Appearance > Header admin panel.
  *
  * @return void 
  */
  function xclusive_admin_header_style() {
	?>
    <style type="text/css" id="xclusive-admin-header-css">
		#headimg {
			-webkit-box-sizing: border-box;
			-moz-box-sizing: border-box;
			box-sizing: border-box;
			min-height:260px;
			padding: 0;
			position:relative;
			width:960px;
		}
		#headimg .slide {
			height:100%;
			position:absolute;
			width:100%;
		}
		#headimg a {
			background:url(<?php echo esc_url( get_template_directory_uri() ); ?>/_img/slideshow.png) no-repeat 0 0;
			display:block; 
			height:65px;
			text-indent:-999em;
			opacity:.5;
			position:absolute;
			width:40px;
			top:40%;
			z-index:200;
		}
		#headimg a:focus,
		#headimg a:hover {
			opacity:1;
		}
		#headimg a.disabled {
			opacity:0;
		}
		#headimg .show-prev {
			left:1%;
		}
		#headimg .show-next{
			right:1%;
			background-position: 100% -71px;
		}
	</style>
    <?php
  }
  
  
  /**
  * Add JavaScript file to admin page if the slideshow 0ption is selected
  * 
  * @return void 
  */
  function xclusive_admin_header_scripts(){
	 $theme_optons = xclusive_get_theme_options();
	 
	 if( $theme_optons['headimg_slideshow'] && get_uploaded_header_images() )
	 	wp_enqueue_script( 'xclusive-slideshow', get_template_directory_uri() . '/_js/slideshow.js', array( 'jquery' ) );
  }
   
   
  /**
  * Outputs markup to be displayed on the Appearance > Header admin panel.
  * This callback overrides the default markup.
  *
  * @return void 
  */
  function xclusive_header_image() {
  
   	$header_image = get_header_image();
	$theme_optons = xclusive_get_theme_options();
	
	if( ! $header_image || ( ! is_admin() && ! is_front_page() && $theme_optons['headimg_front_only'] ) )
		return;
	
	$output =  '';	
		
	// slideshow
	if( $theme_optons['headimg_slideshow'] ){

		global $_wp_default_headers;

		$header_images = $_wp_default_headers;
		$image_header_mode = get_theme_mod( 'header_image' );
		
		// check what to use the default images or uploaded images
		if( $uploaded_images = get_uploaded_header_images() ){
			if( 'random-uploaded-image' == $image_header_mode ) {
				$header_images = $uploaded_images;
			} else {
				foreach( $uploaded_images as $image_data ){
					if( isset( $image_data['url'] ) && $image_data['url'] == $image_header_mode ){
						$header_images = $uploaded_images;
						break;
					}
				}
			}
		}				
		
		// random images
		if( is_random_header_image() && is_array( $header_images ) )
			shuffle( $header_images );
		
		
		if( ! empty( $header_images) ){
		
			//open #headimg tag
			$output  = '<div id="headimg">';
			
			$zindex = 100; // display images in document order
			foreach( $header_images as $image_data ){
				if( empty( $image_data['url'] ) )
					continue;
					
				$url = isset( $image_data['attachment_id'] ) ? $image_data['url'] : sprintf( $image_data['url'], get_template_directory_uri(), get_stylesheet_directory_uri() ) ;
				$output .= '<div class="slide" style="z-index:' . ($zindex--) . '; background: url(' . esc_url( $url  ) . ') no-repeat scroll 50%">&nbsp;</div>';
			}
			
			// next / previous nav
			$output .= '<a href="#" rel="nofollow" class="show-prev" title="' . esc_attr__( 'Previous Image', 'xclusive' ) . '">' . esc_html( __( 'Previous Image', 'xclusive' ) ). '</a>';
			$output .= '<a href="#" rel="nofollow" class="show-next" title="' . esc_attr__( 'Next Image', 'xclusive' ) . '">' . esc_html( __( 'Next Image', 'xclusive' ) ) . '</a>';
			
			
			//colse #headimg tag
			echo $output .= '</div><!--#headimg-->';
		}
	} 
	
	// single image
	if( empty( $output ) )
		echo '<div id="headimg" style="background: url(' . esc_url( $header_image ) . ') no-repeat scroll 50%">&nbsp;</div>';
  }