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
    <div class="ui gird">
    <div class="sixteen wide column">
        header
    </div>

    <div class="sixteen wide column">
        <?php load_view($content_view)?>
    </div>
    <div class="sixteen wide column"></div>
    </div>
    
</body>

</html>
