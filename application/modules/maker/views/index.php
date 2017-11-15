


<div style="margin-top:50px;"></div>
<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.2.13/dist/semantic.min.css">
<script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.2.13/dist/semantic.min.js"></script>
<!-- <script src="/public/framework/semantic/src/less.min.js"></script> -->
<style>
    .green{
        color : green;
    }
</style>
<div class="ui header">현재 페이지 컨트롤러 : maker / controllers / Maker.php</div>
<div class="ui header">현재 페이지 뷰디렉토리 : maker / views / index.php</div>
<div class="ui header">--------------퍼블리싱 파일목록 maker / views / ???-----------------</div>

<ul class="ui ul">
    <?php for($i=0 ; $i<count($publishing); $i++){?>
    <li><?=$publishing[$i]?></li>
    <?php }?>

</ul>
<div class="ui header">--------------버그 및 수정사항 목록-----------------</div>

<ul class="ui ul">
    <li>메인페이지 메뉴 아이콘 따로놈</li>
    <li>시맨틱하고 헤더메뉴하고 css 겹침</li>
    <li>회원가입 프로필 사진 업로드 버그(업로드안됌)</li>
    <li>메인슬라이드쇼 여러개 상품 할수있게 해야됌.</li>
    <li>상품 디테일 페이지 바탕 해당상품 사진으로.</li>
    <li class="green">카테고리 페이지와 상품 리스트 페이지에서 최대 개수 10개로 변경(완)</li>
    <li class="green">상품 리스트 페이지 DB 연동 (완료)</li>
    <li>패널 소개 페이지에서 리스트에 노출되는 게시글 미리보기 최대 2줄 제한</li>
        <li>패널 페이지네이션 디자인적용</li>
</ul>
   <ul>
