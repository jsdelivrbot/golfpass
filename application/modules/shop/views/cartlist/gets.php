<style>
    li{
        display:inline;
    }
</style>
<?php for($i=0 ; $i < count($cartlist) ; $i++){?>

    

<ul>
<li><?=$cartlist[$i]->p_name?></li>
<li><?=$cartlist[$i]->p_count?>개</li>
<li>개당<?=$cartlist[$i]->p_price?>원</li>
<li>합계<?=$cartlist[$i]->p_total_price?>원</li>
<a href="">주문하기</a>

<form onsubmit="ajax_submit(this);return false;" action="<?=site_url(shop_cartlist_uri."/ajax_update/{$cartlist[$i]->p_id}")?>">
수량<input type="text" name="product_count" value="<?=$cartlist[$i]->p_count?>">
<input type="submit" value="수정하기">
</form>


<form onsubmit="confirm_callback(this,ajax_submit,'삭제하시겠습니까?');return false;" action="<?=site_url(shop_cartlist_uri."/ajax_delete/{$cartlist[$i]->p_id}")?>">
<input type="submit" value="삭제하기">
</form>

</ul>
<?php }?>

<?php if(!is_login()){?>
    <a href="<?=my_site_url(shop_order_uri."/index/cartlist?guest_order=true")?>">주문하기</a>
<?php }else{?>
<a href="<?=my_site_url(shop_order_uri."/index/cartlist")?>">주문하기</a>
<?php }?>

