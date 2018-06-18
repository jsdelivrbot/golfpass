<!-- 
<style>
    li{
        display:inline;
    }
</style> -->
<style>
a{
    color: black;
}

#navi
{
    position : fixed;
    right:10%;
    z-index : 999;
    
}
@media (max-width: 1500px) and (min-width: 699px) {
    #navi
    {
        right:1%;
    }
}

@media screen and (max-width: 699px)   {
    #navi
    {
        right:1%;
        display: none;   
    }
}
</style>

<script type="text/javascript" src="/public/lib/smartEditor/js/HuskyEZCreator.js" charset="utf-8"></script>

<!-- 네비게이터 -->
<div id="navi"class="ui compact vertical labeled icon menu">

  <!-- <a id="navi_btn"class="item" >
    <i class="gamepad icon"></i>
    닫기
  </a> -->
  <div>
  <?php 
    $v_menus = array("수정","홀_추가가격","메인옵션","분류","호텔","설명","상품옵션","이미지","위치");
    $v_icons = array("edit","options","options","list layout","h","remove from calendar","options","image","map outline");
    for($i = 0; $i<count($v_menus); $i++){
    ?>
     <a class="item" id="<?=$v_menus[$i]?>">
     <i class="<?=$v_icons[$i]?> icon"></i>
    <b><?=$v_menus[$i]?></b>
  </a>
  <script>
      $("#<?=$v_menus[$i]?>").click(function(){
          $("#target_<?=$v_menus[$i]?>").goTo();
      });
  </script>
    <?php }?>

 <script>
 (function($) {
    $.fn.goTo = function() {
        $('html, body').animate({
            scrollTop: $(this).offset().top -110 + 'px'
        }, 'fast');
        return this; // for chaining...
    }
})(jQuery);
 </script>
  
  </div>
</div>
<script>
$('#navi_btn').click(function(){
    $('#navi')
    .transition('scale')
    ;
});

</script>
<!-- 네비게이터 -->

<div class="sixteen wide column">
        <a class="ui left labeled icon button  secondary" href="<?=my_site_url(admin_package_uri."/gets")?>">
            <i class="left arrow icon"></i>
            목록으로
        </a>
    <?php if(strpos($mode, "update") >-1 ){?>
        <a class="ui right labeled icon button  secondary" href="<?=my_site_url(shop_package_uri."/get/{$product->id}/")?>">
            <i class="right arrow icon"></i>
        사이트에서 보기
        </a>

        <a style="float:right;background-color:#aaaaaa;color:black" class="ui right labeled icon button  secondary" href="#" onclick="confirm_redirect('<?=my_site_url(admin_ref_cate_package_uri."/goToRecycleBin/{$product->id}")?>','휴지통으로 이동시키겠습니까? 연결된 카테고리가 모두 삭제됩니다.'); return false;">
        휴지통으로
        </a>
    <?php }?>
</div>

