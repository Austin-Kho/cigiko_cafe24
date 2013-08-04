<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Omega
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>  itemscope="itemscope" itemtype="http://schema.org/CreativeWork">
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<p class="page-links">' . '<span class="before">' . __( 'Pages:', 'omega' ) . '</span>', 'after' => '</p>' ) ); ?>
		<?php echo apply_atomic_shortcode( 'entry_meta', '<div class="entry-meta">[entry-edit-link]</div>' ); ?>
	</div><!-- .entry-content -->

</article><!-- #post-## -->