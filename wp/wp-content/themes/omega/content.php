<?php
/**
 * @package Omega
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">	
	<header class="entry-header">
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php 
			if (is_multi_author()) {
				echo apply_atomic_shortcode( 'entry_byline', __( 'Posted by [entry-author] ', 'omega' ) ); 
			} else {
				echo apply_atomic_shortcode( 'entry_byline', __( 'Posted ', 'omega' ) ); 
			}?>
			<?php
			if (get_the_title()!='') {
				echo apply_atomic_shortcode( 'entry_byline', __( 'on [entry-published] [entry-comments-link before=" | "] [entry-edit-link before=" | "]', 'omega' ) ); 
			} else {
				echo apply_atomic_shortcode( 'entry_byline', sprintf( __( 'on <a href="%s">[entry-published]</a> [entry-comments-link before=" | "] [entry-edit-link before=" | "]', 'omega' ), get_permalink()) ); 
			}
			?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">		
		<?php 
		if ( has_post_thumbnail() ) {
		?>
			<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_post_thumbnail();?></a>
		<?php
		}
		?>
		<?php the_content(); ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php echo apply_atomic_shortcode( 'entry_meta', '<div class="entry-meta">' . __( '[entry-terms taxonomy="category" before="Posted in: "] [entry-terms before="| Tagged: "]', 'celebrate' ) . '</div>' ); ?>
	</footer><!-- .entry-meta -->
</article><!-- #post-## -->
