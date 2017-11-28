


<form action="<?=my_site_url(content_uri."/$mode",true)?>" method="post">
<!-- <input type="hidden" name="board_id" value="<?=$board_id?>"> -->
<input placeholder="제목" type="text" name="title" value="<?=set_value_data($content,'title')?>" > <?=form_error('title',false,false)?><br> 

<textarea placeholder="내용" name="desc" rows="10" cols="80">
<?=set_value_data($content,'desc')?>
</textarea>
<?=form_error('desc',false,false)?>

<input type="submit" value="보내기">
<?php
if(!is_login() && $mode==="add"){ ?>
    아이디<input type="text" name="guest_name">
    비밀번호<input type="password" name="guest_password">
<?php }?>
<?php if($board_id === "2"){?>
    <input type="hidden" name="is_secret" value="1">
<?php }?>
</form>

<!-- ckeditor -->
<script src="<?=domain_url('/public/lib/ckeditor_full/ckeditor.js')?>"></script>
<script>
 CKEDITOR.replace( 'desc',{
    filebrowserUploadUrl: '/index.php<?=common_uri?>/upload_receive_from_ck',
    height : '600px'
 } );

</script>
