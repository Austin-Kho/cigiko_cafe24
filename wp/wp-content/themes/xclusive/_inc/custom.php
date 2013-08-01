<?php
/**
 * Theme's Custom functions
 *
 *
 * @file custom.php
 * @package xclusive 
 * @author Hafid Trujillo
 * @copyright 2013 Xpark Media
 * @license license.txt 
 * @version release: 0.1.0
 * @filesource  wp-content/themes/xclusive/_inc/custom.php
 * @since available since 0.1.0
 */
  
  // Avoid direct access
  if ( ! defined( 'ABSPATH' ) ) exit;
  
   
  if ( ! function_exists( 'xclusive_get_site_branding' ) ) :
  /**
  * Return theme branding site name or logo
  *
  * @return string HTML 
  */
  function xclusive_get_site_branding(){
	
	$branding 	= get_bloginfo( 'name' );
	$options 	= xclusive_get_theme_options();
	
	if ( ! empty( $options['logo'] ) )
		$branding = sprintf( '<img src="%1$s" class="site-logo" alt="%2$s" />', esc_url( $options['logo'] ), esc_attr( get_bloginfo( 'name' ) ) );
	
	$link = sprintf( '<a href="%1$s" title="%2$s" rel="home">%3$s</a>', esc_url( home_url( ) ), esc_attr( get_bloginfo( 'description' ) ), $branding );
	return apply_filters( 'xclusive_site_branding', $link , $branding, $options );
  }
  endif;
  
  
  if ( ! function_exists( 'xclusive_get_first_gallery_image' ) ) :
  /**
  * Return first gallery image to display in archive pages
  * Function needs to be in the loop
  *
  * @return string HTML 
  */
  function xclusive_get_first_gallery_image( ){
	global $post_id;
	
	$link = $image = false;
  	$images = xclusive_get_post_gallery( $post_id, false );
	
	if( isset( $images['ids'] ) ){
		$ids = explode (',', $images['ids'] );
		if( isset( $ids[0] ) && $image = wp_get_attachment_image( $ids[0], 'post-thumbnail', true ) )
			$link = sprintf( '<a href="%1$s" title="%2$s" class="image url" rel="bookmark">%3$s</a>', esc_url( get_permalink() ), esc_attr( get_the_title() ), $image );
	}
	return apply_filters( 'xclusive_first_gallery_image', $link, $images, $image );
  }
  endif;
  

  if ( ! function_exists( 'xclusive_render_menu' ) ) :
  /**
  * Display default social navigation 
  *
  * @param array $args menu argumens see: http://codex.wordpress.org/Function_Reference/wp_nav_menu#Usage
  * @param string $menu_items HTML Menu items
  * @return void | string HTML 
  */
  function xclusive_render_menu( $args, $menu_items ){
	
	$show_container = false;
	$nav_menu = $wrap_class = $items = '';
	
	$menu_name 	= sanitize_title( $args['menu'] );
	$wrap_id 			= "menu-{$menu_name}-default";	
	
	if( $args['menu_id'] )
		$wrap_id = $args['menu_id'];
	
	if( $args['menu_class'] )
		$wrap_class = $args['menu_class'];
	
	if ( $args['container'] ) {
		$allowed_tags = apply_filters( 'wp_nav_menu_container_allowedtags', array( 'div', 'nav' ) );
		if ( in_array($args['container'], $allowed_tags ) ) {
			
			$id = '';
			$show_container = true;
			$class = ' class="menu-' . $menu_name . '-container"';
			
			if( $args['container_class'] )
				$class = ' class="' . esc_attr( $args['container_class'] );
			
			if( $args['container_id'] )
				$id = ' id="' . esc_attr( $args->container_id ) . '"';
				
			$nav_menu .= '<'. $args['container'] . $id . $class . '>';
		}
	}
	
	foreach( apply_filters( "xclusive_{$menu_name}_menu_items", $menu_items, $args ) as $key => $link ){
		if( !empty( $link['name'] ) && !empty($link['href']) ){
			
			$item_class = "{$menu_name}-link {$menu_name}-link-" . sanitize_title( $link['name'] );
			
			$items .= '<li class="' . esc_attr( $item_class ) . '">' . $args['link_before'];
			$items .= '<a href="'. esc_url( $link['href'] ) .'" title="' . esc_attr( $link['name'] )  . '">' . esc_html( $link['name'] ) . '</a>';
			$items .= $args['link_after'] . '</li>';
		}
	}
	
	$nav_menu .= sprintf( $args['items_wrap'], esc_attr( $wrap_id ), esc_attr( $wrap_class ), $items );
	
	if ( $show_container )
		$nav_menu .= '</' . $args['container'] . '>';
	
	$nav_menu = apply_filters( 'xclusive_render_menu', $nav_menu,  $args, $menu_items );

	if ( $args['echo'] )
	 	echo $nav_menu;
	else
		return $nav_menu;
	
  }
  endif;
  
  
  if ( ! function_exists( 'xclusive_default_social_menu' ) ) :
  /**
  * Display default social navigation 
  *
  * uses xclusive_render_menu()
  * @param array $args menu argumens see: http://codex.wordpress.org/Function_Reference/wp_nav_menu#Usage
  * @return string HTML 
  */
  function xclusive_default_social_menu( $args = array() ){
	if( $args['theme_location'] != 'social' || empty( $args ) )
		return;
	
	if( empty( $args['menu'] ) )
		$args['menu'] = 'social';
	
	$items 			= array();
	$options 		= xclusive_get_theme_options(); 
	$social_links 	= xclusive_get_social_links_options(); 
	
	foreach( $options['social_links'] as $id => $link ){
		if( $social_links[$id] ) {
			$social_links[$id]['href'] = $link;
			$items[$id] = $social_links[$id];
		}
	}
	xclusive_render_menu( $args, $items );
  }
  endif;
  
  
  if ( ! function_exists( 'xclusive_default_top_menu' ) ) :
  /**
  * Display default social navigation 
  *
  * uses xclusive_render_menu()
  * @param array $args menu argumens see: http://codex.wordpress.org/Function_Reference/wp_nav_menu#Usage
  * @return string HTML 
  */
  function xclusive_default_top_menu( $args = array() ){
	if( $args['theme_location'] != 'top' || empty( $args ) )
		return;
	
	if( empty( $args['menu'] ) )
		$args['menu'] = 'top';
		
	$items = array( );
	
	if( is_user_logged_in() ){
		
		$user = wp_get_current_user( );
		$user_url = get_the_author_meta( 'user_url', $user->ID );
		
		$items['user'] = array( 'name' => $user->display_name, 'href' => ( empty( $user_url ) ? admin_url( '/profile.php' ) : $user_url)  );	
		
		if( current_user_can( 'edit_posts' ) )
			$items['admin'] = array( 'name' => __( 'Site Admin', 'xclusive' ), 'href' => admin_url() );	
			
		$items['logout'] = array( 'name' => __( 'Log out', 'xclusive' ), 'href' => wp_logout_url( get_permalink() ), 'rel' => 'nofollow' );	
	
	}else{
		if( get_option('users_can_register') ) 
			$items['registration'] = array( 'name' => __( 'Register', 'xclusive' ), 'href' => site_url( '/wp-login.php?action=register' ), 'rel' => 'nofollow' );	
		$items['login'] = array( 'name' => __( 'Log in', 'xclusive' ), 'href' => wp_login_url( get_permalink() ), 'rel' => 'nofollow' );	
	}

	xclusive_render_menu( $args, $items );
  }
  endif;
  
  
  if ( ! function_exists( 'xclusive_using_landing_template' ) ) :
  /**
  * Check if the current page is using the landing page template
  *
  * @return bool
  */
  function xclusive_using_landing_template(){
		
	$options = xclusive_get_theme_options();
		
	//landing template as inital display
	 if( 'posts' == get_option( 'show_on_front' )  && is_home() &&  $options['landing_home'] ) 
		return true;

	// show page and the selected page template
	if( is_singular() && 'landing.php' == get_page_template_slug( ) )
		return true;
	
	return false;
  }
  endif;
  
  
   if ( ! function_exists( 'xclusive_get_post_gallery' ) ) :
  /**
  * Get post from a post gallery,
  * function base on WP 3.6 "get_post_galleries"
  *
  * @return array empy or images urls
  */
  function xclusive_get_post_gallery( $post = 0, $html = true ){
	  
	if ( ! $post = get_post( $post ) )
		return array();
	
	$galleries = array();
	
	if ( preg_match_all( '/' . get_shortcode_regex() . '/s', $post->post_content, $matches, PREG_SET_ORDER ) ) {
		 
		 if ( empty( $matches ) )
		 	return array();
			
		 foreach ( $matches as $shortcode ) {
			if ( 'gallery' === $shortcode[2] ) {
				
				$count = 1;
				$srcs = array();
				$gallery = do_shortcode_tag( $shortcode );
				
				if ( $html ) {
					$galleries[] = $gallery;
				} else {
					
					preg_match_all( '#src=([\'"])(.+?)\1#is', $gallery, $src, PREG_SET_ORDER );
					
					if ( ! empty( $src ) ) {
						foreach ( $src as $s )
							$srcs[] = $s[2];
					}
					
					$data = shortcode_parse_atts( $shortcode[3] );
					$data['src'] = array_values( array_unique( $srcs ) );
					$galleries[] = $data;
				}
			}	
		}
	}
	
	$gallery = reset( $galleries );
	return apply_filters( 'xclusive_get_post_gallery', $gallery, $post, $galleries );
  }
  endif;