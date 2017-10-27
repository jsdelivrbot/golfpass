<?php defined('BASEPATH') OR exit('no direct script access allrowed');

class Product_orders_Model extends Public_Model{
    function __construct(){
        parent:: __construct('product_orders');
    }
   
    function get_with_join($where)
    {
        $this->db->select("o.*, u.userName, o.user_name");
        $this->db->from("$this->table as o");
        $this->db->join("users as u", "o.user_id = u.id","LEFT");
        $order =  parent::_get($where);
        
        $this->load->helper("enum");
        if($order !== null)
        {
            $order->pay_method_enum =get_pay_method_enum($order->pay_method);
            $order->status_enum =get_status_enum($order->status);
        }
        

        return $order;
    }
    public function gets($where_obj =null,$select_arr =false,$limit=null)
    {
        $ci = Public_Controller::$instance;
        $this->db->select("o.*, (CASE WHEN o.pay_method = 'vbank' THEN '가상계좌' WHEN o.pay_method = 'card' THEN '카드' END) 'pay_method_enum', (SELECT count('*') FROM p_order_products as os WHERE os.merchant_uid = o.merchant_uid AND os.is_review_write = '0') as isnt_review_write");
        $this->db->from("$this->table AS o");
        $this->db->join("users AS u","o.user_id = u.id", "INNER");
        $this->db->where("o.user_id = {$ci->user->id} AND (o.status = 'paid' OR o.status = 'ready')");
        $orders  =$this->db->get()->result();
        return $orders;
    }
}