<?php $v_menu_id = 0;?>
<div id="target_<?=$v_menus[$v_menu_id++]?>"class="sixteen wide column" style="margin-top:50px;">
    <h1 class="ui horizontal divider header">
        <i class="plus icon"></i>
        상품 추가/수정
    </h1>
    
    <form  class="ui form" action="<?=my_site_url(admin_package_uri."/$mode")?>" method="post">	
        <div class="field">
            <label>상품이름</label>
            <input type="text" name="name" value="<?=set_value_data($product,'name')?>" ><br> 
        </div>
        
        <div class="field">
            <label>상품 영어이름</label>
            <input type="text" name="eng_name" value="<?=set_value_data($product,'eng_name')?>"> <?=form_error('eng_name',false,false)?><br>
        </div>
        
        <div class="field">
            <label>가격</label>
        <input type="text" name="price" value="<?=set_value_data($product,'price')?>"> <?=form_error('price',false,false)?><br>
        </div>
        
        <div class="field">
            <label>시간 (■시간 ■분)</label>
            <input type="text" name="take_time" value="<?=set_value_data($product,'take_time')?>"> <?=form_error('take_time',false,false)?><br>
        </div>
        
        <div class="field">
            <label>날짜 (■박 ■일)</label>
            <input type="text" name="take_days" value="<?=set_value_data($product,'take_days')?>"> <?=form_error('take_days',false,false)?><br>
        </div>
        
        <div class="field">
            <label>날짜 선택 기한 시작 (0001-01-01 입력 시 선택 제한이 사라집니다.)</label>
            <input type="date" name="day_start" value="<?=set_value_data($product,'day_start')?>"> <?=form_error('day_start',false,false)?><br>
        </div>
        
        <div class="field">
            <label>날짜 선택 기한 끝 (■■■■-■■-■■)</label>
            <input type="date" name="day_end" value="<?=set_value_data($product,'day_end')?>"> <?=form_error('day_end',false,false)?><br>
        </div>
        
        <div class="field">
            <label>지역</label>
        <input type="text" name="region" value="<?=set_value_data($product,'region')?>"> <?=form_error('region',false,false)?><br>
        </div>
        
        <div class="field">
            <label>최소 인(명)</label>
            <input type="text" name="min_people" value="<?=set_value_data($product,'min_people')?>"> <?=form_error('min_people',false,false)?><br>
        </div>
        
        <div class="field">
            <label>최대 인(명)</label>
            <input type="text" name="max_people" value="<?=set_value_data($product,'max_people')?>"> <?=form_error('max_people',false,false)?><br>
        </div>
        
        <div class="field">
            <label>골프장</label>
            <input type="text" name="golf_course" value="<?=set_value_data($product,'golf_course')?>"> <?=form_error('golf_course',false,false)?><br>
        </div>
        <div class="field">
            <label>호텔</label>
            <input type="text" name="hotels" value="<?=set_value_data($product,'hotels')?>"> <?=form_error('hotels',false,false)?><br>
        </div>
        
        <div class="field">
            <label>상세 설명</label>
            <textarea placeholder="내용" name="desc" id="desc"><?=set_value_data($product,'desc')?></textarea>
        </div>

		<div class="field">
            <label>포함사항</label>
            <textarea placeholder="내용" name="includes_y"><?=set_value_data($product,'includes_y')?></textarea>
        </div>
        
        <div class="field">
            <label>불포함사항</label>
            <textarea placeholder="내용" name="includes_n"><?=set_value_data($product,'includes_n')?></textarea>
        </div>
        
        <div class="field">
            <label>골프장 정보</label>
            <textarea placeholder="내용" name="golf_info" id="golf_info"><?=set_value_data($product,'golf_info')?></textarea>
        </div>
        
        <div class="field">
            <label>호텔 정보</label>
            <textarea placeholder="내용" name="hotel_info" id="hotel_info"><?=set_value_data($product,'hotel_info')?></textarea>
        </div>
        
        <div class="field">
            <label>해시 태그- 예시)앙사나골프텔,라오골프텔 (띄어쓰기 없이 쉼표로 구분)</label>
            <input placeholder="앙사나골프텔,라오골프텔"type="text" name="hashtag" value="<?=set_value_data($product,'hashtag')?>"> <?=form_error('hashtag',false,false)?><br>
        </div>

        <input class="ui button positive" type="submit" value="추가/수정" onclick="return submitContents2(this);">
    </form>
</div>

