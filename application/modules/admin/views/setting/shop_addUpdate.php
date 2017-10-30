
<form onsubmit="ajax_submit(this);return false;"action="<?=my_site_url(admin_setting_product_uri."/ajax_update_product")?>" method="post">

상품후기 자동 보이기
<input type="radio" name="is_product_review_display" value="1" <?=my_set_checked($row,'is_product_review_display','1')?>>예
<input type="radio" name="is_product_review_display" value="0" <?=my_set_checked($row,'is_product_review_display','0')?>>아니오

<br>
메인상품 설정
<?php for($i=0; $i < count($products) ; $i++){
    if($i%5 === 0) echo "<br>"    ;
    ?>
<input type='radio' name='representative_product' value='<?=$products[$i]->id?>' <?=my_set_checked($row,'representative_product',"{$products[$i]->id}")?>/><?=$products[$i]->name?></label>
<?php }?>


<br>
<input type="submit" value="보내기">
</form>

