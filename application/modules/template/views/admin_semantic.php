<!DOCTYPE html>
<html>
  <head>
<!-- Standard Meta -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width">


<?php if(is_semantic_dev) {?>
    <link rel="stylesheet/less" type="text/css" href="/public/framework/semantic/src/semantic.less">
<script src="/public/framework/semantic/src/less.min.js"></script>
<?php }else{?>
<link rel="stylesheet" type="text/css" href="/public/framework/semantic/out/semantic.css">
<?php }?>

<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.2.13/dist/semantic.min.css"> -->
<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.2.13/dist/semantic.min.js"></script>

  </head>
  <body>
      <!-- 헤더 -->
    <div class="ui fixed borderless huge menu" >
      <div class="ui container grid">
        <div class="computer only row">
            
          <a class="header item">Project Name</a>
          <?php for($i=0 ; $i < count($main_menus) ; $i++){?>

            <a href="<?=$main_menus[$i]->uri?>" class="item <?=($menu_name === $main_menus[$i]->name) ?  'active' : ''?>"><?=$main_menus[$i]->name?></a>

            <?php }?>

          <!-- <a class="active item">Home</a> -->
          <!-- <a class="ui dropdown item">Dropdown<i class="dropdown icon"></i>
          <div class="menu">
              <div class="item">
                Action
              </div>
              <div class="item">
                Another action
              </div>
              <div class="item">
                Something else here
              </div>
              <div class="ui divider"></div>
              <div class="header">
                Navbar header
              </div>
              <div class="item">
                Seperated link
              </div>
              <div class="item">
                One more seperated link
              </div>
            </div>
          </a> -->
          <!-- <div class="right menu"> </div> -->
        </div>
        <div class="tablet mobile only row">
          <a class="header item"> Project Name</a>
          <div class="right menu">
            <a class="menu item">
              <div class="ui basic icon toggle button">
                <i class="content icon"></i>
              </div>
            </a>
          </div>
          <div id="top_menu"class="ui vertical accordion borderless fluid menu">
            <a class="active item"> Home</a><a class="item"> About</a><a class="item"> Contact</a>
            <div class="item">
              <div class="title">
                Dropdown<i class="dropdown icon"></i>
              </div>
              <div class="content">
                <div class="item">
                  Action
                </div>
                <div class="item">
                  Another action
                </div>
                <div class="item">
                  Something else here
                </div>
                <div class="ui divider"></div>
                <div class="header item">
                  Navbar header
                </div>
                <div class="item">
                  Seperated link
                </div>
                <div class="item">
                  One more seperated link
                </div>
              </div>
            </div>
            <div class="ui divider"></div>
          </div>
        </div>
      </div>
    </div>

<!-- 헤더 -->

    <div class="ui container">
    <div class="ui grid">
    <div class="row">
        <!-- 사이드바 -->
      <div class="column" id="sidebar">
        <div class="ui secondary vertical fluid menu">
          <?php for($i=0 ; $i < count($sub_menus) ; $i++){?>
          <a href="<?=$sub_menus[$i]->uri?>" class="item <?=($sub_name === $sub_menus[$i]->name) ?  'active' : ''?>"><?=$sub_menus[$i]->name?></a>

          <?php }?>
          <!-- <a class="item">Reports</a><a class="item">Analytics</a><a class="item">Export</a>
          <div class="ui hidden divider"></div>
          <a class="item">Nav item</a><a class="item">Nav item again</a><a class="item">One more nav</a><a class="item">Another nav item</a><a class="item">More navigation</a>
          <div class="ui hidden divider"></div>
          <a class="item">Macintosh</a><a class="item">Linux</a><a class="item">Windows</a> -->
        </div>
      </div>
      <!-- 사이드바 -->

      <!-- 콘텐츠 -->
      <div class="column" id="content">
        <div class="ui grid container">
          <div class="row">
            <h1 class="ui huge header">
              <?=$sub_name?>
            </h1>
          </div>
          <div class="ui divider"></div>
        
          <!-- <div class="row"> -->
          <div class="sixteen wide column">
            <?php load_view($content_view)?>
          </div>
      
        </div>
      </div>
      <!-- 콘텐츠 -->
    
      
    </div>
  </div>
    </div>
    <style type="text/css">
      body {
        min-height: 2000px;
      }
      
      .ui.borderless.huge.menu {
        background-color: #f8f8f8;
        margin-top: 0;
        margin-bottom: 1em;
      }
      .ui.borderless.huge.menu .row > a.header.item {
        font-size: 1.2em;
      }
      
      #top_menu {
        display: none;
        border: none;
        box-shadow: none;
        background-color: #f8f8f8;
      }
      #top_menu > .item {
        padding-left: 1.428em;
      }
      #top_menu .item .title .dropdown.icon {
        float: none;
      }
      #top_menu .item .content .item {
        padding: 0.5em 1em;
      }
      #top_menu .header.item {
        text-transform: uppercase;
      }
      
      .ui.message {
        background-color: rga(238, 238, 238);
        box-shadow: none;
        padding: 5em 4em;
      }
      .ui.message h1.ui.header {
        font-size: 4.5em;
      }
      .ui.message p.lead {
        font-size: 1.3em;
        color: #333333;
        line-height: 1.4;
        font-weight: 300;
      }
    </style>
    

    <style type="text/css">
      body {
        display: relative;
      }
      
      #sidebar {
        position: fixed;
        top: 51.8px;
        left: 0;
        bottom: 0;
        width: 18%;
        min-width : 90px;
        background-color: #f5f5f5;
        padding: 0px;
      }
      #sidebar .ui.menu {
        margin: 2em 0 0;
        font-size: 16px;
      }
      #sidebar .ui.menu > a.item {
        color: #337ab7;
        border-radius: 0 !important;
      }
      #sidebar .ui.menu > a.item.active {
        background-color: #337ab7;
        color: white;
        border: none !important;
      }
      #sidebar .ui.menu > a.item:hover {
        background-color: #4f93ce;
        color: white;
      }
      
      #content {
        margin-left: 19%;
        width: 81%;
        margin-top: 6em;
        padding-left: 3em;
        float: left;
      }
      #content > .ui.grid {
        padding-right: 4em;
        padding-bottom: 3em;
      }
      #content h1 {
        font-size: 36px;
      }
      #content .ui.divider:not(.hidden) {
        margin: 0;
      }
      #content table.ui.table {
        border: none;
      }
      #content table.ui.table thead th {
        border-bottom: 2px solid #eee !important;
      }
    </style>

    <style>
        #top_menu{
            z-index:999;
        }
    </style>
    <script src="<?=domain_url('/public/js/common.js')?>"></script>
    <script>
      $(document).ready(function() {
        $('.ui.dropdown').dropdown();
        $('.ui.accordion').accordion();
      
        // bind "hide and show vertical menu" event to top right icon button 
        $('.ui.toggle.button').click(function() {
        //   $('.ui.vertical.menu').toggle("250", "linear")
          $('#top_menu').toggle("250", "linear")
        });
      });
    </script>
  </body>
</html>
