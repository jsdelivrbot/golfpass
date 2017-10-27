<!doctype html>
<html lang="ko">
<head>
	<title>golf pass</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
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
</head>
<body>

	<div class="wrap">
		
		<!-- main content -->
		<div class="sub-content">
			
			<!-- 170125 -->
			<div class="join-navi">
				<div>
					<ul>
						<li class="on">
							<div class="fix">
								<div class="bom">1</div>
								<p>동의 및 인증</p>
							</div>
						</li>
						<li class="on">
							<div class="fix">
								<div class="bom">2</div>
								<p>정보 작성</p>
							</div>
						</li>
						<li>
							<div class="fix">
								<div class="bom">3</div>
								<p>가입 완료</p>
							</div>
						</li>
					</ul>
					<span class="lone two"></span>
				</div>
			</div>
			<!-- //170125 -->
			
			<div class="join-wrap">
	
				<div class="join-date">
					<div class="join-picture">
						<a href="#" class="file-btn">
							<input type="file" class="nfile" onchange="javascript:document.getElementById('custom-file').value=this.files[0].name">
							<p class="img"><img src="/public/jobdance/images/picture-icon.jpg" alt=""></p>
							<p class="tit">이미지를 등록하세요!</p>
							<p class="tail">사진을 등록하지 않아도 가입은 가능하지만 <br>채용 담당자의 시선이 먼저 향하는 곳은 바로 사진입니다. <br>깔끔하고 정돈된 느낌의 사진을 <br>정사각형으로 편집하여 첨부하세요.</p>
							<div class="upload">
								<span class="upload-block">
									<span class="icon"><img src="/public/jobdance/images/upload-icon.jpg" alt=""></span>
									<input type="text" id="custom-file" readonly class="custom-file txt" placeholder="이미지 파일 등록">
								</span>
							</div>
						</a>
					</div>
					
					<div class="join-right">
						<div class="join-ar">
							<div class="idpw">
								<p class="bt"><input type="text" placeholder="아이디 (4자 이상 15자 이하)" maxlength="15"><span>아이디</span></p>
								<p class="bb"><input type="password" placeholder="비밀번호 (8자 이상, 12자 이하)" maxlength="12"><span>비밀번호</span></p>
								<p class="bb"><input type="password" placeholder="비밀번호 확인"><span>비밀번호 확인</span></p>
							</div>
						</div>
						
						<div class="join-ar mt20">
							<div class="idpw">
								<p class="bt"><input type="text" placeholder="이름"><span>이름</span></p>
								<p class="bb"><input type="text" placeholder="닉네임"><span>닉네임</span></p>
								<p class="bb"><input type="tel" placeholder="핸드폰"><span>핸드폰</span></p>
								<p class="bb error"><input type="email" placeholder="E-mail"><span>E-mail</span></p>
							</div>
						</div>
						
						<div class="join-check">
							<input type="checkbox" id="sm" checked/><label for="sm">SMS 수신을 동의합니다.</label>
							<span><input type="checkbox" id="smail" checked/><label for="smail">E-mail 수신을 동의합니다.</label></span>
						</div>
						
						<div class="join-call">
							<a href="<?=site_url(user_uri.'/add')?>">확인</a>
						</div>
					</div>
				</div>
				
			</div>	
				
	
			
		</div>
		<!-- //main content -->
		
	
	</div>
	
</body>
</html>

</body>
</html>