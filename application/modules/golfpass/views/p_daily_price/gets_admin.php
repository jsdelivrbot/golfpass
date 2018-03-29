<link rel="stylesheet" href="//code.jquery.com/ui/1.8.18/themes/base/jquery-ui.css" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="//code.jquery.com/ui/1.8.18/jquery-ui.min.js"></script>
<?php if(is_semantic_dev) {?>
    <link rel="stylesheet/less" type="text/css" href="/public/framework/semantic/src/semantic.less">
<script src="/public/framework/semantic/src/less.min.js"></script>
<?php }else{?>
<link rel="stylesheet" type="text/css" href="/public/framework/semantic/out/semantic.css">
<link rel="stylesheet" type="text/css" href="/public/framework/semantic/out/semantic.js">
<?php }?>
<!-- 아일론 슬라이더 -->
<script src="<?=domain_url("/public/lib/ion.rangeSlider/js/ion-rangeSlider/ion.rangeSlider.min.js")?>"></script>
<link rel="stylesheet" href="<?=domain_url("/public/lib/ion.rangeSlider/css/ion.rangeSlider.css")?>" />
<link rel="stylesheet" href="<?=domain_url("/public/lib/ion.rangeSlider/css/normalize.css")?>" />
<link rel="stylesheet" href="<?=domain_url("/public/lib/ion.rangeSlider/css/ion.rangeSlider.skinHTML5.css")?>" />
<!-- 아일론 슬라이더 -->
<script src="<?=domain_url('/public/js/common.js')?>"></script>

<script>
(function($) {
    $.fn.goTo = function() {
        $('html, body').animate({
            scrollTop: $(this).offset().top + 'px'
        }, 'fast');
        return this; // for chaining...
    }
})(jQuery);
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
<!-- 로딩 디머 -->
<div class="loading ui active dimmer" style="display:none;    position: fixed">
    <div class="ui massive text loader">Loading</div>
  <p></p>
  <p></p>
  <p></p>
</div>
<!-- 로딩 디머 -->

<!-- <div style="background-image:url('<?=$product_photos ?? ''?>') ;"> -->
<!-- <div style="background-image:url('/public/images/theme1.jpg'); background-repeat:no-repeat"> -->
<div style="background-image:url('/public/images/backgroundimg.jpg'); ">
<div style=" background-color: rgba(0,0,0,0.2)">
 <style>
     #fixed_menu{
        color:#eeeeee;
     }
     #fixed_menu input{
        color:black;
     }
     #fixed_menu select{
        color:black;
     }
 </style>
