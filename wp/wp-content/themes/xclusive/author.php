<?php
/**
 * XClusive - Template for displaying author pages.
 *
 * @file author.php
 * @package xclusive 
 * @author Hafid Trujillo
 * @copyright 2013 Xpark Media
 * @license license.txt 
 * @version release: 0.1.0
 * @filesource  wp-content/themes/xclusive/author.php
 * @since available since 0.1.0
 */

  get_header(); ?>
  
  	<section id="primary">
		<div id="content" role="main">
        
         <?php if ( have_posts() ) : the_post(); ?>
         
         <header class="archive-header">
            <h1 class="archive-title"><?php printf( __( 'Author: %s', 'xclusive' ), sprintf( 
				'<span class="vcard"><a href="%1$s" class="url fn n" title="%2$s" rel="me">%3$s</a></span>',
				esc_url( get_author_posts_url( get_the_author_meta( "ID" ) ) ),
				esc_attr( get_the_author() ),
				esc_html( get_the_author() )
			) ); ?></h1>
        </header><!-- .archive-header -->
        
        <?php 
		// We moved one post down on previous call we must rewind the loop 
		// to properly display all the author's content 
			rewind_posts(); 
		?>
        
        <?php
		if ( get_the_author_meta( 'description' ) ) : ?>
		<div class="author-info">
			<div class="author-avatar">
				<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'xclusive_author_bio_avatar_size', 60 ) ); ?>
			</div><!-- .author-avatar -->
			<div class="author-description">
				<h3 class="author-title"><?php printf( __( 'About %s', 'xclusive' ), get_the_author() ); ?></h3>
				<p><?php the_author_meta( 'description' ); ?></p>
			</div><!-- .author-description	-->
		</div><!-- .author-info -->
		<?php endif; ?>
        
        <?php xclusive_content_nav( 'nav-above' ); ?>

		<?php while ( have_posts() ) : the_post(); ?>
            <?php get_template_part( 'content', get_post_format() ); ?>
        <?php endwhile; ?>

        <?php xclusive_content_nav( 'nav-below' ); ?>

        <?php endif; // have_posts() ?>
            
        </div><!--#content-->
	</section><!--#primary-->

<?php get_sidebar( 'author' ); ?>
<?php get_footer(); ?>