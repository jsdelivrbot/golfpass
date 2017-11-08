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
        //메인 상품
        $this->load->model("shop/products_model");
        $this->load->model("shop/product_option_model");
        $this->load->model("admin/setting_model");
        $product_setting =$this->setting_model->_get(1);
        $product_main_id = $product_setting->representative_product;
        $data['product_main'] = $this->products_model->_get($product_main_id);
        $data['product_main_photos'] = $this->product_option_model->gets_options($product_main_id,'photo');

        //나라 분류 리스트
        $this->load->model("shop/product_categories_model");
        $menu_id=$this->product_categories_model->_get(array('name'=>'나라별'),array('id'))->id;
        $this->db->order_by("sort","asc");
        $data['nation_list'] = $this->product_categories_model->_gets(array('parent_id'=>$menu_id));

        //테마별 분류 리스트
        $menu_id=$this->product_categories_model->_get(array('name'=>'테마별'),array('id'))->id;
        $this->db->order_by("sort","asc");
        $data['thema_list'] = $this->product_categories_model->_gets(array('parent_id'=>$menu_id));
        
        //골프 패스 패널이 추천한 상품 리스트
        $menu_id=$this->product_categories_model->_get(array('name'=>'골프패스 패널 추천'),array('id'))->id;
        $data['products_panel'] = $this->products_model->gets_by_category_id_recursive_tree($menu_id);

        //패널
        $this->load->model("golfpass/panels_model");
        $this->db->limit(10,0);
        $data['panels'] = $this->panels_model->_gets();

        // $this->_template('index');
        $this->_view('main/golfpass',$data);
        
    }

}