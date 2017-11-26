
<div style="margin-top: -100px;"></div>
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

<!-- Testimonial Style 4 -->
  <section class="testimonial style-4 padding-bottom-80 padding-top-80">
        <div class="container">
          <div class="testi"> 
            <!-- Testi Slides With Image -->
            <ul class="testi-slide-2">
              
              <!-- Slides -->
              <li> 
                <!-- Avatar -->
                <div class="avatar"><img class="img-circle img-responsive" src="<?=$content->profilePhoto?>" alt=" "></div>

                <div style="margin-top:-30px; margin-bottom:20px;"><?=$content->user_name?></div>
                <div class="text-in">
                  <h6>
                  <?=$content->intro?>
                    </h6>
              </li>
              
            
            </ul>
          </div>
        </div>
      </section>
   <!-- Testimonial Style 5 -->
   <section class=" style-5 padding-bottom-80" style="margin-top:-50px;">
        <div class="container">
          <div class="testi"> 
            <!-- Testi Slides With Image -->
            <ul class="testi-slide-2" >
              
              <!-- Slides -->
              <li>
               <div style=" text-align: center;">
                <h2 ><?=$content->title?></h2>
                
                <span class="font-crimson"> <em><?=$content->created?></em></span>
                </div>
                <div style="margin-top:50px;"></div>
                <p>
                <?php 
                 $doc = new DOMDocument();
                 $doc->loadHTML($content->desc);
                 $imgs = $doc->getElementsByTagName('img');
                 foreach ($imgs as $img) {
                    $img->setAttribute('class', 'someclass');
                 }
                 $article_header = $doc->saveXml();
                ?>
                <?=$content->desc?>
                
                </p>
            </li>
            
        </ul>
    </div>
</div>
</section>
      <!-- <section class="welcome padding-top-80"> -->

      <?php if($content->user_id === $user->id){?>
      <div class="container">
        <div class="row"> 


      <div class="col-md-4">
      <a style="background-color:#79b754"class="btn btn-default" href="<?=site_url(content_uri."/update/{$content->id}?board_id=1")?>">수정</a>
      <a style="background-color:#79b754" class="btn btn-default" onclick="confirm_redirect('<?=site_url(content_uri."/delete/{$content->id}?board_id=1")?>','정말 삭제하시겠습니까? 복구 할 방법이 없습니다.')" href="#">삭제</a>
        </div>
    </div>
    </div>
      <?php }?>
    <!-- </section> -->
     
         
      
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