
<ul>
<li>주문번호  <?=$order->merchant_uid?></li>
<li>주문명 <?=$order->order_name?></li>
<li>주문자  <?=$order->user_name?></li>
<li>주문번호 <?=$order->merchant_uid?></li>
<li>총결제금액  <?=$order->total_price?></li>
<li>총결제금액  <?=$order->total_price?></li>
<li>결제방식  <?=$order->pay_method_enum?></li>
<li>결제상태  <?=$order->status_enum?></li>
<li>주문일 <?=$order->created?></li>

</ul>

<br>주문 상품 상세
<?php for($i=0;$i < count($order_products) ;$i++){   ?>
<ul>
<li>상품이름 <?=$order_products[$i]->p_name?></li>
<li>주문갯수 <?=$order_products[$i]->count?></li>
<li>상품가격 <?=$order_products[$i]->price?></li>
<li>총금액 <?=$order_products[$i]->p_total_price?></li>
</ul>
<?php }?>


<a href="<?=site_url(admin_order_uri."/gets")?>">목록으로</a>