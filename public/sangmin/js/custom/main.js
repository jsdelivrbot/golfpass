$(function() {
	$('#section2').css('padding-top', $("nav").height() * 2);
	for (var i = 0; i < $('.carousel-item').length; i++) {
		//슬라이드 갯수만큼 셀렉터 만듬..
		if (i == 0) {
			$('<li></li>').attr('data-target', '#section1-slide').attr('data-slide-to', i).addClass('active').appendTo('.carousel-indicators');
		} else {
			$('<li></li>').attr('data-target', '#section1-slide').attr('data-slide-to', i).appendTo('.carousel-indicators');
		}
	}
	$('html *').on("mousewheel DOMMouseScroll", function(event) {
		if ($('body').hasClass('menu-open')) {
			event.preventDefault();
			event.stopPropagation();

			return false;
		}
	});
	/*이미지애니메이션*/
	$(function() {
		function swing() {
			$('.down').animate({'top':'5px'},600).animate({'top':'10px'},600, swing);
		}
		swing();
	});
	
/*스크롤 이동삭제함*/
	$(window).scroll(function() {
		if ($(this).scrollTop() >= $('#section2').offset().top) {
			$('#header').addClass('black-bg-header');
		} else {
			$('#header').removeClass('black-bg-header');
		}
	});

	var interval = 7000; //슬라이드 시간
	$('#section1-slide').carousel({
		interval: interval,
		pause: false,
		ride: "carousel"
	}, mainSlideChage())
	$('#section1-slide').on('slid.bs.carousel', function() {
		mainSlideChage();
	});

	function mainSlideChage() {
		$('#bg-div').css('background-image', "url(" + $(".carousel-item.active").children('img').attr("src") + ")");
		$('#current').css('height', '0').stop().animate({
			'height': '100%'
		}, interval);
	}
})

