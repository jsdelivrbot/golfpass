<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mypage extends Base_Controller {

    function __construct(){
        parent::__construct(array(
            'view_dir'=>"mypage"
        ));
    }
	public function index()
    {
        if( !is_login()){
            alert("로그인해주세요.");
            my_redirect(user_uri."/login?return_url=".rawurlencode(my_current_url()),false);
            return; 
        }

        // $this->_template('index');
        $this->_view('index');
        // $data = array();
        // $this->_template(array(
        //     'content_view'=>'index',
        //     'sidebar_view' =>'mypage/template/sidebar'
        // ),$data);
    }
    public function review_gets()
    {
       $this->load->module('review');
        $data['reviews'] = $this->review->_gets();
         
        $this->_template(array(
            'content_view'=>'review_gets',
            'sidebar_view' =>'mypage/template/sidebar'
        ),$data);
    }

    public function cartlist_gets()
    {
        $this->load->module('cartlist');
        $data['cartlist'] =$this->cartlist->_gets();
         
        $this->_template(array(
            'content_view'=>'cartlist_gets',
            'sidebar_view' =>'mypage/template/sidebar'
        ),$data);
    }
    public function order_gets()
    {
        $this->load->module('order');
        $data['orders'] =$this->order->_gets();
        
         $this->_template(array(
             'content_view'=>'order_gets',
             'sidebar_view' =>'mypage/template/sidebar'
         ),$data);
         
    }
    public function order_get($merchant_uid){
        $this->load->module('order');
        $data =$this->order->_get($merchant_uid);
        
         $this->_template(array(
             'content_view'=>'order_get',
             'sidebar_view' =>'mypage/template/sidebar'
         ),$data);
         
    }

    function contact_gets()
    {
        $this->load->module('content');
        $data =$this->content->_gets();
        
         $this->_template(array(
             'content_view'=>'content/contact/content/gets',
             'sidebar_view' =>'mypage/template/sidebar'
         ),$data);
    }
}
