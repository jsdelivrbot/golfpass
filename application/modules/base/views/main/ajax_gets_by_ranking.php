<article class="w-100 p-xl-4">
				<div class="row no-gutters main-section-title mb-5">
					<h4>순위별 골프장</h4>
				</div>
				<div class="d-flex mb-5 category flex-wrap">
					<button data-rankingtype="avg_score" class="btn btn-outline-light btn-sm <?=$rankingType==='avg_score' ? 'active' : ''?>">#평점이 높은 코스</button>
					<button data-rankingtype="score_1" class="btn btn-outline-light btn-sm <?=$rankingType==='score_1' ? 'active' : ''?>" >#전략성이 요구되는 코스</button>
					<button data-rankingtype="score_2" class="btn btn-outline-light btn-sm <?=$rankingType==='score_2' ? 'active' : ''?>" >#전략성이 요구되는 코스</button>
					<button data-rankingtype="score_3" class="btn btn-outline-light btn-sm <?=$rankingType==='score_3' ? 'active' : ''?>" >#전략성이 요구되는 코스</button>
					<button data-rankingtype="score_4" class="btn btn-outline-light btn-sm <?=$rankingType==='score_4' ? 'active' : ''?>" >#전략성이 요구되는 코스</button>
					<button data-rankingtype="score_5" class="btn btn-outline-light btn-sm <?=$rankingType==='score_5' ? 'active' : ''?>" >#전략성이 요구되는 코스</button>
					<button data-rankingtype="score_6" class="btn btn-outline-light btn-sm <?=$rankingType==='score_6' ? 'active' : ''?>" >#전략성이 요구되는 코스</button>
					<button data-rankingtype="score_7" class="btn btn-outline-light btn-sm <?=$rankingType==='score_7' ? 'active' : ''?>" >#전략성이 요구되는 코스</button>
					<button data-rankingtype="score_8" class="btn btn-outline-light btn-sm <?=$rankingType==='score_8' ? 'active' : ''?>" >#전략성이 요구되는 코스</button>
				</div>
				<div class="row no-gutters">
					<div class="col-12 col-lg-6">
						<!--1위부터 3위까지 아래 div.content-box-->
						<?php for($i=0 ; $i < 3; $i++){?>
						<div class="col-12 content-box">
							<a href="http://golfpass.net/index.php/shop/product/get/3">
								<div class="d-flex align-items-center p-4 mb-3 content"
								 	style="height: 150px; background-image: url(/image/rank_001.png)">
									<div class='d-flex align-items-center justify-content-center bg-light rounded-circle'>
										<span class="d-flex align-items-center justify-content-center">1</span>
									</div>
									<div class="d-flex flex-column ml-4 text-light">
										<h1><?=$products[$i]->name?></h1>
										<p class="mb-0">Nijo Country Club - 일본, 후쿠오카</p>
									</div>
								</div>
							</a>
						</div>
						<?php }?>

					</div>
					<div class="col-12 col-lg-6">
						<ul class="list-unstyled">
							<!--4위부터 ~ li반복 -->
							<li class='p-3 text-light list-after-four'>
								<a href="http://golfpass.net/index.php/shop/product/get/6">
									<div class="d-flex justify-content-between align-items-center">
										<div>
											<p class='mb-0'><span class='mr-3 ml-2'>4</span> 후쿠오카 페잔트 컨트리 클럽</p>
										</div>
										<div>
											<span>일본, 후쿠오카</span>
										</div>
									</div>
								</a>
							</li>
							<li class='p-3 text-light list-after-four'>
								<a href="http://golfpass.net/index.php/shop/product/get/7">
									<div class="d-flex justify-content-between align-items-center">
										<div>
											<p class='mb-0'><span class='mr-3 ml-2'>5</span> 하우스텐보스 컨트리 클럽</p>
										</div>
										<div>
											<span>일본, 나가시키</span>
										</div>
									</div>
								</a>
							</li>
							<li class='p-3 text-light list-after-four'>
								<a href="http://golfpass.net/index.php/shop/product/get/8">
									<div class="d-flex justify-content-between align-items-center">
										<div>
											<p class='mb-0'><span class='mr-3 ml-2'>6</span> 나가사키 파크 컨트리 클럽</p>
										</div>
										<div>
											<span>일본, 나가시키</span>
										</div>
									</div>
								</a>
							</li>
							<li class='p-3 text-light list-after-four'>
								<a href="http://golfpass.net/index.php/shop/product/get/9">
									<div class="d-flex justify-content-between align-items-center">
										<div>
											<p class='mb-0'><span class='mr-3 ml-2'>7</span> 사세보코쿠사이 컨트리 클럽</p>
										</div>
										<div>
											<span>일본, 나가시키</span>
										</div>
									</div>
								</a>
							</li>
							<li class='p-3 text-light list-after-four'>
								<a href="http://golfpass.net/index.php/shop/product/get/10">
									<div class="d-flex justify-content-between align-items-center">
										<div>
											<p class='mb-0'><span class='mr-3 ml-2'>8</span> 아마가세 온센 컨트리 클럽</p>
										</div>
										<div>
											<span>일본, 오이타</span>
										</div>
									</div>
								</a>
							</li>
							<li class='p-3 text-light list-after-four'>
								<a href="http://golfpass.net/index.php/shop/product/get/11">
									<div class="d-flex justify-content-between align-items-center">
										<div>
											<p class='mb-0'><span class='mr-3 ml-2'>9</span> 벳부노모리 골프 클럽</p>
										</div>
										<div>
											<span>일본, 오이타</span>
										</div>
									</div>
								</a>
							</li>
							<li class='p-3 text-light list-after-four'>
								<a href="http://golfpass.net/index.php/shop/product/get/12">
									<div class="d-flex justify-content-between align-items-center">
										<div>
											<p class='mb-0'><span class='mr-3 ml-2'>10</span> 키쿠치 컨트리 클럽</p>
										</div>
										<div>
											<span>일본, 쿠마모토</span>
										</div>
									</div>
								</a>
							</li>
						</ul>
						<!--전체 순위 보러 가기 -->
						<div class="row justify-content-center align-items-center">
							<a href="#" class="d-flex justify-content-center align-items-center" style='text-decoration: none'>
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