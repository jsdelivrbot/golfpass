<div id="tp-panel-wrap"> 
<article id="tp-panel-article" class="tp-container-fluid">
  <div class="tp-row tp-text-center">
    <div class="tp-col-12">
      <h1 id='tp-panel-title' class="tp-text-center">
        <span>순위별
        </span> 골프장
      </h1>
    </div>
  </div> 
</article>
<div id="tp-ajax_target">
  <div id="tp-main-wrap"> 
    <section id="tp-section5" class="tp-mb-5 tp-container-fluid tp-align-items-start tp-align-items-md-center"> 
      <article class="tp-w-100 tp-p-xl-4" style="width:80% !important; margin: 0 auto;">
        <div class="tp-d-flex tp-mb-5 tp-category tp-flex-wrap"> 
          <a href="<?=site_url(shop_product_uri."/gets_by_ranking/avg_score")?>">
            <button class="tp-btn tp-btn-outline-light tp-btn-sm tp-active" 
                    <?=$rankingType==='avg_score' ? 'style="background-color: #79b754 !important; color:#fff;"' : 'style="border: 1px solid #333; color:#333;"'?>>#평점이 높은 코스
            </button>
          </a> 
        <a href="<?=site_url(shop_product_uri."/gets_by_ranking/score_1")?>">
          <button class="tp-btn tp-btn-outline-light tp-btn-sm" 
                  <?=$rankingType==='score_1' ? 'style="background-color: #79b754 !important; color:#fff;"' : 'style="border: 1px solid #333; color:#333;"'?>>#가성비가 우수한
          </button>
        </a> 
      <a href="<?=site_url(shop_product_uri."/gets_by_ranking/score_2")?>">
        <button class="tp-btn tp-btn-outline-light tp-btn-sm" 
                <?=$rankingType==='score_2' ? 'style="background-color: #79b754 !important; color:#fff;"' : 'style="border: 1px solid #333; color:#333;"'?>>#시설이 좋은
        </button>
      </a> 
    <a href="<?=site_url(shop_product_uri."/gets_by_ranking/score_3")?>">
      <button class="tp-btn tp-btn-outline-light tp-btn-sm" 
              <?=$rankingType==='score_3' ? 'style="background-color: #79b754 !important; color:#fff;"' : 'style="border: 1px solid #333; color:#333;"'?>>#식사가 맛있는
      </button>
    </a> 
  <a href="<?=site_url(shop_product_uri."/gets_by_ranking/score_4")?>">
    <button class="tp-btn tp-btn-outline-light tp-btn-sm" 
            <?=$rankingType==='score_4' ? 'style="background-color: #79b754 !important; color:#fff;"' : 'style="border: 1px solid #333; color:#333;"'?>>#전략성이 높은
    </button>
  </a> 
<a href="<?=site_url(shop_product_uri."/gets_by_ranking/score_5")?>">
  <button class="tp-btn tp-btn-outline-light tp-btn-sm" 
          <?=$rankingType==='score_5' ? 'style="background-color: #79b754 !important; color:#fff;"' : 'style="border: 1px solid #333; color:#333;"'?>>#페어웨이가 넓은
  </button>
</a> 
<a href="<?=site_url(shop_product_uri."/gets_by_ranking/score_6")?>">
<button class="tp-btn tp-btn-outline-light tp-btn-sm" 
        <?=$rankingType==='score_6' ? 'style="background-color: #79b754 !important; color:#fff;"' : 'style="border: 1px solid #333; color:#333;"'?>>#그린의 난이도가 높은
</button>
</a> 
<a href="<?=site_url(shop_product_uri."/gets_by_ranking/score_7")?>">
<button class="tp-btn tp-btn-outline-light tp-btn-sm" 
        <?=$rankingType==='score_7' ? 'style="background-color: #79b754 !important; color:#fff;"' : 'style="border: 1px solid #333; color:#333;"'?>>#코스 전장이 긴
