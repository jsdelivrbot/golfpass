<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>골프패스</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="/public/sangmin/dist/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/xeicon@2.3.3/xeicon.min.css">
    <link rel="stylesheet" href="/public/css/detail-main.css">
    <link rel="stylesheet" href="/public/sangmin/css/xeicon.min.css">
    <link rel="stylesheet" href="/public/sangmin/dist/Nwagon/Nwagon.css" type="text/css">
    <script src="/public/sangmin/js/jquery-3.2.1.min.js"></script>
</head>
<body>

    <!-- 로딩딤시작 -->
    <style>
    .jy-dim
    {
        position: fixed;
        width: 100%;
        height :100%;
        background-color:black;
        z-index :10000;
    }
    .jy-loader {
        z-index :10001;
        position: fixed;
        top: 50%;
        left: 50%;
        margin-top: -150px;
        margin-left: -60px; 
        border: 16px solid #f3f3f3; /* Light grey */
        border-top: 16px solid #3498db; /* Blue */
        border-radius: 50%;
        width: 120px;
        height: 120px;
        animation: spin 2s linear infinite;
    }
    @-webkit-keyframes spin {
        0% { -webkit-transform: rotate(0deg); }
        100% { -webkit-transform: rotate(360deg); }
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
</style>
<script>
    $(document).ready(function(){
        $(".jy-dim").fadeOut(500);
    })
</script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-82379730-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-82379730-2');
</script>

<div class="jy-dim">
    <div class="jy-loader"></div>
</div>
<!-- 로딩딤끝 -->
<div id='detail-wrap'>
    <!--숨겨진 nav-->
    <div class="menu-container position-fixed">
        <div class="menu-sliders"></div>
        <div class="menu-sliders"></div>
        <div class="menu-sliders"></div>
        <div class="menu">
            <ul class="list-unstyled">
                <?php if(is_admin()){?>
                <li><a style="font-family: 'notokr-light', sans-serif; font-size: 20px; font-weight: normal; color: #fff;" href="<?=site_url(admin_home_uri.'')?>">관리자 페이지</a></li>
                <?php }?>
                <li><a style="font-family: 'notokr-light', sans-serif; font-size: 20px; font-weight: normal; color: #fff;" href="<?=site_url(shop_category_uri.'/gets_by_name/나라별')?>">지역별 골프장</a></li>
                <li><a style="font-family: 'notokr-light', sans-serif; font-size: 20px; font-weight: normal; color: #fff;" href="<?=site_url(golfpass_panel_uri.'/gets')?>">그늘집 by GOLFPASS</a></li>
                <li><a style="font-family: 'notokr-light', sans-serif; font-size: 20px; font-weight: normal; color: #fff;" href="<?=site_url(content_uri.'/gets?board_id=4')?>">고객센터</a></li>
                <?php if(!is_login()){?>
                <li><a style="font-family: 'notokr-light', sans-serif; font-size: 20px; font-weight: normal; color: #fff;" href="<?=site_url(user_uri.'/login')?>">로그인</a></li>
                <li><a style="font-family: 'notokr-light', sans-serif; font-size: 20px; font-weight: normal; color: #fff;" href="<?=site_url(user_uri.'/register_agree_1')?>">회원가입</a></li>
                <?php }?>
                <?php if(is_login()){?>
                <li><a style="font-family: 'notokr-light', sans-serif; font-size: 20px; font-weight: normal; color: #fff;" href="<?=site_url(shop_mypage_uri.'/gets_wishlist')?>">마이페이지</a></li>
                <li><a style="font-family: 'notokr-light', sans-serif; font-size: 20px; font-weight: normal; color: #fff;" href="<?=site_url(user_uri.'/logout')?>">로그아웃</a></li>
                <?php }?>
            </ul>
        </div>
    </div>
    <header id="header" class="container-fluid">
        <!--  NOTE mobile -->
        <nav id='sm-nav' class="row no-gutters justify-content align-items-stretch d-sm-none panel-nav">
            <div id="logo" class='col-3 justify-content-center d-flex align-self-center align-items-center'>
               <a href="<?=site_url()?>"> <img src="/public/sangmin/img/icon/logo_mobile.png" class="d-md-none" alt=""></a>
           </div>
           <div id='nav-icon-box' class="offset-2 col-5 d-flex align-items-stretch justify-content-end">
            <div id="search" class="d-flex align-items-center">
                <a class="mk-search-trigger mk-fullscreen-trigger" href="#" id="search-button-listener">
                    <span><i class="xi xi-search" id="search-button"></i></span>
                </a>
                <div class="mk-fullscreen-search-overlay" id="mk-search-overlay">
                    <a href="#" class="mk-fullscreen-close" id="mk-fullscreen-close-button"><i class="xi xi-close"></i></a>
                    <div id="mk-fullscreen-search-wrapper">
                        <div method="get" id="mk-fullscreen-searchform" action="">
                            <input type="text" value="" placeholder="Search..." id="mk-fullscreen-search-input">
                            <i class="xi xi-search fullscreen-search-icon"><input value="" id="mobile_search_btn" type="submit"></i>
                        </div>
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
        <div class="col-2 ml-auto toggle" onclick="$('body').toggleClass('menu-open'); $('.carousel-indicators').toggleClass('d-none d-flex');">
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
        <div class="search-container d-flex align-items-center position-relative">
            <i class="xi xi-search"></i>
            <input id="input_search"type="text" placeholder="관심있는 나라나 골프장을 검색해보세요!">
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
    <div class="col ml-auto toggle" onclick="$('body').toggleClass('menu-open'); $('.carousel-indicators').toggleClass('d-none d-flex');">
        <span>
            <i class="xi xi-bars"></i>
        </span>
    </div>
</nav>
</header>
<!--NOTE 상단 슬라이드 + 내용 + chart-->

<section class="container-fluid" id="section1" style="background-image:url('<?=$product_photos[0]->name ?? ''?>') ;">
    <!--NOTE 화면 어둡게-->
    <div id="shadow"></div>
    <article id="section1-wrap" class="row no-gutters justify-content-center justify-content-lg-start">
        <div id='detail_slide' class="col">
            <div class="slider-for">
                <!--NOTE 슬라이드 큰화면-->
                <?php for($i = 0 ;$i < count($product_photos);$i++){?>
                <div>
                    <img src="<?=$product_photos[$i]->name?>" alt="">
                </div>
                <?php }?>
                <?php for($i = 0 ;$i < count($product_photos);$i++){?>
                <div>
                    <img src="<?=$product_photos[$i]->name?>" alt="">
                </div>
                <?php }?>
                <?php for($i = 0 ;$i < count($product_photos);$i++){?>
                <div>
                    <img src="<?=$product_photos[$i]->name?>" alt="">
                </div>
                <?php }?>
                <?php for($i = 0 ;$i < count($product_photos);$i++){?>
                <div>
                    <img src="<?=$product_photos[$i]->name?>" alt="">
                </div>
                <?php }?>
            </div>
            <div class="slider-nav">
                <!--NOTE 슬라이드 하단 이미지 네비게이션-->
                <?php for($i = 0 ;$i < count($product_photos);$i++){?>
                <div>
                    <img src="<?=$product_photos[$i]->name?>" alt="">
                </div>
                <?php }?>
                <?php for($i = 0 ;$i < count($product_photos);$i++){?>
                <div>
                    <img src="<?=$product_photos[$i]->name?>" alt="">
                </div>
                <?php }?>
                <?php for($i = 0 ;$i < count($product_photos);$i++){?>
                <div>
                    <img src="<?=$product_photos[$i]->name?>" alt="">
                </div>
                <?php }?>
                <?php for($i = 0 ;$i < count($product_photos);$i++){?>
                <div>
                    <img src="<?=$product_photos[$i]->name?>" alt="">
                </div>
                <?php }?>
            </div>
        </div>
        <div id="detail" class='col'>
            <div id="score" class="flex-column align-items-center">
                <i class="xi xi-star xi-2x"></i>
                <span class="score_num">종합 점수 <?=ceil(($product->avg_score)*10)/10?>점</span>
            </div>
            <p id="regine">
                <?=$product->region?>
            </p>
            <h1 id="title">
                <?=$product->name?>
            </h1>
            <p id="title-en">
                <?=$product->eng_name?>
            </p>
            <div id="content">
                <p id='sub-title'>소개</p>
                <p>
                    <?=$product->desc?>
                </p>
            </div>
        </div>
        <div id="chart" class="col flex-column align-items-center justify-content-center">
            <canvas id="chart-canvas" class="ml-auto mr-auto" >

            </canvas>
            <h1 id="chart-score" class="text-center">종합 점수
                <p><?=ceil(($product->avg_score)*10)/10?>점</p>
            </h1>
        </div>

    </article>
</section>
<article id='section2' class='row no-gutters'>
   <!-- book start -->
   <div id="book-box-wrap" class="order-1 order-lg-3 col-12 col-lg-3">
    <div id='book-box'>
        <div id="personnel">
            <span class="box-title" style="font-size:16px;">예약 인원</span>
            <div id='count-box' class='d-flex align-items-stretch justify-content-end'>
                <div style="display:inline-block; margin-right:0px; float:right">
                    <input style="display:inline-block" id="j-group-value" class="form-control" type="number" value="4" min="2" max="12" />
                </div>
            </div>
        </div>
        <div id='dateBox'>
            <form action="#" class="d-flex align-items-center justify-content-between">
                <div class="form-group d-flex align-items-center mb-0">
                    <input type="text" id="s-day" placeholder="시작 일정" value="<?=$current_date?>">
                    <i class="xi-calendar-check"></i>
                </div>
                <?php if(isset($hotel)):?>
                <span>~</span>
                <div class="form-group d-flex align-items-center mb-0">
                    <input type="text" id="e-day" placeholder="종료 일정" value="<?=$current_date_plus?>">
                    <i class="xi-calendar-check"></i>
                </div>
                <?php endif?>
            </form>
        </div>
        <div id="info" class="pt-20">
            <ul class="list-unstyled" style="margin-bottom:0;">
                <li style="font-family: 'notokr-medium', sans-serif;">조 정보</li>
                              
                        <!-- 조리스트 시작 -->
                            <form action="<?=site_url(shop_order_uri."/golfpass")?>" method="get" id="golfpass_order_form">

                                <input type="hidden" name="num_people" value="0">
                                <input type="hidden" name="start_date">
                                <input type="hidden" name="end_date">
                                <input type="hidden" name="total_price">
                                <input type="hidden" name="product_id" value="<?=$product->id?>">
                        </form>
                        <!-- 조리스트 끝 -->
                    </ul>
                </div>
                <div id="info" class="pt-20">
                    <ul class="list-unstyled">
                        <li style="font-family: 'notokr-medium', sans-serif;">비고</li>
                        <li class='d-flex align-items-center'>
                            <span class="mr-2 align-self-baseline"><i class='xi-radiobox-checked'></i></span>
                            <p>스마트스코어 탑재 카트 보유</p>
                        </li>
                        <li class='d-flex align-items-center'>
                            <span class="mr-2 align-self-baseline"><i class='xi-radiobox-checked'></i></span>
                            <p>미슐랭 2스타 레스토랑 보유</p>
                        </li>
                        <li class='d-flex align-items-center'>
                            <span class="mr-2 align-self-baseline"><i class='xi-radiobox-checked'></i></span>
                            <p>사계절 내내 골프가 가능한 지역</p>
                        </li>
                        <li class='d-flex align-items-center'>
                            <span class="mr-2 align-self-baseline"><i class='xi-radiobox-checked'></i></span>
                            <p>스마트스코어 탑재 카트 보유</p>
                        </li>
                        <li class='d-flex align-items-center'>
                            <span class="mr-2 align-self-baseline"><i class='xi-radiobox-checked'></i></span>
                            <p>미슐랭 2스타 레스토랑 보유</p>
                        </li>
                        <li class='d-flex align-items-center'>
                            <span class="mr-2 align-self-baseline"><i class='xi-radiobox-checked'></i></span>
                            <p>사계절 내내 골프가 가능한 지역</p>
                        </li>
                    </ul>
                    <div id='price' class="mt-20 mb-20">
                        <h3 class='mb-3' style="font-size:16px; margin-bottom:5px !important;">가격</h3>
                        <p id="total_price">
                            <?=$price?>
                        </p>
                    </div>
                    <p class="wishlist"><a onclick="ajax_a(this); return false;" data-action="<?=site_url(shop_wishlist_uri."/ajax_add/{$product->id}")?>"href="#">위시리스트에 추가하기</a></p>
                </div>
                <div id='book_ok' style="width:100%; height:70px; background:#fff; border: 1px solid #e5e5e5; border-top:0; padding:10px; cursor: pointer;" onclick="location.href='#';">
                    <div id="book_ok_button" style="width:100%; height:100%; background:#79b754; border-radius:25px;">
                        <p id="golfpass_order" style="font-family: 'notokr-reglur', sans-serif; font-size: 16px; color: #fff; text-align:center; line-height: 49px;">예약하기</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- /book end -->
        <article id="section2-wrap" class="order-2 col-12  col-lg-9 ">
            <section class="col-12" id="article-section-1">
                <div class='d-flex flex-column title-box'>
                    <span>0<?=$number++?></span>
                    <h1 class="mt-13">골프장</h1>
                </div>
                <div class="list-content">
                    <ul class="d-flex flex-wrap">
                        <li class='d-flex flex-column'><span>홀수</span>
                            <p class='mt-2'>
                                <?=$product->hole_count?>
                            </p>
                        </li>
                        <li class='d-flex flex-column'><span>파</span>
                            <p class='mt-2'>
                                <?=$product->pa?>
                            </p>
                        </li>
                        <li class='d-flex flex-column'><span>길이</span>
                            <p class='mt-2'>
                                <?=$product->distance?>
                            </p>
                        </li>
                        <li class='d-flex flex-column'><span>잔디 타입</span>
                            <p class='mt-2'>
                                <?=$product->grass_type?>
                            </p>
                        </li>
                        <li class='d-flex flex-column'><span>코스 타입</span>
                            <p class='mt-2'>
                                <?=$product->course_type?>
                            </p>
                        </li>
                        <li class='d-flex flex-column'><span>코스 구성</span>
                            <p class='mt-2'>
                                <?=$product->course_config?>
                            </p>
                        </li>
                        <li class='d-flex flex-column'><span>개장연도</span>
                            <p class='mt-2'>
                                <?=$product->open_day?>
                            </p>
                        </li>
                        <li class='d-flex flex-column'><span>전화번호</span>
                            <p class='mt-2'>
                                <?=$product->number?>
                            </p>
                        </li>
                    </ul>
                </div>
            </section>
            <?php if(isset($hotel)){?>
            <section class="col-12" id="article-section-2">
                <div class='d-flex flex-column title-box'>
                    <span>0<?=$number++?></span>
                    <h1 class="mt-13">숙박</h1>
                </div>
                <div class="list-content">
                    <ul class="d-flex flex-wrap">
                        <li class='d-flex flex-column'><span>업체명</span>
                            <p class='mt-2'>
                                <?=$hotel->name?>
                            </p>
                        </li>
                        <li class='d-flex flex-column'><span>객실수</span>
                            <p class='mt-2'>
                                <?=$hotel->room_count?>
                            </p>
                        </li>
                        <li class='d-flex flex-column'><span>객실 타입</span>
                            <p class='mt-2'>
                                <?=$hotel->room_type?>
                            </p>
                        </li>
                        <li class='d-flex flex-column'><span>침실</span>
                            <p class='mt-2'>
                                <?=$hotel->bedroom?>
                            </p>
                        </li>

                        <li class='d-flex flex-column'><span>화장실</span>
                            <p class='mt-2'>
                                <?=$hotel->bathroom?>
                            </p>
                        </li>
                        <li class='d-flex flex-column'><span>최대 인원</span>
                            <p class='mt-2'>
                                <?=$hotel->maxium_number_of_people?>
                            </p>
                        </li>
                        <li class='d-flex flex-column'><span>침대</span>
                            <p class='mt-2'>
                                <?=$hotel->bed?>
                            </p>
                        </li>
                        <li class='d-flex flex-column'><span>체크 인/체크 아웃</span>
                            <p class='mt-2'>
                                <?=$hotel->check_in_out?>
                            </p>
                        </li>
                        <li class='d-flex flex-column'><span>전화번호</span>
                            <p class='mt-2'>
                                <?=$hotel->number?>
                            </p>
                        </li>
                    </ul>
                </div>
            </section>
            <?php }?>
            <?php if(count($product_options) !== 0) {?>
            <section class="col-12" id="article-section-3">
                <div class='d-flex flex-column title-box'>
                    <span>0<?=$number++?></span>
                    <h1 class="mt-13">골프장 시설</h1>
                </div>
                <div class="list-content">
                    <ul class="d-flex flex-wrap">
                        <?php for($i=0 ; $i < count($product_options); $i++ ){?>
                        <li class='d-flex flex-column'>
                            <p>
                                <?=$product_options[$i]->name?>
                            </p>
                        </li>
                        <?php }?>
                    </ul>
                </div>
            </section>
            <?php }?>

            <?php if(isset($hotel_options) &&  count($hotel_options) !== 0) {?>
            <section class="col-12" id="article-section-4">
                <div class='d-flex flex-column title-box'>
                    <span>0<?=$number++?></span>
                    <h1 class="mt-13">숙박 시설</h1>
                </div>
                <div class="list-content">
                    <ul class="d-flex flex-wrap">
                        <?php for($i=0 ; $i < count($hotel_options); $i++ ){?>
                        <li class='d-flex flex-column'>
                            <p>
                                <?=$hotel_options[$i]->name?>
                            </p>
                        </li>
                        <?php }?>
                    </ul>
                </div>
            </section>
            <?php }?>
            <section class="col-12" id="article-section-5">
                <div class='d-flex flex-column title-box'>
                    <span>0<?=$number++?></span>
                    <h1 class="mt-13">주의사항</h1>
                </div>
                <div id="section-5-list-content">
                    <ul class="d-flex flex-wrap flex-column list-unstyled">
                        <li>
                            <p>
                                출발 7일 전까지 예약 취소 시 전액 환불됩니다.
                            </p>
                        </li>
                        <li>
                            <p>
                                * 출발 6일 전~1일 전 취소 시 위약금은 결제 금액의 50% 입니다.
                            </p>
                        </li>
                        <li>
                            <p>
                                * 게스트가 체크인 하지 않은 경우 고객의 변심으로 간주되어 환불이 불가합니다.
                            </p>
                        </li>
                        <li>
                            <p>
                                * 게스트 또는 호스트에게 불만이 생길 경우, 체크인 이후 24시간 내에 골프패스측에 알려야 합니다.
                            </p>
                        </li>
                        <li>
                            <p>
                                * 분쟁 발생 시 골프패스는 중재를 위해 개입할 수 있으며 이 경우 골프패스가 최종 결정을 내리게 됩니다.
                            </p>
                        </li>
                        <li>
                            <p>
                                * 예약 취소 확인 화면에서 예약 취소 버튼을 클릭해야 예약이 정식으로 취소됩니다.
                            </p>
                        </li>
                        <li>
                            <p>
                                * 게스트 환불 정책, 안전 문제로 인한 예약 취소, 또는 정상참작 가능한 상황에 해당되는 경우 숙소의 환불 정책 대신 관련 정책이 적용될 수 있습니다.
                            </p>
                        </li>
                        <li>
                            <p>
                                * 관련 세금액은 차감 및 징수됩니다.
                            </p>
                        </li>
                    </ul>
                </div>
            </section>

        </article>

    </article>
    <section id="section3" class="position-relative" style="width: 100%; padding-left: 0; height: 500px; background-color: #4d4d4d; margin-top: 100px; margin-bottom: 100px;">
        <!--TODO 구글맵-->
        <div id="map" style="width:100%;height:100%;"></div>

        <?=$this->map_api->create_script()?>
        <?php if($product->address !== ''){
            $this->map_api->add_marker($product->lat,$product->lng,$product->address,$product->map_name,$product->map_type,"false");
            $this->map_api->move_to_location($product->lat,$product->lng);
        } ?>


    </section>
    <!--TODO 리뷰  데이터 X-->
    <section id="section4" class='row no-gutters justify-content-center'>
        <div class="row review-warning-text d-flex justify-content-center">
            <div class="d-flex flex-column align-items-center">
                <span class="mt-20 mb-10">리뷰</span>
                <p class='mb-20'>타인에게 불쾌감을 주는 리뷰는 동의없이 삭제될 수 있습니다.</p>
            </div>
        </div>
        <article id="review-box" class="row no-gutters">
            <?php for($i = 0 ; $i < count ($reviews) ; $i++){?>
            <div class="col-lg-12 col-xl-6 ">
                <article class="review d-flex flex-column">
                    <div class="profile d-flex align-items-center">
                        <div class="proflie-img">
                            <img src="/public/sangmin/img/icon/noimage.png">
                        </div>
                        <div class='proflie-name'>
                            <span><?=$reviews[$i]->user_name?></span>님의
                            <span>리뷰</span>
                        </div>
                    </div>
                    <div class="content">
                        <p>
                            <?=$reviews[$i]->desc?>
                        </p>
                        <div class="score-box d-flex align-items-center">
                            <span class='score'><?=ceil($reviews[$i]->avg_score*10)/10?></span>
                            <ul class="list-unstyled">
                                <li class="d-flex align-items-center justify-content-between">
                                    <p>가성비</p>
                                    <span class="line"></span>
                                    <span><?=$reviews[$i]->score_1?>.0</span></li>
                                    <li class="d-flex align-items-center justify-content-between">
                                        <p>시설 설비</p>
                                        <span class="line"></span>
                                        <span><?=$reviews[$i]->score_2?>.0</span></li>
                                        <li class="d-flex align-items-center justify-content-between ">
                                            <p>식사</p>
                                            <span class="line"></span>
                                            <span><?=$reviews[$i]->score_3?>.0</span></li>
                                            <li class="d-flex align-items-center justify-content-between">
                                                <p>전략성</p>
                                                <span class="line"></span>
                                                <span><?=$reviews[$i]->score_4?>.0</span></li>
                                                <li class="d-flex align-items-center justify-content-between ">
                                                    <p>페어웨이 넓이</p>
                                                    <span class="line"></span>
                                                    <span><?=$reviews[$i]->score_5?>.0</span></li>
                                                    <li class="d-flex align-items-center justify-content-between ">
                                                        <p>그린의 난이도</p>
                                                        <span class="line"></span>
                                                        <span><?=$reviews[$i]->score_6?>.0</span></li>
                                                        <li class="d-flex align-items-center justify-content-between">
                                                            <p>전장의 길이</p>
                                                            <span class="line"></span>
                                                            <span><?=$reviews[$i]->score_7?>.0</span></li>
                                                            <li class="d-flex align-items-center justify-content-between">
                                                                <p>코스 상태</p>
                                                                <span class="line"></span>
                                                                <span><?=$reviews[$i]->score_8?>.0</span></li>
                                                            </ul>
                                                        </div>
                                                        <div class="date">
                                                            <p>
                                                                <?=$reviews[$i]->year?>년
                                                                <?=$reviews[$i]->month?>월
                                                                <?=$reviews[$i]->day?>일
                                                                <?=$reviews[$i]->ampm?>
                                                                <?=strlen($reviews[$i]->hour) === 1 ? "0{$reviews[$i]->hour}" : "{$reviews[$i]->hour}"?>시
                                                                <?=$reviews[$i]->min?>분</p>
                                                            </div>
                                                        </div>
                                                    </article>
                                                </div>
                                                <?php }?>

                                            </article>
                                            <section id='all' class='pl-0 d-flex justify-content-center'>
                                                <a href="<?=site_url(shop_review_uri."/gets/{$product->id}")?>">
                                                    <div id='circle' class='d-flex justify-content-center align-items-center' style="margin-right:10px;">
                                                     <span>모두보기</span>
                                                 </div>
                                             </a>
                                             <a href="<?=site_url(shop_review_uri."/add/{$product->id}")?>">
                                                <div id='circle' class='d-flex justify-content-center align-items-center' style="margin-left:10px;">
                                                 <span>리뷰 쓰러가기</span>
                                             </div>
                                         </a>
                                     </section>

                                 </section>
                                 <footer id='tp-footer' class='main-footer container-fluid'>
                                    <div id="tp-partner">
                                        <div class="row" style="width:100%;">
                                            <div class="w-100">
                                                <h6>PARTNERS</h6>
                                            </div>
                                            <div class="d-flex flex-wrap">
                                                <figure>
                                                    <img src="/public/sangmin/img/partner/b_partner_accordiagolf.png" alt="">
                                                </figure>
                                                <figure>
                                                    <img src="/public/sangmin/img/partner/b_partner_orixgolf.png" alt="">
                                                </figure>
                                                <figure>
                                                    <img src="/public/sangmin/img/partner/b_partner_PGM.png" alt="">
                                                </figure>
                                                <figure>
                                                    <img src="/public/sangmin/img/partner/b_partner_princehotel.png" alt="">
                                                </figure>
                    <!--<figure>
                        <img src="/public/sangmin/img/partner/b_partner_timescar.png" alt="">
                    </figure>-->
                    <figure>
                        <img src="/public/sangmin/img/partner/b_partner_hiltonhotel.png" alt="">
                    </figure>
                    <figure>
                        <img src="/public/sangmin/img/partner/b_partner_bookingdotcom.png" alt="">
                    </figure>
                </div>
            </div>

        </div>

        <div class="row d-flex" style="width:100%; margin-bottom:16px;">
            <ul>
                <li class="tp-title">ABOUT US</li>
                <li><a href="http://www.playseven.co.kr">회사 소개</a></li>
                <li><a href="#">이용 약관</a></li>
                <li><a href="#">개인 정보 취급 방침</a></li>
            </ul>
            <ul>
                <li class="tp-title">OFFICE</li>
                <li><span>TEL</span>
                    <p>0507-1390-5454</p>
                </li>
            </ul>
            <ul>
                <li class="tp-title">CONTACT US</li>
                <li><span>상호</span>
                    <p>PLAYSEVEN</p>
                </li>
                <li><span>대표</span>
                    <p>황현철</p>
                </li>
                <li><span>사업자 등록 번호</span>
                    <p>280-81-00963</p>
                </li>
                <li><span>등록 판매업 신고 번호</span>
                    <p>2017-서울강서-1545호</p>
                </li>
                <li><span>주소</span>
                    <p>서울특별시 강서구 공항대로 227</p>
                </li>
            </ul>
            <ul>
                <li class="tp-title">NEWS LETTER</li>
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

<script src="/public/sangmin/js/slick.js" type="text/javascript" charset="utf-8"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="/public/sangmin/dist/bootstrap/bootstrap.bundle.min.js"></script>
<script src="/public/sangmin/dist/Nwagon/Nwagon.js"></script>
<!-- <script src="/public/sangmin/js/chart.js"></script> -->
<script src="/public/sangmin/js/sticky.js"></script>
<script src="/public/sangmin/js/custom/navAction.js"></script>
<script src="/public/sangmin/js/custom/search.js"></script>
<script src="/public/sangmin/js/mobile_search.js"></script>
<script src="/public/sangmin/js/custom/detail_slide.js"></script>
<script src="/public/sangmin/js/custom/detail_sticky.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script src="<?=domain_url('/public/js/common.js')?>"></script>

<!-- 달력 -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script>
    $.datepicker.setDefaults({
        dateFormat: 'yy-mm-dd',
        prevText: '이전 달',
        nextText: '다음 달',
        monthNames: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
        monthNamesShort: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
        dayNames: ['일', '월', '화', '수', '목', '금', '토'],
        dayNamesShort: ['일', '월', '화', '수', '목', '금', '토'],
        dayNamesMin: ['일', '월', '화', '수', '목', '금', '토'],
        showMonthAfterYear: true,
        yearSuffix: '년'
    });

    let $startDate = $("#s-day");
    let $endDate = $("#e-day");
        // let $numPeople = $("select[name=num_people]");
        let $total_price = $("#total_price");
        let $numPeople = $("#j-v-num-people");
        $(document).ready(function() {
            $startDate.datepicker({
                dateFormat: 'yy-mm-dd'
            }).datepicker("setDate", new Date().getDay+1); 
            $endDate.datepicker({
                dateFormat: 'yy-mm-dd'
            }).datepicker("setDate", new Date().getDay+2); 

        });
    </script>
    <!-- 달력 -->



    <!-- 차트 -->

    <script>
        var chartOptions = {
            scale: {
                gridLines: {
                    color: "#4b4b4b",
                    lineWidth: 1
                },
                angleLines: {
                    display: true,
                },
                ticks: {
                    beginAtZero: false,
                    display: false,
                    min: 0,
                    max: 100,
                    stepSize: 20
                }
                ,
                pointLabels: { 
                    fontSize: 12,
                    fontColor: "#c8c8c8",
                    display: true,
                }
            },
            tooltips: {
                bodyFontColor: "#000000",
                bodyFontSize: 0,
                bodyFontStyle: "bold",
                bodyFontColor: '#FFFFFF',
                bodyFontFamily: "'Helvetica', 'Arial', sans-serif",
                footerFontSize: 0,
                titleFontSize: 16, //툴팁 폰트크기 @
                titleFontColor: 'orange', //툴팁 옵션색깔 @
                titleFontFamily: 'Noto Sans', //툴팁 폰트 @
                custom: function(tooltip) {
                    if (!tooltip) return;
                    // disable displaying the color box;
                    tooltip.displayColors = false;
                },
            },
            // layout: {
            //     : {
            //         left: -1,
            //         right: 0,
            //         top: 0,
            //         bottom: 0
            //     }
            // },
            legend: {
                position: 'left',
                display: false
            }
        };
        new Chart(document.getElementById("chart-canvas"), {
            type: 'radar',
            data: {
                labels: ["가성비", "시설 설비", "식사", "전략성", "페어웨이 넓이", "그린의 난이도", "전장의 길이", "코스 상태"],
                datasets: [{
                    //   label: "2050",
                    //   label:true,
                    fill: true,
                    backgroundColor: "rgba(121, 183, 84, 0.5)", //@초록색 바탕
                    borderColor: "#79b754", //@ 점수 선색
                    pointBorderColor: "#79b754", //포인트 색@
                    pointBackgroundColor: "#79b754", //@
                    pointBorderColor: "#79b754", //@
                    pointRadius: 5, //포인트 두께@
                    pointHoverRadius: 7, //호버시포인트두께
                    data: [<?=$product->score_1?> * 20, <?=$product->score_2?> * 20, <?=$product->score_3?> * 20, <?=$product->score_4?> * 20, <?=$product->score_5?> * 20, <?=$product->score_6?> * 20, <?=$product->score_7?> * 20, <?=$product->score_8?> * 20]

                }]
            },
            options: chartOptions
        });
    </script>
    <!-- 차트 -->
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
            var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
            s1.async=true;
            s1.src='https://embed.tawk.to/5a1bd9e1198bd56b8c03d88a/default';
            s1.charset='UTF-8';
            s1.setAttribute('crossorigin','*');
            s0.parentNode.insertBefore(s1,s0);
        })();
    </script>
    <!--End of Tawk.to Script-->
