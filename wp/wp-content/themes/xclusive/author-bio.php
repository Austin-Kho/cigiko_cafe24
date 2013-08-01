<?php
/**
 * XClusive - Template for displaying authro bio.
 *
 * @file author-bio.php
 * @package xclusive 
 * @author Hafid Trujillo
 * @copyright 2013 Xpark Media
 * @license license.txt 
 * @version release: 0.1.0
 * @filesource  wp-content/themes/xclusive/author-bio.php
 * @since available since 0.1.0
 */

  ?>
  <div class="author-info">
	<div class="author-avatar">
		<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'xclusive_author_bio_avatar_size', 74 ) ); ?>
	</div><!-- .author-avatar -->
	<div class="author-description">
		<h3 class="author-title"><?php printf( __( 'About %s', 'xclusive' ), get_the_author() ); ?></h3>
		<p class="author-bio">
			<?php the_author_meta( 'description' ); ?>
			<a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php esc_attr( the_author() ); ?>" rel="author">
				<?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'xclusive' ), get_the_author() ); ?>
			</a>
		</p>
	</div><!-- .author-description -->
  </div><!-- .author-info -->