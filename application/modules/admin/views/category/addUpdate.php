
<?php if(strpos($mode,"update")> -1) echo "id $category->id"?>
<form action="<?=my_site_url(admin_product_category_uri."/$mode")?>" method="post">
<상속카테고리><input type="text" name="parent_id" value="<?=set_value_data($category,'parent_id')?>"><?=form_error('parent_id',false,false)?><br> 
<카테고리이름><input type="text" name="name" value="<?=set_value_data($category,'name')?>"> <?=form_error('name',false,false)?><br> 
<카테고리설명><input type="text" name="desc" value="<?=set_value_data($category,'desc')?>"> <?=form_error('desc',false,false)?><br> 
<input type="submit" value="보내기">
</form>
<!-- 이미지 업로드폼 시작 -->
<br>

<?php if(strpos($mode, "update") >-1 ){?>
<form  method="POST" action="<?=my_site_url(admin_product_category_uri."/upload_photo")?>" enctype='multipart/form-data'>
    <input type='file' name='photo'/>
    <input type="hidden" name='category_id' value="<?=$category->id?>"/>
  
    <input type="submit" value="보내기"style="">
</form>
<img style="width:200px; height:auto;"  src="<?=$category->photo?>" alt="">
<?php }?>
<!-- 이미지 업로드폼 끝 -->
<br>
<br>

상품 추가하기
<form method="post"action="<?=my_site_url(admin_ref_cate_product_uri."/add")?>">
순서<input type="text" name="sort">
<input type="hidden" name="cate_id" value="<?=$category->id?>">
<?php for($i=0; $i < count($products) ; $i++){
    if($i%5 === 0) echo "<br>"    ;
    ?>
<input type='radio' name='product_id' value='<?=$products[$i]->id?>' /><?=$products[$i]->name?></label>
<?php }?>
<input type="submit" value="보내기">
</form>

<br>
추가된 상품 리스트
<ul>
    <?php for($i=0; $i<count($products_in_cate) ; $i++){?>
        <li><a href="<?=my_site_url(admin_product_uri."/update/{$products_in_cate[$i]->id}")?>"><?=$products_in_cate[$i]->name?></a></li>
        <form onsubmit="ajax_submit(this); return false;" method="post"action="<?=site_url(admin_ref_cate_product_uri."/ajax_update/{$products_in_cate[$i]->ref_id}")?>" style="display:inline-blcok">
        <input style ="width:50px;"type="text" name="sort"  value="<?=set_value_data($products_in_cate[$i],'sort')?>" style="display:inline-blcok">   
        <input type="submit" value="순서 수정"> 
    </form>
        
        <a onclick="confirm_redirect('<?=my_site_url(admin_ref_cate_product_uri."/delete/{$products_in_cate[$i]->ref_id}")?>','정말 삭제하시겠습니까? 복구 할 방법이 없습니다.')" href="#">삭제</a>
    <?php }?>

</ul>
<a href="<?=my_site_url(admin_product_category_uri."/gets")?>">목록으로</a>