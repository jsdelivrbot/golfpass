<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Admin_Controller {

    function __construct(){
        parent::__construct(array(
            'view_dir'=>'admin/home'
        ));
    }
	function index()
    {
        $this->_template('index');
	}
	function gettingStart(){
        $this->_template('gettingStart');
    }
}