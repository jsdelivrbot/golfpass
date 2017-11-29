<!-- 상품리스트라면 -->
<?php if($parent_category->name !== ''){?>
<div style="margin-top: -180px;">
    <?php }else{?> 
        <!-- 검색결과페이지라면 -->
<div style="margin-top: -150px;">
        </div>
    <?php }?>
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

<div id="wrap">
    <div id="content">
            <!-- 검색결과 페이지에서 출력하지 않습니다.시작    -->
        <?php if($parent_category->name !== ''){?>
        <section class="sub-banner" style="background:url(<?=$parent_category->photo4?>) fixed no-repeat">
            <div class="container">
                <div class="position-center-center">
                    <h2 style="font-family: 'notokr-regular', sans-serif; font-weight: normal; text-shadow: 0 0 7px rgba(0,0,0,1);">
                        <?=$parent_category->name?>
                        <!-- <?php for($j=count($parent_categories)-2; $j >= 1; $j--){?><?=$parent_categories[$j]->name?><?php }?> -->
                    </h2>
                    <!--<ol class="breadcrumb">
                        <li class="active" style="font-family: 'notokr-regular', sans-serif; font-weight: normal;">
                     
                        <?php if(strpos(current_url(),"shop/product/gets_by_hash") === false){?>
                            <?=$parent_category->detail_desc?>
                        <?php }?>
                        </li>
                    </ol>-->
                </div>
            </div>
        </section>
        <?php }?>
        <!-- 검색결과 페이지에서 출력하지 않습니다. 끝   -->
        <section class="blog style-2 padding-bottom-80">
            <div class="container">
                <div class="heading-block style-3 text-center margin-top-100 margin-bottom-50">
                    <h3 style="font-family: 'notokr-regular', sans-serif; font-weight: normal;"><?=isset($search) ? "\"{$search}\" 검색결과({$num_total})" : "상품 목록"?></h3>
                    <hr class="color">
                </div>

                <ul class="tabs portfolio-filter text-center margin-bottom-80">
                        
                    <?php if($parent_category->name !== ''){?>
                           <!--네비게이션 상품리스트일때 시작    -->
                    <li class="tab-title filter-item">
                        <a class="<?=$category->id === $parent_category->id ? "active" : ""?>" href="<?=site_url(shop_product_uri."/gets/{$parent_category->id}")?>" data-filter="*" style="font-family: 'notokr-regular', sans-serif; font-size: 12px; font-weight: normal;">
                            ALL
                        </a>
                    </li>
                    <?php for($i=0; $i<count($child_categories); $i++){?>
                    
                            <li class="tab-title filter-item">
                                <a href="<?=site_url(shop_product_uri."/gets/{$child_categories[$i]->id}")?>" data-filter=".pf-branding-design" class="<?=$category->id === $child_categories[$i]->id ? "active" : ""?>" style="font-family: 'notokr-regular', sans-serif; font-size: 12px; font-weight: normal;">
                                    <?=$child_categories[$i]->name?>
                                </a>
                            </li>
                    <!--네비게이션 상품리스트일때 끝   -->
                    <?php }?>

                <?php }else{?>
                    <li class="tab-title filter-item">
                    <a href="<?=site_url(shop_product_uri."/gets_by_hash/{$search}")?>" data-filter=".pf-branding-design" class="active" style="font-family: 'notokr-regular', sans-serif; font-size: 12px; font-weight: normal;">
                    상품 목록<?="({$num_products})"?>
                    </a>
                </li>
                    <li class="tab-title filter-item">
                    <a href="<?=site_url(golfpass_panel_content_uri."/gets_by_hash/{$search}?search={$search}")?>" data-filter=".pf-branding-design" class="" style="font-family: 'notokr-regular', sans-serif; font-size: 12px; font-weight: normal;">
                    그늘집 목록<?="({$num_panel_contents})"?>
                    </a>
                </li>
                <?php }?>
                </ul>
                <?php ?>                
                  


                <div class="row">
                    <?php for($i=0; $i< count($products); $i++){?>
                        <div class="col-md-4 margin-bottom-80" style="cursor: pointer;" onclick="location.href='<?=site_url(shop_product_uri."/get/{$products[$i]->id}")?>';">
                            <article class="blog-post">
                                <div class="post-img position-relative rounded-top" style="background-image:url(<?=$products[$i]->photos[0]?>); background-repeat:no-repeat; background-position:center; background-size:cover">
                                    <img src="/public/etc/list/images/golfpass/list-blank.png" class="blank_img">
                                    <span class="date font-crimson" style="font-family: 'notokr-regular', sans-serif; font-weight: normal;"><?=number_format($products[$i]->price)?>원</span>
                                    <span class="date font-crimson" style="bottom: 20px; background-color: #383838; font-family: 'notokr-regular', sans-serif; font-weight: normal;"><?=$products[$i]->hotel_id !== null ? "숙박 포함" : "숙박 미포함"?></span>
                                </div>
                                <a href="#" class="tittle-post" style="font-family: 'notokr-regular', sans-serif; font-weight: normal;"> <?=$products[$i]->name?> </a>
                                <span class="post-bt"><span class="text-color-primary" style="font-family: 'notokr-demilight', sans-serif; font-weight: normal;"><?=$products[$i]->eng_name?></span></span>
                                <p style="font-family: 'notokr-demilight', sans-serif; font-weight: normal;">
                                    <?php 
                                        echo $products[$i]->desc;
                                    ?>
                                </p>
                                <ul class="post-info margin-bottom-0">
                                    <li> <i class="fa fa-star" style="color: #fcbf3f;"></i><?=ceil($products[$i]->avg_score*10)/10?> </li>
                                    <li> <i class="fa fa-map-o"></i><?=$products[$i]->parent_category_name?> </li>
                                    <!-- <li> <i class="fa fa-map"></i><?=$category->name?> </li> -->
                                    <li> <i class="fa fa-map"></i><?=$products[$i]->category_name?> </li>
                                    <li class="pull-right no-margin last-li"> <a href="#">자세히 <i class="fa fa-angle-right margin-left-10"></i></a></li>
                                </ul>
                            </article>
                        </div>
                    <?php }?>
                </div>

                <!-- 페이지네이션 -->
                <?=$this->pagination->create_links();?>
                <!-- <ul class="pagination">
                    <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
                    <li ><a href="#" style="background-color:#8ece6a ; border-color:#8ece6a ;color:white ">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                </ul> -->
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
<!-- 스크립트 오류나면서 검색기능 안됨 -> 아래 js 주석처리 -->
<!-- <script src="/public/etc/list//public/etc/list/js/vendors/jquery.countTo.js"></script>  --> 
<script src="/public/etc/list/js/vendors/jquery.isotope.min.js"></script> 
<script src="/public/etc/list/js/vendors/jquery.bxslider.min.js"></script> 
<script src="/public/etc/list/js/vendors/owl.carousel.min.js"></script> 
<script src="/public/etc/list/js/vendors/jquery.sticky.js"></script> 

<!-- SLIDER REVOLUTION 4.x SCRIPTS --> 
<script type="text/javascript" src="/public/etc/list/rs-plugin/js/jquery.themepunch.tools.min.js"></script> 
<script type="text/javascript" src="/public/etc/list/rs-plugin/js/jquery.themepunch.revolution.min.js"></script> 
<!-- 스크립트 오류나면서 검색기능 안됨 -> 아래 js 주석처리 -->
<!-- <script src="/public/etc/list/js/zap.js"></script> -->