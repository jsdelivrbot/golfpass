
<style>
    .j-text{
        display:inline-block;
        font-size : 25px;
        padding:10px;
    }
    .j-sub-text{
        display:inline-block;
        font-size : 15px;
        color : #888888;
    }
</style>
    <h1 style="margin-bottom:0px;">
        <a href="<?=my_site_url(admin_product_uri."/update/{$product->id}?menu_name=상품&sub_name=상품관리")?>"> 
            <?=$order->order_name?>
        </a>
        (<?=$order->status?>-<?=$order->status_enum?>,<?=$order->pay_method?>-<?=$order->pay_method_enum?>)
    </h1>
    <h1 style="margin-bottom:0px; margin-top:10px;">총결제금액 : <?=number_format($order->total_price)?>원(총 <?=$order->num_people?>명) 
        
        
    </h1> 
    <h2 style="margin-top:10px; color:#555555">예약일 <?=$order->start_date?> ~ <?=$order->end_date?>
        
    </h2>
    <h2 style="margin-top:0px; color:#555555"> 주문일 - <?=$order->created?></h2>
    <div class="ui divider" style="margin-bottom:10px;"></div>

    <h2> 기본정보</h2>
    <div class="j-text"> 주문번호 : <?=$order->merchant_uid?></div>
   
    <br>
    
    <div class="j-text">주문명 : <a href="<?=my_site_url(admin_product_uri."/update/{$product->id}?menu_name=상품&sub_name=상품관리")?>"> <?=$order->order_name?></a> 가격?</div>
    <br>
    <div class="j-text"> 주문자 : <?=$order->user_name?>(<?=$order->userName?>)</div>
    <br>
    <div class="j-text">결제상태 : <?=$order->status?>-<?=$order->status_enum?></div>
    <br>
    <div class="j-text">결제방식 : <?=$order->pay_method?>-<?=$order->pay_method_enum?></div>
    <br>
    <div class="j-text"> 싱글룸 신청개수 : <?=$order->num_singleroom?></div>
    <br>
    <div class="j-text"> 예약 총인원 : <?=$order->num_people?></div>
    <br>
    <div class="j-text"> 예약일 : <?=$order->start_date?> ~ <?=$order->end_date?></div>
    <br>
    <div class="j-text"> 희망시간대 : <?=$order->hope_date?></div>
    <br>
    <div class="j-text"> 리뷰 : <?=$order->is_review_write === "1" ? "<a href='".site_url(shop_review_uri."/gets_by_user/{$user->userName}")."'>썼음</a>": "안썼음"?></div>
   
    
    

    <!-- <div class="ui divider" style="margin-bottom:10px; margin-top:10px;"></div> -->

    <h2> 주문자정보</h2>
<table class="ui celled table">
<thead>
    <tr> 
        <th>이름</th>
        <th>휴대폰</th>
        <th>이메일</th>
        <th>주소</th>
    </tr>
</thead>
<tbody>
<tr>
    <td> <a href="<?=my_site_url(admin_user_uri."/update/{$user->id}/general?menu_name=회원")?>"> <?=$order->user_name?></a></td>
<td> <?=$order->phone?></td>
<td> <?=$order->email?></td>
<td> <?=$order->address?></td>
</tr>
</tbody>
</table>



<h2> 동행자정보(<?=count($order_infos)?>명)</h2>
<table class="ui celled table">
<thead>
    <tr> 
        <th>조</th>
        <th>이름</th>
        <th>영어이름</th>
        <th>이메일</th>
        <th>휴대폰</th>
    </tr>
</thead>
<tbody>
    <?php for($i=0;$i < count($order_infos) ;$i++){   ?>
<tr>
<td> <?=$order_infos[$i]->group_name?></td>
<td> <?=$order_infos[$i]->name_with?></td>
<td> <?=$order_infos[$i]->eng_name_with?></td>
<td> <?=$order_infos[$i]->email_with?></td>
<td> <?=$order_infos[$i]->phone_with?></td>
</tr>
<?php }?>
</tbody>
</table>

