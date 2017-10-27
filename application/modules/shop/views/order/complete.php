<?php for($i =0 ; $i < count($order_products); $i++){?>
 상품이름<?=$order_products[$i]->p_name?>
 갯수<?=$order_products[$i]->count?>
 가격<?=$order_products[$i]->price?>
 합계<?=$order_products[$i]->p_total_price?>
 <br>
<?php }?>

<br>총결제금액<?=$order->total_price?>
<br>주문번호 <?=$order->merchant_uid?>
<br>주문자명 <?=$order->user_name?>
<br>결제방식 <?=$order->pay_method_enum?>
<br>결제상태 <?=$order->status_enum?>
<br>결제일 <?=$order->created?>


<bR>
 <?php if($order->pay_method === 'vbank'){?>
    <br>입금정보
    <br>은행 <?=$order->vbank_name?>
    <br>예금주 <?=$order->vbank_holder?>
    <br>계좌번호 <?=$order->vbank_num?>
    <br>입금기한 <?=$order->vbank_date?>
 <?php } ?>