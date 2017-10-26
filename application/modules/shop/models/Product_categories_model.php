<?php defined('BASEPATH') OR exit('no direct script access allrowed');

class Product_categories_Model extends Public_Model{
    function __construct(){
        parent:: __construct('product_categories');
    }
  
   
    function gets_by_product_id($product_id)
    {
        $this->db->select(" r.*, c.*, r.id 'id'");
        $this->db->from('ref_cate_product as r');
        $this->db->join("$this->table c","r.cate_id = c.id","LEFT");
        $this->db->where("product_id",$product_id);
        $rows =$this->db->get()->result();

        return $rows;
    }

    function _recursive_tree($parent,$deep)
    {
        $data =array($parent);
        $deep += 1;
        $this->db->select("* , $deep as deep");
        $this->db->from("$this->table");
        $this->db->where('parent_id',$parent->id);
        $childs=$this->db->get()->result();
        for($i= 0 ; $i < count($childs) ; $i++)
        {
           $data= array_merge($data,$this->_recursive_tree($childs[$i],$deep)) ;
        }

        return $data;
    }
    function gets_by_recursive_tree($id=null)
    {
        $this->db->select("*, '0' as deep");
        $this->db->from("$this->table");
        if($id === null)
            $this->db->where('parent_id','0');
        else
            $this->db->where('id',$id);
        $result=$this->db->get()->result();

        $data = array();
        for($i= 0 ; $i < count($result) ; $i++)
        {
           $data=  array_merge($data, $this->_recursive_tree($result[$i] , 0));
        }
        return $data;

    }

    
}