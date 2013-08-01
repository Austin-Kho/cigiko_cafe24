<?php
/**
 * XClusive - Header Template
 *
 * @file header.php
 * @package xclusive 
 * @author Hafid Trujillo
 * @copyright 2013 Xpark Media
 * @license license.txt
 * @version release: 0.5.0
 * @filesource  wp-content/themes/xclusive/header.php
 * @since available since 0.5.0
 */
?>

<!doctype html>
<!--[if lt IE 7 ]> <html class="no-js ie6" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]>    <html class="no-js ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]>    <html class="no-js ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>

<meta charset="<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">

<title><?php wp_title('&#124;', true, 'right'); ?></title>

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php xclusive_before_page(); ?>

<div id="page" class="hfeed">
	
	<?php xclusive_before_header(); ?>
	
	<header id="header" role="banner">
		<div class="hgroup">
			<h3 id="site-title"><span><?php echo xclusive_get_site_branding() ?></span></h3><!--#site-title-->
			<h4 id="site-description"><?php bloginfo( 'description' ); ?></h4>
		</div><!--.hgroup-->
		
		<div class="header-menus">
			<nav id="social-nav" role="navigation">
				<a class="screen-reader-text skip-link" href="#top-nav" title="<?php esc_attr_e( 'Skip to top navigation', 'xclusive' ) ?>"><?php _e( 'Skip to top navigation', 'xclusive' ) ?></a>
				<?php wp_nav_menu( array( 'theme_location' => 'social', 'menu_class' => 'social-menu', 'fallback_cb' => 'xclusive_default_social_menu' ) ); ?>
            </nav><!--#social-nav-->
            
            <nav id="top-nav" role="navigation" tabindex="0">
				<a class="screen-reader-text skip-link" href="#main-nav" title="<?php esc_attr_e( 'Skip to main navigation', 'xclusive' ) ?>"><?php _e( 'Skip to main navigation', 'xclusive' ) ?></a>
				<?php wp_nav_menu( array( 'theme_location' => 'top', 'menu_class' => 'top-menu', 'fallback_cb' => 'xclusive_default_top_menu'  ) ); ?>
			</nav><!--#top-nav-->

			<nav id="main-nav" role="navigation" tabindex="0">
				<a class="screen-reader-text skip-link" href="#main" title="<?php esc_attr_e( 'Skip to content', 'xclusive' ) ?>"><?php _e( 'Skip to content', 'xclusive' ) ?></a>
				<h5 class="menu-toggle"><a href="#main-menu"><?php _e( 'Menu', 'xclusive' ); ?></a></h5>
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'main-menu', ) ); ?>
			</nav><!--#main-nav-->
		</div><!--.header-menus-->
        
        <?php xclusive_header_image( ); ?>
        
	</header><!--#header-->
	
	<?php xclusive_after_header(); ?>
	
	<div id="main" tabindex="0">
	
	<?php xclusive_before_content(); ?>