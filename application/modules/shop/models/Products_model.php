<?php defined('BASEPATH') OR exit('no direct script access allrowed');

class Products_Model extends Public_Model{
    function __construct(){
        parent:: __construct('products');
    }
 
    function _recursive_tree($cate)
    {
        $this->db->select("p.*, (SELECT avg(pr.score_1) FROM product_reviews AS pr WHERE pr.product_id = r.id) as 'avg_score_1'");
        $this->db->from("ref_cate_product as r");
        $this->db->join("products as p", "p.id = r.product_id","LEFT");
        $this->db->join("product_categories as c", "c.id = r.cate_id","LEFT");
        $this->db->where('r.cate_id',$cate->id);
        $data = $this->db->get()->result();
        
        $this->db->select("id");
        $this->db->from("product_categories");
        $this->db->where('parent_id',$cate->id);
        $childs=$this->db->get()->result();
        for($i= 0 ; $i < count($childs) ; $i++)
        {
           $data= array_merge($data,$this->_recursive_tree($childs[$i])) ;
        }

        return $data;
    }


    function get_by_category_id_recursive_tree($cate_id=null)
    {
        $this->db->select("id");
        $this->db->from("product_categories");
        if($cate_id === null)
            $this->db->where('parent_id','0');
        else
            $this->db->where('id',$cate_id);
        $cate=$this->db->get()->result();
        $data = array();
        for($i= 0 ; $i < count($cate) ; $i++)
        {
           $data=  array_merge($data, $this->_recursive_tree($cate[$i]));
        }
        return $data;
    }
    public function gets($where_obj =null,$select_arr =false,$limit=null)
    {
        $rows =$this->db->get($this->table)->result();
        return $rows;
    }
   
    function delete($id)
    {
        parent::delete($id);
        $this->load->model("shop/ref_cate_product_model");
        $this->ref_cate_product_model->delete(array('product_id'=>$id));
    }
}