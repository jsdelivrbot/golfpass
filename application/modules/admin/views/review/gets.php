<style>
    li{
        display:inline;
    }
</style>
<?php for($i=0 ; $i<count($contents) ; $i++){?>
    <ul>
        <li> <?=$contents[$i]->product_id?> </li>
        <li> <?=$contents[$i]->product_name?> </li>
        <li><?=$contents[$i]->is_display?> </li>
        <br><li> <?=$contents[$i]->title?> </li>
        <li> <?=$contents[$i]->user_name?> (<?=$contents[$i]->userName?>) </li>
        <li><?=$contents[$i]->created?> </li>
        <li><?=$contents[$i]->desc?> </li>
        <li><a href="<?=site_url(admin_product_review_uri."/update/{$contents[$i]->id}")?>">수정</a> </li>
        <li><a onclick="confirm_callback(this,ajax_a,'복구할 방법이 없습니다. 삭제하시겠습니까?'); return false;" data-action="<?=site_url(admin_product_review_uri."/ajax_delete/{$contents[$i]->id}")?>"  href="#">삭제</a> </li>
    </ul>
<?php }?>

<form action="<?=my_site_url(admin_product_review_uri."/gets")?>" method="post">
    <select name="field" id="">
        <!-- <option value="r.product_id" <?=my_set_selected('field','r.product_id','POST')?>>상품id</option> -->
        <option value="p.name" <?=my_set_selected(null,'field',"p.name")?>>상품명</option>
        <option value="u.name" <?=my_set_selected(null,'field','u.name')?>>회원이름</option>
        <!-- <option value="u.userName" <?=my_set_selected(null,'field','u.userName')?>>userName</option> -->
    </select>
    <input type="text" name="value" value="<?=my_set_value('value','POST')?>">
    <input type="submit" value="검색">
</form>

<?= $this->pagination->create_links();?>