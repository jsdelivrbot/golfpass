<?php defined('BASEPATH') OR exit('no direct script access allrowed');

class Product_option_Model extends Public_Model{
    function __construct(){
        parent:: __construct('product_option');
    }
 
    function gets_options($product_id,$kind)
    {
        $this->db->select("name");
        $this->db->from("$this->table");
        $this->db->where("product_id",$product_id);
        $this->db->where("kind",$kind);
        $this->db->order_by("sort","asc");
        return $this->db->get()->result();
    }

}