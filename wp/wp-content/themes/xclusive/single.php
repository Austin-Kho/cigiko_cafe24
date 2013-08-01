<?php
/**
 * XClusive - template for displaying  all single posts
 *
 * @file single.php
 * @package xclusive 
 * @author Hafid Trujillo
 * @copyright 2013 Xpark Media
 * @license license.txt 
 * @version release: 0.1.0
 * @filesource  wp-content/themes/xclusive/single.php
 * @since available since 0.1.0
 */
 
  get_header(); ?>

	<section id="primary">
		<div id="content" role="main">
			
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', get_post_format() ); ?>
				<?php xclusive_post_nav(); ?>
                <?php comments_template( '', true ); ?>
			<?php endwhile; ?>
			
		</div><!--#content-->
	</section><!--#primary-->

  <?php get_sidebar(); ?>
  <?php get_footer(); ?>