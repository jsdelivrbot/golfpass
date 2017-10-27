<style>
    li{
        display:inline;
    }
</style>
댓글관리
<?php for($i=0 ; $i<count($reviews) ; $i++){?>
    <ul>
        <li><번호> <?=$reviews[$i]->id?> </li>
        <li><댓글내용> <?=$reviews[$i]->desc?> </li>
        <li><게시판종류> <?=$reviews[$i]->board_name?> </li>
        <li><글제목> <?=$reviews[$i]->content_title?> </li>
        <li><회원이름> <?=$reviews[$i]->user_name?>(<?=$reviews[$i]->userName?>) </li>
        <li><날짜> <?=$reviews[$i]->created?></li>
        <!-- <li><a href="/index.php/admin/category/update/<?=$reviews[$i]->id?>">수정</a></li> -->
    </ul>
<?php }?>


<form action="<?=my_site_url(admin_board_reply_uri."/gets")?>" method="post">
    <select name="field" id="">
        <option value="user_id" <?=my_set_selected('field','user_id','POST')?>>유저id</option>
        <option value="desc" <?=my_set_selected('field','desc','POST')?>>내용 userName</option>
    </select>
    <input type="text" name="value" value="<?=my_set_value('value','POST')?>">
    <input type="submit" value="검색">
</form>

<?= $this->pagination->create_links();?>