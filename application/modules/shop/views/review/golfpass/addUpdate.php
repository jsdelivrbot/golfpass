<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no">

<title>Untitled Document</title>
</head>

<style>
#adminBoard{ width:1024px; margin:0 auto}
#adminBoard ul{ margin:0; padding:0}
#adminBoard ul li{ list-style:none; overflow:hidden; margin-top:15px}
#adminBoard ul li .title{ float:left; width:15%; padding:10px 0; font-size:16px; font-weight:bold; text-align:center;}
#adminBoard ul li .title2{ float:left; width:15%; padding:10px 0; font-size:16px; font-weight:bold; text-align:center;}
#adminBoard ul li .cont01{ float:left; width:85%; padding:10px 0; font-size:16px; font-weight:bold}
#adminBoard ul li .cont02{ float:left; width:20%; font-size:16px; font-weight:bold}
#adminBoard ul li .cont03{ float:left; width:85%; font-size:16px; font-weight:bold}
#adminBoard ul li .cont03 .editArea{ width:100%; height:500px; background-color:#39C;}
#adminBoard ul li .selectBox select{ width:95%; padding:3px 10px 12px; font-size:20px; font-weight:bold; color:#666; border:1px solid #ccc;}
@media (max-width:1023px){
	#adminBoard{ width:100%;}
	#adminBoard ul li .cont02{ width:35%;}
}
@media (max-width:575px){
	#adminBoard ul li .title, #adminBoard ul li .title2{ width:10%; font-size:12px}
	#adminBoard ul li .cont01, #adminBoard ul li .cont02{ width:40%; font-size:12px;}
	#adminBoard ul li .cont01, #adminBoard ul li .cont03{ width:90%;}
	#adminBoard ul li .selectBox select{ font-size:14px}
}
@media (max-width:430px){
	#adminBoard ul li .selectBox select{ padding:3px 5px 12px;}
}
</style>
<body>

<div id="adminBoard">
<form action="<?=my_site_url(shop_review_uri."/$mode",true)?>" method="post">
	<ul>
    	<li>
        	<div class="title">상품명</div>
            <div class="cont01"><?=$product->name?></div>
        </li>
        <li>
        	<div class="title">별점</div>
            <div class="cont02">
            	<div class="selectBox">
                    <select name="score_1" id="select01">
                        <option value="0">☆☆☆☆☆&emsp;0</option>
                        <option value="1">★☆☆☆☆&emsp;1</option>
                        <option value="2">★★☆☆☆&emsp;2</option>
                        <option value="3">★★★☆☆&emsp;3</option>
                        <option value="4">★★★★☆&emsp;4</option>
                        <option value="5">★★★★★&emsp;5</option>
                    </select>
                </div>
            </div>
            <div class="title2">별점</div>
            <div class="cont02">
            	<div class="selectBox">
                    <select name="score_2" id="select02">
                        <option value="0">☆☆☆☆☆&emsp;0</option>
                        <option value="1">★☆☆☆☆&emsp;1</option>
                        <option value="2">★★☆☆☆&emsp;2</option>
                        <option value="3">★★★☆☆&emsp;3</option>
                        <option value="4">★★★★☆&emsp;4</option>
                        <option value="5">★★★★★&emsp;5</option>
                    </select>
                </div>
            </div>
        </li>
        <li>
        	<div class="title">별점</div>
            <div class="cont02">
            	<div class="selectBox">
                    <select name="score_3" id="select03">
                        <option value="0">☆☆☆☆☆&emsp;0</option>
                        <option value="1">★☆☆☆☆&emsp;1</option>
                        <option value="2">★★☆☆☆&emsp;2</option>
                        <option value="3">★★★☆☆&emsp;3</option>
                        <option value="4">★★★★☆&emsp;4</option>
                        <option value="5">★★★★★&emsp;5</option>
                    </select>
                </div>
            </div>
            <div class="title2">별점</div>
            <div class="cont02">
            	<div class="selectBox">
                    <select name="score_4" id="select04">
                        <option value="0">☆☆☆☆☆&emsp;0</option>
                        <option value="1">★☆☆☆☆&emsp;1</option>
                        <option value="2">★★☆☆☆&emsp;2</option>
                        <option value="3">★★★☆☆&emsp;3</option>
                        <option value="4">★★★★☆&emsp;4</option>
                        <option value="5">★★★★★&emsp;5</option>
                    </select>
                </div>
            </div>
        </li>
        <li>
        	<div class="title">별점</div>
            <div class="cont02">
            	<div class="selectBox">
                    <select name="score_5" id="select05">
                        <option value="0">☆☆☆☆☆&emsp;0</option>
                        <option value="1">★☆☆☆☆&emsp;1</option>
                        <option value="2">★★☆☆☆&emsp;2</option>
                        <option value="3">★★★☆☆&emsp;3</option>
                        <option value="4">★★★★☆&emsp;4</option>
                        <option value="5">★★★★★&emsp;5</option>
                    </select>
                </div>
            </div>
            <div class="title2">별점</div>
            <div class="cont02">
            	<div class="selectBox">
                    <select name="score_6" id="select06">
                        <option value="0">☆☆☆☆☆&emsp;0</option>
                        <option value="1">★☆☆☆☆&emsp;1</option>
                        <option value="2">★★☆☆☆&emsp;2</option>
                        <option value="3">★★★☆☆&emsp;3</option>
                        <option value="4">★★★★☆&emsp;4</option>
                        <option value="5">★★★★★&emsp;5</option>
                    </select>
                </div>
            </div>
        </li>
        <li>
        	<div class="title">별점</div>
            <div class="cont02">
            	<div class="selectBox">
                    <select name="score_7" id="select07">
                        <option value="0">☆☆☆☆☆&emsp;0</option>
                        <option value="1">★☆☆☆☆&emsp;1</option>
                        <option value="2">★★☆☆☆&emsp;2</option>
                        <option value="3">★★★☆☆&emsp;3</option>
                        <option value="4">★★★★☆&emsp;4</option>
                        <option value="5">★★★★★&emsp;5</option>
                    </select>
                </div>
            </div>
            <div class="title2">별점</div>
            <div class="cont02">
            	<div class="selectBox">
                    <select name="score_8" id="select08">
                        <option value="0">☆☆☆☆☆&emsp;0</option>
                        <option value="1">★☆☆☆☆&emsp;1</option>
                        <option value="2">★★☆☆☆&emsp;2</option>
                        <option value="3">★★★☆☆&emsp;3</option>
                        <option value="4">★★★★☆&emsp;4</option>
                        <option value="5">★★★★★&emsp;5</option>
                    </select>
                </div>
            </div>
        </li>
        <li>
            <div class="title">옵션</div>
            <div class="cont03">
            리뷰점수만<input type="checkbox" name="is_display" value="0">
            </div>
        </li>
        <li>
        	<div class="title">내용</div>
            <div class="cont03">
            	<!-- <div class="editArea"> -->
                <textarea placeholder="내용" name="desc" rows="10" cols="80"><?=set_value_data($content,'desc')?></textarea>
                <!-- </div> -->
            </div>
        </li>
        <li>
        <input type="submit">
        </li>
    </ul>
    </form>
</div>

</body>
</html>

<script src="<?=domain_url('/public/lib/ckeditor/ckeditor.js')?>"></script>
<script>
 CKEDITOR.replace( 'desc',{
    filebrowserUploadUrl: '/index.php<?=common_uri?>/upload_receive_from_ck'
 } );

</script>
