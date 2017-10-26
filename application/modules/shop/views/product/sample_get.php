<article>
<ul>
<li>상품이름 <?=$product->name?></li>
<li>상품설명 <?=$product->desc?></li>
<li>상품가격 <?=$product->price?></li>
<li>hits <?=$product->hits?></li>
</ul>
<br>
<form id="direct_buy" action="<?=site_url(shop_order_uri."/index/$product->id")?>" method="get">
주문개수<input type="text" name="order_count" value="1"><br>
<input type="submit" value="바로구매">
</form>

<form id="add_cartlist" onsubmit="ajax_submit(this);return false;" action="<?=site_url(shop_cartlist_uri."/ajax_add/{$product->id}")?>">
    <input type="submit" value="<?=(is_login()) ? "장바구니에 추가" : "비회원 장바구니에 추가"?>">
    <input type="hidden" name="order_count">
</form>

<?php if(!is_login()){?>
<a href="<?=site_url(user_uri."/login?return_url=".rawurlencode(my_current_url()))?>">로그인</a>
<?php }?>


<!-- <a href="<?=site_url(shop_cartlist_uri."/add/{$product->id}")?>">장바구니에 추가</a> -->

</article>
<script>
// 바로구매 갯수와 장바구니 갯수 맞추기
$(document).ready(function(){
    var $form_driect_buy =$("#direct_buy > input[name=order_count]");
    var $form_add_cartlist  = $("#add_cartlist > input[name=order_count]");

    $form_add_cartlist.val($form_driect_buy.val());
    
    $form_driect_buy.on('input',function(e){
        $form_add_cartlist.val($form_driect_buy.val());
    });
    
});



</script>
