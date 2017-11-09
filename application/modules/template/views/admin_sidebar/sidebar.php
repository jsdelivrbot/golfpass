
 



<?php for($i=0 ; $i < count($main_menus) ; $i++){?>
    <li class="<?=$main_menus[$i]->id === $menu_id ? 'active' : ''?> treeview">
        <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span><?=$main_menus[$i]->name?></span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <?php for($j=0 ; $j < count($sub_menus[$main_menus[$i]->id]) ; $j++){?>
            <li><a href="<?=$sub_menus[$main_menus[$i]->id][$j]->uri?>"><i class="fa fa-circle-o"></i> <?=$sub_menus[$main_menus[$i]->id][$j]->name?></a></li>
            <?php }?>
        </ul>
        </li>
<?php }?>
 