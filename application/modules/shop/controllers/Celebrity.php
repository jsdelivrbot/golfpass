<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Celebrity extends Base_Controller {
	function __construct(){
        parent::__construct(array(
            'table'=>'users',
            'view_dir'=>"celebrity/golfpass"
        ));
    }
    
    function gets()
    {
        $this->_template("gets");
    }

}