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
                 <!-- Site Properties -->

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
            <div class="sixteen wide column">
                <div class="ui four item stackable tabs menu">

                    <a class="active item" data-tab="definition">공지사항</a>


                    <a class="item" data-tab="examples">이용방법</a>


                    <a class="item" data-tab="usage">자주묻는 질문</a>


                    <a class="item" data-tab="settings">1:1 문의</a>


                </div>
            </div>
        </div>
        <div class="sixteen wide column">
            <h1 class="ui header">공지사항</h1>
            <table class="ui green table responsive">
                <thead>
                    <tr>
                        <th>번호</th>
                        <th>제목</th>
                        <th>내용</th>
                        <th>조회수</th>
                        <th>날자</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>샘플 제목</td>
                        <td>샘플 내용</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                    </tr>
                </tbody>
            </table>

        </div>
    
    </div>


</body>

</html>