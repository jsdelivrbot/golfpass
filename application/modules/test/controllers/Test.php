<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Test extends Public_Controller
{

    function __construct()
    {
        parent::__construct();
        
        
    }
    function index()
    {
        // $p_daily_price =$this->load->modules("golfpass");
        // return "1";
        // echo $p_daily_price->test();
        // echo modules::run("golfpass/P_daily_price/test");
        $this->_view("test");
    }    
  
    
}