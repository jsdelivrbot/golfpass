<?php defined('BASEPATH') OR exit('no direct script access allrowed');

class Product_cartlist_Model extends Board_Model{
    public $table;
    function __construct(){
        // parent:: __construct();
        parent:: __construct('product_cartlist');
        // $this->table  = 'product_cartlist';
    }
   

  function gets_with_pgi($where_obj)
    {
        return $reviews = $this->_gets_with_pgi_func(
            "style_semantic",
            function() use($where_obj)
            {
                return count($this->gets($where_obj)); //총 rows 갯수 //gets함수를 작성해주세요
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
    public function gets($where_obj =null)
    {
        
        $this->db->select("c.*, c.id 'id', p.id 'p_id',p.name '상품이름', p.price '상품가격',c.created '날짜' ,c.count 'p_count',(p.price * c.count) 'p_total_price'");
        $this->db->from("$this->table as c");
        $this->db->join("products as p","c.product_id = p.id","LEFT");
        $this->db->order_by("c.id","desc");
        parent::_where_by_obj($where_obj);
        $rows =$this->db->get()->result();
        return $rows;

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