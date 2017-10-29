<style>
    li{
        display:inline;
    }
</style>
<?php for($i=0 ; $i<count($panels) ; $i++){?>
    <ul>
        <li>번호 <?=$panels[$i]->id?> </li>
        <li><a href="<?=my_site_url(golfpass_panel_admin_uri."/update/{$panels[$i]->id}")?>">회원이름 <?=$panels[$i]->name?></a> </li>
        <li><a  onclick="confirm_redirect('<?=my_site_url(golfpass_panel_admin_uri."/delete/{$panels[$i]->id}")?>','정말 삭제하시겠습니까? 복구 할 방법이 없습니다.')" href="#">삭제</a></li>
    </ul>
<?php }?>


<form action="<?=my_site_url(golfpass_panel_admin_uri."/gets")?>" method="post">
    <select name="field" id="">
        <option value="userName" <?=my_set_selected('field','userName','POST')?>>회원아이디</option>
        <option value="name" <?=my_set_selected('field','name','POST')?>>회원이름</option>
    </select>
    <input type="text" name="value" value="<?=my_set_value('value','POST')?>">
    <input type="submit" value="검색">
</form>

<a href="<?=my_site_url(golfpass_panel_admin_uri."/add")?>">추가</a>
<?= $this->pagination->create_links();?>