<a href="<?=my_site_url(admin_product_uri."/update/{$product->id}")?>" class="ui button positive" style="float:left"><?=$product->name?>으로</a>
<!-- 메뉴판 -->
<div id="fixed_menu" style="margin-left:200px;position:fixed; background-color: rgba(0,0,0,0.5);" >
<!-- <form method="post" action="<?=my_site_url(golfpass_p_daily_price_admin_uri."/add/{$product->id}")?>"> -->
    <form id="fixed_menu_form" method="post" onsubmit="ajax_submit(this); return false;" action="<?=my_site_url(golfpass_p_daily_price_admin_uri."/ajax_add_all/{$product->id}")?>">
    시작날자: <input type="text" name="start_date" id="datepicker1" value="<?=date("Y-m-d")?>">
    끝시작: <input type="text" name="end_date" id="datepicker2" value="<?=date("Y-m-d")?>">
    <!-- 시작날자: <input type="text" name="start_date" id="datepicker1" value="2017-01-01"> -->
    <!-- 끝시작: <input type="text" name="end_date" id="datepicker2" value="2017-01-03"> -->
        <bR>
    <!-- 가격 -->

    <input type="hidden" name="price" value="1">
    <input type="hidden" name="start_plus" value="<?=$start_plus?>">
        <bR>
        <!-- 배율 -->
        <div style="display:none;">
            배율<input type="checkbox" name="period_times_sw" value="1" checked>
            <br>
            <?php for($i=1;$i <= ((int)$num_period ) ; $i++ ){
                ?>
            <input  type="checkbox" name="period[]" checked value="<?=$i+$start_plus?>"><?=($i-1+$start_plus)."박".($i+$start_plus)."일"?>
            <input  type="text" name="period_times[]" value="1">
            <?php }?>

            </div>
        <bR>
        <input type="checkbox" name="day[]" checked value="1">월
        <input type="checkbox" name="day[]" checked value="2">화
        <input type="checkbox" name="day[]" checked value="3">수
        <input type="checkbox" name="day[]" checked value="4">목
        <input type="checkbox" name="day[]" checked value="5">금
        <input type="checkbox" name="day[]" checked value="6">토
        <input type="checkbox" name="day[]" checked value="0">일
    <br>
    <input  style="display:none" type="checkbox" name="num_people_sw_times" value="1" checked>
    <!-- 배율 -->

    <div style="width: 400px;">
    <input type="text" id="slider_num_people" value="" />
    </div>

    <input id="" type="button" value="모두선택">
    <input id="apply_japan_price_chart" type="button" value="일본가격표 적용">
    <?php for($i=1;$i <= ((int)$maxium_num_peple) ; $i++ ){
                if($i%10 === 1) echo "<br>";
                ?>
                
            <input type="checkbox" name="num_people[]" checked value="<?=$i?>"><?="{$i}인"?>
            <input type="text" name="num_people_times[]" value="<?=$i*1000?>" style="width:200px;" >원
            <?php }?>



        <br>
    <br>
        <input type="submit" value="범위 가격입력" class="ui button  positive" style="color:white">
  </form>
  <script>
    $num_people_times =$("input[name='num_people_times[]']");
    
    $("#apply_japan_price_chart").click(function()
    {
        var basePrice =$($num_people_times[0]).val();
        for (let i = 1; i < $num_people_times.length; i++) {
            const $ele = $($num_people_times[i]);
            const eleVal =$ele.val();
           // $ele.val(`${eleVal}+${basePrice}`);
            $ele.val(eleVal+"+"+basePrice);
        }
    });
  </script>
<form method="post" onsubmit="ajax_submit(this); return false;" action="<?=my_site_url(golfpass_p_daily_price_admin_uri."/ajax_add/{$product->id}")?>">
<input type="submit" value="개별 가격입력" class="ui button  positive" style="color:white; ">
<input type="text" name="price" style=" width:100px">
원
<input type="text" name="date" value="<?=date("Y")."-01-01"?>" style=" width:100px">
<input type="text" name="num_people" value="1" style=" width:40px">
인조
<input type="text" name="period" value="1"style=" width:40px ; " >
일
</form>
  <!-- 해당년도로 -->
 
      <select style="float:left;" name="" id="select_year">
          <?php $current_year = date("Y");
        for($i = $current_year ; $i <= $current_year+3 ; $i++){?>
        <option value="<?=$i?>"  <?=set_select("year",$i,false)?>><?=$i?></option>
        <?php
        }
        ?>
        </select>
        <a  id ="a_link_year"style="float:left;"class="ui button black" href="<?=my_site_url(golfpass_p_daily_price_admin_uri."/add/{$product->id}/".date('Y'))?>">해당년도로</a>
        <script>
        $("#select_year").change(function(){
            var base_url ="<?=site_url(golfpass_p_daily_price_admin_uri."/add/{$product->id}")?>";
            var year =$(this).val();
            var $a = $("#a_link_year");
            var queryString = "<?=$this->input->server('QUERY_STRING');?>";
//            $a.attr("href", `${base_url}/${year}?${queryString}`);
            $a.attr("href", base_url+"/"+year+"?"+queryString);
        });
    </script>
<!-- 해당년도로 -->
  
    <table>
        <?php for($i=1; $i<= 12 ; $i++ ){?>
            <!-- <td class="ui button" onclick="$(`#target_month_<?=$i?>`).goTo();"><?=$i?>월</td> -->
            <td class="ui button" onclick="$(`.month_table`).css('display','none'); $('#month_table_<?=$i?>').css('display','block');"><?=$i?>월</td>
        <?php }?>
            </tr>
    </table>
            <div style="margin-top:10px;">
    <div class ="ui button" onclick="$('#fixed_menu_form').css('display','block');">열기</div>
    <div class ="ui button" onclick="$('#fixed_menu_form').css('display','none');">접기</div>
    </div>
