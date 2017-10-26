<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends Base_Controller
{

    function __construct()
    {
        parent::__construct(array(
            'view_dir'=>"main"
        ));
   
    }
    function index()
    {
      
        
        $this->_template('sample_index');
        // $this->_view('index');
    }

}