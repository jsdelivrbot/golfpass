
        <?php for($i=0 ; $i< count($menus); $i++){?>
            <a href="<?=site_url($menus[$i]->uri)?>"><?=$menus[$i]->name?></a>
        <?php }?>
    