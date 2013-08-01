<?php
/**
 * XClusive - template for displaying all pages with no sidebar
 * template name: No sidebar 
 *
 * @file page-nsb.php
 * @package xclusive 
 * @author Hafid Trujillo
 * @copyright 2013 Xpark Media
 * @license license.txt 
 * @version release: 0.1.0
 * @filesource  wp-content/themes/xclusive/page-nsb.php
 * @since available since 0.1.0
 */
 
  get_header(); ?>

	<section id="primary">
		<div id="content" role="main">
			
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', get_post_type() ); ?>
                <?php comments_template( '', true ); ?>
			<?php endwhile; ?>
			
		</div><!--#content-->
	</section><!--#primary-->

  <?php get_footer(); ?>