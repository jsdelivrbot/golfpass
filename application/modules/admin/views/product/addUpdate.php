


<style>
    li{
        display:inline;
    }
</style>
<a href="<?=my_site_url(admin_product_uri."/gets")?>">목록으로</a>

<form action="<?=my_site_url(admin_product_uri."/$mode")?>" method="post">
상품이름<input type="text" name="name" value="<?=set_value_data($product,'name')?>" > <?=form_error('name',false,false)?><br> 
상품 영어이름<input type="text" name="eng_name" value="<?=set_value_data($product,'eng_name')?>"> <?=form_error('eng_name',false,false)?><br>
상품 설명<input type="text" name="desc" value="<?=set_value_data($product,'desc')?>"> <?=form_error('desc',false,false)?><br>
지역<input type="text" name="region" value="<?=set_value_data($product,'region')?>"> <?=form_error('region',false,false)?><br>
홀수<input type="text" name="hole_count" value="<?=set_value_data($product,'hole_count')?>"> <?=form_error('hole_count',false,false)?><br>
코스 타입<input type="text" name="course_type" value="<?=set_value_data($product,'course_type')?>"> <?=form_error('course_type',false,false)?><br>
파<input type="text" name="pa" value="<?=set_value_data($product,'pa')?>"> <?=form_error('pa',false,false)?><br>
길이<input type="text" name="distance" value="<?=set_value_data($product,'distance')?>"> <?=form_error('distance',false,false)?><br>
잔디 타입<input type="text" name="grass_type" value="<?=set_value_data($product,'grass_type')?>"> <?=form_error('grass_type',false,false)?><br>
개장일<input type="text" name="open_day" value="<?=set_value_data($product,'open_day')?>"> <?=form_error('open_day',false,false)?><br>
평일 가격<input type="text" name="weekday_price" value="<?=set_value_data($product,'weekday_price')?>"> <?=form_error('weekday_price',false,false)?><br>
주말 가격<input type="text" name="weekend_price" value="<?=set_value_data($product,'weekend_price')?>"> <?=form_error('weekend_price',false,false)?><br>
공휴일 가격<input type="text" name="holiday_price" value="<?=set_value_data($product,'holiday_price')?>"> <?=form_error('holiday_price',false,false)?><br>
<!-- 가격<input type="text" name="price" value="<?=set_value_data($product,'price')?>"> <?=form_error('price',false,false)?><br> -->
<input type="submit" value="보내기">
</form>

<!-- 분류 추가 시작 -->
<?php if(strpos($mode, "update") >-1 ){?>
    <BR>  
    <form action="<?=site_url(admin_ref_cate_product_uri."/add")?>" method="post">
분류목록<select name="cate_id" id="">
<?php
for($i=0 ; $i<count($categories) ; $i++){?>
    <option value="<?=$categories[$i]->id?>"><?=string_for("&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp",$categories[$i]->deep)?><?=$categories[$i]->name?></option>
<?php }
?>
</select>
순서<input type="text" name="sort" value="0">
<input type="hidden" name="product_id" value="<?=$product->id?>">
<br>
<input type="submit" value="분류 추가">
</form>
<ul>
    <?php for($i=0 ; $i < count($product_categories); $i++){?>
        <div style="display:block">
        <li><a href="<?=my_site_url(admin_product_category_uri."/update/{$product_categories[$i]->cate_id}")?>"><?=$product_categories[$i]->name?></a></li>
        <form onsubmit="ajax_submit(this); return false;" method="post"action="<?=site_url(admin_ref_cate_product_uri."/ajax_update/{$product_categories[$i]->id}")?>" style="display:inline-blcok">
            <input style ="width:50px;"type="text" name="sort"  value="<?=set_value_data($product_categories[$i],'sort')?>" style="display:inline-blcok">   
            <input type="submit" value="순서 수정"> 
        </form>
        <a onclick="confirm_redirect('<?=site_url(admin_ref_cate_product_uri."/delete/{$product_categories[$i]->id}")?>','정말 삭제하시겠습니까')" href="#">삭제</a>
    </div>
    <?php }?>
    </ul>

    
<?php }?>
<!-- 분류 추가 끝-->


