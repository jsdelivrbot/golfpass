<!-- 사이드바 -->

<?php if(count($sub_menus) !== 0){?>

<nav id="nav_main">
basic
<?php for($i=0 ; $i<count($sub_menus); $i++){?>
<a style="display:block;" href="<?=site_url("{$sub_menus[$i]->uri}")?>"><?=$sub_menus[$i]->name?></a>
<?php }?>
</nav>
<?php  }?>
<!-- 사이드바 -->
