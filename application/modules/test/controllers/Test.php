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
        $this->load->library("naver_login");
        // $this->naver_login->client_id = "desGiq4LhD6U7f_oSZdR";
        // $this->naver->redirect_uri = "http://golfpass.net/index.php/api/naver/login_callback";
        // $this->naver_login->redirect_uri = "http://localhost/index.php/api/naver/login_callback";

        $this->naver_login->requset_auth();
    }    
  
    
}