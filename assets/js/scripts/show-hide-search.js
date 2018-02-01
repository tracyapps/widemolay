/**
 * show / hide the search bar in the header (on desktop)
 */

jQuery(document).ready( function($) {
	$('.show-hide-search-button').on('click', function () {

		$('.search-form-area').toggleClass('show-search-form');
		return false;
	})
});
