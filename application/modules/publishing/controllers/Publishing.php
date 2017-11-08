<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Publishing extends Public_Controller
{

    function __construct()
    {
        parent::__construct();
        
     
        
    }

    function index()
    {
       $tmp_methods =get_class_methods("Publishing");
       $methods = array();
       foreach($tmp_methods as $method)
       {
        if( $method[0]!== "_")
            {
                $url = site_url("/publishing/{$method}");
                echo "<a href='{$url}'>{$method}</a><br>   ";
            }
       }
    //    var_dump($methods);
    }
    function test()
    {
        $this->_view("test");
    }
    function contact()
    {
        $this->_template("contact",array(),"golfpass");
    }
    function regist()
    {
        $this->_template("regist",array(),"golfpass");
    }
    function forgot_id()
    {
        $this->_template("forgot_id",array(),"golfpass");
    }
    function mypage()
    {
        $this->_template("mypage",array(),"golfpass");
    }
    function wishlist()
    {
        $this->_template("wishlist",array(),"golfpass");
    }
    function order_complete()
    {
        $this->_template("order_complete",array(),"golfpass");
    }
    function login()
    {
        $this->_template("login",array(),"golfpass");
        // $this->_view("login");
    }
    function forgot_pw()
    {
        $this->_template("forgot_pw",array(),"golfpass");
    }
}