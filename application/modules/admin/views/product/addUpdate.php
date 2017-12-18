

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
        <a class="ui left labeled icon button  secondary" href="<?=my_site_url(admin_product_uri."/gets")?>">
            <i class="left arrow icon"></i>
            목록으로
        </a>
    <?php if(strpos($mode, "update") >-1 ){?>
            <a class="ui right labeled icon button  secondary" href="<?=my_site_url(golfpass_p_daily_price_admin_uri."/add/{$product->id}/".date('Y'))?>">
            <i class="right arrow icon"></i>
        날자별 가격
        </a>
        <a class="ui right labeled icon button  secondary" href="<?=my_site_url(shop_product_uri."/get/{$product->id}/")?>">
            <i class="right arrow icon"></i>
        사이트에서 보기
        </a>
    <?php }?>
</div>

<?php $v_menu_id = 0;?>
<div id="target_<?=$v_menus[$v_menu_id++]?>"class="sixteen wide column" style="margin-top:50px;">
    <h1 class="ui horizontal divider header">
        <i class="plus icon"></i>
        상품 추가/수정
    </h1>
   
    <!-- <form  class="ui form" <?=strpos($mode, "update") ? "onsubmit=\"ajax_submit(this); return false;\"": ""?> action="<?=my_site_url(admin_product_uri."/$mode")?>" method="post"> -->
    <form  class="ui form" action="<?=my_site_url(admin_product_uri."/$mode")?>" method="post">
        <div class="field">
            <label>상품이름</label>
            <input type="text" name="name" value="<?=set_value_data($product,'name')?>" > <?=form_error('name',false,false)?><br> 
        </div>
        <div class="field">
            <label>상품 영어이름</label>
            <input type="text" name="eng_name" value="<?=set_value_data($product,'eng_name')?>"> <?=form_error('eng_name',false,false)?><br>
        </div>
        <div class="field">
            <label>상품 설명</label>
            <!-- <input type="text" name="desc" value="<?=set_value_data($product,'desc')?>"> <?=form_error('desc',false,false)?><br> -->
            <textarea placeholder="내용" name="desc"><?=set_value_data($product,'desc')?></textarea>
        </div>
        <!-- <script src="<?=domain_url('/public/lib/ckeditor_full/ckeditor.js')?>"></script>
        <script>
        CKEDITOR.replace( 'desc',{
            filebrowserUploadUrl: '/index.php<?=common_uri?>/upload_receive_from_ck'
        } );

        </script> -->

        <div class="field">
            <label>지역</label>
        <input type="text" name="region" value="<?=set_value_data($product,'region')?>"> <?=form_error('region',false,false)?><br>
        </div>

        <div class="field">
            <label>홀수</label>
            <input type="text" name="hole_count" value="<?=set_value_data($product,'hole_count')?>"> <?=form_error('hole_count',false,false)?><br>
        </div>
        <div class="field">
            <label>코스타입</label>
            <input type="text" name="course_type" value="<?=set_value_data($product,'course_type')?>"> <?=form_error('course_type',false,false)?><br>
        </div>
        <div class="field">
            <label>코스구성</label>
            <input type="text" name="course_config" value="<?=set_value_data($product,'course_config')?>"> <?=form_error('course_config',false,false)?><br>
        </div>
        <div class="field">
            <label>파</label>
            <input type="text" name="pa" value="<?=set_value_data($product,'pa')?>"> <?=form_error('pa',false,false)?><br>
        </div>
        <div class="field">
            <label>길이</label>
            <input type="text" name="distance" value="<?=set_value_data($product,'distance')?>"> <?=form_error('distance',false,false)?><br>
        </div>
        <div class="field">
            <label>잔디 타입</label>
            <input type="text" name="grass_type" value="<?=set_value_data($product,'grass_type')?>"> <?=form_error('grass_type',false,false)?><br>
        </div>
        <div class="field">
            <label>개장일</label>
            개장일<input type="text" name="open_day" value="<?=set_value_data($product,'open_day')?>"> <?=form_error('open_day',false,false)?><br>
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
            <label>싱글룸가격</label>
            <input type="text" name="singleroom_price" value="<?=set_value_data($product,'singleroom_price')?>"> <?=form_error('singleroom_price',false,false)?><br>
        </div>
        <div class="field">
            <label>전화번호</label>
            <input type="text" name="number" value="<?=set_value_data($product,'number')?>"> <?=form_error('number',false,false)?><br>
        </div>
        <!-- <div class="field">
            <label>가격</label>
            가격<input type="text" name="price" value="<?=set_value_data($product,'price')?>"> <?=form_error('price',false,false)?><br>
        </div> -->
        <!-- <div class="field">
            <label>평일 가격</label>
            <input type="text" name="weekday_price" value="<?=set_value_data($product,'weekday_price')?>"> <?=form_error('weekday_price',false,false)?><br>
        </div> -->
        <!-- <div class="field">
            <label>주말 가격</label>
            <input type="text" name="weekend_price" value="<?=set_value_data($product,'weekend_price')?>"> <?=form_error('weekend_price',false,false)?><br>
        </div> -->
        <!-- <div class="field">
            <label>공휴일 가격</label>
            <input type="text" name="holiday_price" value="<?=set_value_data($product,'holiday_price')?>"> <?=form_error('holiday_price',false,false)?><br>
        </div> -->
        <div class="field">
            <label>해시 태그- 예시)앙사나골프텔,라오골프텔 (띄어쓰기 없이 쉼표로 구분)</label>
            <input placeholder="앙사나골프텔,라오골프텔"type="text" name="hashtag" value="<?=set_value_data($product,'hashtag')?>"> <?=form_error('hashtag',false,false)?><br>
        </div>

        <input class="ui button positive" type="submit" value="추가/수정">
    </form>
