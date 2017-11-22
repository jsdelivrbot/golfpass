<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Naver extends Public_Controller {

    function __construct(){
        parent::__construct();
    }
    

    function login_callback()
    {
       $this->load->library("naver_login");
       $result=$this->naver_login->login_callback();

    // $result->access_token;
    //    $result->refresh_token;
    }
}