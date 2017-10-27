<html>

<head>

    <!-- <link rel="stylesheet" type="text/css" href="semantic/semantic.min.css"> -->
    <link rel="stylesheet" type="text/css" href="/public/lib/semantic/semantic.css">

    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>
    <script src="/public/lib/semantic/semantic.min.js"></script>
    <!-- Standard Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width">

    <link rel="stylesheet" type="text/css" href="/public/lib/responsive-tables/responsive-tables.css">
    <script src="/public/lib/responsive-tables/responsive-tables.js"></script>


    <!-- sangmin -->
    <link rel="stylesheet" href="/public/sangmin/dist/bootstrap/bootstrap.min.css">
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/xeicon@2.3.3/xeicon.min.css">
	<link rel="stylesheet" href="/public/sangmin/css/main.css">
	<link rel="stylesheet" href="/public/sangmin/css/eric-meyer-reset.min.css">
	<link rel="stylesheet" href="/public/sangmin/css/xeicon.min.css">
	<link rel="stylesheet" href="/public/sangmin/dist/Nwagon/Nwagon.css" type="text/css">
</head>


<style>
    @media all and (max-width:750px) {
        .ui.text.menu>.computer.only {
            display: none;
        }
        .computer.only
        {
            display :none;
        }
    }
</style>


<body>
<header id="sub-header">

</header>
    

    <div class="ui gird">
    <div class="sixteen wide column">
        header
    </div>

    <div class="sixteen wide column">
        <?php load_view($content_view)?>
    </div>


    
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
