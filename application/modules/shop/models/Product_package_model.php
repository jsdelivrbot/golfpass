<?php defined('BASEPATH') OR exit('no direct script access allrowed');

class Product_package_Model extends Board_Model{
    function __construct(){
        parent:: __construct('product_package');
    }

    private $avg_score = "avg(r.score_9)";
    private $avg_score2 = "avg(s_r.score_9)";
    
    function get($id)
    {
    	/*
        $query = "";
        $arr_rankingTpye =array("score_1","score_2","score_3","score_4","score_5","score_6","score_7","score_8");

        foreach($arr_rankingTpye as $rankingType)
        {
            $sub_query = "SELECT IFNULL(avg($rankingType),0) FROM product_reviews as s_r1 WHERE s_r1.product_id = p.id  AND s_r1.is_secret = 0";
            $query .= ",($sub_query) as $rankingType";
        }
        
        $sub_query4 = "SELECT IFNULL(avg($rankingType),0) FROM product_reviews as s_r1 WHERE s_r1.product_id = p.id  AND s_r1.is_secret = 0";
        $query .= ",($sub_query4) as $rankingType";


        $sub_query = "SELECT cast({$this->avg_score} as decimal(10,1) ) FROM product_reviews as r WHERE r.product_id = p.id AND r.is_secret = 0";
        $query .= ",($sub_query) as avg_score";
        $this->db->select("p.*".$query);
        $this->db->from("$this->table as p");
        $this->db->where("p.id",$id);
        return $this->db->get()->row();
        */
    	
    	$this->db->select("*");
    	$this->db->from("$this->table");
    	$this->db->where("id",$id);
    	return $this->db->get()->row();
    }

    function getSchedule($id) {
    	$this->db->select("*");
    	$this->db->from("p_package_schedule");
    	$this->db->where("package_id",$id);
    	$this->db->where("type",'schedule');
    	$this->db->order_by('days', 'ASC');
    	return $this->db->get()->result();
    }
    
