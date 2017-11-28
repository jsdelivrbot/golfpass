<div style="margin-top: -180px;">
        </div>
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
           
        <section class="blog style-2 padding-bottom-80">
            <div class="container">
                <div class="heading-block style-3 text-center margin-top-100 margin-bottom-50">
                    <h3 style="font-family: 'notokr-regular', sans-serif; font-weight: normal;">
                    "<?=$search?>" 검색결과(<?=$num_total?>)        
                </h3>
                    <hr class="color">
                </div>

                <ul class="tabs portfolio-filter text-center margin-bottom-80">
                    <li class="tab-title filter-item">
                    <a href="<?=site_url(shop_product_uri."/gets_by_hash/{$search}")?>" data-filter=".pf-branding-design" class="" style="font-family: 'notokr-regular', sans-serif; font-size: 12px; font-weight: normal;">
                                    상품리스트<?="({$num_products})"?>
                    </a>
                </li>
                    <li class="tab-title filter-item">
                    <a href="<?=site_url(golfpass_panel_content_uri."/gets_by_hash/{$search}?search={$search}")?>" data-filter=".pf-branding-design" class="active" style="font-family: 'notokr-regular', sans-serif; font-size: 12px; font-weight: normal;">
                            패널글 리스트<?="({$num_panel_contents})"?>
                    </a>
                </li>
                </ul>
                <?php ?>                
                  


                    <!-- 패널글 리스트 시작 -->
                    

                    <div id="tp-panel-wrap" style="margin-top:-80px;"> 
                    <article id="tp-panel-article" class="tp-container-fluid">
                    <!-- <div class="tp-row tp-text-center">
                        <div class="tp-col-12">
                        <h1 id='tp-panel-title' class="tp-text-center"> 
                            <span>골프패스
                            </span> 패널 소개
                        </h1>
                        </div>
                    </div>  -->
                    
                    <section id='tp-content-boxs' class="tp-ajax_taget_content_list tp-row tp-justify-content-center"> 
                        <?php for($i=0; $i< count($panel_contents);$i++){?>
                        <div class="tp-content-box tp-col-12 tp-row"> 
                        <?php $doc = new DOMDocument(); $doc->loadHTML($panel_contents[$i]->desc); $xpath = new DOMXPath($doc); $src = $xpath->evaluate("string(//img/@src)"); # "/images/image.jpg" ?>
                        <div class="tp-d-none tp-d-md-block tp-col-md-2 tp-d-md-flex tp-align-items-md-start tp-justify-content-end"> 
                            <img src="<?=$src?>" class="tp-rounded-circle" alt="" style="width:120px; height:67px; border-radius:0 !important;">
                        </div>
                        <div class="tp-col-12 tp-col-md-10"> 
                            <a class="tp-w-100" href="<?=my_site_url(golfpass_panel_content_uri."/get/{$panel_contents[$i]->id}")?>">
                            <h1>
                                <?=$panel_contents[$i]->title?>
                            </h1> 
                            </a>
                            <div class="tp-content"> 
                            <?php $desc =strip_tags($panel_contents[$i]->desc); if(mb_strlen($desc) >= 80) echo iconv_substr($desc,0,80,"utf-8")."..."; else echo $desc; ?>
                            </div>
                            <p class="tp-date"> 
                            <?=$panel_contents[$i]->created?>
                            <span> | 
                            </span> 
                            <span class="tp-name">
                                <?=$panel_contents[$i]->name?>
                            </span>
                            </p>
                        </div>
                        </div> 
                        <?php }?>
                        <div class="tp-col-12 tp-d-flex tp-justify-content-center tp-align-items-center tp-pagination" style="padding:0;"> 
                        <?=$this->pagination->create_links();?>
                        </div>
                        <!-- <div class="tp-post_write"> 
                        <a href="<?=site_url(content_uri."/add?board_id=1")?>">작성하기
                        </a>
                        </div>  -->
                    </section> 
                    </article>
                </div>
                <!-- 패널글 리스트 끝 -->

              
              
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