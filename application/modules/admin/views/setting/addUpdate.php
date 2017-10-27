
<form action="<?=my_site_url(admin_setting_product_uri."/$mode")?>" method="post">

상품후기 자동 보이기
<input type="radio" name="is_product_review_display" value="1" <?=my_set_checked($row,'is_product_review_display','1')?>>예
<input type="radio" name="is_product_review_display" value="0" <?=my_set_checked($row,'is_product_review_display','0')?>>아니오
<input type="submit" value="보내기">
</form>

