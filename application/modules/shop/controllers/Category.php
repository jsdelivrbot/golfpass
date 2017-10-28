<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends Base_Controller {
	function __construct(){
        parent::__construct(array(
            'table'=>'product_categories',
            'view_dir'=>"category/golfpass"
        ));
    }
    
    function gets($id)
    {
        
    }

    function gets_by_name($name)
    {
      
        $data['categories_nation'] = $this->product_categories_model->gets_with_pgi(array("name"=>urldecode($name)),'style_hotel');
        $this->_template('gets',$data,"golfpass");
        // $this->_view('gets',$data);
    }
}