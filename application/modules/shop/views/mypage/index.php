<style>

</style>

<html>

<head>

    <!-- <link rel="stylesheet" type="text/css" href="semantic/semantic.min.css"> -->
    <link rel="stylesheet" type="text/css" href="/public/lib/semantic/semantic.css">

    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>
    <script src="/public/lib/semantic/semantic.min.js"></script>


    <!-- Standard Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"> -->

    <!-- Site Properties -->
    <!-- <link rel="stylesheet" type="text/css" href="semantic/components/reset.css">
                <link rel="stylesheet" type="text/css" href="semantic/components/site.css">
              
                <link rel="stylesheet" type="text/css" href="semantic/components/container.css">
                <link rel="stylesheet" type="text/css" href="semantic/components/grid.css">
                <link rel="stylesheet" type="text/css" href="semantic/components/header.css">
                <link rel="stylesheet" type="text/css" href="semantic/components/image.css">
                <link rel="stylesheet" type="text/css" href="semantic/components/menu.css">
              
                <link rel="stylesheet" type="text/css" href="semantic/components/divider.css">
                <link rel="stylesheet" type="text/css" href="semantic/components/segment.css">
                <link rel="stylesheet" type="text/css" href="semantic/components/form.css">
                <link rel="stylesheet" type="text/css" href="semantic/components/input.css">
                <link rel="stylesheet" type="text/css" href="semantic/components/button.css">
                <link rel="stylesheet" type="text/css" href="semantic/components/list.css">
                <link rel="stylesheet" type="text/css" href="semantic/components/message.css">
                <link rel="stylesheet" type="text/css" href="semantic/components/icon.css">
              
                <script src="semantic/components/form.js"></script>
                <script src="semantic/components/transition.js"></script> -->

    <link rel="stylesheet" type="text/css" href="/public/lib/responsive-tables/responsive-tables.css">
    <script src="/public/lib/responsive-tables/responsive-tables.js"></script>
</head>


<style>
    @media all and (max-width:750px) {
        .ui.text.menu>.computer.only {
            display: none;
        }
        .computer.only
        {
            display :none;
        }
    }
</style>


<body>
    <a href="<?=site_url('')?>">홈으로</a>
    <div class="ui grid container" style="margin-top:100px;">
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


</body>

</html>