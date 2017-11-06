<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>골프패스</title>
	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="/public/sangmin/dist/bootstrap/bootstrap.min.css">
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/xeicon@2.3.3/xeicon.min.css">
	<link rel="stylesheet" href="/public/sangmin/css/main.css">
	<link rel="stylesheet" href="/public/sangmin/css/eric-meyer-reset.min.css">
	<link rel="stylesheet" href="/public/sangmin/dist/Nwagon/Nwagon.css" type="text/css">
</head>

<body>
	<header id="header" class="container-fluid panel-header">
		<!--NOTE mobile nav-->
		<nav id='sm-nav' class="row no-gutters justify-content align-items-stretch d-sm-none panel-nav">
			<div id="logo" class='col-3 justify-content-center d-flex align-self-center align-items-center'>
				<img src="/public/sangmin/img/icon/logo_mobile.png" class="d-md-none" alt="">
			</div>
			<div id='nav-icon-box' class="offset-2 col-5 d-flex align-items-stretch justify-content-end">
				<div id="search" class="d-flex align-items-center">
					<span><i class="xi xi-search"></i></span>
				</div>
				<div id="login" class="d-flex align-items-center">
					<span><i class="xi xi-lock"></i></span>
				</div>
				<div id="join" class="d-flex align-items-center">
					<span><i class="xi xi-user-plus"></i></span>
				</div>
			</div>
			<div id="toggle" class="col-2 ml-auto">
				<span><i class="xi xi-bars"></i></span>
			</div>
		</nav>
		<!--NOTE desktop,tablet nav-->
		<nav id='md-nav' class="row no-gutters justify-content align-items-stretch d-none d-sm-flex">
			<div id="logo" class='col-6 d-flex align-items-center'>
				<figure class="d-flex align-items-center d-lg-none">
					<img src="/public/sangmin/img/icon/logo_mobile.png" class="" alt="">
				</figure>
				<figure class="align-items-center d-none d-lg-flex">
					<img src="/public/sangmin/img/icon/logo.png" class="" alt="">
				</figure>
				<div id="search" class="d-flex align-items-center">
					<span><i class="xi xi-search"></i></span>
					<input type="text" placeholder="관심있는 나라나 골프장을 검색해보세요!">
				</div>
			</div>
			<div id='nav-icon-box' class="col-5 col-lg-4 d-flex justify-content-end">
				<div id="login" class="d-flex align-items-center">
					<span><i class="xi xi-lock"></i></span>
					<p>로그인</p>
				</div>
				<div id="join" class="d-flex align-items-center">
					<span><i class="xi xi-user-plus"></i></span>
					<p>회원가입</p>
				</div>
			</div>
			<div id="toggle" class="col-1 col-lg-2 ml-auto">
				<span><i class="xi xi-bars"></i></span>
				<p class="d-none d-lg-block">메뉴</p>
			</div>
		</nav>
	</header>
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
					<h1><?=$panel_contents[$i]->title?></h1>
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
	<footer id='main-footer' class='d-flex flex-wrap'>
		<ul>
			<li class="title">ABOUT US</li>
			<li><a href="#">회사 소개</a></li>
			<li><a href="#">이용약관</a></li>
			<li><a href="#">개인 정보 취급 방침</a></li>
		</ul>
		<ul>
			<li class="title">OFFICE</li>
			<li><span>TEL</span>
				<p>1500-1500</p>
			</li>
		</ul>
		<ul>
			<li class="title">CONTACT US</li>
			<li><span>상호</span>
				<p>PLAY SEVEN</p>
			</li>
			<li><span>대표</span>
				<p>홍길동</p>
			</li>
			<li><span>사업자등록번호</span>
				<p>000-00-00000</p>
			</li>
			<li><span>등록판매업신고번호</span>
				<p>2017-서울강서-0000호</p>
			</li>
			<li><span>개인정보관리책임자</span>
				<p>홍길동</p>
			</li>
		</ul>
		<ul>
			<li class="title">NEWS LETTER</li>
			<li class="mb-20">
				<input type="text" placeholder="E-mail을 입력해주세요">
			</li>
			<li><strong>골프패스</strong>
				<p>에서 제공하는 유용한 소식</p>
			</li>
		</ul>
		<p class='align-self-end mr-auto ml-auto'>© 2017 <strong>GOLFPASS.</strong> All Rights Reserved.</p>
	</footer>

<script src="/public/sangmin/js/jquery-3.2.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
	<script src="/public/sangmin/dist/bootstrap/bootstrap.bundle.min.js"></script>
	<script src="/public/sangmin/dist/Nwagon/Nwagon.js"></script>
	<script src="/public/sangmin/js/custom.js"></script>
	<script src="/public/sangmin/js/chart.js"></script>
</body>

</html>
