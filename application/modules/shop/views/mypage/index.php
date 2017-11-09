<!-- Standard Meta -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width">


<?php if(ENVIRONMENT !== 'production') {?>
    <link rel="stylesheet/less" type="text/css" href="/public/framework/semantic/src/semantic.less">
<script src="/public/framework/semantic/src/less.min.js"></script>
<?php }else{?>
<link rel="stylesheet" type="text/css" href="/public/framework/semantic/out/semantic.css">
<?php }?>

<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.2.13/dist/semantic.min.css"> -->
<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.2.13/dist/semantic.min.js"></script>
<div style="margin-top:120px;"></div>

<!-- <style>
    @media all and (max-width:750px) {
        .ui.text.menu>.computer.only {
            display: none;
        }
        .computer.only
        {
            display :none;
        }
    }
</style> -->

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
                <div class="ui four item stackable tabs menu">

                    <a class="active item" data-tab="definition">프로필 관리</a>


                    <a class="item" data-tab="examples">주문내역</a>


                    <a class="item" data-tab="usage">1:1문의 내역</a>


                    <a class="item" data-tab="settings">내가 쓴 리뷰</a>


                </div>
            </div>
        </div>
        <div class="sixteen wide column">
            <h1 class="ui header">최근 주문상품</h1>
            <table class="ui green table responsive">
                <thead>
                    <tr>
                        <th>구매일자</th>
                        <th>구매상품</th>
                        <th>결제방법</th>
                        <th>결제금액</th>
                        <th>예약상태</th>
                        <th>적립포인트</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>10/10/25252526</td>
                        <td>그라이헨드 골프장</td>
                        <td>무통장</td>
                        <td>255000원</td>
                        <td>대기중</td>
                        <td>250</td>
                    </tr>
                    <tr>
                    </tr>
                </tbody>
            </table>

        </div>
    
    </div>


