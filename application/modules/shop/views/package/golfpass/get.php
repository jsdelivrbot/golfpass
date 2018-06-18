<!DOCTYPE html>
<html lang="en-US" class="no-js">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name='robots' content='noindex,follow' />

    <link rel='stylesheet' id='tourmaster-style-css' href='/public/etc/package/css/style4_9_5.css' type='text/css' media='all' />
    <link rel='stylesheet' id='gdlr-core-google-font-css' href='/public/etc/package/css/style_font.css' type='text/css' media='all' />
    <link rel='stylesheet' id='tourmaster-style-css' href='/public/etc/package/css/style4_9_5_2.css' type='text/css' media='all' />
    <link rel='stylesheet' id='tourmaster-custom-style-css' href='/public/etc/package/css/style4_9_5_3.css' type='text/css' media='all' />
    <link rel='stylesheet' id='traveltour-style-core-css' href='/public/etc/package/css/style4_9_5_4.css' type='text/css' media='all' />
    <link rel='stylesheet' id='traveltour-custom-style-css' href='/public/etc/package/css/style4_9_5_5.css' type='text/css' media='all' />
    <link rel='stylesheet' id='gdlr-core-plugin-css' href='/public/etc/package/css/style4_9_5_6.css' type='text/css' media='all' />
    <link rel='stylesheet' id='gdlr-core-page-builder-css' href='/public/etc/package/css/style4_9_5_7.css' type='text/css' media='all' />
    <link rel='stylesheet' href='/public/etc/package/css/style.css' type='text/css' media='all' />
    <script src="/public/etc/package/js/jquery-3.2.1.min.js"></script>

    <script type='text/javascript' src='/public/etc/package/js/jquery1_12_4.js'></script>
    <link rel="stylesheet" href="http://cdn.jsdelivr.net/npm/xeicon@2.3.3/xeicon.min.css">

    <link rel="stylesheet" href="http://code.jquery.com/ui/1.8.18/themes/base/jquery-ui.css" type="text/css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="http://code.jquery.com/ui/1.8.18/jquery-ui.min.js"></script>
	<title>골프패스</title>
    <!--[if lt IE 9]> <script type='text/javascript' src='https://demo.goodlayers.com/traveltour/wp-content/themes/traveltour/js/html5.js?ver=4.9.5'></script> <![endif]-->
