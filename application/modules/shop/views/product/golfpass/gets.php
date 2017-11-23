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
    .blank_img {
        max-width: 438px;
        width: 100%;
    }
    @media (max-width: 767px) {
        .blank_img {
            max-width: 100%;
        }
    }
</style>

<body>
    <div id="wrap"> 
        <div id="content">
            <section class="sub-banner" style="background:url(/public/etc/list/images/golfpass/hero_img.png) fixed no-repeat">
                <div class="container">
                    <div class="position-center-center">
                        <h2><?php for($j=count($parent_categories)-2; $j >= 1; $j--){?><?=$parent_categories[$j]->name?><?php }?></h2>
                        <ol class="breadcrumb">
                            <li class="active">일본열도를 구성하는 4대 섬 중 가장 남쪽에 있는 섬, 또는 그 섬을 중심으로 하는 지방. 전근대 시기에는 사이카이도(서해도, 西海道)라 불리웠으며, 옛날에 9개의 번국(구니, 国=州)가 있었다고 해서 규슈라고 하며 번국(구니)이란 일본 고대의 행정구역이다.</li>
                        </ol>
                    </div>
                </div>
            </section>

            <section class="blog style-2 padding-bottom-80">
                <div class="container">
                    <div class="heading-block style-3 text-center margin-top-100 margin-bottom-50">
                        <h3>상품 목록</h3>
                        <hr class="color">
                    </div>

                    <ul class="tabs portfolio-filter text-center margin-bottom-80">
                        <li class="tab-title filter-item"><a class="active" href="#" data-filter="*">ALL</a></li>
                        <li class="tab-title filter-item"><a href="#" data-filter=".pf-branding-design" class="">후쿠오카</a></li>
                        <li class="tab-title filter-item"><a href="#" data-filter=".pf-photography" class="">구마모토</a></li>
                        <li class="tab-title filter-item"><a href="#" data-filter=".pf-web-design" class="">동경</a></li>
                        <li class="tab-title filter-item"><a href="#" data-filter=".pf-digital-art" class="">오사카</a></li>
                    </ul>

                    <div class="row">
                        <?php for($i=0; $i< count($products); $i++){?>
                            <div class="col-md-4 margin-bottom-80" style=" cursor: pointer;" onclick="location.href='<?=site_url(shop_product_uri."/get/{$products[$i]->id}")?>';">
                                <article class="blog-post">
                                    <div class="post-img position-relative rounded-top" style="background-image:url(<?=$products[$i]->photos[0]?>); background-repeat:no-repeat; background-position:center; background-size:cover">
                                        <img src="/public/etc/list/images/golfpass/list-blank.png" class="blank_img">
                                        <span class="date font-crimson"><?=$products[$i]->price?>원</span>
                                        <span class="date font-crimson" style="bottom: 20px; background-color: #383838;"><?=$products[$i]->hotel_id !== null ? "숙박 포함" : "숙박 미포함"?></span>
                                    </div>
                                    <a href="#" class="tittle-post"> <?=$products[$i]->name?> </a>
                                    <span class="post-bt"><span class="text-color-primary"><?=$products[$i]->eng_name?></span></span>
                                    <p>
                                        <?php 
                                            echo $products[$i]->desc;
                                        ?>
                                    </p>
                                    <ul class="post-info margin-bottom-0">
                                        <li> <i class="fa fa-star" style="color: #fcbf3f;"></i>4.7 </li>
                                        <li> <i class="fa fa-map-o"></i><?php for($j=count($parent_categories)-2; $j >= 1; $j--){?><?=$parent_categories[$j]->name?><?php }?> </li>
                                        <li> <i class="fa fa-map"></i><?=$category->name?> </li>
                                        <li class="pull-right no-margin last-li"> <a href="#">자세히 <i class="fa fa-angle-right margin-left-10"></i></a></li>
                                    </ul>
                                </article>
                            </div>
                        <?php }?>
                    </div>

                    <!-- 페이지네이션 -->
                    <ul class="pagination">
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                    </ul>
                    <!-- /페이지네이션 -->
                </div>
            </section>
        </div>
    </div>

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

<!-- SLIDER REVOLUTION 4.x SCRIPTS --> 
<script type="text/javascript" src="/public/etc/list/rs-plugin/js/jquery.themepunch.tools.min.js"></script> 
<script type="text/javascript" src="/public/etc/list/rs-plugin/js/jquery.themepunch.revolution.min.js"></script> 
<script src="/public/etc/list/js/zap.js"></script>