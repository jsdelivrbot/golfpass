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

<style>
  table {
    width: 100%;
    /* border: 1px solid #444444; */
    border-collapse: collapse;
  }
  th, td {
    border: 1px solid #444444;
    padding: 10px;
  }
  .green{
      background-color:rgba(0,200,0,0.5);
  }
</style>



1월
<table>
<tr>
<td>1월</td>
<td>2월</td>
<td>3월</td>
<td>4월</td>
<td>5월</td>
<td>6월</td>
<td>7월</td>
<td>8월</td>
<td>9월</td>
<td>10월</td>
<td>11월</td>
<td>12월</td>
</tr>
</table>


<table>

<thead>
<tr >
    <th>
        날자
    </th>
    <?php for($i=1 ; $i <= (int)$maxium_num_peple; $i++){?>
    <th class="col" colspan=2>
        <?=$i?>인
    </th>
<?php }?>
</tr>
</thead>
<tbody>

<?php 
$tmp_month = "01";
for($z= 0 ; $z < 366 ; $z++){
// $date = date("${year}-01-01",strtotime ("+{$z} days"));    
$date = strtotime("+{$z} day",strtotime("$year-01-01"));
$date = date('Y-m-d', $date);


if($tmp_month !== date('m', strtotime($date)))
{
    $tmp_month = date('m', strtotime($date));
    ?>
    </tbody>
    </table>
    <br>
    <br>
    <br>
   <b><?=$tmp_month?>월</b>
        
    <table>

    <thead>
    <tr >
        <th>
            날자
        </th>
        <?php for($i=1 ; $i <= (int)$maxium_num_peple; $i++){?>
        <th class="col" colspan=2>
            <?=$i?>인
        </th>
    <?php }?>
    </tr>
    </thead>
    <tbody>

<?php
}

?>

    <tr class="dataset">
        <!-- 날짜 -->
        <td class="row" rowspan=<?=$num_period?>><?=$date?></td> 
        <!-- 날짜 -->

        <!-- 명당 가격 시작 -->
        <?php for($i=1 ; $i <= (int)$maxium_num_peple; $i++){?>
        <!--1일 or 2일 가격 -->
        <td  class="row <?=isset($price[$date][$i][1+$start_plus])?( $price[$date][$i][1+$start_plus] !=="0" ? "green" : "red") : "red"?>" rowspan=<?=$num_period?>><?=(0+$start_plus)."박".(1+$start_plus)."일"?><br><?=$price[$date][$i][1+$start_plus] ?? 0?></td>
        <!--1일 or 2일 가격-->
            <?php if($num_period !== 0){?>
            <!-- 2일or 3일 가격 -->
            <td  class="colspan <?=isset($price[$date][$i][2+$start_plus])?( $price[$date][$i][2+$start_plus] !=="0" ? "green" : "red") : "red"?>" style="width:50px;"><?=(1+$start_plus)."박".(2+$start_plus)."일"?><br><?=$price[$date][$i][2+$start_plus] ?? 0?></td>
            <!-- 2일or 3일 가격 -->
            <?php }?>
        <?php }?>
         <!-- 명당가격 끝 -->
    </tr>

    <!-- 기간별/명당 가격 -->
    <?php for($i=1 ; $i < (int)$num_period; $i++){?>
        <tr class="rowspan">
        <?php for($j=1 ; $j <= (int)$maxium_num_peple; $j++){?>
            <td class="<?=isset($price[$date][$j][$i+2+$start_plus])?( $price[$date][$j][$i+2+$start_plus] !=="0" ? "green" : "red") : "red"?>"><?=($i+1+$start_plus)."박".($i+2+$start_plus)."일"?><br><?=$price[$date][$j][$i+2+$start_plus] ?? 0?></td>
            <?php }?>
        </tr>
    <?php }?>
    <!-- 기간별/명당 가격 -->
   
    
<?php }?>
</tbody>

</table>

<!-- 
<script>    
var tds = document.getElementsByTagName("td");


for(var i = 0 ; i < tds.length ; i++)
{
    var text = tds[i].innerText
    var startIdx =text.indexOf("일")
    text=text.replace("\n","");
    text=text.replace("<br>","");
    text=text.replace("\r\n","");
    text =text.substring(startIdx+1,text.length);

    if(text === "0")
    {
        tds[i].style.color = "red";
    }
}

</script> -->