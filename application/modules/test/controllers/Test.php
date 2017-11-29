<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Test extends Public_Controller
{

    function __construct()
    {
        parent::__construct();
        
        
    }
    function index()
    {
        $merchant_uid =$this->input->post('merchant_uid');
        $merchant_uid =get_merchant_code($merchant_uid);
        $this->load->model('p_order_products_model');
        $order = $this->product_orders_model->_get(array("merchant_uid"=>$merchant_uid));
        $amount_to_be_paid =  $order->total_price;

        $rows =$this->db->select("*")->where("merchant_uid",$merchant_uid)->where("option_kind","main_option")->from("p_order_options")->get()->result();
        $arr_tmp = array();
        foreach($rows as $row)
        {
            array_push($arr_tmp, $row->option_id);
        }
        $order->options = $arr_tmp;

        $rows =$this->db->select("*")->where("merchant_uid",$merchant_uid)->where("option_kind","hole_option")->from("p_order_options")->get()->row();
        $order->hole_option_id =$row->option_id;

        $rows =$this->db->select("*")->where("merchant_uid",$merchant_uid)->where("option_kind","group_option")->from("p_order_options")->get()->result();
        $arr_tmp = array();
        foreach($rows as $row)
        {
            array_push($arr_tmp, $row->value);
        }
        $order->groups = $arr_tmp;
         //num_singlerooms  start_date end_date product_id
         // options hole_option_id  groups
        //시작 날자 ~끝날자 * 인 === 총가격 변조 있는지 체크 시작
        $total_price = $this->_golfpass_cal_total_price($order);
    }    
  
    
}