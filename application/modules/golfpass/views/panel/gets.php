<div style="margin-top:120px;"></div>
	<article id="sub-article" class="container-fluid">
		<div class="row text-center">
			<div class="col-12">
			<a href="<?=site_url(golfpass_panel_uri."/gets")?>">
				<h1 id='panel-title' class="text-center">
					<span>골프패스</span> 패널 소개</h1>
			</a>
			</div>
		</div>
		<!-- 패널 리스트 시작 -->
		<section class="row ajax_taget_panel_list" id='panel-section'>
		
			<article id='panel-box' class="row col-12">
            
                <?php for($i=0; $i< count($panels);$i++){?>
				<div class="col-6 col-md-3 panel">
					<div class="d-flex flex-column justify-content-center align-items-center">
					<a href="javascript:void(0);" onclick="getData('.ajax_taget_content_list',0,'<?=site_url(golfpass_panel_uri."/ajax_pgi_contents/")?>',<?=$panels[$i]->id?>)">
						<img src="<?=$panels[$i]->photo?>" class="rounded-circle" alt="" style="width: 140px;">
						<div class="panel-content text-center">
							<p><?=$panels[$i]->name?></p>
							<p class="intro"><?=$panels[$i]->intro?></p>
						</div>
						</a>
					</div>
				</div>
				<?php }?>
              
			</article>

			<div class="col-12 d-flex justify-content-center align-items-center pagination">
			<?php echo $this->ajax_pgi_1->create_links(); ?>
				<!-- <div class="prev"><a href="#"><i class="xi xi-angle-left-min"></i></a></div>
			
				<ul class="d-flex list-unstyled justify-content-center">
					<li class="current"><a href="#">01</a></li>
					<li><a href="#">02</a></li>
					<li><a href="#">03</a></li>
					<li><a href="#">04</a></li>
				</ul>
				<div class="next"><a href="#"><i class="xi xi-angle-right-min"></i></a></div> -->
			</div>
		</section>
		<!-- 패널 리스트 끝 -->
		<!-- 글 리스트 시작 -->
		<section id='content-boxs' class="row justify-content-center ajax_taget_content_list">
         
            <?php for($i=0; $i< count($panel_contents);$i++){?>
			<div class="content-box col-12 row">
				<div class="d-none d-md-block col-md-2 d-md-flex align-items-md-start justify-content-end">
					<img src="<?=$panel_contents[$i]->photo?>" class="rounded-circle" alt="" width="60px;">
				</div>
		
				<div class="col-12 col-md-10">
				<a href="<?=site_url(golfpass_panel_content_uri."/get/{$panel_contents[$i]->id}")?>"><h1><?=$panel_contents[$i]->title?></h1></a>
					<div class="content">
                    <?=$panel_contents[$i]->desc?>
					</div>
					<p class="date">
                    <?=$panel_contents[$i]->created?><span> | </span>
						<span class="name"><?=$panel_contents[$i]->name?></span>
					</p>
				</div>
				
			</div>
            <?php }?>
            <!-- 글 리스트 끝 -->
			
			<div class="col-12 d-flex justify-content-center align-items-center pagination">
			<?php echo $this->ajax_pgi_2->create_links(); ?>
				<!-- <div class="prev"><a href="#"><i class="xi xi-angle-left-min"></i></a></div>
				<ul class="d-flex list-unstyled justify-content-center">
					<li class="current"><a href="#">01</a></li>
					<li><a href="#">02</a></li>
					<li><a href="#">03</a></li>
					<li><a href="#">04</a></li>
				</ul>
				<div class="next"><a href="#"><i class="xi xi-angle-right-min"></i></a></div> -->
			</div>
		</section>
	</article>
