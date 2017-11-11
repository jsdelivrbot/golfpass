<?php for ($m =1; $m<=12; $m++) {
    // $num_days = cal_days_in_month(CAL_GREGORIAN, $m, $year);
    $num_days = date('t', mktime(0, 0, 0, $m, 1, $year)); 
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
    $week = array("일", "월", "화", "수", "목", "금", "토");
    $day = $week[date("w", strtotime("{$year}-{$m}-{$d}"))];
?>
<tr class="dataset">
        <!-- 날짜 -->
        <td class="row" rowspan=<?=$num_period?>><?=$date?><?="({$day})"?></td> 
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