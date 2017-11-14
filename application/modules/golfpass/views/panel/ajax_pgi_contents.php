<?php for($i=0; $i< count($panel_contents);$i++){?>
        <div class="content-box col-12 row">
                       
                        <!-- desc에서 이미지태그 src만 추출 -->
                        <?php 
                        $doc = new DOMDocument();
                        $doc->loadHTML($panel_contents[$i]->desc);
                        $xpath = new DOMXPath($doc);
                        $src = $xpath->evaluate("string(//img/@src)"); # "/images/image.jpg"
                       ?>
                       <!-- desc에서 이미지태그 src만 추출 -->
                        <div class="d-none d-md-block col-md-2 d-md-flex align-items-md-start justify-content-end">
                                        <img src="<?=$src?>" class="rounded-circle" alt="" style="width:60px; height:60px;">
                        </div>
                        <div class="col-12 col-md-10">
                                 <a class="w-100" href="<?=site_url(golfpass_panel_content_uri."/get/{$panel_contents[$i]->id}")?>">
                                        <h1><?=$panel_contents[$i]->title?></h1>
                                                        </a>
                                        <div class="content">
                                       <?php
                                       $desc =strip_tags($panel_contents[$i]->desc);
                                       if(mb_strlen($desc) >= 80)
                                               echo iconv_substr($desc,0,80,"utf-8")."...";
                                       else 
                                               echo $desc;
                                       ?>
                                        </div>
                                        <p class="date">
                                                        <?=$panel_contents[$i]->created?><span> | </span>
                                                        <span class="name"><?=$panel_contents[$i]->name?></span>
                                        </p>
                        </div>

        </div>
       <?php }?>