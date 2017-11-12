

<?php
    $num_days = date('t', mktime(0, 0, 0, $month, 1, $year)); 
?>

<h3 id ="target_month_<?=$month?>"><?="{$month}월"?></h3>

    <table class="ui celled table" >
    <thead>
    <tr >
        <th>
            날자
        </th>
        <?php for ($i=1; $i <= (int)$maxium_num_peple; $i++) {?>
        <th class="col center aligned" colspan=2>
            <?=$i?>인 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        </th>
    <?php }?>
    </tr>
    </thead>

    <tbody>

    <?php for ($d =1; $d <= $num_days; $d++) {
        $date = date("Y-m-d", strtotime("{$year}-{$month}-{$d}"));
        $week = array("일", "월", "화", "수", "목", "금", "토");
        $day = $week[date("w", strtotime("{$year}-{$month}-{$d}"))];
    ?>
    <tr class="">
            <!-- 날짜 -->
            <td class="" rowspan=<?=$num_period?>><?=$date?><?="({$day})"?></td> 
            <!-- 날짜 -->

            <!-- 명당 가격 시작 -->
            <?php for ($i=1; $i <= (int)$maxium_num_peple; $i++) {?>
            <!--1일 or 2일 가격 -->
            <td  class="pdate  <?="p{$date}-{$i}-".(1+$start_plus)?> <?=isset($price[$date][$i][1+$start_plus])?( $price[$date][$i][1+$start_plus] !=="0" ? "active " : "red") : "red"?>" rowspan=<?=$num_period?>>
                <?=(0+$start_plus)."박".(1+$start_plus)."일"?><br>    
                <form onsubmit="ajax_submit(this); return false" class="ui form" action="<?=my_site_url(golfpass_p_daily_price_admin_uri."/ajax_update")?>" method="post">
                        <input type="text" value="<?=$price[$date][$i][1+$start_plus] ?? 0?>">
                        <input type="hidden" name="date" value="<?=$date?>">
                        <input type="hidden" name="num_people" value="<?=$i?>">
                        <input type="hidden" name="period" value="<?=1+$start_plus?>">
                        <input type="submit"  class="">
                </form>    
            </td>
            <!--1일 or 2일 가격-->
                <?php if ($num_period !== 0) {?>
                <!-- 2일or 3일 가격 -->
                <td  class="pdate <?="p{$date}-{$i}-".(2+$start_plus)?> <?=isset($price[$date][$i][2+$start_plus])?( $price[$date][$i][2+$start_plus] !=="0" ? "active " : "red") : "red"?>" style="width:50px;">
                <?=(1+$start_plus)."박".(2+$start_plus)."일"?><br>
                <form onsubmit="ajax_submit(this); return false" class="ui form" action="<?=my_site_url(golfpass_p_daily_price_admin_uri."/ajax_update")?>" method="post">
                        <input type="text" value="<?=$price[$date][$i][2+$start_plus] ?? 0?>">
                        <input type="hidden" name="date" value="<?=$date?>">
                        <input type="hidden" name="num_people" value="<?=$i?>">
                        <input type="hidden" name="period" value="<?=2+$start_plus?>">
                        <input type="submit"  class="">
                </form>        
                
                </td>
                <!-- 2일or 3일 가격 -->
                <?php }?>
            <?php }?>
            <!-- 명당가격 끝 -->
        </tr>

        <!-- 기간별/명당 가격 -->
        <?php for ($i=1; $i < (int)$num_period; $i++) {?>
            <tr class="">
            <?php for ($j=1; $j <= (int)$maxium_num_peple; $j++) {?>
                <td class="pdate <?="p{$date}-{$j}-".($i+2+$start_plus)?> <?=isset($price[$date][$j][$i+2+$start_plus])?( $price[$date][$j][$i+2+$start_plus] !=="0" ? "active " : "red") : "red"?>"><?=($i+1+$start_plus)."박".($i+2+$start_plus)."일"?><br><?=$price[$date][$j][$i+2+$start_plus] ?? 0?></td>
                <?php }?>
            </tr>
        <?php }?>
        <!-- 기간별/명당 가격 -->
    <?php }?>
    </tbody>
    </table>
</div>