<!-- FontsOnline -->
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Crimson+Text:400,400italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>

<!-- StyleSheets -->
<link rel="stylesheet" href="/public/etc/list/css/ionicons.min.css">
<link rel="stylesheet" href="/public/etc/list/css/bootstrap/bootstrap.min.css">
<link rel="stylesheet" href="/public/etc/list/css/font-awesome.min.css">
<link rel="stylesheet" href="/public/etc/list/css/list-main.css">
<link rel="stylesheet" href="/public/etc/list/css/list-style.css">
<link rel="stylesheet" href="/public/etc/list/css/responsive.css">

<!-- COLORS -->
<link rel="stylesheet" id="color" href="/public/etc/list/css/default.css">

<!-- JavaScripts -->
<script src="/public/etc/list/js/vendors/modernizr.js"></script>
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
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

<body>

<!-- Page Wrapper -->
<div id="wrap"> 
  <!-- Content -->
  <div id="content">
    <section class="sub-banner" style="background:url(/public/etc/list/images/golfpass/hero_img.png) fixed no-repeat">
      <div class="container">
        <div class="position-center-center">
          <h2><?=$category->name?></h2>
          <ol class="breadcrumb">
            <li class="active">일본열도를 구성하는 4대 섬 중 가장 남쪽에 있는 섬, 또는 그 섬을 중심으로 하는 지방. 전근대 시기에는 사이카이도(서해도, 西海道)라 불리웠으며, 옛날에 9개의 번국(구니, 国=州)가 있었다고 해서 규슈라고 하며 번국(구니)이란 일본 고대의 행정구역이다.</li>
          </ol>
        </div>
      </div>
    </section>
    
    <!-- BLOG -->
    <section class="blog style-2 padding-bottom-80"> 
          <!-- TITTLE -->
          <div class="container"> 
            <!-- MAIN HEADING -->
            <div class="heading-block style-3 text-center margin-top-100 margin-bottom-50">
              <h3>상품 목록</h3>
              <hr class="color">
            </div>
            
            <ul class="tabs portfolio-filter text-center margin-bottom-80">
                <li class="tab-title filter-item"><a class="active" href="#." data-filter="*">ALL</a></li>
                <li class="tab-title filter-item"><a href="#." data-filter=".pf-branding-design" class="">후쿠오카</a></li>
                <li class="tab-title filter-item"><a href="#." data-filter=".pf-photography" class="">구마모토</a></li>
                <li class="tab-title filter-item"><a href="#." data-filter=".pf-web-design" class="">동경</a></li>
                <li class="tab-title filter-item"><a href="#." data-filter=".pf-digital-art" class="">오사카</a></li>
              </ul>

            <!-- BLOG ROW -->
            <div class="row">

              <!-- BLOG POST -->
              <div class="col-md-4 margin-bottom-80" style=" cursor: pointer;" onclick="location.href='#';">
                <article class="blog-post">
                 <div class="post-img position-relative rounded-top" style="background-image:url(/public/etc/list/images/golfpass/test_img_001.png); background-repeat:no-repeat; background-position:center; background-size:cover">
                <img src="/public/etc/list/images/golfpass/list-blank.png" class="blank_img"> <span class="date font-crimson">100,160원</span>
                  </div>
                  <a href="#." class="tittle-post"> 니조 컨트리 클럽 </a> <span class="post-bt"><span class="text-color-primary">NIJO COUNTRY CLUB</span></span>
                  <p>거의 모든 홀에서 바다를 바라볼 수 있는 로케이션을 자랑하며, 현해탄을 향해 날려보내는 티샷은 니죠만의 절경. 전체적으로 업다운이 심하지는 않으나 은근하게 전략성이 요구되는 설계로서 플레이어의 도전정신을 필요로 하는 코스이다. 접객 서비스와 레스토랑 음식에 대해서도 특히나 호평을 받고있고, 플레이 후 바다가 보이는 파노라마 대욕탕에서 느긋하게 휴식을 취할 수 있다.</p>
                  <ul class="post-info margin-bottom-0">
                    <li> <i class="fa fa-star" style="color: #fcbf3f;"></i>4.7 </li>
                    <li> <i class="fa fa-map-o"></i>큐슈 </li>
                    <li> <i class="fa fa-map"></i>후쿠오카 </li>
                    <li class="pull-right no-margin"> <a href="#.">자세히 <i class="fa fa-angle-right margin-left-10"></i></a></li>
                  </ul>
                </article>
              </div>

            </div>

            <ul class="pagination">
                <li><a href="#.">1</a></li>
                <li><a href="#.">2</a></li>
                <li><a href="#.">3</a></li>
                <li><a href="#.">4</a></li>
                <li><a href="#.">5</a></li>
                <li><a href="#."><i class="fa fa-angle-right"></i></a></li>
            </ul>
          </div>
        </section>
  </div>
</div>
<!-- End Content --> 

<!-- End Page Wrapper --> 

<!-- JavaScripts --> 
<script src="/public/etc/list/js/vendors/jquery/jquery.min.js"></script> 
<script src="/public/etc/list/js/vendors/wow.min.js"></script> 
<script src="/public/etc/list/js/vendors/bootstrap.min.js"></script> 
<script src="/public/etc/list/js/vendors/own-menu.js"></script> 
<script src="/public/etc/list/js/vendors/flexslider/jquery.flexslider-min.js"></script> 
<script src="/public/etc/list//public/etc/list/js/vendors/jquery.countTo.js"></script> 
<script src="/public/etc/list/js/vendors/jquery.isotope.min.js"></script> 
<script src="/public/etc/list/js/vendors/jquery.bxslider.min.js"></script> 
<script src="/public/etc/list/js/vendors/owl.carousel.min.js"></script> 
<script src="/public/etc/list/js/vendors/jquery.sticky.js"></script> 

<!-- SLIDER REVOLUTION 4.x SCRIPTS  --> 
<script type="text/javascript" src="/public/etc/list/rs-plugin/js/jquery.themepunch.tools.min.js"></script> 
<script type="text/javascript" src="/public/etc/list/rs-plugin/js/jquery.themepunch.revolution.min.js"></script> 
<script src="/public/etc/list/js/zap.js"></script>