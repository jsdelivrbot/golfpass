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
        $menu_id =  $this->product_categories_model->_get(array("name"=>"나라별"),array("id"))->id;
        $data['categories'] =  $this->product_categories_model->_gets(array("parent_id"=>$menu_id));
        $this->_view('gets',$data);
    }
}