
<article>
    

<?php for($i=0; $i<count($orders); $i++){?>
    <?php if($orders[$i]->status!== 'fail'){?>
        <ul>
            <li><a href="<?=my_site_url(shop_order_uri."/get/{$orders[$i]->merchant_uid}")?>"> 주문번호 <?=$orders[$i]->merchant_uid?></a></li>
            <li>주문명 <?=$orders[$i]->order_name?></li>
            <li>주문금액 <?=$orders[$i]->total_price?>원</li>
            <li>결제방식 <?=$orders[$i]->pay_method_enum?> </li>
            <li>쓰지 않은 상품 후기 <?=$orders[$i]->isnt_review_write?> </li>
       
        </ul>
    <?php }?>
<?php }?>
</article>

