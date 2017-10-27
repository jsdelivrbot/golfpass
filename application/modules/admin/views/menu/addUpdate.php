
<?php if(strpos($mode,"update")> -1) echo "id $menu->id"?>
<form action="<?=my_site_url(admin_menu_uri."/$mode",true)?>" method="post">
    <상속메뉴><input type="text" name="parent_id" value="<?=set_value_data($menu,'parent_id')?>"><?=form_error('parent_id',false,false)?><br> 
    <메뉴이름><input type="text" name="name" value="<?=set_value_data($menu,'name')?>"> <?=form_error('name',false,false)?><br> 
    <순서><input type="text" name="order" value="<?=set_value_data($menu,'order')?>"> <?=form_error('order',false,false)?><br> 
    <!-- <메뉴 URI><input type="text" name="uri" value="<?=set_value_data($menu,'uri')?>"> <?=form_error('uri',false,false)?><br>  -->
    <메뉴 URI>
    <select name="uri" id="">
    <option <?=my_set_selected($menu,"uri","")?> value="">none</option>
    <option <?=my_set_selected($menu,"uri",shop_cartlist_uri."/gets")?> value="<?=shop_cartlist_uri."/gets"?>">장바구니</option>
    <option <?=my_set_selected($menu,"uri",shop_order_uri."/gets")?> value="<?=shop_order_uri."/gets"?>">주문관리</option>
        <?php for($i=0; $i < count($boards);$i++ ){?>
        <option <?=my_set_selected($menu,"uri",content_uri."/gets?board_id={$boards[$i]->id}")?> value="<?=content_uri."/gets?board_id={$boards[$i]->id}"?>">게시판명 <?=$boards[$i]->name?> </option>
        <?php }?>

        <?php for($i=0; $i < count($pages);$i++ ){?>
        <option <?=my_set_selected($menu,"uri",page_uri."/get/{$pages[$i]->id}")?> value="<?=page_uri."/get/{$pages[$i]->id}"?>">페이지제목 <?=$pages[$i]->title?> </option>
        <?php }?>
        
    </select>
<input type="submit" value="보내기">
</form>

