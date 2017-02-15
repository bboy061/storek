$(document).ready(function() {
	$('nav .dd-menu-trigger').on('click', function() {
		if ($(this).hasClass('selected')) {
			$(this).removeClass('selected');
			$(this).find('.dd-menu').removeClass('open');
		} else {
			$(this).closest('.nav__list').find('.dd-menu').removeClass('open');
			$(this).closest('.nav__list').find('.dd-menu-trigger').removeClass('selected');
			$(this).addClass('selected');
			$(this).find('.dd-menu').addClass('open');
		}
	});

	$('.contact, .dd-menu__list').on('click', function(e) {
		e.stopPropagation();
	});

	$('.popup-trigger').on('click', function(e) {
		$('.wrapper').addClass('popup-open');
		e.stopPropagation();
	});

	$(document).on('click', function() {
		$('.wrapper').removeClass('popup-open');
	})
});