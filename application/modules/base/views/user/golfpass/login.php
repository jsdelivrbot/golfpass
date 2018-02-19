<!-- Standard Meta -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width">


<?php if(is_semantic_dev) {?>
    <link rel="stylesheet/less" type="text/css" href="/public/framework/semantic/src/semantic.less">
<script src="/public/framework/semantic/src/less.min.js"></script>
<?php }else{?>
<link rel="stylesheet" type="text/css" href="/public/framework/semantic/out/semantic.css">
<link rel="stylesheet" type="text/css" href="/public/framework/semantic/out/semantic.js">
<?php }?>

<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.2.13/dist/semantic.min.css"> -->
<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.2.13/dist/semantic.min.js"></script>


<div style="margin-top:180px;"></div>
<style>
    .column {
        max-width: 450px;
    }
</style>


<div class="ui middle aligned center aligned grid">
    <div class="column">
        <form action="<?=my_site_url(user_uri."/login?return_url=".rawurlencode($_SERVER['HTTP_REFERER']))?>" method="post" class="ui large form" style="max-width: 90%; margin: 0 auto;">
            <div class="ui header">골프패스 로그인</div>
            <div class="field">
                <div class="ui left icon input">
                    <i class="user icon"></i>
                    <input type="text" name="userName" placeholder="아이디" value="<?=set_value('userName')?>">
                </div>
            </div>
            <div class="field">
                <div class="ui left icon input">
                    <i class="lock icon"></i>
                    <input type="password" name="password" placeholder="비밀번호">
                </div>
            </div>
            <input type="submit" class="ui fluid positive basic button" value="로그인"></input>


            <div class="ui error message"></div>


            <div class="ui horizontal divider">
                Or
            </div>
            <a href="javascript:open_popup('<?=site_url(api_facebook_uri."/request_auth")?>','facebook','800','880');" class="ui facebook fluid large submit button" style="margin-bottom:10px;"><i class="facebook icon"></i>페이스북으로 로그인</a>
            <a href="javascript:open_popup('<?=site_url(api_naver_uri."/request_auth")?>','naver');" class="ui naver fluid large submit button" style="margin-bottom:10px;">네이버로 로그인</a>
            <a href="javascript:open_popup('<?=site_url(api_kakao_uri."/request_auth")?>','kakao');" class="ui kakao fluid large submit button"><i class="kakao icon"></i>카카오로 로그인</a>

            <div class="ui divider"></div>
            <div class="">
                <a href="<?=site_url(user_uri."/find_id")?>">아이디 찾기</a> | <a href="<?=site_url(user_uri."/find_pw")?>">비밀번호 찾기</a> | <a href="<?=site_url(user_uri."/register_agree_1")?>">회원가입</a>
            </div>
        </form>
    </div>

</div>

<div style="margin-bottom:100px;"></div>