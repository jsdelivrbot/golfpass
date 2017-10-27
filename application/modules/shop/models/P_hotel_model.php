<?php defined('BASEPATH') OR exit('no direct script access allrowed');

class P_hotel_model extends Board_Model{
    function __construct(){
        parent:: __construct('p_hotel');
    }
    function gets_with_pgi()
    {
      
        $pgi_style = 'style_1';
        $rows=$this->_gets_with_pgi(
            $pgi_style,
            null,
            function($offset,$per_page){
                $this->db->order_by('id','desc');
                $this->db->limit($per_page,$offset);
                $rows = parent::_gets();
                return $rows;
            });
            return $rows;
    }
    function get_by_product_id($product_id)
    {
        $this->db->select(" r.*, h.*, r.id 'id'");
        $this->db->from('p_ref_hotel as r');
        $this->db->join("$this->table h","r.hotel_id = h.id","LEFT");
        $this->db->where("product_id",$product_id);
        $row =$this->db->get()->row();
        return $row;
    }
    function gets_by_product_id($product_id)
    {
        $this->db->select(" r.*, h.*, r.id 'id'");
        $this->db->from('p_ref_hotel as r');
        $this->db->join("$this->table h","r.hotel_id = h.id","LEFT");
        $this->db->where("product_id",$product_id);
        $rows =$this->db->get()->result();

        return $rows;
    }
    
}