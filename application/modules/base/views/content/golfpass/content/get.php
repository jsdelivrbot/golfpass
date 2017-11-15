
 
<div style="margin-top:50px;"></div>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/public/etc/kimmincastle/blog_detail.css">

<style>
    body,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        font-family: "Lato", sans-serif
    }

    .w3-bar,
    h1,
    button {
        font-family: "Montserrat", sans-serif
    }

    .fa-anchor,
    .fa-coffee {
        font-size: 200px
    }

</style>

    <!-- First Grid -->
    <div class="w3-row-padding w3-padding-64 w3-container">
        <a href="<?=site_url(content_uri."/update/{$content->id}?board_id={$board->id}")?>">수정</a>
        <a onclick="confirm_redirect('<?=site_url(content_uri."/delete/{$content->id}?board_id={$board->id}")?>','정말 삭제하시겠습니까? 복구 할 방법이 없습니다.')" href="#">삭제</a>
        <div class="w3-content">
            <div class="w3-twothird">
                <h1><?=$content->title?></h1>
                <p class="w3-text-grey"><?=$content->desc?></p>
            </div>
        </div>
    </div>


<?php if($board->id === "2"){?>

<div class="ui grid container">
    <div class="sixteen wide column">
<!-- 코멘트시작 -->
<div class="ui comments">
    <h3 class="ui dividing header">댓글목록</h3>
<?php for($i =0; $i<count($replys); $i++){?>


    <div class="comment" style="margin-left:<?=50*(int)$replys[$i]->deep?>px;">
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
            <?php if($replys[$i]->deep === "0"){?>
            <a class="reply reply_answer" data-id="<?=$replys[$i]->id?>" onclick="append_answer_form(this); return false;" href="#">답글</a>
            <?php }?>
            <?php if($replys[$i]->user_id === $user->id){?>
            <a class="reply reply_alert" onclick="ajax_a(this); return false;" data-callback='ajax_update_form_callback' data-action='<?=site_url(content_reply_uri."/ajax_update_form")?>' data-querystring='{"id":"<?=$replys[$i]->id?>"}' href="#">수정</a>
            <a onclick="confirm_callback(this,ajax_a,'삭제하시겠습니까?'); return false;" data-action="<?=site_url(content_reply_uri."/ajax_delete/{$replys[$i]->id}")?>" href="#">삭제</a>
            <?php }?>
        </div>
        </div>
    </div>
    <?php }?>
</div>
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
    </div>

    </div>
<?php }?>
    











<!--복사용 수정폼 시작 -->
<div id='nid_form_update'  style ="display:none; margin-left:50px;margin-top:15px;" >
<form class="ui form" onsubmit="ajax_submit(this);return false;" method="POST" action="">
    <textarea name="desc" id="" cols="30" rows="5" placeholder="수정할 댓글내용"></textarea>
    <?php if(is_guest()&& can_guest($board->auth_w_review)){?>
    <br>
    <input type="password" name="guest_password" placeholder="비밀번호">
    <?php }?>
    <input class="mini ui button basic" type="submit" value="수정">
</form>
</div>
<!-- 복사용 수정폼 끝-->


<!-- 복사용 답글폼 시작-->
<div id='nid_form_answer' style ="display:none;margin-left:50px;" >
      <form  class="ui form" onsubmit="ajax_submit(this);return false;" method="POST" action="">
        <input type="hidden" name="content_id" value ="<?=$content->id?>">
        <br><input type="hidden" name="board_id" value ="<?=$board->id?>">
            <textarea placeholder="답글내용" id="review_desc"   cols="50" rows="5" cols="2"rows="5" type="text" name="desc" value=""></textarea> <?=form_error('desc',false,false)?><br>
        <?php if(can_guest($board->auth_w_review) && is_guest()){?>
            <input placeholder="아이디" type="text" name ="guest_name">
            <input placeholder="비밀번호" type="password" name ="guest_password">
        <?php }?>
        <input class="mini ui button basic"type="submit" value="답글">
    </form>
    </div>



<!-- 복사용 답글폼 끝-->
<!-- 복사용 게스트 삭제폼 시작 -->
<div id='nid_form_delete_guest' style="display:none">
    <form  onsubmit="confirm_callback(this,ajax_submit,'삭제하시겠습니까?'); return false;"  action="">
        <br>
        <input type="password" name="guest_password" placeholder="비밀번호">
        <input type="submit" value ="삭제">
    </form>
</div>
<!-- 복사용 게스트 삭제폼 끝 -->

<script>
function ajax_update_form_callback(e,data){
    var $e =$(e);
    var sw=$e.data("sw");
    var el=$e.parents(".comment")[0];
    $e.siblings(".reply_answer").data("sw","off");

    $(el).find("#nid_form_answer").remove();
    if(typeof sw === "undefined" || sw==="off")
    {
        $e.data("sw","on");
        var review =data['review'];
        var action = '<?=site_url(content_reply_uri."/ajax_update/")?>'+review.id;
        
        var $formWapper = $('#nid_form_update').clone();
        $formWapper.css('display','block');
        $form=$formWapper.find("form");
        $form.attr('action',action);
        $form.find('textarea').text(review.desc);
        $(el).append($formWapper);
    }
    else
    {
        $e.data("sw","off");
       
        $(el).find("#nid_form_update").remove();
       
    }
   
}

function append_answer_form(e){
    // e.style.display = 'none';
    var $e = $(e);
    var el=$e.parents(".comment")[0];
    $(el).find("#nid_form_update").remove();
    $e.siblings(".reply_alert").data("sw","off");
    var sw=$e.data("sw");
    if(typeof sw === "undefined" || sw==="off")
    {
        $e.data("sw","on");
        var id = $e.data('id');
        var action = '<?=site_url(content_reply_uri."/ajax_add/")?>'+id;

        var $form_wapper = $('#nid_form_answer').clone();
        var $form = $form_wapper.find("form");
        $form_wapper.css('display','block');
        $form.attr('action',action);

        // var el=$e.parents("li")[0];
        $(el).append($form_wapper);

        return true;
    }else
    {
        $e.data("sw","off");
        $(el).find("#nid_form_answer").remove();
      

    }
  
}

function append_delete_pw_form(e){
    // e.style.display = 'none';
    var $e = $(e);
    var sw=$e.data("sw");
    if(typeof sw === "undefined" || sw==="off")
    {
        $e.data("sw","on");
        var id = $e.data('id');
        var action = '<?=site_url(content_reply_uri."/ajax_delete/")?>'+id;

        var $formWapper = $('#nid_form_delete_guest').clone();
        $formWapper.css('display','block');
        var $form =$formWapper.find("form");
        $form.attr('action',action);

        var el=$e.parents(".comment")[0];
        $(el).append($formWapper);

        return true;
    }
    else
    {
        $e.data("sw","off");
        var el=$e.parents(".comment")[0];
        console.log(el);
        $(el).find("#nid_form_delete_guest").remove();
    }
  
}
</script>