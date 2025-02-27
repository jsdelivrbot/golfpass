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
        $categories =$this->product_categories_model->_gets();
        $data['categories'] = $categories;

        $data +=get_menu_view_data();
        $this->load->view("base",$data);
    }
    function golfpass2($data = array())
    {
        $this->load->model("shop/product_categories_model");
        $categories =$this->product_categories_model->_gets();
        $data['categories'] = $categories;

        $data +=get_menu_view_data();
        $this->load->view("golfpass2",$data);
    }
    function golfpass($data = array())
    {
        $this->load->model("shop/product_categories_model");
        $categories =$this->product_categories_model->_gets();
        $data['categories'] = $categories;

        $data +=get_menu_view_data();
        $this->load->view("golfpass",$data);
    }
    function tmp($data = array())
    {
        // $this->load->model("shop/product_categories_model");
        // $categories =$this->product_categories_model->_gets();
        // $data['categories'] = $categories;

        $data +=get_menu_view_data();
        $this->load->view("tmp",$data);
    }


    function admin($data = array())
    {
        $data['sidebar_view'] =  $data['sidebar_view'] ?? null;
        $data['content_view'] =  $data['content_view'] ?? null;

        $main_menus=$this->_create_data_main_menus(array(
            array('name'=>'홈','uri'=>  site_url(admin_home_uri."/index")),
            array('name'=>'일반','uri'=> site_url(admin_setting_general_uri.'/get_general')),
            array('name'=>'회원','uri'=> site_url(admin_user_uri."/gets")),
            array('name'=>'게시판','uri'=> site_url(admin_board_uri."/gets")),
            array('name'=>'상품','uri'=> site_url(admin_setting_product_uri."/get_product")),
            array('name'=>'주문','uri'=> site_url(admin_order_uri."/gets")),
            array('name'=>'SMS','uri'=> site_url(admin_setting_sms_uri."/get_sms")),
            array('name'=>'뉴스레터','uri'=> site_url(admin_newsletter_uri."/gets")),
            // array('name'=>'패치노트','uri'=> site_url(admin_patchNote_uri."/gets")),
            array('name'=>'iamport','uri'=> "https://admin.iamport.kr/payments",'target'=>"_blank"),
            array('name'=>'tawk','uri'=> "https://dashboard.tawk.to/",'target'=>"_blank")
        ));
        $sub_menus = $this->_create_data_sub_menus(array(
            '홈' => array(
               array('name'=>'홈','uri'=> site_url(admin_home_uri.'/index')),
               array('name'=>'시작하기','uri'=> site_url(admin_home_uri.'/gettingStart')),
            ),
            '일반' => array(
               array('name'=>'기본 설정','uri'=> site_url(admin_setting_general_uri.'/get_general')),
               array('name'=>'메뉴관리','uri'=> site_url(admin_menu_uri.'/gets')),
               array('name'=>'페이지관리','uri'=> site_url(admin_page_uri.'/gets')),
               array('name'=>'쪽지관리','uri'=>  site_url(admin_message_uri.'/gets'))
            ),
            '회원' => array(
               array('name'=>'회원관리','uri'=> site_url(admin_user_uri.'/gets/general')),
               array('name'=>'기업회원관리','uri'=> site_url(admin_user_uri.'/gets/corporate')),
               array('name'=>'패널관리','uri'=> site_url(admin_user_uri.'/gets/panel'))
            ),
            '게시판' => array(
               array('name'=>'게시판관리','uri'=>  site_url(admin_board_uri."/gets")),
               array('name'=>'게시물관리','uri'=>  site_url(admin_content_uri."/gets")),
               array('name'=>'댓글관리','uri'=>  site_url(admin_board_reply_uri."/gets"))
            ),
            '상품' => array(
               array('name'=>'기본설정','uri'=> site_url(admin_setting_product_uri.'/get_product')),
               array('name'=>'분류관리','uri'=>  site_url(admin_product_category_uri.'/gets')),
               array('name'=>'상품관리','uri'=> site_url(admin_product_uri.'/gets')),
               array('name'=>'호텔관리','uri'=>  site_url('admin/hotel/gets')),
               array('name'=>'후기관리','uri'=>  site_url(admin_review_uri.'/gets')),
               array('name'=>'패키지관리','uri'=>  site_url('admin/package/gets'))
            ),
            '주문' => array(
               array('name'=>'주문 목록','uri'=> site_url(admin_order_uri.'/gets')),
               array('name'=>'희망여행','uri'=> site_url("/admin/hope_travel/list")),
            ),
            'SMS' => array(
               array('name'=>'기본설정','uri'=> site_url(admin_setting_sms_uri.'/get_sms'))
            //    array('name'=>'기본설정','uri'=> site_url(admin_sms_uri.'/gets'))
            ),
            '뉴스레터' => array(
               array('name'=>'구독자','uri'=> site_url(admin_newsletter_uri.'/gets'))
            )
            // ,
            // '패치노트' => array(
            //     array('name'=>'패치노트','uri'=> site_url(admin_patchNote_uri.'/gets'))
            //  )
           
        ));
        //golf pass
        // array_splice($sub_menus['상품'],3,0,array((object)array('name'=>'호텔관리','uri'=> site_url('admin/hotel/gets'))));

        //메인
        $menu_name =  $this->input->get('menu_name');
        if(!$menu_name)
            $menu_name = '홈';
        $data['menu_name'] =$menu_name;
        $data['main_menus'] =$main_menus;
        //서브
        $data['sub_menus'] =  $sub_menus[$menu_name];
        $sub_name =  $this->input->get('sub_name');
        if(!$sub_name)
            $sub_name = $sub_menus[$menu_name][0]->name;
        $data['sub_name'] = $sub_name;

        // $data['sidebar_view'] = 'template/admin_sidebar/sidebar';
        $this->load->view("admin_semantic",$data);
    }
 
    function _create_data_main_menus($data)
    {
        $out_data =array();
        foreach($data as $key=>$val)
        {
            $name =$val['name'];
            $uri = "{$val['uri']}?menu_name={$val['name']}";
            $target = $val['target'] ?? '';
            $arr_tmp= (object)array('name'=> $name, 'uri'=>$uri,'target'=>$target);
            array_push($out_data,$arr_tmp);

        }
        return $out_data;
    }
    function _create_data_sub_menus($data)
    {
        $out_data = array();
        foreach($data as $key=>$val)
        {
            $arr_tmp = array();
            foreach($val as $key2=>$val2)
            {
                $name = $val2['name'];
                $uri = "{$val2['uri']}?menu_name={$key}&sub_name={$val2['name']}";
                array_push($arr_tmp,(object)array('name'=> $name, 'uri'=>$uri));
            }
            $out_data[$key] = $arr_tmp;
        }
        return $out_data;
    }
   
}