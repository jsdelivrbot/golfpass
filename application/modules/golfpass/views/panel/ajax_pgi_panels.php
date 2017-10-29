<table>
    <tr><td>번호</td><td>제목</td><td>글쓴이</td><td>날짜</td></tr>
<?php for($i=0 ; $i<count($panels) ; $i++){?>
    <tr>
        <td><?=$panels[$i]->id?></td>
        <!-- <td><a  data-callback='callback_content_get' onclick="ajax_a(this); return false;" data-action="<?=my_site_url(shop_review_uri."/ajax_get/{$panels[$i]->id}")?>" href='#'>  <?=$panels[$i]->title?></a></td> -->
        <td><?=$panels[$i]->name?></td>
        <td><?=$panels[$i]->created?></td></tr>
    <?php }?>
</table>
<?php echo $this->ajax_pgi_1->create_links(); ?>
