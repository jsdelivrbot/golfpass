
<style>
    input{
        display:block;
    }
</style>

login
<form action="<?=my_site_url(user_uri."/login?return_url=".rawurlencode($return_url))?>" method="post">
    userName<input type="text" name="userName" value="<?=set_value('userName')?>">
    password<input type="password" name="password">
    <input type="submit" value="로그인">
</form>

비회원 주문조회
<form action="<?=site_url(shop_order_uri."/get_by_guest")?>" method="post">
주문번호<input type="text" name="merchant_uid" value="<?=set_value('merchant_uid')?>">
주문자 이름<input type="text" name="user_name"  value="<?=set_value('user_name')?>">
<input type="submit" value="조회">
</form>