</button>
</a> 
<a href="<?=site_url(shop_product_uri."/gets_by_ranking/score_8")?>">
<button class="tp-btn tp-btn-outline-light tp-btn-sm" 
        <?=$rankingType==='score_8' ? 'style="background-color: #79b754 !important; color:#fff;"' : 'style="border: 1px solid #333; color:#333;"'?>>#코스 상태가 좋은
</button>
</a>
</div> 
<!-- 추가한부분 -->
<style>
#tp-bg-div{ background-image:url(<?=$product_main[0]->photo?>) !important}
.tp-content-box{ position:relative}
.tp-content-box:first-child a .tp-content{ height:250px}
.tp-content-box a .tp-content{ height: 100px; transition:0.8s; background-repeat:no-repeat; background-position:center; background-size:cover}
.tp-content-box a:hover .tp-content{height:250px !important}
.tp-content-box .tp-new_position{ position:absolute; left:40px; margin:0 !important; bottom:30px}
.tp-content-box .tp-new_position2{ position:absolute; left:95px; margin:0 !important; bottom:25px}
.tp-content-box .tp-new_position3{ position:absolute; right:40px; margin:0 !important; bottom:30px}
.tp-blank_img{ max-width:438px; width:100%}
@media (max-width:767px){.tp-blank_img{ max-width:100%;}}
@media (max-width:450px){
#tp-main-wrap #tp-section5 .tp-content-box .tp-content h1{ font-size:24px}
.tp-content-box .tp-new_position{left:30px;}
.tp-content-box .tp-new_position2{left:80px;}
}
</style>
<style>.tp-content-box:first-child a .tp-content{
height:250px}
.tp-content-box .tp-new_position{
  position:absolute;
  left:40px;
  margin:0 !important;
  bottom:30px}
.tp-content-box .tp-new_position2{
  position:absolute;
  left:95px;
  margin:0 !important;
  bottom:25px}
.tp-content-box .tp-new_position3{
  position:absolute;
  right:40px;
  margin:0 !important;
  bottom:30px}
</style>
<!-- 추가한부분 -->
<div class="tp-row tp-no-gutters">
<div class="tp-col-12 tp-col-lg-12"> 
  <?php $count = (count($products_avgScore) > 3) ? 3 : count($products_avgScore); for($i=0 ; $i < $count; $i++){?>
    <!--offset이 10미만일떄 1~3위 강조  -->
    <?php if($this->input->get("offset")<10){?>
  <div class="tp-col-12 tp-content-box"> 
    <a href="<?=site_url(shop_product_uri."/get/{$products_avgScore[$i]->id}")?>">
      <div class="tp-d-flex tp-align-items-center tp-p-4 tp-mb-3 tp-content" style="background-image: url(<?=$products_avgScore[$i]->photos[0]?>)">
        <div class='tp-d-flex tp-align-items-center tp-justify-content-center tp-bg-light tp-rounded-circle tp-new_position'> 
          <span class="tp-d-flex tp-align-items-center tp-justify-content-center">
            <?=$products_avgScore[$i]->numrow2?>
          </span> 
        </div>
        <div class="tp-d-flex tp-flex-column tp-ml-4 tp-text-light tp-new_position2">
          <h1>
            <?=$products_avgScore[$i]->name?>
          </h1>
          <p class="tp-mb-0"> 
            <?=$products_avgScore[$i]->eng_name?> - 
            <?=$products_avgScore[$i]->region?>
          </p>
        </div>
        <div class="tp-new_position3"> 
          <span>
            <i class="xi-star" style="color:#fcbf3f;">
            </i>
          </span> 
          <span style="color:#fff; font-family: 'notokr-demilight', sans-serif; font-size: 18px;">
            <?php $score = (round($products_avgScore[$i]->$rankingType *10))/10; echo (strlen($score) === 1) ? "{$score}.0" : "{$score}"?>
          </span>
        </div>
      </div> 
    </a>
  </div> 
   <!--offset이 10미만일떄 1~3위 강조  -->
    <?php }else{?>
       <!--offset이 10이상일때  -->
        <ul class="tp-list-unstyled"style="margin-bottom:0px;"> 
      <li class='tp-p-3 tp-text-light tp-list-after-four' style="border-bottom:1px solid #818589;z`"> 
        <a href="<?=site_url(shop_product_uri."/get/{$products_avgScore[$i]->id}")?>">
          <div class="tp-d-flex tp-justify-content-between tp-align-items-center">
            <div>
              <p class='tp-mb-0' style="color:#333;">
                <span class='tp-mr-3 tp-ml-2'>
                  <?=$products_avgScore[$i]->numrow2?>
                </span>
                <?=$products_avgScore[$i]->name?>
              </p>
            </div>
            <div> 
              <span>
                <?=$products_avgScore[$i]->region?>
              </span>
            </div>
          </div> 
        </a>
      </li> 
      <?php }?>
      </ul>
    <!--offset이 10이상일때  -->
  <?php }?>
