
<div class="sixteen wide column">
    <form class="ui form" action="<?=my_site_url(shop_mypage_uri."/add_contact")?>" method="post">
    <div class="field">
        <input type="text" name="title" placeholder="제목" value="<?=set_value_data($content,"title")?>">
    </div>
        <textarea  id="" cols="30" rows="10" name="desc" >
        <?=set_value_data($content,"desc")?>
        </textarea>
    
    <input style="margin-top:10px;"class="ui button basic" type="submit" value="저장">
    </form>

</div>

<script src="<?=domain_url('/public/lib/ckeditor/ckeditor.js')?>"></script>
<script>
 CKEDITOR.replace( 'desc',{
    filebrowserUploadUrl: '/index.php<?=common_uri?>/upload_receive_from_ck'
 } );

</script>