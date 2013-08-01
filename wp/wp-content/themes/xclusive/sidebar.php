<?php
/**
 * XClusive -  Sidebar containing widget area "sidebar", displays on posts and pages.
 *
 * @file sidebar.php
 * @package xclusive 
 * @author Hafid Trujillo
 * @copyright 2013 Xpark Media
 * @license license.txt 
 * @version release: 0.1.0
 * @filesource  wp-content/themes/xclusive/sidebar.php
 * @since available since 0.1.0
 */
 
  if ( is_active_sidebar( 'sidebar' ) && ! wp_is_mobile() ) :  ?>
  
 	<section id="secondary" class="widget-area" role="complementary">
		<?php xclusive_before_sidebar_content() ?>
		
    	<div class="sidebar-inner"><?php dynamic_sidebar( 'sidebar' ); ?></div><!--.sidebar-inner-->
		
		<?php xclusive_after_sidebar_content() ?>
	</section><!--#secondary-->
	
  <?php endif; ?>