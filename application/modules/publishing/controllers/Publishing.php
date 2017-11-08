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
        $this->_template("mypage",array(),"tmp");
    }

    function forgot_id()
    {
        $this->_template("forgot_id",array(),"tmp");
    }

}