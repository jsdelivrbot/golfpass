<style>
    li{
        display:inline;
    }
</style>
<?php for($i=0 ; $i<count($pages) ; $i++){?>
    <ul>
        <li>번호 <?=$pages[$i]->id?> </li>
        <li>제목 <?=$pages[$i]->title?> </li>
        <li>생성일 <?=$pages[$i]->created?> </li>
        <a href="<?=my_site_url(admin_page_uri."/update/{$pages[$i]->id}")?>">수정</a>
        <a onclick="confirm_callback(this,ajax_a,'복구할 방법이 없습니다. 삭제하시겠습니까?'); return false;" data-action="<?=site_url(admin_page_uri."/ajax_delete/{$pages[$i]->id}")?>" href="#">삭제</a>
    </ul>
<?php }?>

<a href="<?=my_site_url(admin_page_uri."/add")?>">추가</a>


<form action="<?=my_site_url(admin_user_uri."/gets")?>" method="post">
    <select name="field" id="">
        <option value="userName" <?=my_set_selected('field','userName','POST')?>>회원아이디</option>
        <option value="name" <?=my_set_selected('field','name','POST')?>>회원이름</option>
    </select>
    <input type="text" name="value" value="<?=my_set_value('value','POST')?>">
    <input type="submit" value="검색">
</form>
