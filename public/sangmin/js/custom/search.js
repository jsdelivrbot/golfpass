$(function() {
	var search = $('.search-container');
	var searchInput = $('.search-container>input');
	var searchContentContainer = $('.search-content-container'); //검색내용 컨테이너
	function searchInit() {
		$(searchContentContainer).fadeOut("fast"); //검색내용 사라짐
		$(searchContentContainer).empty().append(loadingPrint()); //검색내용 비움
		$(search).removeClass('focus'); // input focus모양 변경
		searchInput.val(''); //input text 비움
	}
	searchInit();

	searchInput.on('focus', function() {
		//input포커스 이벤트
		$(search).addClass('focus');
	});

	var search_delta = 1; //이벤트 지연시간
	var search_timer = null; //setTimeout담을 객체
	searchInput.on('keyup', function() {
		//키입력시마다 실행하면 안좋을거같아서 search_delta초 후에 실행
		$(searchContentContainer).fadeIn("fast");
		if (searchInput.val().length == 0) { //글자를 모두 지웟을때 창없앰
			searchInit();
		}
		clearTimeout(search_timer);
		search_timer = setTimeout(inputDone, search_delta * 1000);
	});


	searchInput.on('blur', function() {
		//focus에서 벗어낫을 경우 init호출하여 원상태로 돌림
		setTimeout(function() {
			//클릭하는 즉시 사라져서 시간 0.2초 줌 ..
			searchInit();
		}, 200);
	});



	function inputDone() {
		//ajax 코드 구현
		$(searchContentContainer).empty().append(loadingPrint()); //기존에 있던 내용 없애고 로딩 추가
		//NOTE test코드
		// var data = [{
		// 	title: '앙사나골프텔',
		// 	imagePath: '/public/images/product.jpg',
		// 	score: 4.5,
		// 	article: 'ㄴㅁㄻㄴㄻㄶㅁㄴㅇㅎㄴㅇㅁㅎㄴㅁㅇㅎㄴㅁㅇㅎㄴㅇㅁㅎㄴㅇㅁㅎㄴㅁㅇㅎㄴㅇㅎㄴㅇㅎㄴㅇㅎㄶㅇ'
		// }, {
		// 	title: '앙사나골프텔',
		// 	imagePath: '/public/images/product.jpg',
		// 	score: 4.5,
		// 	article: 'ㄴㅁㄻㄴㄻㄶㅁㄴㅇㅎㄴㅇㅁㅎㄴㅁㅇㅎㄴㅁㅇㅎㄴㅇㅁㅎㄴㅇㅁㅎㄴㅁㅇㅎㄴㅇㅎㄴㅇㅎㄴㅇㅎㄶㅇ'
		// }, {
		// 	title: '앙사나골프텔',
		// 	imagePath: '/public/images/product.jpg',
		// 	score: 4.5,
		// 	article: 'ㄴㅁㄻㄴㄻㄶㅁㄴㅇㅎㄴㅇㅁㅎㄴㅁㅇㅎㄴㅁㅇㅎㄴㅇㅁㅎㄴㅇㅁㅎㄴㅁㅇㅎㄴㅇㅎㄴㅇㅎㄴㅇㅎㄶㅇ'
		// }, {
		// 	title: '앙사나골프텔2',
		// 	imagePath: '/public/images/product.jpg',
		// 	score: 3.2,
		// 	article: '2ㄴㅁㄻㄴㄻㄶㅁㄴㅇㅎㄴㅇㅁㅎㄴㅁㅇㅎㄴㅁㅇㅎㄴㅇㅁㅎㄴㅇㅁㅎㄴㅁㅇㅎㄴㅇㅎㄴㅇㅎㄴㅇㅎㄶㅇ'
		// }];
		// var input = '';
		// input += "<p><span>'" + searchInput.val() + "' '</span>검색결과 <span> / 총' + data.length + '개</span></p>"
		// input += '<div>'
		// input += '<ul class="search-items">'
		// for (var i = 0; i < data.length; i++) {
		// 	input += '<a href="#' + /*경로*/ '">';
		// 	input += '<li class="search-item d-flex align-items-strech">'
		// 	input += '<div class="image d-flex align-items-center justify-content-center">'
		// 	input += '<img class="rounded-circle" src="' + data[i].imagePath + '"alt="검색이미지" width="100%;">'
		// 	input += '</div>'
		// 	input += '<div class="content">'
		// 	input += '<div class="title d-flex align-items-center">' + data[i].title + '<span class="pl-2 score-icon d-flex">' + printStar(parseFloat(data[i].score)) + '</span><span class="pl-2 score-text">(종합 점수' + parseFloat(data[i].score) + ')</span></div>'
		// 	input += '<div class="article">' + data[i].article + '</div>';
		// 	input += '</li>'
		// 	input += '<a/>';
		// } //loop end
		// input += '</ul>'
		// input += '</div>'
		// setTimeout(function() {
		// 	//타임아웃은..ajax 딜레이 표현용 ajax 구현시 X
		// 	$(searchContentContainer).empty().append(input);
		// }, 500) //TEST 코드 end
		//TODO AJAX 코드 실행..위의 코드 참고해서 작성해주세요

		$.ajax({
			url: '/index.php/base/main/search',
			type: 'post',
			dataType: 'json',
			data: {
				search: searchInput.val()
			},
			success: function(data) {
				var products = data.products;
				var contents = data.contents;
				var num_data = contents.length + products.length;
				var input = '';
//				input += "<p><span>'" + searchInput.val() + `' </span>검색결과 <span class="search_data_num"> / 총  ${num_data}  개</span></p>`;
input += "<p><span>'" + searchInput.val() + "' </span>검색결과 <span class=\"tp-search_data_num\"> / 총  "+num_data+"  개</span></p>";
				input += '<div>';
				input += '<ul class="search-items">';
				for (var i = 0; i < products.length; i++) {
					input += '<a href="' + products[i].href + '">';
					input += '<li class="search-item d-flex align-items-strech">'
					input += '<div class="image d-flex align-items-center justify-content-center">'
					input += '<img class="rounded-circle" src="' + products[i].imagePath + '" alt="검색이미지" width="100%;" height="100%;">'
					input += '</div>'
					input += '<div class="content">'
					input += '<div class="title d-flex align-items-center">' + products[i].title + '<span class="pl-2 score-icon d-flex">' + printStar(parseFloat(products[i].score)) + '</span><span class="pl-2 score-text">(종합 점수 ' + parseFloat(products[i].score) + ')</span></div>'
					input += '<div class="article">' + products[i].article + '</div>';
					input += '</li>';
					input += '<a/>';
				} //loop end

				input+= "<div style=' border-top:2px solid #000000'></div>"
				for (var i = 0; i < contents.length; i++) {
					input += '<a href="' + contents[i].href + '">';
					input += '<li class="search-item d-flex align-items-strech">'
					input += '<div class="image d-flex align-items-center justify-content-center">'
					input += '<img class="rounded-circle" src="' + contents[i].imagePath + '" alt="검색이미지" width="100%;" height="100%;">'
					input += '</div>'
					input += '<div class="content">'
					input += '<div class="title d-flex align-items-center">' + contents[i].title;
					// input += '<span class="pl-2 score-icon d-flex">' + printStar(parseFloat(contents[i].score)) + '</span><span class="pl-2 score-text">(종합 점수 ' + parseFloat(contents[i].score) + ')</span>';
					input+='</div>';
					input += '<div class="article">' + contents[i].article + '</div>';
					input += '</li>';
					input += '<a/>';
				} //loop end


				input += '</ul>'
				input += '</div>'
				$(searchContentContainer).empty().append(input);
			} //success
		}); //ajax end
	}

	function printStar(score) {
		//검색창에 별찍는 메소드 .. 버림으로 구현 ex  3.8점 >> 별3개 빈 별2개
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
		//로딩 모양 주입용 메소드
		return '<div class="sk-fading-circle"><div class="sk-circle1 sk-circle"></div><div class="sk-circle2 sk-circle"></div><div class="sk-circle3 sk-circle"></div><div class="sk-circle4 sk-circle"></div><div class="sk-circle5 sk-circle"></div><div class="sk-circle6 sk-circle"></div><div class="sk-circle7 sk-circle"></div><div class="sk-circle8 sk-circle"></div><div class="sk-circle9 sk-circle"></div><div class="sk-circle10 sk-circle"></div><div class="sk-circle11 sk-circle"></div><div class="sk-circle12 sk-circle"></div></div>'
	}

});



