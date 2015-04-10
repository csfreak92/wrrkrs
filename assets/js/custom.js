function resize() {
	var windowWidth = $(window).width();
	var windowHeight = $(window).height();
	
	// STICKY FOOTER
	var footerHeight = $('footer').outerHeight();
	var footerTop = (footerHeight) * -1
	var headerHeight = $('header').outerHeight();
	//$('footer').css({marginTop: footerTop});
	$('#main-wrapper').css({paddingTop: headerHeight, paddingBottom: footerHeight});
	
	
	// PEOPLE
	var peopleHeight = windowHeight - ($('header').outerHeight() + $('footer').outerHeight() + 10);
	var peopleContent = peopleHeight - ($('.people-banner').outerHeight() + 20);
	$('.people-wrapper').css({height: peopleHeight});
	$('.people-set,.contact-set').css({height: peopleContent});
}

$(window).resize(function() {
	resize();
});

$(window).load(function() {
	// HOME SLIDER
	$('.home-slider .flexslider').flexslider({
		animation: "slide",
		controlNav: true,
		directionNav: false,
		start: function(slider) {
			$('.home-slider .flex-control-nav li').click(function(event){
				$('.home-slider .flexslider').flexslider("play");
			});
			$('.rg-slider-control ul.slides a').click(function(e){
				e.preventDefault();
				var slideNum = Number($(this).attr('data-slider'));
				$('.home-slider .flexslider').flexslider(slideNum);
				
			});
		}
	});
	
	// HOME FEATURE
	$('.home-feature .flexslider').flexslider({
		animation: "slide",
		controlNav: false,
		directionNav: true,
		itemWidth: 2000,
        itemMargin: 0,
		start: function(slider) {
			$('.home-feature .flex-direction-nav a').click(function(event){
				$('.home-feature .flexslider').flexslider("play");
			});
		}
	});
	
	resize();
});

$(document).ready(function() {
	resize();
});