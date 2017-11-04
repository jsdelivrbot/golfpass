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
        yearSuffix: '년'
    });

    $(function() {
        $("#datepicker1").datepicker();
    });
    
    $(function() {
        $("#datepicker2").datepicker();
    });
</script>
<div style="position:fixed; background-color: rgba(0,0,0,0.5)" >
<form method="post" action="<?=my_site_url(golfpass_p_daily_price_admin_uri."/add/{$product->id}")?>">
시작날자: <input type="text" name="start_date" id="datepicker1" value="<?=set_value('start_date')?>">
끝시작: <input type="text" name="end_date" id="datepicker2" value="<?=set_value('end_date')?>">
    <bR>
가격<input type="text" name="price" value="2000">
    <bR>
    <bR>
    배율
        <input type="checkbox" name="period_times_sw" value="1" checked>
        <br>
        <?php for($i=1;$i <= ((int)$num_period) +1 ; $i++ ){
            ?>
        <input  type="checkbox" name="period[]" checked value="<?=$i+1?>"><?="{$i}박".($i+1)."일"?>
        <input type="text" name="period_times[]" value="1">
        <?php }?>


    <bR>

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

<?php for($i=1;$i <= ((int)$maxium_num_peple) ; $i++ ){
            if($i%10 === 1) echo "<br>";
            ?>
            
        <input type="checkbox" name="num_people[]" value="<?=$i?>"><?="{$i}인"?>
        <input type="text" name="num_people_times[]" value="1" style="width:50px;">
        <?php }?>



    <br>
<br>

    <input type="submit" value="Submit">
  </form>
  
  <table>
  <tr>
  <td id="btn_month_1">1</td>
  <td>1</td>
  <td>1</td>
  <td>1</td>
  <td>1</td>
  <td>1</td>
  <td>1</td>
  <td>1</td>
  </tr>
  </table>
  ㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡ
  </div>
  <br>
<!-- <form method ="post" action="<?=my_site_url(golfpass_p_daily_price_admin_uri."/add/{$product->id}")?>">
    <select name="search_period" id="">
        <option value="2" <?=set_select('search_period', 2)?>>1박2일</option>
        <option value="3" <?=set_select('search_period', 3)?>>2박3일</option>
        <option value="4" <?=set_select('search_period', 4)?>>3박4일</option>
        <option value="5" <?=set_select('search_period', 5)?>>4박5일</option>
        <option value="6" <?=set_select('search_period', 6)?>>5박6일</option>
        <option value="7" <?=set_select('search_period', 7)?>>6박7일</option>
        <option value="8" <?=set_select('search_period', 8)?>>7박8일</option>
        <option value="9" <?=set_select('search_period', 9)?>>8박9일</option>
    </select>
    <input type="submit">
</form> -->

<style>
  table {
    width: 10000px;
    /* border: 1px solid #444444; */
    border-collapse: collapse;
  }
  th, td {
    border: 1px solid #444444;
    padding: 10px;
    width:300px;
  }
  .green{
      background-color:rgba(0,200,0,0.5);
  }

</style>

