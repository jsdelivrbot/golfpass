<?php for($i=0; $i< count($panel_contents);$i++){?>
    <div class="content-box col-12 row">
        <div class="d-none d-md-block col-md-2 d-md-flex align-items-md-start justify-content-end">
            <img src="<?=$panel_contents[$i]->photo?>" class="rounded-circle" alt="" width="60px;">
        </div>
        <div class="col-12 col-md-10">
            <h1><?=$panel_contents[$i]->title?></h1>
            <div class="content">
            <?=$panel_contents[$i]->desc?>
            </div>
            <p class="date">
            <?=$panel_contents[$i]->created?><span> | </span>
                <span class="name"><?=$panel_contents[$i]->name?></span>
            </p>
        </div>
    </div>
    <?php }?>
    <!-- 글 리스트 끝 -->
    
    <div class="col-12 d-flex justify-content-center align-items-center pagination">
    <?php echo $this->ajax_pgi_2->create_links(); ?>
        <!-- <div class="prev"><a href="#"><i class="xi xi-angle-left-min"></i></a></div>
        <ul class="d-flex list-unstyled justify-content-center">
            <li class="current"><a href="#">01</a></li>
            <li><a href="#">02</a></li>
            <li><a href="#">03</a></li>
            <li><a href="#">04</a></li>
        </ul>
        <div class="next"><a href="#"><i class="xi xi-angle-right-min"></i></a></div> -->
    </div>