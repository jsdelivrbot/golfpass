<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport"
		  content="width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>골프패스</title>
	<!-- Bootstrap core CSS -->
	<script src="/public/sangmin/js/prefixfree.min.js"></script>
	<link rel="stylesheet" href="/public/sangmin/dist/bootstrap/bootstrap.min.css">
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/xeicon@2.3.3/xeicon.min.css">
	<link rel="stylesheet" href="/public/css/main.css">

	<style>
		::-webkit-scrollbar {
			display: none;
		}
		a {
			text-decoration: none !important;
		}
	</style>
</head>

<body class="">
<div class="menu-container position-fixed">
	<div class="menu-sliders"></div>
	<div class="menu-sliders"></div>
	<div class="menu-sliders"></div>
	<div class="menu">
	<ul class="list-unstyled">
		<?php if(is_admin()){?>
			<li>
			<a style="color:white;" href="<?=site_url(admin_home_uri.'')?>">관리자 페이지</a>
			</li>
			<?php }?>
			<li>
			<a style="color:white;" href="<?=site_url('')?>">골프패스</a>
			</li>

			<li>
			<a style="color:white;" href="<?=site_url(shop_category_uri.'/gets_by_name/나라별')?>">나라별 골프장</a>

			</li>
			<li>
			<a style="color:white;" href="<?=site_url(golfpass_panel_uri.'/gets')?>">패널소개</a>

			</li>

			<?php if(!is_login()){?>
			<li>
			<a style="color:white;" href="<?=site_url(user_uri.'/login')?>">로그인</a>

			</li>
			<li>
			<a style="color:white;" href="<?=site_url(user_uri.'/register_agree_1')?>">회원가입</a>

			</li>
			<?php }?>
			<?php if(is_login()){?>

			<li>
			<a style="color:white;" href="<?=site_url(user_uri.'/logout')?>">로그아웃</a>
			</li>
			<?php }?>
			<li>
			<a style="color:white;" href="<?=site_url(shop_mypage_uri.'')?>">마이페이지      </a>
			</li>
			<li>
			<a style="color:white;" href="<?=site_url(shop_wishlist_uri.'/gets')?>">위시리스트      </a>
			</li>
			<li>
			<a style="color:white;" href="<?=site_url(shop_contact_uri.'')?>">고객센터</a>
			</li>
		</ul>
	</div>
</div>

<header id="header" class="black-bg-header container-fluid panel-header">
	<!--  NOTE mobile -->
	<nav id='sm-nav' class="row no-gutters justify-content align-items-stretch d-sm-none panel-nav">
		<div id="logo" class='col-3 justify-content-center d-flex align-self-center align-items-center'>
			<img src="/public/sangmin/img/icon/logo_mobile.png" class="d-md-none" alt="">
		</div>
		<div id='nav-icon-box' class="offset-2 col-5 d-flex align-items-stretch justify-content-end">
			<div id="search" class="d-flex align-items-center">
				<span><i class="xi xi-search"></i></span>
			</div>
			<div id="login" class="d-flex align-items-center">
				<span><i class="xi xi-lock"></i></span>
			</div>
			<div id="join" class="d-flex align-items-center">
				<span><i class="xi xi-user-plus"></i></span>
			</div>
		</div>
		<div class="col-2 ml-auto toggle"
			 onclick="$('body').toggleClass('menu-open'); $('.carousel-indicators').toggleClass('d-none d-flex');">
			<span>
				<i class="xi xi-bars"></i>
			</span>
		</div>
	</nav>
	<!--NOTE desktop,tablet nav-->
	<nav id='md-nav' class="row no-gutters justify-content align-items-stretch d-none d-sm-flex">
		<div id="logo" class='col-6 d-flex align-items-center'>
			<figure class="mb-0 d-flex align-items-center d-lg-none">
				<img src="/public/sangmin/img/icon/logo_mobile.png" class="" alt="">
			</figure>
			<a href="<?=site_url()?>">
				<figure class="mb-0 align-items-center d-none d-lg-flex">
					<img src="/public/sangmin/img/icon/logo.png" class="" alt="">
				</figure>
			</a>
			<div id="search" class="d-flex align-items-center">
				<i class="xi xi-search"></i>
				<input type="text" placeholder="관심있는 나라나 골프장을 검색해보세요!">
			</div>
		</div>
		<?php if(!is_login()){?>
			<div id='nav-icon-box' class="col  d-flex justify-content-end">
				<div id="login" class="d-flex align-items-center">
					<span><i class="xi xi-lock"></i></span>
					<p class="mb-0"><a style="color:white;" href="<?=site_url(user_uri.'/login')?>">로그인</a></p>
				</div>
				<div id="join" class="d-flex align-items-center">
					<span><i class="xi xi-user-plus"></i></span>
					<p class="mb-0"><a style="color:white;"href="<?=site_url(user_uri.'/register_agree_1')?>">회원가입</a></p>
				</div>
			</div>
			<?php }?>
		<div class="col ml-auto toggle"
			 onclick="$('body').toggleClass('menu-open'); $('.carousel-indicators').toggleClass('d-none d-flex');">
			<span>
				<!-- <i class="xi xi-bars"></i> -->
				<i class=""></i>
			</span>
			<p class="d-none d-lg-block">메뉴</p>
		</div>
	</nav>
