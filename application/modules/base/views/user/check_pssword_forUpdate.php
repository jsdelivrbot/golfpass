
<?php if(is_semantic_dev) {?>
    <link rel="stylesheet/less" type="text/css" href="/public/framework/semantic/src/semantic.less">
<script src="/public/framework/semantic/src/less.min.js"></script>
<?php }else{?>
<link rel="stylesheet" type="text/css" href="/public/framework/semantic/out/semantic.css">
<link rel="stylesheet" type="text/css" href="/public/framework/semantic/out/semantic.js">
<?php }?>

<div class="ui centered grid container">
    <div class="wide sixteen column" style="max-width: 500px;">
        <h3 class="ui header"><i class="lock icon"></i> 보안을 위해 현재 비밀번호를 한번더 입력해주세요.</h2>
        <form class="ui form" action="<?=my_site_url(user_uri."/check_pssword_forUpdate")?>" method="POST">
            <div class="field">
            <label for="">비밀번호 </label>
            <input type="password" name="password"><?=form_error('password',false,false)?>
            </div>
            <input class="ui button positive basic"type="submit" value="확인">
        </form>
    </div>
</div>