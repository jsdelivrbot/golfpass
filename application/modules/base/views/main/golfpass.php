<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no">
    <title>골프패스</title>
    <link rel="canonical" href="http://golfpass.net">
    <meta name="description" content="나만의 스타일, 나만의 골프! 일본 골프 여행 맞춤 플래너">
    <meta property="og:type" content="website">
    <meta property="og:title" content="골프패스">
    <meta property="og:description" content="나만의 스타일, 나만의 골프! 일본 골프 여행 맞춤 플래너">
    <meta property="og:image" content="http://golfpass.net/image/0001.png">
    <meta property="og:url" content="http://golfpass.net">
    <link rel="shortcut icon" href="./favicon.ico">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <!--<script async src="https://www.googletagmanager.com/gtag/js?id=UA-82379730-2"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-82379730-2');

    </script>-->
    <!--네이버 애널리틱스-->
    <!-- <script type="text/javascript" src="//wcs.naver.net/wcslog.js"></script>
    <script type="text/javascript">
        if (!wcs_add) var wcs_add = {};
        wcs_add["wa"] = "89b06c7156cb90";
        wcs_do();
    </script>-->
    <link rel="stylesheet" href="/public/redesign/public/css/reset.css">
    <link rel="stylesheet" href="/public/redesign/public/css/main.css">
    <link rel="stylesheet" href="http://cdn.jsdelivr.net/npm/xeicon@2.3.3/xeicon.min.css">
    <!--<i class="xi-xpressengine"></i> xeicon사용하는방법임-->
    <!-- Magnific Popup core CSS file -->
    <link rel="stylesheet" href="/public/redesign/public/css/magnific-popup.css">
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="/public/redesign/public/js/popup.js"></script>
    <script type="text/javascript" src="/public/redesign/public/js/slick.js"></script>
    <link rel="stylesheet" type="text/css" href="/public/redesign/public/css/slick.css" />
    <link rel="stylesheet" type="text/css" href="/public/redesign/public/css/slick-theme.css" />
    <!-- jQuery 1.7.2+ or Zepto.js 1.0+ -->
    <!-- Magnific Popup core JS file -->
    <script src="/public/redesign/public/js/jquery.magnific-popup.js"></script>
    <!--나라별 슬라이드 js/css-->
    <script type="text/javascript" src="/public/redesign/public/js/jquery.sliderPro.js"></script>
    <link rel="stylesheet" type="text/css" href="/public/redesign/public/css/slider-pro.css" media="screen" />
</head>

