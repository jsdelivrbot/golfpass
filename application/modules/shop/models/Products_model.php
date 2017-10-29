<?php defined('BASEPATH') OR exit('no direct script access allrowed');

class Products_Model extends Board_Model{
    function __construct(){
        parent:: __construct('products');
    }
 
    function get_by_category_id_recursive_with_pgi($cate_id,$pgi_style)
    {

        $products=$this->gets_by_category_id_recursive_tree($cate_id);
        $num_rows = count($products);
        return parent::_gets_with_pgi(
            $pgi_style,
            function() use($num_rows)
            {   
                return $num_rows;
            },
            function($offset,$per_page) use($products)
            {
                return array_slice($products,$offset,$per_page);
            },
            null,
            array("per_page"=>3)
        );
    }


    function _recursive_tree($cate)
    {
        $data = $this->gets_by_category_id($cate->id);
        
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

    function gets_by_category_id($cate_id)
    {
        //product_option 사진들
        $sub_query = "SELECT group_concat(o.name) FROM `product_option` AS `o` WHERE o.product_id= r.product_id AND o.kind = 'photo'";
        //product_reviews score_1 평균점수
        $sub_query2 = "SELECT avg(pr.score_1) FROM product_reviews AS pr WHERE pr.product_id = r.product_id";

        $this->db->select("p.*,r.id as ref_id,r.sort ,($sub_query) as photos, ($sub_query2) as avg_score_1");
        $this->db->from("ref_cate_product as r");
        $this->db->join("products as p", "p.id = r.product_id","LEFT");
        $this->db->join("product_categories as c", "c.id = r.cate_id","LEFT");
        $this->db->where("r.cate_id",$cate_id);
        $this->db->order_by("r.sort",'asc');
        return $this->db->get()->result();

    }
    function gets_by_category_id_recursive_tree($cate_id=null)
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
        parent::_delete($id);
        $this->load->model("shop/ref_cate_product_model");
        $this->ref_cate_product_model->delete(array('product_id'=>$id));
    }
}