</head>
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
<body class="tour-template-default single single-tour postid-4649 gdlr-core-body tourmaster-body traveltour-body traveltour-body-front traveltour-full  traveltour-with-sticky-navigation gdlr-core-link-to-lightbox">
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
        <!--<nav id='sm-nav' class="row no-gutters justify-content align-items-stretch d-sm-none panel-nav">
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
                </div>-->
        <!--<?php if(!is_login()){?>-->
        <!--<div id="login" class="d-flex align-items-center">
                    <a href="<?=site_url(user_uri.'/login')?>" style="color:white;">
                    <span><i class="xi-log-in xi-x"></i></span>
                </a>
                </div>
                <div id="join" class="d-flex align-items-center">
                    <a href="<?=site_url(user_uri.'/register_agree_1')?>" style="color:white;">
                    <span><i class="xi xi-user-plus"></i></span>
                </a>
                </div>
                <!--<?php }else{?>
                <div style="margin-top:25px;"><a href="<?=site_url(shop_mypage_uri." /gets_wishlist ")?>"><img src="<?=$user->profilePhoto?>" alt="" style="width:30px; height:30px; border-radius: 15px;"></a></div>
                <?php }?>-->
        <!--</div>
            <div class="col-2 ml-auto toggle" onclick="$('body').toggleClass('menu-open'); $('.carousel-indicators').toggleClass('d-none d-flex');">
                <span>
                <i class="xi xi-bars"></i>
            </span>
            </div>
        </nav>
        <!--NOTE desktop,tabvar nav-->
        <nav id='md-nav' class="row no-gutters justify-content align-items-stretch d-none d-sm-flex">
            <div id="logo" class='col-6 d-flex align-items-center'>
                <!--<figure class="mb-0 d-flex align-items-center d-lg-none">
                    <img src="/public/sangmin/img/icon/logo_mobile.png" class="" alt="">
                </figure>-->
                <a href="<?=site_url()?>">
                    <figure class="mb-0 align-items-center d-none d-lg-flex">
                        <img src="/public/etc/package/image/logo.png" class="" alt="">
                    </figure>
                </a>
                <div class="search-container d-flex align-items-center position-relative">
                    <i class="xi xi-search"></i>
                    <input id="input_search" type="text" placeholder="관심있는 지역이나 골프장을 검색해보세요!">
                    <!--NOTE 검색결과 창-->
                    <div class="search-content-container position-absolute w-100">

                    </div>
                </div>
            </div>
            <div id='nav-icon-box' class="col  d-flex justify-content-end">
                <? if(!is_login()) { ?>
                <div id="login" class="d-flex align-items-center" style="cursor: pointer;" onclick="location.href='<?=site_url(user_uri.'/login')?>';">
                    <span><i class="xi-log-in xi-x"></i></span>
                    <p class="mb-0" style="margin-bottom: 0"><a style="color: white; font-family: 'notokr-regular', sans-serif; font-size: 12px;" href="<?=site_url(user_uri.'/login')?>">로그인</a></p>
                </div>
                <div id="join" class="d-flex align-items-center" style="cursor: pointer;" onclick="location.href='<?=site_url(user_uri.'/register_agree_1')?>';">
                    <span><i class="xi xi-user-plus"></i></span>
                    <p class="mb-0" style="margin-bottom: 0"><a style="color: white; font-family: 'notokr-regular', sans-serif; font-size: 12px;" href="<?=site_url(user_uri.'/register_agree_1')?>">회원가입</a></p>
                </div>
                <? } else { ?>
		        <div style="margin-top:25px; cursor: pointer;" onclick="location.href='<?=site_url(shop_mypage_uri."/gets_wishlist")?>';"><a href="<?=site_url(shop_mypage_uri."/gets_wishlist")?>"><img src="<?=$user->profilePhoto?>" alt="" style="width:30px; height:30px; border-radius: 15px;"></a></div>
		        <div id="logout" class="d-flex align-items-center" style="cursor: pointer;" onclick="location.href='<?=site_url(user_uri.'/logout')?>';">
		            <span><i class="xi-log-out xi-x"></i></span>
		            <p class="mb-0"><a style="color: white; font-family: 'notokr-regular', sans-serif; font-size: 12px;" href="<?=site_url(user_uri.'/logout')?>">로그아웃</a></p>
		        </div>
		        <? } ?>
            </div>
            <div class="col ml-auto toggle" onclick="$('body').toggleClass('menu-open'); $('.carousel-indicators').toggleClass('d-none d-flex');">
                <span>
            <i class="xi xi-bars"></i>
        </span>
            </div>
        </nav>
    </header>

    <div class="traveltour-body-outer-wrapper ">
        <div class="traveltour-body-wrapper clearfix  traveltour-with-transparent-header traveltour-with-frame">

            <div class="traveltour-page-wrapper" id="traveltour-page-wrapper">
                <div class="tourmaster-page-wrapper" id="tourmaster-page-wrapper">

                    <div class="tourmaster-single-header" style="background-image: url(<?=$product->photo?>);">
                        <div class="tourmaster-single-header-background-overlay"></div>
                        <div class="tourmaster-single-header-top-overlay"></div>
                        <div class="tourmaster-single-header-overlay"></div>
                        <div class="tourmaster-single-header-container tourmaster-container">
                            <div class="tourmaster-single-header-container-inner">
                                <div class="tourmaster-single-header-title-wrap tourmaster-item-pdlr">
                                    <h1 class="tourmaster-single-header-title"><?=$product->name?></h1>
                                    <div class="tourmaster-tour-rating tourmaster-tour-rating-empty">0</div>
                                </div>

                            </div>
                        </div>
                    </div>


                    <script>
                        (function($) {
                            $.fn.goTo = function() {
                                $('html, body').animate({
                                    scrollTop: $(this).offset().top + 'px'
                                }, 'fast');
                                return this; // for chaining...
                            }
                        })(jQuery);
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
                            <?if($product->day_start != '0001-01-01'):?>
                            minDate: new Date("<?=$product->day_start?>"),
                    		maxDate: new Date("<?=$product->day_end?>"),
                    		<?endif?>
                            yearSuffix: '년',
                            onSelect: function(value, date) {
                            	var url = "<?=site_url(shop_package_uri."/get_daily_price")?>";
                            	$.ajax({
                                    type:"post",
                                    url : url,
                                    data : {id:<?=$product->id?>, date: value},
                                    success : function(data){
                                        if(data != "") {
	                                    	$("#price").val(data);
	                                    	var price = "";
	                                    	while(data/1000 >= 1) {
		                                    	temp = data % 1000;
		                                    	if(temp < 10) price = ',00' + temp + price;
		                                    	else if(temp < 100) price = ',0' + temp + price;
		                                    	data = data / 1000;
	                                    	}
	                                    	price = parseInt(data) + price;
	                                        $(".tourmaster-tail").html(price+"원~");
                                        } else {
                                        	$("#price").val("-1");
                                            $(".tourmaster-tail").html("상담요망");
                                        }
                                    },
                                    error: function(xhr, textStatus, errorThrown){
                                        alert('에러...');
                                        $('.loading').fadeOut(500);
                                        console.log('code: '+request.status+"\n"+'message: '+request.responseText+"\n"+'error: '+error);
                                        console.log(errorThrown);
                                    }
                                });
                            }
                        });

                        $(function() {
                            $("#datepicker1").datepicker();
                        });

                        $(function() {
                            $("#datepicker2").datepicker();
                        });

                    </script>






                    <div class="tourmaster-template-wrapper">
                        <div class="tourmaster-tour-booking-bar-container tourmaster-container">
                            <div class="tourmaster-tour-booking-bar-container-inner">
                                <div class="tourmaster-tour-booking-bar-anchor tourmaster-item-mglr"></div>
                                <div class="tourmaster-tour-booking-bar-wrap tourmaster-item-mglr" id="tourmaster-tour-booking-bar-wrap">
                                    <div class="tourmaster-tour-booking-bar-outer">
                                        <div class="tourmaster-header-price tourmaster-item-mglr">
                                            <div class="tourmaster-header-price-ribbon">성인 1인 가격</div>
                                            <div class="tourmaster-header-price-wrap">
                                                <div class="tourmaster-header-price-overlay"></div>
                                                <div class="tourmaster-tour-price-wrap "><span class="tourmaster-tour-price"><span class="tourmaster-tail"><?=number_format($product->price)?>원~</span></span></div>
                                            </div>
                                        </div>
                                        <div class="tourmaster-tour-booking-bar-inner">
                                            <div class="tourmaster-booking-tab-content tourmaster-active" data-tourmaster-tab="booking">
                                                <form class="tourmaster-single-tour-booking-fields tourmaster-form-field tourmaster-with-border" method="get" action="<?=site_url(shop_order_uri."/golfpass")?>" id="tourmaster-single-tour-booking-fields" data-ajax-url="https://demo.goodlayers.com/traveltour/wp-admin/admin-ajax.php"><input type="hidden" name="product_id" value="<?=$product->id?>" />
                                                    <div class="tourmaster-tour-booking-date clearfix" data-step="1"><i class="fa fa-calendar"></i>
                                                        <div class="tourmaster-tour-booking-date-input"><input type="hidden" name="end_date" id="end_date" value="" />
                                                            <input type="text" placeholder="출발 날짜" style="width:100%;" name="start_date" id="datepicker1" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="tourmaster-tour-booking-people clearfix" data-step="4">
                                                        <div class="tourmaster-tour-booking-next-sign"><span></span></div><i class="fa fa-users"></i>
                                                        <div class="tourmaster-tour-booking-people-input">
                                                            <div class="tourmaster-combobox-wrap">
                                                            	<select name="num_people" id="num_people">
                                                            		<option value="0">인원</option>
                                                            		<? for($i=$product->min_people;$i<=$product->max_people;$i++): ?>
                                                            		<option value="<?=$i?>"><?=$i?></option>
                                                            		<? endfor ?>
                                                            	</select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tourmaster-tour-booking-submit" data-step="5">
                                                        <div class="tourmaster-tour-booking-next-sign"><span></span></div><i class="fa fa-check-circle"></i>
                                                        <div class="tourmaster-tour-booking-submit-input"><input class="tourmaster-button" type="submit" onclick="form_submit();" value="예약진행하기" data-ask-login="proceed-without-login" />
                                                            <div class="tourmaster-tour-booking-submit-error">* Please select all required fields to proceed to the next step.</div>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="price" id="price" value="<?=$product->price?>" />
                                                    <input type="hidden" name="total_price" id="total_price" value="" />
                                                    <input type="hidden" name="product_type" id="product_type" value="package" />
                                                </form>
                                                <div class="tourmaster-lightbox-content-wrap" data-tmlb-id="proceed-without-login">
                                                    <div class="tourmaster-lightbox-head">
                                                        <h3 class="tourmaster-lightbox-title">예약 진행하기</h3><i class="tourmaster-lightbox-close icon_close"></i></div>
                                                    <div class="tourmaster-lightbox-content">
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            
                                        </div>
                                    </div>
                                    
                                    <div class="tourmaster-tour-booking-bar-widget  traveltour-sidebar-area" style="cursor: pointer;" onclick="location.href='http://golfpass.net/public/event/eventpage2.html';">
                                        <div id="text-12" class="widget widget_text traveltour-widget">
                                            <div class="textwidget">
                                                <div class="gdlr-core-space-shortcode" style="margin-top: -10px;"></div>
                                                <div class="gdlr-core-widget-box-shortcode" style="color: #c9e2ff;background-image: url(https://demo.goodlayers.com/traveltour/wp-content/uploads/2017/01/widget-bg.jpg);">
                                                    <h3 class="gdlr-core-widget-box-shortcode-title" style="color: #ffffff;">여행자 필수 준비물!</h3>
                                                    <div class="gdlr-core-widget-box-shortcode-content">
                                                        <p>타임즈카 렌탈 10% OFF 플랜으로 골프장 갈땐 렌터카부터 시작해서 안전을 위한 여행 필수품 오픈플랜 여행자 보험, 해외에서도 데이터 걱정없이 와이파이 도시락까지!</p>
                                                        <p><i class="fa fa-phone" style="font-size: 20px;color: #ffcf2a;margin-right: 10px;"></i> <span style="font-size: 20px; color: #ffcf2a; font-weight: 600;">지금 체크하기</span></p>
                                                        <p><i class="fa fa-envelope-o" style="font-size: 17px;color: #ffcf2a;margin-right: 10px;"></i> <span style="font-size: 14px; color: #fff; font-weight: 600;">문의사항은 고객센터로</span></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                </div>
                            </div>
                        </div>
                        <div class="tourmaster-tour-info-outer">
                            <div class="tourmaster-tour-info-outer-container tourmaster-container">
                                <div class="tourmaster-tour-info-wrap clearfix">
                                    <div class="tourmaster-tour-info tourmaster-tour-info-duration-text tourmaster-item-pdlr"><i class="icon_clock_alt"></i><?=$product->take_time?></div>
                                    <div class="tourmaster-tour-info tourmaster-tour-info-availability tourmaster-item-pdlr"><i class="fa fa-calendar"></i><?=$product->take_days?></div>
                                    <div class="tourmaster-tour-info tourmaster-tour-info-departure-location tourmaster-item-pdlr"><i class="fa-plane"></i><?=$product->region?></div>
                                    <div class="tourmaster-tour-info tourmaster-tour-info-minimum-age tourmaster-item-pdlr"><i class="fa fa-user"></i>인원 : <?=$product->min_people?>~<?=$product->max_people?>명</div>
                                    <div class="tourmaster-tour-info tourmaster-tour-info-duration-text tourmaster-item-pdlr" style="width: 100%;"><i class="icon_clock_alt"></i>골프장 : <?=$product->golf_course?></div>
                                    <div class="tourmaster-tour-info tourmaster-tour-info-duration-text tourmaster-item-pdlr" style="width: 100%;"><i class="icon_clock_alt"></i>호텔 : <?=$product->hotels?></div>
                                </div>
                            </div>
                        </div>
                        <div class="gdlr-core-page-builder-body">
                            <div class="gdlr-core-pbf-wrapper " style="padding: 0px 0px 0px 0px;">
                                <div class="gdlr-core-pbf-wrapper-content gdlr-core-js ">
                                    <div class="gdlr-core-pbf-wrapper-container clearfix gdlr-core-pbf-wrapper-full">
                                        <div class="gdlr-core-pbf-element">
                                            <div class="tourmaster-content-navigation-item-wrap clearfix" style="padding-bottom: 0px;">
                                                <div class="tourmaster-content-navigation-item-outer" id="tourmaster-content-navigation-item-outer">
                                                    <div class="tourmaster-content-navigation-item-container tourmaster-container">
                                                        <div class="tourmaster-content-navigation-item tourmaster-item-pdlr"><a class="tourmaster-content-navigation-tab tourmaster-active" href="#detail">일정 안내</a><a class="tourmaster-content-navigation-tab " href="#map">여행 정보</a><a class="tourmaster-content-navigation-tab " href="#itinerary">참고사항</a>
                                                            <div class="tourmaster-content-navigation-slider"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="gdlr-core-pbf-wrapper " style="padding: 70px 0px 30px 0px;" data-skin="Blue Icon" id="detail">
                                <div class="gdlr-core-pbf-wrapper-content gdlr-core-js ">
                                    <div class="gdlr-core-pbf-wrapper-container clearfix gdlr-core-container">
                                        <div class="gdlr-core-pbf-element">
                                            <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-left-align gdlr-core-title-item-caption-bottom gdlr-core-item-pdlr" style="padding-bottom: 35px;">
                                                <div class="gdlr-core-title-item-title-wrap">
                                                    <h6 class="gdlr-core-title-item-title gdlr-core-skin-title" style="font-size: 24px;font-weight: 600;letter-spacing: 0px;text-transform: none;"><span class="gdlr-core-title-item-left-icon" style="font-size: 18px;"><i class="fa fa-file-text-o"  ></i></span>상세 설명<span class="gdlr-core-title-item-title-divider gdlr-core-skin-divider"></span></h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="gdlr-core-pbf-element">
                                            <div class="gdlr-core-text-box-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-left-align">
                                                <div class="gdlr-core-text-box-item-content">
                                                    <?=$product->desc?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="gdlr-core-pbf-element">
                                            <div class="gdlr-core-divider-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-divider-item-normal" style="padding-bottom: 19px;">
                                                <div class="gdlr-core-divider-line gdlr-core-skin-divider"></div>
                                            </div>
                                        </div>
                                        <div class="gdlr-core-pbf-column gdlr-core-column-20 gdlr-core-column-first">
                                            <div class="gdlr-core-pbf-column-content-margin gdlr-core-js ">
                                                <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js ">
                                                    <div class="gdlr-core-pbf-element">
                                                        <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-left-align gdlr-core-title-item-caption-top gdlr-core-item-pdlr" style="padding-bottom: 0px;">
                                                            <div class="gdlr-core-title-item-title-wrap">
                                                                <h3 class="gdlr-core-title-item-title gdlr-core-skin-title" style="font-size: 15px;font-weight: 500;letter-spacing: 0px;text-transform: none;">포함사항<span class="gdlr-core-title-item-title-divider gdlr-core-skin-divider"></span></h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="gdlr-core-pbf-column gdlr-core-column-40">
                                            <div class="gdlr-core-pbf-column-content-margin gdlr-core-js ">
                                                <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js ">
                                                    <div class="gdlr-core-pbf-element">
                                                        <div class="gdlr-core-icon-list-item gdlr-core-item-pdlr gdlr-core-item-pdb " style="padding-bottom: 10px;">
                                                            <?=nl2br($product->includes_y)?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="gdlr-core-pbf-element">
                                            <div class="gdlr-core-divider-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-divider-item-normal" style="padding-bottom: 19px;">
                                                <div class="gdlr-core-divider-line gdlr-core-skin-divider"></div>
                                            </div>
                                        </div>
                                        <div class="gdlr-core-pbf-column gdlr-core-column-20 gdlr-core-column-first">
                                            <div class="gdlr-core-pbf-column-content-margin gdlr-core-js ">
                                                <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js ">
                                                    <div class="gdlr-core-pbf-element">
                                                        <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-left-align gdlr-core-title-item-caption-top gdlr-core-item-pdlr" style="padding-bottom: 0px;">
                                                            <div class="gdlr-core-title-item-title-wrap">
                                                                <h3 class="gdlr-core-title-item-title gdlr-core-skin-title" style="font-size: 15px;font-weight: 500;letter-spacing: 0px;text-transform: none;">불포함사항<span class="gdlr-core-title-item-title-divider gdlr-core-skin-divider"></span></h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="gdlr-core-pbf-column gdlr-core-column-40">
                                            <div class="gdlr-core-pbf-column-content-margin gdlr-core-js ">
                                                <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js ">
                                                    <div class="gdlr-core-pbf-element">
                                                        <div class="gdlr-core-icon-list-item gdlr-core-item-pdlr gdlr-core-item-pdb " style="padding-bottom: 10px;">
                                                            <?=nl2br($product->includes_n)?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="gdlr-core-pbf-element">
                                            <div class="gdlr-core-divider-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-divider-item-normal" style="padding-bottom: 19px;">
                                                <div class="gdlr-core-divider-line gdlr-core-skin-divider"></div>
                                            </div>
                                        </div>
                                        <div class="gdlr-core-pbf-element">
                                            <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-left-align gdlr-core-title-item-caption-bottom gdlr-core-item-pdlr" style="padding-bottom: 35px;">
                                                <div class="gdlr-core-title-item-title-wrap">
                                                    <h6 class="gdlr-core-title-item-title gdlr-core-skin-title" style="font-size: 24px;font-weight: 600;letter-spacing: 0px;text-transform: none;"><span class="gdlr-core-title-item-left-icon" style="font-size: 18px;"><i class="fa fa-suitcase"  ></i></span>일정표<span class="gdlr-core-title-item-title-divider gdlr-core-skin-divider"></span></h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="gdlr-core-pbf-element">
                                            <div class="gdlr-core-toggle-box-item gdlr-core-item-pdlr gdlr-core-item-pdb  gdlr-core-toggle-box-style-background-title gdlr-core-left-align" style="padding-bottom: 25px;">
                                            	<?php for($i=0;$i<count($schedule);$i++): ?>
                                                <div class="gdlr-core-toggle-box-item-tab clearfix <?if($i==0):?>gdlr-core-active<?endif?>">
                                                    <div class="gdlr-core-toggle-box-item-icon gdlr-core-js gdlr-core-skin-icon "></div>
                                                    <div class="gdlr-core-toggle-box-item-content-wrapper">
                                                        <h4 class="gdlr-core-toggle-box-item-title gdlr-core-js  gdlr-core-skin-e-background gdlr-core-skin-e-content"><span class="gdlr-core-head"><?=$schedule[$i]->days?>일차</span><?=$schedule[$i]->place?></h4>
                                                        <div class="gdlr-core-toggle-box-item-content">
                                                            <p><?=$schedule[$i]->place?>
                                                                <hr> <?=$schedule[$i]->detail?> </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php endfor ?>
                                            </div>
                                        </div>
                                        <!-- 
                                        <div class="gdlr-core-pbf-element">
                                            <div class="gdlr-core-divider-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-divider-item-normal" style="padding-bottom: 19px;">
                                                <div class="gdlr-core-divider-line gdlr-core-skin-divider"></div>
                                            </div>
                                        </div>
                                        <div class="gdlr-core-pbf-column gdlr-core-column-20 gdlr-core-column-first">
                                            <div class="gdlr-core-pbf-column-content-margin gdlr-core-js ">
                                                <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js ">
                                                    <div class="gdlr-core-pbf-element">
                                                        <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-left-align gdlr-core-title-item-caption-top gdlr-core-item-pdlr" style="padding-bottom: 0px;">
                                                            <div class="gdlr-core-title-item-title-wrap">
                                                                <h3 class="gdlr-core-title-item-title gdlr-core-skin-title" style="font-size: 15px;font-weight: 500;letter-spacing: 0px;text-transform: none;">경로<span class="gdlr-core-title-item-title-divider gdlr-core-skin-divider"></span></h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="gdlr-core-pbf-element">
                                            <div class="gdlr-core-text-box-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-left-align" style="padding-bottom: 55px;">
                                                <div class="gdlr-core-text-box-item-content">
                                                    <div class=""> <iframe src="https://www.google.com/maps/d/embed?mid=1mGgtylMQHGAKR6HR8r8YLe5W4LU" width="100%" height="480"></iframe></div>
                                                    <div id="map" style="width:100%;height:500px;"></div>
    												<?//=$this->map_api->create_script()?>
												    <?// if($product->address !== ''){
												        //$this->map_api->add_marker($product->lat,$product->lng,$product->address,null,null,"false");
												        //$this->map_api->move_to_location($product->lat,$product->lng);
												    //} ?>
                                                </div>
                                            </div>
                                        </div>  -->
                                        <div class="gdlr-core-pbf-element">
                                            <div class="gdlr-core-divider-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-divider-item-normal" style="padding-bottom: 19px;">
                                                <div class="gdlr-core-divider-line gdlr-core-skin-divider"></div>
                                            </div>
                                        </div>
                                        <div class="gdlr-core-pbf-column gdlr-core-column-20 gdlr-core-column-first">
                                            <div class="gdlr-core-pbf-column-content-margin gdlr-core-js ">
                                                <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js ">
                                                    <div class="gdlr-core-pbf-element">
                                                        <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-left-align gdlr-core-title-item-caption-top gdlr-core-item-pdlr" style="padding-bottom: 0px;">
                                                            <div class="gdlr-core-title-item-title-wrap">
                                                                <h3 class="gdlr-core-title-item-title gdlr-core-skin-title" style="font-size: 15px;font-weight: 500;letter-spacing: 0px;text-transform: none;">상담 안내<span class="gdlr-core-title-item-title-divider gdlr-core-skin-divider"></span></h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="gdlr-core-pbf-column gdlr-core-column-40">
                                            <div class="gdlr-core-pbf-column-content-margin gdlr-core-js ">
                                                <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js ">
                                                    <div class="gdlr-core-pbf-element">
                                                        <div class="gdlr-core-icon-list-item gdlr-core-item-pdlr gdlr-core-item-pdb " style="padding-bottom: 10px;">
                                                            <p>담당자 직통전화 : 02-6959-5454 FAX) 02-6442-5453<br>이메일 문의 : golfpass_@naver.com<br>예약 확정 후 예약금(￦300,000/1인)은 아래의 계좌로 송금해주시기 바랍니다.<br>우리은행 1005-203-314601 ㈜플레이세븐<br><br>홈페이지에서 예약이 완료되어도 예약 확정이 아니오니 반드시 예약 가능 여부를 담당자에게 확인해주시기 바랍니다.<br><br>본 상품의 상품 가격은 급격한 환율 변동 시 국외여행 표준약관 [제12조, 1항]에 의거하여 금액이 인상될 수 있습니다.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="gdlr-core-pbf-element">
                                            <div class="gdlr-core-divider-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-divider-item-normal" style="padding-bottom: 19px;">
                                                <div class="gdlr-core-divider-line gdlr-core-skin-divider"></div>
                                            </div>
                                        </div>
                                        <div class="gdlr-core-pbf-column gdlr-core-column-20 gdlr-core-column-first">
                                            <div class="gdlr-core-pbf-column-content-margin gdlr-core-js ">
                                                <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js ">
                                                    <div class="gdlr-core-pbf-element">
                                                        <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-left-align gdlr-core-title-item-caption-top gdlr-core-item-pdlr" style="padding-bottom: 0px;">
                                                            <div class="gdlr-core-title-item-title-wrap">
                                                                <h3 class="gdlr-core-title-item-title gdlr-core-skin-title" style="font-size: 15px;font-weight: 500;letter-spacing: 0px;text-transform: none;">캔슬피 규정<span class="gdlr-core-title-item-title-divider gdlr-core-skin-divider"></span></h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="gdlr-core-pbf-column gdlr-core-column-40">
                                            <div class="gdlr-core-pbf-column-content-margin gdlr-core-js ">
                                                <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js ">
                                                    <div class="gdlr-core-pbf-element">
                                                        <div class="gdlr-core-icon-list-item gdlr-core-item-pdlr gdlr-core-item-pdb " style="padding-bottom: 10px;">
                                                            <p>◈ 본 상품은 국외여행 표준약관 제5조 특약에 해당되어 여행약관 외 별도의 수수료가 발행하는 상품입니다. <br><br>▶ 예정일 20일 전 취소 시 요금의 10% 배상<br>▶ 예정일 19~11일 전 취소 시 요금의 15% 배상<br>▶ 예정일 10~8일 전 취소 시 요금의 30% 배상<br>▶ 예정일 7~3일 전 취소 시 요금의 50% 배상<br>▶ 예정일 2~1일 전 취소 시 요금의 70% 배상<br>▶ 예정일 당일 취소 통보 시 요금의 100% 배상<br><br>※ 일자는 근무일(토/일요일 및 공휴일 제외) 및 근무 시간(18시 30분까지) 내에서의 취소 요청을 기준으로 합니다.<br><br>※ 천재지변이나 항공사의 사정으로 인하여 여행에 지장을 끼친 경우 본사의 법적이나 도의적인 책임은 없음을 알려드립니다. 이점 양해 부탁드립니다.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="gdlr-core-pbf-element">
                                            <div class="gdlr-core-divider-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-divider-item-normal" style="padding-bottom: 19px;">
                                                <div class="gdlr-core-divider-line gdlr-core-skin-divider"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="gdlr-core-pbf-wrapper " style="padding: 0px 0px 30px 0px;" data-skin="Blue Icon" id="map">
                                <div class="gdlr-core-pbf-wrapper-content gdlr-core-js ">
                                    <div class="gdlr-core-pbf-wrapper-container clearfix gdlr-core-container">
                                        <div class="gdlr-core-pbf-element">
                                            <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-left-align gdlr-core-title-item-caption-bottom gdlr-core-item-pdlr" style="padding-bottom: 35px;">
                                                <div class="gdlr-core-title-item-title-wrap">
                                                    <h6 class="gdlr-core-title-item-title gdlr-core-skin-title" style="font-size: 24px;font-weight: 600;letter-spacing: 0px;text-transform: none;"><span class="gdlr-core-title-item-left-icon" style="font-size: 18px;"><i class="fa fa-info"  ></i></span>여행정보<span class="gdlr-core-title-item-title-divider gdlr-core-skin-divider"></span></h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab_container single-tour tourmaster-body gdlr-core-container">
                                            <div class="traveltour-item-pdlr gdlr-core-item-pdlr">
                                                <input id="tab1" type="radio" name="tabs" checked style="clear: both; padding-top: 10px; display: none;">
                                                <label for="tab1"><span>골프장 정보</span></label>

                                                <input id="tab2" type="radio" name="tabs" style="clear: both; padding-top: 10px; display: none;">
                                                <label for="tab2"><span>호텔 정보</span></label>

                                                <section id="content1" class="tab-content">
                                                    <h3>골프장 정보</h3>
                                                    <div class="gdlr-core-toggle-box-item gdlr-core-item-pdb  gdlr-core-toggle-box-style-background-title gdlr-core-left-align" style="padding-bottom: 25px;">
                                                        <?=$product->golf_info?>
                                                    </div>
                                                </section>

                                                <section id="content2" class="tab-content">
                                                    <h3>호텔 정보</h3>
                                                    <div class="gdlr-core-toggle-box-item gdlr-core-item-pdb  gdlr-core-toggle-box-style-background-title gdlr-core-left-align" style="padding-bottom: 25px;">
                                                        <?=$product->hotel_info?>
                                                    </div>
                                                </section>
                                                <script>
                                                    $(function() {
                                                        var sBtn = $(".sub_tab"); //  ul > li 이를 sBtn으로 칭한다. (클릭이벤트는 li에 적용 된다.)
                                                        var active = $("#reference_lset2")
                                                        sBtn.find("a").click(function() { // sBtn에 속해 있는  a 찾아 클릭 하면.
                                                            active.addClass("gdlr-core-active"); // sBtn 속에 (active) 클래스를 추가 한다. 아왜안돼?왜???외????외않되??????외안돼???????
                                                        })
                                                    })

                                                </script>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <link rel="stylesheet" href="/public/etc/package/css/detail-main.css">

            <footer id='tp-footer' class='main-footer container-fluid'>
                <div id="tp-partner">
                    <div class="row" style="width:100%;">
                        <div class="w-100">
                            <h6>PARTNERS</h6>
                        </div>
                        <div class="d-flex flex-wrap">
                            <!--<figure>
                                <img src="/public/etc/package/image/b_partner_accordiagolf.png" alt="">
                            </figure>
                            <figure>
                                <img src="/public/etc/package/image/b_partner_orixgolf.png" alt="">
                            </figure>
                            <figure>
                                <img src="/public/etc/package/image/b_partner_PGM.png" alt="">
                            </figure>
                            <figure>
                                <img src="/public/etc/package/image/b_partner_princehotel.png" alt="">
                            </figure>
                            <figure>
                                <img src="/public/etc/package/image/b_partner_hiltonhotel.png" alt="">
                            </figure>
                            <figure>
                                <img src="/public/etc/package/image/b_partner_bookingdotcom.png" alt="">
                            </figure>-->
                            <figure>
                                <a href="http://www.widemobile.com/?golfpass" target="_balnk">
                                    <img src="/public/etc/package/image/b_partner_wifi.png" alt="">
                                </a>
                            </figure>
                            <figure>
                                <a href="http://www.timescar-rental.kr/af/7822000076/kr/" target="_balnk">
                                    <img src="/public/etc/package/image/b_partner_timescar.png" alt="">
                                </a>
                            </figure>
                            <figure>
                                <img src="/public/etc/package/image/b_partner_iagto.png" alt="">
                            </figure>
                            <figure><a href="https://openyourplan.com/2017/?JHS=5fb07c442335f52d0170e8b6791a8c9278817f21a05eeeb6f31dc1" target="_balnk">
                                <img src="/public/etc/package/image/b_partner_openplan.png" alt=""></a>
                            </figure>
                        </div>
                    </div>

                </div>

                <div class="row d-flex" style="width:100%; margin-bottom:16px;">
                    <ul class="ulul">
                        <li class="tp-title">ABOUT US</li>
                        <!--<li><a style="color:#ababab;" href="http://golfpass.net/index.php/base/page/get/1">회사 소개</a></li>-->
                        <li><a style="color:#ababab;" href="http://golfpass.net/index.php/base/page/get/2">이용 약관</a></li>
                        <li><a style="color:#ababab;" href="http://golfpass.net/index.php/base/page/get/3">개인 정보 취급 방침</a></li>
                        <li><a style="color:#ababab;" href="https://www.hometax.go.kr/websquare/websquare.wq?w2xPath=/ui/pp/index_pp.xml">사업자 정보 확인</a></li>
                    </ul>
                    <ul class="ulul">
                        <li class="tp-title">OFFICE</li>
                        <li><span>TEL</span>
                            <p>02-6959-5454</p>
                        </li>
                        <li><span>E-mail</span>
                            <p>golfpass_@naver.com</p>
                        </li>
                    </ul>
                    <ul class="ulul">
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
                    <ul class="ulul">
                        <li class="tp-title">NEWS LETTER</li>
                        <li class="mb-20"><input type="text" id="newsLetter" placeholder="E-mail을 입력해주세요"></li>
                        <li><strong>골프패스</strong>
                            <p style="margin-bottom: 0;">에서 제공하는 유용한 소식</p>
                        </li>
                    </ul>
                    <ul class="ulul">
                        <li class="tp-title">CERTIFICATION MARK</li>
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
                <div class="row d-flex" style="width:100%; margin:0;">
                    <p class='align-self-end mr-auto ml-auto'>© 2017 <strong>GOLFPASS.</strong> All Rights Reserved.</p>
                </div>

            </footer>
        </div>
    </div><a href="#traveltour-top-anchor" class="traveltour-footer-back-to-top-button" id="traveltour-footer-back-to-top-button"><i class="fa fa-angle-up" ></i></a>

    <script type='text/javascript' src='/public/etc/package/js/jquery1_11_4_3.js'></script>
    <script type='text/javascript' src='/public/etc/package/js/jquery4_9_5.js'></script>
    <script type='text/javascript' src='/public/etc/package/js/jquery2_1_4.js'></script>
    <script type='text/javascript' src='/public/etc/package/js/jquery1_0_0.js'></script>
    <script type='text/javascript' src='/public/etc/package/js/jquery4_9_5_3.js'></script>
    <script type='text/javascript'>
        var gdlr_core_pbf = {
            "admin": "",
            "video": {
                "width": "640",
                "height": "360"
            },
            "ajax_url": "https:\/\/demo.goodlayers.com\/traveltour\/wp-admin\/admin-ajax.php",
            "ilightbox_skin": "dark"
        };

    </script>
    <script type='text/javascript' src='/public/etc/package/js/jquery4_9_5_4.js'></script>
