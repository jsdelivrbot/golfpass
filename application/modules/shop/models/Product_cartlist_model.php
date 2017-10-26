<?php defined('BASEPATH') OR exit('no direct script access allrowed');

class Product_cartlist_Model extends Public_Model{
    
    function __construct(){
        parent:: __construct('product_cartlist');
    }
    public function gets($where_obj =null,$select_arr =false,$limit=null)
    {
        $cartlist = $this->db->select("c.*,p.id 'p_id',p.name 'p_name',p.price 'p_price', c.count 'p_count',(p.price * c.count) 'p_total_price'")
        ->from("$this->table as c")
        ->join("products as p","c.product_id = p.id","LEFT")
        ->where("user_id",$this->session->userdata("user_id"))
        ->get()->result();

        return $cartlist;
    }
  
   
}