<?php $ci = &Public_Controller::$instance; $user = $ci->user;?> 
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>골프패스
    </title> 
    <script src="/public/sangmin/js/prefixfree.min.js">
    </script> 
    <link rel="stylesheet" href="/public/sangmin/dist/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/xeicon@2.3.3/xeicon.min.css">
    <!-- <link rel="stylesheet" href="/public/css/main.css"> -->
    <link rel="stylesheet" href="/public/css/tp-main.css">
    <link rel="stylesheet" href="/public/css/bootstrap.css">
    <style>::-webkit-scrollbar{
      display:none}
      a{
        text-decoration:none !important;
        color:inherit}
      a:hover{
        color:inherit;
        text-decoration:none !important}
    </style>
    <style>#bg-div{
      background-image:url(<?=$product_main[0]->photo?>) !important}
      .content-box{
        position:relative}
      .content-box:first-child a .content{
        height:250px}
      .content-box a .content{
        height:100px;
        transition:0.8s;
        background-repeat:no-repeat;
        background-position:center;
        background-size:cover}
      .content-box a:hover .content{
        height:250px !important}
      .content-box .new_position{
        position:absolute;
        left:40px;
        margin:0 !important;
        bottom:30px}
      .content-box .new_position2{
        position:absolute;
        left:95px;
        margin:0 !important;
        bottom:25px}
      .content-box .new_position3{
        position:absolute;
        right:40px;
        margin:0 !important;
        bottom:30px}
      .blank_img{
        max-width:438px;
        width:100%}
      @media (max-width:767px){
        .blank_img{
          max-width:100%}
      }
      @media (max-width:450px){
        #main-wrap #section5 .content-box .content h1{
          font-size:24px}
        .content-box .new_position{
          left:30px}
        .content-box .new_position2{
          left:80px}
      }
    </style>
  </head>
  <body>
    <div class="tp-menu-container tp-position-fixed">
      <div class="tp-menu-sliders">
      </div>
      <div class="tp-menu-sliders">
      </div>
      <div class="tp-menu-sliders">
      </div>
      <div class="tp-menu">
        <ul class="tp-list-unstyled"> 
          <?php if(is_admin()){?>
          <li>
            <a style="color:white;" href="<?=site_url(admin_home_uri.'')?>">관리자 페이지
            </a>
          </li> 
          <?php }?>
          <li>
            <a style="color:white;" href="<?=site_url(shop_category_uri.'/gets_by_name/나라별')?>">나라별 골프장
            </a>
          </li>
          <li>
            <a style="color:white;" href="<?=site_url(golfpass_panel_uri.'/gets')?>">그늘집 by GOLFPASS
            </a>
          </li>
          <li>
            <a style="color:white;" href="<?=site_url(content_uri.'/gets?board_id=4')?>">고객센터
            </a>
          </li> 
          <?php if(!is_login()){?>
          <li>
            <a style="color:white;" href="<?=site_url(user_uri.'/login')?>">로그인
            </a>
          </li>
          <li>
            <a style="color:white;" href="<?=site_url(user_uri.'/register_agree_1')?>">회원가입
            </a>
          </li> 
          <?php }?> 
          <?php if(is_login()){?>
          <li>
            <a style="color:white;" href="<?=site_url(shop_mypage_uri.'/gets_wishlist')?>">마이페이지
            </a>
          </li>
          <li>
            <a style="color:white;" href="<?=site_url(user_uri.'/logout')?>">로그아웃
            </a>
          </li> 
          <?php }?>
        </ul>
      </div>
    </div> 
    <header id="tp-header" class="tp-black-bg-header tp-container-fluid tp-panel-header"> 
      <nav id='tp-sm-nav' class="tp-row tp-no-gutters tp-justify-content tp-align-items-stretch tp-d-sm-none tp-panel-nav">
        <div id="tp-logo" class='tp-col-3 tp-justify-content-center tp-d-flex tp-align-self-center tp-align-items-center'> 
          <img src="/public/sangmin/img/icon/logo_mobile.png" class="tp-d-md-none" alt="">
        </div>
        <div id='tp-nav-icon-box' class="tp-offset-2 tp-col-5 tp-d-flex tp-align-items-stretch tp-justify-content-end">
          <div id="tp-search" class="tp-d-flex tp-align-items-center"> 
            <a class="tp-mk-search-trigger tp-mk-fullscreen-trigger" href="#" id="tp-search-button-listener"> 
              <span>
                <i class="tp-xi tp-xi-search" id="tp-search-button" style="text-shadow: 0 0 7px rgba(0,0,0,1);">
                </i>
              </span> 
            </a>
            <div class="tp-mk-fullscreen-search-overlay" id="tp-mk-search-overlay"> 
              <a href="#" class="tp-mk-fullscreen-close" id="tp-mk-fullscreen-close-button">
                <i class="tp-xi tp-xi-close">
                </i>
              </a>
              <div id="tp-mk-fullscreen-search-wrapper">
                <form method="get" id="tp-mk-fullscreen-searchform" action=""> 
                  <input type="text" value="" placeholder="Search..." id="tp-mk-fullscreen-search-input"> 
                  <i class="tp-xi tp-xi-search tp-fullscreen-search-icon">
                    <input value="" type="submit">
                  </i>
                </form>
              </div>
            </div>
          </div> 
          <?php if(!is_login()){?>
          <div id="tp-login" class="tp-d-flex tp-align-items-center"> 
            <a href="<?=site_url(user_uri.'/login')?>" style="color:white;"> 
              <span>
                <i class="tp-xi-log-in tp-xi-x" style="text-shadow: 0 0 7px rgba(0,0,0,1);">
                </i>
              </span> 
            </a>
          </div>
          <div id="tp-join" class="tp-d-flex tp-align-items-center"> 
            <a href="<?=site_url(user_uri.'/register_agree_1')?>" style="color:white;"> 
              <span>
                <i class="tp-xi tp-xi-user-plus" style="text-shadow: 0 0 7px rgba(0,0,0,1);">
                </i>
              </span> 
            </a>
          </div> 
          <?php }else{?>
          <div style="margin-top:25px;">
            <a href="<?=site_url(shop_mypage_uri."/gets_wishlist")?>">
              <img src="<?=$user->profilePhoto?>" alt="">
            </a>
          </div> 
          <?php }?>
        </div>
        <div class="tp-col-2 tp-ml-auto tp-toggle" onclick="$('body').toggleClass('tp-menu-open'); $('.tp-carousel-indicators').toggleClass('tp-d-none tp-d-flex');"> 
          <span> 
            <i class="tp-xi tp-xi-bars">
            </i> 
          </span>
        </div> 
      </nav> 
      <nav id='tp-md-nav' class="tp-row tp-no-gutters tp-justify-content tp-align-items-stretch tp-d-none tp-d-sm-flex">
        <div id="tp-logo" class='tp-col-6 tp-d-flex tp-align-items-center'> 
          <figure class="tp-mb-0 tp-d-flex tp-align-items-center tp-d-lg-none"> 
            <img src="/public/sangmin/img/icon/logo_mobile.png" class="" alt=""> 
          </figure> 
          <a href="<?=site_url()?>">
            <figure class="tp-mb-0 tp-align-items-center tp-d-none tp-d-lg-flex"> 
              <img src="/public/sangmin/img/icon/logo.png" class="" alt=""> 
            </figure>
          </a>
          <div class="tp-search-container tp-d-flex tp-align-items-center tp-position-relative"> 
            <i class="tp-xi tp-xi-search">
            </i> 
            <input id="tp-serach"type="text" placeholder="관심있는 나라나 골프장을 검색해보세요!">
            <div class="tp-search-content-container tp-position-absolute tp-w-100">
            </div>
          </div>
        </div>
        <div id='tp-nav-icon-box' class="tp-col tp-d-flex tp-justify-content-end"> 
          <?php if(!is_login()){?>
          <div id="tp-login" class="tp-d-flex tp-align-items-center"> 
            <span>
              <i class="tp-xi-log-in tp-xi-x" style="text-shadow: 0 0 7px rgba(0,0,0,1);">
              </i>
            </span>
            <p class="tp-mb-0">
              <a style="color: white; font-family: 'notokr-regular', sans-serif; font-size: 12px; text-shadow: 0 0 7px rgba(0,0,0,1);" href="<?=site_url(user_uri.'/login')?>">로그인
              </a>
            </p>
          </div>
          <div id="tp-join" class="tp-d-flex tp-align-items-center"> 
            <span>
              <i class="tp-xi tp-xi-user-plus" style="text-shadow: 0 0 7px rgba(0,0,0,1);">
              </i>
            </span>
            <p class="tp-mb-0">
              <a style="color: white; font-family: 'notokr-regular', sans-serif; font-size: 12px; text-shadow: 0 0 7px rgba(0,0,0,1);" href="<?=site_url(user_uri.'/register_agree_1')?>">회원가입
              </a>
            </p>
          </div> 
          <?php }else{?>
          <div style="margin-top:25px;">
            <a href="<?=site_url(shop_mypage_uri."/gets_wishlist")?>">
              <img src="<?=$user->profilePhoto?>" alt="">
            </a>
          </div>
          <div id="tp-logout" class="tp-d-flex tp-align-items-center"> 
            <span>
              <i class="tp-xi-log-out tp-xi-x" style="text-shadow: 0 0 7px rgba(0,0,0,1);">
              </i>
            </span>
            <p class="tp-mb-0">
              <a style="color: white; font-family: 'notokr-regular', sans-serif; font-size: 12px; text-shadow: 0 0 7px rgba(0,0,0,1);" href="<?=site_url(user_uri.'/logout')?>">로그아웃
              </a>
            </p>
          </div> 
          <?php }?>
        </div>
        <div class="tp-col tp-ml-auto tp-toggle" onclick="$('body').toggleClass('tp-menu-open'); $('.tp-carousel-indicators').toggleClass('tp-d-none tp-d-flex');"> 
          <span> 
            <i class="tp-xi tp-xi-bars">
            </i> 
          </span>
        </div> 
      </nav> 
    </header>
    <div id="tp-bg-div" style="">
    </div> 
    <?php load_view($content_view)?>
    <footer id='tp-footer' class='tp-main-footer tp-container-fluid'>
      <div id="tp-partner">
        <div class="tp-row" style="width:100%;">
          <div class="tp-w-100">
            <h6 >PARTNERS
            </h6>
          </div>
          <div class="tp-d-flex tp-flex-wrap"> 
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
      <div class="tp-row tp-d-flex" style="width:100%;">
        <ul>
          <li class="tp-title">ABOUT US
          </li>
          <li>
            <a href="#">회사 소개
            </a>
          </li>
          <li>
            <a href="#">이용약관
            </a>
          </li>
          <li>
            <a href="#">개인 정보 취급 방침
            </a>
          </li>
        </ul>
        <ul>
          <li class="tp-title">OFFICE
          </li>
          <li>
            <span>TEL
            </span>
            <p>02-6959-5454
            </p>
          </li>
        </ul>
        <ul>
          <li class="tp-title">CONTACT US
          </li>
          <li>
            <span>상호
            </span>
            <p>PLAYSEVEN
            </p>
          </li>
          <li>
            <span>대표
            </span>
            <p>황현철
            </p>
          </li>
          <li>
            <span>사업자등록번호
            </span>
            <p>280-81-00963
            </p>
          </li>
          <li>
            <span>등록판매업신고번호
            </span>
            <p>2017-서울강서-1545호
            </p>
          </li>
        </ul>
        <ul>
          <li class="tp-title">NEWS LETTER
          </li>
          <li class="tp-mb-20">
            <input type="text" id="tp-newsLetter" placeholder="E-mail을 입력해주세요">
          </li>
          <li>
            <strong>골프패스
            </strong>
            <p style="margin-bottom: 0;">에서 제공하는 유용한 소식
            </p>
          </li>
        </ul>
      </div>
      <div class="tp-row tp-d-flex" style="width:100%; margin:0;">
        <p class='tp-align-self-end tp-mr-auto tp-ml-auto'>© 2017 
          <strong>GOLFPASS.
          </strong> All Rights Reserved.
        </p>
      </div>
    </footer> 
    <script src="/public/sangmin/js/jquery-3.2.1.min.js">
    </script> 
    <script>
    </script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous">
    </script> 
    <script src="/public/sangmin/dist/bootstrap/bootstrap.bundle.min.js">
    </script> 
    <script src="/public/sangmin/js/custom/navAction.js">
    </script> 
    <script src="/public/sangmin/js/custom/search.js">
    </script> 
    <script src="/public/sangmin/js/mobile_search.js">
    </script> 
    <script>$('.btn.btn-outline-light.btn-sm').click(function() {
        var rankingType=$(this).data('rankingtype');
        $.ajax({
          method:"POST",url:"<?=site_url(main_uri.'/ajax_gets_by_ranking')?>",data:{
            rankingType:rankingType}
          ,beforeSend:function(){
          }
          ,success:function(data){
            $("#section5").html(data);
          }
        }
              );
      }
                                                    );
    </script> 
    <script>$(function(){
        $(".content-box:nth-child(2) a .content, .content-box:nth-child(3) a .content").hover(function(){
          $(".content-box:first-child a .content").css("height","100px");
        }
                                                                                              ,function(){
          $(".content-box:first-child a .content").css("height","250px");
        }
                                                                                             );
      }
             );
    </script> 
    <script>$("#newsLetter").keypress(function(e){
        var key=e.which;
        if(key==13) {
          var email=$(this).val();
          var url="<?=site_url(main_uri."/add_newslatter")?>";
          $.ajax({
            type:"post",dataType:"json",url:url,data:{
              email:email}
            ,success:function(data){
              alert(data.email+"이(가) 뉴스레터에 등록되었습니다.");
            }
            ,error:function(xhr,textStatus,errorThrown){
              alert('에러...');
              $('.loading').fadeOut(500);
              console.log('code: '+request.status+"n"+'message: '+request.responseText+"n"+'error: '+error);
              console.log(errorThrown);
            }
          }
                );
          return false;
        }
      }
                                     );
    </script> 
    <script>$("#serach").keypress(function(e){
        var key=e.which;
        if(key==13) {
          var value=$(this).val();
          window.location.href="<?=site_url(shop_product_uri."/gets_by_hash/")?>"+value;
        }
      }
                                 );
    </script> 
  </body>
</html>
