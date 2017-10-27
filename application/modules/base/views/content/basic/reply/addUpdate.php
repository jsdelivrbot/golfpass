

<form action="<?=my_site_url(content_reply_uri."/$mode",true)?>" method="post" onsubmit="return validation_review();">
<input type="hidden" name="content_id" value ="<?=$content->id?>">
내용<textarea id="review_desc" required  cols="50" rows="5" cols="2"rows="5" type="text" name="desc" value="<?=set_value_data($review,'desc')?>"></textarea> <?=form_error('desc',false,false)?><br>
<input type="submit" value="댓글달기">
</form>

<!-- 
<script>
    function validation_review(){
        if(!document.getElementById("review_desc").value){
            alert("댓글을 입력해주세요");
            return false;
        }
    }

</script>
 -->


