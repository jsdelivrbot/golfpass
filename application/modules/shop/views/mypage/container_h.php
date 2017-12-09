<!-- Standard Meta -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width">


<?php if(is_semantic_dev) {?>
    <link rel="stylesheet/less" type="text/css" href="/public/framework/semantic/src/semantic.less">
<script src="/public/framework/semantic/src/less.min.js"></script>
<?php }else{?>
<link rel="stylesheet" type="text/css" href="/public/framework/semantic/out/semantic.css">
<link rel="stylesheet" type="text/css" href="/public/framework/semantic/out/semantic.js">
<?php }?>

<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.2.13/dist/semantic.min.css"> -->
<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.2.13/dist/semantic.min.js"></script>

    <div class="ui grid container">

    
        <div class="sixteen wide column">
                <div class="ui text menu">
                    <div class="header item">
                        <img style="width:40px;"src="<?=domain_url("/public/icon/golfman.png")?>" alt=""/>
                        <h1 class="ui header" style="margin-top:0px;">
                            <!-- <i style="display:inline-block" class="user icon"></i> -->
                            <span ><?="{$user->name}"?><?=($user->userName !== null) ? "({$user->userName})" : ""?></span> </h1>
                    </div>
                    <a class="computer only item">
                        <!-- <h3 class="ui header"><i class="diamond icon"></i>다이아몬드</h3> -->
                    </a>
                    
                    <div class="right float item active">
                        <h3 class="ui header">
                            <a href="<?=site_url(user_uri."/check_pssword_forUpdate")?>">내 정보 수정</a>
                            <a href="<?=site_url(shop_mypage_uri."/delete_user")?>">/회원탈퇴</a>
                        </h3>
                </div>
                </div>

            </div>
            <div class="sixteen wide column">
                <!-- <div class="ui four statistics"> -->

                <div class="ui grid">
                    <div class="ui two statistics doubling four column row">
                        <!-- <div class="statistic column">

                            <div class="value">
                                0
                            </div>
                            <div class="label">
                                투어 코디네이터
                            </div>
                        </div> -->

                        <div class="statistic column">

                            <div class="value">
                                <i class="cart icon"></i> <?=$num_wishlist?>
                            </div>
                            <div class="label">
                                위시리스트
                            </div>
                        </div>
                     <!--    <div class="statistic column">
                            <div class="value">
                                <i class="plane icon"></i> 0
                            </div>
                            <div class="label">
                                라운드
                            </div>
                        </div> -->
                        <div class="statistic column">
                            <div class="value">
                            <?=$num_orders?>
                            </div>
                            <div class="label">
                                골프장/호텔 예약
                            </div>
                        </div>
                    </div>
                </div>

                <!-- </div> -->
            </div>
            <div class="sixteen wide column">
                <div class="sixteen wide column">
                    <div class="ui four item stackable tabs menu">

                        <!-- <a class="item" data-tab="definition">프로필 관리</a> -->

                        <a href="<?=site_url(shop_mypage_uri.'/gets_wishlist')?>" class="<?=$page_name==="위시리스트" ? "active" : ""?> item" data-tab="settings">
                        위시리스트
                        </a>
                        <a href="<?=site_url(shop_mypage_uri."/gets_order")?>" class="<?=$page_name==="주문내역" ? "active" : ""?> item" data-tab="examples">
                        주문내역
                        </a>




                        <a href="<?=site_url(shop_review_uri."/gets_by_user/{$user->userName}")?>" class="<?=$page_name==="내가 쓴 리뷰" ? "active" : ""?> item" data-tab="settings">내가 쓴 후기</a>
                        <a href="<?=site_url(content_uri."/gets?board_id=4")?>" class="<?=$page_name==="고객센터" ? "active" : ""?> item" data-tab="usage">고객센터로</a>
                


                    </div>
                </div>
            </div>
            