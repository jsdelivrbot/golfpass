<?php 
    function get_menu($menu_parent,$count){
        $count ++;
        echo "<ul><li> <$menu_parent->id></li>";
        echo "<li>$menu_parent->name</li>";
        echo " <li>$menu_parent->uri</li> ";
        if($count < 3) echo " <li><a href='".my_site_url(admin_menu_uri."/add/{$menu_parent->id}")."'>추가</a> </li>";
        echo " <li><a href='".my_site_url(admin_menu_uri."/update/{$menu_parent->id}") ."'>수정</a> </li>";
       ?> <li><a href='javascript:confirm_redirect("<?=my_site_url(admin_menu_uri."/delete/{$menu_parent->id}")?>","삭제하시곘습니까? 복구할 방법이없습니다.")'>삭제</a> </li>
       <?php
        if(isset($menu_parent->childs)){
            $menu_childs =$menu_parent->childs;
            for($i=0; $i< count($menu_childs); $i++){
                get_menu($menu_childs[$i],$count);
            }
        }
        echo"</ul>";
        return;
    }
?>

<style>
    li{
        display:inline;
    }
</style>
<?php

for($i=0 ; $i<count($menus) ; $i++){
    get_menu($menus[$i],0);            
}

?>
<a href="<?=my_site_url(admin_menu_uri."/add/0")?>">추가</a>