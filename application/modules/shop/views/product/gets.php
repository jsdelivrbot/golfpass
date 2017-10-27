<article>

            <!-- ------------------ -->
                
            <?php for($i=0 ; $i< count($products); $i++){?>
                        <ul class="product_wapper">
                        <li>골프장 이름 : <a href="<?=site_url(shop_product_uri."/get/{$products[$i]->id}")?>"><?=$products[$i]->name?></a></li>
                        <li>설명 : <?=$products[$i]->desc?></li>
                        <li>가격 : <?=$products[$i]->price?></li>
                        <li>평균점수 : <?=$products[$i]->avg_score_1?></li>
                        <li>리뷰수 : <?=$products[$i]->reviews_count?></li>
                        <li>조회수 : <?=$products[$i]->hits?></li>
                        <li>추천한 유명인list : yet</li>
                        </ul>
                    <?php }?>
                
            <!-- ------------------ -->

</article>