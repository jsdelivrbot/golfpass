<?php for($i=0; $i< count($panel_contents);$i++){?>
        <div class="tp-content-box tp-col-12 tp-row"> 
          <?php $doc = new DOMDocument(); $doc->loadHTML($panel_contents[$i]->desc); $xpath = new DOMXPath($doc); $src = $xpath->evaluate("string(//img/@src)"); # "/images/image.jpg" ?>
          <div class="tp-d-none tp-d-md-block tp-col-md-2 tp-d-md-flex tp-align-items-md-start tp-justify-content-end"> 
            <img src="<?=$src?>" class="tp-rounded-circle" alt="" style="width:60px; height:60px;">
          </div>
          <div class="tp-col-12 tp-col-md-10"> 
            <a class="tp-w-100" href="<?=site_url(golfpass_panel_content_uri."/get/{$panel_contents[$i]->id}")?>">
              <h1>
                <?=$panel_contents[$i]->title?>
              </h1> 
            </a>
            <div class="tp-content"> 
              <?php $desc =strip_tags($panel_contents[$i]->desc); if(mb_strlen($desc) >= 80) echo iconv_substr($desc,0,80,"utf-8")."..."; else echo $desc; ?>
            </div>
            <p class="tp-date"> 
              <?=$panel_contents[$i]->created?>
              <span> | 
              </span> 
              <span class="tp-name">
                <?=$panel_contents[$i]->name?>
              </span>
            </p>
          </div>
        </div> 
        <?php }?>
        <div class="tp-col-12 tp-d-flex tp-justify-content-center tp-align-items-center tp-pagination" style="padding:0;"> 
          <?php echo $this->ajax_pgi_2->create_links(); ?>
        </div>
        <div class="tp-post_write"> 
          <a href="<?=site_url(content_uri."/add?board_id=1")?>">작성하기
          </a>
        </div>
        