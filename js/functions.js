( function( $ ) {
	"use strict";
	
	// Set Double Tap To Go for Main Navigation.
	var $site_navigation = $( '#site-navigation li:has(ul)' );
	if ( $site_navigation[0] ) {
		$site_navigation.doubleTapToGo();
	}

} )( jQuery );