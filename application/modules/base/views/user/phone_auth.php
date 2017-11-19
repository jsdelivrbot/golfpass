
<?php if(is_semantic_dev) {?>
    <link rel="stylesheet/less" type="text/css" href="/public/framework/semantic/src/semantic.less">
<script src="/public/framework/semantic/src/less.min.js"></script>
<?php }else{?>
<link rel="stylesheet" type="text/css" href="/public/framework/semantic/out/semantic.css">
<?php }?>

<div class="ui grid container" style="margin-top:30px;">
<form class="ui form" action="<?=my_site_url(user_uri."/phone_auth")?>" method="post">
<div class="field">
    <label> 인증 코드</label>
   <input type="text" name="auth_key"/>
</div>
    <input type="submit" class="ui button basic" value="보내기">



        <div class="ui icon message">
    <i class="notched circle loading icon"></i>
    <div class="content">
        <div class="header">
        <?=$msg?>
        </div>
    </div>
    </div>

    <a class="ui button basic" href="<?=site_url(user_uri."/phone_auth?phone=$phone")?>">다시발송</a>
</form>



</div>
