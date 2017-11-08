<link rel="stylesheet/less" type="text/css" href="/public/framework/semantic/src/semantic.less">
<script src="/public/framework/semantic/src/less.min.js"></script>
<div style="margin-top:120px;"></div>

    <div class="ui grid container">
        <div class="sixteen wide column">
            <div class="ui text menu">
                <div class="header item">
                    <h3 class="ui header"><i style="display:inline-block" class="user icon"></i> 김민성 (kimmincatsle)</h3>
                </div>
                <a class="computer only item">
                    <h3 class="ui header"><i class="diamond icon"></i>다이아몬드</h3>
                </a>

                <a class="right float item active">
                    <h3 class="ui header">
                        내정보 수정
                    </h3>
                </a>
            </div>

        </div>
        <div class="sixteen wide column">
            <!-- <div class="ui four statistics"> -->

            <div class="ui grid">
                <div class="ui four statistics doubling four column row">
                    <div class="statistic column">

                        <div class="value">
                            4
                        </div>
                        <div class="label">
                            투어 코디네이터
                        </div>
                    </div>

                    <div class="statistic column">

                        <div class="value">
                            <i class="cart icon"></i> 3
                        </div>
                        <div class="label">
                            위시리스트
                        </div>
                    </div>
                    <div class="statistic column">
                        <div class="value">
                            <i class="plane icon"></i> 1
                        </div>
                        <div class="label">
                            라운드
                        </div>
                    </div>
                    <div class="statistic column">
                        <div class="value">
                           42
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
                <div class="ui five item stackable tabs menu">

                    <a class="item" data-tab="definition">프로필 관리</a>

                    <a href="<?php site_url(shop_wishlist_uri.'/gets')?>" class="active item" data-tab="settings">위시리스트</a>
                    <a href="" class="item" data-tab="examples">주문내역</a>


                    <a class="item" data-tab="usage">1:1문의 내역</a>


                    <a class="item" data-tab="settings">내가 쓴 리뷰</a>
               


                </div>
            </div>
        </div>
        <div class="sixteen wide column">
            <h1 class="ui header">위시리스트</h1>
            <table class="ui green table responsive">
                <thead>
                    <tr>
                        <th>번호</th>
                        <th>상품이름</th>
                        <th>상품가격</th>
                        <th>갯수</th>
                        <th>날자</th>
                        <th>수정/삭제</th>

                    </tr>
                </thead>
                <tbody>
                <?php for($i=0 ; $i < count($wishlist) ; $i++){?>
                    <tr>
                        <td><?=$i+1?></td>
                        <td><?=$wishlist[$i]->p_name?></td>
                        <td><?=$wishlist[$i]->p_price?></td>
                        <td><?=$wishlist[$i]->p_count?></td>
                        <td><?=$wishlist[$i]->created?></td>
                        <td><a href="">수정</a>/ <a href="">삭제</a></td>
                    </tr>
                   
                <?php }?>

                </tbody>
            </table>

        </div>
        

        <!-- <div class="right aligned sixteen wide column ">
                <?php if(!is_login()){?>
                    <button class="ui olive button"><a style="color:white" href="<?=my_site_url(shop_order_uri."/index/wishlist?guest_order=true")?>">주문하기</a></button>
                <?php }else{?>
                    <button class="ui olive button"><a style="color:white" href="<?=my_site_url(shop_order_uri."/index/wishlist")?>">주문하기</a></button>
                <?php }?>
        </div> -->
    </div>


    <!-- sample -->

<!-- <?php for($i=0 ; $i < count($wishlist) ; $i++){?>

<ul>
<li><?=$wishlist[$i]->p_name?></li>
<li><?=$wishlist[$i]->p_count?>개</li>
<li>개당<?=$wishlist[$i]->p_price?>원</li>
<li>합계<?=$wishlist[$i]->p_total_price?>원</li>
<a href="">주문하기</a>
<form onsubmit="ajax_submit(this);return false;" action="<?=site_url(shop_wishlist_uri."/ajax_update/{$wishlist[$i]->p_id}")?>">
수량<input type="text" name="product_count" value="<?=$wishlist[$i]->p_count?>">
<input type="submit" value="수정하기">
</form>


<form onsubmit="confirm_callback(this,ajax_submit,'삭제하시겠습니까?');return false;" action="<?=site_url(shop_wishlist_uri."/ajax_delete/{$wishlist[$i]->p_id}")?>">
<input type="submit" value="삭제하기">
</form>

</ul>
<?php }?> -->

<!-- sample -->

