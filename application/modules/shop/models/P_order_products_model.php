<?php defined('BASEPATH') OR exit('no direct script access allrowed');

class P_order_products_Model extends Public_Model{
    function __construct(){
        parent:: __construct('p_order_products');
    }
    
    function gets_order_products($merchant_uid){
        
        $this->db->select("os.*,p.name 'p_name' ,(p.price*os.count) 'p_total_price'");
        $this->db->from("$this->table as os");
        $this->db->join("products as p", "os.product_id = p.id","INNER");
        $this->db->where("merchant_uid",$merchant_uid);
        $result= $this->db->get()->result();

       return $result;
   }


   function get_total_price($merchant_uid){
    if(strpos($merchant_uid,'merchant') >-1){
         $merchant_uid = substr($merchant_uid,9, strlen($merchant_uid)-9);
     }
        $total_price = $this->db->select("sum(p.price*os.count) 'total_price'")
        ->from("$this->table as os")
        ->join("products as p","os.product_id = p.id","INNER")
        ->where("merchant_uid",$merchant_uid)
        ->group_by("merchant_uid")
        ->get()
        ->row()->total_price;

        return $total_price;
   }
}