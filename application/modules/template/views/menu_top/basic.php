<?php for($i=0 ; $i< count($menus_top); $i++){?>
        <a href="<?=site_url($menus_top[$i]->uri)?>"><?=$menus_top[$i]->name?></a>
    <?php }?>