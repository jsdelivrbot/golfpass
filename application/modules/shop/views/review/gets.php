<style>
    li{
        display:inline;
    }
   
</style>


<div  id="nid_postList">

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

<?php echo $this->pagination->create_links(); ?>

</div>
<?php if(isset($product_id)){?>
<a href="<?=my_site_url(shop_review_uri."/add/{$product_id}")?>">글쓰기</a>
<?php }?>

<form onsubmit="submit_get(this); return false;" action="<?=my_site_url(shop_review_uri."/gets",true)?>" method="post">
    <select name="field" id="">
        <option value="r.title" <?=my_set_selected(null,'field','r.title')?>>제목</option>
        <option value="r.desc" <?=my_set_selected(null,'field','r.desc')?>>내용</option>
        <option value='r.title,r.desc' <?=my_set_selected(null,'field','r.title,r.desc')?>>제목+내용</option>
        <option value="u.name" <?=my_set_selected(null,'field','u.name')?>>글쓴이</option>
    </select>
    <input type="text" name="value" value="<?=my_set_value('value','GET')?>">
    <input type="submit" value="검색">
</form>


<!--복사용 content/get 시작 -->
<div id='nid-content' style='display:none'>
    <div class="author">a</div>
    <div class="title">t</div>
    <div class="desc">d</div>
</div>
<!--복사용 content/get 끝 -->
<script>
function callback_content_get(e,data){
    var $content = $("#nid-content").clone();
    $content.css('display','block');
    
    $content.find('.author').text(data['content'].user_name+"("+data['content'].userName+")");
    $content.find('.title').text(data['content'].title);
    $content.find('.desc').html(data['content'].desc);

    var el =$(e).parents('tr')[0];
    $(el).after($content);
}
</script>