<?php
/**
 * Theme's standard functions and definitions
 *
 *
 * @file fuctions.php
 * @package xclusive 
 * @author Hafid Trujillo
 * @copyright 2010 - 2012 Xpark Media
 * @license license.txt 
 * @version release: 0.1.0
 * @filesource  wp-content/themes/xclusive/_inc/fuctions.php
 * @since available since 0.1.0
 */
  
  // Avoid direct access
  if ( ! defined( 'ABSPATH' ) ) exit;
  
  
  if ( ! function_exists( 'xclusive_content_nav' ) ) :
  /**
  * Display navigation to next/previous pages when applicable
  * 
  * @return void 
  */
  function xclusive_content_nav(){
	  global $wp_query;

	// Don't print empty markup if there's only one page.
	if ( $wp_query->max_num_pages < 2 && ( is_home() || is_archive() || is_search() ) )
		return;
	?>
	<nav class="navigation paging-navigation" role="navigation">
		<h3 class="screen-reader-text"><?php _e( 'Posts navigation', 'xclusive' ); ?></h3>
		<div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'xclusive' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'xclusive' ) ); ?></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
 
  }
  endif;
  
  
  if ( ! function_exists( 'xclusive_post_nav' ) ) :
  /**
  * Display single post navigation
  *
  * @param string $class class attribute to identify menu location
  * @return void 
  */
  function xclusive_post_nav( $class = '' ){
	  
	 // Don't print empty markup if there's nowhere to navigate.
	$previous 	= ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
	$next     	= get_adjacent_post( false, '', false );

  	if ( ! $next && ! $previous )
		return;
	?>
	<nav class="navigation post-navigation" role="navigation">
		<h3 class="screen-reader-text"><?php _e( 'Post navigation', 'xclusive' ); ?></h3>
		<div class="nav-links">

			<div class="nav-previous"><?php previous_post_link( '%link', _x( '<span class="meta-nav">&larr;</span> %title', 'Previous post link', 'xclusive' ) ); ?></div>
			<div class="nav-next"><?php next_post_link( '%link', _x( '%title <span class="meta-nav">&rarr;</span>', 'Next post link', 'xclusive' ) ); ?></div>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
  }
  endif;
  
   
  if ( ! function_exists( 'xclusive_entry_meta' ) ) :
  /**
  * Display entry metadata information
  *
  * @return void 
  */
  function xclusive_entry_meta(){
 	if ( 'post' != get_post_type() )
		return;
	
	if(  ! has_post_format( 'link' ) ){
		// Post author
		printf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_attr( sprintf( __( 'View all posts by %s', 'xclusive' ), get_the_author() ) ),
			get_the_author()
		);	
	}
	
	// Post date
	xclusive_entry_date();
  }
  endif;
  
  
  if ( ! function_exists( 'xclusive_entry_date' ) ) :
  /**
  * Display entry post date
  *
  * @return void | string HTML date 
  */
  function xclusive_entry_date( $echo = true ){
 	$date = sprintf( '<span class="date"><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a></span>',
		esc_url( get_permalink() ),
		esc_attr( sprintf( __( 'Permalink to %s', 'xclusive' ), the_title_attribute( 'echo=0' ) ) ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( sprintf( '%2$s' , get_post_format_string( get_post_format() ), get_the_date() ) )
	);
	
	if ( $echo )
		echo $date;

	return $date;
  }
  endif;
  
  
  if ( ! function_exists( 'xclusive_entry_tax' ) ) :
  /**
  * Display entry taxonomy association
  *
  * @return void 
  */
  function xclusive_entry_tax(){
	  
	// Translators: used between list items, there is a space after the comma.
	if ( $categories_list = get_the_category_list( __( ', ', 'xclusive' ) )  ) 
		$categories_list = '<span class="categories-links">' . $categories_list . '</span>';

	// Translators: used between list items, there is a space after the comma.
	if ( $tag_list = get_the_tag_list( '', __( ', ', 'xclusive' ) ) ) 
		$tag_list = '<span class="tags-links">' . $tag_list . '</span>';
	
	if( $categories_list || $tag_list )
		echo '<span class="tags-label">' . __( 'In', 'xclusive' ) . "</span> " . $categories_list . $tag_list;
 
  }
  endif;
  
  
  if ( ! function_exists( 'xclusive_read_more' ) ) :
  /**
  * Display read more/info/view link at the foooter
  * of each post in a archive list
  *
  * @return void 
  */
  function xclusive_read_more( $text ){
	echo '<a href="' . esc_url( get_permalink() ) . '" title="'. esc_attr( $text . " ". get_the_title() ) .'" class="url read-more" rel="bookmark">' . esc_html( $text ) . '</a>';
  }
  endif;
  
  
  if ( ! function_exists( 'xclusive_the_attached_image' ) ) :
  /**
  * Prints the attached image with a link to the next attached image.
  *
  * @return void 
  */
  function xclusive_the_attached_image(){
	
	$post = get_post();
	$next_attachment_url = wp_get_attachment_url();
	$attachment_size = apply_filters( 'xclusive_attachment_size', array( 724, 724 ) );
	
	$attachments = array_values( get_children( array(
		'post_parent'		=> $post->post_parent,
		'post_status'		=> 'inherit',
		'post_type'		=> 'attachment',
		'post_mime_type' => 'image',
		'order'				=> 'ASC',
		'orderby'			=> 'menu_order ID'
	) ) );

	// If there is more than 1 attachment in a gallery...
	if ( count( $attachments ) > 1 ) {
		foreach ( $attachments as $k => $attachment ) {
			if ( $attachment->ID == $post->ID )
				break;
		}
		$k++;

		// get the URL of the next image attachment...
		if ( isset( $attachments[ $k ] ) )
			$next_attachment_url = get_attachment_link( $attachments[ $k ]->ID );

		// or get the URL of the first image attachment.
		else
			$next_attachment_url = get_attachment_link( $attachments[0]->ID );
	}

	printf( '<a href="%1$s" title="%2$s" rel="attachment">%3$s</a>',
		esc_url( $next_attachment_url ) . "#content",
		the_title_attribute( array( 'echo' => false ) ),
		wp_get_attachment_image( $post->ID, $attachment_size )
	);
  }
  endif;
  
  
  if ( ! function_exists( 'xclusive_comment_list' ) ) :
  /**
  * @param object $comment Comment to display.
  * @param array $args Optional args.
  * @param int $depth Depth of comment.
  */
  function xclusive_comment_list( $comment, $args, $depth ){
	$tag = ( 'div' === $args['style'] ) ? 'div' : 'li';
	?>
	<<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?>>
		<article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
			
			<header class="comment-meta">
				<div class="comment-author vcard">
				<?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
				<?php printf( __( '%s <span class="says">says:</span>' ), sprintf( '<b class="fn">%s</b>', get_comment_author_link() ) ); ?>
				</div><!--.comment-author-->
				
				<div class="comment-metadata">
					<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>" rel="bookmark">
						<time datetime="<?php esc_attr( comment_time( 'c' ) ); ?>"><?php printf( _x( '%1$s at %2$s', '1: date, 2: time', 'xclusive' ), get_comment_date(), get_comment_time() ); ?></time>
					</a>
					<?php edit_comment_link( __( 'Edit', 'xclusive' ), '<span class="edit-link">', '</span>' ); ?>
				</div><!-- .comment-metadata -->
			</header><!-- .comment-meta -->
	
			<div class="comment-content">
				<?php comment_text(); ?>
			</div><!-- .comment-content -->
			
			<footer class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'add_below' => 'div-comment', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</footer><!-- .reply -->

		</article><!-- .comment-body -->
	<?php
  }
  endif;
  
   
  if ( ! function_exists( 'xclusive_before_page' ) ) :
  /**
  * Just before opening <div id="page">
  * 
  * @see header.php
  * @return void 
  */
  function xclusive_before_page(){
	    do_action( 'xclusive_before_page' );
  }
  endif;
  
  
  if ( ! function_exists( 'xclusive_after_page' ) ) :
  /**
  * Just after closing </div><!--#page .hfeed-->
  * 
  * @see footer.php
  * @return void 
  */
  function xclusive_after_page(){
	    do_action( 'xclusive_after_page' );
  }
  endif;
  
  
  if ( ! function_exists( 'xclusive_before_header' ) ) :
  /**
  * Just before opening <div id="header">
  * 
  * @see header.php
  * @return void 
  */
  function xclusive_before_header(){
	    do_action( 'xclusive_before_header' );
  }
  endif;
  
  
  if ( ! function_exists( 'xclusive_after_header' ) ) :
  /**
  * Just after closing </header><!--#header-->
  * 
  * @see header.php
  * @return void 
  */
  function xclusive_after_header(){
	    do_action( 'xclusive_after_header' );
  }
  endif;
  
  
  if ( ! function_exists( 'xclusive_before_footer' ) ) :
  /**
  * Just before opening  <footer id="colophon" >
  * 
  * @see footer.php
  * @return void 
  */
  function xclusive_before_footer(){
	    do_action( 'xclusive_before_footer' );
  }
  endif;
  
  
  if ( ! function_exists( 'xclusive_before_credits' ) ) :
  /**
  * Just before opening  <span class="powered">
  * 
  * @see footer.php
  * @return void 
  */
  function xclusive_before_credits(){
	    do_action( 'xclusive_before_credits' );
  }
  endif;
  
  
  if ( ! function_exists( 'xclusive_before_comments' ) ) :
  /**
  * Just before opening  <div id="comments" >
  * 
  * @see comments.php
  * @return void 
  */
  function xclusive_before_comments(){
	    do_action( 'xclusive_before_comments' );
  }
  endif;
  
  
  if ( ! function_exists( 'xclusive_after_comments' ) ) :
  /**
  * Just after clossing  </div><!--#comments-->
  * 
  * @see comments.php
  * @return void 
  */
  function xclusive_after_comments(){
	    do_action( 'xclusive_after_comments' );
  }
  endif;
  
  
  if ( ! function_exists( 'xclusive_before_content' ) ) :
  /**
  * Just after opening tag  <div id="main" tabindex="0">
  * 
  * @see header.php
  * @return void 
  */
  function xclusive_before_content(){
	    do_action( 'xclusive_before_content' );
  }
  endif;
  
  
  if ( ! function_exists( 'xclusive_after_content' ) ) :
  /**
  * Just before clossing tag  </div><!--#main-->
  * 
  * @see footer.php
  * @return void 
  */
  function xclusive_after_content(){
	    do_action( 'xclusive_after_content' );
  }
  endif;
  
  
  if ( ! function_exists( 'xclusive_before_sidebar_content' ) ) :
  /**
  * Just after opening tag <div class="sidebar-inner">
  * 
  * @see sidebar.php
  * @return void 
  */
  function xclusive_before_sidebar_content(){
	    do_action( 'xclusive_before_sidebar_content' );
  }
  endif;
  
  
  if ( ! function_exists( 'xclusive_after_sidebar_content' ) ) :
  /**
  * Just before clossing tag </div><!--.sidebar-inner-->
  * 
  * @see sidebar.php
  * @return void 
  */
  function xclusive_after_sidebar_content(){
	    do_action( 'xclusive_after_sidebar_content' );
  }
  endif;