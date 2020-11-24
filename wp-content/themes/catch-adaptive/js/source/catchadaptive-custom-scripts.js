 /*
 * Custom scripts
 * Description: Custom scripts for catchadaptive
 */

jQuery(document).ready(function() {
	var jQueryheader_search = jQuery( '#header-toggle' );
	jQueryheader_search.click( function() {

		var jQueryform_search = jQuery("div").find( '#header-toggle-sidebar' );

		if ( jQueryform_search.hasClass( 'displaynone' ) ) {
			jQueryform_search.removeClass( 'displaynone' ).addClass( 'displayblock' ).animate( { opacity : 1 }, 300 );
		} else {
			jQueryform_search.removeClass( 'displayblock' ).addClass( 'displaynone' ).animate( { opacity : 0 }, 300 );
		}
	});

	//Fit vids
	if ( jQuery.isFunction( jQuery.fn.fitVids ) ) {
		jQuery('.hentry, .widget').fitVids();
	}

	// Admin bar absolute fixed
	jQuery(window).scroll(function() {
	    var scroll = jQuery(window).scrollTop();
	    if (scroll >= 1) {
	        jQuery("#fixed-header").addClass("is-absolute");
	    }
	    else {
	        jQuery("#fixed-header").removeClass("is-absolute");
	    }
	});

	//sidr
	if ( jQuery.isFunction( jQuery.fn.sidr ) ) {
		jQuery('#mobile-header-left-menu').sidr({
		   name: 'mobile-header-left-nav',
		   side: 'left' // By default
		});
	}

	/**
	 * Test if an iOS device.
	*/
	function checkiOS() {
		return /iPad|iPhone|iPod/.test(navigator.userAgent) && ! window.MSStream;
	}

	if ( checkiOS() ) {
		jQuery( 'body' ).addClass( 'ios-device' );
	}
});
