<?php
/**
 * XClusive - Template for displaying audio post format
 *
 * @file content-audio.php
 * @package xclusive 
 * @author Hafid Trujillo
 * @copyright 2013 Xpark Media
 * @license license.txt 
 * @version release: 0.1.0
 * @filesource  wp-content/themes/xclusive/content-audio.php
 * @since available since 0.1.0
 */
 ?>
 	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        
        <header class="entry-header">
        	<?php if ( is_single() ) : ?>
			<h1 class="entry-title"><?php the_title(); ?></h1>
			<?php else : ?>
            <h2 class="entry-title">
				<a href="<?php the_permalink(); ?>" title="<?php echo 
				esc_attr( sprintf( __( 'Permalink to %s', 'xclusive' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
			</h2>
			<?php endif; // is_single() ?>
            
            <div class="entry-meta">
				<?php xclusive_entry_meta( ); ?> 
                <?php edit_post_link( __( 'Edit', 'xclusive' ), '<span class="edit-link">', '</span>' ); ?>
            </div><!-- .entry-meta -->
       	</header><!-- .entry-header -->
        	
		<div class="entry-content">
        	<div class="audio-border">
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'xclusive' ) ); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( '<span class="page-links-title">Pages:</span>', 'xclusive' ), 'after' => '</div>' ) ); ?>
			</div><!--.audio-border-->
        </div><!-- .entry-content -->         
         
        <footer class="entry-meta">
			<?php xclusive_entry_tax(); ?> 
            <?php if ( is_single() && get_the_author_meta( 'description' ) && is_multi_author() ) : ?>
				<?php get_template_part( 'author-bio' ); ?>
			<?php else: ?>
           		<?php xclusive_read_more( __('More info', 'xclusive') ); ?>
				<br class="clear" />
            <?php endif; // is_single() ?>
		</footer><!-- .entry-meta -->
        
	</article><!-- #post-<?php the_ID(); ?> -->