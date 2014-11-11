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

//diy lightbox		
	//functions
	setContentWidth = function() {
		portfolioImgWidth = $('.visible').find('img').css('width');
			$('.content-and-footer').css({
			'width': portfolioImgWidth,
			margin: '0 auto'
			});
			$('.lightbox-inner').css({
				'width': portfolioImgWidth,
				margin: '0 auto'
			})
	};
	goLeft = function(){
		if ($('.content-and-footer').hasClass('visible')) {
			makeHidden($('.content-and-footer'));
		}
		if ($('.portfolio-full:first').hasClass('visible')) {
			makeHidden('.portfolio-full:first');
			makeVisible('.portfolio-full:last');
			$('.portfolio-full .visible').find('img').load(setContentWidth());
			makeVisible($('.portfolio-full.visible').find('.show-content-and-footer'));
		} else {
			makeVisible($('.portfolio-full.visible').parents('.portfolio-third').prev().find('.portfolio-full'));
			makeHidden($('.portfolio-full.visible:last'));
			$('.portfolio-full.visible').find('img').load(setContentWidth());
			makeVisible($('.portfolio-full.visible').find('.show-content-and-footer'));
		}
	};

	goRight = function(){
		if ($('.content-and-footer').hasClass('visible')) {
			makeHidden($('.content-and-footer'));
		}
		if ($('.portfolio-full:last').hasClass('visible')) {
			makeHidden('.portfolio-full:last');
			makeVisible('.portfolio-full:first');
			$('.portfolio-full.visible').find('img').load(setContentWidth());
			makeVisible($('.portfolio-full.visible').find('.show-content-and-footer'));
		} else {	
			makeVisible($('.portfolio-full.visible').parents('.portfolio-third').next().find('.portfolio-full'));
			makeHidden($('.portfolio-full.visible:first'));
			$('.portfolio-full.visible').find('img').load(setContentWidth());
			makeVisible($('.portfolio-full.visible').find('.show-content-and-footer'));
		}
	};

	escapeLightbox = function() {
		makeHidden($('.portfolio-full'));
		//allow normal scrolling
		$('html, body').css({
		    'overflow': 'auto',
		    'height': 'auto'
		});
	};
	//set up lightbox on click
	$('.portfolio-thumb').on('click', function(){
		//prevent scrolling
			$('html, body').css({
			    'overflow': 'hidden',
			    'height': '100%'
			});
			makeVisible($(this).parents('.portfolio-third').find('.portfolio-full'));
			portfolioPieceWidth = $(this).parents('.portfolio-third').find('.portfolio-full').find('img').css('width');
			portfolioPieceSplit = portfolioPieceWidth.split("px");
			portfolioPieceNumber = Number(portfolioPieceSplit[0]);
			$('.portfolio-full.visible').find('img').load(setContentWidth());
					});	
	//keypress functions
	$(document).on('keydown', (function(e){
		//escape
		if (e.which == 27) {
			e.preventDefault();
			escapeLightbox();
			//up or right
		} else if (e.which == 39) {
			e.preventDefault();
			goRight();
			//down or left
		} else if (e.which == 37) {
			e.preventDefault();
			goLeft();
		} else {
			//do nothing
		}
	//lightbox click functions
		$('.portfolio-full').on('click', function(e){
			if (e.target == this) {
				escapeLightbox();
			}
		});
		$('.lightbox-close').on('click', function(){
			escapeLightbox();
		});
		$('.go-right').on('click', function(){
			goRight();
		});
		$('.go-left').on('click', function(){
			goLeft();
		});
		$('.show-content-and-footer').on('click', function(){
			makeHidden($('.show-content-and-footer'));
			makeVisible($('.portfolio-full.visible').find('.content-and-footer'));
		});
		$('.hide-content-and-footer').on('click', function(){
			makeHidden($('.content-and-footer.visible'));
			makeVisible($(this).parents('.portfolio-full').find('.show-content-and-footer'));
		});
	}));
});