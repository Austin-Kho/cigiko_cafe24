<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @since Penumbra 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content-full-width" class="site-content" role="main">

			<article id="post-0" class="post error404 not-found">
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'Upsy-Daisy! That page can&rsquo;t be found', 'penumbra' ); ?></h1>
				</header><!-- .entry-header -->

				<div class="entry-content">
					<p><?php _e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'penumbra' ); ?></p>
				
					<?php get_search_form(); ?>
					
					<?php
					/* translators: %1$s: smilie */
					$tag_content = '<p>' . sprintf( __( 'You might find these links helpful. %1$s', 'penumbra' ), convert_smilies( ':)' ) ) . '</p>';
					the_widget( 'WP_Widget_Tag_Cloud', array( 'title' => __( 'Popular tags','penumbra' ) ),"after_title=</h2>$tag_content" );
					?>

				</div><!-- .entry-content -->
			</article><!-- #post-0 .post .error404 .not-found -->

		</div><!-- #content .site-content -->
	</div><!-- #primary .content-area -->
<?php get_footer(); ?>