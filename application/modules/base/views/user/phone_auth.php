<form action="<?=my_site_url(user_uri."/phone_auth")?>" method="post">
    인증 코드<input type="text" name="auth_key"/>
    <input type="submit"/>
</form>
<?=$msg?>
<br><a href="<?=site_url(user_uri."/phone_auth?phone=$phone")?>">다시발송</a>


