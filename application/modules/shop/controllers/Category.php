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
        $data['categories2'] = $this->product_categories_model->gets_with_pgi(array("id"=>$id),'style_hotel');   
        $this->_template('gets',$data,"golfpass2");
    }

    function gets_by_name($name)
    {
      
        $data['categories2'] = $this->product_categories_model->gets_with_pgi(array("name"=>urldecode($name)),'style_hotel');
        $data['goto_cate'] =true;
        $this->_template('gets',$data,"golfpass2");
        // $this->_view('gets',$data);
    }
}