</body>

</html>

<!-- 검색기능 시작 -->
<script>
 $("#input_search").keypress(function (e) {
    var key = e.which;
    // console.log(1);
        if(key == 13)  // the enter key code
        {
            console.log(2);
            var value =$(this).val();
            if(value === "") return false;
            window.location.href="<?=site_url(shop_product_uri."/gets_by_hash/")?>"+value; 
        }
    });     

 $("#mk-fullscreen-search-input").keypress(function (e) {

    var key = e.which;
        if(key == 13)  // the enter key code
        {
            var value =$(this).val();
            
            window.location.href="<?=site_url(shop_product_uri."/gets_by_hash/")?>"+value; 
        }
    });     
 $("#mobile_search_btn").click(function()
 {
    var value =$("#mk-fullscreen-search-input").val();

    window.location.href="<?=site_url(shop_product_uri."/gets_by_hash/")?>"+value; 
});
</script>
<!-- 검색기능 끝 -->
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
<!-- 상품날자가격계산 -->
<script>
    let $order_form = $("#golfpass_order_form");
    $(document).ready(function() {
        //    ajax_get_price();
            $startDate.change(function() {
                // if(validationGetPrice() === 1)
                // validationGetPrice()
                ajax_get_price();
            });
            $endDate.change(function() {
                // if(validationGetPrice() === 1)
                // validationGetPrice()
                ajax_get_price();
            });
        });

    function validationGetPrice() {
        var date = $startDate.val();
        var dateArray = date.split("-");
        var startDateObj = new Date(dateArray[0], Number(dateArray[1]) - 1, dateArray[2]);

        var date = $endDate.val();
        var dateArray = date.split("-");
        var endDateObj = new Date(dateArray[0], Number(dateArray[1]) - 1, dateArray[2]);
        var betweenDay = endDateObj.getTime() - startDateObj.getTime();
        var betweenDay = betweenDay / 1000 / 60 / 60 / 24;
            // if()
            if ($startDate.val() === "" || $endDate.val() === "") {
                return 0;
            } else if (betweenDay === 0) {
                alert("하루 예약은 불가능합니다.");
                return 0;
            } else if (betweenDay <= -1) {
                alert("날자가 잘못 설정되었습니다.");
                return 0;
            }
            return 1;
        }

        function ajax_get_price() {

          
            $order_form.find("input[name=start_date]").val($startDate.val());
            $order_form.find("input[name=end_date]").val($endDate.val());
            
            $order_form.find("input[name=num_people]").val(num_people);
            // $order_form.find("input[name=num_people]").val($numPeople.data('value'));
            $order_form.find("input[name=product_id]").val("<?=$product->id?>");
            var queryString = $order_form.serialize();
            console.log(queryString);
            var url = "<?=site_url(golfpass_p_daily_price_uri."/ajax_cal")?>"
            $.ajax({
                type: "POST",
                dataType: 'json',
                data: queryString,
                url: url,
                beforeSend: function() {
                    // $('.loading').fadeIn(500);
                },
                success: function(data) {
                    console.log(data);
                    $total_price.val(data.total_price);

                    var totalPrice = data.total_price;
                    if (totalPrice.indexOf("원") > -1) {
                        totalPrice = totalPrice.substr(0, totalPrice.length - 1);
                        // $total_price.val(totalPrice);
                        $order_form.find("input[name=total_price]").val(totalPrice);
                        totalPrice = Number(totalPrice).toLocaleString('en');
                        totalPrice += "원";
                    }
                    $total_price.html(totalPrice);
                    // console.log(data);
                },
                error: function(xhr, textStatus, errorThrown) {
                    alert('에러... ');
                    // $('.loading').fadeOut(500);
                    console.log('code: ' + request.status + "\n" + 'message: ' + request.responseText + "\n" + 'error: ' + error);
                    console.log(errorThrown);
                }
            });
        }
        //예약하기
        $("#golfpass_order").click(function(event) {
            event.preventDefault();
            
            $input_numPeople=$order_form.find("input[name=num_people]");
            $endDate=$order_form.find("input[name=end_date]");
            $startDate=$order_form.find("input[name=start_date]");
            if($endDate.val() === "")
            {
                $endDate.val($startDate.val());
            }
            var numPeople =$input_numPeople.val();
            if (numPeople === "0" || typeof numPeople === "undefined" || numPeople === "") {
                alert("명수를 선택해주세요.");
                return;
            }
            if ($startDate.val() === "" || $endDate.val() === "" || $("#total_price").text().indexOf("원") === -1 || $("#total_price").text().indexOf("존재") > -1) {
                alert("잘못된 주문입니다.");
                return false;
            }

            // $order_form.find("input[name=num_people]").val($numPeople.val());
            // $order_form.find("input[name=start_date]").val($startDate.val());
            // $order_form.find("input[name=end_date]").val($endDate.val());
            // $order_form.find("input[name=total_price]").val($total_price.val());
            $order_form.submit();
        });
    </script>

    <!-- 상품날자가격계산 -->




    <!-- 조별추가하기 시작 -->
