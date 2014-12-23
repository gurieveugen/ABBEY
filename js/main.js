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
	// ==============================================================
	// MENU
	// ==============================================================
	jQuery('#menu-main-menu > li > a').hover(function(e){
		var li      = jQuery(this).parent();
		var visible = li.children('.sub-menu').is(':visible');
		
		if(li.hasClass('menu-item-has-children'))
		{
			if(!visible)
			{
				li.children('.sub-menu').show();	
			}
			e.preventDefault();
		}
	});

	jQuery('#menu-main-menu > li').mouseleave(function(e){
		jQuery('#menu-main-menu .sub-menu').each(function(){
			jQuery(this).hide();
		});	
	});

	jQuery('.txt footer a.more').click(function(e){
		var p = jQuery(this).parent().prev();
		
		if(p.css('max-height') == '10000px')
		{
			p.css({
				'max-height' : '106px'
			});
			jQuery(this).text('MORE');
		}
		else
		{
			p.css({
				'max-height' : '10000px'
			});
			jQuery(this).text('CLOSE');
		}

		e.preventDefault();
	});
});