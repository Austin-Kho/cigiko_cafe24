<?php
/**
 * Footer Template
 *
 * @since Penumbra 1.0
 */
?>
<?php //Retrieve Theme Options Data
global $penumbra_options;
$penumbra_options = get_option('penumbra_theme_options');?>
	</div><!-- #main .site-main -->

	<footer id="colophon" class="site-footer" role="contentinfo">
			<?php
				/* Display the footer widgets if active and not the 404 page and search page.
				 */
				if ( ! is_404() && ! is_search() ) { ?>
		<div id="footleft" class="widget-area" role="complementary">

			<?php if ( ! dynamic_sidebar( 'footer-left' ) ) : ?>

				<aside id="archives" class="widget">
					<h3 class="widget-title"><?php _e( 'Archives', 'penumbra' ); ?></h3>
					<ul>
						<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
					</ul>
				</aside>

			<?php endif; // end footer widget area ?>
		</div><!-- #footleft .widget-area -->
		
		<div id="footmiddle" class="widget-area" role="complementary">

			<?php if ( ! dynamic_sidebar( 'footer-middle' ) ) : ?>

				<aside id="meta" class="widget">
					<h3 class="widget-title"><?php _e( 'Pages', 'penumbra' ); ?></h3>
						<ul>
						<?php wp_list_pages( 'title_li=' ); ?>
						</ul>
				</aside>

			<?php endif; // end footer widget area ?>
		</div><!-- #footmiddle .widget-area -->
		
		<div id="footright" class="widget-area" role="complementary">

			<?php if ( ! dynamic_sidebar( 'footer-right' ) ) : ?>

				<aside id="archives" class="widget">
					<h3 class="widget-title"><?php _e( 'Blogroll', 'penumbra' ); ?></h3>
						<ul>
						<?php wp_list_bookmarks( 'title_li=&categorize=0' ); ?>
						</ul>
				</aside>

			<?php endif; // end footer widget area ?>
		</div><!-- #footright .widget-area -->
	<div class="clearfix"></div>
			<?php } ?>

		<div class="site-info">
		<div class="foottxt">
			<?php if(!empty($penumbra_options['footer_text'])) { ?><?php echo(stripslashes ($penumbra_options['footer_text'])); ?><?php } ?><br />
		</div><!-- .foottxt -->
		<div class="copyright">
			<?php esc_attr_e('&copy;', 'penumbra'); ?> <?php _e(date('Y')); ?> <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>"><?php bloginfo('name'); ?></a><br />
		</div><!-- .copyright -->
			<!-- "The link to tutskid.com is completely optional, but if you like the Theme I would appreciate it if you keep the credit link at the bottom." -->
			<?php if( is_home() || is_front_page() ): ?>
			<a href="http://wordpress.org/" title="<?php esc_attr_e( 'WordPress', 'penumbra' ); ?>" rel="generator"><?php printf( __( 'Proudly powered by %s', 'penumbra' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( __( 'Theme: %1$s by %2$s.', 'penumbra' ), 'Penumbra', '<a href="http://tutskid.com/" rel="designer">TutsKid</a>' ); ?>
			<?php else: ?>
			<a href="http://wordpress.org/" title="<?php esc_attr_e( 'WordPress', 'penumbra' ); ?>" rel="generator"><?php printf( __( 'Proudly powered by %s', 'penumbra' ), 'WordPress' ); ?></a>
			<?php endif;?>
		</div><!-- .site-info -->
	</footer><!-- #colophon .site-footer -->
</div><!-- #page .hfeed .site -->

<?php wp_footer(); ?>

</body>
</html>