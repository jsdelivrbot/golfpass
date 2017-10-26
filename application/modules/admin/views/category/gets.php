<?php 
    function get_menu($category_parent,$count){
        $count ++;
        echo "<ul><li> <$category_parent->id></li>";
        echo "<li>$category_parent->name</li>";
        if($count < 3) echo " <li><a href='".my_site_url(admin_product_category_uri."/add/{$category_parent->id}")."'>추가</a> </li>";
        echo " <li><a href='".my_site_url(admin_product_category_uri."/update/{$category_parent->id}") ."'>수정</a> </li>";
        echo " <li><a href='".my_site_url(admin_product_category_uri."/delete/{$category_parent->id}") ."'>삭제</a> </li>";
        
        if(isset($category_parent->childs)){
            $category_childs =$category_parent->childs;
            for($i=0; $i< count($category_childs); $i++){
                get_menu($category_childs[$i],$count);
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

for($i=0 ; $i<count($categories) ; $i++){
    get_menu($categories[$i],0);            
}

?>
<a href="<?=my_site_url(admin_product_category_uri."/add/0")?>">추가</a>