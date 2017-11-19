<div id="panel-wrap">
    <article id="panel-article" class="container-fluid">
        <div class="row text-center">
            <div class="col-12">
                    <h1 id='panel-title' class="text-center"><span>순위별</span> 골프장</h1>
            </div>
        </div>
    </article>
    <div id="ajax_target">
<div id="main-wrap">
    <section id="section5" class="mb-5  container-fluid align-items-start align-items-md-center">
        <article class="w-100 p-xl-4" style="width:80% !important; margin: 0 auto;">
            <div class="d-flex mb-5 category flex-wrap">
                <a href="<?=site_url(shop_product_uri."/gets_by_ranking/avg_score")?>"><button  class="btn btn-outline-light btn-sm active" <?=$rankingType==='avg_score' ? 'style="background-color: #79b754 !important; color:#fff;"' : 'style="border: 1px solid #333; color:#333;"'?>>#평점이 높은 코스</button></a>
                <a href="<?=site_url(shop_product_uri."/gets_by_ranking/score_1")?>"><button  class="btn btn-outline-light btn-sm" <?=$rankingType==='score_1' ? 'style="background-color: #79b754 !important; color:#fff;"' : 'style="border: 1px solid #333; color:#333;"'?>>#전략성이 요구되는 코스</button></a>
                <a href="<?=site_url(shop_product_uri."/gets_by_ranking/score_2")?>"><button  class="btn btn-outline-light btn-sm" <?=$rankingType==='score_2' ? 'style="background-color: #79b754 !important; color:#fff;"' : 'style="border: 1px solid #333; color:#333;"'?>>#식사가 맛있는 코스</button></a>
                <a href="<?=site_url(shop_product_uri."/gets_by_ranking/score_3")?>"><button  class="btn btn-outline-light btn-sm" <?=$rankingType==='score_3' ? 'style="background-color: #79b754 !important; color:#fff;"' : 'style="border: 1px solid #333; color:#333;"'?>>#가성비 좋은 코스</button></a>
                <a href="<?=site_url(shop_product_uri."/gets_by_ranking/score_4")?>"><button  class="btn btn-outline-light btn-sm" <?=$rankingType==='score_4' ? 'style="background-color: #79b754 !important; color:#fff;"' : 'style="border: 1px solid #333; color:#333;"'?>>#시설이 화려한 코스</button></a>
                <a href="<?=site_url(shop_product_uri."/gets_by_ranking/score_5")?>"><button  class="btn btn-outline-light btn-sm" <?=$rankingType==='score_5' ? 'style="background-color: #79b754 !important; color:#fff;"' : 'style="border: 1px solid #333; color:#333;"'?>>#시설이 화려한 코스</button></a>
                <a href="<?=site_url(shop_product_uri."/gets_by_ranking/score_6")?>"><button  class="btn btn-outline-light btn-sm" <?=$rankingType==='score_6' ? 'style="background-color: #79b754 !important; color:#fff;"' : 'style="border: 1px solid #333; color:#333;"'?>>#시설이 화려한 코스</button></a>
                <a href="<?=site_url(shop_product_uri."/gets_by_ranking/score_7")?>"><button  class="btn btn-outline-light btn-sm" <?=$rankingType==='score_7' ? 'style="background-color: #79b754 !important; color:#fff;"' : 'style="border: 1px solid #333; color:#333;"'?>>#시설이 화려한 코스</button></a>
                <a href="<?=site_url(shop_product_uri."/gets_by_ranking/score_8")?>"><button  class="btn btn-outline-light btn-sm" <?=$rankingType==='score_8' ? 'style="background-color: #79b754 !important; color:#fff;"' : 'style="border: 1px solid #333; color:#333;"'?>>#시설이 화려한 코스</button></a>
            </div>
                <!-- 추가한 부분 -->
                <style>
                .content-box:first-child a .content{ height:250px}
				.content-box .new_position{ position:absolute; left:40px; margin:0 !important; bottom:30px}
				.content-box .new_position2{ position:absolute; left:95px; margin:0 !important; bottom:25px}
				.content-box .new_position3{ position:absolute; right:40px; margin:0 !important; bottom:30px}
				</style>
                <!-- //추가한 부분 -->
            <div class="row no-gutters">
                <div class="col-12 col-lg-12">
                    <!--1위부터 3위까지 아래 div.content-box-->
						<?php
						$count = (count($products_avgScore) > 3) ? 3 : count($products_avgScore);
						 for($i=0 ; $i < $count; $i++){?>
						<div class="col-12 content-box">
							<a href="<?=site_url(shop_product_uri."/get/{$products_avgScore[$i]->id}")?>">
								<div class="d-flex align-items-center p-4 mb-3 content"
								 	style="background-image: url(<?=$products_avgScore[$i]->photos[0]?>)"> <!-- style에서 height:150px 삭제 -->
									<div class='d-flex align-items-center justify-content-center bg-light rounded-circle new_position'>
										<span class="d-flex align-items-center justify-content-center"><?=$products_avgScore[$i]->numrow2?></span>
									</div>
									<div class="d-flex flex-column ml-4 text-light new_position2">
										<h1><?=$products_avgScore[$i]->name?></h1>
										<p class="mb-0"> <?=$products_avgScore[$i]->eng_name?> - <?=$products_avgScore[$i]->region?></p>
									</div>
                                    <div class="new_position3">
                                        <span><i class="xi-star" style="color:#fcbf3f;"></i></span>
                                        <span style="color:#fff; font-family: 'notokr-demilight', sans-serif; font-size: 18px;"><?php $score = (ceil($products_avgScore[$i]->$rankingType *10))/10; echo (strlen($score) === 1) ? "{$score}.0" : "{$score}"?></span>
                                    </div>
								</div>
							</a>
						</div>
						<?php }?>
                   

                </div>
                <div class="col-12 col-lg-12">
                    <ul class="list-unstyled">
                        <!--4위부터 ~ li반복 -->
                        <?php
							$count = (count($products_avgScore) > 10) ? 10 : count($products_avgScore);
						 	for($i=3 ; $i < $count; $i++){?>
                        <li class='p-3 text-light list-after-four'>
                            <a href="<?=site_url(shop_product_uri."/get/{$products_avgScore[$i]->id}")?>">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <p class='mb-0' style="color:#333;"><span class='mr-3 ml-2'><?=$products_avgScore[$i]->numrow2?></span><?=$products_avgScore[$i]->name?></p>
                                    </div>
                                    <div>
                                    <span><?=$products_avgScore[$i]->nation?>, <?=$products_avgScore[$i]->city?></span>
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


<?= $this->pagination->create_links();?>
</div>
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
<script src="public/sangmin/js/main_section2.js"></script>



</div>