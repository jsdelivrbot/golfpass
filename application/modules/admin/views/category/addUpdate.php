
<?php if(strpos($mode,"update")> -1) echo "id $category->id"?>
<form action="<?=my_site_url(admin_product_category_uri."/$mode")?>" method="post">
<상속카테고리><input type="text" name="parent_id" value="<?=set_value_data($category,'parent_id')?>"><?=form_error('parent_id',false,false)?><br> 
<카테고리이름><input type="text" name="name" value="<?=set_value_data($category,'name')?>"> <?=form_error('name',false,false)?><br> 
<input type="submit" value="보내기">
</form>

