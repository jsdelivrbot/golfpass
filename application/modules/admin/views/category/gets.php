<style>
    li{
        display:inline;
    }
</style>


<?php for($i=0; $i < count($categories); $i++){?>

    
<ul style="padding-left:<?=50 * (int)$categories[$i]->deep?>px;">
<li> <?=$categories[$i]->id?></li>
<li> <?=$categories[$i]->name?></li>
<li> <?=$categories[$i]->desc?></li>
<?php if($categories[$i]->can_add === '1'){?>
<li><a href="<?=my_site_url(admin_product_category_uri."/add/{$categories[$i]->id}")?>">추가</a> </li>
<?php }?>
<?php if($categories[$i]->can_alert === '1'){?>
<li><a href="<?=my_site_url(admin_product_category_uri."/update/{$categories[$i]->id}")?>">보기</a> </li>
<li><a  onclick="confirm_redirect('<?=my_site_url(admin_product_category_uri."/delete/{$categories[$i]->id}")?>','정말 삭제하시겠습니까? 복구 할 방법이 없습니다.')"   href="#">삭제</a> </li>

<li>
<form  onsubmit="ajax_submit(this);" action="<?=site_url(admin_product_category_uri."/ajax_update/{$categories[$i]->id}")?>" method="post"style="display:inline-block">
<input type="text" name="sort" value="<?=set_value_data($categories[$i],'sort')?>" style="width:50px">
<input type="submit" value="순서수정">
</form>
</li>
<?php }?>
</ul>
<!-- 댓글목록끝 -->

<?php }?>

<a href="<?=my_site_url(admin_product_category_uri."/add/0")?>">추가</a>
