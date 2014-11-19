$(document).ready(function(){
	makeVisible = function(myClass) {
		$(myClass).removeClass('hidden').addClass('visible');
	};
	makeHidden = function(myClass) {
		$(myClass).removeClass('visible').addClass('hidden');
	};

//check if adminbar is active to set heights of fader divs & set top of menu button
	headerHeight = $('header').css('height');
	adminBarHeight = $('#wpadminbar').css('height');
	if ($('#wpadminbar')) {
		$('.header-fader').css({
			'height': headerHeight,
			'top': adminBarHeight
		});
		$('button.menu-button').css('top', adminBarHeight);
	} else {
		headerHeight = $('header').css('height');
		$('.header-fader').css('height', headerHeight);
		$('button.menu-button').css('top', '0');
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