
<ul>
    <h1><li>결제상태  <?=$order->status?></li></h1>
<li>주문번호  <?=$order->merchant_uid?></li>
<li>주문명 <?=$order->order_name?></li>
<li>주문자  <?=$order->user_name?></li>
<li>주문번호 <?=$order->merchant_uid?></li>
<li>총결제금액  <?=$order->total_price?></li>
<li>총결제금액  <?=$order->total_price?></li>
<li>결제방식  <?=$order->pay_method?></li>
<li>주문일 <?=$order->created?></li>

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

<form action="<?=site_url(admin_order_uri."/update/{$order->id}")?>" class="ui form" method="post">
<div class="field">
    <label>상태바꾸기</label>
    <div class="ui radio checkbox">
        <input type="radio" name="status" value="confirm" <?=my_set_checked($order,"status","confirm")?>>
        <label for="">확인(confirm)</label>
    </div>
    <div class="ui radio checkbox">
        <input type="radio" name="status" value="ready" <?=my_set_checked($order,"status","ready")?>>
        <label for="">입금전(ready)</label>
    </div>
    <div class="ui radio checkbox">
        <input type="radio" name="status" value="paid" <?=my_set_checked($order,"status","paid")?>>
        <label for="">입금완료(paid)</label>
    </div>

</div>
<input type="submit" class="ui button basic" value="상태바꾸기">   

</form>

<a  class="ui button basic" href="<?=site_url(admin_order_uri."/gets")?>">목록으로</a>

<script>

$('.ui.radio.checkbox')
  .checkbox()
;
</script>