<form onsubmit="ajax_submit(this); return false;"action="<?=my_site_url(content_uri."/ajax_check_guest_password/$mode/$id")?>" method="post">
<input type="password" name="guest_password">
<input type="submit">
</form>