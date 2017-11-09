


<div style="margin-top:50px;"></div>
<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.2.13/dist/semantic.min.css">
<script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.2.13/dist/semantic.min.js"></script>
<!-- <script src="/public/framework/semantic/src/less.min.js"></script> -->

<div class="ui header">현재 페이지 컨트롤러 : maker / controllers / Maker.php</div>
<div class="ui header">현재 페이지 뷰디렉토리 : maker / views / index.php</div>
<div class="ui header">--------------퍼블리싱 파일목록 maker / views / ???-----------------</div>

<ul class="ui ul">
    <?php for($i=0 ; $i<count($publishing); $i++){?>
    <li><?=$publishing[$i]?></li>
    <?php }?>

</ul>
<div class="ui header">--------------버그 및 수정사항 목록-----------------</div>

<ul class="ui ul">
    <li>메인페이지 메뉴 아이콘 따로놈</li>
    <li>시맨틱하고 헤더메뉴하고 css 겹침</li>
    <li>회원가입 프로필 사진 업로드 버그(업로드안됌)</li>
    <li>메인슬라이드쇼 여러개 상품 할수있게 해야됌.</li>
    <li>상품 디테일 페이지 바탕 해당상품 사진으로.</li>
    <li>카테고리 페이지와 상품 리스트 페이지에서 최대 개수 10개로 변경</li>
</ul>

<div class="ui header">---------사이트 맵-----------</div>
<div class="ui header">base</div>
<table class="ui table ">
<tr>
    <td>이름</td>
    <td>url</td>
    <td>view_dir</td>
</tr>
<?php for($i=0; $i < count($base); $i++){?>
    <tr>
    <td><?=$base[$i]->name?></td>
    <td><a href="<?=$base[$i]->url?>"><?=$base[$i]->url?></a></td>
    <td><?=$base[$i]->view_dir?></td>

    </tr>
<?php }?>
</table>
<div class="ui header">shop</div>
<table class="ui table ">
<tr>
    <td>이름</td>
    <td>url</td>
    <td>view_dir</td>
</tr>
<?php for($i=0; $i < count($shop); $i++){?>
    <tr>
    <td><?=$shop[$i]->name?></td>
    <td><a href="<?=$shop[$i]->url?>"><?=$shop[$i]->url?></a></td>
    <td><?=$shop[$i]->view_dir?></td>

    </tr>
<?php }?>
</table>
<div class="ui header">etc</div>
<table class="ui table ">
<tr>
    <td>이름</td>
    <td>url</td>
    <td>view_dir</td>
</tr>
<?php for($i=0; $i < count($etc); $i++){?>
    <tr>
    <td><?=$etc[$i]->name?></td>
    <td><a href="<?=$etc[$i]->url?>"><?=$etc[$i]->url?></a></td>
    <td><?=$etc[$i]->view_dir?></td>

    </tr>
<?php }?>
</table>