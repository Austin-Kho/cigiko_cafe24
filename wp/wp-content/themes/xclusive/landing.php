<?php
/**
 * XClusive - Landing page Template
 * template name: Landing
 *
 * @file landing.php
 * @package xclusive 
 * @author Hafid Trujillo
 * @copyright 2013 Xpark Media
 * @license license.txt 
 * @version release: 0.1.0
 * @filesource  wp-content/themes/xclusive/landing.php
 * @since available since 0.1.0
 
  Note: You can overwrite front-page.php as well as any other Template in Child Theme.
  @see http://codex.wordpress.org/Child_Themes
 */

  get_header(); ?>

	<section id="primary">
		<div id="content" role="main">
			
			<section id="landing-section-1" class="widgets-landing">
				<?php if( ! dynamic_sidebar( 'landing-1' ) ) {
					the_widget( 'WP_Widget_Text', 
						array( 'text' => __( '<h1>Headline using a text widget and &lt;h1&gt; tag</h1> 
						<h2>Subheadline using &lt;h2&gt; tag</h2> 
						Or add any other widget using the "Landing Widget Area 1" in the widget admin page.', 'xclusive' )), 
						array( 'before_widget' => '<aside class="widget widget_text default-headlines">', 'after_widget' => '</aside>' )
					);
					the_widget( 'WP_Widget_Text', 
						array( 'text' => '<img src="' . esc_url( get_template_directory_uri() ) . '/_img/responsive.png" alt="' . __( 'Landing Image',  'xclusive' ) .'" />' .
						__( '<small>Add an image using a text widget and the &lt;img&gt; tag</small>', 'xclusive' )), 
						array( 'before_widget' => '<aside class="widget widget_text default-image">', 'after_widget' => '</aside>' )
					);
				}
				?>
			</section><!--#landing-section-1-->
			
			<section id="landing-section-2" class="widgets-landing">
				<?php if( ! dynamic_sidebar( 'landing-2' ) ) 
					the_widget( 'WP_Widget_Text', 
						array( 'text' => 	__( 'Landing Widget Area 2: To completely remove this text, the headlines above, or widgets bellow add an empty text widget. The widgets bellow are located in the "Landing Widget Area 3" area.', 'xclusive' )),
						array( 'before_widget' => '<aside class="widget widget_text default-landing-1">', 'after_widget' => '</aside>' )
					);
				?>
			</section><!--#landing-section-2-->
			
			<section id="landing-section-3" class="widgets-landing">
				<?php if( ! dynamic_sidebar( 'landing-3' ) ) {
					the_widget( 'WP_Widget_Recent_Posts', 
						array( 'before_widget' => '<aside class="widget widget_text default-landing-3">', 'after_widget' => '</aside>' )
					);
					the_widget( 'WP_Widget_Meta', 
						array( 'before_widget' => '<aside class="widget widget_meta default-landing-3">', 'after_widget' => '</aside>' )
					);
					the_widget( 'WP_Widget_Calendar',
						array( 'before_widget' => '<aside class="widget widget_calendar default-landing-3">', 'after_widget' => '</aside>' )
					);
				}
				?>
			</section><!--#landing-section-3-->
		
		</div><!--#content-->
	</section><!--#primary-->

<?php get_footer(); ?>