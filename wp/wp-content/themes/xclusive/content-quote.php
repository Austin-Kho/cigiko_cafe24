<?php
/**
 * XClusive -  main template for displaying the quote post format
 *
 * @file content-quote.php
 * @package xclusive 
 * @author Hafid Trujillo
 * @copyright 2013 Xpark Media
 * @license license.txt 
 * @version release: 0.1.0
 * @filesource  wp-content/themes/xclusive/content-quote.php
 * @since available since 0.1.0
 */
 ?>
 	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<div class="entry-content">
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'xclusive' ) ); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( '<span class="page-links-title">Pages:</span>', 'xclusive' ), 'after' => '</div>' ) ); ?>
		</div><!-- .entry-content -->
         
        <footer class="entry-meta">
			<?php xclusive_entry_date( ); ?> 
            <?php edit_post_link( __( 'Edit', 'xclusive' ), '<span class="edit-link">', '</span>' ); ?>
            
			<?php if ( comments_open() && ! is_single() ) : ?>
                <span class="comments-link">
                <?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a comment', 'xclusive' ) . '</span>', __( 'One comment so far', 'xclusive' ), __( 'View all % comments', 'xclusive' ) ); ?>
                </span><!-- .comments-link -->
                
            <?php else: // comments_open() ?>
           		<?php xclusive_read_more( __( 'More info', 'xclusive') ); ?> 
				<br class="clear" />
            <?php endif; // comments_open() ?>
		</footer><!-- .entry-meta -->
        
	</article><!-- #post-<?php the_ID(); ?> -->