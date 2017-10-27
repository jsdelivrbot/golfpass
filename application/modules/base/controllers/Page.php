<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends Public_Controller {
    
    function __construct(){
        parent::__construct(array(
            'table'=>'pages',
            'view_dir'=>'page'
        ));
    }
    
    public function get($id){
        parent::_get($id);
      
    }

   
	
}
