	
	<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width">
	<link rel="stylesheet" type="text/css" href="/public/jobdance/css/jquery.bxslider.css" media="all">
	<link rel="stylesheet" type="text/css" href="/public/jobdance/css/swiper.min.css" media="all">
	<link rel="stylesheet" type="text/css" href="/public/jobdance/css/front-base.css" media="all">
	<link rel="stylesheet" type="text/css" href="/public/jobdance/css/front-style.css" media="all">
	<link rel="stylesheet" type="text/css" href="/public/jobdance/css/front-media.css" media="all">
	<link rel="shortcut icon" href="/public/jobdance/images/favicon.ico">
	<script src="/public/jobdance/js/jquery-1.11.3.min.js" type="text/javascript"></script>
	<script src="/public/jobdance/js/pace.js" type="text/javascript"></script>
	<script src="/public/jobdance/js/jquery.bxslider.min.js" type="text/javascript"></script>
	<script src="/public/jobdance/js/swiper.min.js" type="text/javascript"></script>
	<script src="/public/jobdance/js/front-ui.js" type="text/javascript"></script>

	<div class="wrap">
		

		
		<!-- main content -->
		<div class="sub-content">

			<div class="login-wrap">

				<div class="login-form">
					<!-- <p class="tit">아이디</p>
					<p class="input">
						<input type="text">
					</p>
					<p class="tit mt15">비밀번호</p>
					<p class="input">
						<input type="password">
					</p>
					<p class="login-u">
						<input type="checkbox" id="login" /><label for="login">로그인 상태 유지하기</label>
					</p> -->
					<form class="ui form" action="<?=my_site_url(user_uri."/login?return_url=".rawurlencode($return_url))?>" method="post">
					<div class="field">
						<label>아이디</label>
						<input type="text"name="userName" value="<?=set_value('userName')?>" placeholder="First Name">
					</div>
					<div class="field">
						<label>비밀번호</label>
						<input  type="password" name="password" placeholder="Last Name">
					</div>
					<div class="field">
						<div class="ui">
						<input type="checkbox" tabindex="0" class="hidden">
						<label>로그인 유지</label>
						</div>
					</div>
					<button class="fluid ui button olive" type="submit">로그인</button>
					</form>


					<!-- <p class="login-btn">
						<a href="#">로그인</a>
					</p> -->
					<div class="login-util">
						<a href="#">아이디 찾기</a>&nbsp;&nbsp;|&nbsp;&nbsp;
						<a href="#">비밀번호 찾기</a>&nbsp;&nbsp;|&nbsp;&nbsp;
						<a class="green" href="<?=site_url(user_uri."/register_agree_1")?>">회원가입</a>
					</div>
					<div class="or-co"><span></span><img src="/public/jobdance/images/or-co.png" alt=""></div>
				</div>
				
				<div class="j-tit btnot">
					<p>개인 회원은 가입 없이<br>SNS 계정을 통해 이용할 수 있습니다.</p>
				</div>
				
				<ul class="j-social btnot">
					<li><a href="#" class="google">구글 로그인</a></li>
					<li><a href="#" class="naver">네이버 로그인</a></li>
					<li><a href="#" class="facebook">페이스북 로그인</a></li>
					<li><a href="#" class="kakao">카카오 로그인</a></li>
				</ul>
			</div>	
	
			
		<!-- //main content -->
		
	
	</div>
	
</div>