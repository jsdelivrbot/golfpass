<!doctype html>
<html lang="ko">
<head>
	<title>golf pass</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width">
	<link rel="stylesheet" type="text/css" href="/public/etc/jobdance/css/jquery.bxslider.css" media="all">
	<link rel="stylesheet" type="text/css" href="/public/etc/jobdance/css/swiper.min.css" media="all">
	<link rel="stylesheet" type="text/css" href="/public/etc/jobdance/css/front-base.css" media="all">
	<link rel="stylesheet" type="text/css" href="/public/etc/jobdance/css/front-style.css" media="all">
	<link rel="stylesheet" type="text/css" href="/public/etc/jobdance/css/front-media.css" media="all">
	<link rel="shortcut icon" href="/public/etc/jobdance/images/favicon.ico">
	<script src="/public/etc/jobdance/js/jquery-1.11.3.min.js" type="text/javascript"></script>
	<script src="/public/etc/jobdance/js/pace.js" type="text/javascript"></script>
	<script src="/public/etc/jobdance/js/jquery.bxslider.min.js" type="text/javascript"></script>
	<script src="/public/etc/jobdance/js/swiper.min.js" type="text/javascript"></script>
	<script src="/public/etc/jobdance/js/front-ui.js" type="text/javascript"></script>
	
	
</head>
<body>
	<a href=""></a>
	<div class="wrap">
		
	
		
		<!-- main content -->
		<div class="sub-content">
			
			<!-- 170120 -->
			<div class="join-navi">
				<div>
					<ul>
						<li class="on">
							<div class="fix">
								<div class="bom">1</div>
								<p>동의 및 인증</p>
							</div>
						</li>
						<li>
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
				</div>
			</div>
			
			<div class="join-pop">
				<div class="join-close">
					<a id="popup_close" href="javascript:joinClose();">팝업 닫기</a>
				</div>
				<div class="join-con">
					<div class="join-top">이용 약관과 개인 정보 보호 정책에 모두 동의합니다.<span><input type="checkbox" id="checkAll" class="checkK" /><label for="checkAll">동의</label></span></div>
					<div class="join-mid">
						<p class="join-ttit">이용 약관 <b>(필수)</b><span><input type="checkbox" id="type1" class="checkK" /><label for="type1">동의</label></span></p>
						<div class="join-ro">
							제1조(목적)<br>
							제2조(정의)<br>
							제3조 (약관 등의 명시와 설명 및 개정)
						</div>
						<br>
						<p class="join-ttit">개인 정보 보호 정책 <b>(필수)</b><span><input type="checkbox" id="type2" class="checkK" /><label for="type2">동의</label></span></p>
						<div class="join-ro">
							제1조(목적)<br>
							제2조(정의)<br>
							제3조 (약관 등의 명시와 설명 및 개정)<br>
						</div>
					</div>
					<div class="join-bottom">
						<div class="join-choice">
							<a href="#" class="left">핸드폰으로 인증하기</a>
						</div>
					</div>
				</div>
			</div>
			<div class="layer-bg"></div>
			
			<div class="join-btn">
				<a href="javascript:joinOpen();">가입 버튼</a>
			</div>
			<!-- //170120 -->
			
			<div class="join-wrap">
				<div class="join-tit">
					지금 가입하면 <b>318개</b>의 <span>골프장</span>,<br>
					그리고 <b>151개</b>의 <span>호텔</span>을 이용할 수 있습니다
				</div>
				
				<div class="join-list">
					<ul>
						<!-- <li>
							<div>
								<a href="#">
									<div class="poi">
										<div class="img"><span><img src="/public/etc/jobdance/images/j-icon01.png" alt=""></span></div>
										<div class="name">단체 회원</div>
										<div class="txt">
											뛰어난 인재를 찾으려 하는 <br class="one">사업자나 사업채 직원이 속합니다. <br>채용 정보를 등록하고 <br class="one">인재 정보를 조회할 수 있습니다.
										</div>
									</div>
									<div class="btn">선택하기</div>
								</a>
							</div>
						</li> -->
						<li>
							<div>
								<a href="<?=site_url(user_uri.'/add')?>">
									<div class="poi">
										<div class="img"><span><img src="/public/etc/jobdance/images/j-icon02.png" alt=""></span></div>
										<div class="name">개인 회원</div>
										<div class="txt">
											즐거운 여행을 준비하는 <br class="one">일반 고객이 속합니다.<br class="one">여행 상품을 주문할 수 있습니다.
										</div>
									</div>
									<div class="btn">선택하기 </div>
								</a>
							</div>
							<div class="poi-social">
								<div class="j-tit">
									<p>개인 회원은 가입 없이 SNS 계정을 통해 이용할 수 있습니다.</p>
								</div>
								
								<ul class="j-social">
									<li><a href="#" class="google">구글 로그인</a></li>
									<li><a href="#" class="naver">네이버 로그인</a></li>
									<li><a href="#" class="facebook">페이스북 로그인</a></li>
									<li><a href="#" class="kakao">카카오 로그인</a></li>
								</ul>
							</div>
						</li>
						<li>
							<div>
								<a href="<?=site_url(user_uri.'/add')?>">
									<div class="poi">
										<div class="img"><span><img src="/public/etc/jobdance/images/j-icon03.png" alt=""></span></div>
										<div class="name">투어 코디네이터</div>
										<div class="txt">
											동해물과 백두산이 <br class="one">마르고 닳도록 하느님이 보우하사<br>우리나라 만세
										</div>
									</div>
									<div class="btn">선택하기</div>
								</a>
							</div>
						</li>
					</ul>
				</div>
				
				<div class="j-tit">
					<p>개인 회원은 가입 없이<br>SNS 계정을 통해 이용할 수 있습니다.</p>
				</div>
				
				<ul class="j-social">
					<li><a href="#" class="google">구글 로그인</a></li>
					<li><a href="#" class="naver">네이버 로그인</a></li>
					<li><a href="#" class="facebook">페이스북 로그인</a></li>
					<li><a href="#" class="kakao">카카오 로그인</a></li>
				</ul>
			</div>	
		
		
		</div>
		<!-- //main content -->
		
	
	</div>

<script>
$('#popup_close').click(function(){

})
</script>	
</body>

</html>

</body>
</html>