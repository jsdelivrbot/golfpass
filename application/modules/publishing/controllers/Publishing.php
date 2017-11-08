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
        $this->_template("mypage",array(),"golfpass");
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
}