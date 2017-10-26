<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends Base_Controller {
	function __construct(){
        parent::__construct(array(
            'table'=>'product_orders',
            'view_dir'=>"order"
        ));
        $this->load->helper('enum');
	}
       
    public function index($product_id){
        $guest_order =$this->input->get("guest_order");
        $order_count = $this->input->get("order_count");
        if(!is_login() && !$guest_order){
            redirect(user_uri."/login?order_count=$order_count&order_id=$product_id&guest_order=true&return_url=".rawurlencode(my_current_url()));
        }
        
        if($product_id !== "cartlist"){//하나만 구매
            
            $cartlist = $this->db
            ->select("p.id 'p_id',p.name 'p_name',p.price 'p_price', {$order_count} 'p_count' ,(p.price * {$order_count}) 'p_total_price'")
            ->from("products as p")
            ->where('id',$product_id)
            ->get()->result();    
        }else{//장바구니로 구매
            if(!is_login() ){//비회원
                $cartlist =array();
                if($tmp_cartlist = $this->session->userdata('cartlist')){ //장바구니 비었나확인
                    foreach($tmp_cartlist as $key=>$value){
                        $row =$this->db->select("id 'p_id', name 'p_name', price 'p_price', {$value} 'p_count', (price * {$value}) 'p_total_price'")
                        ->from("$products")
                        ->where('id',$key)->get()->result();
                        $cartlist =array_merge($cartlist,$row);
                    }
                }
            }else if (is_login()){//회원
                $this->load->model("product_cartlist_model");
                $cartlist =$this->product_cartlist_model->gets();
            }
            
        }
        if(count($cartlist)===0){ //장바구니가 비었음
            alert("장바구니가 비었습니다.");
            my_redirect(shop_cartlist_uri."/gets",true);
            return;
        }
            
        //전체합계
        $total_price=0;
        for($i=0; $i < count($cartlist);$i++){
                $total_price+=$cartlist[$i]->p_total_price;
        }
        //상품이름
        $order_name = $cartlist[0]->p_name;
        if(count($cartlist) !== 1)
            $order_name .= "외에 ".(string)(count($cartlist)-1)."종";

        //user데이터
        if($this->session->userdata("is_login"))
            $user = $this->db->select("userName, name 'user_name', phone, email")->from("users")->where('id',$this->session->userdata("user_id"))->get()->row();
        else $user = (object)array();

        $data = array(
            'user'=>$user,
            "cartlist" =>$cartlist,
            "total_price" =>$total_price,
            "order_name" =>$order_name
        );
         
        $this->_template('index',$data);
         
    }

    function _gets()
    {
        $this->load->model('product_orders_model');
        $orders = $this->product_orders_model->gets();
        return $orders;
    }
    public function gets()
    {
        
        $data['orders'] =$this->_gets();
        $this->_template('gets',$data);
         
    }
    public function _get($merchant_uid)
    {

        $this->load->model('p_order_products_model');
        $order_products = $this->p_order_products_model->gets_order_products($merchant_uid);
        $order = $this->product_orders_model->get_with_join(array('o.merchant_uid'=>$merchant_uid));

        $data['order'] = $order;
        $data['order_products'] = $order_products;

        return $data;
    }
    public function get($merchant_uid){
       $data= $this->_get($merchant_uid);
        $this->_template('get',$data);
         
    }
    function get_by_guest()
    {
        $merchant_uid = $this->input->post('merchant_uid');
        $user_name = $this->input->post('user_name');
        
        $this->load->model('p_order_products_model');
        $order = $this->product_orders_model->get_with_join(array('o.merchant_uid'=>$merchant_uid,'o.user_name'=>$user_name));
        if($order === null)
        {
            $data['return_url'] =  $this->input->get("return_url");
            alert("잘못 입력하셨습니다.");
            $this->_template('user/login',$data);
            // my_redirect(user_uri.'/login');
            return;
        }
        $order_products =$this->p_order_products_model->gets_order_products($merchant_uid);

        $data['order'] = $order;
        $data['order_products'] = $order_products;
        $this->_template('get',$data);

    }
    ////결제
    public function ajax_add(){
        header("content-type:application/json");
    
        //table insert product_orders
        $merchant_uid = $this->input->post("merchant_uid");
        $merchant_uid = get_merchant_code($merchant_uid);
        $status ='try';
        $this->db->set('merchant_uid',$merchant_uid);
        $this->db->set('order_name',$this->input->post('order_name'));
        $this->db->set('user_id',$this->user->id);
        $this->db->set('user_name',$this->input->post("user_name"));
        $this->db->set('phone',$this->input->post("phone"));
        $this->db->set('status',$status);
        $this->db->set('pay_method',$this->input->post('pay_method'));
       
        $this->db->set('created',"NOW()",false);
        $this->db->insert($this->table);

        $product_ids = $this->input->post("product_id[]");
        $counts = $this->input->post("count[]");
        $prices = $this->input->post("price[]");

        //table insert p_order_products
        for($i =0 ; $i < count($product_ids) ; $i++){
            $product_id = $product_ids[$i];
            $count  = $counts[$i];
            $price = $prices[$i];

            $this->db->set('merchant_uid',$merchant_uid);
            $this->db->set('product_id',$product_id);
            $this->db->set('count',$count);
            $this->db->set('price',$price);
            $this->db->set('created',"NOW()",false);
            $this->db->insert('p_order_products');
        }
        $data = array("temp"=>'temp');
        echo json_encode($data);
    }
    public function ajax_payment_check_update(){
        header("content-type:application/json");
        $imp_key = $this->config->item('imp_key');
        $imp_secret = $this->config->item('imp_secret');
        $this->load->library("Iamport",array("imp_key"=>$imp_key, "imp_secret"=>$imp_secret));

        $imp_uid =$this->input->post('imp_uid');
        $result =$this->iamport->findByImpUID($imp_uid);

        $merchant_uid =$this->input->post('merchant_uid');
        $merchant_uid =get_merchant_code($merchant_uid);

        $this->load->model('p_order_products_model');
        $amount_to_be_paid = $this->p_order_products_model->get_total_price($merchant_uid);

        // var_dump($amount_to_be_paid);
        if(!$result->success){
            $data = array("payment_check"=>'fail_1');
            echo json_encode($data);
            return;
        }else{
            $result = $result->data;
        }
        
       
        if($result->status === 'paid' && (string)$result->amount === (string)$amount_to_be_paid ){
            $payment_check = 'paid';
            $this->db->set("status",$this->input->post("status"));
            //success_post_process(payment_result) 결제까지 성공적으로 완료
        }else if($result->status === 'ready' && $result->pay_method === 'vbank' && (string)$result->amount === (string)$amount_to_be_paid){
            $payment_check = "vbank";
            $this->db->set("status",$this->input->post("status"));
            //  vbank_number_assigned(payment_result) 가상계좌 발급성공
        }else{
            $payment_check = "error";
            $this->db->set("status","error");
            //fail_post_process(payment_result) 결제실패 처리
        }
        // var_dump($result);

        //update

        $this->db->set('total_price',$amount_to_be_paid);
        $this->db->set("apply_num",$this->input->post("apply_num"));
        $this->db->set("vbank_num",$this->input->post("vbank_num"));
        $this->db->set("vbank_name",$this->input->post("vbank_name"));
        $this->db->set("vbank_holder",$this->input->post("vbank_holder"));
        $this->db->set("vbank_date",$this->input->post("vbank_date"));
        $this->db->where("merchant_uid",$merchant_uid);
        $this->db->update($this->table);

        $data = array("payment_check"=>$payment_check);
        echo json_encode($data);
        //  
        // $this->load->view("{$this->view_dir}/complete",$data);
        //  
    }
    
   
    public function complete($merchant_uid){

        //delete cartlist
        if(!is_login()){
            $this->session->sess_destroy();
        }else{
            $this->db->where("user_id",$this->user->id);
            $this->db->delete("product_cartlist");
        }//

        $order =$this->db->select("*")->from($this->table)->where("merchant_uid",$merchant_uid)->get()->row();

        $order_products = $this->db->select("op.*, (op.price * op.count) 'p_total_price' , p.name 'p_name' ")
        ->from("p_order_products as op")
        ->join("products as p","op.product_id = p.id","INNER")
        ->where("merchant_uid", $merchant_uid)
        ->get()->result();
        

        if($order->pay_method === 'card')
            $order->pay_method_enum = "카드";
        else if($order->pay_method === 'vbank')
            $order->pay_method_enum = "가상결제";            
        else 
            $order->pay_method_enum = "알수없음";            

        if($order->status === 'ready')
            $order->status_enum = '미결제';
        else if($order->status === 'paid')            
            $order->status_enum = '결제완료';
        else
            $order->status_enum = '알수없음';

        // var_dump($order_products);

        $data = array(
            "order" =>$order,
            "order_products" =>$order_products
        );
         
        $this->_template('complete',$data);

    }

    public function ajax_payment_user_cancel(){
        header("content-type:application/json");

        $merchant_uid = get_merchant_code($this->input->post("merchant_uid"));
        $this->db->set("status","user_cancel");
        $this->db->where("merchant_uid",$merchant_uid);
        $this->db->update($this->table);

        $data =array("tmp"=>"tmp");
        echo json_encode($data);
    }

    public function ajax_payment_error_cancel(){
        header("content-type:application/json");

        $imp_key = $this->config->item('imp_key');
        $imp_secret = $this->config->item('imp_secret');
        $this->load->library("Iamport",array("imp_key"=>$imp_key, "imp_secret"=>$imp_secret));

        $merchant_uid = $this->input->post("merchant_uid");
        $imp_uid = $this->input->post("imp_uid");

        $data = array('merchant_uid' =>$merchant_uid, 'imp_uid'=>$imp_uid);
        $this->iamport->cancel($data);

        $merchant_uid_code = get_merchant_code($merchant_uid);
        $this->db->set("status","cancelled");
        $this->db->where("merchant_uid",$merchant_uid_code);
        $this->db->update($this->table);


        $data =array("tmp"=>"tmp");
        echo json_encode($data);
    }
    ////결제
}
