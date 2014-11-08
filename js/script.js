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
	});
	$('.close-menu-button').on('click', function(){
		makeVisible('.menu-button');
		makeHidden('.menu-container');
	});

//diy lightbox		
	$('.portfolio-thumb').on('click', function(){
		makeVisible($(this).parents('.portfolio-third').find('.portfolio-full'));
	});
	// $(portfolioFull).on('click', function () {
	// 	makeHidden(this);
	// })
//set it up tobe hidden, then show when clicked
//keypress to switch (esc, left/right)
});