<!-- 호텔 추가 시작 -->
<?php if(strpos($mode, "update") >-1 ){?>
    <BR>
<form action="<?=site_url(admin_hotel_uri."/ref_product_add")?>" method="post">
호텔목록
<?php
for($i=0 ; $i<count($hotels) ; $i++){
    if($i%5 === 0) echo "<br>"    ;?>
<input type='radio' name='hotel_id' value='<?=$hotels[$i]->id?>' /><a href="<?=my_site_url(admin_hotel_uri."/update/{$hotels[$i]->id}")?>"><?=$hotels[$i]->name?></a></label>

<?php }
?>
<input type="hidden" name="product_id" value="<?=$product->id?>">
<br>
<input type="submit" value="호텔 추가">
</form>
<!-- 호텔 추가 끝 -->

<!-- ref 호텔목록 -->
<ul>
    <?php for($i=0 ; $i < count($p_ref_hotel); $i++){?>
        <div style="display:block">
        <li ><a href="<?=my_site_url(admin_hotel_uri."/update/{$p_ref_hotel[$i]->hotel_id}")?>"><?=$p_ref_hotel[$i]->name?></a></li>
        <a onclick="confirm_redirect('<?=site_url(admin_hotel_uri."/ref_product_delete/{$p_ref_hotel[$i]->id}")?>','정말 삭제하시겠습니까')" href="#">삭제</a>
    </div>
    <?php }?>
</ul>
<!-- ref 호텔목록 -->
<?php }?>



<!-- 상품서브설명  시작 -->
<?php if(strpos($mode, "update") >-1 ){?>
<br>
<form action="<?=my_site_url(admin_product_uri."/option_add/desc")?>" method="post">
<input type="hidden" name="product_id" value="<?=$product->id?>">
내용<input type="text" name ="name">
순서<input type="text" name="sort" value="1">
<br>
<input type="submit" value="상품 서브 설명 추가">
</form>
<ul>
    <?php for($i=0 ; $i < count($descs); $i++){?>
        <div style="display:block">
        <li ><?=$descs[$i]->name?></li>
        순서수정
        <form style="display:inline-block;" action="<?=my_site_url(admin_product_uri."/option_update/{$descs[$i]->id}")?>" method="post">
            <input value="<?=set_value_data($descs[$i],'sort')?>" type="text" name="sort" style="display:inline-block; width:50px;">
            <input type="submit" value="보내기">
        </form>
        <a style="display:inline-block"onclick="confirm_redirect('<?=site_url(admin_product_uri."/option_delete/{$descs[$i]->id}/desc")?>','정말 삭제하시겠습니까')" href="#">삭제</a>
        </div>
    <?php }?>
</ul>
<?php }?>
<!-- 상품서브설명  끝-->

