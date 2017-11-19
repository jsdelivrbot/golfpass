<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends Base_Controller {

    function __construct(){
        parent::__construct(array(
            'view_dir'=>"contact"
        ));
    }

    function index()
    {
        
        $this->_template('index',array(),'golfpass2');
    }
}