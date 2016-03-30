<?php
/**
 * The Header Template
 *
 * @since Penumbra 1.0
 */
?>
<?php //Retrieve Theme Options Data
global $penumbra_options;
$penumbra_options = get_option('penumbra_theme_options');?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="shortcut icon" href="nc2u.ico">
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">

	<header id="masthead" class="site-header" role="banner">
		<hgroup>
<?php if ( is_home() || is_front_page() ) { ?>
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php if(!empty($penumbra_options['logo'])) { ?><img src="<?php echo $penumbra_options['logo']; ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" /><?php } else { bloginfo('name'); } ?></a></h1>
			<div class="site-description"><?php if ( isset($penumbra_options['hide_tag']) && ($penumbra_options['hide_tag']!="") ){ ?><?php } else { ?><?php bloginfo( 'description' ); ?><?php } ?></div>
<?php } else { ?>
			<h2 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php if(!empty($penumbra_options['logo'])) { ?><img src="<?php echo $penumbra_options['logo']; ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" /><?php } else { bloginfo('name'); } ?></a></h2>
			<div class="site-description"><?php if ( isset($penumbra_options['hide_tag']) && ($penumbra_options['hide_tag']!="") ){ ?><?php } else { ?><?php bloginfo( 'description' ); ?><?php } ?></div>
<?php } ?>
		</hgroup>
		<?php if ( isset($penumbra_options['hide_search']) && ($penumbra_options['hide_search']!="") ){ ?><?php } else { ?>
			<?php
				// If header text been hidden
				if ( 'blank' == get_header_textcolor() ) :
			?>
				<div class="only-search">
				<?php get_search_form(); ?>
				</div>
			<?php
				else :
			?>
				<?php get_search_form(); ?>
			<?php endif; ?>
		<?php } ?>
		<nav role="navigation" class="site-navigation main-navigation">
			<h2 class="assistive-text"><?php _e( 'Menu', 'penumbra' ); ?></h2>
			<div class="assistive-text skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'penumbra' ); ?>"><?php _e( 'Skip to content', 'penumbra' ); ?></a></div>

			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</nav><!-- .site-navigation .main-navigation -->
<?php $header_image = get_header_image();
        if ( ! empty( $header_image ) ) { ?>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
                <img class="headerimg" src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" />
            </a>
<?php } // if ( ! empty( $header_image ) )
?>
	</header><!-- #masthead .site-header -->

	<div id="main" class="site-main">
