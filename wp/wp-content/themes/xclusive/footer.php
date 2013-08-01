<?php
/**
 * XClusive - Footer Template
 *
 * @file footer.php
 * @package xclusive
 * @author Hafid Trujillo
 * @copyright 2013 Xpark Media
 * @license license.txt 
 * @version release: 0.1.0
 * @filesource  wp-content/themes/xclusive/footer.php
 * @since available since 0.1.0
 */
?>
		
		<br class="clear" />
		<?php xclusive_after_content(); ?>
	</div><!--#main-->
	
	<?php xclusive_before_footer(); ?>
	
	<footer id="colophon" role="contentinfo">
		
		<nav id="footer-nav" role="navigation">
			<?php wp_nav_menu( array( 'theme_location' => 'footer', 'menu_class' => 'footer-menu' ) ); ?>
		</nav><!--#top-nav-->
	
		<div id="site-credits">
			<?php xclusive_before_credits(); ?>
           	<?php printf(  __( '<span class="powered">%1$s</span> <a href="%2$s" title="%3$s">%3$s</a>', 'xclusive' ),
				esc_attr( 'Powered by', 'xclusive' ),
				esc_url( __( 'http://wordpress.org/', 'xclusive' ) ),
				esc_attr( 'WordPress', 'xclusive' )
			); ?>
		</div>
	</footer><!--#colophon-->
</div><!--#page .hfeed-->

<?php xclusive_after_page(); ?>

<?php wp_footer(); ?>
</body>
</html>