<?php
/**
 * Page Template
 *
 * @since Penumbra 1.0
 */

get_header(); ?>

		<div id="primary" class="content-area">
			<div id="content" class="site-content" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'page' ); ?>

					<?php if ( isset($penumbra_options['page_comments']) && ($penumbra_options['page_comments']!="") ){ ?><?php } else { ?><?php comments_template('', true); ?><?php } ?>
					
				<?php endwhile; // end of the loop. ?>

			</div><!-- #content .site-content -->
		</div><!-- #primary .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>