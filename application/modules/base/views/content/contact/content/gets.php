<style>
    li{
        display:inline;
    }
   
</style>
<?=$board->name?><br>
글쓰기권한<?=$board->auth_w_content?><br>
<table>
    <tr><td>번호</td><td>제목</td><td>글쓴이</td><td>날짜</td></tr>

<?php for($i=0 ; $i<count($contents) ; $i++){?>
    <tr>
        <td><?=$contents[$i]->id?></td>
        <td><a href="<?=my_site_url(content_uri."/get/{$contents[$i]->id}",true)?>"><?=$contents[$i]->title?></a></td>
        <td><?=$contents[$i]->user_name?>(<?=$contents[$i]->userName?>)</td>
        <td><?=$contents[$i]->created?></td></tr>
    <?php }?>
</table>
<!-- <a href="/index.php/base/board/add/?board_id=<?=$board->id?>">글쓰기</a> -->
<a href="<?=my_site_url(content_uri."/add")?>">글쓰기</a>


<form onsubmit="submit_get(this); return false;" action="<?=my_site_url(content_uri."/gets",true)?>" method="post">
     <select name="field" id="">
        <option value="c.title" <?=my_set_selected(null,'field','c.title')?>>제목</option>
        <option value="c.desc" <?=my_set_selected(null,'field','c.desc')?>>내용</option>
        <option value='c.title,c.desc' <?=my_set_selected(null,'field','c.title,c.desc')?>>제목+내용</option>
        <option value="u.name" <?=my_set_selected(null,'field','u.name')?>>글쓴이</option>

    </select>
    <input type="text" name="value" value="<?=my_set_value('value','GET')?>">
    <input type="submit" value="검색">
</form>

<?= $this->pagination->create_links();?>