</div>

    <!-- 메뉴판 -->
  <br>

<style>
    body{
        overflow: auto;
    }
  /* table {
    width: 10000px;
    border: 1px solid #444444;
    border-collapse: collapse;
  } */
  th, td {
    /* border: 1px solid #444444; */
    /* padding: 10px; */
    /* width:300px; */
  }
  .green {
    background-color:rgba(30,230,30,0.3);
}
.yellow {
      background-color:rgba(200,200,0,0.5);
  }
  .red
  {
    background-color:rgba(255,0,0,0.5);
  }
  /* .ui.table td
  {
    border: 1px solid #444444;
    padding: 10px;
    width:300px;
  } */
</style>
<div style =""></div>

<div id="target" class="target ui grid" style="margin-left:50px;margin-top:540px;">
<?php for ($m =1; $m<=12; $m++) {
    // $num_days = cal_days_in_month(CAL_GREGORIAN, $m, $year);
    $num_days = date('t', mktime(0, 0, 0, $m, 1, $year)); 
?>

<div class="month_table"id="month_table_<?=$m?>" <?=$m !== 1 ? "style='display:none'": ""?>>

    <table class="ui celled table" >
    <thead>
    <tr style="display:table;">
        <th>
        <?="{$m}월"?>
        </th>
        <?php for ($i=1; $i <= (int)$maxium_num_peple; $i++) {?>
        <th class="col center aligned" colspan=<?=$num_period === 1 ? "1" :"2"?>>
            <?=$i?>인조 가격 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        </th>
    <?php }?>
    </tr>
    </thead>

    <tbody>

    <?php for ($d =1; $d <= $num_days; $d++) {
        $date = date("Y-m-d", strtotime("{$year}-{$m}-{$d}"));
        $week = array("일", "월", "화", "수", "목", "금", "토");
        $day = $week[date("w", strtotime("{$year}-{$m}-{$d}"))];
    ?>
    <tr class="" style="display:table;">
            <!-- 날짜 -->
            <td class="" rowspan=<?=$num_period-1?>><?=$date?><?="({$day})"?></td> 
            <!-- 날짜 -->

            <!-- 명당 가격 시작 -->
            <?php for ($i=1; $i <= (int)$maxium_num_peple; $i++) {?>
            <!--1일 or 2일 가격 -->
            <td  class="pdate  <?="p{$date}-{$i}-".(1+$start_plus)?> <?=getClassName_inDailyPriceAdmin((isset($price[$date][$i][1+$start_plus])) ? $price[$date][$i][1+$start_plus] : null)?>" style="width:150px;" rowspan=<?=$num_period-1?>>
                <?=(0+$start_plus)."박".(1+$start_plus)."일"?>
                <!-- 1인조 -->
                <br>    
                <?=$price[$date][$i][1+$start_plus] ?? "데이터없음"?>
                
            </td>
            <!--1일 or 2일 가격-->
                <?php if ($num_period !== 1) {?>
                <!-- 2일or 3일 가격 -->
                <td  class="pdate <?="p{$date}-{$i}-".(2+$start_plus)?> <?=getClassName_inDailyPriceAdmin((isset($price[$date][$i][1+$start_plus])) ? $price[$date][$i][1+$start_plus] : null)?>" style="width:50px;">
                <?=(1+$start_plus)."박".(2+$start_plus)."일"?>
                <!-- <?=$start_plus+1?>인조 -->
                <br>
                <?=$price[$date][$i][2+$start_plus] ?? "데이터없음"?>
                </td>
                <!-- 2일or 3일 가격 -->
                <?php }?>
            <?php }?>
            <!-- 명당가격 끝 -->
        </tr>

        <!-- 기간별/명당 가격 -->
        <?php for ($i=1; $i < (int)$num_period-1; $i++) {?>
            <tr class="">
            <?php for ($j=1; $j <= (int)$maxium_num_peple; $j++) {?>
                <td class="pdate <?="p{$date}-{$j}-".($i+2+$start_plus)?> <?=getClassName_inDailyPriceAdmin((isset($price[$date][$i][1+$start_plus])) ? $price[$date][$i][1+$start_plus] : null)?>">
                <?=($i+1+$start_plus)."박".($i+2+$start_plus)."일"?>
                <!-- <?=$i+2?>인조 -->
                <br><?=$price[$date][$j][$i+2+$start_plus] ?? "데이터없음"?>
                </td>
                <?php }?>
            </tr>
        <?php }?>
        <!-- 기간별/명당 가격 -->
    <?php }?>
    </tbody>
    </table>
</div>
<?php }?>
</div>
</div>
</div>
<script>
$("#slider_num_people").ionRangeSlider({
    type: "double",
    grid: true,
    min: 0,
    max: <?=$maxium_num_peple?>,
    from: 1,
    to: 45
});