</body>

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

<!-- 검색기능 시작 -->
<script>
$("#input_search").keypress(function (e) {
var key = e.which;
// console.log(1);
    if(key == 13)  // the enter key code
    {
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
var $order_form = $("#tourmaster-single-tour-booking-fields");
function form_submit() {

	var start_date = new Date($("#datepicker1").val());
	
	var price = $("#price").val();
	var num_people = $("#num_people").val();
	if(price == -1) {
		alert("상담요망");
		return false;
	} 
	
	//총 가격
	var total_price = price * num_people;
	$("#total_price").val( total_price );

	//유효성 검사
	var now_date = new Date();
	if(now_date > start_date) {
		alert("이미 지난 날짜를 선택하셨습니다.");
		return false;
	}
	if(total_price == 0) {
		alert("인원을 선택해주세요.");
		return false;
	}
	
	//종료날짜
	start_date.setDate(start_date.getDate() + <?=substr($product->take_days, strpos($product->take_days, '일')-1, 1)?>);
	var yyyy = start_date.getFullYear();
	var M = start_date.getMonth() + 1;
	var d = start_date.getDate();
	if(M < 10) M = "0" + M;
	if(d < 10) d = "0" + d;
	var str_date = yyyy + "-" + M + "-" + d;
	$("#end_date").val(str_date);
	
	$order_form.submit();
}

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
</script>

<!-- 상품날자가격계산 -->

</html>