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
        $this->load->model("shop/products_model");
        $data['product_main'] = $this->products_model->_get();
        
        $data['nation_list'] = $this->products_model->get_by_category_id_recursive_tree();
        $this->_template('index');
        // $this->_view('main/golfpass',$data);
    }

}