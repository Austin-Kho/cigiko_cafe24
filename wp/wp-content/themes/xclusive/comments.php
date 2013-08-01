<?php
/**
 * XClusive - Template for displaying comments
 *
 * @file comments.php
 * @package xclusive 
 * @author Hafid Trujillo
 * @copyright 2013 Xpark Media
 * @license license.txt 
 * @version release: 0.1.0
 * @filesource  wp-content/themes/xclusive/comments.php
 * @since available since 0.1.0
 */
 
  if ( post_password_required() )
	return; ?>
   
  <?php xclusive_before_comments() ?> 
  
  <?php $css = ( have_comments() ) ? 'comments-area' : "no-comments" ?>
  
  <div id="comments" class="<?php echo $css ?>">
	<?php if ( have_comments() ) : ?>
    	
        <h2 class="comments-title">
			<?php
				printf( _nx( 'One Comment on &ldquo;%2$s&rdquo;', '%1$s Comments on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'xclusive' ),
					number_format_i18n( get_comments_number() ), '<span>' . esc_html(  get_the_title() ) . '</span>' );
			?>
		</h2>
        
        <ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'       => 'ol',
					'short_ping'  => true,
					'avatar_size' => 76,
					'callback' => 'xclusive_comment_list'
				) );
			?>
		</ol><!-- .comment-list -->
        
        <?php
			// Are there comments to navigate through?
			if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
		?>
        <nav class="navigation comment-navigation" role="navigation">
			<h1 class="screen-reader-text section-heading"><?php _e( 'Comment navigation', 'xclusive' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'xclusive' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'xclusive' ) ); ?></div>
		</nav><!-- .comment-navigation -->
        <?php endif; // Check for comment navigation ?>
        
        <?php if ( ! comments_open() && get_comments_number() ) : ?>
		<p class="no-comments"><?php _e( 'Comments are closed.' , 'xclusive' ); ?></p>
		<?php endif; ?>

        
    <?php endif; // have_comments() ?>
    <br class="clear" />
  </div><!--#comments-->
  
  <?php xclusive_after_comments() ?> 
  
  <?php comment_form(); ?>
