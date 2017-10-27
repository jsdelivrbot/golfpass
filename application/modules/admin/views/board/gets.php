<style>
    li{
        display:inline;
    }
</style>
<?php for($i=0 ; $i<count($boards) ; $i++){?>
    <ul>
        <li>게시판 이름<?=$boards[$i]->name?> </li>
        <li>게시판 종류 <?=$boards[$i]->skin?> </li>
        <li><a href="<?=my_site_url(admin_board_uri."/update/{$boards[$i]->id}")?>">수정</a></li>
        <li><a href="<?=my_site_url(admin_board_uri."/delete/{$boards[$i]->id}")?>">삭제</a></li>
    </ul>
<?php }?>
<a href="<?=my_site_url(admin_board_uri."/add")?>">추가</a>
<?= $this->pagination->create_links();?>