
<ul>
    <h1><li>결제상태 -<?=$order->status_enum?></li></h1>
    <h1><li>결제방식  <?=$order->pay_method_enum?></li></h1>
    <h1><li>총결제금액  <?=$order->total_price?></li></h1>
    <h1><li>주문일 <?=$order->created?></li></h1>
<li>주문번호  <?=$order->merchant_uid?></li>
<li>주문명 <?=$order->order_name?></li>
<li>주문자  <?=$order->user_name?></li>

</ul>

<br>주문 상품 상세
<?php for($i=0;$i < count($order_infos) ;$i++){   ?>
<ul>
<li>동행자이름 <?=$order_infos[$i]->name_with?></li>
<li>영어이름 <?=$order_infos[$i]->eng_name_with?></li>
<li>이메일 <?=$order_infos[$i]->email_with?></li>
<li>휴대폰 <?=$order_infos[$i]->phone_with?></li>
<!-- <li>비자 <?=$order_infos[$i]->visa?></li> -->
</ul>
<?php }?>

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