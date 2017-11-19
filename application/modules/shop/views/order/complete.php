<br>주문 상품 상세
<?php for($i=0;$i < count($order_infos) ;$i++){   ?>
<ul>
<li>동행자이름 <?=$order_infos[$i]->name_with?></li>
<li>영어이름 <?=$order_infos[$i]->eng_name_with?></li>
<li>휴대폰 <?=$order_infos[$i]->phone_with?></li>
<li>이메일 <?=$order_infos[$i]->email_with?></li>
</ul>
<?php }?>

<br>총결제금액<?=$order->total_price?>
<br>주문번호 <?=$order->merchant_uid?>
<br>주문자명 <?=$order->user_name?>
<br>결제방식 <?=$order->pay_method_enum?>
<br>결제상태 <?=$order->status_enum?>
<br>결제일 <?=$order->created?>


<bR>
 <?php if($order->pay_method === 'vbank'){?>
    <br>가상계좌 입금정보
    <br>은행 <?=$order->vbank_name?>
    <br>예금주 <?=$order->vbank_holder?>
    <br>계좌번호 <?=$order->vbank_num?>
    <br>입금기한 <?=$order->vbank_date?>
 <?php } ?>
 <bR>
 <?php if( $order->pay_method === 'bank'){?>
    <br>무통장입금정보
    <br>은행 <?=$setting->bank_name?>
    <br>예금주 <?=$setting->bank_holder?>
    <br>계좌번호 <?=$setting->bank_num?>
 <?php } ?>



