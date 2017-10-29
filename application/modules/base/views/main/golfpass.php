<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
	<meta http-equiv="Content-Script-Type" content="text/javascript">
	<meta http-equiv="Content-Style-Type" content="text/css">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>골프패스</title>
	<link rel="stylesheet" type="text/css" href="/public/etc/main/css/common.css" />
	<link rel="stylesheet" type="text/css" href="/public/etc/main/css/style.css" />
	<script type="text/javascript" src="/public/etc/main/js/jquery-1.10.2.min.js"></script>
	<script src="http://design.olivet.co.kr/layouts/ollive/_lib/jquery.tools.min.js"></script>
	<script type="text/javascript" src="http://design.olivet.co.kr/layouts/ollive/_cdn/jquery.easing.1.3.js"></script>
	<script type="text/javascript" src="/public/etc/main/js/common.js"></script>

	<!-- fullmenu -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel="stylesheet" href="/public/lib/fullmenu/css/style.css">

	<!-- fullmenu -->
</head>
<style>
	a.btn:hover{
 color:#ffffffaa;
}
a.btn{
	color :white;
}
</style>
<body>
<div class="plus-btn-pos">
  <div class="plus-btn">
	<div class="info">
			<ul clf>
				<span id=menubar> 
					<a class="btn" onclick="return false;"href="#"> 
						<li style="display:inline-block"><img src="/public/etc/main/images/ico_menu.png" alt="menu"></li>
						<li style="display:inline-block">메뉴</li>
					</a>
				</span>
			</ul>
		</div>
    <!-- <div class="r1"></div>
    <div class="r2"></div> -->
  
</div>
</div>
<div class="content">
	<!-- 메인  -->