<!-- 홀추가 정보시작 -->
<?php if($hole_option !== null){?>
<!-- <div class="ui divider" style="margin-bottom:10px; margin-top:10px;"></div> -->
<h2> 홀추가내역 -  <?=$hole_option->name?>(총<?=number_format($added_hole_price)?>원)</h2>
<table class="ui celled table">
<thead>
<tr>
    <th>몇인조</th>
    <th>가격</th>
</tr>
</thead>
<tbody>
<?php for($i=0;$i<count($hole_options);$i++){?>
    <tr>
        <td><?=$hole_options[$i]->option_1?></td>
        <td><?=$hole_options[$i]->price?></td>
    </tr>
<?php }?>
</tbody>
</table>
<?php }?>
<!-- 홀추가 정보끝 -->

<!-- 옵션정보 시작 -->
<?php if(count($order_options)!== 0){?>
    <!-- <div class="ui divider" style="margin-bottom:10px; margin-top:10px;"></div> -->
    <h2> 옵선주문 내역 - (총<?=number_format($total_price_options)?>원)</h2>
    <table class="ui celled table">
    <thead>
    <tr>
        <th>이름</th>
        <th>가격</th>
    </tr>
</thead>
    <tbody>
    <?php    for($i=0; $i< count($order_options);$i++){?>
        <tr>
            <td><?=$order_options[$i]->name?></td>
            <td><?=$order_options[$i]->price?></td>
        </tr>
    <?php }?>
    </tbody>
    </table>
<?php }?>

<?php if($order->num_singleroom !== 0){?>
    <h2> 싱글룸 주문 내역 - (총<?=number_format($total_price_singleroom)?>원)</h2>
    <table class="ui celled table">
    <thead>
    <tr>
        <th>신청 인원</th>
        <th>싱글룸 가격(<?=$product->name?>)</th>
    </tr>
</thead>
    <tbody>
        <tr>
            <td><?=$order->num_people?></td>
            <td><?=$product->singleroom_price?></td>
        </tr>
    </tbody>
    </table>
<?php }?>
<!-- 옵션정보 끝 -->
<form action="<?=my_site_url(admin_order_uri."/update/{$order->id}")?>" class="ui form" method="post">
    <div class="grouped fields">
        <label>상태바꾸기</label>
        <div class="field">
            <div class="ui radio checkbox">
                <input type="radio" name="status" value="confirm" <?=my_set_checked($order,"status","confirm")?>>
                <label for="">결제확인(입금완료된 상품을 관리자가 확인합니다.)</label>
            </div>
        </div>
        <div class="field">
            <div class="ui radio checkbox">
                <input type="radio" name="status" value="ready" <?=my_set_checked($order,"status","ready")?>>
                <label for="">미결제(고객이 무통장이나 가상계좌로 입금전입니다.)</label>
            </div>
        </div>
        <div class="field">
            <div class="ui radio checkbox">
                <input type="radio" name="status" value="paid" <?=my_set_checked($order,"status","paid")?>>
                <label for="">결제완료(고객이 입금을 완료하였습니다.)</label>
            </div>
        </div>
        <div class="field">    
            <div class="ui radio checkbox">
                <input type="radio" name="status" value="request_refend" <?=my_set_checked($order,"status","request_refend")?>>
                <label for="">환불 요청중(고객이 입금완료된 상품을 환불요청 중입니다.)</label>
            </div>
        </div>
        <div class="field">    
            <div class="ui radio checkbox">
                <input type="radio" name="status" value="confirm_refend" <?=my_set_checked($order,"status","confirm_refend")?>>
                <label for="">환불완료(환불 요청 중인 상품을 환불하였습니다.)</label>
            </div>
        </div>
        <div class="field">    
            <div class="ui radio checkbox">
                <input type="radio" name="status" value="reject_refend" <?=my_set_checked($order,"status","reject_refend")?>>
                <label for="">환불 요청 실패(환불 요청중인 상품을 여타의 이유로 거부합니다.)</label>
            </div>
        </div>
    </div>
    <div class="field">
        <label for="">비고(환불요청 실패 이유 등을 적습니다.)</label>
        <textarea placeholder="비고" name="remarks"><?=set_value_data($order,'remarks')?></textarea>
    </div>
    <input type="submit" class="ui button basic" value="상태바꾸기">   

</form>

<a  class="ui button basic" href="<?=site_url(admin_order_uri."/gets")?>">목록으로</a>

<script>

$('.ui.radio.checkbox')
  .checkbox()
;
</script>