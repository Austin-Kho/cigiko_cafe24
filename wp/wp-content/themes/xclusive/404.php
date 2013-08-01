<?php
/**
 * XClusive - Template for displaying 404 pages (Not Found).
 *
 * @file 404.php
 * @package xclusive 
 * @author Hafid Trujillo
 * @copyright 2013 Xpark Media
 * @license license.txt 
 * @version release: 0.1.0
 * @filesource  wp-content/themes/xclusive/404.php
 * @since available since 0.1.0
 */

  get_header(); ?>

	<section id="primary">
		<div id="content" role="main">
		
			<article id="post-0" class="post no-results not-found">
				<header class="entry-header">
					<h1 class="entry-title"><?php printf( __( '404 Error %s', 'xclusive' ), 
						sprintf ( '<small>%s</small>', __( 'Page not found', 'xclusive' ) )
					); ?></h1>
				</header>
                
				<div class="entry-content">
                	<h2><?php _e( 'This is somewhat embarrassing, isn&rsquo;t it?', 'xclusive' ); ?></h2>
					<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'xclusive' ); ?></p>
					<?php get_search_form(); ?>
				</div><!-- .entry-content -->
			</article><!-- #post-0 -->
		
		</div><!--#content-->
	</section><!--#primary-->
    
<?php get_footer(); ?>