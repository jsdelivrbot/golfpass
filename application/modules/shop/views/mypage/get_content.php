<div class="sixteen wide column">



<div class="ui raised segment">
<h1 class="ui header"><?=$content->title?></h1>

<div class="ui divider"></div>
<p>
<?=$content->desc?>
</p>
<!-- 코멘트시작 -->
<?php for($i =0; $i<count($replys); $i++){?>

<div class="ui comments">
<h3 class="ui dividing header">Comments</h3>

<div class="comment" style="margin-left:20px;">
    <a class="avatar">
      <img src="<?=$replys[$i]->profilePhoto?>">
    </a>
    <div class="content">
      <a class="author"><?=$replys[$i]->user_name?></a>
      <div class="metadata">
        <span class="date"><?=$replys[$i]->created?></span>
      </div>
      <div class="text">
      <?=$replys[$i]->desc?>
      </div>
      <div class="actions">
        <a class="reply" onclick="ajax_a(this); return false;" data-callback='ajax_update_form_callback' data-action='<?=site_url(content_reply_uri."/ajax_update_form")?>' data-querystring='{"id":"<?=$replys[$i]->id?>"}' href="#">답글</a>
        <a class="reply" data-id="<?=$replys[$i]->id?>" onclick="append_delete_pw_form(this); return false;" href="#">삭제</a>
      </div>
    </div>
  </div>
<?php }?>
<!-- 코멘트 끝 -->
<!-- 댓글쓰기폼 시작 -->
<?php if(can_guest($board->auth_w_review) || is_login()){?>
    <form  class="ui reply form" onsubmit="ajax_submit(this);return false;" action="<?=my_site_url(content_reply_uri."/ajax_add/0",true)?>" method="post" >
        <input type="hidden" name="content_id" value ="<?=$content->id?>">
        <div class="field">
            <textarea placeholder="댓글내용" id="review_desc"   cols="50" rows="5" cols="2"rows="5" type="text" name="desc"></textarea> 
            <?=form_error('desc',false,false)?>
        </div>
    <?php if(can_guest($board->auth_w_review) && is_guest()){?>
        <input placeholder="아이디" type="text" name ="guest_name">
        <input placeholder="비밀번호" type="password" name ="guest_password">
    <?php }?>

    <button type="submit" class="ui basic labeled submit icon button" >
    <i class="icon edit"></i> 댓글달기
</button>
    </form>

<?php }else{?>
<br>
    로그인하셔야 댓글을 쓸수 있습니다. 
    <a href="<?=site_url(user_uri."/login?return_url=".rawurlencode(my_current_url()))?>">login</a>
<br>
<?php }?>
<!-- 댓글쓰기폼 끝 -->

<!-- 
<form class="ui reply form">
  <div class="field">
    <textarea></textarea>
  </div>
  <div class="ui blue labeled submit icon button">
    <i class="icon edit"></i> Add Reply
  </div>
</form> -->
</div>


</div>




</div>
</div>


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