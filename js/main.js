jQuery(window).load(function() {
	var slider_delay  = parseInt(l10n_slider.mso_slider_delay);

	slider_delay  = slider_delay > 0 ? slider_delay : 5;
	
	// ==============================================================
	// Main slider
	// ==============================================================
	jQuery('.tophome-page aside').flexslider({
		animation: "fade",
		slideshowSpeed: slider_delay*1000,
		controlNav: false,
		directionNav: false
	});	
	// ==============================================================
	// Remove field notification
	// ==============================================================
	jQuery('.wpcf7-form-control-wrap').mouseenter(function(){
		if(jQuery(this).find('span.wpcf7-not-valid-tip').length)
		{
			jQuery(this).find('span.wpcf7-not-valid-tip').fadeOut(200);
		}
	});
});