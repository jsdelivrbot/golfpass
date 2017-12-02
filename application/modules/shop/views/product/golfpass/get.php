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
            <div id="book-box-wrap" class="order-1 order-lg-3 col-12 col-lg-3">
                <div id='book-box'>
                    <div id="personnel">
                        <span class="box-title" style="font-size:16px;">주문 정보</span>
                        <div id='count-box' class='d-flex align-items-stretch justify-content-end'>
                            <p style="font-family: 'notokr-medium', sans-serif; font-size: 24px; color: #fff; margin: 0; padding: 0;"><span id="j-v-num-people"></span>    </p>
                            <div style="width:1px; height:12px; background: #fff; margin:10px 15px 10px 15px;"></div>
                            <p  id="total_price" style="font-family: 'notokr-medium', sans-serif; font-size: 24px; color: #fff; margin: 0; padding: 0;"><?=$price?></p>
                        </div>
                    </div>
                    <div id='dateBox'>
                        <form action="#" class="d-flex align-items-center justify-content-between">
                            <div class="form-group d-flex align-items-center mb-0">
                                <input type="text" id="s-day" placeholder="시작 일정" value="<?=$current_date?>">
                                <i class="xi-calendar-check"></i>
                            </div>
                            <span>~</span>
                            <div class="form-group d-flex align-items-center mb-0">
                                <input type="text" id="e-day" placeholder="종료 일정" value="<?=$current_date_plus?>">
                                <i class="xi-calendar-check"></i>
                            </div>
                        </form>
                    </div>
                    <div id='add_people' style="width:100%; height:60px; background:#e6e6e6; padding:15px;">
                        <span style="font-family: 'notokr-reglur', sans-serif; font-size: 16px; color: #808080; line-height: 34px;">
                            조 편성
                        </span>
                        <div style="display:inline-block; margin-right:0px; float:right">
                            <input style="display:inline-block" id="j-group-value" class="form-control" type="number" value="1" min="1" max="4" />
                        </div>
                        
                    </div>
                    <div id="info" class="pt-20">
                        <ul class="list-unstyled" style="margin-bottom:0;">
                            <li style="font-family: 'notokr-medium', sans-serif;">조 상황</li>
                            <!-- 조리스트 시작 -->
                            <form action="<?=site_url(shop_order_uri."/golfpass")?>" method="get" id="golfpass_order_form">
                           
          
                            <input type="hidden" name="num_people">
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
                        </ul>
                        <p class="wishlist"><a onclick="ajax_a(this); return false;" data-action="<?=site_url(shop_wishlist_uri."/ajax_add/{$product->id}")?>"href="#">위시리스트에 추가하기</a></p>
                    </div>
                    <div id='book_ok' style="width:100%; height:70px; background:#fff; border: 1px solid #e5e5e5; border-top:0; padding:10px; cursor: pointer;" onclick="location.href='#';">
                        <div id="book_ok_button" style="width:100%; height:100%; background:#79b754; border-radius:25px;">
                            <p id="golfpass_order" style="font-family: 'notokr-reglur', sans-serif; font-size: 16px; color: #fff; text-align:center; line-height: 49px;">예약하기</p>
                        </div>
                    </div>
                </div>
            </div>
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
                            <li class='d-flex flex-column'><span>코스 타입</span>
                                <p class='mt-2'>
                                    <?=$product->course_type?>
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
                                    출발일 7일 전까지 예약 취소시 전액 환불됩니다.
                                </p>
                            </li>
                            <li>
                                <p>
                                    * 출발일 6일전~1일전 취소시 위약금은 결제금액의 50% 입니다.
                                </p>
                            </li>
                            <li>
                                <p>
                                    * 게스트가 체크인하지 않은 경우 고객의 변심으로 간주되어 환불이 불가합니다.
                                </p>
                            </li>
                            <li>
                                <p>
                                    * 게스트 또는 호스트에게 불만이 생길 경우, 체크인 이후 24시간 내에 골프패스 측에 알려야 합니다.
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
                                    * 게스트 환불 정책, 안전문제로 인한 예약취소, 또는 정상참작 가능한 상황에 해당되는 경우 숙소의 환불 정책 대신 관련 정책이 적용될 수 있습니다.
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

        <div class="row d-flex" style="width:100%;">
            <ul>
                <li class="tp-title">ABOUT US</li>
                <li><a href="http://www.playseven.co.kr">회사 소개</a></li>
                <li><a href="#">이용 약관</a></li>
                <li><a href="#">개인 정보 취급 방침</a></li>
            </ul>
            <ul>
                <li class="tp-title">OFFICE</li>
                <li><span>TEL</span>
                    <p>02-6959-5454</p>
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
                    <p>서울특별시 강서구 공항대로 227, 마곡 센트럴 타워 1차 1112호~1113호</p>
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

        var $startDate = $("#s-day");
        var $endDate = $("#e-day");
        // var $numPeople = $("select[name=num_people]");
        var $total_price = $("#total_price");
        var $numPeople = $("#j-v-num-people");
        $(document).ready(function() {
            $startDate.datepicker({
                dateFormat: 'yy-mm-dd'
            });
            $endDate.datepicker({
                dateFormat: 'yy-mm-dd'
            });

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
        console.log(1);
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
        $(document).ready(function() {
            // $numPeople.change(function() {
            //     // if(validationGetPrice() === 1)
            //     // validationGetPrice()
            //     ajax_get_price();

            // });
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
            
            $form = $("#golfpass_order_form");
            $form.find("input[name=start_date]").val($startDate.val());
            $form.find("input[name=end_date]").val($endDate.val());
            $form.find("input[name=num_people]").val($numPeople.data('value'));
            $form.find("input[name=product_id]").val("<?=$product->id?>");
            var queryString = $form.serialize();
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
                        $form.find("input[name=total_price]").val(totalPrice);
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
            $order_form = $("#golfpass_order_form");
            $input_numPeople=$order_form.find("input[name=num_people]");
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

<!-- 아이템 복제용 -->
<li class='d-flex align-items-center j-group-item' id="j-group-item" style="display:none !important">
        <div style="width:50%;">
            <p><i class='xi-users' style="margin-right:8px;"></i>A조</p>
        </div>
        <div style="width:50%;">
            <input  type="hidden" name="groups[]" id="">  
            <p style="text-align:right;" ><span class="j-group-item-value"></span><a onclick="deleteGroupItem(this);return false;" href="#"><i class='xi-close' style="color:#ce0202; margin-left:10px;"></i></a></p>
        </div>
</li>
<!-- 아이템 복제용 -->

<!-- lib -->
<script src="<?=domain_url("/public/lib/bootstrap-number-input.js")?>"></script>
<script>


// $('#j-group-value').bootstrapNumber();
$('#j-group-value').bootstrapNumber({
	upClass: 'up',
	downClass: 'down'
});
</script>
<!-- lib -->
<script>
    $("#j-group-add-btn").click(function(){ //아이템추가
        $val =$("#j-group-value");
        var val =$val.val();
        $form = $("#golfpass_order_form");
        $item = $("#j-group-item")
        $item = $item.clone();
        $item.attr("id","");
        $item.css("display","block");
        $item.find(".j-group-item-value").text(val+"명");
        $item.find("input[name='groups[]']").val(val);

        $form.append($item);
        cal_numPeople();
        ajax_get_price();
    });
    function deleteGroupItem(e) //아이템 삭제
    {
        $($(e).parents(".j-group-item")[0]).remove();
        cal_numPeople();
        ajax_get_price();
    }
    function cal_numPeople() //총명수 계산
    {
        $items =$("#golfpass_order_form").find(".j-group-item");
        var numPeople = 0;
        for(var i =0 ; i < $items.length ; i++)
        {
             numPeople += parseInt($($items[i]).find("input[name='groups[]']").val());
        }
        $("#j-v-num-people").text(`총 ${numPeople}명`);
        $("#j-v-num-people").data("value",numPeople);
        
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
        background-color: #71b051;
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