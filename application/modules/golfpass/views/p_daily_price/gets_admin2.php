<link rel="stylesheet" href="//code.jquery.com/ui/1.8.18/themes/base/jquery-ui.css" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="//code.jquery.com/ui/1.8.18/jquery-ui.min.js"></script>
<script>
    $.datepicker.setDefaults({
        dateFormat: 'yy-mm-dd',
        prevText: '이전 달',
        nextText: '다음 달',
        monthNames: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
        monthNamesShort: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
        dayNames: ['일', '월', '화', '수', '목', '금', '토'],
        dayNamesShort: ['일', '월', '화', '수', '목', '금', '토'],
        dayNamesMin: ['일', '월', '화', '수', '목', '금', '토'],
        showMonthAfterYear: true,
        yearSuffix: 'Year'
    });

    $(function() {
        $("#datepicker1").datepicker();
    });
    
    $(function() {
        $("#datepicker2").datepicker();
    });
</script>

<form method="post" action="<?=my_site_url(golfpass_p_daily_price_admin_uri."/add/{$product->id}")?>">
시작날자: <input type="text" name="start_date" id="datepicker1" value="<?=set_value('start_date')?>">
끝시작: <input type="text" name="end_date" id="datepicker2" value="<?=set_value('end_date')?>">
    <bR>
가격<input type="text" name="price" value="2000">
    <bR>
        <input type="checkbox" name="period_times_sw" value="1" checked>
        배율<input type="text" name="period_times[]" value="1">
배율<input type="text" name="period_times[]" value="1">
배율<input type="text" name="period_times[]" value="1">
배율<input type="text" name="period_times[]" value="1">
<!-- 배율<input type="text" name="period_times[]" value="1"> -->
    <bR>
    <!-- <input type="checkbox" name="period[]" checked value="1">1일<br> -->
    <input type="checkbox" name="period[]" checked value="2">1박2일
    <input type="checkbox" name="period[]" checked value="3">2박3일
    <input type="checkbox" name="period[]" checked value="4">3박4일
    <input type="checkbox" name="period[]" checked value="5">4박5일

    <bR>
    <bR>
    <input type="checkbox" name="day[]" checked value="1">월
    <input type="checkbox" name="day[]" checked value="2">화
    <input type="checkbox" name="day[]" checked value="3">수
    <input type="checkbox" name="day[]" checked value="4">목
    <input type="checkbox" name="day[]" checked value="5">금
    <input type="checkbox" name="day[]" checked value="6">토
    <input type="checkbox" name="day[]" checked value="7">일
<br>
<br>
<input type="checkbox" name="num_people_sw_times" value="1">배율
배율<input type="text" name="num_people_times[]" value="1">
배율<input type="text" name="num_people_times[]" value="1">
배율<input type="text" name="num_people_times[]" value="1">
배율<input type="text" name="num_people_times[]" value="1">
<br>
    <input type="checkbox" name="num_people[]" value="1">1인
    <input type="checkbox" name="num_people[]" value="2">2인
    <input type="checkbox" name="num_people[]" value="3">3인
    <input type="checkbox" name="num_people[]" value="4">4인
    <input type="checkbox" name="num_people[]" value="5">5인
    <input type="checkbox" name="num_people[]" value="6">6인
    <input type="checkbox" name="num_people[]" value="7">7인
    <input type="checkbox" name="num_people[]" value="8">8인
    <input type="checkbox" name="num_people[]" value="9">9인
    <input type="checkbox" name="num_people[]" value="10">10인
    <input type="checkbox" name="num_people[]" value="11">11인
    <br>
<br>

    <input type="submit" value="Submit">
  </form>
  ㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡ
  <br>
<form method ="post" action="<?=my_site_url(golfpass_p_daily_price_admin_uri."/add/{$product->id}")?>">
    <select name="search_period" id="">
        <option value="2" <?=set_select('search_period',2)?>>1박2일</option>
        <option value="3" <?=set_select('search_period',3)?>>2박3일</option>
        <option value="4" <?=set_select('search_period',4)?>>3박4일</option>
        <option value="5" <?=set_select('search_period',5)?>>4박5일</option>
        <option value="6" <?=set_select('search_period',6)?>>5박6일</option>
        <option value="7" <?=set_select('search_period',7)?>>6박7일</option>
        <option value="8" <?=set_select('search_period',8)?>>7박8일</option>
        <option value="9" <?=set_select('search_period',9)?>>8박9일</option>
    </select>
    <input type="submit">
</form>
<table>
<tr>
<td>
날자
</td>
<?php for ($i= 1; $i <= (int)$maxium_num_peple; $i++) {?>
<td>
<?=$i?>명
</td>
<?php }?>
</tr>
<?php for ($i= 0; $i < count($daily_price); $i++) {?>

<tr>
<td>
<?=$daily_price[$i]['date']?>
</td>

<?php for ($j= 1; $j <= (int)$maxium_num_peple; $j++) {?>
<td>
<?=$daily_price[$i]["num_people_{$j}"]?>
</td>
<?php }?>
</tr>
<?php }?>
</table>
