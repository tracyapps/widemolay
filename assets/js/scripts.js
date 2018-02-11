/**
 * For ACF's display of google maps.
 */

(function($) {

	/*
	 *  new_map
	 *
	 *  This function will render a Google Map onto the selected jQuery element
	 *
	 *  @type	function
	 *  @date	8/11/2013
	 *  @since	4.3.0
	 *
	 *  @param	$el (jQuery element)
	 *  @return	n/a
	 */

	function new_map( $el ) {

		// var
		var $markers = $el.find('.marker');


		// vars
		var args = {
			zoom		: 16,
			center		: new google.maps.LatLng(0, 0),
			mapTypeId	: google.maps.MapTypeId.ROADMAP
		};


		// create map
		var map = new google.maps.Map( $el[0], args);


		// add a markers reference
		map.markers = [];


		// add markers
		$markers.each(function(){

			add_marker( $(this), map );

		});


		// center map
		center_map( map );


		// return
		return map;

	}

	/*
	 *  add_marker
	 *
	 *  This function will add a marker to the selected Google Map
	 *
	 *  @type	function
	 *  @date	8/11/2013
	 *  @since	4.3.0
	 *
	 *  @param	$marker (jQuery element)
	 *  @param	map (Google Map object)
	 *  @return	n/a
	 */

	function add_marker( $marker, map ) {

		// var
		var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

		// create marker
		var marker = new google.maps.Marker({
			position	: latlng,
			map			: map
		});

		// add to array
		map.markers.push( marker );

		// if marker contains HTML, add it to an infoWindow
		if( $marker.html() )
		{
			// create info window
			var infowindow = new google.maps.InfoWindow({
				content		: $marker.html()
			});

			// show info window when marker is clicked
			google.maps.event.addListener(marker, 'click', function() {

				infowindow.open( map, marker );

			});
		}

	}

	/*
	 *  center_map
	 *
	 *  This function will center the map, showing all markers attached to this map
	 *
	 *  @type	function
	 *  @date	8/11/2013
	 *  @since	4.3.0
	 *
	 *  @param	map (Google Map object)
	 *  @return	n/a
	 */

	function center_map( map ) {

		// vars
		var bounds = new google.maps.LatLngBounds();

		// loop through all markers and create bounds
		$.each( map.markers, function( i, marker ){

			var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

			bounds.extend( latlng );

		});

		// only 1 marker?
		if( map.markers.length == 1 )
		{
			// set center of map
			map.setCenter( bounds.getCenter() );
			map.setZoom( 16 );
		}
		else
		{
			// fit to bounds
			map.fitBounds( bounds );
		}

	}

	/*
	 *  document ready
	 *
	 *  This function will render each map when the document is ready (page has loaded)
	 *
	 *  @type	function
	 *  @date	8/11/2013
	 *  @since	5.0.0
	 *
	 *  @param	n/a
	 *  @return	n/a
	 */
// global var
	var map = null;

	$(document).ready(function(){

		$('.acf-map').each(function(){

			// create map
			map = new_map( $(this) );

		});

	});

})(jQuery);
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

/**
 * scripts for the simple mobile menu
 */

jQuery(document).ready( function($) {
	//Menu button on click event
	$('.mobile-nav-button').on('click', function() {
		// Toggles a class on the menu button to transform the burger menu into a cross
		$( ".mobile-nav-button .mobile-nav-button__line:nth-of-type(1)" ).toggleClass( "mobile-nav-button__line--1");
		$( ".mobile-nav-button .mobile-nav-button__line:nth-of-type(2)" ).toggleClass( "mobile-nav-button__line--2");
		$( ".mobile-nav-button .mobile-nav-button__line:nth-of-type(3)" ).toggleClass( "mobile-nav-button__line--3");

		// Toggles a class that slides the menu into view on the screen
		$('.mobile-menu').toggleClass('mobile-menu--open');
		return false;
	});
});
jQuery(document).ready( function($) {

	//pullquote
	$('span.pullquote.right').each(function(index) {
		var $parentParagraph = $(this).parent('p');
		$parentParagraph.css('position', 'relative');
		$(this).clone()
			.addClass('pulled-right')
			.prependTo($parentParagraph);
	});
	$('span.pullquote.left').each(function(index) {
		var $parentParagraph = $(this).parent('p');
		$parentParagraph.css('position', 'relative');
		$(this).clone()
			.addClass('pulled-left')
			.prependTo($parentParagraph);
	});
	
});
/**
 * jquery to smooth scroll down the homepage from hero video section.
 */

