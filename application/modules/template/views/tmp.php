<!DOCTYPE html>
<html>

<head>

<!-- 시맨틱 -->
    <!-- <link rel="stylesheet" type="text/css" href="semantic/semantic.min.css"> -->
    <link rel="stylesheet" type="text/css" href="/public/lib/semantic/semantic.css">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>
    <script src="/public/lib/semantic/semantic.min.js"></script>
    <!-- 시맨틱 -->
    <!-- Standard Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width">

       <!-- Standard Meta -->
       <!-- 반응형 테이블 -->
    <!-- <link rel="stylesheet" type="text/css" href="/public/lib/responsive-tables/responsive-tables.css">
    <script src="/public/lib/responsive-tables/responsive-tables.js"></script> -->
       <!-- 반응형 테이블 -->

    <!-- sangmin -->
    <link rel="stylesheet" href="/public/sangmin/dist/bootstrap/bootstrap.min.css">
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/xeicon@2.3.3/xeicon.min.css">
	<link rel="stylesheet" href="/public/sangmin/css/main.css">
	<link rel="stylesheet" href="/public/sangmin/css/eric-meyer-reset.min.css">
	<link rel="stylesheet" href="/public/sangmin/css/xeicon.min.css">
	<link rel="stylesheet" href="/public/sangmin/dist/Nwagon/Nwagon.css" type="text/css">
</head>


<!-- <style>
    @media all and (max-width:750px) {
        .ui.text.menu>.computer.only {
            display: none;
        }
        .computer.only
        {
            display :none;
        }
    }
</style> -->


<body>
	<header id="sub-header" class="container-fluid">
		<!--NOTE mobile nav-->
		<nav id='sm-nav' class="row no-gutters justify-content align-items-stretch d-sm-none">
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
					<img src="public/sangmin/img/icon/logo_mobile.png" class="" alt="">
				</figure>
				<figure class="align-items-center d-none d-lg-flex">
					<img src="public/sangmin/img/icon/logo.png" class="" alt="">
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


        <?php load_view($content_view)?>

    
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
        <li class="mb-20"><input type="text" placeholder="E-mail을 입력해주세요"></li>
        <li><strong>골프패스</strong>
            <p>에서 제공하는 유용한 소식</p>
        </li>
    </ul>
    <p class='align-self-end mr-auto ml-auto'>© 2017 <strong>GOLFPASS.</strong> All Rights Reserved.</p>
</footer>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="/public/sangmin/dist/bootstrap/bootstrap.bundle.min.js"></script>
<script src="/public/sangmin/dist/Nwagon/Nwagon.js"></script>
<script src="/public/sangmin/js/custom.js"></script>
<script src="/public/sangmin/js/chart.js"></script>
    
</body>

</html>
