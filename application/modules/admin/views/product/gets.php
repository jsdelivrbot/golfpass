<style>
    li{
        display:inline;
    }
   
</style>
<?php for($i=0 ; $i<count($products) ; $i++){?>
    <ul>
        <li><?=$products[$i]->id?> </li>
        <li><?=$products[$i]->name?> </li>
        <li><?=$products[$i]->desc?> </li>
        <!-- <li><?=$products[$i]->category_id?> </li> -->
        <!-- <li><?=$products[$i]->c_name?> </li> -->
        <li><a href="<?=my_site_url(admin_product_uri."/update/{$products[$i]->id}")?>">수정</a> </li>
        <li><a onclick="confirm_redirect('<?=my_site_url(admin_product_uri."/delete/{$products[$i]->id}")?>','정말 삭제하시겠습니까? 복구 할 방법이 없습니다.')" href="#">삭제</a> </li>
    </ul>
<?php }?>
<a href="<?=my_site_url(admin_product_uri.'/add')?>">상품추가</a>


<form action="<?=my_site_url(admin_product_uri."/gets")?>" method="post">
    <select name="field" id="">
        <option value="name" <?=my_set_selected(null,'field','name')?>>상품명</option>
        <option value="desc" <?=my_set_selected(null,'field','desc')?>>상품설명</option>
    </select>
    <input type="text" name="value" value="<?=my_set_value('value','POST')?>">
    <input type="submit" value="검색">
</form>

<?= $this->pagination->create_links();?>