</div>


<?php if(strpos($mode, "update") >-1 ){?>

<!-- 상품 홀추가 옵션 -->

<div id="target_<?=$v_menus[$v_menu_id++]?>" class="sixteen wide column" style="margin-top:50px;">
    <h1 class="ui horizontal divider header">
        <i class="plus icon"></i>
        상품 홀 추가 가격
    </h1>

    <form onsubmit="ajax_submit(this); return false;" class="ui form" action="<?=my_site_url(admin_product_uri."/ajax_option_add/hole_option")?>" method="post">
        <input type="hidden" name="product_id" value="<?=$product->id?>">
        <div class="two fields">
            <div class="field">
                <label>이름</label>
                <input type="text" name="name" value="" placeholder="이름" > <?=form_error('name',false,false)?><br> 
            </div>
            <div class="field">
                <label>몇인조</label>
                <input type="text" name="option_1" value="0" > <?=form_error('option_1',false,false)?><br> 
            </div>
        </div>
        <div class="two fields">
            <div class="field">
                <label>가격</label>
                <input type="text" name="price" value="0" > <?=form_error('eng_name',false,false)?><br>
            </div>
            <div class="field">
                <label>순서</label>
                <input type="text" name="sort" value="0" > <?=form_error('sort',false,false)?><br> 
            </div>
        </div>
        <div class="field">
            평일 <input type="radio" name="option_2" value="work_day">
            주말 <input type="radio" name="option_2" value="week_day">
        </div>
        <input class="ui button positive" type="submit" value="추가">
    </form>

    <br>
    <h3 class="ui left floated header">추가된 홀 추가 리스트</h3>
    <div class="ui clearing divider"></div>

    <ol class="ui list">
        <?php for($i=0 ; $i < count($hole_options); $i++){?>
            <div style="display:block">
           
            <form  onsubmit="ajax_submit(this); return false;" style="display:inline-block" class="ui form" style="display:inline-block;" action="<?=my_site_url(admin_product_uri."/ajax_option_update/{$hole_options[$i]->id}")?>" method="post">
            이름     <input value="<?=set_value_data($hole_options[$i],'name')?>" type="text" name="name" style="display:inline-block; width:120px;">
            몇인조<input value="<?=set_value_data($hole_options[$i],'option_1')?>" type="text" name="option_1" style="display:inline-block; width:80px;">
            평일 <input type="radio" name="option_2" value="work_day"  <?=my_set_checked($hole_options[$i],"option_2","work_day")?> style="display:inline-block; ">
            주말 <input type="radio" name="option_2" value="week_day" <?=my_set_checked($hole_options[$i],"option_2","week_day")?> style="display:inline-block; ">
            가격  <input value="<?=set_value_data($hole_options[$i],'price')?>" type="text" name="price" style="display:inline-block; width:120px;">
            순서  <input value="<?=set_value_data($hole_options[$i],'sort')?>" type="text" name="sort" style="display:inline-block; width:50px;">
                <input class="ui button basic positive" type="submit" value="수정">
            </form>
            <a onclick="confirm_callback(this,ajax_a,'복구할 방법이 없습니다. 삭제하시겠습니까?'); return false;" data-action="<?=site_url(admin_product_uri."/ajax_option_delete/{$hole_options[$i]->id}/hole_option")?>" href="#" class="ui button basic positive" style="display:inline-block">삭제</a>
            </div>
        <?php }?>
    </ol>


</div>   
<!-- 상품 홀추가 옵션 -->
<!-- 상품메인옵션 -->

<div id="target_<?=$v_menus[$v_menu_id++]?>" class="sixteen wide column" style="margin-top:50px;">
    <h1 class="ui horizontal divider header">
        <i class="plus icon"></i>
        상품메인 옵션 추가
    </h1>

    <form onsubmit="ajax_submit(this); return false;" class="ui form" action="<?=my_site_url(admin_product_uri."/ajax_option_add/main_option")?>" method="post">
        <input type="hidden" name="product_id" value="<?=$product->id?>">
        <div class="field">
            <label>옵션이름</label>
            <input type="text" name="name" value="" placeholder="이름" > <?=form_error('name',false,false)?><br> 
        </div>
        <div class="two fields">
            <div class="field">
                <label>가격</label>
                <input type="text" name="price" value="0" > <?=form_error('eng_name',false,false)?><br>
            </div>
            <div class="field">
                <label>순서</label>
                <input type="text" name="sort" value="0" > <?=form_error('sort',false,false)?><br> 
            </div>
        </div>
        <input class="ui button positive" type="submit" value="추가">
    </form>

    <br>
    <h3 class="ui left floated header">추가된 추가설명 리스트</h3>
    <div class="ui clearing divider"></div>

    <ol class="ui list">
        <?php for($i=0 ; $i < count($main_options); $i++){?>
            <div style="display:block">
           
            <form  onsubmit="ajax_submit(this); return false;" style="display:inline-block" class="ui form" style="display:inline-block;" action="<?=my_site_url(admin_product_uri."/ajax_option_update/{$main_options[$i]->id}")?>" method="post">
            이름     <input value="<?=set_value_data($main_options[$i],'name')?>" type="text" name="name" style="display:inline-block; width:120px;">
            가격  <input value="<?=set_value_data($main_options[$i],'price')?>" type="text" name="price" style="display:inline-block; width:120px;">
            순서  <input value="<?=set_value_data($main_options[$i],'sort')?>" type="text" name="sort" style="display:inline-block; width:50px;">
                <input class="ui button basic positive" type="submit" value="수정">
            </form>
            <a onclick="confirm_callback(this,ajax_a,'복구할 방법이 없습니다. 삭제하시겠습니까?'); return false;" data-action="<?=site_url(admin_product_uri."/ajax_option_delete/{$main_options[$i]->id}/main_option")?>" href="#" class="ui button basic positive" style="display:inline-block">삭제</a>
            </div>
        <?php }?>
    </ol>


</div>   
<!-- 상품메인옵션 -->

<!-- 분류 추가 시작 -->
<div id="target_<?=$v_menus[$v_menu_id++]?>" class="sixteen wide column" style="margin-top:50px;">
    <h1 class="ui horizontal divider header">
        <i class="plus icon"></i>
        분류추가
    </h1>
    <form class="ui form" onsubmit="ajax_submit(this); return false;" action="<?=site_url(admin_ref_cate_product_uri."/ajax_add")?>" method="post">
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
            <li style="display:inline-block"><a href="<?=my_site_url(admin_product_category_uri."/update/{$product_categories[$i]->cate_id}")?>"><?=$product_categories[$i]->name?></a></li>
            <form class="ui form" onsubmit="ajax_submit(this); return false;" method="post"action="<?=site_url(admin_ref_cate_product_uri."/ajax_update/{$product_categories[$i]->id}")?>" style="display:inline">
                <input style ="width:50px;"type="text" name="sort"  value="<?=set_value_data($product_categories[$i],'sort')?>" style="display:inline">   
                <input class="ui button basic positive" type="submit" value="순서 수정"> 
            </form>
            <!-- <a class="ui button basic positive" onclick="confirm_redirect('<?=site_url(admin_ref_cate_product_uri."/delete/{$product_categories[$i]->id}")?>','정말 삭제하시겠습니까')" href="#">삭제</a> -->
            <a onclick="confirm_callback(this,ajax_a,'복구할 방법이 없습니다. 삭제하시겠습니까?'); return false;" data-action="<?=site_url(admin_ref_cate_product_uri."/ajax_delete/{$product_categories[$i]->id}")?>" href="#" class="ui button basic positive">삭제</a>
        </div>
        <?php }?>
    </ol>

