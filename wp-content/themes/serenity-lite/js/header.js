;(function($) {
	var num = 1; //number of pixels before modifying styles
	$(window).bind('scroll', function () {
	    if ($(window).scrollTop() > num) {
			$('.navbar').removeClass('navbar-dark');
			$('.navbar').addClass('navbar-light');
			$('.navbar').removeClass('bg-transparent');
			$('.navbar').addClass('bg-white');
			$('.custom-logo-link').removeClass('d-none');
			$('.custom-logo-link').addClass('d-block');
			$('.custom-logo-link-light').removeClass('d-block');
			$('.custom-logo-link-light').addClass('d-none');
			$('.site-title').addClass('text-dark');
			$('.site-description').addClass('text-dark');
			$('.navbar .cta.btn-outline-success').addClass('text-dark');
			$('.navbar').addClass('border-bottom');
	    } else {
			$('.navbar').removeClass('navbar-light');
			$('.navbar').addClass('navbar-dark');
			$('.navbar').removeClass('bg-white');
			$('.navbar').addClass('bg-transparent');
			$('.custom-logo-link').removeClass('d-block');
			$('.custom-logo-link').addClass('d-none');
			$('.custom-logo-link-light').removeClass('d-none');
			$('.custom-logo-link-light').addClass('d-block');
			$('.site-title').removeClass('text-dark');
			$('.site-description').removeClass('text-dark');
			$('.navbar .cta.btn-outline-success').removeClass('text-dark');
			$('.navbar').removeClass('border-bottom');
	    }
	});
})(jQuery);

;(function($) {
	if(window.outerWidth < 979) {
		$('.nav-link').on('click',function() {
		  $('.navbar-collapse').collapse('hide');
		});
	};
})(jQuery);