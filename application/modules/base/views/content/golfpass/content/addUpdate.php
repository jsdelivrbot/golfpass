

<?php if(is_semantic_dev) {?>
    <link rel="stylesheet/less" type="text/css" href="/public/framework/semantic/src/semantic.less">
<script src="/public/framework/semantic/src/less.min.js"></script>
<?php }else{?>
<link rel="stylesheet" type="text/css" href="/public/framework/semantic/out/semantic.css">
<link rel="stylesheet" type="text/css" href="/public/framework/semantic/out/semantic.js">
<?php }?>

<div class="ui grid container">
    <div class="sixteen wide column">
<form class="ui form" action="<?=my_site_url(content_uri."/$mode",true)?>" method="post">
<!-- <input type="hidden" name="board_id" value="<?=$board_id?>"> -->
<div class="field">
<input placeholder="제목" type="text" name="title" value="<?=set_value_data($content,'title')?>" > <?=form_error('title',false,false)?><br> 
</div>
<div class="field">
<textarea placeholder="내용" name="desc" rows="10" cols="80">
<?=set_value_data($content,'desc')?>
</textarea>
</div>
<div class="field">
<input type="text" name="hashtag"placeholder="태그 ex)시나이,웨이하이 (띄어쓰기 없이 쉼표로 구분)" value="<?=set_value_data($content,'hashtag')?>">

</div>
<input class="ui button basic" type="submit" value="쓰기">

</form>
</div>
</div>
<!-- ckeditor -->
<script src="<?=domain_url('/public/lib/ckeditor_full/ckeditor.js')?>"></script>
<script>
 CKEDITOR.replace( 'desc',{
    filebrowserUploadUrl: '/index.php<?=common_uri?>/upload_receive_from_ck',
    height : '600px'
 } );

</script>
