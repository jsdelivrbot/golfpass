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
        var_dump(domain_url());
        // $this->load->library("naver_login");
        // $this->naver_login->requset_auth();
    }    
  
    
}