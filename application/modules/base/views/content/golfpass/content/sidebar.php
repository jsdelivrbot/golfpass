
<style>
    .jy-sidebar
    {
        height :300px;
        border : 1px solid black;
        position:fixed;
        top:200px;
        left: 100px;
    }
    .jy-sidebar .jy-item
    {
        display:block;
    }
</style>
<div class="jy-sidebar">
<a class="jy-item" href="<?=my_site_url(content_uri."/gets?board_id=4")?>">공지사항</a>
<a class="jy-item" href="<?=my_site_url(content_uri."/gets?board_id=3")?>">자주묻는 질문</a>
<a class="jy-item" href="<?=my_site_url(content_uri."/gets?board_id=2&is_user=true")?>">1:1문의</a>
</div>