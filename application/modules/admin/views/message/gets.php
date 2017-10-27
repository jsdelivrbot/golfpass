<style>
    li{
        display:inline;
    }
</style>
<?php for($i=0 ; $i<count($messages) ; $i++){?>
    <ul>
        <li>번호 <?=$messages[$i]->id?> </li>
        <li>보낸사람 <?=$messages[$i]->from_name?>(<?=$messages[$i]->from_userName?>) </li>
        <li>받는사람 <?=$messages[$i]->to_name?>(<?=$messages[$i]->to_userName?>) </li>
        <li>제목 <?=$messages[$i]->title?> </li>
        <li>내용 <?=$messages[$i]->desc?> </li>
    </ul>
<?php }?>


<form action="<?=my_site_url(admin_message_uri."/gets")?>" method="post">
    <select name="field" id="">
        <option value="m.title" <?=my_set_selected('field','m.title','POST')?>>제목</option>
        <option value="m.desc" <?=my_set_selected('field','m.desc','POST')?>>내용</option>
        <option value="u1.name" <?=my_set_selected('field','u1.name','POST')?>>보낸사람 이름</option>
        <option value="u1.userName" <?=my_set_selected('field','u1.userName','POST')?>>보낸사람 userName</option>
        <option value="u2.name" <?=my_set_selected('field','u1.name','POST')?>>받는사람 이름</option>
        <option value="u2.userName" <?=my_set_selected('field','u2.userName','POST')?>>받는사람 userName</option>
    </select>
    <input type="text" name="value" value="<?=my_set_value('value','POST')?>">
    <input type="submit" value="검색">
</form>

<?= $this->pagination->create_links();?>