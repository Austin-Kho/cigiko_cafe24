<?php
/**
 * XClusive -  Main template for displaying "No posts found" message.
 *
 * @file content-none.php
 * @package xclusive 
 * @author Hafid Trujillo
 * @copyright 2013 Xpark Media
 * @license license.txt 
 * @version release: 0.1.0
 * @filesource  wp-content/themes/xclusive/content-none.php
 * @since available since 0.1.0
 */
 ?>
 
  <header class="page-header">
	<h1 class="page-title"><?php _e( 'Nothing Found', 'xclusive' ); ?></h1>
  </header>

  <div class="page-content">
	<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

	<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'xclusive' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

	<?php elseif ( is_search() ) : ?>

	<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with different keywords.', 'xclusive' ); ?></p>
	<?php get_search_form(); ?>

	<?php else : ?>

	<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'xclusive' ); ?></p>
	<?php get_search_form(); ?>

	<?php endif; ?>