<header>
		<h1 class="logo"><a href="#none"><span><!-- logo --></span></a></h1>

		<a style="position:fixed; top:42px; right: 130px;" href="#none"><img src="/public/etc/main/images/ico_my.png" alt=""></a>

		<div class="search">
			<ul class="clf">
				<li><img src="/public/etc/main/images/line_1.png" alt=""></li>
				<li><img src="/public/etc/main/images/ico_search.png" alt="search"></li>
				<li><input type="text" name="" value="" placeholder="관심있는 나라나 골프장을 검색해보세요!"></li>
			</ul>
		</div>
	</header>

	<section class="contents_1" id="paracon1">
		<div class="con1">
			<p class="main_tit"><?=$product_main->name?></p>
			<p>아랍에미레이트, 아부다비 - <?=$product_main->hole_count?>홀 / <?=$product_main->distance?>야드</p>
			<div class="review">
				<ul class="rev_star clf">
					<li class="fill"></li>
					<li class="fill"></li>
					<li class="fill"></li>
					<li class="fill"></li>
					<li></li>
				</ul>
				<span>(리뷰 173개)</span>
			</div>
			<p class="c1_txt">
			<?=$product_main->desc?>
			</p>

			 <a href="<?=site_url(shop_product_uri."/get/{$product_main->id}")?>"><button class="btn type01">보러가기</button></a>
		</div>

		<div class="scrollDown">
			스크롤을 내려주세요.
		</div>

		<aside id="nav">
			<ul>
				<li class="active"><a href="#paracon1"><!-- nav --></a></li>
				<li><a href="#paracon2"><!-- nav --></a></li>
				<li><a href="#paracon3"><!-- nav --></a></li>
				<li><a href="#paracon4"><!-- nav --></a></li>
				<li><a href="#paracon5"><!-- nav --></a></li>
				<li><a href="#paracon6"><!-- nav --></a></li>
				<li><a href="#paracon7"><!-- nav --></a></li>
				<li><a href="#paracon8"><!-- nav --></a></li>
			</ul>
		</aside>
	</section>

	<section class="contents_2" id="paracon2">
		<div class="con2 mobile">
			<p class="sub_tit">나라별 골프장</p>
			<ul class="course_list clf">
				<li><img src="/public/etc/main/images/golf_course_1.jpg" alt="러시아"></li>
				<li><img src="/public/etc/main/images/golf_course_1.jpg" alt="러시아"></li>
				<li><img src="/public/etc/main/images/golf_course_1.jpg" alt="러시아"></li>
			</ul>
		</div>
		<div class="con2 desktop">
			<p class="sub_tit">나라별 골프장</p>
			<ul class="course_list clf">
				<?php for($i=0;$i < count($nation_list)	;$i++){?>
					<li><a href="<?=site_url(shop_product_uri."/gets/{$nation_list[$i]->id}")?>"><img src="<?=$nation_list[$i]->photo?>" alt="<?=$nation_list[$i]->name?>"></a></li>	
				<?php }?>
			
			</ul>
		</div>
	</section>

	<section class="contents_3" id="paracon3">
		<div class="con3 desktop">
			<p class="sub_tit">골프패스 패널이 추천하는 골프장</p>
			<ul class="course_list clf">
			<?php for($i=0;$i<count($products_panel); $i++){?>
				<li>
					<div class="bn_box">
						<span class="price"><?=$products_panel[$i]->weekday_price?>원</span>
						<div class="info_box">
							<div class="sbj">
								골프장과 숙박 시설이 함께 있는 상품입니다.
							</div>
							<p class="tit">
								<span><?=$products_panel[$i]->name?></span><br />
								<?=$products_panel[$i]->eng_name?>
							</p>
							<span class="mark">4.7</span>
						</div>
					</div>
				</li>
			<?php }?>
				<!-- <li>
					<div class="bn_box">
						<span class="price">319,000원</span>
						<div class="info_box">
							<div class="sbj">
								골프장과 숙박 시설이 함께 있는 상품입니다.
							</div>
							<p class="tit">
								<span>앙사나 골프텔</span><br />
								Angsana golftel
							</p>
							<span class="mark">4.7</span>
						</div>
					</div>
				</li>
				<li>
					<div class="bn_box">
						<span class="price">319,000원</span>
						<div class="info_box">
							<div class="sbj">
								골프장과 숙박 시설이 함께 있는 상품입니다.
							</div>
							<p class="tit">
								<span>앙사나 골프텔</span><br />
								Angsana golftel
							</p>
							<span class="mark">4.7</span>
						</div>
					</div>
				</li>
				<li>
					<div class="bn_box">
						<span class="price">319,000원</span>
						<div class="info_box">
							<div class="sbj">
								골프장과 숙박 시설이 함께 있는 상품입니다.
							</div>
							<p class="tit">
								<span>앙사나 골프텔</span><br />
								Angsana golftel
							</p>
							<span class="mark">4.7</span>
						</div>
					</div>
				</li> -->
			</ul>
		</div>
	</section>

	<section class="contents_4" id="paracon4">
		<div class="con4 mobile">
			<p class="sub_tit">테마별 골프장</p>
			<ul class="course_list">
				<li><img src="/public/etc/main/images/golf_theme_1.jpg" alt="러시아"></li>
				<li><img src="/public/etc/main/images/golf_theme_1.jpg" alt="러시아"></li>
				<li><img src="/public/etc/main/images/golf_theme_1.jpg" alt="러시아"></li>
			</ul>
		</div>
		<div class="con4 desktop">
			<p class="sub_tit">테마별 골프장</p>
			<ul class="course_list clf">
			<?php for($i=0;$i < count($thema_list)	;$i++){?>
				<li><a href="<?=site_url(shop_product_uri."/gets/{$thema_list[$i]->id}")?>"><img src="<?=$thema_list[$i]->photo?>" alt="">
						<p class="cont">
							<span><?=$thema_list[$i]->name?></span><br />트렌디한 코스를 경험하고 싶다면
						</p>
						</a>
				</li>
			<?php }?>
			</ul>
		</div>
	</section>

	<section class="contents_5" id="paracon5">
		<div class="con5 desktop">
			<p class="sub_tit">순위별 골프장</p>
			<ul class="course_menu clf">
				<li class="on">#평점이 높은 코스</li>
				<li>#전략성이 요구되는 코스</li>
				<li>#식사가 맛있는 코스</li>
				<li>#가성비 좋은 코스</li>
				<li>#시설이 화려한 코스</li>
			</ul>

			<div class="inner_box clf">
				<div class="list_top">
					<ul>
						<li><img src="/public/etc/main/images/golf_club_1.png" alt="힐데스하임 CC"></li>
						<li><img src="/public/etc/main/images/golf_club_2.png" alt="마요네즈 클럽"></li>
						<li><img src="/public/etc/main/images/golf_club_3.png" alt="야챗 클럽"></li>
					</ul>
				</div>
				<div class="list_default">
					<table>
					<colgroup>
						<col width="10%" />
						<col width="" />
						<col width="25%" />
					</colgroup>
					<tbody>
						<tr>
							<td class="first">4</td>
							<td>힐데스하임 CC</td>
							<td class="last">베트남 호치민</td>
						</tr>
						<tr>
							<td class="first">5</td>
							<td>힐데스하임 CC</td>
							<td class="last">베트남 호치민</td>
						</tr>
						<tr>
							<td class="first">6</td>
							<td>힐데스하임 CC</td>
							<td class="last">베트남 호치민</td>
						</tr>
						<tr>
							<td class="first">7</td>
							<td>힐데스하임 CC</td>
							<td class="last">베트남 호치민</td>
						</tr>
						<tr>
							<td class="first">8</td>
							<td>힐데스하임 CC</td>
							<td class="last">베트남 호치민</td>
						</tr>
						<tr>
							<td class="first">9</td>
							<td>힐데스하임 CC</td>
							<td class="last">베트남 호치민</td>
						</tr>
						<tr>
							<td class="first">10</td>
							<td>힐데스하임 CC</td>
							<td class="last">베트남 호치민</td>
						</tr>
					</tbody>
					</table>
					<p class="btn_more_view"><span>전체 순위표 보러가기</span></p>
				</div>
			</div>
		</div>
	</section>

	<section class="contents_6" id="paracon6">
		<div class="con6 desktop">
			<p class="sub_tit">골프패스 패널 소개</p>
			<ul class="panel_list">
				<li>
					<dl class="inner">
						<dt><img src="/public/etc/main/images/sample_img1.png" alt=""></dt>
						<dd>
							김지윤
							<span class="post_num">150개</span>
							<p>
								아동병원을 운영하고 있는 소아과의사입니다.<br>
								인문학을 좋아하여 책을 읽고 글을 써서 나누고
							</p>
							<span class="arrow"><!-- 블릿 --></span>
						</dd>
					</dl>
				</li>
				<li>
					<dl class="inner">
						<dt><img src="/public/etc/main/images/sample_img1.png" alt=""></dt>
						<dd>
							김지윤
							<span class="post_num">150개</span>
							<p>
								아동병원을 운영하고 있는 소아과의사입니다.<br>
								인문학을 좋아하여 책을 읽고 글을 써서 나누고
							</p>
							<span class="arrow"><!-- 블릿 --></span>
						</dd>
					</dl>
				</li>
				<li>
					<dl class="inner">
						<dt><img src="/public/etc/main/images/sample_img1.png" alt=""></dt>
						<dd>
							김지윤
							<span class="post_num">150개</span>
							<p>
								아동병원을 운영하고 있는 소아과의사입니다.<br>
								인문학을 좋아하여 책을 읽고 글을 써서 나누고
							</p>
							<span class="arrow"><!-- 블릿 --></span>
						</dd>
					</dl>
				</li>
				<li>
					<dl class="inner">
						<dt><img src="/public/etc/main/images/sample_img1.png" alt=""></dt>
						<dd>
							김지윤
							<span class="post_num">150개</span>
							<p>
								아동병원을 운영하고 있는 소아과의사입니다.<br>
								인문학을 좋아하여 책을 읽고 글을 써서 나누고
							</p>
							<span class="arrow"><!-- 블릿 --></span>
						</dd>
					</dl>
				</li>
				<li>
					<dl class="inner">
						<dt><img src="/public/etc/main/images/sample_img1.png" alt=""></dt>
						<dd>
							김지윤
							<span class="post_num">150개</span>
							<p>
								아동병원을 운영하고 있는 소아과의사입니다.<br>
								인문학을 좋아하여 책을 읽고 글을 써서 나누고
							</p>
							<span class="arrow"><!-- 블릿 --></span>
						</dd>
					</dl>
				</li>
				<li>
					<dl class="inner">
						<dt><img src="/public/etc/main/images/sample_img1.png" alt=""></dt>
						<dd>
							김지윤
							<span class="post_num">150개</span>
							<p>
								아동병원을 운영하고 있는 소아과의사입니다.<br>
								인문학을 좋아하여 책을 읽고 글을 써서 나누고
							</p>
							<span class="arrow"><!-- 블릿 --></span>
						</dd>
					</dl>
				</li>
			</ul>
			<p class="btn_more_view"><span>전체 순위표 보러가기</span></p>
		</div>
	</section>

	<section class="contents_7" id="paracon7">
		<div class="con7 desktop">
			<div class="movie_play">
				<iframe width="560" height="315" src="https://www.youtube.com/embed/qEVO9XZ9WEA" frameborder="0" allowfullscreen></iframe>
			</div>
		</div>
	</section>

	<section class="contents_8" id="paracon8">
		<div class="con8 desktop clf">
			<p class="sub_tit clf">PARTNERS</p>
			<ul class="partner clf">
				<li><img src="/public/etc/main/images/partner_google.png" alt="google"></li>
				<li><img src="/public/etc/main/images/partner_facebook.png" alt="facebook"></li>
				<li><img src="/public/etc/main/images/partner_instar.png" alt="instargram"></li>
				<li><img src="/public/etc/main/images/partner_naver.png" alt="naver"></li>
				<li><img src="/public/etc/main/images/partner_daum.png" alt="daum"></li>
			</ul>
			<ul class="sub_menu">
				<li>ABOUT US
					<ul>
						<li>회사소개</li>
						<li>이용약관</li>
						<li>개인 정보 취급 방침</li>
					</ul>
				</li>
				<li>OFFICE
					<ul>
						<li>TEL 1500-1500</li>
					</ul>
				</li>
				<li>CONTACT US
					<ul>
						<li>상호 PLAY SEVEN</li>
						<li>대표 홍길동</li>
						<li>사업자등록번호 000-00-00000</li>
						<li>통신판매신고번호 2017-서울강서-0000호</li>
						<li>개인정보관리책임자 홍길동</li>
					</ul>
				</li>
				<li>NEWS LEDTTER
					<ul>
						<li><input type="text" name="" value="" class="email" placeholder="E-mail을 입력해주세요."></li>
						<li>골프패스에서 제공하는 유용한 소식</li>
					</ul>
				</li>
			</ul>
		</div>
		<span class="foot_copy">© 2017 GOLFPASS. All Rights Reserved.</span>
	</section>
