<article id='panel-box' class="row col-12">
<?php for($i=0; $i< count($panels);$i++){?>
       <div class="col-6 col-md-3 panel">
               <div class="d-flex flex-column justify-content-center align-items-center">
               <a href="javascript:void(0);" onclick="getData('.ajax_taget_content_list',0,'<?=site_url(golfpass_panel_uri."/ajax_pgi_contents/")?>',<?=$panels[$i]->id?>)">
                       <img src="<?=$panels[$i]->photo?>" class="rounded-circle" alt="" style="width: 140px;">
                       <div class="panel-content text-center">
                          <p><?=$panels[$i]->name?></p>
                       <p class="intro"><?=$panels[$i]->intro?></p>
                       </div>
              </a>
               </div>
       </div>
   <?php }?>
</article>
<!-- TODO 문법을 몰라서 그냥둠.. -->
<div class="col-12 d-flex justify-content-center align-items-center pagination">
<?php echo $this->ajax_pgi_1->create_links(); ?>
</div>