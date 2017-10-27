<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Template extends MX_Controller 
{

    function __construct()
    {
        parent::__construct();
    }

    function base($data = array())
    {
        $this->load->model("shop/product_categories_model");
        $categories =$this->product_categories_model->gets();
        $data['categories'] = $categories;

        $data +=get_menu_view_data();
        $this->load->view("base",$data);
    }

    function golfpass($data = array())
    {
        $this->load->model("shop/product_categories_model");
        $categories =$this->product_categories_model->gets();
        $data['categories'] = $categories;

        $data +=get_menu_view_data();
        $this->load->view("golfpass",$data);
    }

    
    function admin($data = array())
    {
        $data['sidebar_view'] =  $data['sidebar_view'] ?? null;
        $data['content_view'] =  $data['content_view'] ?? null;

        $main_menus= array(
            (object)array('id'=>'home','name'=>'홈','uri'=>  site_url(admin_home_uri."/index")),
            (object)array('id'=>'general','name'=>'일반','uri'=> site_url(admin_user_uri."/gets")),
            (object)array('id'=>'board','name'=>'게시판','uri'=> site_url(admin_board_uri."/gets")),
            (object)array('id'=>'product','name'=>'상품','uri'=> site_url(admin_setting_product_uri."/get_product")),
            (object)array('id'=>'order','name'=>'주문','uri'=> site_url(admin_order_uri."/gets"))
              
        );
        $sub_menus = array(
            'home' => array(
                (object)array('name'=>'홈','uri'=> site_url(admin_home_uri.'/index?menu_id=home')),
                (object)array('name'=>'시작하기','uri'=> site_url(admin_home_uri.'/gettingStart?menu_id=home')),
            ),
            'general' => array(
                (object)array('name'=>'메뉴관리','uri'=> site_url(admin_menu_uri.'/gets?menu_id=general')),
                (object)array('name'=>'페이지관리','uri'=> site_url(admin_page_uri.'/gets?menu_id=general')),
                (object)array('name'=>'회원관리','uri'=> site_url(admin_user_uri.'/gets?menu_id=general')),
                (object)array('name'=>'쪽지관리','uri'=>  site_url(admin_message_uri.'/gets?menu_id=general'))
            ),
            'board' => array(
                (object)array('name'=>'게시판 목록','uri'=>  site_url(admin_board_uri."/gets?menu_id=board")),
                (object)array('name'=>'댓글관리','uri'=>  site_url(admin_board_reply_uri."/gets?menu_id=board"))
            ),
            'product' => array(
                (object)array('name'=>'기본설정','uri'=> site_url(admin_setting_product_uri.'/get_product?menu_id=product')),
                (object)array('name'=>'분류관리','uri'=>  site_url(admin_product_category_uri.'/gets?menu_id=product')),
                (object)array('name'=>'상품관리','uri'=> site_url(admin_product_uri.'/gets?menu_id=product')),
                (object)array('name'=>'후기관리','uri'=>  site_url(admin__review_uri.'/gets?menu_id=product'))
            ),
            'order' => array(
                (object)array('name'=>'주문 목록','uri'=> site_url(admin_order_uri.'/gets?menu_id=order')),
            )
           
        );

        //golf pass
        array_splice($sub_menus['product'],3,0,array((object)array('name'=>'호텔관리','uri'=> site_url('admin/hotel/gets?menu_id=product'))));


        $menu_id =  $this->input->get('menu_id');
        if(!$menu_id)
            $menu_id = 'home';
        // $sub_menus =  $sub_menus->$menu_id;

        // $data += array('main_menus'=>$main_menus,'sub_menus'=>$sub_menus,'menu_id'=>$menu_id);
        $data['main_menus'] =$main_menus;
        $data['sub_menus'] =$sub_menus;
        $data['menu_id'] =$menu_id;
        $data['sidebar_view'] = 'template/admin_sidebar/sidebar';
        $this->load->view("admin",$data);
    }
   
}