<body style="overflow-x: hidden;">
    <section class="main_section">
        <!--_header.scss사용-->
        <header>
            <!--배경화면 이미지 슬라이드-->
            <div class="top_main_wrap">

                <script>
                    $(document).ready(function() {
                        $('.slide_background').slick({
                            autoplay: true,
                            autoplaySpeed: 5000,
                            speed: 1000,
                            touchMove: false,
                            swipeToSlide: false,
                            swipe: false,
                            autoHeight: true,
                            pauseOnHover: false

                        });
                    });

                </script>


                <div class="slide_background">
					<?php foreach ( $product_main as $_product ) : ?>
                    <div class="slide_background_image" style="background-image: url('<?=$_product->photo?>')">
                        <div class="top_main_wrap_opacity">
                            <div class="top_main_wrap_gradation">
                                <div class="golf_info">
                                    <a href="<?= site_url(shop_product_uri . "/get/{$_product->id}") ?>">
                                        <div>
                                            <span class="bold"><?=$_product->name?></span><br> <?= $_product->region ?> - <?= $_product->hole_count ?>홀/<?= $_product->distance ?>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
					<?php endforeach; ?>
                </div>
            </div>

            <!--메인 탑 헤더 내용-->
            <div>
                <!--헤더 메뉴-->
                <nav style="position: relative;">
                    <div class="top_header_lineWrap">
                        <div class="top_header_wrap">
                            <div class="top_header">
                                <ul class="top_header_left">
                                    <a href="#">
                                        <li class="iconText iconbox">
                                            <i class="xi-call"></i> <span>02-6959-5454</span>
                                        </li>
                                    </a>
                                    <a href="https://pf.kakao.com/_dSxeyxl">
                                        <li class="iconText iconbox">
                                            <i class="xi-kakaotalk"></i> <span>카카오톡 문의</span>
                                        </li>
                                    </a>
                                    <a href="https://blog.naver.com/golfpass_">
                                        <li class="iconOnly iconbox">
                                            <i class="xi-naver"></i>
                                        </li>
                                    </a>
                                    <a href="https://www.facebook.com/golfpass.net">
                                        <li class="iconOnly iconbox">
                                            <i class="xi-facebook"></i>
                                        </li>
                                    </a>
                                    <a href="https://www.instagram.com/golfpass_net/">
                                        <li class="iconOnly iconbox">
                                            <i class="xi-instagram"></i>
                                        </li>
                                    </a>
                                    <a href="https://www.youtube.com/channel/UCVCuIlbXMgiv4TrPolcgkgQ">
                                        <li class="iconOnly iconbox">
                                            <i class="xi-youtube-play"></i>
                                        </li>
                                    </a>
                                </ul>




                                <ul class="top_header_right">
									<?php if ( !is_login() ) { ?>
                                    <a href="<?= site_url(user_uri . '/login') ?>">
                                        <li class="textOnly">로그인
                                        </li>
                                    </a>
                                    <li class="line">|
                                    </li>
                                    <a href="<?= site_url(user_uri . '/register_agree_1') ?>">
                                        <li class="textOnly">회원가입
                                        </li>
                                    </a>
									<?php } ?>
									<?php if ( is_login() ) { ?>
										<a href="<?=site_url(shop_mypage_uri.'/gets_wishlist')?>">
											<li class="textOnly">마이페이지
											</li>
										</a>
										<a href="<?= site_url(user_uri . '/logout') ?>">
											<li class="textOnly">로그아웃
											</li>
										</a>								
									<?php } ?>
                                </ul>

                            </div>
                        </div>
                    </div>
                </nav>

                <!--메인 메뉴-->
                <nav style="position: relative;">
                    <div class="main_nav_wrap">
                        <div class="logo">
                            <img src="/public/redesign/public/images/logo.png">
                        </div>
                        <ul class="main_nav">
                            <li class="main_nav_li">
                                <a href="<?=site_url('shop/product/gets/135')?>">
                                            골프장 상품
                                        </a>
                            </li>
                            <li class="main_nav_li">
                                <a href="#">
                                            패키지 상품
                                        </a>
                            </li>
                            <li class="main_nav_li">
                                <a href="<?=site_url('/shop/product/gets/37')?>">
                                            테마별 상품
                                        </a>
                            </li>
                            <li class="main_nav_li">
                                <a href="<?=site_url('shop/product/gets_by_ranking/avg_score')?>">
                                            골프장 순위
                                        </a>
                            </li>
                            <li class="main_nav_li">
                                <a href="<?=site_url('base/content/gets?board_id=4')?>">
                                            고객센터
                                        </a>
                            </li>
                        </ul>
                    </div>
                </nav>
                <!--mobile main menu-->
                <nav style="position: relative;">
                    <div class="main_nav_wrap_mo">
                        <div class="ham_menu">
                        </div>
                        <div class="logo_m">
                            <img src="/public/redesign/public/images/logo_m.png">
                        </div>
                    </div>
                </nav>

                <script type="text/javascript">
                    $(document).ready(function() {
                        $('#wrapper').hover(
                            function() {
                                $('#wrapper').addClass('wrapper_height');
                            },
                            function() {
                                $('#wrapper').removeClass('wrapper_height');
                            }
                        );
                    });

                </script>
                <div id="wrapper">
                    <input type="checkbox" id="menu" name="menu" class="menu-checkbox">
                    <div class="menu">
                        <label class="menu-toggle" for="menu"><span>Toggle</span></label>
                        <ul>
                            <li>
								<a href="<?=site_url('shop/product/gets/135')?>">
									골프장 상품
								</a>
                            </li>
                            <li>
                                <a href="#">패키지 상품</a>
                            </li>
                            <li>
								<a href="<?=site_url('/shop/product/gets/37')?>">
									테마별 상품
								</a>
                            </li>
                            <!--세부메뉴 하는 방법

                            <li>
                                <label for="menu-3">테마별 상품</label>
                                <input type="checkbox" id="menu-3" name="menu-3" class="menu-checkbox">
                                <div class="menu">
                                    <label class="menu-toggle" for="menu-3"><span>Toggle</span></label>
                                    <ul>
                                        <li>
                                            <a href="#">Menu-3-1</a>
                                        </li>
                                        <li>
                                            <label for="menu-3-2">Menu-3-2</label>
                                            <input type="checkbox" id="menu-3-2" name="menu-3-2" class="menu-checkbox">
                                            <div class="menu">
                                                <label class="menu-toggle" for="menu-3-2"><span>Toggle</span></label>
                                                <ul>
                                                    <li>
                                                        <a href="#">Menu-3-2-1</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">Menu-3-2-2</a>
                                                    </li>
                                                    <li>
                                                        <label for="menu-3-2-3">Menu-3-2-3</label>
                                                        <input type="checkbox" id="menu-3-2-3" name="menu-3-2-3" class="menu-checkbox">
                                                        <div class="menu">
                                                            <label class="menu-toggle" for="menu-3-2-3"><span>Toggle</span></label>
                                                            <ul>
                                                                <li>
                                                                    <a href="#">Menu-3-2-3-1</a>
                                                                </li>
                                                                <li>
                                                                    <a href="#">Menu-3-2-3-2</a>
                                                                </li>
                                                                <li>
                                                                    <a href="#">Menu-3-2-3-3</a>
                                                                </li>
                                                                <li>
                                                                    <a href="#">Menu-3-2-3-4</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <a href="#">Menu-3-2-4</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="#">Menu-3-3</a>
                                        </li>
                                        <li>
                                            <a href="#">Menu-3-4</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>-->
                            <li>
								<a href="<?=site_url('shop/product/gets_by_ranking/avg_score')?>">
									골프장 순위
								</a>
                            </li>

                            <li>
								<a href="<?=site_url('base/content/gets?board_id=4')?>">
									고객센터
								</a>
                            </li>
                            <hr>
							<?php if ( !is_login() ) { ?>
                            <li>
								<a href="<?= site_url(user_uri . '/login') ?>">로그인</a>
                            </li>
                            <li>
								<a href="<?= site_url(user_uri . '/register_agree_1') ?>">회원가입</a>
                            </li>
							<?php } ?>

							<?php if ( is_login() ) { ?>
								<li>
									<a href="<?= site_url(user_uri . '/logout') ?>">로그아웃</a>
								</li>
							<?php } ?>
                        </ul>
                    </div>
                </div>
                <!-- #wrapper -->

                <!--상품 찾기 메뉴-->

                <div class="searchbox_wrap">
                    <a class="popup-with-zoom-anim" href="#small-dialog">
                        <div class="searchbox">
                            <div class="searchbox_content">
                                <div class="searchtext">
                                    <span class="bold">원하는 상품</span>을 찾아보세요!
                                </div>
                                <div class="search_button_wrap">
                                    <div class="search_button">
                                        <div class="search_icon">
                                            <i class="xi-search"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </a>
                    <!--클래스 명 변경시 애니메이션 변경----
                    <a class="popup-with-zoom-anim" href="#small-dialog">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">페이드 - 줌 애니메이션으로 </font>
                        </font>
                    </a><br>
                    <a class="popup-with-move-anim" href="#small-dialog">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">열기 페이드 - 슬라이드 애니메이션으로 열기</font>
                        </font>
                    </a>-->

                    <!-- dialog itself, mfp-hide class is required to make dialog hidden -->
                    <div id="small-dialog" class="zoom-anim-dialog mfp-hide modal_form">
                        <h1 class="modal_title">나라별 골프장</h1>
                        <p class="modal_sub">총 32,482개의 골프 코스가<br class="br"> 등록되어 있습니다</p>
                        <div class="photo_list_form">

                            <div class="photo_list_wrap">
								<?php foreach($nation_list as $_nation):?>
                                <div class="photo_list">
                                    <div class="photo_left" style="background-image:url(<?=$_nation->photo?>); background-repeat:no-repeat; background-position:center; background-size:cover">
                                        <img src="/public/redesign/public/images/blank1.png" class='blank1_img'>
                                        <a href="<?=site_url(shop_product_uri."/gets/{$_nation->id}")?>">
                                            <div class="photo_list_text">
                                                <div class="country"><span><?=$_nation->name?></span><br>2,317개</div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
								<?php endforeach;?>
                            </div>


                        </div>

                    </div>

                    <!--추천 상품 슬라이더-->
                    <script>
                        $(document).ready(function() {
                            $('#slide_banner').slick({
                                slidesToShow: 4,
                                slidesToScroll: 1,
                                autoplay: true,
                                autoplaySpeed: 100,
                                pauseOnHover: true,
                                prevArrow: false,
                                nextArrow: false,
                                speed: 2000,
                                touchMove: true,
                                variableWidth: true
                            });
                        });

                    </script>

                    <div class="recommendbox">
                        <div class="recommend">
                            <div class="recommend_textbox">
                                <div class="recommend_text">
                                    추천
                                </div>
                            </div>
                        </div>

                        <div class="recommend_menu">
                            <ul id="slide_banner">
                                <li class="recommend_menu_li">
                                    <a href="#">
                                            니죠 C.C.
                                    </a>
                                </li>
                                <li class="recommend_menu_li">
                                    <a href="#">
                                            나가사키 파크 C.C.
                                    </a>
                                </li>
                                <li class="recommend_menu_li">
                                    <a href="#">
                                            아오시마 G.C.
                                    </a>
                                </li>
                                <li class="recommend_menu_li">
                                    <a href="#">
                                            디어레이크 C.C.
                                    </a>
                                </li>
                                <li class="recommend_menu_li">
                                    <a href="#">
                                            레이크 포레스트
                                    </a>
                                </li>
                                <li class="recommend_menu_li">
                                    <a href="#">
                                            니죠 C.C.
                                    </a>
                                </li>
                                <li class="recommend_menu_li">
                                    <a href="#">
                                            나가사키 파크 C.C.
                                    </a>
                                </li>
                                <li class="recommend_menu_li">
                                    <a href="#">
                                            아오시마 G.C.
                                    </a>
                                </li>
                                <li class="recommend_menu_li">
                                    <a href="#">
                                            디어레이크 C.C.
                                    </a>
                                </li>
                                <li class="recommend_menu_li">
                                    <a href="#">
                                            레이크 슈퍼 울트라 포레스트 마운틴 리버
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </div>

                </div>
            </div>
        </header>
    </section>


    <!--나라별 골프장-->
    <section style="margin-top: 60px; margin-bottom: 75px; padding-left: 50px; padding-right: 50px;">
        <!--_section4.scss 사용-->

        <div class="country_title">
            <h4 class="country_title_big">나라별 골프장</h4>
        </div>

        <script type="text/javascript">
            $(document).ready(function($) {
                $('#country_slider').sliderPro({
                    width: 925,
                    autoHeight: true,
                    arrows: true,
                    buttons: false,
                    autoplay: false
                });
            });

        </script>
    

        <div id="country_slider" class="country_photo_list_form slider-pro">
            <div class="country_slides sp-slides">
            <?php $nation_list_collection= array_chunk($nation_list, 8)?>
            <?php foreach($nation_list_collection as $_nation_list):?>
                <div class="country_slide_content sp-slide">
                    <?php $_nation_list_collection= array_chunk($_nation_list, 4)?>
                    <?php foreach($_nation_list_collection as $__nation_list):?>
                    <div class="country_photo_list_wrap">
                    <?php foreach($__nation_list as $_nation):?>
                        <div class="country_photo_list">
                            <div class="country_photo" style="background-image:url('<?=$_nation->photo?>'); background-repeat:no-repeat; background-position:center; background-size:cover">
                                <img src="/public/redesign/public/images/blank2.png" class='blank2_img'>
                                <a href="<?=site_url(shop_product_uri."/gets/{$_nation->id}")?>">
                                    <div class="country_photo_list_text">
                                        <div class="country"><span><?=$_nation->name?></span><br>2,317개</div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php endforeach;?>    
                    </div>
                    <?php endforeach;?>    
              
                </div>
              <?php endforeach;?>
              
            </div>

        </div>



    </section>

    <!--이벤트프로모션 섹션-->
    <section style="padding-top:47px; padding-bottom: 13px;">
        <!--_section1.scss 사용-->
        <script>
            $(document).ready(function() {
                $('.event_slider').slick({
                    slidesToShow: 4,
                    slidesToScroll: 1,
                    autoplay: true,
                    autoplaySpeed: 1000,
                    pauseOnHover: true,
                    arrows: true,
                    prevArrow: false,
                    nextArrow: false,
                    speed: 2000,
                    touchMove: true,
                    dots: true,
                    variableWidth: true,
                    centerMode: true,
                    dotsClass: 'event-dots'
                });
            });

        </script>
        <div id="slide_box">
            <div class="block_container" id="slides_sl">
                <ul class="event_slider" id="slides_sl_ul">
                    <li class="slide_sl" id="slides_sl_li">
                        <div class="block">
                            <a href="/public/event/list_temp/eventpage_hotkaido.html">
                                <div class="card" id="cardlist_1">
                                    <img src="/public/redesign/public/images/event1.png">
                                </div>
                            </a>
                        </div>
                    </li>
                    <li class="slide_sl" id="slides_sl_li">
                        <div class="block">
                            <a href="#">
                                <div class="card" id="cardlist_2">
                                    <img src="/public/redesign/public/images/event2.png">
                                </div>
                            </a>
                        </div>
                    </li>
                    <li class="slide_sl" id="slides_sl_li">
                        <div class="block">
                            <a href="/public/event/eventpage2.html">
                                <div class="card" id="cardlist_3">
                                    <img src="/public/redesign/public/images/event3.png">
                                </div>
                            </a>
                        </div>
                    </li>
                    <li class="slide_sl" id="slides_sl_li">
                        <div class="block">
                            <a href="/public/event/list_temp/eventpage_resort.html">
                                <div class="card" id="cardlist_4">
                                    <img src="/public/redesign/public/images/event4.png">
                                </div>
                            </a>
                        </div>
                    </li>
                    <li class="slide_sl" id="slides_sl_li">
                        <div class="block">
                            <a href="/public/event/list_temp/eventpage_kyushu.html">
                                <div class="card" id="cardlist_5">
                                    <img src="/public/redesign/public/images/event5.png">
                                </div>
                            </a>
                        </div>
                    </li>

                    <li class="slide_sl" id="slides_sl_li">
                        <div class="block">
                            <a href="/public/event/list_temp/eventpage_hotkaido.html">
                                <div class="card" id="cardlist_6">
                                    <img src="/public/redesign/public/images/event1.png">
                                </div>
                            </a>
                        </div>
                    </li>
                    <li class="slide_sl" id="slides_sl_li">
                        <div class="block">
                            <a href="#">
                                <div class="card" id="cardlist_7">
                                    <img src="/public/redesign/public/images/event2.png">
                                </div>
                            </a>
                        </div>
                    </li>
                    <li class="slide_sl" id="slides_sl_li">
                        <div class="block">
                            <a href="/public/event/eventpage2.html">
                                <div class="card" id="cardlist_8">
                                    <img src="/public/redesign/public/images/event3.png">
                                </div>
                            </a>
                        </div>
                    </li>
                    <li class="slide_sl" id="slides_sl_li">
                        <div class="block">
                            <a href="/public/event/list_temp/eventpage_resort.html">
                                <div class="card" id="cardlist_9">
                                    <img src="/public/redesign/public/images/event4.png">
                                </div>
                            </a>
                        </div>
                    </li>
                    <li class="slide_sl" id="slides_sl_li">
                        <div class="block">
                            <a href="/public/event/list_temp/eventpage_kyushu.html">
                                <div class="card" id="cardlist_10">
                                    <img src="/public/redesign/public/images/event5.png">
                                </div>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>



    <section style="margin-top:70px; margin-bottom: 70px; padding: 15px;">
        <!--_section2.scss 사용-->
        <article class="grid_article">
            <div class="grid_title">
                <h4 class="grid_title_big">테마별 골프장</h4>
            </div>

            <!--모바일 반응형-->
            <div class="grid_mo">
            <?php for($i=0 ; $i<5; $i++){?>
                <a href="<?=site_url(shop_product_uri."/gets/{$thema_list[$i]->id}")?>">
                    <div class="grid_form_mo" style="background-image:url(<?=$thema_list[$i]->photo?>); background-repeat:no-repeat; background-position:center; background-size:cover">
                        <img src="/public/redesign/public/images/blank3.png" class="blank_img">
                        <div class="grid_list_text_mo">
                            <h1><?=$thema_list[$i]->name?></h1>
                            <p><?=$thema_list[$i]->desc?></p>
                        </div>
                    </div>
                </a>

              <?php }?>

            </div>




            <div class="grid">
                <div class="grid_form">


                    <div class="grid_form_left">
                        <a href="<?=site_url(shop_product_uri."/gets/{$thema_list[0]->id}")?>">
                        <img src="<?=$thema_list[0]->photo?>" alt="" width="100%" height="100%" style="vertical-align: middle;">

                    <div class="grid_list_text">
                        <h3><?=$thema_list[0]->name?></h3>
                        <p>
							<?=$thema_list[0]->desc?>
                        </p>
                    </div>
                    </a>
                    </div>


                    <div class="grid_form_right">
						<?php for($i=1 ; $i<5; $i++){?>

                        <div class="grid_list_2">
                            <a href="#">
                            <img src="<?=$thema_list[$i]->photo?>" alt="" width="100%" height="100%" style="vertical-align: middle;">

                            <div class="grid_list_text">
                                <h3 style="text-shadow: 0 0 7px rgba(0,0,0,1);"><?=$thema_list[$i]->name?></h3>
                                <p style="text-shadow: 0 0 7px rgba(0,0,0,1);">
									<?=$thema_list[$i]->desc?>
                                </p>
                            </div>
                            </a>
                        </div>


						<?php }?>

                    </div>


                </div>
            </div>


        </article>
    </section>


	<script>
		$(document).ready(function(){



		});
	</script>

	<section id="rank_ajax" style="display: block;margin-top:70px; margin-bottom: 70px;">
        <!--section3.scss 사용-->
        <article class="content_article">


            <div class="content_title">
                <div class="main-section-title">
                    <h4 class="main_sub_title">순위별 골프장</h4>
                </div>
                <div class="buttons">
                    <button data-rankingtype="avg_score" class="button_category <?=$rankingType==='avg_score' ? 'button_focus' : ''?>">#종합 평가가 높은</button>
                    <button data-rankingtype="score_1" class="button_category <?=$rankingType==='score_1' ? 'button_focus' : ''?>">#가성비가 우수한</button>
                    <button data-rankingtype="score_2" class="button_category <?=$rankingType==='score_2' ? 'button_focus' : ''?>">#시설이 좋은</button>
                    <button data-rankingtype="score_3" class="button_category <?=$rankingType==='score_3' ? 'button_focus' : ''?>">#식사가 맛있는</button>
                    <button data-rankingtype="score_4" class="button_category <?=$rankingType==='score_4' ? 'button_focus' : ''?>">#전략성이 높은</button>
                </div>
            </div>



            <div class="all_content">
                <div class="all_content_form">


                    <div class="content_left">
                        <!--1위부터 3위까지 아래 div.content-box-->
						<?php
						$count = (count($products_avgScore) > 3) ? 3 : count($products_avgScore);
						for ( $i = 0; $i < $count; $i++ ) {
						?>

                        <div class="content-box">
                            <a href="<?= site_url(shop_product_uri . "/get/{$products_avgScore[$i]->id}") ?>">
                                <div class="content content-height1" style="background-image: url(../public/images/theme1.jpg)">
                                    <div class='new_position'>
                                        <span><?= $i + 1 ?></span>
                                    </div>
                                    <div class="new_position2">
                                        <h1><?= $products_avgScore[$i]->name ?></h1>
                                        <p><?= $products_avgScore[$i]->eng_name ?> - <?= $products_avgScore[$i]->region ?></p>
                                    </div>
                                    <div class="new_position3">
                                        <span><i class="xi-star" style="color:#fcbf3f;"></i></span>
                                        <span style="color:#fff; font-size: 18px;"><?php $score = (round($products_avgScore[$i]->$rankingType * 10)) / 10;
											echo (strlen($score) === 1) ? "{$score}.0" : "{$score}" ?></span>
                                    </div>
                                </div>
                            </a>
                        </div>
						<?php } ?>


                    </div>


                    <div class="content_right">
                        <ul class="content_rank_list">
                            <!--4~10위-->
							<?php
							$count = (count($products_avgScore) > 10) ? 10 : count($products_avgScore);
							for ( $i = 3; $i < $count; $i++ ) {
							?>
                            <li class='content_rank_list_text'>
                                <a href="<?= site_url(shop_product_uri . "/get/{$products_avgScore[$i]->id}") ?>">
                                    <div class="list_text_align">
                                        <div class="rank_text_bold">
                                            <p><span class='rank_num'><?= $i + 1 ?></span><?= $products_avgScore[$i]->name ?></p>
                                        </div>
                                        <div class="ranking_ghost">
                                            <span><?= $products_avgScore[$i]->region ?></span>
                                        </div>
                                    </div>
                                </a>
                            </li>
							<?php } ?>

                        </ul>
                        <!--전체 순위 보러 가기 -->
                        <div class="all_rank_align">
                            <a href="<?= site_url(shop_product_uri . "/gets_by_ranking/avg_score") ?>" class="all_rank_atag">
                                <p class="all_rank_text">
                                    전체 순위 보러가기
                                </p>
                                <span style='width: 30px;height: 30px' class="circle_button">
                                    <i class="xi-angle-right text-dark"></i>
                                </span>
                            </a>
                        </div>
                    </div>


                </div>
            </div>



        </article>
    </section>

