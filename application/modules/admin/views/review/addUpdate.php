
<form action="<?=site_url(admin_product_review_uri."/$mode")?>" method="post">
상품후기 보이기
<input type="radio" name="is_display" value="1" <?=my_set_checked($content,'is_display','1')?>>예
<input type="radio" name="is_display" value="0" <?=my_set_checked($content,'is_display','0')?>>아니오
<br>
<input placeholder="제목" type="text" name="title" value="<?=set_value_data($content,'title')?>" > <?=form_error('title',false,false)?><br> 
<textarea placeholder="내용" name="desc" rows="10" cols="80">
<?=set_value_data($content,'desc')?>
</textarea>
<?=form_error('desc',false,false)?>

<input type="submit" value="보내기">
</form>


<!-- ckeditor -->
<script src="<?=domain_url('/public/lib/ckeditor/ckeditor.js')?>"></script>
<script>
 CKEDITOR.replace( 'desc',{
    filebrowserUploadUrl: '/index.php<?=common_uri?>/upload_receive_from_ck'
 } );

</script>