</div>   
<!-- 분류 추가 끝-->
<?php }?>


<!-- 호텔 추가 시작 -->
<?php if(strpos($mode, "update") >-1 ){?>
<div id="target_<?=$v_menus[$v_menu_id++]?>" class="sixteen wide column" style="margin-top:50px;">
    <h1 class="ui horizontal divider header">
    <i class="plus icon"></i>
    호텔 추가
    </h1>
    <form class="ui form" onsubmit="ajax_submit(this); return false;" action="<?=site_url(admin_hotel_uri."/ajax_ref_product_add")?>" method="post">
    
    <div class="grouped  fields">
        <label for="hotel_id">호텔목록</label>
        <?php for($i=0 ; $i<count($hotels) ; $i++){
        if($i%5 === 0) echo "<br>"    ;?>
        <div class="field" >
            <div class="ui radio checkbox" >
                <input type='radio' name='hotel_id' value='<?=$hotels[$i]->id?>' />
                <label><a href="<?=my_site_url(admin_hotel_uri."/update/{$hotels[$i]->id}")?>"><?=$hotels[$i]->name?></a></label>
            </div>
        </div>
        <?php }
        ?>
    </div>
    <input type="hidden" name="product_id" value="<?=$product->id?>">
    <br>
    <input class="ui button positive" type="submit" value="호텔 추가">
    </form>
    <!-- 호텔 추가 끝 -->

    <br>
    <h3 class="ui left floated header">추가된 호텔 리스트</h3>
    <div class="ui clearing divider"></div>
    <!-- ref 호텔목록 -->
    <ol class="ui list">
        <?php for($i=0 ; $i < count($p_ref_hotel); $i++){?>
            <div style="display:block">
            <li style="display:inline-block"><a href="<?=my_site_url(admin_hotel_uri."/update/{$p_ref_hotel[$i]->hotel_id}")?>"><?=$p_ref_hotel[$i]->name?></a></li>
            <!-- <a class="ui button basic positive" onclick="confirm_redirect('<?=site_url(admin_hotel_uri."/ref_product_delete/{$p_ref_hotel[$i]->id}")?>','정말 삭제하시겠습니까')" href="#">삭제</a> -->
            <a onclick="confirm_callback(this,ajax_a,'복구할 방법이 없습니다. 삭제하시겠습니까?'); return false;" data-action="<?=site_url(admin_hotel_uri."/ajax_ref_product_delete/{$p_ref_hotel[$i]->id}")?>" href="#" class="ui button basic positive" >삭제</a>
        </div>
        <?php }?>
    </ol>
</div>
<!-- ref 호텔목록 -->
<?php }?>



