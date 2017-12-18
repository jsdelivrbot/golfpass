
<style>
    li{
        display:inline;
    }
</style>

<form action="<?=my_site_url(admin_hotel_uri."/$mode")?>" method="post">
업체명<input type="text" name="name" value="<?=set_value_data($row,'name')?>" > <?=form_error('name',false,false)?><br> 
<!-- 호텔설명<input type="text" name="desc" value="<?=set_value_data($row,'desc')?>"> <?=form_error('desc',false,false)?><br> -->
객실 수<input type="text" name="room_count" value="<?=set_value_data($row,'room_count')?>"> <?=form_error('room_count',false,false)?><br>
객실 타입<input type="text" name="room_type" value="<?=set_value_data($row,'room_type')?>"> <?=form_error('room_type',false,false)?><br>
침실<input type="text" name="bedroom" value="<?=set_value_data($row,'bedroom')?>"> <?=form_error('bedroom',false,false)?><br>
화장실<input type="text" name="bathroom" value="<?=set_value_data($row,'bathroom')?>"> <?=form_error('bathroom',false,false)?><br>
최대 인원<input type="text" name="maxium_number_of_people" value="<?=set_value_data($row,'maxium_number_of_people')?>"> <?=form_error('maxium_number_of_people',false,false)?><br>
침대<input type="text" name="bed" value="<?=set_value_data($row,'bed')?>"> <?=form_error('bed',false,false)?><br>
체크인/체크아웃<input type="text" name="check_in_out" value="<?=set_value_data($row,'check_in_out')?>"> <?=form_error('check_in_out',false,false)?><br>
평일 가격<input type="text" name="weekday_price" value="<?=set_value_data($row,'weekday_price')?>"> <?=form_error('weekday_price',false,false)?><br>
주말 가격<input type="text" name="weekend_price" value="<?=set_value_data($row,'weekend_price')?>"> <?=form_error('weekend_price',false,false)?><br>
공휴일 가격<input type="text" name="holiday_price" value="<?=set_value_data($row,'holiday_price')?>"> <?=form_error('holiday_price',false,false)?><br>
전화번호<input type="text" name="number" value="<?=set_value_data($row,'number')?>"> <?=form_error('number',false,false)?><br>
<input type="submit" value="보내기">
</form>
<br>



<?php if(strpos($mode, "update") >-1 ){?>
<!-- 호텔옵션 시작 -->
<form   action="<?=my_site_url(admin_hotel_uri."/options_reset")?>" method ="post">
<?php 
       
        for($i=0 ; $i < count($h_options); $i++){?>
        <div class="ui checkbox">
          <input type="checkbox" tabindex="0" class="hidden" name="option[]" value="<?=$h_options[$i]?>" <?=my_set_checked_arr($options,'name',$h_options[$i])?>>
          <label><?=$h_options[$i]?></label>
        </div>
        <?php }?>


  
  <input type="hidden" name="hotel_id" value="<?=$row->id?>">
  <input type="submit" value="호텔옵션 추가">
</form>
<!-- 호텔옵션 끝-->

<!-- 호텔 ref 상품 시작 -->
상품 추가하기
<form method="post"action="<?=my_site_url(admin_hotel_uri."/ref_product_add")?>">
<input type="hidden" name="hotel_id" value="<?=$row->id?>">
<?php for($i=0; $i < count($products) ; $i++){
    if($i%5 === 0) echo "<br>"    ;
    ?>
<input type='radio' name='product_id' value='<?=$products[$i]->id?>' /><a href="<?=my_site_url(admin_product_uri."/update/{$products[$i]->id}")?>"><?=$products[$i]->name?></a></label>
<?php }?>
<input type="submit" value="보내기">
</form>

<br>
이 호텔과 연결된 상품 리스트
<ul>
    <?php for($i=0; $i<count($ref_products) ; $i++){?>
    
        <li><a href="<?=my_site_url(admin_product_uri."/update/{$ref_products[$i]->product_id}")?>"><?=$ref_products[$i]->name?></a></li>
        <li><a onclick="confirm_redirect('<?=my_site_url(admin_hotel_uri."/ref_product_delete/{$ref_products[$i]->id}")?>','정말 삭제하시겠습니까? 복구 할 방법이 없습니다.')" href="#">삭제</a></li>
        <br>
    <?php }?>

</ul>

<!-- 호텔 ref 상품 끝 -->




<!-- 이미지 업로드폼 시작 -->
<div  class="sixteen wide column" style="margin-top:50px;">
    <h1 class="ui horizontal divider header">
    <i class="plus icon"></i>
    이미지 추가
    </h1>
    <form class="ui form"  method="POST" action="<?=my_site_url(admin_hotel_uri."/upload_photo")?>" enctype='multipart/form-data'>
    
        <div class="field">
                <label for="photo">이미지</label>
                <input multiple="multiple" type="file" name="photo[]" />
        </div>
    
        <input type="hidden" name='hotel_id' value="<?=$hotel->id?>"/>
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
                <form onsubmit="ajax_submit(this); return false;" class="ui form" style="display:inline-block;" action="<?=my_site_url(admin_hotel_uri."/ajax_option_update/{$photos[$i]->id}")?>" method="post">
                    <input value="<?=set_value_data($photos[$i],'sort')?>" type="text" name="sort" style="display:inline-block; width:50px;">
                    <input class="ui button basic positive" type="submit" value="순서수정">
                    <a  onclick="confirm_callback(this,ajax_a,'복구할 방법이 없습니다. 삭제하시겠습니까?'); return false;" data-action="<?=site_url(admin_hotel_uri."/ajax_option_delete/{$photos[$i]->id}/photo")?>" href="#" class="ui button basic positive" style="float:right; clear:both;">삭제</a>
                </form>
            </div>
        <?php }?>
    </div>
</div>

<?php }?>
<br>
<a href="<?=my_site_url(admin_hotel_uri."/gets")?>">목록으로</a>

<script>
$('.ui.radio.checkbox')
  .checkbox()
;
$('.ui.checkbox')
  .checkbox()
;
</script>