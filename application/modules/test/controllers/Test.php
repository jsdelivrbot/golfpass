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
        $this->_view("test");
    }    
  
    
}