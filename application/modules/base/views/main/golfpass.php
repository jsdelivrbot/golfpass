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
			color: inherit;
		}
		a:hover{
					color: inherit;
			text-decoration: none !important;
		}
	</style>
</head>

<body>
	<div id="main-wrap">
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

		<header id="header" class="container-fluid">
			<!--  NOTE mobile -->
			<nav id='sm-nav' class="row no-gutters justify-content align-items-stretch d-sm-none panel-nav">
				<div id="logo" class='col-3 justify-content-center d-flex align-self-center align-items-center'>
					<img src="/public/sangmin/img/icon/logo_mobile.png" class="d-md-none" alt="">
				</div>
				<div id='nav-icon-box' class="offset-2 col-5 d-flex align-items-stretch justify-content-end">
					<div id="search" class="d-flex align-items-center">
						<span><i class="xi xi-search"></i></span>
					</div>
					<?php if(!is_login()){?>
					<div id="login" class="d-flex align-items-center">
						<a href="<?=site_url(user_uri.'/login')?>" style="color:white;">
							<span><i class="xi-log-in xi-x"></i></span>
						</a>
					</div>
					<div id="join" class="d-flex align-items-center">
						<a href="<?=site_url(user_uri.'/register_agree_1')?>" style="color:white;">
							<span><i class="xi xi-user-plus"></i></span>
						</a>
					</div>
					<?php }else{?>
						<div id="logout" class="d-flex align-items-center">
						<a href="<?=site_url(user_uri.'/logout')?>" style="color:white;">
							<span><i class="xi-log-out xi-x"></i></span>
						</a>
					</div>
					<?php }?>
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
					<a href="<?=site_url()?>"><figure class="mb-0 align-items-center d-none d-lg-flex">
						<img src="/public/sangmin/img/icon/logo.png" class="" alt="">
					</figure></a>
					<div id="search" class="d-flex align-items-center">
						<i class="xi xi-search"></i>
						<input type="text" placeholder="관심있는 나라나 골프장을 검색해보세요!">
					</div>
				</div>
				<div id='nav-icon-box' class="col  d-flex justify-content-end">
				<?php if(!is_login()){?>
					<div id="login" class="d-flex align-items-center">
						<span><i class="xi-log-in xi-x"></i></span>
						<p class="mb-0"><a style="color:white;" href="<?=site_url(user_uri.'/login')?>">로그인</a></p>
					</div>
					<div id="join" class="d-flex align-items-center">
						<span><i class="xi xi-user-plus"></i></span>
						<p class="mb-0"><a style="color:white;"href="<?=site_url(user_uri.'/register_agree_1')?>">회원가입</a></p>
					</div>
				<?php }else{?>
					<div id="logout" class="d-flex align-items-center">
						<span><i class="xi-log-out xi-x"></i></span>
						<p class="mb-0"><a style="color:white;"href="<?=site_url(user_uri.'/logout')?>">로그아웃</a></p>
					</div>
				<?php }?>
				</div>
				<div class="col ml-auto toggle"
					 onclick="$('body').toggleClass('menu-open'); $('.carousel-indicators').toggleClass('d-none d-flex');">
					<span>
						<i class="xi xi-bars"></i>
						<i class=""></i>

					</span>
					<p class="d-none d-lg-block">메뉴</p>
				</div>
			</nav>
		</header>
		<div id="bg-div" style=""></div>
		<section id="section1" class="scroll-smooth">
			<article class="carousel slide" data-ride="carousel" data-interval="7000" id='section1-slide'>
				<ol class=" carousel-indicators d-flex flex-column align-items-center">
				</ol>
				<div class="carousel-inner">
					<div class="carousel-item active">
						<img src="<?=$product_main_photos[0]->name?? ""?>" alt="" class="position-absolute d-block">
						<div class="content-box d-flex flex-column align-items-start justify-content-center justify-content-lg-end">
							<div class='title'>
								<h1><?=$product_main->name?></h1>
								<p><?=$product_main->region?> - <?=$product_main->hole_count?>홀 / <?=$product_main->distance?>야드</p>
							</div>
							<div class="content">
								<p><span>
									<?php for($i=0;$i < (int)$product_main->avg_score; $i++){?>
										<i class="xi xi-star"></i>
									<?php }?>
									<?php for($i=0;$i < 5- (int)$product_main->avg_score; $i++){?>
										<i class="xi xi-star-o"></i>
									<?php }?>
									</span>(리뷰 <?=$product_main->reviews_count?>개)
								</p>
								<p><?=$product_main->desc?></p>
							</div>
							<a href="<?=site_url(shop_product_uri."/get/{$product_main->id}")?>">
							<div class="btn-box d-flex align-items-center justify-content-center">
							<button>보러가기
								</button>
							</div>
							</a>
						</div>
					</div>
					<?php for($i=1; $i<= count($product_main_photos)-1 ; $i++){?>
					<div class="carousel-item">
						<img src="<?=$product_main_photos[$i]->name?>" alt="" class="position-absolute d-block">
						<div class="content-box d-flex flex-column align-items-start justify-content-center justify-content-lg-end">
							<div class='title'>
							<h1><?=$product_main->name?></h1>
							<p>아랍에미레이트, 아부다비 - <?=$product_main->hole_count?>홀 / <?=$product_main->distance?>야드</p>
							</div>
							<div class="content">
								<p><span>
								<?php for($i=0;$i < (int)$product_main->avg_score; $i++){?>
										<i class="xi xi-star"></i>
									<?php }?>
									<?php for($i=0;$i < 5- (int)$product_main->avg_score; $i++){?>
										<i class="xi xi-star-o"></i>
									<?php }?>

								</span>(리뷰 <?=$product_main->reviews_count?>개)
								</p>
								<p><?=$product_main->desc?></p>
							</div>
							<a href="<?=site_url(shop_product_uri."/get/{$product_main->id}")?>">
							<div class="btn-box d-flex align-items-center justify-content-center">
								<button>보러가기
								</button>
							</div>
							</a>
						</div>
					</div>
					<?php }?>

				</div>
			</article>
			<section id="time-border">
				<div id="bar">
				</div>
				<div id="current"></div>
			</section>
			<section id='scroll-alert' class='d-flex flex-column align-items-center'>
				<span>스크롤을 내려주세요</span>
				<i class="xi xi-angle-down"></i>
			</section>
			<section id='sns-box' class='d-flex align-items-center justify-content-around'>
				<span><i class="xi xi-facebook-official"></i></span>
				<span><i class="xi xi-instagram"></i></span>
				<span><i class="xi xi-naver"></i></span>
			</section>
		</section>

		<section id="section2" class="mb-5 main-section scroll-smooth container-fluid d-flex align-items-center">
					 <article class="w-100 p-xl-4">
							 <div class="row no-gutters main-section-title">
									 <h4>나라별 골프장</h4>
							 </div>
							 <!--NOTE 나라별 모바일 구간 -->
							 <div class="row no-gutters flex-column d-md-none">
							 <?php for($i=0;$i < count($nation_list)	;$i++){?>
								<a href="<?=site_url(shop_category_uri."/gets/{$nation_list[$i]->id}")?>">
									 <div class="col-12 d-flex justify-content-center mb-2 bg-dark" style="height: 180px;">
											 	<img class="w-100" src="<?=$nation_list[$i]->photo3?>" alt="">
											 <div class="mobile-content position-absolute d-flex flex-column align-items-center justify-content-end">
													 <h3><?=$nation_list[$i]->name?></h3>
													 <p><?=$nation_list[$i]->desc?></p>
											 </div>
									 </div>
							 </a>
								<?php }?>
							 </div>
							 <!--NOTE 나라별 slide 테블릿 ~ 구간 -->

							 <div class="row flex-nowrap d-none d-md-flex position-relative pt-5">
									 <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:980px;height:440px;overflow:hidden;visibility:hidden;">
											 <!-- Loading Screen -->
											 <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:980px;height:440px;overflow:hidden;">
												 <!-- 아래 반복 -->
													 <?php for($i=0;$i < count($nation_list)	;$i++){?>

						 <div class="slide-item d-flex">
							  <a href="<?=site_url(shop_category_uri."/gets/{$nation_list[$i]->id}")?>">
							 <img src="<?=$nation_list[$i]->photo?>" class="w-100"/>
							 <div class="position-absolute content d-flex flex-column justify-content-center align-items-center">
								 <h3><?=$nation_list[$i]->name?></h3>
								 <p><?=$nation_list[$i]->desc?></p>
							 </div>
						 </a>
						 </div>
						 <?php }?>
											 </div>
									 </div>
							 </div>
					 </article>
			 </section>
		<section id="section3" class="pt-49 pt-xl-0 mb-5 container-fluid align-items-start align-items-md-center">
			             <article class="w-100 p-xl-4">
			                 <div class="row no-gutters main-section-title">
			                     <h4>골프패스 패널이 추천하는 골프장</h4>
			                 </div>
			                 <div class="row position-relative pt-5 items justify-content-around">
												 <!-- 아래 div반복 -->
												 <?php for($i=0;$i<count($products_panel); $i++){?>
			                     <div class="col-12 col-md-6 col-lg-3 mb-3 d-flex item">
								 <a href="<?=site_url(shop_product_uri."/get/{$products_panel[$i]->id}")?>">
			                         <figure>
																	 <div class="position-relative">
																			 <img class="rounded-top " src="<?=$products_panel[$i]->photos[0]?>" alt="" width="100%">
																			 <span class="position-absolute text-light price"><?=$products_panel[$i]->price?>원</span>
																	 </div>
																	 <div class="d-flex align-items-center p-1 text-light rounded-top content">
																			 <i class="xi-marker-check ml-1 mr-1"></i>
																			 <p class=" mb-0 "><?=$products_panel[$i]->hotel_id !== null ? "골프장과 숙박 시설이 함께 있는 상품입니다." : "골프장만 있는 상품입니다."?></p>
																	 </div>
																	 <figcaption class="rounded-bottom d-flex align-items-center justify-content-between p-3 bg-light">
																			 <div>
																					 <h3><?=$products_panel[$i]->name?></h3>
																					 <p class="mb-0"><?=$products_panel[$i]->eng_name?></p>
																			 </div>
																			 <div class="d-flex flex-column align-items-center">
																					 <?php if($products_panel[$i]->avg_score !== null){?>
																					 <span><i class="xi-star"></i></span>
																					 <span><?=(ceil(($products_panel[$i]->avg_score)*10))/10?></span>
																					 <?php }?>
																			 </div>
																	 </figcaption>
			                         	</figure>
															  </a>
								 </div>
								 <?php }?>
			                 </div>
			             </article>
			         </section>

		<section id="section4" class="mb-5 container-fluid d-flex align-items-start align-items-md-center">
			<article class="w-100 p-xl-4">
				<div class="row no-gutters main-section-title mb-5">
					<h4>테마별 골프장</h4>
				</div>
				<div class="row no-gutters flex-column d-sm-none">
					<div class="col-12 d-flex justify-content-center mb-2 bg-dark" style="height: 180px;">
						<!--	<img class="w-100" src="/public/sangmin/img/golf_course_1.jpg" alt="">-->
						<div class="mobile-content position-absolute d-flex flex-column align-items-center justify-content-end">
							<h1>이달의 인기 코스</h1>
							<p>트렌디한 코스를 경험하고 싶다면</p>
						</div>
					</div>
				</div>
				<div class="row no-gutters d-none d-sm-flex">
					<div class="col-12 col-lg-6 position-relative ">
						<a href="<?=site_url(shop_product_uri."/gets/{$thema_list[0]->id}")?>">
						<img src="<?=$thema_list[0]->photo?>" alt="" width="100%">

						<div class='position-absolute text-light'>
							<h3><?=$thema_list[0]->name?></h3>
							<p>
							<?=$thema_list[0]->desc?>
							</p>
						</div>
						</a>
					</div>
					<div class="col-12 col-lg-6">
						<div class="row no-gutters">
							<div class="col-6 position-relative">
								<a href="<?=site_url(shop_product_uri."/gets/{$thema_list[1]->id}")?>">
								<img src="<?=$thema_list[1]->photo?>" alt="" width="100%">

								<div class='position-absolute text-light'>
									<h3><?=$thema_list[1]->name?></h3>
									<p>
									<?=$thema_list[1]->desc?>
									</p>
								</div>
								</a>
							</div>
							<div class="col-6 position-relative">
							<a href="<?=site_url(shop_product_uri."/gets/{$thema_list[2]->id}")?>">
								<img src="<?=$thema_list[2]->photo?>" alt="" width="100%">

								<div class='position-absolute text-light'>
									<h3><?=$thema_list[2]->name?></h3>
									<p>
									<?=$thema_list[2]->desc?>
									</p>
								</div>
								</a>
							</div>
							<div class="col-6 position-relative">
							<a href="<?=site_url(shop_product_uri."/gets/{$thema_list[3]->id}")?>">
								<img src="<?=$thema_list[3]->photo?>" alt="" width="100%">

								<div class='position-absolute text-light'>
									<h3><?=$thema_list[3]->name?></h3>
									<p>
									<?=$thema_list[3]->desc?>
									</p>
								</div>
								</a>
							</div>
							<div class="col-6 position-relative">
							<a href="<?=site_url(shop_product_uri."/gets/{$thema_list[4]->id}")?>">
								<img src="<?=$thema_list[4]->photo?>" alt="" width="100%">

								<div class='position-absolute text-light'>
									<h3><?=$thema_list[4]->name?></h3>
									<p>
									<?=$thema_list[4]->desc?>
									</p>
								</div>
								</a>
							</div>
						</div>
					</div>
				</div>
			</article>
		</section>
		<section id="section5" class="mb-5  container-fluid align-items-start align-items-md-center">
			<article class="w-100 p-xl-4">
				<div class="row no-gutters main-section-title mb-5">
					<h4>순위별 골프장</h4>
				</div>
				<div class="d-flex mb-5 category flex-wrap">
					<button data-rankingtype="avg_score" class="btn btn-outline-light btn-sm active">#평균</button>
					<button data-rankingtype="score_1" class="btn btn-outline-light btn-sm" >#score_1</button>
					<button data-rankingtype="score_2" class="btn btn-outline-light btn-sm" >#score_2</button>
					<button data-rankingtype="score_3" class="btn btn-outline-light btn-sm" >#score_3</button>
					<button data-rankingtype="score_4" class="btn btn-outline-light btn-sm" >#score_4</button>
					<button data-rankingtype="score_5" class="btn btn-outline-light btn-sm" >#score_5</button>
					<button data-rankingtype="score_6" class="btn btn-outline-light btn-sm" >#score_6</button>
					<button data-rankingtype="score_7" class="btn btn-outline-light btn-sm" >#score_7</button>
					<button data-rankingtype="score_8" class="btn btn-outline-light btn-sm" >#score_8</button>
				</div>
				<div class="row no-gutters">
					<div class="col-12 col-lg-6">
						<!--1위부터 3위까지 아래 div.content-box-->
						<?php
						$count = (count($products_avgScore) > 3) ? 3 : count($products_avgScore);
						 for($i=0 ; $i < $count; $i++){?>
						<div class="col-12 content-box">
							<a href="<?=site_url(shop_product_uri."/get/{$products_avgScore[$i]->id}")?>">
								<div class="d-flex align-items-center p-4 mb-3 content"
								 	style="height: 150px; background-image: url(/image/rank_001.png)">
									<div class='d-flex align-items-center justify-content-center bg-light rounded-circle'>
										<span class="d-flex align-items-center justify-content-center"><?=$i+1?></span>
									</div>
									<div class="d-flex flex-column ml-4 text-light">
										<h1><?=$products_avgScore[$i]->name?></h1>
										<p class="mb-0"> <?=$products_avgScore[$i]->eng_name?> - <?=$products_avgScore[$i]->nation?>, <?=$products_avgScore[$i]->city?></p>
									</div>
								</div>
							</a>
						</div>
						<?php }?>
					

					</div>
					<div class="col-12 col-lg-6">
						<ul class="list-unstyled">
							<!--4위부터 ~ li반복 -->
							<?php
							$count = (count($products_avgScore) > 10) ? 10 : count($products_avgScore);
						 	for($i=3 ; $i < $count; $i++){?>
							<li class='p-3 text-light list-after-four'>
								<a href="<?=site_url(shop_product_uri."/get/{$products_avgScore[$i]->id}")?>">
									<div class="d-flex justify-content-between align-items-center">
										<div>
											<p class='mb-0'><span class='mr-3 ml-2'><?=$i?></span><?=$products_avgScore[$i]->name?></p>
										</div>
										<div>
											<span><?=$products_avgScore[$i]->nation?>, <?=$products_avgScore[$i]->city?></span>
										</div>
									</div>
								</a>
							</li>
							<?php }?>
						</ul>
						<!--전체 순위 보러 가기 -->
						<div class="row justify-content-center align-items-center">
							<a href="#" class="d-flex justify-content-center align-items-center" style='text-decoration: none'>
								<p class="mb-0 text-light mr-3">
									전체 순위 보러가기
								</p>
								<span style='width: 30px;height: 30px'
									  class="rounded-circle bg-light d-flex align-items-center justify-content-center"><i
										class="xi xi-angle-right text-dark"></i></span>
							</a>
						</div>
					</div>
				</div>
			</article>
		</section>
		<section id="section6" class="mb-5 mt-5 container-fluid align-items-start align-items-md-center">
			<article class="w-100 p-xl-4">
				<div class="row no-gutters main-section-title">
					<h4>골프패스 패널 소개</h4>
				</div>
				<div class="row no-gutters justify-content-start">
					<!--패널 반복 아래 div.panel-item-->
					<?php for($i=0 ; $i < count($panels); $i++){?>
					<div class="col-12 col-lg-6 mb-4 d-flex panel-item">
						<div class="d-none d-md-block">
						<a href="<?=site_url(golfpass_panel_uri."/gets/{$panels[$i]->id}/0")?>">
							<img src="<?=$panels[$i]->profilePhoto?>" class="rounded" alt="" height="110px">
						</a>
						</div>
						<div class="bg-light rounded d-flex flex-column justify-content-center align-middle position-relative panel-content w-100">
						<a href="<?=site_url(golfpass_panel_uri."/gets/{$panels[$i]->id}/0")?>">
							<div class="position-absolute bg-light trans-box d-none d-md-block">
							</div>
							<h4 class="mb-1"><?=$panels[$i]->name?></h4>
							<p class="mb-0" style='max-width: 400px; font-size: 0.9rem; color:#a5a5a5;'><?=$panels[$i]->intro?> </p>
							<div class="position-absolute review-box">
		                            <span>
		                                <i class="xi-pen"></i> ??개
		                            </span></div>
						</a>
						</div>
					</div>
					<?php }?>



			</div>
			<div class="row justify-content-center align-items-center">
				<a href="<?=site_url(golfpass_panel_uri."/gets")?>" class="d-flex justify-content-center align-items-center" style='text-decoration: none'>
					<p class="mb-0 text-light mr-3">
						전체 패널 보러가기
					</p>
					<span style='width: 30px;height: 30px'
							class="rounded-circle bg-light d-flex align-items-center justify-content-center"><i
							class="xi xi-angle-right text-dark"></i></span>
				</a>
			</div>
			</article>
		</section>
		<section id="section7" class="mb-lg-5 container-fluid d-flex">
			<!--유투브 영상-->
			<article class="w-100">
				<div class="row d-flex justify-content-center">
					<iframe width="90%" height="100%" src="https://www.youtube.com/embed/GF4xrSnzNPo" frameborder="0"
							gesture="media" allowfullscreen style="min-height: 450px;"></iframe>
				</div>
			</article>
		</section>
		<footer id='footer' class='main-footer container-fluid'>
			<div id="partner">
				<div class="row">
					<div class="w-100">
						<h6 >PARTNERS</h6>
					</div>
					<div class="d-flex flex-wrap">
						<figure>
							<img src="/public/sangmin/img/partner/partner_google.png" alt="">
						</figure>
						<figure>
							<img src="/public/sangmin/img/partner/partner_facebook.png" alt="">
						</figure>

						<figure>
							<img src="/public/sangmin/img/partner/partner_instar.png" alt="">
						</figure>
						<figure>
							<img src="/public/sangmin/img/partner/partner_naver.png" alt="">
						</figure>
						<figure>
							<img src="/public/sangmin/img/partner/partner_daum.png" alt="">
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
									 <p>02-6959-5454</p>
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

	</div>


<script src="/public/sangmin/js/jquery-3.2.1.min.js"></script>
<script>
	$('#jssor_1').width($('#section2').width()).children('div').width($('#section2').width());
	$(window).resize(function () {
		$('#jssor_1').width($('#section2').width()).children('div').width($('#section2').width());
	});
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
		integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
		crossorigin="anonymous"></script>
<script src="/public/sangmin/dist/bootstrap/bootstrap.bundle.min.js"></script>
<script src="/public/sangmin/js/jssor.slider-26.5.0.min.js"></script>
<script src="public/sangmin/js/custom/main.js"></script>
<script src="public/sangmin/js/custom/navAction.js"></script>
<script src="public/sangmin/js/main_section2.js"></script>

<script>
$('.btn.btn-outline-light.btn-sm').click(function()
{
 var rankingType = $(this).data('rankingtype');

$.ajax({
	method: "POST",
	url: "<?=site_url(main_uri.'/ajax_gets_by_ranking')?>",
	data: { rankingType: rankingType },
	beforeSend: function(){
	},
	success: function(data){
		$("#section5").html(data);
	}
});

});
</script>
</body>

</html>