<?php if(strpos($mode, "update") >-1 ) {?>
<!-- 이미지 업로드폼 시작 -->
<div class="field">
	<h1 class="ui horizontal divider header">
        <i class="plus icon"></i>
    	 이미지
    </h1>
    <?php if(!isset($photos[0]->photo)) { ?>
	<form class="ui form"  method="POST" action="<?=my_site_url(admin_package_uri."/upload_photo")?>" enctype='multipart/form-data'>
		<input type="file" name="photo" />
	   	<input type="hidden" name='product_id' value="<?=$product->id?>"/><br>
	   	<input class="ui button positive" type="submit" value="보내기"style="">
    </form>
    <?php } ?>
    <?php if(isset($photos[0]->photo)) { ?>
    <h3 class="ui left floated header">추가된 이미지</h3>
	<img style="width:200px; height:auto;" src="<?=$photos[0]->photo?>" alt="">
	<a  onclick="confirm_callback(this,ajax_a,'복구할 방법이 없습니다. 삭제하시겠습니까?'); return false;" data-action="<?=site_url(admin_package_uri."/ajax_photo_delete/{$product->id}/photo")?>" href="#" class="ui button basic positive" style="float:right; clear:both;">삭제</a>
	<?php } ?>
</div>
<!-- 이미지 업로드폼 끝 -->
<!-- 일정표 업로드폼 시작 -->
<div class="field">
	<h1 class="ui horizontal divider header">
        <i class="plus icon"></i>
		일정표
    </h1>
	<form class="ui form" onsubmit="ajax_submit(this); return false;" action="<?=site_url(admin_package_uri."/ajax_schedule_add")?>" method="post">
		<div class="two fields">
			<div class="field">
	            <label>일차 (중복으로 넣을 수 없습니다.)</label>
	            <input type="text" name="days">
	        </div>
	        <div class="field">
	            <label>지역</label>
	            <input type="text" name="place">
	        </div>
		</div>
        <div class="field">
            <label>상세</label>
            <textarea name="detail" id="detail"></textarea>
        </div>
        <input type="hidden" name="product_id" value="<?=$product->id?>">
        <input class="ui button positive" type="submit" value="일정 추가" onclick="return submitContents(this);">
    </form>
    <br>
    <h3 class="ui left floated header">추가된 일정 리스트</h3>
    <div class="ui clearing divider"></div>
    <ol class="ui list">
        <?php for($i=0 ; $i < count($schedule); $i++){?>
        <div style="display:block">
            <li style="display:inline-block">
            	<?=$schedule[$i]->days?>일차, <?=$schedule[$i]->place?><br>
            	<?=$schedule[$i]->detail?>
            </li>
            <div><a onclick="confirm_callback(this,ajax_a,'복구할 방법이 없습니다. 삭제하시겠습니까?'); return false;" data-action="<?=site_url(admin_package_uri."/ajax_schedule_delete/{$schedule[$i]->id}")?>" href="#" class="ui button basic positive">삭제</a></div>
        </div>
        <?php }?>
    </ol>
</div>
<!-- 일정표 업로드폼 끝 -->
<!-- 분류 추가 시작 -->
<div id="target_<?=$v_menus[$v_menu_id++]?>" class="sixteen wide column" style="margin-top:50px;">
    <h1 class="ui horizontal divider header">
        <i class="plus icon"></i>
        분류추가
    </h1>
    <form class="ui form" onsubmit="ajax_submit(this); return false;" action="<?=site_url(admin_ref_cate_package_uri."/ajax_add")?>" method="post">
        <div class="two fields">
            <div class="field">
                <label>분류목록</label>
                <select name="cate_id" id="">
                    <?php
                    for($i=0 ; $i<count($categories) ; $i++){?>
                        <option value="<?=$categories[$i]->id?>"><?=string_for("&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp",$categories[$i]->deep)?><?=$categories[$i]->name?></option>
                    <?php }
                    ?>
                </select>
            </div>
            <div class="field">
                <label>순서</label>
                <input type="text" name="sort" value="0">
            </div>
        </div>
        <input type="hidden" name="product_id" value="<?=$product->id?>">
        <input class="ui button positive" type="submit" value="분류 추가">
    </form>
    <br>
    <h3 class="ui left floated header">추가된 분류 리스트</h3>
    <div class="ui clearing divider"></div>
    <ol class="ui list">
        <?php for($i=0 ; $i < count($product_categories); $i++){?>
            <div style="display:block">
            <li style="display:inline-block"><a href="<?=my_site_url(admin_package_category_uri."/update/{$product_categories[$i]->cate_id}")?>"><?=$product_categories[$i]->name?></a></li>
            <form class="ui form" onsubmit="ajax_submit(this); return false;" method="post"action="<?=site_url(admin_ref_cate_package_uri."/ajax_update/{$product_categories[$i]->id}")?>" style="display:inline">
                <input style ="width:50px;"type="text" name="sort"  value="<?=set_value_data($product_categories[$i],'sort')?>" style="display:inline">   
                <input class="ui button basic positive" type="submit" value="순서 수정"> 
            </form>
            <!-- <a class="ui button basic positive" onclick="confirm_redirect('<?=site_url(admin_ref_cate_package_uri."/delete/{$product_categories[$i]->id}")?>','정말 삭제하시겠습니까')" href="#">삭제</a> -->
            <a onclick="confirm_callback(this,ajax_a,'복구할 방법이 없습니다. 삭제하시겠습니까?'); return false;" data-action="<?=site_url(admin_ref_cate_package_uri."/ajax_delete/{$product_categories[$i]->id}")?>" href="#" class="ui button basic positive">삭제</a>
        </div>
        <?php }?>
    </ol>
</div>   
<!-- 분류 추가 끝-->
<!-- 날짜별 가격 시작 -->
<div class="field">
	<h1 class="ui horizontal divider header">
        <i class="plus icon"></i>
		날짜별 가격
    </h1>
	<form class="ui form" onsubmit="ajax_submit(this); return false;" action="<?=site_url(admin_package_uri."/ajax_package_daily_price_add")?>" method="post">
		<div class="two fields">
			<div class="field">
	            <label>시작 날짜</label>
	            <input type="text" id="datepicker1" name="s_date" readonly>
	        </div>
	        <div class="field">
	            <label>끝 날짜</label>
	            <input type="text" id="datepicker2" name="e_date" readonly>
	        </div>
		</div>
		<div class="two fields">
	        <div class="field">
	            <label>가격 (숫자만 입력해주세요.)</label>
	            <input type="number" name="price">
	        </div>
	        <div class="field">
	            <label>요일 선택</label>
	            <input type="checkbox" name="w[]" value="0" style="margin: 3px;" checked>일
	            <input type="checkbox" name="w[]" value="1" style="margin: 3px;" checked>월
	            <input type="checkbox" name="w[]" value="2" style="margin: 3px;" checked>화
	            <input type="checkbox" name="w[]" value="3" style="margin: 3px;" checked>수
	            <input type="checkbox" name="w[]" value="4" style="margin: 3px;" checked>목
	            <input type="checkbox" name="w[]" value="5" style="margin: 3px;" checked>금
	            <input type="checkbox" name="w[]" value="6" style="margin: 3px;" checked>토
	        </div>
		</div>
        <input type="hidden" name="product_id" value="<?=$product->id?>">
        <input class="ui button positive" type="submit" value="날짜 추가">
    </form>
    <br>
    <h3 class="ui left floated header">추가된 날짜별 가격 리스트</h3>
    (오늘 이전 날짜는 표시되지 않습니다.)
    <div class="ui clearing divider"></div>
    <ol class="ui list">
    	<form method="post" action="<?=site_url(admin_package_uri."/ajax_package_daily_price_delete")?>">
        <?php
        $w = array('일', '월', '화', '수', '목', '금', '토');
        for($i=0 ; $i < count($daily_price); $i++) {
        ?>
        <div style="display:block">
            <li style="display:inline-block">
            	<?=$daily_price[$i]->date?> (<?=$w[date('w', strtotime($daily_price[$i]->date))]?>) / <?=number_format($daily_price[$i]->price)?>원<br>
            </li>
            <input type="checkbox" name="id[]" class="checkList" value="<?=$daily_price[$i]->id?>">
        </div>
        <?php } ?>
        <input type="checkbox" id="checkall" style="margin: 3px;">전체선택<br/>
        <input type="submit" value="선택 삭제">
        </form>
    </ol>
</div>
<!-- 날짜별 가격 끝 -->
<?php } ?>
<br>

