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
</head>

<body class="">
    <div class="tp-menu-container tp-position-fixed">
        <div class="tp-menu-sliders"></div>
        <div class="tp-menu-sliders"></div>
        <div class="tp-menu-sliders"></div>
        <div class="tp-menu">
            <ul class="tp-list-unstyled">
                <?php if(is_admin()){?>
                <li><a style="color:white;" href="<?=site_url(admin_home_uri.'')?>">관리자 페이지</a></li>
                <?php }?>
                <li><a style="color:white;" href="<?=site_url('')?>">골프패스</a></li>
                <li><a style="color:white;" href="<?=site_url(shop_category_uri.'/gets_by_name/나라별')?>">나라별 골프장</a></li>
                <li><a style="color:white;" href="<?=site_url(golfpass_panel_uri.'/gets')?>">패널소개</a></li>
                <?php if(!is_login()){?>
                <li><a style="color:white;" href="<?=site_url(user_uri.'/login')?>">로그인</a></li>
                <li><a style="color:white;" href="<?=site_url(user_uri.'/register_agree_1')?>">회원가입</a></li>
                <?php }?>
                <?php if(is_login()){?>
                <li><a style="color:white;" href="<?=site_url(user_uri.'/logout')?>">로그아웃</a></li>
                <?php }?>
                <li><a style="color:white;" href="<?=site_url(shop_mypage_uri.'/gets_wishlist')?>">마이페이지 </a></li>
                <!-- <li>
		<a style="color:white;" href="<?=site_url(shop_mypage_uri.'/gets')?>">
	위시리스트 
		</a></li> -->
                <li>
                    <a style="color:white;" href="<?=site_url(content_uri.'/gets?board_id=4')?>">고객센터</a>
                </li>
            </ul>
        </div>
    </div>
    <header id="tp-header" class="tp-black-bg-header tp-container-fluid tp-panel-header">
        <nav id='tp-sm-nav' class="tp-row tp-no-gutters tp-justify-content tp-align-items-stretch tp-d-sm-none tp-panel-nav">
            <div id="tp-logo" class='tp-col-3 tp-justify-content-center tp-d-flex tp-align-self-center tp-align-items-center'><img src="/public/sangmin/img/icon/logo_mobile.png" class="tp-d-md-none" alt=""></div>
            <div id='tp-nav-icon-box' class="tp-offset-2 tp-col-5 tp-d-flex tp-align-items-stretch tp-justify-content-end">
                <div id="tp-search" class="tp-d-flex tp-align-items-center"><span><i class="tp-xi tp-xi-search"></i></span></div>
                <div id="tp-login" class="tp-d-flex tp-align-items-center"><span><i class="tp-xi tp-xi-lock"></i></span></div>
                <div id="tp-join" class="tp-d-flex tp-align-items-center"><span><i class="tp-xi tp-xi-user-plus"></i></span></div>
            </div>
            <div class="tp-col-2 tp-ml-auto tp-toggle" onclick="$('body').toggleClass('tp-menu-open'); $('.tp-carousel-indicators').toggleClass('tp-d-none tp-d-flex');"><span><i class="tp-xi tp-xi-bars"></i></span></div>
        </nav>
        <nav id='tp-md-nav' class="tp-row tp-no-gutters tp-justify-content tp-align-items-stretch tp-d-none tp-d-sm-flex">
            <div id="tp-logo" class='tp-col-6 tp-d-flex tp-align-items-center'>
                <figure class="tp-mb-0 tp-d-flex tp-align-items-center tp-d-lg-none"><img src="/public/sangmin/img/icon/logo_mobile.png" class="" alt=""></figure>
                <a href="<?=site_url()?>">
                    <figure class="tp-mb-0 tp-align-items-center tp-d-none tp-d-lg-flex"><img src="/public/sangmin/img/icon/logo.png" class="" alt=""></figure>
                </a>
                <div id="tp-search" class="tp-d-flex tp-align-items-center"><i class="tp-xi tp-xi-search"></i><input type="text" placeholder="관심있는 나라나 골프장을 검색해보세요!"></div>
            </div>
            <?php if(!is_login()){?>
            <div id='tp-nav-icon-box' class="tp-col tp-d-flex tp-justify-content-end">
                <div id="tp-login" class="tp-d-flex tp-align-items-center"><span><i class="tp-xi tp-xi-lock"></i></span>
                    <p class="tp-mb-0"><a style="color:white;" href="<?=site_url(user_uri.'/login')?>">로그인</a></p>
                </div>
                <div id="tp-join" class="tp-d-flex tp-align-items-center"><span><i class="tp-xi tp-xi-user-plus"></i></span>
                    <p class="tp-mb-0"><a style="color:white;" href="<?=site_url(user_uri.'/register_agree_1')?>">회원가입</a></p>
                </div>
            </div>
            <?php }?>
            <div class="tp-col tp-ml-auto tp-toggle" onclick="$('body').toggleClass('tp-menu-open'); $('.tp-carousel-indicators').toggleClass('tp-d-none tp-d-flex');">

                <span><i class=""></i></span>
                <p class="tp-d-none tp-d-lg-block">메뉴</p>
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
                <div class="d-flex flex-wrap">
                    <figure>
                        <img src="/public/sangmin/img/partner/b_partner_google.png" alt="">
                    </figure>
                    <figure>
                        <img src="/public/sangmin/img/partner/b_partner_facebook.png" alt="">
                    </figure>

                    <figure>
                        <img src="/public/sangmin/img/partner/b_partner_instar.png" alt="">
                    </figure>
                    <figure>
                        <img src="/public/sangmin/img/partner/b_partner_naver.png" alt="">
                    </figure>
                    <figure>
                        <img src="/public/sangmin/img/partner/b_partner_daum.png" alt="">
                    </figure>
                </div>
            </div>

        </div>

        <div class="row d-flex" style="width:100%;">
            <ul>
                <li class="tp-title">ABOUT US</li>
                <li><a href="#">회사 소개</a></li>
                <li><a href="#">이용약관</a></li>
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
                <li><span>사업자등록번호</span>
                    <p>280-81-00963</p>
                </li>
                <li><span>등록판매업신고번호</span>
                    <p>2017-서울강서-1545호</p>
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



    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="/public/tmp/sangmin/dist/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="/public/tmp/sangmin/dist/Nwagon/Nwagon.js"></script>
    <!-- <script src="/public/tmp/sangmin/js/custom.js"></script> -->
    <script src="<?=domain_url('/public/js/common.js')?>"></script>
</body>

</html>