<?php for ($m =1; $m<=12; $m++) {
    $num_days = cal_days_in_month (CAL_GREGORIAN, $m, $year);
?>
<br>
<br>
<br>

<?="{$m}월"?>
<table>
<thead>
<tr >
    <th>
        날자
    </th>
    <?php for ($i=1; $i <= (int)$maxium_num_peple; $i++) {?>
    <th class="col" colspan=2>
        <?=$i?>인
    </th>
<?php }?>
</tr>
</thead>

<tbody>

<?php for ($d =1; $d <= $num_days; $d++) {
    $date = date("Y-m-d", strtotime("{$year}-{$m}-{$d}"));
?>
<tr class="dataset">
        <!-- 날짜 -->
        <td class="row" rowspan=<?=$num_period?>><?=$date?></td> 
        <!-- 날짜 -->

        <!-- 명당 가격 시작 -->
        <?php for ($i=1; $i <= (int)$maxium_num_peple; $i++) {?>
        <!--1일 or 2일 가격 -->
        <td  class="pdate row <?="p{$date}-{$i}-".(1+$start_plus)?> <?=isset($price[$date][$i][1+$start_plus])?( $price[$date][$i][1+$start_plus] !=="0" ? "green" : "red") : "red"?>" rowspan=<?=$num_period?>><?=(0+$start_plus)."박".(1+$start_plus)."일"?><br><?=$price[$date][$i][1+$start_plus] ?? 0?></td>
        <!--1일 or 2일 가격-->
            <?php if ($num_period !== 0) {?>
            <!-- 2일or 3일 가격 -->
            <td  class="pdate colspan <?="p{$date}-{$i}-".(2+$start_plus)?> <?=isset($price[$date][$i][2+$start_plus])?( $price[$date][$i][2+$start_plus] !=="0" ? "green" : "red") : "red"?>" style="width:50px;"><?=(1+$start_plus)."박".(2+$start_plus)."일"?><br><?=$price[$date][$i][2+$start_plus] ?? 0?></td>
            <!-- 2일or 3일 가격 -->
            <?php }?>
        <?php }?>
         <!-- 명당가격 끝 -->
    </tr>

    <!-- 기간별/명당 가격 -->
    <?php for ($i=1; $i < (int)$num_period; $i++) {?>
        <tr class="rowspan">
        <?php for ($j=1; $j <= (int)$maxium_num_peple; $j++) {?>
            <td class="pdate <?="p{$date}-{$j}-".($i+2+$start_plus)?> <?=isset($price[$date][$j][$i+2+$start_plus])?( $price[$date][$j][$i+2+$start_plus] !=="0" ? "green" : "red") : "red"?>"><?=($i+1+$start_plus)."박".($i+2+$start_plus)."일"?><br><?=$price[$date][$j][$i+2+$start_plus] ?? 0?></td>
            <?php }?>
        </tr>
    <?php }?>
       <!-- 기간별/명당 가격 -->
<?php }?>
</tbody>
</table>
<?php }?>


<script>
$("input").change(function(){
    // var td =document.getElementsByTagName("td");

    var td =document.getElementsByClassName("pdate");
    for(var i =0 ; i<td.length ; i++)
    {
        td[i].style.backgroundColor = "white";
    }

// $(".pdate").css("background-color","white");
$(".green").css("background-color","rgba(0,200,0,0.5)");

 var start_date=$("input[name=start_date]").val();
 var end_date=$("input[name=end_date]").val();
 var tmp_arr_period=$("input[name='period[]']:checked");
 var arr_period = [];
 for(var i = 0 ; i < tmp_arr_period.length ; i++)
 {
    arr_period.push( tmp_arr_period[i].value);
 }

 var tmp_arr_day=$("input[name='day[]']:checked");
 var arr_day = [];
 for(var i = 0 ; i < tmp_arr_day.length ; i++)
 {
    arr_day.push( tmp_arr_day[i].value);
 }

 var tmp_arr_num_people=$("input[name='num_people[]']:checked");
 var arr_num_people = [];
 for(var i = 0 ; i < tmp_arr_num_people.length ; i++)
 {
    arr_num_people.push( tmp_arr_num_people[i].value);
 }

var end_year = end_date.substr(0,4);
var end_month = String(parseInt(end_date.substr(5,2))-1);
var end_date = new Date(end_year,end_month,end_date.substr(8,2));

var start_year = start_date.substr(0,4);
var start_month = String(parseInt(start_date.substr(5,2))-1);
var day = start_date.substr(8,2);

var date = new Date(start_year,start_month,day);


if(date <= end_date&& parseInt(start_year) >= <?=$year?>-1 && parseInt(start_year) <= <?=$year?>+1  )
{
    if(parseInt(end_year) >= <?=$year?>-1 && parseInt(end_year) <= <?=$year?>+1)
    {   
        while(date <= end_date)
        {
            for(var key1 in arr_num_people)
            {
                for(var key2 in arr_period)
                {
                    var className = `p${get_date_string(date)}-${arr_num_people[key1]}-${arr_period[key2]}`;
                    $(`.${className}`).css("background-color","RGBA(0,0,255,0.3)");
                }
            }
            
            date.setDate(date.getDate()+1);
        }
    }
}
// console.log(get_date_string(date));
// console.log(get_date_string(end_date));


});

// var tomorrow = new Date(1991,12,22);

// tomorrow.setDate(tomorrow.getDate() + 1);

// console.log(get_date_string(tomorrow));

function get_date_string(date)
{
    var day = String(date.getDate());
    var month = String(date.getMonth()+1);
    if(day.length === 1)
    {   
        day = `0${day}`;
    }
    if(month.length === 1)
    {   
        month = `0${month}`;
    }
    // if(month === '00')
    // {
    //     month = "12";
    // }
var out_date = `${date.getFullYear()}-${month}-${day}`;
return out_date;
}
</script>
