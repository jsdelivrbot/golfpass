<div id="tp-detail-wrap"> 
<section id="tp-section4" class='tp-row tp-no-gutters tp-justify-content-center'>
  <div class="tp-row tp-review-warning-text tp-d-flex tp-justify-content-center">
    <div class="tp-d-flex tp-flex-column tp-align-items-center"> 
      <span class="tp-mt-20 tp-mb-10">리뷰
      </span>
      <p class='tp-mb-20'>타인에게 불쾌감을 주는 리뷰는 동의없이 삭제될 수 있습니다.
      </p>
    </div>
  </div> 
  <article id="tp-review-box" class="tp-row tp-no-gutters"> 
    <?php for($i = 0 ; $i < count ($reviews) ; $i++){?>
    <div class="tp-col-lg-12 tp-col-xl-6 "> 
      <article class="tp-review tp-d-flex tp-flex-column">
        <div class="tp-profile tp-d-flex tp-align-items-center">
          <div class="tp-proflie-img"> 
            <img src="/public/sangmin/img/icon/noimage.png">
          </div>
          <div class='tp-proflie-name'> 
            <span>
              <?=$reviews[$i]->user_name?>
            </span>님의 
            <span>리뷰
            </span>
          </div>
        </div>
        <div class="tp-content">
          <p>
            <?=$reviews[$i]->desc?>
          </p>
          <div class="tp-score-box tp-d-flex tp-align-items-center"> 
            <span class='tp-score'>
              <?=round($reviews[$i]->avg_score*10)/10?>
            </span>
            <ul class="tp-list-unstyled">
              <li class="tp-d-flex tp-align-items-center tp-justify-content-between">
                <p>가성비
                </p> 
                <span class="tp-line">
                </span> 
                <span>
                  <?=$reviews[$i]->score_1?>.0
                </span>
              </li>
              <li class="tp-d-flex tp-align-items-center tp-justify-content-between">
                <p>시설 설비
                </p> 
                <span class="tp-line">
                </span> 
                <span>
                  <?=$reviews[$i]->score_2?>.0
                </span>
              </li>
              <li class="tp-d-flex tp-align-items-center tp-justify-content-between ">
                <p>식사
                </p> 
                <span class="tp-line">
                </span> 
                <span>
                  <?=$reviews[$i]->score_3?>.0
                </span>
              </li>
              <li class="tp-d-flex tp-align-items-center tp-justify-content-between">
                <p>전략성
                </p> 
                <span class="tp-line">
                </span> 
                <span>
                  <?=$reviews[$i]->score_4?>.0
                </span>
              </li>
              <li class="tp-d-flex tp-align-items-center tp-justify-content-between ">
                <p>페어웨이 넓이
                </p> 
                <span class="tp-line">
                </span> 
                <span>
                  <?=$reviews[$i]->score_5?>.0
                </span>
              </li>
              <li class="tp-d-flex tp-align-items-center tp-justify-content-between ">
                <p>그린의 난이도
                </p> 
                <span class="tp-line">
                </span> 
                <span>
                  <?=$reviews[$i]->score_6?>.0
                </span>
              </li>
              <li class="tp-d-flex tp-align-items-center tp-justify-content-between">
                <p>전장의 길이
                </p> 
                <span class="tp-line">
                </span> 
                <span>
                  <?=$reviews[$i]->score_7?>.0
                </span>
              </li>
              <li class="tp-d-flex tp-align-items-center tp-justify-content-between">
                <p>코스 상태
                </p> 
                <span class="tp-line">
                </span> 
                <span>
                  <?=$reviews[$i]->score_8?>.0
                </span>
              </li>
            </ul>
          </div>
          <div class="tp-date">
            <p>
              <?=$reviews[$i]->year?>년 
              <?=$reviews[$i]->month?>월 
              <?=$reviews[$i]->day?>일 
              <?=$reviews[$i]->ampm?> 
              <?=strlen($reviews[$i]->hour) === 1 ? "0{$reviews[$i]->hour}" : "{$reviews[$i]->hour}"?>시 
              <?=$reviews[$i]->min?>분
            </p>
          </div>
        </div> 
      </article>
    </div> 
    <?php }?> 
  </article> 
  <section id='tp-all' class='tp-pl-0 tp-d-flex tp-justify-content-center'> 
    <?php if(isset($product_id)){?> 
    <a href="<?=site_url(shop_product_uri."/get/{$product_id}")?>">
      <div id='tp-circle' class='tp-d-flex tp-justify-content-center tp-align-items-center'> 
        <span>상품으로
        </span>
      </div> 
    </a> 
    <?php }else{?>
    <a href="<?=site_url(shop_mypage_uri."/gets_wishlist")?>">
      <div id='tp-circle' class='tp-d-flex tp-justify-content-center tp-align-items-center'> 
        <span>마이페이지로
        </span>
      </div> 
    </a>
    <?php }?> 
  </section> 
</section>
<div class="tp-col-12 tp-d-flex tp-justify-content-center tp-align-items-center tp-pagination"> 
  <?= $this->pagination->create_links();?>
</div>
<div id="tp-panel-wrap"> 
  <article id="tp-panel-article" class="tp-container-fluid"> 
    <section class="tp-row tp-ajax_taget_panel_list" id="tp-panel-section"> 
    </section> 
  </article>
</div>
</div>
