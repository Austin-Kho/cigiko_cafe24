<?php
/**
 * The template used for displaying page content in page.php
 *
 * @since Penumbra 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
	<?php if ( is_home() || is_front_page() ) { ?>
		<h2 class="entry-title"><?php the_title(); ?></h2>
	<?php } else { ?>
		<h1 class="entry-title"><?php the_title(); ?></h1>
	<?php } ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'penumbra' ), 'after' => '</div>' ) ); ?>
		<div class="clearfix"></div>
		<?php edit_post_link( __( 'Edit', 'penumbra' ), '<span class="edit-link">', '</span>' ); ?>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
