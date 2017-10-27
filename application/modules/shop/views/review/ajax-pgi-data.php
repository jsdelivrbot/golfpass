<table>
    <tr><td>번호</td><td>제목</td><td>글쓴이</td><td>날짜</td></tr>

<?php for($i=0 ; $i<count($reviews) ; $i++){?>
    <tr>
        <td><?=$reviews[$i]->id?></td>
        <td><a  data-callback='callback_content_get' onclick="ajax_a(this); return false;" data-action="<?=my_site_url(shop_review_uri."/ajax_get/{$reviews[$i]->id}")?>" href='#'>  <?=$reviews[$i]->title?></a></td>
        <td><?=$reviews[$i]->user_name?>(<?=$reviews[$i]->userName?>)</td>
        <td><?=$reviews[$i]->created?></td></tr>
    <?php }?>
</table>

<?php echo $this->ajax_pagination->create_links(); ?>