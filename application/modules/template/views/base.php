<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    
    <style>
        html, body{
            width:100%; height:100%;
            margin : 0 ;
            padding: 0;
        }
        *{
            /* border: 1px solid black; */
            color : tomato;
            list-style : none;
        }
       body{
           display:flex;
           justify-content: center;
       }
        .container{
            flex:0 1 900px;
        }
        .flex-row{
            display:flex;
           
        }
        .flex-column{
            display:flex;
            flex-flow: column;
            height: 100%;
        }
        #header{
            flex: 0 1 50px;
            min-height : 30px;

            color : black;
            background-color : white;
        }
        #nav_header{
            flex: 0 1 50px;
            min-height : 30px;

            background-color: #313a4a;
            
        }
        #main{
            flex: 1 1 300px;
            min-height : 300px;
        }
        #nav_main{
            flex: 0 1 100px;

            background-color: #eaf0f5;

        }
        #article{
            flex: 1 1;

            background-color: #2b3441;
        }
        #footer{
            flex: 0 1 50px;
            min-height: 30px;
            background-color: #2b3441;
        }

        @media(max-width:500px){
            #nav_main{
                display:none;
            }
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
</head>
<body>
    <div class="container flex-column">
        <header id="header">
            <?php if(is_admin()){?>
                <a href="<?=site_url(admin_uri."/home")?>">관리자 페이지</a>                                        
            <?php }?>
                <a href="<?=site_url('')?>">홈</a>
            <?php if (!is_login()) {?>
                <a href="<?=site_url(user_uri."/login?return_url=".rawurlencode(my_current_url()))?>">로그인</a>
                <a href="<?=site_url(user_uri."/register_agree_1")?>">회원가입</a>
            <?php }else{?>
                <a href="<?=site_url(user_uri."/logout?return_url=".rawurlencode(my_current_url()))?>">로그아웃</a>
                <a href="<?=site_url(user_uri."/check_pssword_forUpdate")?>">내정보 수정</a>
            
               
                
            <?php }?>
            <a href="<?=site_url(shop_wishlist_uri."/gets")?>">위시리스트</a>
            <?php load_view($menu_top_view)?>
            <!-- <a href="<?=site_url(shop_mypage_uri."/index")?>">마이페이지</a> -->
            <!-- <a href="<?=site_url(shop_mypage_uri."/cartlist_gets")?>">장바구니</a> -->
          

            <a href="<?=site_url("/init")?>">init</a>
            <a href="<?=site_url("/init_golfpass")?>">골프패스설치</a>
            <a href="<?=site_url("/init/base")?>">기본 설치</a>
            <a href="<?=site_url("/init/shop")?>">쇼핑물 설치</a>
            <a href="<?=site_url("/init/reset")?>">초기화</a>
        </header>
        <header id="header">
        <?php
            for($i=0;$i<count($categories) ; $i++){?>
                <a href="<?=site_url(shop_product_uri."/gets/{$categories[$i]->id}")?>"><?=$categories[$i]->name?></a>    
            <?php
            }?>
        </header>
        <nav id="nav_header">
        <?php load_view($menu_view)?>
        </nav>
        <main id="main" class="flex-row">
            <!-- 사이드바 -->
            <?php load_view($sub_menu_view)?>
             <!-- 사이드바 -->
            <article id="article">
            <?php load_view($content_view)?>

        <article id="article">
        </main>
        <footer id="footer">footer</footer>
    </div>


  <script src="<?=domain_url('/public/js/common.js')?>"></script>
</body>
</html>

