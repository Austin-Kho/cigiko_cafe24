<?php
/**
 * XClusive - Template for displaying category archive pages.
 *
 * @file category.php
 * @package xclusive 
 * @author Hafid Trujillo
 * @copyright 2013 Xpark Media
 * @license license.txt 
 * @version release: 0.1.0
 * @filesource  wp-content/themes/xclusive/category.php
 * @since available since 0.1.0
 */

  get_header(); ?>
  
  	<section id="primary">
		<div id="content" role="main">
        
        	<?php if ( have_posts() ) : ?>
            
           <header class="archive-header">
				<h1 class="archive-title"><?php printf( __( 'Category: %s', 'xclusive' ), '<span>' . single_cat_title( '', false ) . '</span>' ); ?></h1>

				<?php if ( category_description() ) : ?>
				<div class="archive-meta"><?php echo category_description(); ?></div>
				<?php endif; ?>
			</header><!-- .archive-header -->
            
                        
            <?php xclusive_content_nav( 'nav-above' ); ?>
			
			<?php while ( have_posts() ) : the_post(); ?>
			
				<?php get_template_part( 'content', get_post_format() ); ?>
				
			<?php endwhile; ?>
			
			<?php xclusive_content_nav( 'nav-below' ); ?>
            
            <?php else : ?>
            
            	<?php get_template_part( 'no-results' ); ?>
                
            <?php endif; ?>
            
        </div><!--#content-->
	</section><!--#primary-->

<?php get_sidebar( 'category' ); ?>
<?php get_footer(); ?>
