

글
<ul>
<li>제목 <?=$content->title?></li>
<li>내용 <?=$content->desc?></li>
<li>작성자 <?=$content->user_name?>(<?=$content->userName?>)</li>
</ul>
<a href="<?=my_site_url(content_uri."/update/$content->id")?>">수정</a>
<a href="javascript:confirm_redirect('<?=my_site_url(content_uri."/delete/$content->id")?>','글을 삭제하시겠습니까?');">삭제</a>

