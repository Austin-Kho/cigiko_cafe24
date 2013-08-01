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
 
(function(e){e(".window-scroll-up").on("click",function(){e("html,body").animate({scrollTop:e("#header").offset().top-30});return false});(function(){$collapse_link=e("a.collapse-sidebar").show();var t=function(){$sidebar=e("#secondary .sidebar-inner");$label=$collapse_link.attr("data-label");$collapse_link.attr({title:$label,"data-label":$collapse_link.html()}).html($label);if($sidebar.is(":hidden")){$sidebar.show();window.name=false;e("body").addClass("sidebar")}else{$sidebar.hide();window.name="hidden";e("body").removeClass("sidebar")}return false};if(window.name=="hidden")t();$collapse_link.on("click",t)})();(function(){var t=e("#main-nav");if(!t[0])return;var n=t.find(".menu-toggle");if(!n[0])return;var r=t.find(".main-menu");if(!r||!r.children().length){n.hide();return}e(".menu-toggle").on("click",function(){t.toggleClass("show-menu")})})();(function(){is_rtl=e("body.rtl")[0];$menu=e('#main-nav ul li:has("ul")').addClass("submenu");$menu.find(" > a").on("keydown",function(t){var n=t.keyCode?t.keyCode:t.which;if(n==40){e(this).parent().addClass("show-submenu");return false}else if(n==39&&is_rtl){e(this).parent().removeClass("show-submenu");return false}else if(n==39&&!is_rtl){e(this).parent().addClass("show-submenu");return false}else if(n==37&&is_rtl){e(this).parent().addClass("show-submenu");return false}else if(n==37&&!is_rtl){e(this).parent().removeClass("show-submenu");return false}else if(n==37||n==38){e(this).parent().removeClass("show-submenu");return false}})})()})(jQuery)