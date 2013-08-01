/**
 * XClusive - primary js functions 
 *
 * @file xclusive.js
 * @package xclusive 
 * @author Hafid Trujillo
 * @copyright 2013 Xpark Media
 * @license license.txt 
 * @version release: 0.1.0
 * @filesource  wp-content/plugins/image-store/_js/xclusive.js
 * @since available since 0.1.0
 */
 
( function( $ ) {
	
	/**
	 *  Scroll to top of the window
	 */
	$( '.window-scroll-up' ).on( 'click', function( ){
		$( "html,body" ).animate({ scrollTop: ( $('#header').offset( ).top -30 ) });
		return false;
	});
	
	
	/**
	 * Hide / show sidebar 
	 */
	( function(){
		
		$collapse_link = $( 'a.collapse-sidebar' ).show();
		var xclisive_sibar_toggle = function(){
			
			$sidebar = $( '#secondary .sidebar-inner' );
			$label = $collapse_link.attr( 'data-label' );
			
			$collapse_link.attr( {
				'title': $label,
				'data-label': $collapse_link.html()
			} ).html( $label );
			
			if( $sidebar.is( ':hidden' ) ){
				$sidebar.show();
				window.name = false;
				$('body').addClass( 'sidebar' );
			} else {
				$sidebar.hide();
				window.name = 'hidden';
				$('body').removeClass( 'sidebar' );
			}
			
			return false;
		}

		if( window.name == 'hidden'  )
			xclisive_sibar_toggle( );
		
		$collapse_link.on( 'click', xclisive_sibar_toggle );
	} )();
	
	 
	/**
	 * Enables menu toggle for small screens.
	 */
	( function() {
		
		var nav = $( '#main-nav' );
		if ( ! nav[0] )
			return;
		
		var button = nav.find( '.menu-toggle' );
		if ( ! button[0] )
			return;
		
		var menu = nav.find( '.main-menu' );
		if ( ! menu || ! menu.children().length ) {
			button.hide();
			return;
		}
		
		$( '.menu-toggle' ).on( 'click', function() {
			nav.toggleClass( 'show-menu' );
		} );
	} )();
	
	
	/**
	 * Show main menu using keyboard
	 */
	( function() {
		
		is_rtl 	= $( 'body.rtl' )[0];
		$menu 	= $( '#main-nav ul li:has("ul")' ).addClass('submenu');
		
		$menu .find( ' > a' ).on( 'keydown', function(e) {
			var code = ( e.keyCode ? e.keyCode : e.which );
			
			// arrow down
			if( code == 40  ){
				$( this ).parent().addClass( 'show-submenu' );
				return false;
			
			// arrow left, right to left
			} else if(  code == 39 && is_rtl ) {
				$( this ).parent().removeClass( 'show-submenu' );
				return false;
				
			// arrow left 
			} else if ( code == 39 &&  ! is_rtl ) {
				$( this ).parent().addClass( 'show-submenu' );
				return false;
			
			// arrow right, right to left
			} else if(  code == 37 && is_rtl ) {
				$( this ).parent().addClass( 'show-submenu' );
				return false;
			
			// arrow right
			} else if(  code == 37 && ! is_rtl ) {
				$( this ).parent().removeClass( 'show-submenu' );
				return false;
				
			// arrow up
			} else if ( code == 37 ||  code == 38 ){
				$( this ).parent().removeClass( 'show-submenu' );
				return false;
			}
		});
	} )();


} )( jQuery );