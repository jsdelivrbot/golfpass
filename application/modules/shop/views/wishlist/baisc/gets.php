<?php for($i=0 ; $i < count($wishlist) ; $i++){?>


<ul>
<li><?=$wishlist[$i]->p_name?></li>
<li><?=$wishlist[$i]->p_count?>개</li>
<li>개당<?=$wishlist[$i]->p_price?>원</li>
<li>합계<?=$wishlist[$i]->p_total_price?>원</li>
<a href="">주문하기</a>

<form onsubmit="ajax_submit(this);return false;" action="<?=site_url(shop_wishlist_uri."/ajax_update/{$wishlist[$i]->p_id}")?>">
수량<input type="text" name="product_count" value="<?=$wishlist[$i]->p_count?>">
<input type="submit" value="수정하기">
</form>


<form onsubmit="confirm_callback(this,ajax_submit,'삭제하시겠습니까?');return false;" action="<?=site_url(shop_wishlist_uri."/ajax_delete/{$wishlist[$i]->p_id}")?>">
<input type="submit" value="삭제하기">
</form>

</ul>
<?php }?>

<?php if(!is_login()){?>
    <a href="<?=my_site_url(shop_order_uri."/index/wishlist?guest_order=true")?>">주문하기</a>
<?php }else{?>
<a href="<?=my_site_url(shop_order_uri."/index/wishlist")?>">주문하기</a>
<?php }?>

