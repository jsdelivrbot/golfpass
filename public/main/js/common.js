$(window).scroll(function() {
	var sm = $('#nav li');
	var sct = $(window).scrollTop();

	if (sct >= $('#paracon1').offset().top) {
		sm.removeClass('active');
		sm.eq(0).addClass('active');
	}
	if (sct >= $('#paracon2').offset().top) {
		sm.removeClass('active');
		sm.eq(1).addClass('active');
	}
	if (sct >= $('#paracon3').offset().top) {
		sm.removeClass('active');
		sm.eq(2).addClass('active');
	}
	if (sct >= $('#paracon4').offset().top) {
		sm.removeClass('active');
		sm.eq(3).addClass('active');
	}
	if (sct >= $('#paracon5').offset().top) {
		sm.removeClass('active');
		sm.eq(4).addClass('active');
	}
	if (sct >= $('#paracon6').offset().top) {
		sm.removeClass('active');
		sm.eq(5).addClass('active');
	}
	if (sct >= $('#paracon7').offset().top) {
		sm.removeClass('active');
		sm.eq(6).addClass('active');
	}
	if (sct >= $('#paracon8').offset().top) {
		sm.removeClass('active');
		sm.eq(7).addClass('active');
	}
});

$(function(){
    $('#nav li a').bind('click',function(event){
				console.log('test');
				var $anchor = $(this);

        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 1000,'easeInOutExpo');
        event.preventDefault();
    });
});
