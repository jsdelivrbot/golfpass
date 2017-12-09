<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mypage extends Base_Controller {

    function __construct(){
        parent::__construct(array(
            'view_dir'=>"mypage"
        ));
        if( !is_login()){
            alert("로그인해주세요.");
            my_redirect(user_uri."/login?return_url=".rawurlencode(my_current_url()),false);
            return; 
        }
        $this->load->helper("html");

    }
    function update_order_status($order_id)
    {
        $order = $this->db->where("id",$order_id)
        ->from("product_orders")->get()->row();
        if($order->status !== "paid" && $order->status !== "confirm")
        {
            alert("금액을 지불하셔야 환불 요청이 가능합니다.");
            my_redirect(shop_mypage_uri."/get_order/$order_id");
            return;    
        }
        $this->db->set("status","request_refend")
        ->where("id",$order_id)
        ->update("product_orders");
        my_redirect(shop_mypage_uri."/get_order/$order_id");
    }
    function _get_container_data()
    {
        $data['user'] = $this->user;
        $this->load->model("shop/product_cartlist_model");
        $this->db->where("user_id",$this->user->id);
        $this->db->where("kind","wishlist");
        $data['num_wishlist'] = $this->product_cartlist_model->_get_num_rows();

        $this->load->model('product_orders_model');
        $this->db->where("user_id",$this->user->id);
        $data['num_orders'] = $this->product_orders_model->_get_num_rows();

        return $data;
    }
	public function index()
    {
        
        // $this->_template('index');
        $data['user'] = $this->user;
        $data['page_name'] ="마이페이지";
        $this->_template(array("index","table"),$data,'golfpass2');
        // $data = array();
        // $this->_template(array(
        //     'content_view'=>'index',
        //     'sidebar_view' =>'mypage/template/sidebar'
        // ),$data);
    }
    function gets_wishlist()
    {
        $data=$this->_get_container_data();
        $this->load->model("shop/product_cartlist_model");
        $data['user'] =$this->user;
        $data['page_name'] ="위시리스트";            
        $data['ths'] = array("번호","상품이름","상품가격","날짜","옵션");
        $rows = $this->product_cartlist_model->gets_with_pgi(array('c.user_id'=>$this->user->id,'c.kind'=>"wishlist"));
        foreach($rows as $key=>$row)
        {
             $row->상품이름 = anchor(site_url(shop_product_uri."/get/{$row->p_id}"),$row->상품이름);
             $row->옵션 =  anchor("#","삭제","style='color:black' onclick='confirm_callback(this,ajax_a,\"복구할 방법이 없습니다. 삭제하시겠습니까?\"); return false;' data-action='".site_url(shop_wishlist_uri."/ajax_delete/{$row->id}")."'");
        }
        $data['rows'] = $rows;
        
        $views = array("container_h","table","container_f");
        $this->_template($views,$data,'golfpass2');
    }
    function delete_user()
    {
        $data=$this->_get_container_data();
        $this->load->model("shop/product_cartlist_model");
        $user = $this->user;
        $data['user'] =$user;
        $data['page_name'] ="회원탈퇴";            

        $this->fv->set_rules("userName","아이디","required");
        if($this->fv->run() === false)
        {
            $views = array("container_h","delete_user","container_f");
            $this->_template($views,$data,'golfpass2');

        }
        else
        {
            if($this->user->userName !== $this->input->post("userName"))
            {
                alert("잘못 입력하셨습니다.");
                my_redirect(shop_mypage_uri."/delete_user");
            }
            else
            {
                if($user->sns_type !== "general")
                {
                    $this->db->where("user_id",$this->user->id);
                    $this->db->delete("sns_info");                        
                }
                $this->db->where("id",$this->user->id);
                $this->db->delete("users");
                $this->session->sess_destroy();
                alert("탈퇴 성공.");
                my_redirect("");
            }
        }
    }
    function get_order($order_id)
    {

        $data=$this->_get_container_data();
        //로그인한 회원 주문정보
        $this->load->model('product_orders_model');
        $data['user'] = $this->user;
        $data['page_name'] ="주문내역";         
        $data['ths'] = array("번호","주문명","주문금액","결제방식","후기작성 여부");
        $rows =$this->product_orders_model->gets_with_pgi();
        foreach($rows as $key=>$row)
        {
            $href =my_site_url(shop_mypage_uri."/get_order/{$row->id}");
            $text =$row->주문명;
             $row->주문명 = "<a href='{$href}'>{$text}</a>"; 
        }
        $data['rows'] =$rows;

        //주문정보 시작
        $order =$this->db->select("*")->from("product_orders")->where("id",$order_id)->get()->row();
        $merchant_uid = $order->merchant_uid;
        
        $order_products = $this->db->select("op.*, (op.price * op.count) 'p_total_price' , p.name 'p_name' ")
        ->from("p_order_products as op")
        ->join("products as p","op.product_id = p.id","INNER")
        ->where("merchant_uid", $merchant_uid)
        ->get()->result();
        
        $this->load->helper("enum");
        $order->pay_method_enum =get_pay_method_enum($order->pay_method);

        $order->status_enum  =get_status_enum($order->status);
     
        $data['order_infos'] =$this->db->where("merchant_uid",$merchant_uid)->from("p_order_infos")->get()->result();
        $data['order']= $order;
        $data['order_products'] = $order_products;
        $data['setting'] =$this->setting;      
        $data['photo'] = $this->db->where("product_id",$order->product_id)
        ->where("kind","photo")->limit(1,0)->order_by("sort","asc")->get("product_option")->row()->name;   
        $data['product'] =$this->db->where("id",$order->product_id)->get("products")->row();
        //주문정보 끝
        $views = array("container_h","get_order","table","container_f");
        $this->_template($views,$data,'golfpass2');

    }
    public function gets_order()
    {
        $this->load->helper("enum_helper");
        $data=$this->_get_container_data();
        //로그인한 회원 주문정보
        $this->load->model('product_orders_model');
        $data['user'] = $this->user;
        $data['page_name'] ="주문내역";         
        $data['ths'] = array("번호","주문명","주문금액","주문상태","결제방식","후기작성 여부");
        $rows =$this->product_orders_model->gets_with_pgi();
        foreach($rows as $key=>$row)
        {
            $row->결제방식 = get_pay_method_enum($row->결제방식);
            $row->주문상태 = get_status_enum($row->주문상태);
            $href =my_site_url(shop_mypage_uri."/get_order/{$row->id}");
            $text =$row->주문명;
            //  $row->주문명 = anchor(my_site_url(shop_mypage_uri."/get_order/{$row->id}"),$row->주문명);
             $row->주문명 = "<a href='{$href}'>{$text}</a>"; 
            //  $row->후기작성여부 = anchor(site_url(shop_mypage_uri."/get_order/{$row->id}"),$row->후기작성여부);//후기쓰러가기 url
        }
        $data['rows'] =$rows;
        $views = array("container_h","table","container_f");
        $this->_template($views,$data,'golfpass2');
    }
    function add_contact()
    {
        $this->load->module("base/content");
        $this->content->_addCallback(
            function($data){
                $data['page_name'] ="고객센터";         
                $data+=$this->_gets_content_data();
                $data+=$this->_get_container_data();
                $views = array("container_h","add_content","table","container_f");
                $this->_template($views,$data,'golfpass2');
            },
            function($insert_id){
                my_redirect(shop_mypage_uri."/get_contact/$insert_id");
            });

    }
    function get_contact($id)
    {
        // $data['page_name'] ="고객센터";         
        // $data+=$this->_gets_content_data();
        // $data+=$this->_get_container_data();

        // $this->load->module("base/content");
        // $this->content->_check_get_auth($id);
        // $data+=$this->content->get($id,true);

        // $views = array("container_h","get_content","table","container_f");
        // $this->_template($views,$data,'golfpass2');
    }
    function _gets_content_data()
    {
        $data=$this->_get_container_data();
        $board_id = "2";
        
        $data['page_name'] ="고객센터";         
        $data['ths'] = array("번호","제목","글쓴이","날짜");
        $this->load->model("base/board_contents_model");
        
        $total_nums = $this->db->select("contents_count")->from("boards")->where("id",$board_id)->get()->row()->contents_count;
        $rows =$this->board_contents_model->_gets_with_pgi(
            array("board_id"=>$board_id,"user_id"=>$this->user->id),
            array("total_num"=>$total_nums)
        );

        foreach($rows as $key=>$row)
        {
             $row->제목 = anchor(site_url(shop_mypage_uri."/get_contact/{$row->id}?board_id={$board_id}"),$row->제목);
            //  $row->후기작성여부 = anchor(site_url(shop_mypage_uri."/get_order/{$row->id}"),$row->후기작성여부);//후기쓰러가기 url
        }
        
        $data['rows'] =$rows;

        return $data;
    }
    function gets_contact()
    {
        $data =$this->_gets_content_data();
        $views = array("container_h","table","container_f");
        $this->_template($views,$data,'golfpass2');
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
