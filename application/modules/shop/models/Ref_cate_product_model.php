<?php defined('BASEPATH') OR exit('no direct script access allrowed');

class Ref_cate_product_Model extends Public_Model{
    function __construct(){
        parent:: __construct('ref_cate_product');
    }
    
    function add_ref($cate_id,$product_id)
    {
        $this->db->from($this->table);
        $this->db->set('cate_id',$cate_id);
        $this->db->set('product_id',$product_id);
        $this->db->insert();

    }

}