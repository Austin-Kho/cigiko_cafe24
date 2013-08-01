<?php
/**
 * XClusive - template for displaying search results pages
 *
 * @file search.php
 * @package xclusive 
 * @author Hafid Trujillo
 * @copyright 2013 Xpark Media
 * @license license.txt 
 * @version release: 0.1.0
 * @filesource  wp-content/themes/xclusive/search.php
 * @since available since 0.1.0
 */

  get_header(); ?>

	<section id="primary">
		<div id="content" role="main">
		
		<?php if ( have_posts() ) : ?>
        
        	<header class="page-header">
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'xclusive' ), get_search_query() ); ?></h1>
			</header>
		
			<?php xclusive_content_nav( 'nav-above' ); ?>
			
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', get_post_format() ); ?>
	
			<?php endwhile; ?>
			
			<?php xclusive_content_nav( 'nav-below' ); ?>
				
		<?php else : ?>
			
			<?php get_template_part( 'none' ); ?>

		<?php endif; ?>
		
		</div><!--#content-->
	</section><!--#primary-->

<?php get_sidebar( 'search' ); ?>
<?php get_footer(); ?>