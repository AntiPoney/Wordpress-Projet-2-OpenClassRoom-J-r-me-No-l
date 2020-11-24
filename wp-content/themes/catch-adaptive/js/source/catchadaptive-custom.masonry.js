 /*
 * Custom Masonry Script Loader
 * Description: Custom Masonry scripts for catchadaptive
 */

jQuery(document).ready(function($) {
	
	
	//Masonry blocks
	$blocks = $(".site-main");

	$blocks.imagesLoaded(function(){
		$blocks.masonry({
			"columnWidth": ".masonry-normal",
			"itemSelector": ".hentry",
			"percentPosition": true
		});

		// Fade blocks in after images are ready (prevents jumping and re-rendering)
		$(".hentry").fadeIn();
	});
	
	$(document).ready( function() { setTimeout( function() { $blocks.masonry(); }, 500); });

	$(window).resize(function () {
		$blocks.masonry();
	});
    
	
	// When Jetpack Infinite scroll posts have loaded
	$( document.body ).on( 'post-load', function () {

		var $container = $('.site-main');
		$container.masonry( 'reloadItems' );
		
		$blocks.imagesLoaded(function(){
			$blocks.masonry({
				"columnWidth": ".masonry-normal",
				"itemSelector": ".hentry",
				"percentPosition": true
			});
	
			// Fade blocks in after images are ready (prevents jumping and re-rendering)
			$(".hentry").fadeIn();
		});
		
		$container.masonry( 'reloadItems' );
		
		$(document).ready( function() { setTimeout( function() { $blocks.masonry(); }, 500); });

	});
	
});