jQuery(document).ready( function($) {

	$( "#learnmorebutton" ).click( function() {
		$( 'html, body' ).animate({
			scrollTop: $( "#more" ).offset().top
		}, 1000 );
	});

});
/**
 * show / hide the search bar in the header (on desktop)
 */

jQuery(document).ready( function($) {
	$('.show-hide-search-button').on('click', function () {

		$('.search-form-area').toggleClass('show-search-form');
		return false;
	});

	$('.show-hide-mobile-search-button').on('click', function () {

		$('.mobile-search-form-area').toggleClass('show-search-form');
		return false;
	});
});

/**
 * Created by tapps on 5/31/17.
 */

jQuery(document).ready( function($) {

	$('.rotating').sss({
		slideShow : true, // Set to false to prevent SSS from automatically animating.
		startOn : 0, // Slide to display first. Uses array notation (0 = first slide).
		transition : 400, // Length (in milliseconds) of the fade transition.
		speed : 8500, // Slideshow speed in milliseconds.
		showNav : false // Set to false to hide navigation arrows.
	});

});
/** Super Simple Slider by @intllgnt **/

;(function($, window, document, undefined ) {

$.fn.sss = function(options) {

// Options

	var settings = $.extend({
	slideShow : true,
	startOn : 0,
	speed : 3500,
	transition : 400,
	arrows : true
	}, options);

	return this.each(function() {

// Variables

	var
	wrapper = $(this),
	slides = wrapper.children().wrapAll('<div class="sss"/>').addClass('ssslide'),
	slider = wrapper.find('.sss'),
	slide_count = slides.length,
	transition = settings.transition,
	starting_slide = settings.startOn,
	target = starting_slide > slide_count - 1 ? 0 : starting_slide,
	animating = false,
	clicked,
	timer,
	key,
	prev,
	next,

// Reset Slideshow

	reset_timer = settings.slideShow ? function() {
	clearTimeout(timer);
	timer = setTimeout(next_slide, settings.speed);
	} : $.noop;

// Animate Slider

	function get_height(target) {
	return ((slides.eq(target).height() / slider.width()) * 100) + '%';
	}

	function animate_slide(target) {
	if (!animating) {
	animating = true;
	var target_slide = slides.eq(target);

	target_slide.fadeIn(transition);
	slides.not(target_slide).fadeOut(transition);

	slider.animate({paddingBottom: get_height(target)}, transition,  function() {
	animating = false;
	});

	reset_timer();

	}}

// Next Slide

	function next_slide() {
	target = target === slide_count - 1 ? 0 : target + 1;
	animate_slide(target);
	}

// Prev Slide

	function prev_slide() {
	target = target === 0 ? slide_count - 1 : target - 1;
	animate_slide(target);
	}

	if (settings.arrows) {
	slider.append('<div class="sssprev"/>', '<div class="sssnext"/>');
	}

	next = slider.find('.sssnext'),
	prev = slider.find('.sssprev');

	$(window).load(function() {

	slider.css({paddingBottom: get_height(target)}).click(function(e) {
	clicked = $(e.target);
	if (clicked.is(next)) { next_slide(); }
	else if (clicked.is(prev)) { prev_slide(); }
	});

	animate_slide(target);

	$(document).keydown(function(e) {
	key = e.keyCode;
	if (key === 39) { next_slide(); }
	else if (key === 37) { prev_slide(); }
	});

	});
// End

});

};
})(jQuery, window, document);