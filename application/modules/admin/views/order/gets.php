<style>
    li {
        display: inline;
    }
</style>

<table class="ui selectable table">
    <tr>
        <td>번호</td>
        <td>주문번호</td>
        <td>상품명</td>
        <td>결제방식/결제상태</td>
        <td>주문자</td>
        <td>주문날짜</td>
    </tr>
    <?php foreach ($orders as $order ): ?>

    <tr>
        <td>
            <?=$order->id?>
        </td>
        <td>
            <a href="<?=my_site_url(admin_order_uri."/get/{$order->merchant_uid}")?>">
                <?=$order->merchant_uid?>
            </a>
        </td>
        <td>
            <a href="<?=my_site_url(admin_order_uri."/get/{$order->merchant_uid}")?>">
                <?=$order->order_name?>
            </a>
        </td>
        <td>
            <?=$order->pay_method?>/
                <?=$order->status?>
        </td>
        <td>
            <?=$order->user_name?>
                <?= isset($order->userName) ? "({$order->userName})" : ""?>
        </td>
        <td>
            <?=$order->created?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>



<form class="ui form" style="margin-top:30px;" class="" action="<?=my_site_url(admin_order_uri."/gets")?>" method="get">
    <div class="fields">
        <div class="field">
            <select name="field" id="">
                <option value="o.merchant_uid" <?=my_set_selected(null, 'field', 'o.merchant_uid')?>>주문번호</option>
                <option value="o.order_name" <?=my_set_selected(null, 'field', 'o.order_name')?>>상품명</option>
                <option value="o.user_name" <?=my_set_selected(null, 'field', 'o.user_name')?>>주문자이름</option>
                <option value="o.status" <?=my_set_selected(null, 'field', 'o.status')?>>결제상태</option>
                <option value="o.pay_method" <?=my_set_selected(null, 'field', 'o.pay_method')?>>결제방식</option>
                <option value="o.created" <?=my_set_selected(null, 'field', 'o.created')?>>주문날짜</option>
            </select>
        </div>
        <div class="field">
            <input type="text" name="value" value="<?=my_set_value('value','POST')?>">
        </div>
        <input class="ui button basic" type="submit" value="검색">
    </div>
    <input type="hidden" name="menu_name" value="<?=$this->input->get("menu_name")?>">
    <input type="hidden" name="sub_name" value="<?=$this->input->get("sub_name")?>">
</form>
<div class="ui centered grid container">
    <div class="row">
        <?= $this->pagination->create_links();?>

    </div>
</div>