<?php defined('BASEPATH') OR exit('no direct script access allrowed');

class Product_cartlist_Model extends CI_Model{
    public $table;
    function __construct(){
        parent:: __construct();
        // parent:: __construct('product_cartlist');
        $this->table  = 'product_cartlist';
    }
    public function gets($user_id,$kind)
    {
        $this->db->select("c.*,p.id 'p_id',p.name 'p_name',p.price 'p_price', c.count 'p_count',(p.price * c.count) 'p_total_price'");
        $this->db->from("$this->table as c");
        $this->db->join("products as p","c.product_id = p.id","LEFT");
        $this->db->where("user_id",$user_id);
        $this->db->where("kind","cartlist");
        $cartlist = $this->db->get()->result();

        return $cartlist;
    }
  
   function delete($product_id,$user_id,$kind)
   {
        $this->db->where('product_id',$product_id);
        $this->db->where('user_id',$user_id);
        $this->db->where('kind',$kind);
        $this->db->delete($this->table);
   }
   function update($count,$product_id,$user_id,$kind)
   {
    $this->db->where('product_id',$product_id);
    $this->db->where('user_id',$user_id);
    $this->db->where('kind',$kind);
    $this->db->set('count',$count);
    $this->db->update($this->table);
   }

}