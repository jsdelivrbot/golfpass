 <!-- <link rel="stylesheet" href="/public/sangmin/dist/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/xeicon@2.3.3/xeicon.min.css">
    <link rel="stylesheet" href="/public/css/main.css">
    <link rel="stylesheet" href="/public/sangmin/css/xeicon.min.css">
    <link rel="stylesheet" href="/public/sangmin/dist/Nwagon/Nwagon.css" type="text/css"> -->
<div id="detail-wrap">
<section id="section4" class='row no-gutters justify-content-center'>
            <div class="row review-warning-text d-flex justify-content-center">
                <div class="d-flex flex-column align-items-center">
                    <span class="mt-20 mb-10">리뷰</span>
                    <p class='mb-20'>타인에게 불쾌감을 주는 리뷰는 동의없이 삭제될 수 있습니다.</p>
                </div>
            </div>
            <article id="review-box" class="row no-gutters">
                <?php for($i = 0 ; $i < count ($reviews) ; $i++){?>
                <div class="col-lg-12 col-xl-6 ">
                    <article class="review d-flex flex-column">
                      <div class="profile d-flex align-items-center">
                          <div class="proflie-img">
                            <img src="/public/sangmin/img/icon/noimage.png">
                          </div>
                          <div class='proflie-name'>
                            <span><?=$reviews[$i]->user_name?></span>님의
                            <span>리뷰</span>
                          </div>
                        </div>
                        <div class="content">
                          <p><?=$reviews[$i]->desc?></p>
                          <div class="score-box d-flex align-items-center">
                              <span class='score'><?=ceil($reviews[$i]->avg_score*10)/10?></span>
                              <ul class="list-unstyled">
                                  <li class="d-flex align-items-center justify-content-between">
                                      <p>코스 전체 전략성</p>
                                      <span class="line"></span>
                                      <span><?=$reviews[$i]->score_1?>.0</span></li>
                                  <li class="d-flex align-items-center justify-content-between">
                                      <p>페어웨이 넓이</p>
                                      <span class="line"></span>
                                      <span><?=$reviews[$i]->score_2?>.0</span></li>
                                  <li class="d-flex align-items-center justify-content-between ">
                                      <p>코스 천장 길이</p>
                                      <span class="line"></span>
                                      <span><?=$reviews[$i]->score_3?>.0</span></li>
                                  <li class="d-flex align-items-center justify-content-between">
                                      <p>그린의 난이도</p>
                                      <span class="line"></span>
                                      <span><?=$reviews[$i]->score_4?>.0</span></li>
                                  <li class="d-flex align-items-center justify-content-between ">
                                      <p>코스트 퍼포먼스</p>
                                      <span class="line"></span>
                                      <span><?=$reviews[$i]->score_5?>.0</span></li>
                                  <li class="d-flex align-items-center justify-content-between ">
                                      <p>시설 설비가 좋다</p>
                                      <span class="line"></span>
                                      <span><?=$reviews[$i]->score_6?>.0</span></li>
                                  <li class="d-flex align-items-center justify-content-between">
                                      <p>식사가 맛있다.</p>
                                      <span class="line"></span>
                                      <span><?=$reviews[$i]->score_7?>.0</span></li>
                                  <li class="d-flex align-items-center justify-content-between">
                                      <p>스태프 서비스</p>
                                      <span class="line"></span>
                                      <span><?=$reviews[$i]->score_8?>.0</span></li>
                              </ul>
                          </div>
                          <div class="date">
                              <p><?=$reviews[$i]->year?>년 <?=$reviews[$i]->month?>월 <?=$reviews[$i]->day?>일 <?=$reviews[$i]->ampm?> <?=strlen($reviews[$i]->hour) === 1 ? "0{$reviews[$i]->hour}" : "{$reviews[$i]->hour}"?>시 <?=$reviews[$i]->min?>분</p>
                          </div>
                        </div>
                    </article>
                </div>
                <?php }?>
             
            </article>
                
            <section id='all' class='pl-0 d-flex justify-content-center'>
                <?php if(isset($product_id)){?>
                <a href="<?=site_url(shop_product_uri."/get/{$product_id}")?>">
                    <div id='circle' class='d-flex justify-content-center align-items-center'>
                        <span>상품으로</span>
                    </div>
                </a>
                <?php }else{?>

                <a href="<?=site_url(shop_wishlist_uri."/gets")?>">
                    <div id='circle' class='d-flex justify-content-center align-items-center'>
                        <span>마이페이지로</span>
                    </div>
                </a>

                <?php }?>
            </section>
        </section>
        <div class="col-12 d-flex justify-content-center align-items-center pagination">
                        <?= $this->pagination->create_links();?>
            </div>

<!-- 패널에서 가져온 페이지네이션  -->
    <div id="panel-wrap">
        <article id="panel-article" class="container-fluid">
            
                <section class="row ajax_taget_panel_list" id="panel-section">
                    <!-- TODO 문법을 몰라서 그냥둠.. -->
                        
                    <!-- 페이지네이션 샘플 -->
                    <!-- <div class="col-12 d-flex justify-content-center align-items-center pagination">
                        <div class="prev"><a href="#"><i class="xi xi-angle-left-min"></i></a></div>
                        <ul class="d-flex list-unstyled justify-content-center mb-0">
                            <li class="current"><a href="#">01</a></li>
                            <li><a href="#">02</a></li>
                            <li><a href="#">03</a></li>
                            <li><a href="#">04</a></li>
                        </ul>
                        <div class="next"><a href="#"><i class="xi xi-angle-right-min"></i></a></div>
                    </div> -->
                    <!-- 페이지네이션 샘플 -->
                </section>
            
            
            </article>
        </div>
<!-- 패널에서 가져온 페이지네이션  -->
    </div>