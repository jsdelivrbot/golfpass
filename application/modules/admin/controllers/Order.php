<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends Admin_Controller {

    function __construct(){
        parent::__construct(array(
            'table'=>'shop/product_orders',
            'view_dir'=>'admin/order'
        ));
        
    }
	public function gets()
    {
        $this->load->database();
        //get totoal_rows
        $field = $this->input->post('field');
        if($field) $this->db->like($field, $this->input->post('value'));
        $total_rows=$this->db->select("count(*)  AS num_rows")
        ->from("$this->table as o")
        // ->join("users as u","o.user_id = u.id","INNER")
        ->get()->row()->num_rows;

        //get pagination
        $this->load->library('pagination');
        $pgiData =$this->pagination->get(array(
            'total_rows'=>$total_rows,
            'style_pgi'=>'style_1'
        ));
        $offset = $pgiData['offset'];
        $per_page = $pgiData['per_page'];
        
        //select from orders
        $field = $this->input->post('field');
        if($field) $this->db->like($field, $this->input->post('value'));
        
        $orders  =$this->db->select("o.*, u.userName , u.name 'user_name'")
        ->from("{$this->table} AS o")
        ->join('users AS u', 'o.user_id = u.id', 'INNER')
        ->limit($per_page, $offset)
        ->order_by('id','desc')
        ->get()->result();
        
        //view
        $data = array('orders'=>$orders);
         
         $this->_template("gets",$data);
         
    }
    public function get($merchant_uid){
        //product_orders where $merchant_uid
        $order =$this->product_orders_model->get_with_join(array('o.merchant_uid'=>$merchant_uid));
      
        
        //p_order_products where $merchant_uid
        $this->load->model("shop/p_order_products_model");
        $order_products = $this->p_order_products_model->gets_order_products($merchant_uid);
        
        //get order by iamport api where $merchant_uid
        // $imp_key = $this->config->item('imp_key');
        // $imp_secret = $this->config->item('imp_secret');
        // $this->load->library("Iamport",array("imp_key"=>$imp_key, "imp_secret"=>$imp_secret));
        // $result =$this->iamport->findByMerchantUID(get_merchant_uid($merchant_uid));
        
        // var_dump($result);

        $data = array("order"=>$order,"order_products"=>$order_products);
        
        $this->_template("get",$data);
         
    }
    public function update($id){
         
         
    }
    
  
}
