<form action="<?=site_url(user_uri."/email_auth")?>" method="post">
    인증 코드<input type="text" name="auth_key"/>
    <input type="submit"/>
</form>
<?=$msg?>
<br><a href="<?=site_url(user_uri."/email_auth?email=$email")?>">다시발송</a>


