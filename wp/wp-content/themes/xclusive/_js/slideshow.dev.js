/**
 * XClusive - slideshow js functions 
 *
 * @file slideshow.js
 * @package xclusive 
 * @author Hafid Trujillo
 * @copyright 2013 Xpark Media
 * @license license.txt 
 * @version release: 0.1.0
 * @filesource  wp-content/plugins/image-store/_js/slideshow.js
 * @since available since 0.1.0
 */

jQuery( function($) {
	
	var index 	= 0,
	$slider 		= $( "#headimg" ),
	count		= $slider.find('.slide').length,
	$next 		= $slider.find( '.show-next' ),
    $prev 		= $slider.find( '.show-prev' ).addClass( 'disabled' );
	
	if( count < 1 )
		$next.addClass( 'disabled' );
	
	// view previous image
	$next.on( 'click', function(e){
		
		e.preventDefault();
		if( index < 0 || $(this).hasClass( 'disabled' ) )
			return;
		
		if( (index+1) >= (count-1) )
			$(this).addClass( 'disabled' );
				
		$( '.slide:eq(' + index +')', $slider )
		.stop(true,true)
		.animate({ opacity: 0}, 500, function(){
			index++;
			$prev.removeClass( 'disabled' );
		});
		
	});
	
	// view next image
	$prev.on( 'click', function(e){
		
		e.preventDefault();
		if( index > count  || $(this).hasClass( 'disabled' ) )
			return;
		
		if( index <= 1 )
			$(this).addClass( 'disabled' );
		
		index--;
		
		$( '.slide:eq(' + index +')', $slider )
		.stop(true,true)
		.animate({ opacity: 1}, 500, function(){
			$next.removeClass( 'disabled' );
		});
		
	});
	
});