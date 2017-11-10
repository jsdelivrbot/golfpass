$(function() {
	var search = $('.search-container');
	var searchInput = $('.search-container>input');
	var searchContentContainer = $('.search-content-container');//검색내용 컨테이너
  var searchItems=$('.search-items');//리스트 채울 ul
	searchInput.on('focus', function() {
		$(search).addClass('focus');
	});
	searchInput.on('keyup', function() {
		$(searchContentContainer).removeClass('d-none');
    //NOTE test코드
    var data=[{
      title:'앙사나골프텔',
      imagePath:'/public/images/product.jpg',
      score:4.5,
      article:'ㄴㅁㄻㄴㄻㄶㅁㄴㅇㅎㄴㅇㅁㅎㄴㅁㅇㅎㄴㅁㅇㅎㄴㅇㅁㅎㄴㅇㅁㅎㄴㅁㅇㅎㄴㅇㅎㄴㅇㅎㄴㅇㅎㄶㅇ'
    },{
      title:'앙사나골프텔',
      imagePath:'/public/images/product.jpg',
      score:4.5,
      article:'ㄴㅁㄻㄴㄻㄶㅁㄴㅇㅎㄴㅇㅁㅎㄴㅁㅇㅎㄴㅁㅇㅎㄴㅇㅁㅎㄴㅇㅁㅎㄴㅁㅇㅎㄴㅇㅎㄴㅇㅎㄴㅇㅎㄶㅇ'
    },{
      title:'앙사나골프텔',
      imagePath:'/public/images/product.jpg',
      score:4.5,
      article:'ㄴㅁㄻㄴㄻㄶㅁㄴㅇㅎㄴㅇㅁㅎㄴㅁㅇㅎㄴㅁㅇㅎㄴㅇㅁㅎㄴㅇㅁㅎㄴㅁㅇㅎㄴㅇㅎㄴㅇㅎㄴㅇㅎㄶㅇ'
    },{
      title:'앙사나골프텔2',
      imagePath:'/public/images/product.jpg',
      score:3.2,
      article:'2ㄴㅁㄻㄴㄻㄶㅁㄴㅇㅎㄴㅇㅁㅎㄴㅁㅇㅎㄴㅁㅇㅎㄴㅇㅁㅎㄴㅇㅁㅎㄴㅁㅇㅎㄴㅇㅎㄴㅇㅎㄴㅇㅎㄶㅇ'
    }];
    var input = '';
    for (var i = 0; i < data.length; i++) {
      input += '<li class="search-item d-flex align-items-strech">'
      input += '<div class="image d-flex align-items-center justify-content-center">'
      input += '<img class="rounded-circle" src="' + data[i].imagePath + '"alt="검색이미지" width="100%;">'
      input += '</div>'
      input += '<div class="content">'
      input += '<div class="title d-flex align-items-center">' + data[i].title + '<span class="pl-2 score-icon d-flex">'+printStar(parseFloat(data[i].score))+'</span><span class="pl-2 score-text">(종합 점수'+parseFloat(data[i].score)+')</span></div>'
      input += '<div class="article">'+data[i].article+'</div>';
    } //loop end
    $(searchItems).empty().append(input);
		//TODO AJAX 코드 실행..
		/*$.ajax({
			url: 'url..'
			type: 'get',
			data: {
				search: searchInput.val()
			},
			success: function(data) {
				var input = '';
				for (var i = 0; i < data.length; i++) {
					input += '<li class="search-item d-flex align-items-strech">'
					input += '<div class="image d-flex align-items-center justify-content-center">'
					input += '<img class="rounded-circle" src="' + data[i].이미지경로 + '"alt="검색이미지" width="100%;">'
					input += '</div>'
					input += '<div class="content">'
					input += '<div class="title d-flex align-items-center">' + data[i].제목 + '<span class="pl-2 score-icon d-flex">'+printStar(parseFloat(data[i].점수))+'</span><span class="pl-2 score-text">(종합 점수'+parseFloat(data[i].점수)+')</span></div>'
          input += '<div class="article">'+data[i].내용+'</div>';
				} //loop end
        $(searchItems).empty().append(input);
			}//success
		}) //ajax end*/
	});
	searchInput.on('blur', function() {
    //NOTE input에서 focus풀렷을시 안보임 작업시 주석
		$(searchContentContainer).addClass('d-none');
		searchInput.val('');
	});
	/*    <p>검색결과 <span> / 총 7,790,000개</span></p>
	    <div>
	        <!--NOTE 검색결과 내용-->
	        <ul class="search-items">
	            <li class="search-item d-flex align-items-strech">
	                <div class="image d-flex align-items-center justify-content-center">
	                    <img class="rounded-circle" src="/public/images/product.jpg" alt="검색이미지" width="100%;">
	                </div>
	                <div class="content">
	                    <div class="title d-flex align-items-center">앙사나골프텔<span class="pl-2 score-icon d-flex"><i class="xi-star"></i><i class="xi-star-o"></i></span><span class="pl-2 score-text">(종합 점수 4.7점)</span></div>
	                    <div class="article">ad impedit? Similique quaerat cum ipsum inventore, beatae iste consequatur fuga voluptates itaque quae illo velit delectus accusantiumSimilique quaerat cum ipsum inventore, beatae iste consequatur fuga voluptates itaque quae illo velit delectus accusantiumSimilique quaerat cum ipsum inventore, beatae iste consequatur fuga voluptates itaque quae illo velit delectus accusantium.</div>
	                </div>
	            </li>
	        </ul>
	    </div>*/
      function printStar(score){
          var temp = Math.floor(score);
          var MAX_STAR=5;
          var output ='';
          for(var i = 0 ; i<MAX_STAR ;i++){
            if(i<temp){
              //채워진별
              output+='<i class="xi-star"></i>';
            }else{
              //빈 별
              output+='<i class="xi-star-o"></i>';
            }
          }
          return output;
      }
});
