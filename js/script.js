$(document).ready(function(){
	makeVisible = function(myClass) {
		$(myClass).removeClass('hidden').addClass('visible');
	};
	makeHidden = function(myClass) {
		$(myClass).removeClass('visible').addClass('hidden');
	};

//force height of fader divs to match header div
	headerHeight = $('header').css('height');
	adminBarHeight = $('#wpadminbar').css('height');
	if ($('#wpadminbar')) {
		$('.header-fader').css({
			'height': headerHeight,
			'top': adminBarHeight
		});
	} else {
		headerHeight = $('header').css('height');
		$('.header-fader').css('height', headerHeight);
	}
//navigation functions
	$('.menu-button').on('click', function(){
		makeVisible('.menu-container');
		makeHidden('.menu-button');
		if ($('#wpadminbar')) {
			$('.menu-container').css('top', adminBarHeight);
		} else {
			$('.menu-container').css('top', 0);
		}
	});
	$('.close-menu-button').on('click', function(){
		makeVisible('.menu-button');
		makeHidden('.menu-container');
	});
});