<li>메인 전체 폰트 속성 체크</li>
<li>메인 전체 여백 속성 체크</li>
<li>메인 영어 이름 추가</li>
<li>메인 헤더/푸터 정돈</li>
<li>햄버거 메뉴 리스트 정돈</li>
<li>실시간 검색 기능 정상 작동</li>
<li>검색창에서 엔터쳤을 때 검색 결과 페이지로 이동</li>
<li>메인 섹션 1에서 넘어갈 때 속도를 증가시켜 답답함을 없애야 함</li>
<li>나라별 골프장부터 메뉴를 활성화 했을 때 메뉴를 비활성화 없는 상황 조치</li>
<li>골프패스 패널이 추천하는 골프장 가격 연동</li>
<li>순위별 골프장 1, 2, 3위 이미지 솔루션</li>
<li>순위별 골프장 리스트에서 점수도 표기</li>
<li>유튜브 영상 확대</li>
<li>뉴스레터 기능 활성화</li>
<li>인터컴 탑재</li>
<li>햄버거 메뉴 배너 추가</li>
</ul>
<ul>
<li>검색 페이지 생성</li>
</ul>
<ul>
<li>상품 카테고리 헤더/푸터 정돈</li>
<li>햄버거 메뉴 리스트 정돈</li>
<li>상품 카테고리 리스트에서 일본, 필리핀, 태국, 중국만 2차 카테고리</li>
<li>상품 카테고리 이미지 추가</li>
</ul>
<ul>
<li>상품 리스트 헤더/푸터 정돈</li>
<li>햄버거 메뉴 리스트 정돈</li>
<li>QUICK VIEW -> 위시리스트로 변경</li>
<li>MORE 삭제</li>
<li>슬라이드쇼 기능 제거</li>
</ul>
<ul>
<li>상품 디테일 헤더/푸터 정돈</li>
<li>상품 디테일 페이지 타이틀 축소</li>
<li>햄버거 메뉴 리스트 정돈</li>
<li>여행 일정 -> 출발 일정 변경</li>
<li>출발 일정 -> 도착 일정 변경</li>
<li>예약하기 버튼 활성화</li>
<li>가격 정보 연동</li>
<li>반응형 정돈</li>
<li>여백/폰트 속성 체크</li>
<li>취소/환불 항목 설정</li>
<li>구글맵 작동</li>
</ul>
<ul>
<li>상품 리뷰 모두보기</li>
<li>상품 리뷰 헤더/푸터 정돈</li>
<li>상품 리뷰 페이지 타이틀 축소</li>
<li>햄버거 메뉴 리스트 정돈</li>
<li>반응형 정돈</li>
<li>리뷰 쓰기 버튼 생성</li>
<li>점수 남기기 버튼 생성</li>
<li>상품 리뷰에 수정/삭제 생성</li>
</ul>
<ul>
<li>상품 리뷰 쓰기 페이지 생성</li>
</ul>
<ul>
<li>상품 리뷰 수정 페이지 생성</li>
</ul>
<ul>
<li>점수 남기기 페이지 생성</li>
</ul>
<ul>
<li>마이페이지에서 총 결제 금액 표기</li>
<li>투어 코디네이터 삭제</li>
<li>위시리스트 작동</li>
<li>라운드 작동</li>
<li>주문수 작동</li>
<li>회원 수정 작동</li>
<li>회원 탈퇴 작동</li>
</ul>
<ul>
<li>고객센터</li>
<li>공지사항 생성</li>
<li>Q&A 생성</li>
<li>FAQ 생성</li>
</ul>
<ul>
    <li>패널 페이지 - 헤더/푸터 정상 출력 (왜 이러는지 모르겠읍니다..)</li>
    <li style="color:red;">패널 페이지 - 패널이 1페이지에 1명만 노출되는 현상</li>
    <li style="color:red;">패널 페이지 - 패널 개인 페이지로 접근했을때 다른 패널도 보이는 문제</li>
    <li style="color:red;">패널 페이지 - 개인 패널 페이지로 접근하면 미리보기가 모두 펼쳐지며 포스팅 미리보기 옆 이미지가 프로필 사진이 되는 현상</li>
    <li style="color:red;">패널 페이지 - 게시글 리스트 중 1페이지가 아닌 페이지에 접근하면 미리보기가 모두 펼쳐지며 포스팅 미리보기 옆 이미지가 프로필 사진이 되는 현상</li>
    <li style="color:red;">패널 페이지 - 미리보기에서 이미지가 사라진 자리에 띄어쓰기가 남는 현상</li>
    <li>패널 페이지 - 미리보기 이미지 폼 변경</li>
</ul>
<ul>
    <li>패널 포스팅 재작업</li>
</ul>

<div class="ui header">---------사이트 맵-----------</div>
<div class="ui header">base</div>
<table class="ui table ">
<tr>
    <td>이름</td>
    <td>url</td>
    <td>view_dir</td>
</tr>
<?php for($i=0; $i < count($base); $i++){?>
    <tr>
    <td><?=$base[$i]->name?></td>
    <td><a href="<?=$base[$i]->url?>"><?=$base[$i]->url?></a></td>
    <td><?=$base[$i]->view_dir?></td>

    </tr>
<?php }?>
</table>
<div class="ui header">shop</div>
<table class="ui table ">
<tr>
    <td>이름</td>
    <td>url</td>
    <td>view_dir</td>
</tr>
<?php for($i=0; $i < count($shop); $i++){?>
    <tr>
    <td><?=$shop[$i]->name?></td>
    <td><a href="<?=$shop[$i]->url?>"><?=$shop[$i]->url?></a></td>
    <td><?=$shop[$i]->view_dir?></td>

    </tr>
<?php }?>
</table>
<div class="ui header">etc</div>
<table class="ui table ">
<tr>
    <td>이름</td>
    <td>url</td>
    <td>view_dir</td>
</tr>
<?php for($i=0; $i < count($etc); $i++){?>
    <tr>
    <td><?=$etc[$i]->name?></td>
    <td><a href="<?=$etc[$i]->url?>"><?=$etc[$i]->url?></a></td>
    <td><?=$etc[$i]->view_dir?></td>

    </tr>
<?php }?>
</table>