<?php if(is_semantic_dev) {?>
    <link rel="stylesheet/less" type="text/css" href="/public/framework/semantic/src/semantic.less">
<script src="/public/framework/semantic/src/less.min.js"></script>
<?php }else{?>
<link rel="stylesheet" type="text/css" href="/public/framework/semantic/out/semantic.css">
<link rel="stylesheet" type="text/css" href="/public/framework/semantic/out/semantic.js">
<?php }?>

<div id="tp-panel-wrap">
	<article id="tp-panel-article" class="tp-container-fluid">
					 <div class="tp-row tp-text-center">
							 <div class="tp-col-12">
								 
									 <h1 id='tp-panel-title' class="tp-text-center">
							
							
										 <span>골프패스</span> <?=$board->name?></h1>

											
<div class="ui centered grid container">
<div class="row"  style="max-width:700px;">
<div class="ui four item stackable tabs menu">
    <a class="<?=$board->id==="4" ? "active" : ""?> item" href="<?=site_url(content_uri."/gets?board_id=4")?>">공지사항</a>
    <a class="<?=$board->id==="3" ? "active" : ""?> item"  href="<?=site_url(content_uri."/gets?board_id=3")?>">FAQ</a>
    <a class="<?=$board->id==="2" ? "active" : ""?> item"  href="<?=my_site_url(content_uri."/gets?board_id=2&is_user=true")?>">1:1문의</a>
    <a class="item"  href="<?=my_site_url(shop_mypage_uri."/gets_wishlist")?>">마이페이지로</a>
    </div>
</div>
</div>
								 
							 </div>

					 </div>
					
					 <section id='tp-content-boxs' class="tp-ajax_taget_content_list tp-row tp-justify-content-center">
						  <?php for($i=0; $i< count($contents);$i++){?>
							 <div class="tp-content-box tp-col-12 tp-row">
									
							 		<!-- desc에서 이미지태그 src만 추출 -->
									 <?php 
									 $doc = new DOMDocument();
									 $doc->loadHTML($contents[$i]->desc);
									 $xpath = new DOMXPath($doc);
									 $src = $xpath->evaluate("string(//img/@src)"); # "/images/image.jpg"
									?>
									<!-- desc에서 이미지태그 src만 추출 -->
									 <div class="tp-d-none tp-d-md-block tp-col-md-2 tp-d-md-flex tp-align-items-md-start tp-justify-content-end">
											 <img src="<?=$src?>" class="tp-rounded-circle" alt="" style="width:60px; height:60px;">
									 </div>
									 <div class="tp-col-12 tp-col-md-10">
										  <a class="tp-w-100" href="<?=my_site_url(content_uri."/get/{$contents[$i]->id}")?>">
											 <h1><?=$contents[$i]->title?></h1>
											 		</a>
											 <div class="tp-content">
											<?php
											$desc =strip_tags($contents[$i]->desc);
											if(mb_strlen($desc) >= 80)
												echo iconv_substr($desc,0,80,"utf-8")."...";
											else 
												echo $desc;
											?>
											 </div>
											 <p class="tp-date">
													 <?=$contents[$i]->created?><span> | </span>
													 <span class="tp-name"><?=$contents[$i]->name?></span>
											 </p>
									 </div>

							 </div>
							<?php }?>
							 <!-- TODO 문법을 몰라서 그냥둠.. -->
							
								<div class="tp-post_write">
								    <a href="<?=site_url(content_uri."/add?board_id={$board->id}")?>">작성하기</a>
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
