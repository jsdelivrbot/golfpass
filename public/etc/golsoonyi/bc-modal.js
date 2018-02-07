// BEAUTIFUL CSS
var state = 1,
  count = 0,
  heading = [
    '',
    '안녕하세요<br><b>코디네이터 골순이</b>에요',
    '이번 골프 여행의<br><b>인원</b>은 어떻게 되세요?',
    '<b>날짜</b>를 선택해주세요',
    '<b>지역</b>은 정하셨나요?',
    '<b>지역</b>을 입력해주세요',
    '<b>희망 사항</b>을 골라주세요',
    '<b>지정 공프장</b>이 있으신가요?',
    '<b>골프장</b>을 알려주세요',
    '<b>희망 사항</b>을 골라주세요',
    '<b>숙박</b>은 정하셨어요?',
    '<b>숙소명</b>을 알려주세요',
    '<b>희망 사항</b>을 골라주세요',
    '<b>현지 이동</b>은 어떡할까요?',
    '어디로 <b>연락</b>드릴까요?',
    '<b>접수</b>가 완료되었습니다',
    '<b>항공</b>에 대해서'
  ],
  prev = $('.u-modal__btn-prev'),
  next = $('.u-modal__btn-next'),
  state_bar = $('.u-modal__state-bar'),
  num = $('[data-state="2"] [type="number"]');

function state_change_down() {
  if (state == 1) {
    shut_down();
  } else if (state == 6 || state == 7) {
    state = 4;
    change_state();
  } else if (state == 9 || state == 10) {
    state = 7;
    change_state();
  } else if (state == 12 || state == 13) {
    state = 10;
    change_state();
  } else {
    state--;
    change_state();
  }
}

function state_change_up() {
  if (state == 4 || state == 7 || state == 10) {
    alert('둘 중 하나를 선택해주세요.');
  } else if (state == 5 || state == 8 || state == 11) {
    state = state + 2;
    change_state();
  } else if (state == 15 || state == 16) {
    // 나가기 버튼 클릭시, 최종 전송시
    shut_down();
    state = 1;

    // 나가기 버튼 클릭시, 최종 전송시
  } else {
    state++;
    change_state();
  }
}

function state_change_up_d(e) {
  state = state + 2;
  change_state();
  e.preventDefault();
}

function state_change_up_o(e) {
  state++;
  change_state();
  e.preventDefault();
}

function change_state() {
  $('[data-state]').hide();
  change_title(state);
  change_btn_text(state);
  change_state_bar(state);
  $("[data-state='" + state + "']").show();
}

function change_title(i) {
  $('#u-modal__head').html(heading[i]);
}

function shut_down() {
  $('.u-modal--wrap').hide();
}
next.data("swajax",true);
function change_btn_text(state) {
  if (state == 1) {
    prev.show().text('나중에요');
    next.removeClass('alone').text('네, 좋아요');
  } else if (state == 4) {
    prev.text('뒤로');
    next.text('절반 남았어요');
  } else if (state == 13) {
    prev.show().text('뒤로');
    next.removeClass('alone').text('마지막 입니다');
  
  } else if (state == 14) {
    prev.hide();
    next.addClass('alone').text('수고하셨어요');
    //수고하셨어요 클릭하면 에이잭스로 데이터보내기
    next.click(function(){
      //swajax는 수고하셨어요 버튼만 에이잭스 보내기위한 switch
      if( next.data("swajax") === false) return;
      var url = "/index.php/shop/hope_travel";
      $form = $("#form_golsoonyi");
      var queryString = $form.serialize();
         $.ajax({
            type: "POST",
            dataType : 'json',
            data: queryString,
            url: url,
            success:function(data){
                console.log(data);
            }
        });
        next.data("swajax",false);
    });
  } else if (state == 15 || state == 16) {
    next.data("swajax",true);
    next.text('나가기');
  } else {
    prev.show().text('뒤로');
    next.text('다음으로');
  }
}

function change_state_bar(state) {
  if (state == 1) {
    state_bar.css({
      width: '0%'
    });
  } else if (state == 2) {
    state_bar.css({
      width: '12.5%'
    });
  } else if (state == 3) {
    state_bar.css({
      width: '25%'
    });
  } else if (state == 4 || state == 5 || state == 6) {
    state_bar.css({
      width: '37.5%'
    });
  } else if (state == 7 || state == 8 || state == 9) {
    state_bar.css({
      width: '50%'
    });
  } else if (state == 10 || state == 11 || state == 12) {
    state_bar.css({
      width: '62.5%'
    });
  } else if (state == 13) {
    state_bar.css({
      width: '75%'
    });
  } else if (state == 14) {
    state_bar.css({
      width: '87.5%'
    });
  } else if (state == 15 || state == 16) {
    state_bar.css({
      width: '100%'
    });
  }
}

$('.u-modal__num-down').on('click', function (e) {
  count--;
  num.val(count);
  if (count == 0) {
    $('.u-modal__num-down').hide();
  }
  e.preventDefault();
});

$('.u-modal__num-up').on('click', function (e) {
  $('.u-modal__num-down').show();
  count++;
  num.val(count);
  e.preventDefault();
});

prev.on('click', state_change_down);
next.on('click', state_change_up);
$('.u-modal__btn-next-o').on('click', state_change_up_o);
$('.u-modal__btn-next-d').on('click', state_change_up_d);

// 최초 시작
$('.u-modal--trigger_wrap').on('click', function () {
  $('.u-modal--wrap').show();
  change_state();
})

$('.u-modal--select').on('change', function () {
  var self = $(this),
    v = self.val();
  if (v == '직접입력') {
    self.next().show();
  } else {
    self.next().hide();
  }
});

$('.u-modal--trigger_wrap').delay(2000).animate({
  right: '15px'
}, 1000, "swing");

// jquery ui
$("#datepicker1").datepicker();
$("#datepicker2").datepicker();