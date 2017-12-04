<?php defined('BASEPATH') OR exit('no direct script access allrowed');

class P_hotel_model extends Board_Model{
    function __construct(){
        parent:: __construct('p_hotel');
    }

    function gets_with_pgi($where_obj=null)
    {
        return  $this->_gets_with_pgi_func(
            "style_semantic",
            function() use($where_obj)
            {
                return count($this->gets($where_obj)); //총 rows 갯수//gets함수를 작성해주세요
            },
            function($offset,$per_page) use($where_obj) 
            {
                $this->db->limit($per_page,$offset); //보여질 rows값들//gets함수를 작성해주세요
                return $this->gets($where_obj);
            }
        );
    }

   function gets($where_obj =null)
    {
        $this->db->select("h.*")
        ->from("p_hotel as h")
        ->order_by('id','desc');
         parent::_where_by_obj($where_obj);
        return $this->db->get()->result();

    }
    

    // function gets_with_pgi()
    // {
    //     $pgi_style = 'style_1';
    //     return parent::_gets_with_pgi_func(
    //         $pgi_style,
    //         function()
    //         {
    //             return count($this->gets());
    //         },
    //         function($offset,$per_page){
    //             $this->db->limit($per_page,$offset);

    //             return $this->gets();
    //         },

    //     );

    // }
    // function gets()
    // {
    //     $this->db->select("h.*")
    //     ->form("p_hotel as h")
    //     ->order_by('id','desc');

    //     return $this->db->get()->result();
    // }
    function get_by_product_id($product_id)
    {
        $this->db->select(" r.*, h.*, h.id 'id'");
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