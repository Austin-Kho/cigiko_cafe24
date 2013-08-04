<?php
/**
 * @package Omega
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
		<?php
		if (is_multi_author()) {
			echo apply_atomic_shortcode( 'entry_byline', '<div class="entry-meta">' . __( 'Posted by [entry-author] on [entry-published] [entry-comments-link before=" | "] [entry-edit-link before=" | "]', 'omega' ) . '</div>' );
		} else {
			echo apply_atomic_shortcode( 'entry_byline', '<div class="entry-meta">' . __( 'Posted on [entry-published] [entry-comments-link before=" | "] [entry-edit-link before=" | "]', 'omega' ) . '</div>' );	
		}
		?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>		
		<?php wp_link_pages( array( 'before' => '<p class="page-links">' . '<span class="before">' . __( 'Pages:', 'omega' ) . '</span>', 'after' => '</p>' ) ); ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php echo apply_atomic_shortcode( 'entry_meta', '<div class="entry-meta">' . __( '[entry-terms taxonomy="category" before="Posted in: "] [entry-terms before="| Tagged: "]', 'celebrate' ) . '</div>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->