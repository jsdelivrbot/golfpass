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

<form method="post" action="<?=my_site_url(golfpass_p_daily_price_admin_uri."/add/$product_id")?>">
시작날자: <input type="text" name="start_date" id="datepicker1">
끝시작: <input type="text" name="end_date" id="datepicker2">
    <bR>
    <input type="checkbox" name="day[]" checked value="1">월<br>
    <input type="checkbox" name="day[]" checked value="2">화<br>
    <input type="checkbox" name="day[]" checked value="3">수<br>
    <input type="checkbox" name="day[]" checked value="4">목<br>
    <input type="checkbox" name="day[]" checked value="5">금<br>
    <input type="checkbox" name="day[]" checked value="6">토<br>
    <input type="checkbox" name="day[]" checked value="7">일<br>
<br>
    <input type="checkbox" name="num_people[]" value="1">1인<br>
    <input type="checkbox" name="num_people[]" value="2">2인<br>
    <input type="checkbox" name="num_people[]" value="4">4인<br>
    <input type="checkbox" name="num_people[]" value="5">5인<br>
    <input type="checkbox" name="num_people[]" value="6">6인<br>
    <input type="checkbox" name="num_people[]" value="7">7인<br>
    <input type="checkbox" name="num_people[]" value="8">8인<br>
    <input type="checkbox" name="num_people[]" value="9">9인<br>
    <input type="checkbox" name="num_people[]" value="10">10인<br>
    <input type="checkbox" name="num_people[]" value="11">11인<br>


    <input type="submit" value="Submit">
  </form>