<!--동영상 _section5.scss사용-->
    <section class="movie_section" style="margin-top:150px; margin-bottom:150px !important;">
        <article class="movie_article">
            <div class="movie_wrap">
                <iframe width="90%" height="100%" src="https://www.youtube.com/embed/XwtX5ABOOww" frameborder="0" gesture="media" allowfullscreen style="min-height: 725px;"></iframe>
            </div>
        </article>
    </section>

<!--footer  _footer.scss 사용-->
    <footer id='tp-footer' class='tp-main-footer tp-container-fluid'>
        <div id="tp-partner">
            <div class="tp-row" style="width:100%;">
                <div class="tp-w-100">
                    <h6 style="color:#ababab;">PARTNERS</h6>
                </div>
                <div class="tp-d-flex tp-flex-wrap">
                    <figure><a href="http://www.widemobile.com/?golfpass" target="_balnk">
                        <img class="footer_img" src="../public/images/b_partner_wifi.png" alt=""></a>
                    </figure>
                    <figure style="margin-bottom: 16px;"><a href="http://www.timescar-rental.kr/af/7822000076/kr/" target="_balnk">
                        <img class="footer_img" src="../public/images/b_partner_timescar.png" alt=""></a>
                    </figure>
                    <figure style="margin-bottom: 16px;">
                        <img class="footer_img" src="../public/images/b_partner_iagto.png" alt="">
                    </figure>
                    <figure style="margin-bottom: 16px;">
                        <a href="https://openyourplan.com/2017/?JHS=5fb07c442335f52d0170e8b6791a8c9278817f21a05eeeb6f31dc1" target="_balnk">
                        <img class="footer_img" src="../public/images/b_partner_openplan.png" alt="">
                        </a>
                    </figure>
                </div>
            </div>
        </div>

        <div class="tp-row tp-d-flex" style="width:100%; margin-bottom:16px;">
            <ul>
                <li class="tp-title" style="color:#ababab;">ABOUT US
                </li>
                <!--<li><a style="color:#ababab;" href="<?=site_url(page_uri."/get/1")?>">회사 소개</a></li>-->
                <li><a style="color:#ababab;" href="#">이용 약관</a></li>
                <li><a style="color:#ababab;" href="#">개인 정보 취급 방침</a></li>
                <li><a style="color:#ababab;" href="https://www.hometax.go.kr/websquare/websquare.wq?w2xPath=/ui/pp/index_pp.xml">사업자 정보 확인</a></li>
            </ul>
            <ul>
                <li class="tp-title" style="color:#ababab;">OFFICE</li>
                <li>
                    <span style="color:#ababab;">TEL</span>
                    <p style="color:#ababab;">02-6959-5454</p>
                </li>
                <li><span style="color:#ababab;">E-mail</span>
                    <p style="color:#ababab;">golfpass_@naver.com</p>
                </li>
            </ul>
            <ul>
                <li class="tp-title" style="color:#ababab;">CONTACT US
                </li>
                <li>
                    <span style="color:#ababab;">상호
            </span>
                    <p style="color:#ababab;">PLAYSEVEN
                    </p>
                </li>
                <li>
                    <span style="color:#ababab;">대표
            </span>
                    <p style="color:#ababab;">황현철
                    </p>
                </li>
                <li>
                    <span style="color:#ababab;">사업자 등록 번호
            </span>
                    <p style="color:#ababab;">280-81-00963
                    </p>
                </li>
                <li>
                    <span style="color:#ababab;">등록 판매업 신고 번호
            </span>
                    <p style="color:#ababab;">2017-서울강서-1545호
                    </p>
                </li>
                <li><span style="color:#ababab;">주소</span>
                    <p style="color:#ababab;">서울특별시 강서구 공항대로 227</p>
                </li>
            </ul>
            <ul>
                <li class="tp-title" style="color:#ababab;">NEWS LETTER
                </li>
                <li class="tp-mb-20">
                    <input type="text" id="tp-newsLetter" placeholder="E-mail을 입력해주세요">
                </li>
                <li>
                    <strong style="color:#ababab;">골프패스
            </strong>
                    <p style="margin-bottom: 0; color:#ababab;">에서 제공하는 유용한 소식
                    </p>
                </li>
            </ul>
            <ul>
                <li class="tp-title" style="color:#ababab;">CERTIFICATION MARK</li>
                <!-- 기업은행안심이체 인증마크 적용 시작-->
                <script _ajs_='45_495d281e7c21ddd2' _ah_='83925990'>
                    function onPopAuthMark(key) {
                        window.open('', 'AUTHMARK_POPUP', 'height=900, width=630, status=yes, toolbar=no, menubar=no, location=no');
                        document.AUTHMARK_FORM.authmarkinfo.value = key;
                        document.AUTHMARK_FORM.action = 'https://kiup.ibk.co.kr/uib/jsp/guest/esc/esc1030/esc103020/CESC302020_i.jsp';
                        document.AUTHMARK_FORM.target = 'AUTHMARK_POPUP';
                        document.AUTHMARK_FORM.submit();
                    }

                </script>

                <FORM name='AUTHMARK_FORM' METHOD='POST'>
                    <input type="hidden" name="authmarkinfo">
                </FORM>
                <!--기업은행안심이체 인증마크 적용 종료 -->
                <li style="height:auto;">
                    <a href="javascript:onPopAuthMark('2ae0165604bed3399c7f3b867fdda050')"><img src='http://golfpass.net/image/bank.png' alt='인증마크' border='0'/></a>
                </li>
            </ul>
        </div>
        <div class="tp-row tp-d-flex" style="width:100%; margin:0;">
            <p class='tp-align-self-end tp-mr-auto tp-ml-auto' style="color:#ababab;">© 2017
                <strong style="color:#ababab;">GOLFPASS.
          </strong> All Rights Reserved.
            </p>
        </div>
    </footer>
    <script>
        $("#newsLetter").keypress(function(e) {
            var key = e.which;
            if (key == 13) {
                var email = $(this).val();
                var url = "<?=site_url(main_uri." / add_newslatter ")?>";
                $.ajax({
                    type: "post",
                    dataType: "json",
                    url: url,
                    data: {
                        email: email
                    },
                    success: function(data) {
                        alert(data.email + "이(가) 뉴스레터에 등록되었습니다.");
                    },
                    error: function(xhr, textStatus, errorThrown) {
                        alert('에러...');
                        $('.loading').fadeOut(500);
                        console.log('code: ' + request.status + "n" + 'message: ' + request.responseText + "n" + 'error: ' + error);
                        console.log(errorThrown);
                    }
                });
                return false;
            }
        });

    </script>


	<script>

		$('.button_category').click(function () {
			var rankingType = $(this).data('rankingtype');

			$.ajax({
				method: "POST",
				url: "<?=site_url(main_uri . '/ajax_gets_by_ranking')?>",
				data: {rankingType: rankingType},
				beforeSend: function () {
				},
				success: function (data) {
					$("#rank_ajax").html(data);
				}
			});

		});

		$('.content-height2').hover(
			function() {
				$('.content-height1').addClass('hover_content');
			},
			function() {
				$('.content-height1').removeClass('hover_content');
			}
		);
		$('.content-height3').hover(
			function() {
				$('.content-height1').addClass('hover_content');
			},
			function() {
				$('.content-height1').removeClass('hover_content');
			}
		);
	</script>


</body>

</html>