<!-- 상품서브설명  시작 -->
<?php if(strpos($mode, "update") >-1 ){?>
<div id="target_<?=$v_menus[$v_menu_id++]?>" class="sixteen wide column" style="margin-top:50px;">
    <h1 class="ui horizontal divider header">
    <i class="plus icon"></i>
    추가설명 
    </h1>
    <form onsubmit="ajax_submit(this); return false;" class="ui form" action="<?=my_site_url(admin_product_uri."/ajax_option_add/desc")?>" method="post">
        <input type="hidden" name="product_id" value="<?=$product->id?>">

        <div class="field">
            <label>내용</label>
            <input type="text" name ="name">
        </div>
        <div class="field">
            <label>순서</label>
            <input type="text" name="sort" value="1">
        </div>
      
         <input class="ui button positive" type="submit" value="상품 서브 설명 추가">
    </form>
    <br>
    <h3 class="ui left floated header">추가된 추가설명 리스트</h3>
    <div class="ui clearing divider"></div>

    <ol class="ui list">
        <?php for($i=0 ; $i < count($descs); $i++){?>
            <div style="display:block">
            <li style="display:inline-block" ><?=$descs[$i]->name?></li>
            순서수정
            <form  onsubmit="ajax_submit(this); return false;" style="display:inline-block" class="ui form" style="display:inline-block;" action="<?=my_site_url(admin_product_uri."/ajax_option_update/{$descs[$i]->id}")?>" method="post">
                <input value="<?=set_value_data($descs[$i],'sort')?>" type="text" name="sort" style="display:inline-block; width:50px;">
                <input class="ui button basic positive" type="submit" value="순서수정">
            </form>
            <!-- <a  class="ui button basic positive" style="display:inline-block"onclick="confirm_redirect('<?=site_url(admin_product_uri."/option_delete/{$descs[$i]->id}/desc")?>','정말 삭제하시겠습니까')" href="#">삭제</a> -->
            <a onclick="confirm_callback(this,ajax_a,'복구할 방법이 없습니다. 삭제하시겠습니까?'); return false;" data-action="<?=site_url(admin_product_uri."/ajax_option_delete/{$descs[$i]->id}/desc")?>" href="#" class="ui button basic positive" style="display:inline-block">삭제</a>
            </div>
        <?php }?>
    </ol>
</div>
<?php }?>
<!-- 상품서브설명  끝-->