$("input[value='모두선택']").click(function()
{
    var $num_people =$("input[name='num_people[]']");
    $num_people.prop('checked',false);

    var $slider = $("#slider_num_people");
     var $num_people =$("input[name='num_people[]'][value=1]");
     var arr_start_end = $slider.val().split(";");
     var start = parseInt(arr_start_end[0]);
     var end = parseInt(arr_start_end[1]);
    for(var i=start ; i<=end; i++ )
    {
   //     $(`input[name='num_people[]'][value=${i}]`).prop('checked',true);
        $("input[name='num_people[]'][value="+i+"]").prop('checked',true);
    }
    // if($num_people.prop('checked') === false)
    //     $num_people.prop('checked',true);
    // else

});

$("input").change(function(){
//     // var td =document.getElementsByTagName("td");

//     var td =document.getElementsByClassName("pdate");
//     for(var i =0 ; i<td.length ; i++)
//     {
//         td[i].style.backgroundColor = "white";
//     }

// // $(".pdate").css("background-color","white");
// $(".active ").css("background-color","rgba(0,200,0,0.5)");

//  var start_date=$("input[name=start_date]").val();
//  var end_date=$("input[name=end_date]").val();
//  var tmp_arr_period=$("input[name='period[]']:checked");
//  var arr_period = [];
//  for(var i = 0 ; i < tmp_arr_period.length ; i++)
//  {
//     arr_period.push( tmp_arr_period[i].value);
//  }

//  var tmp_arr_day=$("input[name='day[]']:checked");
//  var arr_day = [];
//  for(var i = 0 ; i < tmp_arr_day.length ; i++)
//  {
//     arr_day.push( tmp_arr_day[i].value);
//  }

//  var tmp_arr_num_people=$("input[name='num_people[]']:checked");
//  var arr_num_people = [];
//  for(var i = 0 ; i < tmp_arr_num_people.length ; i++)
//  {
//     arr_num_people.push( tmp_arr_num_people[i].value);
//  }

// var end_year = end_date.substr(0,4);
// var end_month = String(parseInt(end_date.substr(5,2))-1);
// var end_date = new Date(end_year,end_month,end_date.substr(8,2));

// var start_year = start_date.substr(0,4);
// var start_month = String(parseInt(start_date.substr(5,2))-1);
// var day = start_date.substr(8,2);

// var date = new Date(start_year,start_month,day);


// if(date <= end_date&& parseInt(start_year) >= <?=$year?>-1 && parseInt(start_year) <= <?=$year?>+1  )
// {
//     if(parseInt(end_year) >= <?=$year?>-1 && parseInt(end_year) <= <?=$year?>+1)
//     {   
//         while(date <= end_date)
//         {
//             for(var key1 in arr_num_people)
//             {
//                 for(var key2 in arr_period)
//                 {
//                     var className = `p${get_date_string(date)}-${arr_num_people[key1]}-${arr_period[key2]}`;
//                     $(`.${className}`).css("background-color","RGBA(0,0,255,0.3)");
//                 }
//             }
            
//             date.setDate(date.getDate()+1);
//         }
//     }
// }


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
//        day = `0${day}`;
        day = "0"+day;
    }
    if(month.length === 1)
    {   
//        month = `0${month}`;
        month = "0"+month;
    }
    // if(month === '00')
    // {
    //     month = "12";
    // }
//var out_date = `${date.getFullYear()}-${month}-${day}`;
var out_date = date.getFullYear()+"-"+month+"-"+day;
return out_date;
}
</script>




<script>
  
    

</script>