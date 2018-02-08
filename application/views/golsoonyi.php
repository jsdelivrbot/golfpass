    <!-- // 골순이 스타일시작 -->
    <link rel="stylesheet" href="/public/etc/golsoonyi/jqueryui.css">
    <link rel="stylesheet" href="/public/etc/golsoonyi/style.css">
<!-- // 골순이 스타일 끝 -->

<!--<div style="position:fixed; right :0px; bottom: 10px;z-index:9999">-->
<div style="position:fixed; right :0px; bottom: 10px; z-index: 1;">
<div class="u-modal--trigger_wrap">
    <p style="margin-top : 12px;">
      <b>코디네이터 골순이</b>
      <br>당신만의 맞춤 여행을 설계해드립니다.</p>
    <button class="u-modal--trigger">시작</button>
  </div>
</div>
  <!-- 모달 bg -->
  <div class="u-modal--wrap" style="z-index:1000">

    <!-- 모달 -->
    <div class="u-modal">

      <!-- body  -->
      <div class="u-modal__body">

        <!-- 상단 -->
        <header>
          <h4 id="u-modal__head">안녕하세요
            <br>
            <b>코디네이터 골순이</b>에요</h4>
        </header>

        <!-- 폼 -->
        <form id="form_golsoonyi">

          <!-- state 1 -->
          <div data-state="1">
            <select name="state1" id="" class="u-modal--select">
              <option value="골프장만 예약하고 싶어요!">골프장만 예약하고 싶어요!</option>
              <option value="골프장은 물론, 숙박도 필요해요~">골프장은 물론, 숙박도 필요해요~</option>
              <option value="직접 입력">직접 입력</option>
            </select>
            <input type="text" name="state1_1" id="" placeholder="직접 입력해주세요!">

            <p>고객님의 스타일, 여행 일정에 맞는<br>골프 투어를 만들어 볼까요?</p>
          </div>

          <!-- state 2 -->
          <div data-state="2">
            <input type="text" name="state2" id="" placeholder="0" disabled><!--입력불가-->
            <button class="u-modal__num-down"></button>
            <button class="u-modal__num-up"></button>
          </div>

          <!-- state 3 -->
          <div data-state="3" class="u-modal__cal">
            <p>
              <img src="/public/etc/golsoonyi/img/modal-cal.png" alt="" srcset=""> </p>

            <input name="start_date" id="datepicker1" placeholder="시작 날짜" readonly>
            <input name="end_date" id="datepicker2" placeholder="도착 날짜" readonly>
          </div>
          <div class="dashed" data-state="3"></div>
          <div data-state="3">
            <p>평일엔 더 여유롭고 합리적인 구성이 가능합니다.</p>
          </div>

          <!-- state 4 -->
          <div data-state="4">
            <button class="u-modal__btn-next-o">
              <img src="/public/etc/golsoonyi/img/modal-map.png" alt="">
              <span>정했어요</span>
            </button>
            <button class="u-modal__btn-next-d">
              <img src="/public/etc/golsoonyi/img/modal-map-q.png" alt="">
              <span>아직이요</span>
            </button>
          </div>

          <div data-state="5">
            <input type="text" name="state4_1" id="" placeholder="ex) 오키나와">
          </div>

          <div data-state="6">
            <select name="state4_2" id="" class="u-modal--select">
              <option value="동경 시내에서 가까운 곳이 좋아요~">동경 시내에서 가까운 곳이 좋아요~</option>
              <option value="오사카 시내에서 가까운 곳이 좋아요~">오사카 시내에서 가까운 곳이 좋아요~</option>
              <option value="따뜻한 큐슈나 오키나와로 갈래요!">따뜻한 큐슈나 오키나와로 갈래요!</option>
              <option value="시원한 북해도가 최고~">시원한 북해도가 최고~</option>
              <option value="한적한 리조트에서 푹 쉬면서 골프만 칠래요!">한적한 리조트에서 푹 쉬면서 골프만 칠래요!</option>
              <option value="직접 입력">직접 입력</option>
            </select>
            <input type="text" name="state4_2_1" id="" placeholder="직접 입력해주세요!">
          </div>

          <!-- state 5 -->
          <div data-state="7">
            <button class="u-modal__btn-next-o">
              <img src="/public/etc/golsoonyi/img/modal-pin.png" alt="">
              <span>있어요</span>
            </button>
            <button class="u-modal__btn-next-d">
              <img src="/public/etc/golsoonyi/img/modal-pin-q.png" alt="">
              <span>없어요</span>
            </button>
          </div>

          <div data-state="8">
            <input type="text" name="state5_1" id="" placeholder="ex) 니죠 C.C. / 나리타 G.C.">
            <div class="u-modal__radio">
              <label for="id1">
                <input type="radio" name="caddy1" value="캐디무관" id="id1" checked="checked">
                <span>캐디 무관</span>
              </label>
              <label for="id2">
                <input type="radio" name="caddy1" value="캐디필수" id="id2">
                <span>캐디 필수</span>
              </label>
            </div>
          </div>
          <div class="dashed" data-state="8"></div>
          <div data-state="8">
            <p>일본은 캐디가 있는 골프장이 많지 않아
              <br>캐디를 원하시면 선택에 제한이 생길 수 있어요.
            </p>
          </div>

          <div data-state="9">
            <select name="state5_2" id="" class="u-modal--select">
              <option value="골프텔이 붙어있는 곳으로 가고싶어요~">골프텔이 붙어있는 곳으로 가고싶어요~</option>
              <option value="무엇보다도 가성비가 최우선!">무엇보다도 가성비가 최우선!</option>
              <option value="저녁에 관광하려면 시내가 가까운게 좋아요~">저녁에 관광하려면 시내가 가까운게 좋아요~</option>
              <option value="무조건 공항에서 가까운 곳이 편해요!">무조건 공항에서 가까운 곳이 편해요!</option>
              <option value="TV에서 본 프리미엄 코스에 가고싶어요!">TV에서 본 프리미엄 코스에 가고싶어요!</option>
              <option value="직접 입력">직접 입력</option>
            </select>
            <input type="text" name="state5_2_1" id="" placeholder="직접 입력해주세요!">
            <div class="u-modal__radio">
              <label for="id3">
                <input type="radio" name="caddy2" value="캐디무관" id="id3" checked="checked">
                <span>캐디 무관</span>
              </label>
              <label for="id4">
                <input type="radio" name="caddy2" value="캐디필수"id="id4">
                <span>캐디 필수</span>
              </label>
            </div>
          </div>
          <div class="dashed" data-state="9"></div>
          <div data-state="9">
            <p>일본은 캐디가 있는 골프장이 많지 않아
              <br>캐디를 원하시면 선택에 제한이 생길 수 있어요.
            </p>
          </div>

          <!-- state 6 -->
          <div data-state="10">
            <button class="u-modal__btn-next-o">
              <img src="/public/etc/golsoonyi/img/modal-hotel.png" alt="">
              <span>정했어요</span>
            </button>
            <button class="u-modal__btn-next-d">
              <img src="/public/etc/golsoonyi/img/modal-hotel-q.png" alt="">
              <span>아직이에요</span>
            </button>
          </div>

          <div data-state="11">
            <input type="text" name="state6_1" id="" placeholder="ex) 카누차 리조트 호텔">
          </div>

          <div data-state="12">
            <select name="state6_2" id="" class="u-modal--select">
              <option value="골프치고 바로 골프텔로 고고!">골프치고 바로 골프텔로 고고!</option>
              <option value="가격이 합리적이었으면 좋겠어요~">가격이 합리적이었으면 좋겠어요~</option>
              <option value="일본식 료칸(다다미)을 경험해보고 싶어요!">일본식 료칸(다다미)을 경험해보고 싶어요!</option>
              <option value="저녁에 관광하려면 시내가 가까운게 좋아요~">저녁에 관광하려면 시내가 가까운게 좋아요~</option>
              <option value="무조건 공항에서 가까운 곳이 편해요!">무조건 공항에서 가까운 곳이 편해요!</option>
              <option value="고급 브랜드 호텔을 선호해요!">고급 브랜드 호텔을 선호해요!</option>
              <option value="직접 입력">직접 입력</option>
            </select>
            <input type="text" name="state6_2_1" id="" placeholder="직접 입력해주세요!">
          </div>
          <div class="dashed" data-state="12"></div>
          <div data-state="12">
            <p>호텔은 양실 2인 1실,
              <br> 료칸은 다다미실 3~4인 1실이 기본입니다.
            </p>
          </div>

          <!-- state 7 -->
          <div data-state="13">
            <select name="state7" id="" class="u-modal--select">
              <option value="가능하다면 송영 희망">가능하다면 송영 희망</option>
              <option value="렌터카 예약 예정">렌터카 예약 예정</option>
              <option value="직접 입력">직접 입력</option>
            </select>
            <input type="text" name="state7_1" id="" placeholder="직접 입력해주세요!">
          </div>
          <div class="dashed" data-state="13"></div>
          <div data-state="13">
            <p>일본은 송영 시스템을 운영하지 않는 곳이 많고
              <br> 비싼 편이라 렌터카 이용을 추천드려요!
              <br> 모든 공항에 렌터카 인프라가 깔려있고
              <br> 네비게이션도 한국어를 지원합니다.
            </p>
          </div>

          <!-- state 8 -->
          <div data-state="14">
            <input type="text" name="name" id="" placeholder="이름을 적어주세요" >
            <!--onkeypress="if(event.keyCode<45||event.keyCode>57)event.returnValue = false;" style="IME-MODE:disabled;"-->
            <input type="tel" onkeypress="if(event.keyCode<45||event.keyCode>57)event.returnValue = false;" style="IME-MODE:disabled;" name="phone" id="" placeholder="연락처를 적어주세요" >
          </div><!--숫자만 입력-->

          <!-- state 9 -->
          <div data-state="15">
            <button class="u-modal__btn-next-o">
              <img src="/public/etc/golsoonyi/img/modal-plane.png" alt="">
              <span>잠깐, 항공은요</span>
            </button>
          </div>

          <!-- state 10 -->
          <div data-state="16">
            <p>저희는 항공권 수배 대행을
              <br> 하고 있지 않습니다.
              <br> 해당 항공사 홈페이지, 어플이나
              <br> 스카이 스캐너, 인터파크 투어 등을
              <br> 이용하시면 굉장히 저렴해집니다.
            </p>
          </div>
        </form>
      </div>

      <!-- state -->
      <div class="u-modal__state">
        <span class="u-modal__state-bar"></span>
      </div>

      <!-- 하단 버튼 -->
      <div class="u-modal__btn">
        <button class="u-modal__btn-prev">나중에요</button>
        <button class="u-modal__btn-next">네, 좋아요</button>
      </div>
    </div>
  </div>

      <!-- 골순이 스크립트 시작 -->

  <!-- <script src="/public/etc/golsoonyi/jquery.js"></script> -->
  <script src="/public/etc/golsoonyi/jqueryui.js"></script>
  <script src="/public/etc/golsoonyi/bc-modal.js"></script>
    <!-- 골순이 스크립트 끝 -->
