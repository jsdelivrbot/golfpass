<article id='tp-panel-box' class="tp-row tp-col-12">
​​<?php for($i=0; $i< count($panels);$i++){?>
​​       <div class="tp-col-6 tp-col-md-3 tp-panel">
​​               <div class="tp-d-flex tp-flex-column tp-justify-content-center tp-align-items-center">
​​               <a href="javascript:void(0);" onclick="getData('.ajax_taget_content_list',0,'<?=site_url(golfpass_panel_uri."/ajax_pgi_contents/")?>',<?=$panels[$i]->id?>)">
​​                       <img src="<?=$panels[$i]->profilePhoto?>" class="tp-rounded-circle" alt="" style="width: 140px;">
​​                       <div class="tp-panel-content tp-text-center">
​​                          <p><?=$panels[$i]->name?></p>
​​                       <p class="tp-intro"><?=$panels[$i]->intro?></p>
​​                       </div>
​​              </a>
​​               </div>
​​       </div>
​​   <?php }?>
​​</article>
​​<!-- TODO 문법을 몰라서 그냥둠.. -->
​​<div class="tp-col-12 tp-d-flex tp-justify-content-center tp-align-items-center tp-pagination">
​​<?php echo $this->ajax_pgi_1->create_links(); ?>
​​</div>