<!-- lib -->
<script src="<?=domain_url("/public/lib/bootstrap-number-input.js")?>"></script>
<script>


// $('#j-group-value').bootstrapNumber();
$('#j-group-value').bootstrapNumber({
	upClass: 'up',
	downClass: 'down',
    checkBtn : true
});
</script>
<!-- lib -->

<!-- 모달 , 딤 시작 -->
<style> 
#j-dim
{
    z-index: 9999;
    background-color: rgba(0,0,0,0.5);
    position:fixed;
    width :100%;
    height: 100%;

}
#j-modal
{
    display:none;
    z-index: 9999;
    position: fixed;
    top :50%;
    left : 50%;
    margin-left : -250px;
    margin-top : -250px;
    width: 500px;
    height: 500px;
    background-color: white;
    overflow:auto;
    /* overflow-x: scroll; */
}

</style>
<div id="j-dim"></div>
<div id="j-modal">
    총인원<div class="j-modal-group-numPeople"></div>
    <div id="j-group-wapper"></div>

    <a href="#" id="j-modal-close">확인</a>
</div>
    <!-- 모달 반응형 스크립트시작 -->
<script>
    $(window).resize(function(){
        settingModalSize();
    });
    function settingModalSize()
    {
        var minWidth = 300; //모달 가로 최소크기
        var minHeight = 448; //모달 세로 최소크기
        var marginWidth = 2000; //반응형 모달 가로 마진
        var marginHeight = 500;  //반응형 모달 세로 마진

        var winWidth =window.innerWidth;
        var winHeight =window.innerHeight;
       
        $j_modal=$("#j-modal");

        var modalWidth = winWidth-marginWidth;
        if(modalWidth < minWidth ) 
        {
            modalWidth= minWidth;
        }
     
        $j_modal.css("width",modalWidth);
        $j_modal.css("margin-left",modalWidth/2*-1);
        var modalHeight = winHeight-marginHeight;
        
        if(modalHeight < minHeight )
        {
            modalHeight= minHeight;
        }
        $j_modal.css("height",modalHeight);
        $j_modal.css("margin-top",modalHeight/2*-1);
    }
