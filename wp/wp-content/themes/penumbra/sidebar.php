<?php
/**
 * Sidebar Template
 *
 * @since Penumbra 1.0
 */
?>
<?php //Retrieve Theme Options Data
global $penumbra_options;
$penumbra_options = get_option('penumbra_theme_options'); ?>

<?php if ( isset($penumbra_options['enable_socials']) && ($penumbra_options['enable_socials']!="") ){ ?>
		<div id="socials" class="widget-area" role="supplementary">

				<aside id="socialbuttons" class="widget">
					<h3 class="widget-title"><?php echo (stripslashes ($penumbra_options['socials_title'])); ?></h3>
					<a href="<?php if($penumbra_options['feedburner'] != '') { echo esc_url($penumbra_options['feedburner']); } else { bloginfo('rss2_url'); } ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/rss.png" title="<?php _e('RSS Feed', 'penumbra'); ?>" alt="<?php _e('RSS Feed', 'penumbra'); ?>" /></a>
					<?php if (!empty($penumbra_options['facebook'] ) ): ?>
					<a target="_blank" rel="nofollow" href="<?php echo esc_url($penumbra_options['facebook']); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/facebook.png" title="<?php _e('Follow us on Facebook', 'penumbra'); ?>" alt="<?php _e('Follow us on Facebook', 'penumbra'); ?>" /></a>
					<?php endif; ?>
					<?php if (!empty($penumbra_options['twitter'] )) : ?>
					<a target="_blank" rel="nofollow" href="<?php echo esc_url($penumbra_options['twitter']); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/twitter.png" title="<?php _e('Follow us on Twitter', 'penumbra'); ?>" alt="<?php _e('Follow us on Twitter', 'penumbra'); ?>" /></a>
					<?php endif; ?>
					<?php if (!empty($penumbra_options['linkedin'] )) : ?>
					<a target="_blank" rel="nofollow" href="<?php echo esc_url($penumbra_options['linkedin']); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/linkedin.png" title="<?php _e('Follow us on LinkedIn', 'penumbra'); ?>" alt="<?php _e('Follow us on LinkedIn', 'penumbra'); ?>" /></a>
					<?php endif; ?>
					<?php if (!empty($penumbra_options['google'] )) : ?>
					<a target="_blank" rel="nofollow" href="<?php echo esc_url($penumbra_options['google']); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/google.png" title="<?php _e('Follow us on Google', 'penumbra'); ?>" alt="<?php _e('Follow us on Google', 'penumbra'); ?>" /></a>
					<?php endif; ?>
					<?php if (!empty($penumbra_options['reddit'] )) : ?>
					<a target="_blank" rel="nofollow" href="<?php echo esc_url($penumbra_options['reddit']); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/reddit.png" title="<?php _e('Follow us on Reddit', 'penumbra'); ?>" alt="<?php _e('Follow us on Reddit', 'penumbra'); ?>" /></a>
					<?php endif; ?>
					<?php if (!empty($penumbra_options['youtube'] )) : ?>
					<a target="_blank" rel="nofollow" href="<?php echo esc_url($penumbra_options['youtube']); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/youtube.png" title="<?php _e('Follow us on YouTube', 'penumbra'); ?>" alt="<?php _e('Follow us on YouTube', 'penumbra'); ?>" /></a>
					<?php endif; ?>
					<?php if (!empty($penumbra_options['flicker'] )) : ?>
					<a target="_blank" rel="nofollow" href="<?php echo esc_url($penumbra_options['flicker']); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/flicker.png" title="<?php _e('Follow us on Flicker', 'penumbra'); ?>" alt="<?php _e('Follow us on Flicker', 'penumbra'); ?>" /></a>
					<?php endif; ?>
					<?php if (!empty($penumbra_options['stumbleupon'] )) : ?>
					<a target="_blank" rel="nofollow" href="<?php echo esc_url($penumbra_options['stumbleupon']); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/stumbleupon.png" title="<?php _e('Follow us on StumbleUpon', 'penumbra'); ?>" alt="<?php _e('Follow us on StumbleUpon', 'penumbra'); ?>" /></a>
					<?php endif; ?>
				</aside>
		</div><!-- #socials .widget-area -->
<?php } else { ?>
<?php } ?>


		<div id="secondary" class="widget-area" role="complementary">

			<?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>
				<aside id="archives" class="widget">
					<h3 class="widget-title"><?php _e( 'Recent Entries', 'penumbra' ); ?></h3>
					<ul>
						<?php wp_get_archives( 'type=postbypost&limit=10' ); ?>
					</ul>
				</aside>

			<?php endif; // end sidebar widget area ?>
		</div><!-- #secondary .widget-area -->

		<div id="tertiary" class="widget-area" role="supplementary">
			
			<?php if ( ! dynamic_sidebar( 'sidebar-2' ) ) : ?>
				<aside id="meta" class="widget">
					<h3 class="widget-title"><?php _e( 'Meta', 'penumbra' ); ?></h3>
					<ul>
						<?php wp_register(); ?>
						<li><?php wp_loginout(); ?></li>
						<?php wp_meta(); ?>
					</ul>
				</aside>
			<?php endif; // end sidebar widget area ?>
		</div><!-- #tertiary .widget-area -->