<div class="sixteen wide column" style="margin-top:50px">
<a class="ui left labeled icon button  secondary" href="<?=my_site_url(admin_package_uri."/gets")?>">
    <i class="left arrow icon"></i>
    목록으로
</a>
</div>

<script>
$('.ui.radio.checkbox')
  .checkbox()
;
$('.ui.checkbox')
  .checkbox()
;
</script>
<?php if(strpos($mode, "update") >-1 ) { ?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">  
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
$(function() {
	var data = {
			closeText		: '닫기',
			prevText		: '이전달',
			nextText		: '다음달',
			dateFormat		: "yy-mm-dd",
			dayNames		: ['일요일', '월요일', '화요일', '수요일', '목요일', '금요일', '토요일'],
			dayNamesMin		: ['일', '월', '화', '수', '목', '금', '토'],
			monthNames		: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
			monthNamesShort	: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'],
			showMonthAfterYear: true,
			minDate			: 0
		};
	$("#datepicker1").datepicker(data);
	$("#datepicker2").datepicker(data);
});
</script>
<script type="text/javascript">
var oEditors4 = [];
nhn.husky.EZCreator.createInIFrame({
	oAppRef: oEditors4,
	elPlaceHolder: "hotel_info",
	sSkinURI: "/public/lib/smartEditor/SmartEditor2Skin.html",
	htParams : {
		bUseToolbar : true,
		bUseVerticalResizer : false,
		bUseModeChanger : true,
		fOnBeforeUnload : function(){
			//alert("완료");
		}
	}, //boolean
	fOnAppLoad : function(){
		//
	},
	fCreator: "createSEditor2"
});

var oEditors3 = [];
nhn.husky.EZCreator.createInIFrame({
	oAppRef: oEditors3,
	elPlaceHolder: "golf_info",
	sSkinURI: "/public/lib/smartEditor/SmartEditor2Skin.html",
	htParams : {
		bUseToolbar : true,
		bUseVerticalResizer : false,
		bUseModeChanger : true,
		fOnBeforeUnload : function(){
			//alert("완료");
		}
	}, //boolean
	fOnAppLoad : function(){
		//
	},
	fCreator: "createSEditor2"
});

var oEditors2 = [];
nhn.husky.EZCreator.createInIFrame({
	oAppRef: oEditors2,
	elPlaceHolder: "desc",
	sSkinURI: "/public/lib/smartEditor/SmartEditor2Skin.html",
	htParams : {
		bUseToolbar : true,
		bUseVerticalResizer : false,
		bUseModeChanger : true,
		fOnBeforeUnload : function(){
			//alert("완료");
		}
	}, //boolean
	fOnAppLoad : function(){
		//
	},
	fCreator: "createSEditor2"
});
function submitContents2(elClickedObj) {
	oEditors2.getById["desc"].exec("UPDATE_CONTENTS_FIELD", []);
	oEditors3.getById["golf_info"].exec("UPDATE_CONTENTS_FIELD", []);
	oEditors4.getById["hotel_info"].exec("UPDATE_CONTENTS_FIELD", []);
	
	try {
		elClickedObj.form.submit();
	} catch(e) {
		
	}
}

var oEditors = [];
nhn.husky.EZCreator.createInIFrame({
	oAppRef: oEditors,
	elPlaceHolder: "detail",
	sSkinURI: "/public/lib/smartEditor/SmartEditor2Skin.html",
	htParams : {
		bUseToolbar : true,
		bUseVerticalResizer : false,
		bUseModeChanger : true,
		fOnBeforeUnload : function(){
			//alert("완료");
		}
	}, //boolean
	fOnAppLoad : function(){
		//
	},
	fCreator: "createSEditor2"
});

function submitContents(elClickedObj) {
	oEditors.getById["detail"].exec("UPDATE_CONTENTS_FIELD", []);
	
	try {
		elClickedObj.form.submit();
	} catch(e) {
		
	}
}

//요일선택 전체 체크
$(function() {
	$("#checkall").click(function() {
		if($("#checkall").prop("checked")) $(".checkList").prop("checked", true);
		else $(".checkList").prop("checked", false);
	});
});
</script>
<?php }?>