</div>
<div class="tp-col-12 tp-col-lg-12">
  <ul class="tp-list-unstyled"> 
    <?php $count = (count($products_avgScore) > 10) ? 10 : count($products_avgScore); for($i=3 ; $i < $count; $i++){?>
    <li class='tp-p-3 tp-text-light tp-list-after-four'> 
      <a href="<?=site_url(shop_product_uri."/get/{$products_avgScore[$i]->id}")?>">
        <div class="tp-d-flex tp-justify-content-between tp-align-items-center">
          <div>
            <p class='tp-mb-0' style="color:#333;">
              <span class='tp-mr-3 tp-ml-2'>
                <?=$products_avgScore[$i]->numrow2?>
              </span>
              <?=$products_avgScore[$i]->name?>
            </p>
          </div>
          <div> 
            <span>
              <?=$products_avgScore[$i]->region?>
            </span>
          </div>
        </div> 
      </a>
    </li> 
    <?php }?>
  </ul>
</div>
</div> 
</article> 
</section>
</div>
<!-- 페이지네이션 -->
<?= $this->pagination->create_links();?>
<!-- <article id="tp-panel-article" class="tp-container-fluid"><section id="tp-content-boxs" class="tp-ajax_taget_content_list tp-row tp-justify-content-center"><div class="tp-col-12 tp-d-flex tp-justify-content-center tp-align-items-center tp-pagination" style="padding:0;">
  <ul class="tp-d-flex tp-list-unstyled tp-justify-content-center tp-mb-0">
           <li class="tp-current"><a>01</a></li>
           <li><a href="javascript:void(0);"> 02 </a></li>
           <li><a href="javascript:void(0);"> 03 </a></li>
        </ul>
        <div class="next"><a href="javascript:void(0);">
            <i class="xi xi-angle-right-min"></i> </a>
        </div>
        
    </div></section></article>
</div>  -->

<!-- 페이지네이션 -->

<!-- 추가한 부분 -->
<script>
$(function(){
	$(".tp-content-box:nth-child(2) a .tp-content, .tp-content-box:nth-child(3) a .tp-content").hover(
		function() {

			$(".tp-content-box:first-child a .tp-content").css("height","100px");
		}, 
		function() {

			$(".tp-content-box:first-child a .tp-content").css("height","250px");	
		}
	);
});
</script>
<!-- // 추가한 부분 -->

<!-- <script src="/public/sangmin/js/jquery-3.2.1.min.js">
</script>  -->
<!-- <script>$('#jssor_1').width($('#section2').width()).children('div').width($('#section2').width());
$(window).resize(function(){
  $('#jssor_1').width($('#section2').width()).children('div').width($('#section2').width());
}
                );
</script>  -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" 		integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" 		crossorigin="anonymous">
</script> 
<script src="/public/sangmin/dist/bootstrap/bootstrap.bundle.min.js">
</script> 
<script src="/public/sangmin/js/jssor.slider-26.5.0.min.js">
</script> 
<script src="/public/sangmin/js/custom/main.js">
</script> 
<script src="/public/sangmin/js/custom/navAction.js">
</script> 
<script src="/public/sangmin/js/main_section2.js">
</script>  -->
</div>
