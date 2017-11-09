<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<div style="margin-top:180px;"></div>
<div class="container" style="margin-bottom: 150px;">
    <div class="row">
        <div class="col-md-4 col-md-offset-4" style="margin: 0 auto;">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="text-center">
                        <h3><i class="fa fa-lock fa-4x"></i></h3>
                        <h2 class="text-center">비밀번호 재설정</h2>
                        <p>가입 시 작성한 아이디를 작성해주세요!</p>
                        <div class="panel-body">

                            <form action="<?=site_url(user_uri."/find_pw")?>" id="register-form" role="form" autocomplete="off" class="form" method="post">

                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon">TEL</span>
                                        <input id="email" name="userName" placeholder="아이디를 입력해주세요." class="form-control" type="TEL">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input name="recover-submit" class="btn btn-lg btn-primary btn-block" value="확인" type="submit" style="background-color: #79b754; border: 0px;">
                                </div>

                                <input type="hidden" class="hide" name="token" id="token" value="">
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>