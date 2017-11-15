
<!-- 댓글목록시작 -->
<br><br><br>댓글목록
<?php for($i=0; $i < count($replys); $i++){?>

    
<ul style="padding-left:<?=50 * (int)$replys[$i]->deep?>px;">
<li>
    <div>작성자 <?=$replys[$i]->user_name?>(<?=$replys[$i]->userName?>)</div>
    <!-- 수정 답글 삭제 폼 시작 -->
    <?php if(is_admin() || is_writer($replys[$i]->user_id)){?>
        <a onclick="ajax_a(this); return false;" data-callback='ajax_update_form_callback' data-action='<?=site_url(content_reply_uri."/ajax_update_form")?>' data-querystring='{"id":"<?=$replys[$i]->id?>"}' href="#">수정</a>
        <a data-id="<?=$replys[$i]->id?>" onclick="append_answer_form(this); return false;" href="#">답글</a>
    <?php }?>
   
    <?php if((is_admin() || is_writer($replys[$i]->user_id)) && !is_guest()){?> <!-- 회원일경우 -->
        <a onclick="confirm_callback(this,ajax_a,'삭제하시겠습니까?'); return false;" data-action="<?=site_url(content_reply_uri."/ajax_delete/{$replys[$i]->id}")?>" href="#">삭제</a>
    <?php }else if( is_writer($replys[$i]->user_id)&& can_guest($board->auth_w_review) ){?>   <!-- 게스트일경우 -->
        <a data-id="<?=$replys[$i]->id?>" onclick="append_delete_pw_form(this); return false;" href="#">삭제</a>

    <?php }?>
    <!-- 수정 답글 삭제 폼 끝 -->
    <div>작성일 <?=$replys[$i]->created?></div>
    <div>내용 <?=$replys[$i]->desc?></div>
   
</ul>
<!-- 댓글목록끝 -->
</li>
<?php }?>



<!-- 댓글쓰기폼 시작 -->
<?php if(can_guest($board->auth_w_review) || is_login()){?>
    <form   onsubmit="ajax_submit(this);return false;" action="<?=my_site_url(content_reply_uri."/ajax_add/0",true)?>" method="post" >
        <input type="hidden" name="content_id" value ="<?=$content->id?>">
        내용<br><textarea placeholder="댓글내용" id="review_desc"   cols="50" rows="5" cols="2"rows="5" type="text" name="desc" value=""></textarea> <?=form_error('desc',false,false)?><br>
    <?php if(can_guest($board->auth_w_review) && is_guest()){?>
        <input placeholder="아이디" type="text" name ="guest_name">
        <input placeholder="비밀번호" type="password" name ="guest_password">
    <?php }?>
        <input type="submit" value="댓글달기">
    </form>

<?php }else{?>
<br>
    로그인하셔야 댓글을 쓸수 있습니다. 
    <a href="<?=site_url(user_uri."/login?return_url=".rawurlencode(my_current_url()))?>">login</a>
<br>
<?php }?>
<!-- 댓글쓰기폼 끝 -->



<!--복사용 수정폼 시작 -->
<form id='nid_form_update' style ="display:none;" onsubmit="ajax_submit(this);return false;" method="POST" action="">
    <textarea name="desc" id="" cols="30" rows="5" placeholder="수정할 댓글내용"></textarea>
    <?php if(is_guest()&& can_guest($board->auth_w_review)){?>
    <br>
    <input type="password" name="guest_password" placeholder="비밀번호">
    <?php }?>
    <input type="submit" value="수정">
</form>
<!-- 복사용 수정폼 끝-->

<!-- 복사용 답글폼 시작-->
<form id='nid_form_answer' style ="display:none;"  onsubmit="ajax_submit(this);return false;" method="POST" action="">
        <input type="hidden" name="content_id" value ="<?=$content->id?>">
        <input type="hidden" name="board_id" value ="<?=$board->id?>">
            답글내용<br><textarea placeholder="댓글내용" id="review_desc"   cols="50" rows="5" cols="2"rows="5" type="text" name="desc" value=""></textarea> <?=form_error('desc',false,false)?><br>
        <?php if(can_guest($board->auth_w_review) && is_guest()){?>
            <input placeholder="아이디" type="text" name ="guest_name">
            <input placeholder="비밀번호" type="password" name ="guest_password">
        <?php }?>
        <input type="submit" value="답글">
    </form>
<!-- 복사용 답글폼 끝-->

<!-- 복사용 게스트 삭제폼 시작 -->
<form id='nid_form_delete_guest' style="display:none" onsubmit="confirm_callback(this,ajax_submit,'삭제하시겠습니까?'); return false;"  action="">
    <br>
    <input type="password" name="guest_password" placeholder="비밀번호">
    <input type="submit" value ="삭제">
</form>
<!-- 복사용 게스트 삭제폼 끝 -->

<script>
function ajax_update_form_callback(e,data){
    e.style.display = 'none';
    var review =data['review'];
    var action = '<?=site_url(content_reply_uri."/ajax_update/")?>'+review.id;
    
    var $form = $('#nid_form_update').clone();
    $form.css('display','block');
    $form.attr('action',action);
    $form.find('textarea').text(review.desc);
    var el=$(e).parents("li")[0];
    $(el).append($form);
   
}

function append_answer_form(e){
    e.style.display = 'none';
    var $e = $(e);
    var id = $e.data('id');
    var action = '<?=site_url(content_reply_uri."/ajax_add/")?>'+id;

    var $form = $('#nid_form_answer').clone();
    $form.css('display','block');
    $form.attr('action',action);

    var el=$e.parents("li")[0];
    $(el).append($form);

    return true;
}

function append_delete_pw_form(e){
    e.style.display = 'none';
    var $e = $(e);
    var id = $e.data('id');
    var action = '<?=site_url(content_reply_uri."/ajax_delete/")?>'+id;

    var $form = $('#nid_form_delete_guest').clone();
    $form.css('display','block');
    $form.attr('action',action);

    var el=$e.parents("li")[0];
    $(el).append($form);

    return true;
}
</script>