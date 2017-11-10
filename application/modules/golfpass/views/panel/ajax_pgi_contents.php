<?php for($i=0; $i< count($panel_contents);$i++){?>
    <div class="content-box col-12 row">

            <div class="d-none d-md-block col-md-2 d-md-flex align-items-md-start justify-content-end">
                    <img src="<?=$panel_contents[$i]->profilePhoto?>" class="rounded-circle" alt="" width="60px;">
            </div>
            <div class="col-12 col-md-10">
                 <a class="w-100" href="<?=site_url(golfpass_panel_content_uri."/get/{$panel_contents[$i]->id}")?>">
                    <h1><?=$panel_contents[$i]->title?></h1>
                            </a>
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
    <!-- TODO 문법을 몰라서 그냥둠.. -->
       <div class="col-12 d-flex justify-content-center align-items-center pagination">
           <?php echo $this->ajax_pgi_2->create_links(); ?>
       </div>