

<div id="tp-panel-wrap"> 
<article id="tp-panel-article" class="tp-container-fluid">
  <!-- <div class="tp-row tp-text-center">
	<div class="tp-col-12">
	  <h1 id='tp-panel-title' class="tp-text-center"> 
		<span>골프패스
		</span> 패널 소개
	  </h1>
	</div>
  </div> 
  <section class="tp-row tp-ajax_taget_panel_list" id='tp-panel-section'> 
	<article id='tp-panel-box' class="tp-row tp-col-12"> 
	  <?php for($i=0; $i< count($panels);$i++){?>
	  <div class="tp-col-6 tp-col-md-3 tp-panel">
		<div class="tp-d-flex tp-flex-column tp-justify-content-center tp-align-items-center"> 
		  <a href="javascript:void(0);" onclick="getData('.tp-ajax_taget_content_list',0,'<?=site_url(golfpass_panel_uri."/ajax_pgi_contents/")?>',<?=$panels[$i]->id?>)"> 
			<img src="<?=$panels[$i]->profilePhoto?>" class="tp-rounded-circle" alt="" style="width: 120px; height:120px; margin-left: 10px;">
			<div class="tp-panel-content tp-text-center">
			  <p>
				<?=$panels[$i]->nickName?>
			  </p>
			  <p class="tp-intro">
				<?=$panels[$i]->intro?>
			  </p>
			</div> 
		  </a>
		</div>
	  </div> 
	  <?php }?> 
	</article>
	<div class="tp-col-12 tp-d-flex tp-justify-content-center tp-align-items-center tp-pagination" style="padding:0;"> 
	  <?php echo $this->ajax_pgi_1->create_links(); ?>
	</div> 
  </section> -->
  <section id='tp-content-boxs' class="tp-ajax_taget_content_list tp-row tp-justify-content-center"> 
	<?php for($i=0; $i< count($panel_contents);$i++){?>
	<div class="tp-content-box tp-col-12 tp-row"> 
	  <?php $doc = new DOMDocument(); $doc->loadHTML($panel_contents[$i]->desc); $xpath = new DOMXPath($doc); $src = $xpath->evaluate("string(//img/@src)"); # "/images/image.jpg" ?>
	  <div class="tp-d-none tp-d-md-block tp-col-md-2 tp-d-md-flex tp-align-items-md-start tp-justify-content-end"> 
		<img src="<?=$src?>" class="tp-rounded-circle" alt="" style="width:120px; height:67px; border-radius:0 !important;">
	  </div>
	  <div class="tp-col-12 tp-col-md-10"> 
		<a class="tp-w-100" href="<?=site_url(golfpass_panel_content_uri."/get/{$panel_contents[$i]->id}")?>">
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
			<?=$panel_contents[$i]->nickName?>
		  </span>
		</p>
	  </div>
	</div> 
	<?php }?>
	<div class="tp-col-12 tp-d-flex tp-justify-content-center tp-align-items-center tp-pagination" style="padding:0;"> 
	  <?php echo $this->ajax_pgi_2->create_links(); ?>
	</div>
	<div class="tp-post_write"> 
	  <a href="<?=site_url(content_uri."/add?board_id=1")?>">작성하기
	  </a>
	</div> 
  </section> 
</article>
