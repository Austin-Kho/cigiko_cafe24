<?php
/**
 * XClusive - Site front page template
 *
 * @file front-page.php
 * @package xclusive 
 * @author Hafid Trujillo
 * @copyright 2013 Xpark Media
 * @license license.txt 
 * @version release: 0.1.0
 * @filesource  wp-content/themes/xclusive/front-page.php
 * @since available since 0.1.0
 
  Note: You can overwrite front-page.php as well as any other Template in Child Theme.
  @see http://codex.wordpress.org/Child_Themes
 */
 
  //show landing template 
  if( xclusive_using_landing_template( ) ) 
 	
	get_template_part( 'landing' );

  else // else show default display
  
  	get_template_part( 'index' );
  ?>
