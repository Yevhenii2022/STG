jQuery(document).ready(function ($) {
	var $slider = $('.banner-slider .slider');
	var $dots = $('.banner-slider .slider-dots li');

	$slider.slick({
		infinite: true,
		arrows: false,
		dots: false,
		autoplay: true,
		autoplaySpeed: 3000,
		fade: true,
		speed: 800,
	});

	$slider.on('afterChange', function (event, slick, currentSlide) {
		$dots.removeClass('active');
		$dots.eq(currentSlide).addClass('active');
	});

	$dots.on('click', function () {
		var index = $(this).index();
		$slider.slick('slickGoTo', index);
	});
});
