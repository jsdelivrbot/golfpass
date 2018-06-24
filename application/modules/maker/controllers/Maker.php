<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Maker extends Public_Controller
{

    function __construct()
    {
        parent::__construct();
        
    }

    function index()
    {
       $tmp_methods =get_class_methods("Maker");
       $publishing = array();
       foreach($tmp_methods as $method)
       {
        if( $method[0]!== "_")
            {
                $url = site_url("/Maker/{$method}");
                array_push($publishing,"<a href='{$url}'>{$method}</a><br>   ");
            }
       }
       $data['publishing'] = $publishing;

       $data['base'] =array(
        (object)array("name"=>"템플릿(헤더,푸터)","url"=>"없음","view_dir"=>"templete / views / golfpass.php"),
        (object)array("name"=>"메인","url"=>site_url(""),"view_dir"=>"base / views / main / golfpass.php"),
        (object)array("name"=>"메인 순위별 ajax페이지","url"=>site_url(main_uri."/ajax_gets_by_ranking"),"view_dir"=>"base / views / main / ajax_gets_by_ranking_before.php"),
        (object)array("name"=>"로그인","url"=>site_url(user_uri."/login"),"view_dir"=>"base / views / user / golfpass/ login.php"),
        (object)array("name"=>"약관계약","url"=>site_url(user_uri."/register_agree_1"),"view_dir"=>"base / views / user / golfpass / register_agree_1.php"),
        (object)array("name"=>"회원가입","url"=>site_url(user_uri."/add"),"view_dir"=>"base / views / user / golfpass/  addUpdate.php"),
        (object)array("name"=>"아이디 찾기","url"=>site_url(user_uri."/find_id"),"view_dir"=>"base / views / user / golfpass/  find_id.php"),
        (object)array("name"=>"비밀번호 찾기","url"=>site_url(user_uri."/find_pw"),"view_dir"=>"base / views / user / golfpass/  find_pw.php")
     );
     $data['shop']=array(
        (object)array("name"=>"상품","url"=>site_url(shop_product_uri."/get/1"),"view_dir"=>"shop / views / product / golfpass / get.php"),
        (object)array("name"=>"상품목록","url"=>site_url(shop_product_uri."/gets/1"),"view_dir"=>"shop / views / product / golfpass / gets.php"),
        (object)array("name"=>"상품카테고리","url"=>site_url(shop_category_uri."/gets/1"),"view_dir"=>"shop / views / category / golfpass / gets.php"),
        (object)array("name"=>"상품 전체 순위표","url"=>site_url(shop_product_uri."/gets_by_ranking"),"view_dir"=>"shop / views / product / golfpass / gets_by_ranking.php"),
        (object)array("name"=>"마이페이지","url"=>site_url(shop_mypage_uri."/index"),"view_dir"=>"shop / views / mypage / index.php")
        // (object)array("name"=>"위시리스트","url"=>site_url(shop_wishlist_uri."/index"),"view_dir"=>"shop/views/wishlist/index.php"),
     );

     $data['etc'] =array(
        (object)array("name"=>"패널목록","url"=>site_url(golfpass_panel_uri."/gets"),"view_dir"=>"golfpass / views / panel / gets.php"),
        (object)array("name"=>"패널 글","url"=>site_url(golfpass_panel_content_uri."/get/1"),"view_dir"=>"golfpass / views / panel_content / get.php"),
        (object)array("name"=>"패널 글 쓰기","url"=>site_url(content_uri."/add/1?board_id=1"),"view_dir"=>"base / views / content / panel / content / addUpdate.php"),
     );
     $this->_view("index",$data);


    }


    function test()
    {
        $this->_view("test");
    }
    function contact()
    {
        $this->_template("contact",array(),"golfpass2");
    }
    function regist()
    {
        // $this->_view("regist");
        $this->_template("regist",array(),"golfpass2");
    }
    function forgot_id()
    {
        $this->_template("forgot_id",array(),"golfpass2");
    }
    function mypage()
    {
        $this->_template("mypage",array(),"golfpass2");
    }
    function wishlist()
    {
        $this->_template("wishlist",array(),"golfpass2");
    }
    function order_complete()
    {
        $this->_template("order_complete",array(),"golfpass2");
    }
    function login()
    {
        $this->_template("login",array(),"golfpass2");
        // $this->_view("login");
    }
    function forgot_pw()
    {
        $this->_template("forgot_pw",array(),"golfpass2");
    }
    function review_w()
    {
        $this->_template("review_w",array(),"golfpass2");
    }
}
