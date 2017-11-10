$(document).ready(function() {
	var slideListLang = $('.slider-for').children().length;
	$('.slider-for').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: false,
		fade: true,
		asNavFor: '.slider-nav'
	});

	//nav slide 반응형
	var SlickNavOption = {
		slidesToShow: 5,
		slidesToScroll: 1,
		asNavFor: '.slider-for',
		dots: false,
		centerMode: true,
		focusOnSelect: true,
		autoplay: true,
		autoplaySpeed: 5000
	};
	var delta = 300;
	var timer = null;
	$(window).on('resize', function() {
		clearTimeout(timer);
		timer = setTimeout(resizeDone, delta);
	});

	function slickInit() {

		if ($(window).width() < 330) {
			SlickNavOption.slidesToShow = 2;
		} else if ($(window).width() < 565) {
			SlickNavOption.slidesToShow = 2;
		} else if ($(window).width() < 1057) {
			SlickNavOption.slidesToShow = 3;
		} else if ($(window).width() < 1527) {
			SlickNavOption.slidesToShow = 4;
		}
		SlickNavOption.slidesToShow = slideListLang < SlickNavOption.slidesToShow ? slideListLang : SlickNavOption.slidesToShow;
		$('.slider-nav').slick(SlickNavOption);
	}

	function resizeDone() {
		var slideToshow = 0;
		// ...do
		if ($(window).width() < 330) {
			slideToshow = 1;
		} else if ($(window).width() < 565) {
			slideToshow = 2;
		} else if ($(window).width() < 1057) {
			slideToshow = 3;
		} else if ($(window).width() < 1527) {
			slideToshow = 4;
		} else {
			slideToshow = 5;
		}
		slidesToShow = slideListLang < slideToshow ? slideListLang : slideToshow;
		console.log(slidesToShow);
		$('.slider-nav').slick('slickSetOption', 'slidesToShow', slidesToShow, true);

	}

	slickInit()

});
