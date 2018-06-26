<section id="rank_ajax" style="display: block;margin-top:70px; margin-bottom: 70px;">
	<!--section3.scss 사용-->
	<article class="content_article">


		<div class="content_title">
			<div class="main-section-title">
				<h4 class="main_sub_title">순위별 골프장</h4>
			</div>
			<div class="buttons">
				<button data-rankingtype="avg_score" class="button_category <?=$rankingType==='avg_score' ? 'button_focus' : ''?>">#종합 평가가 높은</button>
				<button data-rankingtype="score_1" class="button_category <?=$rankingType==='score_1' ? 'button_focus' : ''?>">#가성비가 우수한</button>
				<button data-rankingtype="score_2" class="button_category <?=$rankingType==='score_2' ? 'button_focus' : ''?>">#시설이 좋은</button>
				<button data-rankingtype="score_3" class="button_category <?=$rankingType==='score_3' ? 'button_focus' : ''?>">#식사가 맛있는</button>
				<button data-rankingtype="score_4" class="button_category <?=$rankingType==='score_4' ? 'button_focus' : ''?>">#전략성이 높은</button>
			</div>
		</div>



		<div class="all_content">
			<div class="all_content_form">


				<div class="content_left">
					<!--1위부터 3위까지 아래 div.content-box-->
					<?php
					$count = (count($products_avgScore) > 3) ? 3 : count($products_avgScore);
					for ( $i = 0; $i < $count; $i++ ) {
						?>

						<div class="content-box">
							<a href="<?= site_url(shop_product_uri . "/get/{$products_avgScore[$i]->id}") ?>">
								<div class="content content-height1" style="background-image: url('<?= $thema_list[$i]->photo ?>')">
									<div class='new_position'>
										<span><?= $i + 1 ?></span>
									</div>
									<div class="new_position2">
										<h1><?= $products_avgScore[$i]->name ?></h1>
										<p><?= $products_avgScore[$i]->eng_name ?> - <?= $products_avgScore[$i]->region ?></p>
									</div>
									<div class="new_position3">
										<span><i class="xi-star" style="color:#fcbf3f;"></i></span>
										<span style="color:#fff; font-size: 18px;"><?php $score = (round($products_avgScore[$i]->$rankingType * 10)) / 10;
											echo (strlen($score) === 1) ? "{$score}.0" : "{$score}" ?></span>
									</div>
								</div>
							</a>
						</div>
					<?php } ?>


				</div>


				<div class="content_right">
					<ul class="content_rank_list">
						<!--4~10위-->
						<?php
						$count = (count($products_avgScore) > 10) ? 10 : count($products_avgScore);
						for ( $i = 3; $i < $count; $i++ ) {
							?>
							<li class='content_rank_list_text'>
								<a href="<?= site_url(shop_product_uri . "/get/{$products_avgScore[$i]->id}") ?>">
									<div class="list_text_align">
										<div class="rank_text_bold">
											<p><span class='rank_num'><?= $i + 1 ?></span><?= $products_avgScore[$i]->name ?></p>
										</div>
										<div class="ranking_ghost">
											<span><?= $products_avgScore[$i]->region ?></span>
										</div>
									</div>
								</a>
							</li>
						<?php } ?>

					</ul>
					<!--전체 순위 보러 가기 -->
					<div class="all_rank_align">
						<a href="<?= site_url(shop_product_uri . "/gets_by_ranking/avg_score") ?>" class="all_rank_atag">
							<p class="all_rank_text">
								전체 순위 보러가기
							</p>
							<span style='width: 30px;height: 30px' class="circle_button">
                                    <i class="xi-angle-right text-dark"></i>
                                </span>
						</a>
					</div>
				</div>


			</div>
		</div>



	</article>
</section>
<script>

	$('.button_category').click(function () {
		var rankingType = $(this).data('rankingtype');

		$.ajax({
			method: "POST",
			url: "<?=site_url(main_uri . '/ajax_gets_by_ranking')?>",
			data: {rankingType: rankingType},
			beforeSend: function () {
			},
			success: function (data) {
				$("#rank_ajax").html(data);
			}
		});

	});

	$('.content-height2').hover(
		function() {
			$('.content-height1').addClass('hover_content');
		},
		function() {
			$('.content-height1').removeClass('hover_content');
		}
	);
	$('.content-height3').hover(
		function() {
			$('.content-height1').addClass('hover_content');
		},
		function() {
			$('.content-height1').removeClass('hover_content');
		}
	);
</script>
