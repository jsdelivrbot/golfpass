<div id="panel-wrap">
	<article id="panel-article" class="container-fluid">
					 <div class="row text-center">
							 <div class="col-12">
								 
									 <h1 id='panel-title' class="text-center">
										 <span>골프패스</span> 패널 소개</h1>
								 
							 </div>
					 </div>
					 <section class="row ajax_taget_panel_list" id='panel-section'>
							 <article id='panel-box' class="row col-12">
								  <?php for($i=0; $i< count($panels);$i++){?>
									 	<div class="col-6 col-md-3 panel">
											 	<div class="d-flex flex-column justify-content-center align-items-center">
												 <a href="javascript:void(0);" onclick="getData('.ajax_taget_content_list',0,'<?=site_url(golfpass_panel_uri."/ajax_pgi_contents/")?>',<?=$panels[$i]->id?>)">
														 <img src="<?=$panels[$i]->profilePhoto?>" class="rounded-circle" alt="" style="width: 120px; height:120px; margin-left: 10px;">
													 	<div class="panel-content text-center">
															<p><?=$panels[$i]->name?></p>
														 <p class="intro"><?=$panels[$i]->intro?></p>
													 	</div>
												</a>
											 	</div>
									 	</div>
							 		<?php }?>
							 </article>
							 <!-- TODO 문법을 몰라서 그냥둠.. -->
							 <div class="col-12 d-flex justify-content-center align-items-center pagination" style="padding:0;">
							 <?php echo $this->ajax_pgi_1->create_links(); ?>
							 </div>

							 <!-- 페이지네이션 샘플 -->
							 <!-- <div class="col-12 d-flex justify-content-center align-items-center pagination">
									 <div class="prev"><a href="#"><i class="xi xi-angle-left-min"></i></a></div>
									 <ul class="d-flex list-unstyled justify-content-center mb-0">
											 <li class="current"><a href="#">01</a></li>
											 <li><a href="#">02</a></li>
											 <li><a href="#">03</a></li>
											 <li><a href="#">04</a></li>
									 </ul>
									 <div class="next"><a href="#"><i class="xi xi-angle-right-min"></i></a></div>
							 </div> -->
							 <!-- 페이지네이션 샘플 -->
					 </section>
				
					 <section id='content-boxs' class="ajax_taget_content_list row justify-content-center">
						  <?php for($i=0; $i< count($panel_contents);$i++){?>
							 <div class="content-box col-12 row">
									
							 		<!-- desc에서 이미지태그 src만 추출 -->
									 <?php 
									 $doc = new DOMDocument();
									 $doc->loadHTML($panel_contents[$i]->desc);
									 $xpath = new DOMXPath($doc);
									 $src = $xpath->evaluate("string(//img/@src)"); # "/images/image.jpg"
									?>
									<!-- desc에서 이미지태그 src만 추출 -->
									 <div class="d-none d-md-block col-md-2 d-md-flex align-items-md-start justify-content-end">
											 <img src="<?=$src?>" class="rounded-circle" alt="" style="width:60px; height:60px;">
									 </div>
									 <div class="col-12 col-md-10">
										  <a class="w-100" href="<?=site_url(golfpass_panel_content_uri."/get/{$panel_contents[$i]->id}")?>">
											 <h1><?=$panel_contents[$i]->title?></h1>
											 		</a>
											 <div class="content">
											<?php
											$desc =strip_tags($panel_contents[$i]->desc);
											if(mb_strlen($desc) >= 80)
												echo iconv_substr($desc,0,80,"utf-8")."...";
											else 
												echo $desc;
											?>
											 </div>
											 <p class="date">
													 <?=$panel_contents[$i]->created?><span> | </span>
													 <span class="name"><?=$panel_contents[$i]->name?></span>
											 </p>
									 </div>

							 </div>
							<?php }?>
							 <!-- TODO 문법을 몰라서 그냥둠.. -->
								<div class="col-12 d-flex justify-content-center align-items-center pagination" style="padding:0;">
							    	<?php echo $this->ajax_pgi_2->create_links(); ?>
								</div>
								<div class="post_write">
								    <a href="<?=site_url(content_uri."/add?board_id=1")?>">작성하기</a>
								</div>
								<!-- 페이지네이션 샘플 -->
							 <!-- <div class="col-12 d-flex justify-content-center align-items-center pagination">
									 <div class="prev">
									 	<a href="#"><i class="xi xi-angle-left-min"></i></a>
									 </div>
									 <ul class="d-flex list-unstyled justify-content-center mb-0">
											 <li class="current"><a href="#">01</a></li>
											 <li><a href="#">02</a></li>
											 <li><a href="#">03</a></li>
											 <li><a href="#">04</a></li>
									 </ul>
									 <div class="next">
									 <a href="#"><i class="xi xi-angle-right-min"></i></a>
									 </div>
							 </div> -->
							<!-- 페이지네이션 샘플 -->
					 </section>
			 </article>

	<!-- 변경 작업완료-->
