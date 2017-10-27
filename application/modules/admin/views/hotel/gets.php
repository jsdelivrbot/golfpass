<style>
    li{
        display:inline;
    }
   
</style>
<?php for($i=0 ; $i<count($rows) ; $i++){?>
    <ul>
        <li><?=$rows[$i]->id?> </li>
        <li><?=$rows[$i]->name?> </li>
        <li><a href="<?=my_site_url(admin_hotel_uri."/update/{$rows[$i]->id}")?>">수정</a> </li>
        <li><a onclick="confirm_callback(this,ajax_a,'복구할 방법이 없습니다. 삭제하시겠습니까?'); return false;" data-action="<?=my_site_url(admin_hotel_uri."/ajax_delete/{$rows[$i]->id}")?>" href="#">삭제</a> </li>
    </ul>
<?php }?>
<a href="<?=my_site_url(admin_hotel_uri.'/add')?>">호텔추가</a>


<form action="<?=my_site_url(admin_hotel_uri."/gets")?>" method="post">
    <select name="field" id="">
        <option value="name" <?=my_set_selected(null,'field','name')?>>호텔명</option>
        <option value="desc" <?=my_set_selected(null,'field','desc')?>>호텔설명</option>
    </select>
    <input type="text" name="value" value="<?=my_set_value('value','POST')?>">
    <input type="submit" value="검색">
</form>

<?= $this->pagination->create_links();?>