</script>
    <!-- 모달 반응형 스크립트끝 -->
<!-- 모달 , 딤 끝 -->


<!--  input 복사용  시작-->
<input id="j-group-modal-item" class="j-group-modal-item" style="display:none" class="form-control" type="number" value="1" min="2" max="4" />
<!--  input 복사용  끝-->

<!-- modal form에 li복사용  시작-->
<li class='d-flex align-items-center j-group-item'- id="j-group-item" style="display:none !important;">
    <div style="width:50%;">
        <p><i class='xi-radiobox-checked' style="margin-right:8px;"></i><span class="j-group-name">A조</span></p>
    </div>
    <div style="width:50%;">
        <input  class="j-group-item-input" type="hidden" name="groups[]" id="">  
        <p class="j-group-item-txt"style="text-align:right;" ><i class='xi-users' style="color: #202020 !important; margin-right:3px;"></i><i class='xi-users' style="color: #202020 !important; margin-right:10px;"></i> 2명</p>
    </div>
</li>
<!-- modal form에 li복사용  끝-->   
<script>
    let $allItems;
    let $withoutLastChildItems;
    let $lastItem;
    let $lastItemInput;
    let $lastSecontItem;
    let $lastSecontItemInput;
   
    let $j_dim =$("#j-dim");
    let $j_modal= $("#j-modal");
    let $j_group_wapper= $("#j-group-wapper");
    let $j_group_modal_item =$("#j-group-modal-item");
    let $info = $("#info");
    let $infoUl =$info.find("ul");
    let $j_group_value = $("#j-group-value");
    let num_people = $j_group_value.val();
    let $j_modal_group_numPeople =$(".j-modal-group-numPeople");    

    //초기화 시작
    settingModalGroup(num_people);
    settingFormGroupList(); 
    //초기화 끝
    
    $j_group_value.change(function(){  //인원수 변경시
        $this = $(this);
        num_people = $this.val();
        settingModalGroup(num_people);
        $j_modal_group_numPeople.text(`${num_people}명`);
        settingFormGroupList(); 

        ajax_get_price(); //가격 계산
    });
    function settingModalGroup(num_people) //모달 그룹 아이템 세팅함수
    {
        settingGroupList(num_people);
        settingVariableItems();
        addEventItemsUp();
        addEventItemsDown();
        addEventLastItemUp();
        addEventLastItemDown();
    }
    $("#j-group-add-btn").click(function(){  //모달 보이게

        $("body").css("overflow","hidden")
        settingModalSize();
        $j_dim.css("display","block");
        $j_modal.css("display","block");
        $("body").prepend($j_dim);

    });
    $("#j-dim").click(function(){ //모달 안보이게
        closeModal();
    });

    $("#j-modal-close").click(function(){
        closeModal();
    })
    function closeModal() //모달 닫기함수
    {
        $("body").css("overflow","visible");
        $j_dim.css("display","none");
        $j_modal.css("display","none");
        settingFormGroupList();
        ajax_get_price();
        return false;

    }
    function settingFormGroupList() //폼 그룹 세팅 함수
    {
        $order_form.find("input[name=num_people]").val(num_people);
        $infoUl.find(".j-group-item").remove();
        for (let i = 0; i < $allItems.length; i++) {
            let val = $($allItems[i]).find(".j-group-modal-item").val();
            $item =cloneElement("#j-group-item");
            $groupName = $item.find(".j-group-name");
            let groupName =  String.fromCharCode(65+i)+"조";
            $groupName.text(groupName);
            
            $item.find(".j-group-item-txt").text(`${val}명`);
            $item.find(".j-group-item-input").val(val);
            $order_form.append($item);

        }
    }
    
    function cloneElement(selector) //엘레먼트 복제함수
    {
        let $j_group_item = $(selector);
        $cloneItem =$j_group_item.clone();
        $cloneItem.css("id","");
        $cloneItem.css("display","block");
        return $cloneItem;
    }
    //--규칙
    ////공통
    //각 그룹은 2~4
    //총합이 총인원수랑 같아야됌
    //차감과 덧셈은 무조건 맨밑에 걸로
    ////+했을때
    //4일떄 return false
    //마지막이 1이면 없애고 위에꺼 +1
    //5가디면 4가되고 위에꺼 +1
    //맽밑이 2이고 3하나 4조합일떄 +불가능
    ////-했을떄
    //2일떄 return false
    //마지막이 5가되면 3이되고 2추가
    ////마지막 +-규칙
    ////-일떄
    //마지막이 4인데 -하면  2가되고 2추가
    //-하면 바로위에꺼 +1
    //-했을때 5가있는지 체크, 5는 4가되고 바로위에꺼 +1 (역방향으로)
    //마지막거 제외하고 모두 4이면 return false
    ////+일떄
    //+1하고 위에꺼 -1
    //1이 있을때 0이 되고 위에꺼 +1(역방향)
    //[0] ~ [last-2]가 모두 4이고 [last-1]가  2일때 return false;
    function settingVariableItems() //모달 전역변수 세팅
    {
        $allItems = $("#j-group-wapper .input-group");
        $withoutLastChildItems =$('#j-group-wapper .input-group:not(:last-child)');
        $lastItem = $('#j-group-wapper .input-group:last-child');
        $lastItemInput=$lastItem.find(".j-group-modal-item");   
        $lastSecontItem=$($withoutLastChildItems[$withoutLastChildItems.length-1]);
        $lastSecontItemInput=$lastSecontItem.find(".j-group-modal-item");
    }

    function addEventItemsUp(){  //+버튼이벤트 추가
        //+했을떄
        $upBtns=$withoutLastChildItems.find(".btn-item-up");
        $upBtns.click(function(){
            eventActionAdd(this); //이벤트 액션
            settingVariableItems(); //모달 변수 세팅
            resetAllEvent(); //이벤트 초기화
           
        }); 
    }
    function addEventItemsDown() // - 버튼이벤트 추가
    {
        //-했을떄
        $downBtns=$withoutLastChildItems.find(".btn-item-down");
        $downBtns.click(function(){
          eventActionMius(this); //이벤트 액션
          settingVariableItems(); //모달 변수 세팅
          resetAllEvent();  //이벤트 초기화
      });

    }
    function addEventLastItemUp() //마지막 아이템에 + 이벤트 추가
    {
        $upBtn = $lastItem.find(".btn-item-up");
        $upBtn.click(function(){
            eventActionLastItemUp(this); //이벤트 액션
            settingVariableItems(); //모달 변수 세팅
            resetAllEvent();  //이벤트 초기화
        });
    }
  
    
    function addEventLastItemDown() //마지막 아이템에 - 이벤트 추가
    {
        $downBtn = $lastItem.find(".btn-item-down");
        $downBtn.click(function(){
          
            eventActionLastItemMius(this); //이벤트 액션
            settingVariableItems(); //모달 변수 세팅
          resetAllEvent();  //이벤트 초기화
        });
        
    }
    function resetAllEvent() //이벤트 초기화 후 재설정
    {
        $upBtns=$allItems.find(".btn-item-up");
        $downBtns=$allItems.find(".btn-item-down");
        $upBtns.off();
        $downBtns.off();
        addEventItemsDown(); 
        addEventItemsUp();
        addEventLastItemUp();
        addEventLastItemDown();

    }

    function eventActionLastItemUp(e) //마지막 아이템 +버튼 액션
    {
        if(num_people === "2" || num_people === "3")
        {
            return false;
        }
          ////+일떄
          var $this = $(this);
         var val =$lastItemInput.val();
         if(val === "4")
         {
             return false;
         }

         

        //[0] ~ [last-2]가 모두 4이고 [last-1]가  2일때 return false;
        var sw = true;
        for(var i=0; i< $withoutLastChildItems.length -1; i++)
        {
            var $itemInput =$($withoutLastChildItems[i]).find(".j-group-modal-item");
            if($itemInput.val() !== "4")
            {
                sw = false;
                break;
            }
          
        }
        if(sw === true && $lastSecontItemInput.val() === "2")
        {
            return false;
        }
        //+1하고 위에꺼 -1
         $lastItemInput.val(parseInt(val)+1);
         var $prevItem = $lastItem.prev();
        var $prevItemInput =$prevItem.find(".j-group-modal-item");
        var prevItemInputVal =$prevItemInput.val();
        $prevItemInput.val(parseInt(prevItemInputVal) -1);

      
        //마지막에서 2번쨰것이 1일떄 0이 되고 위에꺼 +1(역방향) 
        if($lastSecontItemInput.val() === "1")
        {
            var $prevItem =$lastSecontItem.prev();
            var $prevItemInput = $prevItem.find(".j-group-modal-item");
            var prevItemInputVal = $prevItemInput.val();
            $prevItemInput.val(parseInt(prevItemInputVal) +1);
            $lastSecontItem.remove();
            settingVariableItems();
             //+1했을떄 5가있으면 4가되고 위에꺼 +1(역방향)
            for(var i = $withoutLastChildItems.length - 1 ; i >= 0 ; i--)
            {
                var $item =$($withoutLastChildItems[i]);
                var $itemInput = $item.find(".j-group-modal-item");

                var $prevItem =$item.prev();
                var $prevItemInput = $prevItem.find(".j-group-modal-item");
                var prevItemInputVal = $prevItemInput.val();
                if($itemInput.val() === "5")
                {
                    $itemInput.val(4);
                    $prevItemInput.val(parseInt(prevItemInputVal)+1);
                }
            }
        }
    

    }
   
    function eventActionLastItemMius(e) //마지막 아이템 -버튼 액션
    {
        if(num_people === "2" || num_people === "3")
        {
            return false;
        }
         ////-일떄
         var $this = $(this);
         var val =$lastItemInput.val();
         if(val === "2")
         {
             return false;
         }
        //마지막거 제외하고 모두 4이고  마지막이 4가아닐떄 return false 시작
        var sw = true;
        for(var i = 0 ; i < $withoutLastChildItems.length ; i++)
        {
            var $itemInput=$($withoutLastChildItems[i]).find(".j-group-modal-item");
            if($itemInput.val() !== "4")
            {
                sw = false;
            }
        }
        if(sw === true && $withoutLastChildItems.length !== 0 && val !== "4")
        {
           
              //마지막이 3일때 -하면 2가되고 위에중하나 -1되고 // 2추가 시작
            if(val === "3")
            {
                //마지막 위에것들이 모두 2이면 return false
                var sw = true;
                for(var i = $withoutLastChildItems.length-1 ; i >= 0  ; i--)
                {
                    var $itemInput=$($withoutLastChildItems[i]).find(".j-group-modal-item");
                    if($itemInput.val() !== "2")
                    {
                        sw = false;
                        var itemInputVal =$itemInput.val();
                        $itemInput.val(parseInt(itemInputVal)-1);
                        break;
                    }
                }
                if(sw === true)
                {
                    return false;
                }
                //
                $lastItemInput.val(2);
                addModalGroupItem(2);
                return true;
            }
           //마지막이 3일때 -하면 2가되고 위에중하나 -1되고 // 2추가 끝
            return false;
        }
        //마지막거 제외하고 모두 4이고  마지막이 4가아닐떄 return false 끝
        //마지막이 4인데 -하면  2가되고 2추가
        if(val === "4")
        {
            $lastItemInput.val(2);
            addModalGroupItem(2);
            return true;
        }
      
        
        //-하면 바로위에꺼 +1
        $lastItemInput.val(parseInt(val) -1);
        var $prevItem = $lastItem.prev();
        var $prevItemInput =$prevItem.find(".j-group-modal-item");
        var prevItemInputVal =$prevItemInput.val();
        $prevItemInput.val(parseInt(prevItemInputVal) +1);

         //-했을때 5가있는지 체크, 5는 4가되고 바로위에꺼 +1 (역방향으로)
         for(var i = $withoutLastChildItems.length - 1 ; i >= 0 ; i--)
         {
            var $item =$($withoutLastChildItems[i]);
            var $itemInput = $item.find(".j-group-modal-item");

            var $prevItem =$item.prev();
            var $prevItemInput = $prevItem.find(".j-group-modal-item");
            var prevItemInputVal = $prevItemInput.val();
            if($itemInput.val() === "5")
            {
                $itemInput.val(4);
                $prevItemInput.val(parseInt(prevItemInputVal)+1);
            }
          
          

         }

    }
    
    function eventActionMius(e) // -버튼 이벤트 액션
    {
          //2일떄 return false
          $thisBtn = $(e);
          $thisItem = $($thisBtn.parents(".input-group")[0]);
          $thisItemInput =$thisItem.find(".j-group-modal-item");
          var thisVal = $thisItemInput.val();
          if(thisVal=== "2")
          {
            return false;
        }
        $thisItemInput.val(parseInt(thisVal)-1);

        //마지막 +1

        var val =$lastItemInput.val();
        val =parseInt(val);
        $lastItemInput.val(val+1);
        val =$lastItemInput.val();
        //마지막이 5가되면 3이되고 2추가
        if(val === "5")
        {
            $lastItemInput.val(3);
            // $item=addModalGroupItem(2);
             var $item =$j_group_modal_item.clone();
        $item.css("display","inline-block");
        $item.val(2);
        $j_group_wapper.append($item);
        $item.bootstrapNumber({
            upClass: 'item-up',
            downClass: 'item-down',
            event: false,
            groupEvent : true
        });
            // console.log($item);
            $btn=$($item.parents(".input-group")[0]);
            // console.log($btn);
            // $($item.parents(".input-group")[0]).find(".btn-item-up").click(function(){
            //      eventActionAdd(this);        
            // });
        }
    }
    function eventActionAdd(e) //+버튼 이벤트액션
    {
       var val =$lastItemInput.val();
        //맽밑이 2이고 3하나 4조합일떄 +불가능
        var num_val_3 = 0;
        var sw_val_3_or_4 =true;
        if(val === "2")
        {
            for(var i =0 ; i<$withoutLastChildItems.length; i++)
            {
                $input= $($withoutLastChildItems[i]).find(".j-group-modal-item");
                if($input.val() !== "3" && $input.val() !== "4")
                {
                    sw_val_3_or_4 = false;
                }
                if($input.val() === "3")
                {
                    num_val_3 += 1;
                }
            }
            if(sw_val_3_or_4 === true && num_val_3 === 1)
            {
                return false;
            }
        }
        //4일떄 return false
        $thisBtn = $(e);
        $thisItem = $($thisBtn.parents(".input-group")[0]);
        $thisItemInput =$thisItem.find(".j-group-modal-item");
        var thisVal = $thisItemInput.val();
        if(thisVal=== "4")
        {
            return false;
        }
        $thisItemInput.val(parseInt(thisVal)+1);

        //마지막 -
        
        $lastItemInput.val(val-1);
        val =$lastItemInput.val();
        //마지막이 1이면 없애고 위에꺼 +1
        if(val === "1")
        {
            $prevItem =$lastItem.prev();
            $prevItemInput = $prevItem.find(".j-group-modal-item");
            $lastItem.remove();
            var tmpVal =$prevItemInput.val();
            tmpVal = parseInt(tmpVal);
            $prevItemInput.val(tmpVal+1);
        }

        //5가되면 4가되고 위에꺼 +1
        for(var i = $withoutLastChildItems.length-1 ;i >= 0  ; i--)
        {
            $item =$($withoutLastChildItems[i]);
            $itemInput =$item.find(".j-group-modal-item");
            if($itemInput.val() === "5")
            {
                $itemInput.val(4);
                $prevItem =$item.prev();
                $prevItemInput = $prevItem.find(".j-group-modal-item");
                var tmpVal =$prevItemInput.val();
                tmpVal = parseInt(tmpVal);
                $prevItemInput.val(tmpVal+1);

            }
        }
      
    }
    function settingGroupList(num_people) //모달 리스트 세팅
    {
        
        $items=$j_group_wapper.find(".input-group");
        $items.remove();
        if(num_people <2)
        {
            return false;
        }
        var tmp_num = parseInt(num_people);
        var count =tmp_num/4;
        count = Math.floor(count);
        console.log(count);        

        var remainder = tmp_num%4;
        for (var i = 0; i < count; i++)
        {
             
             if(i !== count -1)
             {
                addModalGroupItem(4);
             }
             else
             {
                 if(remainder === 1)
                 {
                    addModalGroupItem(3);
                 }
                 else
                 {
                    addModalGroupItem(4);
                 }
             }
        }
        if(remainder !== 0)
        {
            if(remainder === 1)
            {
                addModalGroupItem(2);
            }
            else
            {
                addModalGroupItem(remainder);
            }
        }
        

    }
    function addModalGroupItem(val) //모달에 아이템 추가함수
    {
        var $item =$j_group_modal_item.clone();
        $item.data("val",val);
        $item.css("display","inline-block");
        $item.val(val);
        $j_group_wapper.append($item);
        $item.bootstrapNumber({
            upClass: 'item-up',
            downClass: 'item-down',
            event: false
        });
        return $item;
    }

 
</script>
<style>
.btn-up
{
    font-size:20px;
    /* padding-bottom:10px; */
    background-color:white;
    font-family: 'notokr-medium', sans-serif;
    line-height:0px;
    border-radius: 0px;
    border-top-left-radius: 0px;
    border-top-right-radius: 0px;
    border-bottom-right-radius: 0px;
    border-bottom-left-radius: 0px;
}

.btn-down
{
    font-size:27px;
    padding-bottom:10px;
    border-top-left-radius: 5px;
    border-bottom-left-radius: 5px;

    background-color:white;
    font-family: 'notokr-medium', sans-serif;
    line-height:0px;
}
.input-group
{
    width:145px;
    height:30px;
    /* display:inline-block; */
}
#j-group-add-btn
{
    background-color: #487830;
    color:white;
    border-top-right-radius: 5px;
    border-bottom-right-radius: 5px;

    font-family: 'notokr-medium', sans-serif;
    line-height:0px;
}
#j-group-value
{

    border: 0px solid;
    /* border-left: 1px solid; */
    /* border-right: 1px solid; */
    font-family: 'notokr-medium', sans-serif;
}
.btn-default
{

}

</style>

<!-- 조별추가하기 끝 -->