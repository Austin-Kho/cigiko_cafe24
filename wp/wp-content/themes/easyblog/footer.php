<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package EasyBlog
 */

?>

<footer class="dt-footer">
	<div class="dt-footer-bar">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6">
					<div class="dt-copyright">
						<?php _e( 'Copyright &copy;', 'easyblog' ); ?> <?php echo date( 'Y' ); ?> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo( 'name' ); ?>"><?php bloginfo( 'name' ); ?></a><?php _e( '. All rights reserved.', 'easyblog' )?>

					</div><!-- .dt-copyright -->
				</div><!-- .col-lg-6 -->

                <div class="col-lg-6 col-md-6">
                    <div class="dt-footer-designer">
	                    <?php do_action('easyblog_theme_info'); ?>
                    </div>
                </div>
			</div><!-- .row -->
		</div><!-- .container -->
	</div><!-- .dt-footer-bar -->
</footer><!-- .dt-footer -->

<a id="back-to-top" class="transition35"><i class="fa fa-angle-up"></i></a><!-- #back-to-top -->

<?php wp_footer(); ?>

</body>
</html>
