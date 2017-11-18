
<ul>
<li>주문번호  <?=$order->merchant_uid?></li>
<li>주문명 <?=$order->order_name?></li>
<li>주문자  <?=$order->user_name?></li>
<li>주문번호 <?=$order->merchant_uid?></li>
<li>총결제금액  <?=$order->total_price?></li>
<li>총결제금액  <?=$order->total_price?></li>
<li>결제방식  <?=$order->pay_method?></li>
<li>결제상태  <?=$order->status?></li>
<li>주문일 <?=$order->created?></li>

</ul>

<br>주문 상품 상세
<?php for($i=0;$i < count($order_infos) ;$i++){   ?>
<ul>
<li>동행자이름 <?=$order_infos[$i]->name_with?></li>
<li>비자 <?=$order_infos[$i]->visa?></li>
</ul>
<?php }?>


<a href="<?=site_url(admin_order_uri."/gets")?>">목록으로</a>