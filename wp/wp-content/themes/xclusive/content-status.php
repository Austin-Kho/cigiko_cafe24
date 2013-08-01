<?php
/**
 * XClusive -  main template for displaying the status post format
 *
 * @file content-status.php
 * @package xclusive 
 * @author Hafid Trujillo
 * @copyright 2013 Xpark Media
 * @license license.txt 
 * @version release: 0.1.0
 * @filesource  wp-content/themes/xclusive/content-status.php
 * @since available since 0.1.0
 */
 ?>
 	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<div class="entry-content">
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'xclusive' ) ); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( '<span class="page-links-title">Pages:</span>', 'xclusive' ), 'after' => '</div>' ) ); ?>
		</div><!-- .entry-content -->
         
        <footer class="entry-meta">
			<?php xclusive_entry_meta( ); ?> 
            <?php edit_post_link( __( 'Edit', 'xclusive' ), '<span class="edit-link">', '</span>' ); ?>
            
		   	<?php if ( is_single() ) : ?>
            
              <?php if ( get_the_author_meta( 'description' ) && is_multi_author() ) : ?>
                  <?php get_template_part( 'author-bio' ); ?>
              <?php endif; ?>
              
            <?php else: ?>
            
           		<?php xclusive_read_more( __( 'More info', 'xclusive') ); ?>  
                <br class="clear" />
           	<?php endif; // is_single() ?>
		</footer><!-- .entry-meta -->
        
	</article><!-- #post-<?php the_ID(); ?> -->