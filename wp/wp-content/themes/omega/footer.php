<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the class=site-inner div and all content after
 *
 * @package Omega
 */
?>
		<?php do_atomic( 'after_main' ); // omega_after_main ?>

	</div><!-- .site-inner -->

	<?php do_atomic( 'before_footer' ); // omega_before_footer ?>

	<footer class="site-footer row" role="contentinfo" itemscope="itemscope" itemtype="http://schema.org/WPFooter">			

		<?php do_atomic( 'footer' ); // omega_footer ?>					
	
	</footer><!-- .site-footer -->

	<?php do_atomic( 'after_footer' ); // omega_after_footer ?>

</div><!-- .site-container -->

<?php do_atomic( 'after' ); // omega_after ?>

<?php wp_footer(); ?>

</body>
</html>