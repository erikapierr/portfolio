$(document).ready(function(){
	alert("hi!");
	$('.menu-button').on('click', function(){
		// $('.menu-container').removeClass('hidden').addClass('visible');
		// $('.menu-button').removeClass('visible').addClass('hidden');
		// alert("hi!");
	});
	$('.close-menu-button').on('click', function(){
		$('.menu-container').removeClass('visible').addClass('hidden');
		$('.menu-button').removeClass('hidden').addClass('visible');
	});
});