

  <!-- Standard Meta -->
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width">

<!-- <link rel="stylesheet/less" type="text/css" href="/public/framework/semantic/src/semantic.less"> -->
<link rel="stylesheet" type="text/css" href="/public/framework/semantic/out/semantic.css">

<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.2.13/dist/semantic.min.css"> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.2.13/dist/semantic.min.js"></script> -->


<script src="/public/framework/semantic/src/less.min.js"></script>
<div style="margin-top:120px;"></div>


<div class="ui grid">
  <div class="three column centered row">
  <form class="ui column large form ">
    <div class="ui header">골프패스 로그인</div> 
          <div class="field">
            <div class="ui left icon input">
              <i class="user icon"></i>
              <input type="text" name="userName" placeholder="아이디">
            </div>
          </div>
          <div class="field">
            <div class="ui left icon input">
              <i class="lock icon"></i>
              <input type="password" name="password" placeholder="비밀번호">
            </div>
          </div>
          <div class="ui fluid large submit button">Login</div>

        <div class="ui error message"></div>


        <div class="ui horizontal divider">
    Or
  </div>
        <div class="ui fluid large submit button" style="margin-bottom:10px;">구글로 로그인</div>
        <div class="ui fluid large submit button" style="margin-bottom:10px;">네이버로 로그인</div>
        <div class="ui fluid large submit button">페이스북으로 로그인</div>
    </form>
      </div>
    
</div>

<div style="margin-bottom:120px;"></div>