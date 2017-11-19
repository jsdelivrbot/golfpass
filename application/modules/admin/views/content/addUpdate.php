
<form action="<?=my_site_url(admin_content_uri."/$mode",true)?>" method="post">
<input placeholder="제목" type="text" name="title" value="<?=set_value_data($content,'title')?>" >
 <?=form_error('title',false,false)?><br> 
<textarea placeholder="내용" name="desc" rows="10" cols="80"><?=set_value_data($content,'desc')?></textarea>
<?=form_error('desc',false,false)?>

유저이름
<select name="user_id" >
<?php for($i= 0 ; $i < count($users); $i++){?>
    <option value="<?=$users[$i]->id?>" <?=my_set_selected($content,"user_id",$users[$i]->id)?>><?=$users[$i]->name?></option>
<?php }?>
</select>

게시판이름
<select name="board_id" >
<?php for($i= 0 ; $i < count($boards); $i++){?>
    <option value="<?=$boards[$i]->id?>" <?=my_set_selected($content,"board_id",$boards[$i]->id)?>><?=$boards[$i]->name?></option>
<?php }?>
</select>
<br>
<input type="submit" value="보내기">

</form>

<!-- ckeditor -->
<script src="<?=domain_url('/public/lib/ckeditor/ckeditor.js')?>"></script>
<script>
 CKEDITOR.replace( 'desc',{
    filebrowserUploadUrl: '/index.php<?=common_uri?>/upload_receive_from_ck'
 } );

</script>