</header>
<div style="margin-top: 180px;"></div>

    <?php load_view($content_view)?>

<div style="margin-top: 100px;"></div>

		<footer id='footer' class=' container-fluid'>
			 <div id="partner">
					 <div class="row">
							 <div class="w-100">
									 <h6>PARTNERS</h6>
							 </div>
							 <div class="d-flex flex-wrap">
									 <figure>
											 <img src="public/sangmin/img/partner/partner_google.png" alt="">
									 </figure>
									 <figure>
											 <img src="public/sangmin/img/partner/partner_facebook.png" alt="">
									 </figure>

									 <figure>
											 <img src="public/sangmin/img/partner/partner_instar.png" alt="">
									 </figure>
									 <figure>
											 <img src="public/sangmin/img/partner/partner_naver.png" alt="">
									 </figure>
									 <figure>
											 <img src="public/sangmin/img/partner/partner_daum.png" alt="">
									 </figure>
							 </div>
					 </div>

			 </div>
			 <div class="row d-flex">
					 <ul>
							 <li class="title">ABOUT US</li>
							 <li><a href="#">회사 소개</a></li>
							 <li><a href="#">이용약관</a></li>
							 <li><a href="#">개인 정보 취급 방침</a></li>
					 </ul>
					 <ul>
							 <li class="title">OFFICE</li>
							 <li><span>TEL</span>
									 <p>1500-1500</p>
							 </li>
					 </ul>
					 <ul>
							 <li class="title">CONTACT US</li>
							 <li><span>상호</span>
									<p>PLAYSEVEN</p>
							 </li>
							 <li><span>대표</span>
									<p>황현철</p>
							 </li>
							 <li><span>사업자등록번호</span>
									 <p>280-81-00963</p>
							 </li>
							 <li><span>등록판매업신고번호</span>
										<p>2017-서울강서-1545호</p>
							 </li>
							 <li><span>개인정보관리책임자</span>
									 <p>황현철</p>
							 </li>
					 </ul>
					 <ul>
							 <li class="title">NEWS LETTER</li>
							 <li class="mb-20"><input type="text" placeholder="E-mail을 입력해주세요"></li>
							 <li><strong>골프패스</strong>
									 <p>에서 제공하는 유용한 소식</p>
							 </li>
					 </ul>
					 <p class='align-self-end mr-auto ml-auto'>© 2017 <strong>GOLFPASS.</strong> All Rights Reserved.</p>
			 </div>
	 </footer>


<script src="/public/tmp/sangmin/js/jquery-3.2.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
	<script src="/public/tmp/sangmin/dist/bootstrap/bootstrap.bundle.min.js"></script>
	<script src="/public/tmp/sangmin/dist/Nwagon/Nwagon.js"></script>
	<!-- <script src="/public/tmp/sangmin/js/custom.js"></script> -->
	<script src="<?=domain_url('/public/js/common.js')?>"></script>
</body>

</html>
