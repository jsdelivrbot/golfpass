<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta name="viewport"
      content="width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no">
<meta name="author" content="">
<title>골프패스</title>
<link rel="canonical" href="http://golfpass.net">
<meta name="description" content="나만의 스타일, 나만의 골프! 일본, 태국, 필리핀, 중국 등 해외 골프 여행 맞춤 플래너">
<meta property="og:type" content="website">
<meta property="og:title" content="골프패스">
<meta property="og:description" content="나만의 스타일, 나만의 골프! 일본, 태국, 필리핀, 중국 등 해외 골프 여행 맞춤 플래너">
<meta property="og:image" content="http://golfpass.net/image/001.png">
<meta property="og:url" content="http://golfpass.net">
<!-- Bootstrap core CSS -->
<script src="/public/sangmin/js/prefixfree.min.js"></script>
<link rel="stylesheet" href="/public/sangmin/dist/bootstrap/bootstrap.min.css">
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/xeicon@2.3.3/xeicon.min.css">
<link rel="stylesheet" href="/public/css/main.css">
<link rel="shortcut icon" href="/favicon.ico">
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

<!-- 추가한 부분 -->
<style>
#bg-div{ background-image:url(<?=$product_main[0]->photo?>) !important}
.content-box{ position:relative}
.content-box:first-child a .content{ height:250px}
.content-box a .content{ height: 100px; transition:0.8s; background-repeat:no-repeat; background-position:center; background-size:cover}
.content-box a:hover .content{height:250px !important}
.content-box .new_position{ position:absolute; left:40px; margin:0 !important; bottom:30px}
.content-box .new_position2{ position:absolute; left:95px; margin:0 !important; bottom:25px}
.content-box .new_position3{ position:absolute; right:40px; margin:0 !important; bottom:30px}
.blank_img{ max-width:438px; width:100%}
@media (max-width:767px){.blank_img{ max-width:100%;}}
@media (max-width:450px){
#main-wrap #section5 .content-box .content h1{ font-size:24px}
.content-box .new_position{left:30px;}
.content-box .new_position2{left:80px;}
}
</style>
<!-- // 추가한 부분 -->

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-82379730-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-82379730-2');
</script>


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
                    <li><a style="color:white;" href="<?=site_url(admin_home_uri.'')?>">관리자 페이지</a></li>
                <?php }?>
                    <li><a style="color:white;" href="<?=site_url(shop_category_uri.'/gets_by_name/나라별')?>">지역별 골프장</a></li>
                    <li><a style="color:white;" href="<?=site_url(golfpass_panel_uri.'/gets')?>">그늘집 by GOLFPASS</a></li>
                    <li><a style="color:white;" href="<?=site_url(content_uri.'/gets?board_id=4')?>">고객센터</a></li>
                <?php if(!is_login()){?>
                    <li><a style="color:white;" href="<?=site_url(user_uri.'/login')?>">로그인</a></li>
                    <li><a style="color:white;" href="<?=site_url(user_uri.'/register_agree_1')?>">회원가입</a></li>
                <?php }?>
                <?php if(is_login()){?>
                    <li><a style="color:white;" href="<?=site_url(shop_mypage_uri.'/gets_wishlist')?>">마이페이지</a></li>
                    <li><a style="color:white;" href="<?=site_url(user_uri.'/logout')?>">로그아웃</a></li>
                <?php }?>
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
                    <a class="mk-search-trigger mk-fullscreen-trigger" href="#" id="search-button-listener">
                        <span><i class="xi xi-search" id="search-button"></i></span>
                    </a>
                    <div class="mk-fullscreen-search-overlay" id="mk-search-overlay">
                        <a href="#" class="mk-fullscreen-close" id="mk-fullscreen-close-button"><i class="xi xi-close"></i></a>
                        <div id="mk-fullscreen-search-wrapper">
                            <form method="get" id="mk-fullscreen-searchform" action="">
                                <input type="text" value="" placeholder="Search..." id="mk-fullscreen-search-input">
                                <i class="xi xi-search fullscreen-search-icon"><input value="" type="submit"></i>
                            </form>
                        </div>
                    </div>
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
               <div style="margin-top:25px;"><a href="<?=site_url(shop_mypage_uri."/gets_wishlist")?>"><img src="<?=$user->profilePhoto?>" alt="" style="width:30px; height:30px; border-radius: 15px;"></a></div>
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
                <div class="search-container d-flex align-items-center position-relative">
                                    <i class="xi xi-search"></i>
                                    <input id="serach"type="text" placeholder="관심있는 나라나 골프장을 검색해보세요!">
                                    <!--NOTE 검색결과 창-->
                                    <div class="search-content-container position-absolute w-100">

                                    </div>
                            </div>
            </div>
            <div id='nav-icon-box' class="col  d-flex justify-content-end">
            <?php if(!is_login()){?>
                <div id="login" class="d-flex align-items-center">
                    <span><i class="xi-log-in xi-x"></i></span>
                    <p class="mb-0"><a style="color: white; font-family: 'notokr-regular', sans-serif; font-size: 12px;" href="<?=site_url(user_uri.'/login')?>">로그인</a></p>
                </div>
                <div id="join" class="d-flex align-items-center">
                    <span><i class="xi xi-user-plus"></i></span>
                    <p class="mb-0"><a style="color: white; font-family: 'notokr-regular', sans-serif; font-size: 12px;" href="<?=site_url(user_uri.'/register_agree_1')?>">회원가입</a></p>
                </div>
            <?php }else{?>
               <div style="margin-top:25px;"><a href="<?=site_url(shop_mypage_uri."/gets_wishlist")?>"><img src="<?=$user->profilePhoto?>" alt="" style="width:30px; height:30px; border-radius: 15px;"></a></div>
                <div id="logout" class="d-flex align-items-center">
                    <span><i class="xi-log-out xi-x"></i></span>
                    <p class="mb-0"><a style="color: white; font-family: 'notokr-regular', sans-serif; font-size: 12px;" href="<?=site_url(user_uri.'/logout')?>">로그아웃</a></p>
                </div>
            <?php }?>
            </div>
            <div class="col ml-auto toggle"
                 onclick="$('body').toggleClass('menu-open'); $('.carousel-indicators').toggleClass('d-none d-flex');">
                <span>
                    <i class="xi xi-bars"></i>
                </span>
            </div>
        </nav>
    </header>

    <div id="bg-div" style=""></div>
    <section id="section1" class="scroll-smooth">
        <article class="carousel slide" id='section1-slide'>
            <ol class=" carousel-indicators d-flex flex-column align-items-center">
            </ol>
            <div class="carousel-inner">
            <?php if(isset($product_main[0])){?>
                <div class="carousel-item active" style=" background-image:url(<?=$product_main[0]->photo?>); ">
                    <div class="content-box d-flex flex-column align-items-start justify-content-center justify-content-lg-end">
                        <div class='title'>
                            <h1><?=$product_main[0]->name?></h1>
                            <p><?=$product_main[0]->eng_name?></p>
                            <p><?=$product_main[0]->region?> - <?=$product_main[0]->hole_count?> / <?=$product_main[0]->distance?></p>
                        </div>
                        <div class="content">
                            <p><span>
                                <?php for($i=0;$i < (int)$product_main[0]->avg_score; $i++){?>
                                    <i class="xi xi-star"></i>
                                <?php }?>
                                <?php for($i=0;$i < 5- (int)$product_main[0]->avg_score; $i++){?>
                                    <i class="xi xi-star-o"></i>
                                <?php }?>
                                </span>(리뷰 <?=$product_main[0]->reviews_count?>개)
                            </p>
                        </div>
                        <a href="<?=site_url(shop_product_uri."/get/{$product_main[0]->id}")?>">
                        <div class="btn-box d-flex align-items-center justify-content-center">
                        <button>보러가기
                            </button>
                        </div>
                        </a>
                    </div>
                </div>
                <?php }?>
                <?php for($i=1; $i<= count($product_main)-1 ; $i++){?>
                <div class="carousel-item" style=" background-image:url(<?=$product_main[$i]->photo?>); ">
                    <div class="content-box d-flex flex-column align-items-start justify-content-center justify-content-lg-end">
                        <div class='title'>
                        <h1><?=$product_main[$i]->name?></h1>
                        <p>eng name form</p>
                        <p><?=$product_main[$i]->region?> - <?=$product_main[$i]->hole_count?> / <?=$product_main[$i]->distance?></p>
                        </div>
                        <div class="content">
                            <p><span>
                            <?php for($j=0;$j < (int)$product_main[$i]->avg_score; $j++){?>
                                    <i class="xi xi-star"></i>
                                <?php }?>
                                <?php for($j=0;$j < 5- (int)$product_main[$i]->avg_score; $j++){?>
                                    <i class="xi xi-star-o"></i>
                                <?php }?>

                            </span>(리뷰 <?=$product_main[$i]->reviews_count?>개)
                            </p>
                        </div>
                        <a href="<?=site_url(shop_product_uri."/get/{$product_main[$i]->id}")?>">
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
            <span><a href="http://blog.naver.com/golfpass_" target="_blank"><i class="xi xi-naver"></i></a></span>
            <span><a href="https://www.facebook.com/Golfpass-1193606817407595" target="_blank"><i class="xi xi-facebook-official"></i></a></span>
            <span><a href="https://www.instagram.com/golfpass_net" target="_blank"><i class="xi xi-instagram"></i></a></span>
            <span><a href="https://www.youtube.com/channel/UCVCuIlbXMgiv4TrPolcgkgQ" target="_blank"><i class="xi xi-youtube-play"></i></a></span>
        </section>
    </section>

    <section id="section2" class="mb-5 main-section scroll-smooth container-fluid d-flex align-items-center">
                 <article class="w-100 p-xl-4">
                         <div class="row no-gutters main-section-title" style="margin-bottom:20px !important;">
                                 <h4 class="main_sub_title">지역별 골프장</h4>
                         </div>
<!--NOTE 나라별 모바일 구간 -->
<div class="row no-gutters flex-column d-md-none" style="padding-top: 0 !important;">
    <?php for($i=0;$i < count($nation_list)	;$i++){
        
    //도시카테고리 존재하는지 ? 도시리스트 : 상품리스트
    $sub_cate =$this->db->query("SELECT id FROM product_categories as c WHERE c.parent_id = {$nation_list[$i]->id}")->row();
    if($sub_cate !== null){ ?>
        <a href="<?=site_url(shop_category_uri."/gets/{$nation_list[$i]->id}")?>">
    <?php }else{?>
        <a href="<?=site_url(shop_product_uri."/gets/{$nation_list[$i]->id}")?>">
    <?php }?>
            <div class="col-12 d-flex justify-content-center mb-2 bg-dark" style="background-image:url(<?=$nation_list[$i]->photo?>); background-repeat:no-repeat; background-position:center; background-size:cover">
                <img src="/public/images/blank3.png" class="blank_img">
                <div class="mobile-content position-absolute d-flex flex-column align-items-center justify-content-end">
                    <h3 style="text-shadow: 0 0 7px rgba(0,0,0,1);"><?=$nation_list[$i]->name?></h3>
                    <p style="text-shadow: 0 0 7px rgba(0,0,0,1);"><?=$nation_list[$i]->desc?></p>
                </div>
            </div>
        </a>
    <?php }?>
</div>
<!--NOTE 나라별 slide 테블릿 ~ 구간 -->

                         <div class="row flex-nowrap d-none d-md-flex position-relative pt-5" style="padding-top: 0 !important;">
                                 <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:980px;height:440px;overflow:hidden;visibility:hidden;">
                                         <!-- Loading Screen -->
                                         <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:980px;height:440px;overflow:hidden;">
                                             <!-- 아래 반복 -->
                                                 <?php for($i=0;$i < count($nation_list)	;$i++){?>

                      <div class="slide-item d-flex">
                        <?php
                        //도시카테고리 존재하는지 ? 도시리스트 : 상품리스트
                        $sub_cate =$this->db->query("SELECT id FROM product_categories as c WHERE c.parent_id = {$nation_list[$i]->id}")->row();
                        if($sub_cate !== null){ ?>
                            <a href="<?=site_url(shop_category_uri."/gets/{$nation_list[$i]->id}")?>">
                        <?php }else{?>
                            <a href="<?=site_url(shop_product_uri."/gets/{$nation_list[$i]->id}")?>">
                        <?php }?>

                         <img src="<?=$nation_list[$i]->photo?>" class="w-100"/>
                         <div class="position-absolute content d-flex flex-column justify-content-center align-items-center">
                             <h3 style="text-shadow: 0 0 7px rgba(0,0,0,1);"><?=$nation_list[$i]->name?></h3>
                             <p style="text-shadow: 0 0 7px rgba(0,0,0,1);"><?=$nation_list[$i]->desc?></p>
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
                         <div class="row no-gutters main-section-title" style="margin-bottom:20px !important;">
                             <h4 class="main_sub_title">골프패스 패널이 추천하는 골프장</h4>
                         </div>
                         <div class="row position-relative pt-5 items justify-content-around" style="padding-top: 0 !important;">
                                             <!-- 아래 div반복 -->
                                             <?php for($i=0;$i<count($products_panel); $i++){?>
                             <div class="col-12 col-md-6 col-lg-3 mb-3 d-flex item">
                             <a href="<?=site_url(shop_product_uri."/get/{$products_panel[$i]->id}")?>">
                                 <figure>
                                 								<!-- 이부분 수정 : 아래 이미지 경로에서 blank2.png 파일을 받아서 똑같은 경로에 넣어줘야함 -->
                                                                 <div class="position-relative rounded-top" style="background-image:url(<?=$products_panel[$i]->photos[0]?>); background-repeat:no-repeat; background-position:center; background-size:cover">
                                                                         <img src="/public/images/blank2.png" class="blank_img">
                                                                <!-- // 이부분 수정 -->
                                                                          
                                                                         <span class="position-absolute text-light price" style="text-shadow: 0 0 7px rgba(0,0,0,1);"><?=number_format($products_panel[$i]->price)?>원</span>
                                                                 </div>
                                                                 <div class="d-flex align-items-center p-1 text-light rounded-top content">
                                                                         <i class="xi-marker-check ml-1 mr-1" style="padding-bottom:2px;"></i>
                                                                         <p class=" mb-0 "><?=$products_panel[$i]->hotel_id !== null ? "골프장+숙박" : "골프장"?></p>
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
            <div class="row no-gutters main-section-title mb-5" style="margin-bottom: 20px !important;">
                <h4 class="main_sub_title">테마별 골프장</h4>
            </div>
            <div class="row no-gutters flex-column d-sm-none">
                <div class="col-12 d-flex justify-content-center mb-2 bg-dark" style="height: 180px;">
                    <!--	<img class="w-100" src="/public/sangmin/img/golf_course_1.jpg" alt="">-->
                    <div class="mobile-content position-absolute d-flex flex-column align-items-center justify-content-end">
                        <h1 style="text-shadow: 0 0 7px rgba(0,0,0,1);">이달의 인기 코스</h1>
                        <p style="text-shadow: 0 0 7px rgba(0,0,0,1);">트렌디한 코스를 경험하고 싶다면</p>
                    </div>
                </div>
            </div>
            <div class="row no-gutters d-none d-sm-flex">
                <div class="col-12 col-lg-6 position-relative ">
                    <a href="<?=site_url(shop_product_uri."/gets/{$thema_list[0]->id}")?>">
                    <img src="<?=$thema_list[0]->photo?>" alt="" width="100%">

                    <div class='position-absolute text-light'>
                        <h3 style="text-shadow: 0 0 7px rgba(0,0,0,1);"><?=$thema_list[0]->name?></h3>
                        <p style="text-shadow: 0 0 7px rgba(0,0,0,1);">
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
                                <h3 style="text-shadow: 0 0 7px rgba(0,0,0,1);"><?=$thema_list[1]->name?></h3>
                                <p style="text-shadow: 0 0 7px rgba(0,0,0,1);">
                                <?=$thema_list[1]->desc?>
                                </p>
                            </div>
                            </a>
                        </div>
                        <div class="col-6 position-relative">
                        <a href="<?=site_url(shop_product_uri."/gets/{$thema_list[2]->id}")?>">
                            <img src="<?=$thema_list[2]->photo?>" alt="" width="100%">

                            <div class='position-absolute text-light'>
                                <h3 style="text-shadow: 0 0 7px rgba(0,0,0,1);"><?=$thema_list[2]->name?></h3>
                                <p style="text-shadow: 0 0 7px rgba(0,0,0,1);">
                                <?=$thema_list[2]->desc?>
                                </p>
                            </div>
                            </a>
                        </div>
                        <div class="col-6 position-relative">
                        <a href="<?=site_url(shop_product_uri."/gets/{$thema_list[3]->id}")?>">
                            <img src="<?=$thema_list[3]->photo?>" alt="" width="100%">

                            <div class='position-absolute text-light'>
                                <h3 style="text-shadow: 0 0 7px rgba(0,0,0,1);"><?=$thema_list[3]->name?></h3>
                                <p style="text-shadow: 0 0 7px rgba(0,0,0,1);">
                                <?=$thema_list[3]->desc?>
                                </p>
                            </div>
                            </a>
                        </div>
                        <div class="col-6 position-relative">
                        <a href="<?=site_url(shop_product_uri."/gets/{$thema_list[4]->id}")?>">
                            <img src="<?=$thema_list[4]->photo?>" alt="" width="100%">

                            <div class='position-absolute text-light'>
                                <h3 style="text-shadow: 0 0 7px rgba(0,0,0,1);"><?=$thema_list[4]->name?></h3>
                                <p style="text-shadow: 0 0 7px rgba(0,0,0,1);">
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
				<div class="row no-gutters main-section-title mb-5" style="margin-bottom: 10px !important;">
					<h4 class="main_sub_title">순위별 골프장</h4>
				</div>
				<div class="d-flex mb-5 category flex-wrap" style="margin-left:10px; margin-bottom: 20px !important">
					<button data-rankingtype="avg_score" class="btn btn-outline-light btn-sm <?=$rankingType==='avg_score' ? 'active' : ''?>">#종합 평가가 높은</button>
					<button data-rankingtype="score_1" class="btn btn-outline-light btn-sm <?=$rankingType==='score_1' ? 'active' : ''?>" >#전략성이 높은</button>
					<button data-rankingtype="score_2" class="btn btn-outline-light btn-sm <?=$rankingType==='score_2' ? 'active' : ''?>" >#페어웨이가 넓은</button>
					<button data-rankingtype="score_3" class="btn btn-outline-light btn-sm <?=$rankingType==='score_3' ? 'active' : ''?>" >#코스 전장이 긴</button>
					<button data-rankingtype="score_4" class="btn btn-outline-light btn-sm <?=$rankingType==='score_4' ? 'active' : ''?>" >#그린의 난이도가 높은</button>
					<button data-rankingtype="score_5" class="btn btn-outline-light btn-sm <?=$rankingType==='score_5' ? 'active' : ''?>" >#가성비가 우수한</button>
					<button data-rankingtype="score_6" class="btn btn-outline-light btn-sm <?=$rankingType==='score_6' ? 'active' : ''?>" >#시설이 좋은</button>
					<button data-rankingtype="score_7" class="btn btn-outline-light btn-sm <?=$rankingType==='score_7' ? 'active' : ''?>" >#식사가 맛있는</button>
					<button data-rankingtype="score_8" class="btn btn-outline-light btn-sm <?=$rankingType==='score_8' ? 'active' : ''?>" >#스탭 서비스가 좋은</button>
				</div>
                <!-- 추가한 부분 -->
                <style>
                .content-box:first-child a .content{ height:250px}
				.content-box .new_position{ position:absolute; left:40px; margin:0 !important; bottom:30px}
				.content-box .new_position2{ position:absolute; left:95px; margin:0 !important; bottom:25px}
				.content-box .new_position3{ position:absolute; right:40px; margin:0 !important; bottom:30px}
				</style>
                <!-- //추가한 부분 -->
				<div class="row no-gutters">
					<div class="col-12 col-lg-6">
						<!--1위부터 3위까지 아래 div.content-box-->
						<?php
						$count = (count($products_avgScore) > 3) ? 3 : count($products_avgScore);
						 for($i=0 ; $i < $count; $i++){?>
						<div class="col-12 content-box">
							<a href="<?=site_url(shop_product_uri."/get/{$products_avgScore[$i]->id}")?>">
								<div class="d-flex align-items-center p-4 mb-3 content"
								 	style="background-image: url(<?=$products_avgScore[$i]->photos[0]?>)"> <!-- style에서 height:150px 삭제 -->
									<div class='d-flex align-items-center justify-content-center bg-light rounded-circle new_position'>
										<span class="d-flex align-items-center justify-content-center"><?=$i+1?></span>
									</div>
									<div class="d-flex flex-column ml-4 text-light new_position2">
										<h1><?=$products_avgScore[$i]->name?></h1>
										<p class="mb-0"> <?=$products_avgScore[$i]->eng_name?> - <?=$products_avgScore[$i]->region?></p>
									</div>
                                    <div class="new_position3">
                                        <span><i class="xi-star" style="color:#fcbf3f;"></i></span>
                                        <span style="color:#fff; font-family: 'notokr-demilight', sans-serif; font-size: 18px;"> <?=(ceil($products_avgScore[$i]->avg_score *10))/10?></span>
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
											<p class='mb-0'><span class='mr-3 ml-2'><?=$i+1?></span><?=$products_avgScore[$i]->name?></p>
										</div>
										<div class="ranking_ghost">
											<span><?=$products_avgScore[$i]->region?></span>
										</div>
									</div>
								</a>
							</li>
							<?php }?>
						</ul>
						<!--전체 순위 보러 가기 -->
						<div class="row justify-content-center align-items-center">
							<a href="<?=site_url(shop_product_uri."/gets_by_ranking/avg_score")?>" class="d-flex justify-content-center align-items-center" style='text-decoration: none'>
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
            <div class="row no-gutters main-section-title" style="margin-bottom: 20px !important">
                <h4 class="main_sub_title">그늘집 by GOLFPASS</h4>
            </div>
            <!-- <div class="row no-gutters justify-content-start">
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
                        <p class="mb-0"><?=$panels[$i]->intro?> </p>
                        <div class="position-absolute review-box">
                                <span>
                                    <i class="xi-pen"></i> <?=$panels[$i]->num_contents?>개
                                </span></div>
                    </a>
                    </div>
                </div>
                <?php }?>
            </div> -->
            <div class="panel_redesign" style="cursor: pointer;" onclick="location.href='<?=site_url(golfpass_panel_uri."/gets")?>';">
                <div class="panel_text" style="width: 50%; margin: 0 auto;">
                    <h1>그늘집</h1>
                    <p>일본 골프 전문가의 여행기를 열람하세요!</p>
                </div>
            </div>
        <div class="row justify-content-center align-items-center">
            <a href="<?=site_url(golfpass_panel_uri."/gets")?>" class="d-flex justify-content-center align-items-center" style='text-decoration: none'>
                <p class="mb-0 text-light mr-3">
                    전체 패널 보러가기
                </p>
                <span style='width: 30px;height: 30px' class="rounded-circle bg-light d-flex align-items-center justify-content-center"><i class="xi xi-angle-right text-dark"></i></span>
            </a>
        </div>
        </article>
    </section>
    <!-- <section id="section7" class="mb-lg-5 container-fluid d-flex">
        <article class="w-100">
            <div class="row d-flex justify-content-center">
                <iframe width="90%" height="100%" src="https://www.youtube.com/embed/GF4xrSnzNPo" frameborder="0"
                        gesture="media" allowfullscreen style="min-height: 725px;"></iframe>
            </div>
        </article>
    </section> -->
    <footer id='footer' class='main-footer container-fluid'>
        <div id="partner">
            <div class="row" style="width:100%;">
                <div class="w-100">
                    <h6 >PARTNERS</h6>
                </div>
                <div class="d-flex flex-wrap">
                    <figure>
                        <img src="/public/sangmin/img/partner/partner_accordiagolf.png" alt="">
                    </figure>
                    <figure>
                        <img src="/public/sangmin/img/partner/partner_orixgolf.png" alt="">
                    </figure>
                    <figure>
                        <img src="/public/sangmin/img/partner/partner_PGM.png" alt="">
                    </figure>
                    <figure>
                        <img src="/public/sangmin/img/partner/partner_princehotel.png" alt="">
                    </figure>
                    <figure>
                        <img src="/public/sangmin/img/partner/partner_timescar.png" alt="">
                    </figure>
                    <figure>
                        <img src="/public/sangmin/img/partner/partner_hiltonhotel.png" alt="">
                    </figure>
                    <figure>
                        <img src="/public/sangmin/img/partner/partner_bookingdotcom.png" alt="">
                    </figure>
                </div>
            </div>

        </div>

         <div class="row d-flex" style="width:100%;">
                 <ul>
                         <li class="title">ABOUT US</li>
                         <li><a href="http://www.playseven.co.kr">회사 소개</a></li>
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
                 </ul>
                 <ul>
                         <li class="title">NEWS LETTER</li>
                         <li class="mb-20"><input type="text" id="newsLetter" placeholder="E-mail을 입력해주세요"></li>
                         <li><strong>골프패스</strong>
                                 <p style="margin-bottom: 0;">에서 제공하는 유용한 소식</p>
                         </li>
                 </ul>
         </div>
         <div class="row d-flex" style="width:100%; margin:0;">
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
<script src="public/sangmin/js/custom/main_section2.js"></script>
<script src="public/sangmin/js/custom/search.js"></script>
<script src="public/sangmin/js/mobile_search.js"></script>
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

<!-- 추가한 부분 -->
<script>
$(function(){
	$(".content-box:nth-child(2) a .content, .content-box:nth-child(3) a .content").hover(
		function() {

			$(".content-box:first-child a .content").css("height","100px");
		}, 
		function() {

			$(".content-box:first-child a .content").css("height","250px");	
		}
	);
});
</script>
<!-- // 추가한 부분 -->
<!-- 뉴스레터 시작-->
<script>
    $("#newsLetter").keypress(function (e) {
        var key = e.which;
        if(key == 13)  // the enter key code
        {
            var email =$(this).val();
            var url = "<?=site_url(main_uri."/add_newslatter")?>";
          
            $.ajax({
                type:"post",
                dataType:"json",
                url : url,
                data: { email : email},
                success : function(data){
                    alert(data.email + "이(가) 뉴스레터에 등록되었습니다.");
                },
                error: function(xhr, textStatus, errorThrown){
                    alert('에러...');
                    $('.loading').fadeOut(500);
                    console.log('code: '+request.status+"\n"+'message: '+request.responseText+"\n"+'error: '+error);
                    console.log(errorThrown);
                }
            });
            return false;  
        }
    });     
</script>

<!-- 뉴스레터 끝-->
<!-- 검색창 엔터치면 결과창으로 시작 -->
<script>
 $("#serach").keypress(function (e) {
        var key = e.which;
        if(key == 13)  // the enter key code
        {
            var value =$(this).val();
            window.location.href="<?=site_url(shop_product_uri."/gets_by_hash/")?>"+value; 
        }
    });     
</script>
<!-- 검색창 엔터치면 결과창으로 끝 -->
</body>

</html>
