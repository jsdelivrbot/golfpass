<style>
    li{
        display:inline;
    }
</style>
<?php for($i=0 ; $i<count($users) ; $i++){?>
    <ul>
        <li>번호 <?=$users[$i]->id?> </li>
        <li>회원아이디 <?=$users[$i]->userName?> </li>
        <li>회원이름 <?=$users[$i]->name?> </li>
        <!-- <li><a href="/index.php/admin/category/update/<?=$users[$i]->id?>">수정</a></li> -->
    </ul>
<?php }?>


<form action="<?=my_site_url(admin_user_uri."/gets")?>" method="post">
    <select name="field" id="">
        <option value="userName" <?=my_set_selected('field','userName','POST')?>>회원아이디</option>
        <option value="name" <?=my_set_selected('field','name','POST')?>>회원이름</option>
    </select>
    <input type="text" name="value" value="<?=my_set_value('value','POST')?>">
    <input type="submit" value="검색">
</form>

<?= $this->pagination->create_links();?>