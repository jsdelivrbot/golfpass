<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>골프패스</title>
    <script src="/public/sangmin/js/prefixfree.min.js"></script>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/xeicon@2.3.3/xeicon.min.css">
    <link rel="stylesheet" href="/public/sangmin/dist/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="/public/css/tp-main.css">

    <?php if(is_semantic_dev) {?>
    <link rel="stylesheet/less" type="text/css" href="/public/framework/semantic/src/semantic.less">
    <script src="/public/framework/semantic/src/less.min.js"></script>
    <?php }else{?>
    <link rel="stylesheet" type="text/css" href="/public/framework/semantic/out/semantic.css">
    <link rel="stylesheet" type="text/css" href="/public/framework/semantic/out/semantic.js">
    <?php }?>
    <link rel="stylesheet" href="/public/css/bootstrap.css">
    <script src="/public/tmp/sangmin/js/jquery-3.2.1.min.js"></script>
    <style>
        ::-webkit-scrollbar {
            display: none;
        }

        a {
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

<body class="">
    <div class="menu-container position-fixed">
        <div class="menu-sliders"></div>
        <div class="menu-sliders"></div>
        <div class="menu-sliders"></div>
        <div class="menu">
            <ul class="list-unstyled">
                <?php if(is_admin()){?>
                    <li><a style="font-family: 'notokr-light', sans-serif; font-size: 20px; font-weight: normal; color: #fff;" href="<?=site_url(admin_home_uri.'')?>">관리자 페이지</a></li>
                <?php }?>
                    <li><a style="font-family: 'notokr-light', sans-serif; font-size: 20px; font-weight: normal; color: #fff;" href="<?=site_url(shop_category_uri.'/gets_by_name/나라별')?>">나라별 골프장</a></li>
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
    <header id="header" class="black-bg-header container-fluid panel-header">
        <nav id='sm-nav' class="row no-gutters justify-content align-items-stretch d-sm-none panel-nav">
            <div id="logo" class='col-3 justify-content-center d-flex align-self-center align-items-center'>
                <img src="/public/sangmin/img/icon/logo_mobile.png" class="d-md-none" alt="">
            </div>
            <div id='nav-icon-box' class="offset-2 col-5 d-flex align-items-stretch justify-content-end">
                <div id="search" class="d-flex align-items-center">
                    <a class="mk-search-trigger mk-fullscreen-trigger" href="#" id="search-button-listener">
                        <span><i class="xi xi-search" id="search-button" style="text-shadow: 0 0 7px rgba(0,0,0,1);"></i></span>
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
                        <span><i class="xi-log-in xi-x" style="text-shadow: 0 0 7px rgba(0,0,0,1);"></i></span>
                    </a>
                </div>
                <div id="join" class="d-flex align-items-center">
                    <a href="<?=site_url(user_uri.'/register_agree_1')?>" style="color:white;">
                        <span><i class="xi xi-user-plus" style="text-shadow: 0 0 7px rgba(0,0,0,1);"></i></span>
                    </a>
                </div>
                <?php }else{?>
               <div style="margin-top:25px;"><a href="#none"><img src="/public/images/ico_my.png" alt=""></a></div>
                <?php }?>
            </div>
            <div class="col-2 ml-auto toggle"
                 onclick="$('body').toggleClass('menu-open'); $('.carousel-indicators').toggleClass('d-none d-flex');">
                <span>
                    <i class="xi xi-bars"></i>
                </span>
            </div>
        </nav>
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
                                    <input type="text" placeholder="관심있는 나라나 골프장을 검색해보세요!">
                                    <!--NOTE 검색결과 창-->
                                    <div class="search-content-container position-absolute w-100">

                                    </div>
                            </div>
            </div>
            <div id='nav-icon-box' class="col  d-flex justify-content-end">
            <?php if(!is_login()){?>
                <div id="login" class="d-flex align-items-center" style="cursor: pointer;" onclick="location.href='<?=site_url(user_uri.'/login')?>';">
                    <span><i class="xi-log-in xi-x" style="text-shadow: 0 0 7px rgba(0,0,0,1);"></i></span>
                    <p class="mb-0"><a style="color: white; font-family: 'notokr-regular', sans-serif; font-size: 12px; text-shadow: 0 0 7px rgba(0,0,0,1);" href="<?=site_url(user_uri.'/login')?>">로그인</a></p>
                </div>
                <div id="join" class="d-flex align-items-center" style="cursor: pointer;" onclick="location.href='<?=site_url(user_uri.'/register_agree_1')?>';">
                    <span><i class="xi xi-user-plus" style="text-shadow: 0 0 7px rgba(0,0,0,1);"></i></span>
                    <p class="mb-0"><a style="color: white; font-family: 'notokr-regular', sans-serif; font-size: 12px; text-shadow: 0 0 7px rgba(0,0,0,1);" href="<?=site_url(user_uri.'/register_agree_1')?>">회원가입</a></p>
                </div>
            <?php }else{?>
               <div style="margin-top:25px; cursor: pointer;" onclick="location.href='<?=site_url(shop_mypage_uri."/gets_wishlist")?>';"><a href="#none"><img src="/public/images/ico_my.png" alt=""></a></div>
                <div id="logout" class="d-flex align-items-center" style="cursor: pointer;" onclick="location.href='<?=site_url(user_uri.'/logout')?>';">
                    <span><i class="xi-log-out xi-x" style="text-shadow: 0 0 7px rgba(0,0,0,1);"></i></span>
                    <p class="mb-0"><a style="color: white; font-family: 'notokr-regular', sans-serif; font-size: 12px; text-shadow: 0 0 7px rgba(0,0,0,1);" href="<?=site_url(user_uri.'/logout')?>">로그아웃</a></p>
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
    <div style="margin-top: 180px;"></div>
    <?php load_view($content_view)?>
    <div style="margin-top: 100px;"></div>
    <footer id='tp-footer' class='main-footer container-fluid'>
        <div id="tp-partner">
            <div class="row" style="width:100%;">
                <div class="w-100">
                    <h6>PARTNERS</h6>
                </div>
                <div class="tp-d-flex tp-flex-wrap">
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
                <li class="mb-20"><input type="text" placeholder="E-mail을 입력해주세요"></li>
                <li><strong>골프패스</strong>
                    <p style="margin-bottom: 0;">에서 제공하는 유용한 소식</p>
                </li>
            </ul>
        </div>
        <div class="row d-flex" style="width:100%; margin:0;">
            <p class='align-self-end mr-auto ml-auto'>© 2017 <strong>GOLFPASS.</strong> All Rights Reserved.</p>
        </div>

    </footer>


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
