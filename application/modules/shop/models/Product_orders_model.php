<?php defined('BASEPATH') OR exit('no direct script access allrowed');

class Product_orders_Model extends Board_Model{
    function __construct(){
        parent:: __construct('product_orders');
    }
   
    function get_with_join($where)
    {
        $this->db->select("o.*, u.userName, o.user_name");
        $this->db->from("$this->table as o");
        $this->db->join("users as u", "o.user_id = u.id","LEFT");
        $order =  parent::_get($where);
        
      
        

        return $order;
    }
    public function gets($where_obj =null,$select_arr =false,$limit=null)
    {
        $ci = Public_Controller::$instance;
        $this->db->select("o.*, o.order_name '주문명',o.total_price '주문금액',o.pay_method '결제방식', is_review_write as '후기작성 여부',o.status '주문상태'");
        $this->db->from("$this->table AS o");
        $this->db->join("users AS u","o.user_id = u.id", "INNER");
        $this->db->where("o.user_id = {$ci->user->id} AND (o.status != 'try' AND o.status != 'fail' AND o.status != 'user_cancel')");
        $this->db->order_by("o.id","desc");
        // $this->db->where("o.user_id = {$ci->user->id} AND (o.status = 'paid' OR o.status = 'ready')");
        $orders  =$this->db->get()->result();
        return $orders;
    }

    function gets_with_pgi($where_obj=null)
    {
        return $reviews = $this->_gets_with_pgi_func(
            "style_semantic",
            function() use($where_obj)
            {
                return count($this->gets($where_obj)); //총 rows 갯수//gets함수를 작성해주세요
            },
            function($offset,$per_page) use($where_obj) 
            {
                $this->db->limit($per_page,$offset); //보여질 rows값들//gets함수를 작성해주세요
                return $this->gets($where_obj);
            },
            null
            ,
            array("per_page"=>5) //per_page
        );
    }

}