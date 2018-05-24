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
            <a class="ui right labeled icon button  secondary" href="<?=my_site_url(golfpass_p_daily_price_admin_uri."/add/{$product->id}/".date('Y'))?>">
            <i class="right arrow icon"></i>
        날자별 가격
        </a>
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
            <input type="text" name="name" value="<?=set_value_data($product,'name')?>" > <?=form_error('name',false,false)?><br> 
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
            <label>해시 태그- 예시)앙사나골프텔,라오골프텔 (띄어쓰기 없이 쉼표로 구분)</label>
            <input placeholder="앙사나골프텔,라오골프텔"type="text" name="hashtag" value="<?=set_value_data($product,'hashtag')?>"> <?=form_error('hashtag',false,false)?><br>
        </div>

        <input class="ui button positive" type="submit" value="추가/수정" onclick="return submitContents2(this);">
    </form>
</div>

<?php if(strpos($mode, "update") >-1 ){?>
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
	<div class="item">
		<a  onclick="confirm_callback(this,ajax_a,'복구할 방법이 없습니다. 삭제하시겠습니까?'); return false;" data-action="<?=site_url(admin_package_uri."/ajax_photo_delete/{$product->id}/photo")?>" href="#" class="ui button basic positive" style="float:right; clear:both;">삭제</a>
	</div>
	<?php } ?>
</div>
<!-- 이미지 업로드폼 끝 -->
<!-- 골프장 정보 표 폼 시작 -->
<div class="field">
	<h1 class="ui horizontal divider header">
        <i class="plus icon"></i>
		골프장 정보
    </h1>
	<form class="ui form" action="<?=site_url(admin_package_uri."/golf_add")?>" method="post" enctype='multipart/form-data'>
		<div class="field">
			<label>일차</label>
			<input type="text" name="days">
		</div>
		<div class="field">
			<input type="file" name="photo" />
		</div>
        <div class="field">
            <label>상세</label>
            <textarea name="detail"></textarea>
        </div>
        <input type="hidden" name="product_id" value="<?=$product->id?>">
        <input class="ui button positive" type="submit" value="일정 추가">
    </form>
    <br>
    <h3 class="ui left floated header">추가된 호텔 리스트</h3>
    <div class="ui clearing divider"></div>
    <ol class="ui list">
        <?php for($i=0 ; $i < count($golf); $i++){?>
        <div style="display:block">
            <li style="display:inline-block">
            	<?=$golf[$i]->days?>일차<br>
            	<img style="width:200px; height:auto;" src="<?=$golf[$i]->image?>"><br>
            	<?=nl2br($golf[$i]->detail)?>
            </li>
            <div><a onclick="confirm_callback(this,ajax_a,'복구할 방법이 없습니다. 삭제하시겠습니까?'); return false;" data-action="<?=site_url(admin_package_uri."/ajax_schedule_delete/{$golf[$i]->id}")?>" href="#" class="ui button basic positive">삭제</a></div>
        </div>
        <?php }?>
    </ol>
</div>
<!-- 골프장 정보 표 폼 끝 -->
<!-- 호텔 정보 표 폼 시작 -->
<div class="field">
	<h1 class="ui horizontal divider header">
        <i class="plus icon"></i>
		호텔 정보
    </h1>
	<form class="ui form" action="<?=site_url(admin_package_uri."/hotels_add")?>" method="post" enctype='multipart/form-data'>
		<div class="field">
			<label>일차</label>
			<input type="text" name="days">
	    </div>
		<div class="field">
			<input type="file" name="photo" />
		</div>
        <div class="field">
            <label>상세</label>
            <textarea name="detail"></textarea>
        </div>
        <input type="hidden" name="product_id" value="<?=$product->id?>">
        <input class="ui button positive" type="submit" value="일정 추가">
    </form>
    <br>
    <h3 class="ui left floated header">추가된 호텔 리스트</h3>
    <div class="ui clearing divider"></div>
    <ol class="ui list">
        <?php for($i=0 ; $i < count($hotels); $i++){?>
        <div style="display:block">
            <li style="display:inline-block">
            	<?=$hotels[$i]->days?>일차<br>
            	<img style="width:200px; height:auto;" src="<?=$hotels[$i]->image?>"><br>
            	<?=nl2br($hotels[$i]->detail)?>
            </li>
            <div><a onclick="confirm_callback(this,ajax_a,'복구할 방법이 없습니다. 삭제하시겠습니까?'); return false;" data-action="<?=site_url(admin_package_uri."/ajax_schedule_delete/{$hotels[$i]->id}")?>" href="#" class="ui button basic positive">삭제</a></div>
        </div>
        <?php }?>
    </ol>
</div>
<!-- 호텔 정보 표 폼 끝 -->
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
<?php }?>

<?php if(strpos($mode, "update") >-1 ){?>
		<div class="field">
            <!-- 위치  설정가기 -->
			<!-- <div id="target_<?//=$v_menus[$v_menu_id++]?>" class="sixteen wide column">
			<h1 class="ui horizontal divider header">
			    <i class="plus icon"></i>
			    위치 추가하기
			    </h1>
			
			    <div id="map" style="width:100%;height:500px;"></div>
			
			    <form  style="margin-top:20px;"class="ui form"onsubmit="ajax_submit(this); return false;" action="<?//=site_url(api_google_map_uri."/ajax_get_marker_by_address")?>" method="post">
			        <div class="field">
			            <input type="text"placeholder="주소" name="search">
			        </div>
			        <input class="ui button positive basic" type="submit" value="주소검색">
			    </form>
			    <form style="margin-top:20px;" class="ui form" onsubmit="ajax_submit(this); return false;" action="<?//=site_url(admin_package_uri."/ajax_update/{$product->id}")?>">
			            <input type="hidden" name="name" value="<?//=$product->name?>">
			        <div class="field">
			            <input type="text" name="address" placeholder="주소" value="<?//=set_value_data($product,'address')?>">
			        </div>
			        <div class="two fields">
			            <div class="field">
			                <input type="text" name="lat" placeholder="위도" value="<?//=set_value_data($product,'lat')?>">
			            </div>
			            <div class="field">
			                <input type="text" name="lng" placeholder="경도" value="<?//=set_value_data($product,'lng')?>">
			            </div>
			        </div>
			        <input class="ui button positive" type="submit" value="위치저장">
			    </form>
			
			    <?//=$this->map_api->create_script()?>
			    <?php //if($product->address !== ''){
			        //$this->map_api->add_marker($product->lat,$product->lng,$product->address,$product->map_name,$product->map_type);
			        //$this->map_api->move_to_location($product->lat,$product->lng);
			     //} ?>
			</div> -->
			<!-- 위치  설정가기 -->
			<br/>
        </div>
        <?php } ?>
<br>

<div class="sixteen wide column" style="margin-top:50px">
<a class="ui left labeled icon button  secondary" href="<?=my_site_url(admin_package_uri."/gets")?>">
    <i class="left arrow icon"></i>
    목록으로
</a>
<?php if(strpos($mode, "update") >-1 ){?>
    <a class="ui right labeled icon button  secondary" href="<?=my_site_url(golfpass_p_daily_price_admin_uri."/add/{$product->id}/".date('Y'))?>">
    <i class="right arrow icon"></i>
날자별 가격
</a>
<?php }?>
</div>

<script>
$('.ui.radio.checkbox')
  .checkbox()
;
$('.ui.checkbox')
  .checkbox()
;
</script>

<script type="text/javascript">
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
</script>