<!-- 상품옵션 시작 -->
<?php if(strpos($mode, "update") >-1 ){?>
<div id="target_<?=$v_menus[$v_menu_id++]?>" class="sixteen wide column" style="margin-top:50px;">
    <h1 class="ui horizontal divider header">
    <i class="plus icon"></i>
    상품옵션
    </h1>

    <div class="inline field">
        </div>
    <form class="ui form"   onsubmit="ajax_submit(this); return false;"  action="<?=my_site_url(admin_product_uri."/ajax_options_reset")?>" method ="post">
        <?php 
   
        for($i=0 ; $i < count($p_options); $i++){?>
        <div class="ui checkbox">
          <input type="checkbox" tabindex="0" class="hidden" name="option[]" value="<?=$p_options[$i]?>" <?=my_set_checked_arr($options,'name',$p_options[$i])?>>
          <label><?=$p_options[$i]?></label>
        </div>
        <?php }?>
    
    
    <input type="hidden" name="product_id" value="<?=$product->id?>">
    <br>
    <input style="margin-top:10px;" class="ui button positive" type="submit" value="상품옵션 추가">
    </form>
</div>
<?php }?>
<!-- 상품옵션 끝-->

<br>
<!-- 이미지 업로드폼 시작 -->
<?php if(strpos($mode, "update") >-1 ){?>
<div id="target_<?=$v_menus[$v_menu_id++]?>" class="sixteen wide column" style="margin-top:50px;">
    <h1 class="ui horizontal divider header">
    <i class="plus icon"></i>
    이미지 추가
    </h1>
    <form class="ui form"  method="POST" action="<?=my_site_url(admin_product_uri."/upload_photo")?>" enctype='multipart/form-data'>
        <!-- <div class="two fields">
                <div class="field">
                    <label for="photo">이미지</label>
                    <input type='file' name='photo'/>
                </div>
                <div class="field">
                    <label for="sort">순서</label>
                    <input type="text" name='sort'/>
                </div>
        </div> -->
        <div class="field">
                <label for="photo">이미지</label>
                <input multiple="multiple" type="file" name="photo[]" />
        </div>
    
        <input type="hidden" name='product_id' value="<?=$product->id?>"/>
        <br>
        <input class="ui button positive" type="submit" value="보내기"style="">
    </form>
    <br>
    <h3 class="ui left floated header">추가된 이미지 리스트</h3>
    <div class="ui clearing divider"></div>
    <!-- 이미지 업로드폼 끝 -->
    <div class="ui list">
        <?php for($i=0 ; $i < count($photos); $i++){?>
            <img style="width:200px; height:auto;"  src="<?=$photos[$i]->name?>" alt="">
            <div class="item">
                <form onsubmit="ajax_submit(this); return false;" class="ui form" style="display:inline-block;" action="<?=my_site_url(admin_product_uri."/ajax_option_update/{$photos[$i]->id}")?>" method="post">
                    <input value="<?=set_value_data($photos[$i],'sort')?>" type="text" name="sort" style="display:inline-block; width:50px;">
                    <input class="ui button basic positive" type="submit" value="순서수정">
                    <!-- <a class="ui button basic positive" style="float:right; clear:both;"onclick="confirm_redirect('<?=site_url(admin_product_uri."/option_delete/{$photos[$i]->id}/photo")?>','정말 삭제하시겠습니까')" href="#">삭제</a> -->
                    <a  onclick="confirm_callback(this,ajax_a,'복구할 방법이 없습니다. 삭제하시겠습니까?'); return false;" data-action="<?=site_url(admin_product_uri."/ajax_option_delete/{$photos[$i]->id}/photo")?>" href="#" class="ui button basic positive" style="float:right; clear:both;">삭제</a>
                </form>
            </div>
        <?php }?>
    </div>
</div>

<!-- 위치  설정가기 -->
<div id="target_<?=$v_menus[$v_menu_id++]?>" class="sixteen wide column">
<h1 class="ui horizontal divider header">
    <i class="plus icon"></i>
    위치 추가하기
    </h1>

    <div id="map" style="width:100%;height:500px;"></div>

    <form  style="margin-top:20px;"class="ui form"onsubmit="ajax_submit(this); return false;" action="<?=site_url(api_google_map_uri."/ajax_get_marker_by_address")?>" method="post">
        <div class="field">
                <!-- <label >이미지</label> -->
            <input type="text"placeholder="주소" name="search">
        </div>
        <input class="ui button positive basic" type="submit" value="주소검색">
    </form>
    <form style="margin-top:20px;" class="ui form" onsubmit="ajax_submit(this); return false;" action="<?=site_url(admin_product_uri."/ajax_update/{$product->id}")?>">
            <input type="hidden" name="name" value="<?=$product->name?>">
        <div class="two fields">    
            <div class="field">
                <input type="text" name="map_name" placeholder="업소이름" value="<?=set_value_data($product,'map_name')?>">
            
            </div>
            <div class="field">
                <input type="text" name="map_type" placeholder="업소타입" value="<?=set_value_data($product,'map_type')?>">
            </div>
        </div>
        <div class="field">
            <input type="text" name="address" placeholder="주소" value="<?=set_value_data($product,'address')?>">
        </div>
        <div class="two fields">
            <div class="field">
                <input type="text" name="lat" placeholder="위도" value="<?=set_value_data($product,'lat')?>">
            </div>
            <div class="field">
                <input type="text" name="lng" placeholder="경도" value="<?=set_value_data($product,'lng')?>">
            </div>
        </div>
        <input class="ui button positive" type="submit" value="위치저장">
    </form>

    <?=$this->map_api->create_script()?>
    <?php if($product->address !== ''){
        $this->map_api->add_marker($product->lat,$product->lng,$product->address,$product->map_name,$product->map_type);
        $this->map_api->move_to_location($product->lat,$product->lng);
     } ?>
</div>
<!-- 위치  설정가기 -->
<?php }?>



<div class="sixteen wide column" style="margin-top:50px">
<a class="ui left labeled icon button  secondary" href="<?=my_site_url(admin_product_uri."/gets")?>">
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