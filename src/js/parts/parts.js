jQuery(function ($) {
	$('.header__nav-list a').on('click', function (e) {
		$('.header__nav-list a').removeClass('active');
		$(this).addClass('active');
	});
});
