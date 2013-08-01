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

jQuery(function(e){var t=0,n=e("#headimg"),r=n.find(".slide").length,i=n.find(".show-next"),s=n.find(".show-prev").addClass("disabled");if(r<1)i.addClass("disabled");i.on("click",function(i){i.preventDefault();if(t<0||e(this).hasClass("disabled"))return;if(t+1>=r-1)e(this).addClass("disabled");e(".slide:eq("+t+")",n).stop(true,true).animate({opacity:0},500,function(){t++;s.removeClass("disabled")})});s.on("click",function(s){s.preventDefault();if(t>r||e(this).hasClass("disabled"))return;if(t<=1)e(this).addClass("disabled");t--;e(".slide:eq("+t+")",n).stop(true,true).animate({opacity:1},500,function(){i.removeClass("disabled")})})})