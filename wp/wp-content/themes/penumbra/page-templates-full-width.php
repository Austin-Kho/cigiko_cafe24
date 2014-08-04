<?php
/**
 * Template Name: Full-width Page Template, No Sidebar
 *
 * @package Penumbra
 * @since Penumbra 1.0
 */

get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content-full-width" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'page' ); ?>

					<?php if ( isset($options['page_comments']) && ($options['page_comments']!="") ){ ?><?php } else { ?><?php comments_template('', true); ?><?php } ?>
				
			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>