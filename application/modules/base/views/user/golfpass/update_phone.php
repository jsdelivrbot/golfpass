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
<!--  -->
<style>
    .column {
        max-width: 450px;
    }
</style>

<div style="margin-top:300px;"></div>


<div class="ui middle aligned center aligned grid">
    <div class="column">
        <form  action ="<?=my_site_url(user_uri."/{$mode}")?>" method="POST"  class="ui large form " style="max-width: 90%; margin: 0 auto;">
			
                <div class="field">
                    <input type="text" name="phone" placeholder="휴대폰 번호" value="<?=set_value_data($user,'phone')?>">
                    
                </div>
                <div class="field">
                    <a  style=""class="ui fluid positive basic button" href ="javascript:auth_popup('<?=site_url(user_uri."/phone_auth")?>','phone')">휴대폰 인증</a>
                </div>
         

            <input type="submit" class="ui fluid positive button" value="번호등록" style="margin-top:10px;"></input>



        </form>
    </div>

</div>

<div style="margin-top:300px;"></div>
<script>
    function auth_popup(url,name){
    var option = "width=400,height=500";
    var input = document.querySelector("input[name="+name+"]");

    // console.log(input.value);
    window.open(url+"?"+name+"="+input.value,name+'_auth',option);
}
function img_upload_popup(url){
    var option = "width=400,height=500";

    // console.log(input.value);
    window.open(url,'이미지업로드',option);
}


    $('.ui.dropdown')
        .dropdown({
            allowAdditions: true
        });
</script>