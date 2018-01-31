/**
 * adding "smaller" class for the top fixed nav
 */


jQuery(document).ready( function($) {

	$(window).scroll(function() {
		var scroll = $(window).scrollTop();

		if (scroll >= 2) {
			$('header.site-header').addClass('smaller');
		} else {
			$('header.site-header').removeClass('smaller');
		}
	});


	var stickyNavTop = $('.main-navigation').offset().top;

	var stickyNav = function(){
		var scrollTop = $(window).scrollTop();

		if (scrollTop > stickyNavTop) {
			$('.main-navigation-sticky').addClass('show');
		} else {
			$('.main-navigation-sticky').removeClass('show');
		}
	};

	stickyNav();

	$(window).scroll(function() {
		stickyNav();
	});

});