    function gets_all_category_id($id)//get products
    {
        $result = array($id);
        $childs = $this->db->query("SELECT id FROM product_categories WHERE parent_id = $id")->result();
        foreach ($childs as $child) 
        {
             $result=array_merge($result,$this->gets_all_category_id($child->id)) ;
        }
        return $result;
    }
    function get_by_category_id_pgi($id) //get products
    {
        $arr_cate_id =$this->gets_all_category_id($id);
        $set_select_from =function(){
            $this->set_select_from();
        };
        
        $gets = function() use($arr_cate_id,$set_select_from)
        {

            $set_select_from();
            foreach ($arr_cate_id as  $cate_id)
            {
                $this->db->or_where("cate_id",$cate_id);
            }
            $this->db->group_by("r.product_id");
        };
        
        $sort_type = $this->input->get_post('sort_type');
        $sort_value = $this->input->get_post('sort_value');
        if($sort_value=="package" || $sort_value == "uppackage") $sort_value = "created";
        
        $order_by = function() use($sort_type,$sort_value)
        {
            if($sort_type !== null && $sort_value !== null)
            {
                if($sort_type === "asc" && $sort_value === "price")
                {
                    $this->db->order_by("field(price,0,1) asc, price");
                }else
                {
                    $this->db->order_by($sort_value,$sort_type);
                }
            }
            else
            {
                $this->db->order_by("created","desc");

            }
        };
        
        return $products= parent::_gets_with_pgi_func(
            "style_zap",
            function() use($gets)
            {   
                $gets();
                return $this->db->count_all_results();
            },
            function($offset,$per_page) use($gets,$order_by)
            {
                $gets();
                $order_by();
                $this->db->limit($per_page,$offset);
                return $this->db->get()->result();
            },
            null,
            array("per_page"=>9,"is_numrow"=>false)
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
    function gets_by_ranking($rankingType)
    {
    	$query = '';
    	/*if($rankingType === 'avg_score')
    	{
    		//product_reviews 총 평균점수
    		$sub_query3 = "SELECT IFNULL(ROUND({$this->avg_score2},1),0) FROM product_reviews as s_r WHERE s_r.product_id = p.id  AND s_r.is_secret = 0";
    		$query .= ",($sub_query3) as avg_score";
    	}
    	else
    	{
    		$sub_query4 = "SELECT IFNULL(avg($rankingType),0) FROM product_reviews as s_r1 WHERE s_r1.product_id = p.id  AND s_r1.is_secret = 0";
    		$query .= ",($sub_query4) as $rankingType";
    	}*/
    	
    	//카테고리 도시 parent_id
    	$sub_query = "SELECT cate.parent_id FROM ref_cate_package as ref_c_p INNER JOIN product_categories as cate ON cate.id = ref_c_p.cate_id WHERE ref_c_p.product_id = p.id ORDER BY ref_c_p.cate_id LIMIT 0,1";
    	$query .= ",($sub_query) as cate_parent_id";
    	
    	//카테고리 도시
    	$sub_query = "SELECT cate.name FROM ref_cate_package as ref_c_p INNER JOIN product_categories as cate ON cate.id = ref_c_p.cate_id WHERE ref_c_p.product_id = p.id ORDER BY ref_c_p.cate_id LIMIT 0,1";
    	$query .= ",($sub_query) as category_name";
    	
    	//카테고리 나라
    	$sub_query = "SELECT parent_cate.name FROM product_categories as parent_cate WHERE parent_cate.id = cate_parent_id LIMIT 0,1";
    	$query .= ",($sub_query) as parent_category_name";
    	
    	$this->db->select("p.*".$query);
        $this->db->from("product_package as p");
        $this->db->order_by($rankingType,'desc');
        
        $products = $this->db->get()->result();

        return $products;
    }

    function set_select_from() // using when get products by_cate_id
    {
         //1차 카테고리
         $sub_query5 = "SELECT name FROM product_categories as sub_c WHERE c.parent_id = sub_c.id LIMIT 0, 1";
         $this->db->select("p.*, r.id as ref_id, r.sort, c.name as category_name, ($sub_query5) as parent_category_name");
         $this->db->from("ref_cate_package as r");
         $this->db->join("product_package as p", "p.id = r.product_id","LEFT");
         $this->db->join("product_categories as c", "c.id = r.cate_id","LEFT");
    }
    
    function gets_by_category_id($cate_id)
    {
        $this->set_select_from();
        $this->db->where("r.cate_id",$cate_id);
    
        $rows = $this->db->get()->result();
        return $rows;

    }
    function gets_by_category_id_recursive_tree($cate_id=null) //main
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
    function gets()
    {
        $sub_query = '';
        $sub = "SELECT o3.name FROM product_option as o3 WHERE o3.product_id = o.product_id AND o3.kind = 'photo' ORDER BY o3.sort ASC LIMIT 0,1";
        $sub_query .= ",($sub) as photo";

        $more_select = '';
        $more_select .= ", GROUP_CONCAT(o2.name) as photos";
        $more_select .= ",{$this->avg_score} as avg_score ";
        $this->db->select("o.id as option_id, o.sort,p.*". $more_select . $sub_query)
        ->from("product_option as o")
        ->join("$this->table as p","p.id = o.product_id","LEFT")
        ->join("product_option as o2","o.product_id = o2.product_id AND o2.kind = 'photo'","LEFT")
        ->join("product_reviews as r","o.product_id = r.product_id AND r.is_secret = 0","LEFT")
        ->where("o.kind","main")
        ->order_by("o.sort","asc")
        ->group_by("o.product_id");
        return $this->db->get()->result();
    }
    // public function gets($where_obj =null,$select_arr =false,$limit=null)
    // {
    //     $rows =$this->db->get($this->table)->result();
    //     return $rows;
    // }
   
    function delete($id)
    {
        parent::_delete($id);
        //ref 카테 삭제
        $this->load->model("shop/ref_cate_package_model");
        $this->ref_cate_package_model->_delete(array('product_id'=>$id));
        //p_package_schedule 삭제
        $this->db->where('package_id', $id);
        $this->db->delete('p_package_schedule');
        
        /*
        //ref 호텔 삭제
        $this->db->where("product_id",$id)
        ->delete("p_ref_hotel");
        //메인상품 삭제
        $this->load->model("shop/product_option_model");
        $this->product_option_model->_delete(array("product_id"=>$id,"kind"=>"main"));

        //가격 삭제
        $this->load->model("golfpass/p_daily_price_model");
        $this->p_daily_price_model->_delete(array("product_id"=>$id));
		*/
    }
    
    function _getPhoto($id) {
    	$this->db->select("photo");
    	$this->db->from("$this->table");
    	$this->db->where("id",$id);
    	return $this->db->get()->result();
    }
    
    //category_id로 자기자신+하위 카테고리를 안에 있는 모든 상품을 구한다.
    function gets_for_merge($category_id) {

        $this->load->model('product_categories_model');
        $categories = $this->product_categories_model->gets_by_recursive_tree($category_id);

        $products = [];
        foreach ($categories as $_category) {
            $products = array_merge($products, $this->getListByCategoryId($_category->id));
        }

        return $products;

    }

    function getListByCategoryId($category_id)
    {
        return $this->db->select('*, p_p.id')
        ->from('product_package as p_p')
        ->join('ref_cate_package as r_c_p', 'p_p.id = r_c_p.product_id', 'LEFT')
        ->where('r_c_p.cate_id', $category_id)
        ->get()->result();
    }
}
