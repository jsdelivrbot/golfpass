<table>
<tr><td>번호</td><td>제목</td><td>글쓴이</td><td>날짜</td></tr>
<?php for($i=0 ; $i<count($panel_contents) ; $i++){?>
<tr>
    <td><?=$panel_contents[$i]->id?></td>
    <!-- <td><a  data-callback='callback_content_get' onclick="ajax_a(this); return false;" data-action="<?=my_site_url(shop_review_uri."/ajax_get/{$panel_contents[$i]->id}")?>" href='#'>  <?=$panel_contents[$i]->title?></a></td> -->
    <td><?=$panel_contents[$i]->title?></td>
    <td><?=$panel_contents[$i]->desc?></td>
    <td><?=$panel_contents[$i]->created?></td></tr>
<?php }?>
</table>
<?php echo $this->ajax_pgi_2->create_links(); ?>
