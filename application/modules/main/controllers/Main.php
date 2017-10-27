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
        $data['product_main'] = $this->products_model->get();
        
        // $this->_template('index');
        $this->_view('main/golfpass/index',$data);
    }

}