<?php
/**
 * XClusive - Index Template
 *
 * @file index.php
 * @package xclusive 
 * @author Hafid Trujillo
 * @copyright 2013 Xpark Media
 * @license license.txt 
 * @version release: 0.1.0
 * @filesource  wp-content/themes/xclusive/index.php
 * @since available since 0.1.0
 
  Note: You can overwrite front-page.php as well as any other Template in Child Theme.
  @see http://codex.wordpress.org/Child_Themes
 */
  
  get_header(); ?>

	<section id="primary">
		<div id="content" role="main">
		
		<?php if ( have_posts() ) : ?>
		
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

<?php get_sidebar(); ?>
<?php get_footer(); ?>