<form action="<?=site_url(shop_order_uri."/index/$product_id")?>">
    홀수 추가
    <input type="text">

    <br>
    싱글룸추가
    <input type="text">

    <br>
    기타옵션 추가
    <input type="text">

    <input type="submit" value="예약">

<input type="hidden" name="product_id" value="<?=$product_id?>">
<input type="hidden" name="start_date" value="<?=$start_date?>">
<input type="hidden" name="end_date" value="<?=$end_date?>">
<input type="hidden" name="num_people" value="<?=$num_people?>">
<input type="hidden" name="total_price" value="<?=$total_price?>">
</form>