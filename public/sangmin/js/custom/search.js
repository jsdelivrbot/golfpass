$(function() {
	var search = $('.search-container');
	var searchInput = $('.search-container>input');
	var searchContentContainer = $('.search-content-container'); //검색내용 컨테이너

	function searchInit() {
		$(searchContentContainer).css('display', 'none');
		$(searchContentContainer).append(loadingPrint());
	}
	searchInit();
	searchInput.on('focus', function() {
		$(search).addClass('focus');
	});

	var search_delta = 1000;
	var search_timer = null;


	searchInput.on('keyup', function() {
		$(searchContentContainer).fadeIn("fast");
		if (searchInput.val().length < 2) {
			searchInit();
		}
		clearTimeout(search_timer);
		timer = setTimeout(inputDone, search_delta);

	});

	searchInput.on('blur', function() {
		//NOTE input에서 focus풀렷을시 안보임 작업시 주석
		setTimeout(function() {
			searchInput.val('');
			$(searchContentContainer).fadeOut("fast");
		}, 100);
	});

	function printStar(score) {
		var temp = Math.floor(score);
		var MAX_STAR = 5;
		var output = '';
		for (var i = 0; i < MAX_STAR; i++) {
			if (i < temp) {
				//채워진별
				output += '<i class="xi-star"></i>';
			} else {
				//빈 별
				output += '<i class="xi-star-o"></i>';
			}
		}
		return output;
	}

	function loadingPrint() {
		return '<div class="sk-fading-circle"><div class="sk-circle1 sk-circle"></div><div class="sk-circle2 sk-circle"></div><div class="sk-circle3 sk-circle"></div><div class="sk-circle4 sk-circle"></div><div class="sk-circle5 sk-circle"></div><div class="sk-circle6 sk-circle"></div><div class="sk-circle7 sk-circle"></div><div class="sk-circle8 sk-circle"></div><div class="sk-circle9 sk-circle"></div><div class="sk-circle10 sk-circle"></div><div class="sk-circle11 sk-circle"></div><div class="sk-circle12 sk-circle"></div></div>'
	}

	function inputDone() {
		$(searchContentContainer).empty().append(loadingPrint());
		//NOTE test코드
		var data = [{
			title: '앙사나골프텔',
			imagePath: '/public/images/product.jpg',
			score: 4.5,
			article: 'ㄴㅁㄻㄴㄻㄶㅁㄴㅇㅎㄴㅇㅁㅎㄴㅁㅇㅎㄴㅁㅇㅎㄴㅇㅁㅎㄴㅇㅁㅎㄴㅁㅇㅎㄴㅇㅎㄴㅇㅎㄴㅇㅎㄶㅇ'
		}, {
			title: '앙사나골프텔',
			imagePath: '/public/images/product.jpg',
			score: 4.5,
			article: 'ㄴㅁㄻㄴㄻㄶㅁㄴㅇㅎㄴㅇㅁㅎㄴㅁㅇㅎㄴㅁㅇㅎㄴㅇㅁㅎㄴㅇㅁㅎㄴㅁㅇㅎㄴㅇㅎㄴㅇㅎㄴㅇㅎㄶㅇ'
		}, {
			title: '앙사나골프텔',
			imagePath: '/public/images/product.jpg',
			score: 4.5,
			article: 'ㄴㅁㄻㄴㄻㄶㅁㄴㅇㅎㄴㅇㅁㅎㄴㅁㅇㅎㄴㅁㅇㅎㄴㅇㅁㅎㄴㅇㅁㅎㄴㅁㅇㅎㄴㅇㅎㄴㅇㅎㄴㅇㅎㄶㅇ'
		}, {
			title: '앙사나골프텔2',
			imagePath: '/public/images/product.jpg',
			score: 3.2,
			article: '2ㄴㅁㄻㄴㄻㄶㅁㄴㅇㅎㄴㅇㅁㅎㄴㅁㅇㅎㄴㅁㅇㅎㄴㅇㅁㅎㄴㅇㅁㅎㄴㅁㅇㅎㄴㅇㅎㄴㅇㅎㄴㅇㅎㄶㅇ'
		}];
		var input = '';
		input += "<p><span>'" + searchInput.val() + "' '</span>검색결과 <span> / 총' + data.length + '개</span></p>"
		input += '<div>'
		input += '<ul class="search-items">'
		for (var i = 0; i < data.length; i++) {
			input += '<a href="#' + /*경로*/ '">';
			input += '<li class="search-item d-flex align-items-strech">'
			input += '<div class="image d-flex align-items-center justify-content-center">'
			input += '<img class="rounded-circle" src="' + data[i].imagePath + '"alt="검색이미지" width="100%;">'
			input += '</div>'
			input += '<div class="content">'
			input += '<div class="title d-flex align-items-center">' + data[i].title + '<span class="pl-2 score-icon d-flex">' + printStar(parseFloat(data[i].score)) + '</span><span class="pl-2 score-text">(종합 점수' + parseFloat(data[i].score) + ')</span></div>'
			input += '<div class="article">' + data[i].article + '</div>';
			input += '</li>'
			input += '<a/>';
		} //loop end
		input += '</ul>'
		input += '</div>'
		setTimeout(function() {
			//타임아웃은..ajax 딜레이 표현
			$(searchContentContainer).empty().append(input);
		}, 500)
		//TEST 코드 end
		/*		//TODO AJAX 코드 실행..
				$.ajax({
					url: 'url..'
					type: 'get',
					data: {
						search: searchInput.val()
					},
					success: function(data) {
						var input = '';
						input += "<p><span>'" + searchInput.val() + "' '</span>검색결과 <span> / 총' + data.length + '개</span></p>"
						input += '<div>'
						input += '<ul class="search-items">'
						for (var i = 0; i < data.length; i++) {
							input += '<a href="' + data[i].경로 + '">';
							input += '<li class="search-item d-flex align-items-strech">'
							input += '<div class="image d-flex align-items-center justify-content-center">'
							input += '<img class="rounded-circle" src="' + data[i].imagePath + '"alt="검색이미지" width="100%;">'
							input += '</div>'
							input += '<div class="content">'
							input += '<div class="title d-flex align-items-center">' + data[i].title + '<span class="pl-2 score-icon d-flex">' + printStar(parseFloat(data[i].score)) + '</span><span class="pl-2 score-text">(종합 점수' + parseFloat(data[i].score) + ')</span></div>'
							input += '<div class="article">' + data[i].article + '</div>';
							input += '</li>';
							input += '<a/>';
						} //loop end
						input += '</ul>'
						input += '</div>'
						$(searchContentContainer).empty().append(input);
					} //success
				}); //ajax end*/
	}


});
