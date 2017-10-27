<style>
    li{
        display:inline;
    }
</style>
<?php for($i=0 ; $i<count($orders) ; $i++){?>
    <ul>
        <li>번호 <?=$orders[$i]->id?> </li>
        <li><a href="<?=my_site_url(admin_order_uri."/get/{$orders[$i]->merchant_uid}")?>"> 주문번호 <?=$orders[$i]->merchant_uid?></a>  </li>
        <li><?=$orders[$i]->user_name?> (<?=$orders[$i]->userName?>) </li>
        <!-- <li><a href="<?=my_site_url(admin_order_uri."/update/{$orders[$i]->id}")?>">수정</a></li> -->
    </ul>
<?php }?>


 <!-- <form action="<?=my_site_url(admin_order_uri."/gets")?>" method="post" >
    <select name="field" id="">
        <option value="p.name" <?=my_set_selected('field','p.name','POST')?>>상품명</option>
        <option value="u.userName" <?=my_set_selected('field','u.userName','POST')?>>userName</option>
    </select>
    <input type="text" name="value" value="<?=my_set_value('value','POST')?>">
    <br/>
    <input id="search_form_submit" type="submit" value="검색">
</form> -->
<?= $this->pagination->create_links();?> 