<!-- 메인  -->
</div>

<div class="menu-container">
  <div class="menu-sliders"></div>
  <div class="menu-sliders"></div>
  <div class="menu-sliders"></div>
  <div class="menu">
    <ul>
	<?php if(is_admin()){?>
      <li>
        <a href="<?=site_url(admin_home_uri.'')?>">관리자 페이지</a>
	  </li>
	  <?php }?>
      <li>
        <a href="<?=site_url('')?>">골프패스</a>
	  </li>
	
	  <li>
      <a href="<?=site_url(shop_category_uri.'/gets_by_name/나라별')?>">나라별 골프장</a>
        
	  </li>
	  <li>
      <a href="<?=site_url(golfpass_panel_uri.'/gets')?>">패널소개</a>
        
	  </li>

	  <?php if(!is_login()){?>
      <li>
        <a href="<?=site_url(user_uri.'/login')?>">로그인</a>
        
	  </li>
      <li>
      <a href="<?=site_url(user_uri.'/register_agree_1')?>">회원가입</a>
        
	  </li>
	  <?php }?>
	  <?php if(is_login()){?>
	
      <li>
        <a href="<?=site_url(user_uri.'/logout')?>">로그아웃</a>
	  </li>
	  <?php }?>
      <li>
        <a href="<?=site_url(shop_mypage_uri.'')?>">마이페이지      </a>
      </li>
      <li>
        <a href="<?=site_url(shop_wishlist_uri.'/gets')?>">위시리스트      </a>
      </li>
      <li>
        <a href="<?=site_url(shop_contact_uri.'')?>">고객센터</a>
      </li>
    </ul>
  </div>
</div>



</body>
<!-- fullmenu -->
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
	<script  src="/public/lib/fullmenu/js/index.js"></script>
	<!-- fullmenu -->
</html>
