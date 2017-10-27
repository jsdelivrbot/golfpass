
보안을 위해 현재 비밀번호를 한번더 입려해주세요.
<form action="<?=my_site_url(user_uri."/check_pssword_forUpdate")?>" method="POST">
비밀번호 <input type="password" name="password"><?=form_error('password',false,false)?>
<input type="submit" value="확인">
</form>