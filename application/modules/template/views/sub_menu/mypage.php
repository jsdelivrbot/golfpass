<!-- 사이드바 -->

<nav id="nav_main">
마이페이지 **
<?php for($i=0 ; $i<count($sub_menus); $i++){?>
<a style="display:block;" href="<?=site_url("{$sub_menus[$i]->uri}")?>"><?=$sub_menus[$i]->name?></a>
<?php }?>
</nav>
<!-- 사이드바 -->
