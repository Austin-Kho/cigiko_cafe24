<?php
/**
 * XClusive - Remplate for displaying archive pages.
 *
 * @file archive.php
 * @package xclusive 
 * @author Hafid Trujillo
 * @copyright 2013 Xpark Media
 * @license license.txt 
 * @version release: 0.1.0
 * @filesource  wp-content/themes/xclusive/archive.php
 * @since available since 0.1.0
 */

  get_header(); ?>

	<section id="primary">
		<div id="content" role="main">
			
            <header class="archive-header">
				<h1 class="archive-title"><?php
					if ( is_day() ) :
						printf( __( 'Daily Archives: %s', 'xclusive' ), '<span>' . get_the_date() . '</span>' );
					elseif ( is_month() ) :
						printf( __( 'Monthly Archives: %s', 'xclusive' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives', 'xclusive' ) ) . '</span>' );
					elseif ( is_year() ) :
						printf( __( 'Yearly Archives: %s', 'xclusive' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives', 'xclusive' ) ) . '</span>' );
					else :
						_e( 'Archives', 'xclusive' );
					endif;
				?></h1>
			</header><!-- .archive-header -->
            
            
            <?php if ( have_posts() ) : ?>
            	
				<?php xclusive_content_nav( 'nav-above' ); ?>

				<?php while ( have_posts() ) : the_post(); ?>
				
					<?php get_template_part( 'content', get_post_format() ); ?>
					
				<?php endwhile; ?>

				<?php xclusive_content_nav( 'nav-below' ); ?>

			<?php else : ?>
			
				<?php get_template_part( 'no-results' ); ?>

			<?php endif; // have_posts() ?>
            
		
		</div><!--#content-->
	</section><!--#primary-->
    
<?php get_sidebar( 'archive' ); ?>
<?php get_footer(); ?>