<article class="w-100 p-xl-4">
				<div class="row no-gutters main-section-title mb-5" style="margin-bottom: 10px !important;">
					<h4 class="main_sub_title">순위별 골프장</h4>
				</div>
				<div class="d-flex mb-5 category flex-wrap" style="margin-left:10px; margin-bottom: 20px !important">
					<button data-rankingtype="avg_score" class="btn btn-outline-light btn-sm <?=$rankingType==='avg_score' ? 'active' : ''?>">#종합 평가가 높은</button>
					<button data-rankingtype="score_1" class="btn btn-outline-light btn-sm <?=$rankingType==='score_1' ? 'active' : ''?>" >#전략성이 높은</button>
					<button data-rankingtype="score_2" class="btn btn-outline-light btn-sm <?=$rankingType==='score_2' ? 'active' : ''?>" >#페어웨이가 넓은</button>
					<button data-rankingtype="score_3" class="btn btn-outline-light btn-sm <?=$rankingType==='score_3' ? 'active' : ''?>" >#코스 전장이 긴</button>
					<button data-rankingtype="score_4" class="btn btn-outline-light btn-sm <?=$rankingType==='score_4' ? 'active' : ''?>" >#그린의 난이도가 높은</button>
					<button data-rankingtype="score_5" class="btn btn-outline-light btn-sm <?=$rankingType==='score_5' ? 'active' : ''?>" >#가성비가 우수한</button>
					<button data-rankingtype="score_6" class="btn btn-outline-light btn-sm <?=$rankingType==='score_6' ? 'active' : ''?>" >#시설이 좋은</button>
					<button data-rankingtype="score_7" class="btn btn-outline-light btn-sm <?=$rankingType==='score_7' ? 'active' : ''?>" >#식사가 맛있는</button>
					<button data-rankingtype="score_8" class="btn btn-outline-light btn-sm <?=$rankingType==='score_8' ? 'active' : ''?>" >#스탭 서비스가 좋은</button>
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
					<div class="col-12 col-lg-6">
						<!--1위부터 3위까지 아래 div.content-box-->
						<?php
						$count = (count($products_avgScore) > 3) ? 3 : count($products_avgScore);
						 for($i=0 ; $i < $count; $i++){?>
						<div class="col-12 content-box">
							<a href="<?=site_url(shop_product_uri."/get/{$products_avgScore[$i]->id}")?>">
								<div class="d-flex align-items-center p-4 mb-3 content"
								 	style="background-image: url(<?=$products_avgScore[$i]->photos[0]?>)"> <!-- style에서 height:150px 삭제 -->
									<div class='d-flex align-items-center justify-content-center bg-light rounded-circle new_position'>
										<span class="d-flex align-items-center justify-content-center"><?=$i+1?></span>
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
					<div class="col-12 col-lg-6">
						<ul class="list-unstyled">
							<!--4위부터 ~ li반복 -->
							<?php
							$count = (count($products_avgScore) > 10) ? 10 : count($products_avgScore);
						 	for($i=3 ; $i < $count; $i++){?>
							<li class='p-3 text-light list-after-four'>
								<a href="<?=site_url(shop_product_uri."/get/{$products_avgScore[$i]->id}")?>">
									<div class="d-flex justify-content-between align-items-center">
										<div>
											<p class='mb-0'><span class='mr-3 ml-2'><?=$i+1?></span><?=$products_avgScore[$i]->name?></p>
										</div>
										<div class="ranking_ghost">
											<span><?=$products_avgScore[$i]->region?></span>
										</div>
									</div>
								</a>
							</li>
							<?php }?>
						</ul>
						<!--전체 순위 보러 가기 -->
						<div class="row justify-content-center align-items-center">
							<a href="<?=site_url(shop_product_uri."/gets_by_ranking/{$rankingType}")?>" class="d-flex justify-content-center align-items-center" style='text-decoration: none'>
								<p class="mb-0 text-light mr-3">
									전체 순위 보러가기
								</p>
								<span style='width: 30px;height: 30px'
									  class="rounded-circle bg-light d-flex align-items-center justify-content-center"><i
										class="xi xi-angle-right text-dark"></i></span>
							</a>
						</div>
					</div>
				</div>
			</article>



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