
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
<input type="submit" value="보내기">
</form>
<br>


<!-- 호텔옵션 시작 -->
<?php if(strpos($mode, "update") >-1 ){?>
<form   action="<?=my_site_url(admin_hotel_uri."/options_reset")?>" method ="post">
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
  
  <input type="hidden" name="hotel_id" value="<?=$row->id?>">
  <input type="submit" value="호텔옵션 추가">
</form>
<?php }?>
<!-- 호텔옵션 끝-->

<br>
<a href="<?=my_site_url(admin_hotel_uri."/gets")?>">목록으로</a>