<!-- 상품옵션 시작 -->
<?php if(strpos($mode, "update") >-1 ){?>
<form   action="<?=my_site_url(admin_product_uri."/options_reset")?>" method ="post">
  <input type="checkbox" name="option[]" value="한국스태프" <?=my_set_checked_arr($options,'name','한국스태프')?>> 한국스태프
  <input type="checkbox" name="option[]" value="와이파이(로비)" <?=my_set_checked_arr($options,'name','와이파이(로비)')?>>와이파이(로비)
  <input type="checkbox" name="option[]" value="와이파이(룸)" <?=my_set_checked_arr($options,'name','와이파이(룸)')?>>와이파이(룸)
  <input type="checkbox" name="option[]" value="공항 셔틀 버스" <?=my_set_checked_arr($options,'name','공항 셔틀 버스')?>>공항 셔틀 버스
  <input type="checkbox" name="option[]" value="수영장" <?=my_set_checked_arr($options,'name','수영장')?>>수영장
  <input type="checkbox" name="option[]" value="피트니스 센터" <?=my_set_checked_arr($options,'name','피트니스 센터')?>>피트니스 센터
  <input type="checkbox" name="option[]" value="사우나" <?=my_set_checked_arr($options,'name','사우나')?>>사우나
  <input type="checkbox" name="option[]" value="마사지 샵" <?=my_set_checked_arr($options,'name','마사지 샵')?>>마사지 샵<br>
  <input type="checkbox" name="option[]" value="커피숍" <?=my_set_checked_arr($options,'name','커피숍')?>>커피숍
  <input type="checkbox" name="option[]" value="레스토랑" <?=my_set_checked_arr($options,'name','레스토랑')?>>레스토랑
  <input type="checkbox" name="option[]" value="바" <?=my_set_checked_arr($options,'name','바')?>>바
  <input type="checkbox" name="option[]" value="룸 서비스" <?=my_set_checked_arr($options,'name','룸 서비스')?>>룸 서비스
  <input type="checkbox" name="option[]" value="+24시간 룸 서비스" <?=my_set_checked_arr($options,'name','+24시간 룸 서비스')?>>+24시간 룸 서비스
  <input type="checkbox" name="option[]" value="24시간 체크인" <?=my_set_checked_arr($options,'name','24시간 체크인')?>>24시간 체크인
  <input type="checkbox" name="option[]" value="레이트 체크 아웃" <?=my_set_checked_arr($options,'name','레이트 체크 아웃')?>>레이트 체크 아웃
  <input type="checkbox" name="option[]" value="금고" <?=my_set_checked_arr($options,'name','금고')?>>금고
  <input type="checkbox" name="option[]" value="헤어 드라이기" <?=my_set_checked_arr($options,'name','헤어 드라이기')?>>헤어 드라이기<br>
  <input type="checkbox" name="option[]" value="비데" <?=my_set_checked_arr($options,'name','비데')?>>비데
  <input type="checkbox" name="option[]" value="생수" <?=my_set_checked_arr($options,'name','생수')?>>생수
  <input type="checkbox" name="option[]" value="노래방" <?=my_set_checked_arr($options,'name','노래방')?>>노래방
  <input type="checkbox" name="option[]" value="편의점" <?=my_set_checked_arr($options,'name','편의점')?>>편의점
  <input type="checkbox" name="option[]" value="택시대기" <?=my_set_checked_arr($options,'name','택시대기')?>>택시대기
  <input type="checkbox" name="option[]" value="환전" <?=my_set_checked_arr($options,'name','환전')?>>환전
  <input type="checkbox" name="option[]" value="냉난방" <?=my_set_checked_arr($options,'name','냉난방')?>>냉난방
  <input type="checkbox" name="option[]" value="흡연가능" <?=my_set_checked_arr($options,'name','흡연가능')?>>흡연가능
  
  <input type="hidden" name="product_id" value="<?=$product->id?>">
  <br>
  <input type="submit" value="상품옵션 추가">
</form>
<?php }?>
<!-- 상품옵션 끝-->

<br>
<!-- 이미지 업로드폼 시작 -->
<?php if(strpos($mode, "update") >-1 ){?>
<form  method="POST" action="<?=my_site_url(admin_product_uri."/upload_photo")?>" enctype='multipart/form-data'>
    <input type='file' name='photo'/>
    순서<input type="text" name='sort'/>
    <input type="hidden" name='product_id' value="<?=$product->id?>"/>
    <br>
    <input type="submit" value="보내기"style="">
</form>
<!-- 이미지 업로드폼 끝 -->
<ul>
    <?php for($i=0 ; $i < count($photos); $i++){?>
        <div style="display:block ;width:200px; height:auto;" >
        <li style="display:block">
        
        <img style="width:200px; height:auto;"  src="<?=$photos[$i]->name?>" alt="">
        </li>
        <a style="float:right; clear:both;"onclick="confirm_redirect('<?=site_url(admin_product_uri."/option_delete/{$photos[$i]->id}/photo")?>','정말 삭제하시겠습니까')" href="#">삭제</a>
        </div>
        순서수정
        <form style="display:inline-block;" action="<?=my_site_url(admin_product_uri."/option_update/{$photos[$i]->id}")?>" method="post">
            <input value="<?=set_value_data($photos[$i],'sort')?>" type="text" name="sort" style="display:inline-block; width:50px;">
            <input type="submit" value="보내기">
        </form>
    <?php }?>
</ul>

<?php }?>
<a href="<?=my_site_url(admin_product_uri."/gets")?>">목록으로</a>