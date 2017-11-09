
<form action="<?=my_site_url(golfpass_panel_contents_admin_uri."/$mode",true)?>" method="post">
<input placeholder="제목" type="text" name="title" value="<?=set_value_data($panel_content,'title')?>" > <?=form_error('title',false,false)?><br> 

<textarea placeholder="내용" name="desc" rows="30" cols="80">
<?=set_value_data($panel_content,'desc')?>
</textarea>

<input type="submit" value="보내기">


</form>

<!-- ckeditor -->
<script src="<?=domain_url('/public/lib/ckeditor/ckeditor.js')?>"></script>
<script>
 CKEDITOR.replace( 'desc',{
    filebrowserUploadUrl: '/index.php<?=common_uri?>/upload_receive_from_ck'
 } );

</script>
