
<form action="<?=my_site_url(admin_page_uri."/$mode")?>" method="post">
    <input placeholder="제목" type="text" name="title" value="<?=set_value_data($row,'title')?>"> <?=form_error('title',false,false)?><br> 

    <textarea placeholder="내용" name="desc" rows="10" cols="80">
    <?=set_value_data($row,'desc')?>
    </textarea>
    <?=form_error('desc',false,false)?><br>
<input type="submit" value="보내기">
</form>

<!-- ckeditor -->
<script src="<?=domain_url('/public/lib/ckeditor_full/ckeditor.js')?>"></script>
<script>
 CKEDITOR.replace( 'desc',{
    filebrowserUploadUrl: '/index.php<?=common_uri?>/upload_receive_from_ck'
 } );

</script>
