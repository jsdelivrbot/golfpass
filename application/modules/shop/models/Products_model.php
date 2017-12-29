<?php defined('BASEPATH') OR exit('no direct script access allrowed');

class Products_Model extends Board_Model{
    function __construct(){
        parent:: __construct('products');
    }

    
   
    function get($id)
    {
        $query = "";
        $arr_rankingTpye =array("score_1","score_2","score_3","score_4","score_5","score_6","score_7","score_8");

        foreach($arr_rankingTpye as $rankingType)
        {
            $sub_query = "SELECT IFNULL(avg($rankingType),0) FROM product_reviews as s_r1 WHERE s_r1.product_id = p.id  AND s_r1.is_secret = 0";
            $query .= ",($sub_query) as $rankingType";
        }
        
        $sub_query4 = "SELECT IFNULL(avg($rankingType),0) FROM product_reviews as s_r1 WHERE s_r1.product_id = p.id  AND s_r1.is_secret = 0";
        $query .= ",($sub_query4) as $rankingType";


        $sub_query = "SELECT cast(((avg(score_1)+avg(score_2)+avg(score_3)+avg(score_4)+avg(score_5)+avg(score_6)+avg(score_7)+avg(score_8))/8) as decimal(10,1) ) FROM product_reviews as r WHERE r.product_id = p.id AND r.is_secret = 0";
        $query .= ",($sub_query) as avg_score";
        $this->db->select("p.*".$query);
        $this->db->from("$this->table as p");
        $this->db->where("p.id",$id);
        return $this->db->get()->row();
    }
    function get_by_category_id_recursive_with_pgi($cate_id,$pgi_style)
    {

        $products=$this->gets_by_category_id_recursive_tree($cate_id);
        $num_rows = count($products);
        $products= parent::_gets_with_pgi_func(
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
            array("per_page"=>12,"is_numrow"=>false)
        );
        $products=golfpass_sort($products);
        return $products;
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
        if($rankingType === 'avg_score')
        {
            //product_reviews 총 평균점수
            $sub_query3 = "SELECT IFNULL((avg(score_1)+avg(score_2)+avg(score_3)+avg(score_4)+avg(score_5)+avg(score_6)+avg(score_7)+avg(score_8))/8,0) FROM product_reviews as s_r WHERE s_r.product_id = p.id  AND s_r.is_secret = 0";
            $query .= ",($sub_query3) as avg_score";
        }
        else
        {
            $sub_query4 = "SELECT IFNULL(avg($rankingType),0) FROM product_reviews as s_r1 WHERE s_r1.product_id = p.id  AND s_r1.is_secret = 0";
            $query .= ",($sub_query4) as $rankingType";
        }
        //카테고리 도시 parent_id
        $sub_query = "SELECT cate.parent_id FROM ref_cate_product as ref_c_p INNER JOIN product_categories as cate ON cate.id = ref_c_p.cate_id WHERE ref_c_p.product_id = p.id ORDER BY ref_c_p.cate_id LIMIT 0,1";
        $query .= ",($sub_query) as cate_parent_id";
        
        //카테고리 도시
        $sub_query = "SELECT cate.name FROM ref_cate_product as ref_c_p INNER JOIN product_categories as cate ON cate.id = ref_c_p.cate_id WHERE ref_c_p.product_id = p.id ORDER BY ref_c_p.cate_id LIMIT 0,1";
        $query .= ",($sub_query) as category_name";

        //카테고리 나라
        $sub_query = "SELECT parent_cate.name FROM product_categories as parent_cate WHERE parent_cate.id = cate_parent_id LIMIT 0,1";
        $query .= ",($sub_query) as parent_category_name";

        //product_option 사진들
        $sub_query = "SELECT group_concat(o.name ORDER BY o.sort) FROM `product_option` AS `o` WHERE o.product_id= p.id AND o.kind = 'photo'";
        $query .= ",($sub_query) as photos";
        //호텔
        $sub_query = "SELECT p_ref_h.hotel_id FROM `p_ref_hotel` as p_ref_h WHERE p_ref_h.product_id = p.id LIMIT 0,1";
        $query .= ",($sub_query) as hotel_id";
        
        //가격
        $date = date("Y-m-d");
        $sub_query = "SELECT price FROM p_daily_price as sub_dp WHERE sub_dp.product_id = p.id AND sub_dp.date = '{$date}' AND sub_dp.num_people = '1' AND sub_dp.period = '1' LIMIT 0, 1";
        $query .= ", IFNULL(($sub_query),'0') as price";

        $this->db->select("p.*".$query);
        $this->db->from("products as p");
        $this->db->order_by($rankingType,'desc');
        $products= $this->db->get()->result();

        for($i=0 ;$i <count($products); $i++)
        {
            $photos = $products[$i]->photos;
            if(strpos($photos,',') > -1)
                $products[$i]->photos =  explode(",",$photos);
            else if($photos !== null)
                $products[$i]->photos =  array($photos);
            else
                $products[$i]->photos = array('','','');
        }

        return $products;
    }

    function gets_by_category_id($cate_id)
    {
        //product_option 사진들
        $sub_query = "SELECT group_concat(o.name order by o.sort) FROM `product_option` AS `o` WHERE o.product_id= r.product_id AND o.kind = 'photo'";
        //product_reviews 총 평균점수
        $sub_query2 = "SELECT (avg(score_1)+avg(score_2)+avg(score_3)+avg(score_4)+avg(score_5)+avg(score_6)+avg(score_7)+avg(score_8))/8 FROM product_reviews as r WHERE r.product_id = p.id  AND r.is_secret = 0";
        //호텔 여부
        $sub_query3 = "SELECT p_ref_h.hotel_id FROM `p_ref_hotel` as p_ref_h WHERE p_ref_h.product_id = p.id LIMIT 0,1";
        //오늘날자 1박2일 1인가격
        $date = date("Y-m-d");
        $sub_query4 = "SELECT price FROM p_daily_price as sub_dp WHERE sub_dp.product_id = r.product_id AND sub_dp.date = '{$date}' AND sub_dp.num_people = '1' AND sub_dp.period = '1' LIMIT 0, 1";
        //1차 카테고리
        $sub_query5 = "SELECT name FROM product_categories as sub_c WHERE c.parent_id = sub_c.id LIMIT 0, 1";
        //리뷰 갯수
        $sub_query6 = "SELECT count(*) FROM product_reviews as sub_r WHERE r.product_id = sub_r.product_id";
        $this->db->select("p.*,r.id as ref_id,r.sort ,($sub_query) as photos, IFNULL(($sub_query2),0) as avg_score, ($sub_query3) as hotel_id, IFNULL(($sub_query4),'0') as todayPrice,c.name as category_name, ($sub_query5) as parent_category_name, ($sub_query6) as num_reviews");
        $this->db->from("ref_cate_product as r");
        $this->db->join("products as p", "p.id = r.product_id","LEFT");
        $this->db->join("product_categories as c", "c.id = r.cate_id","LEFT");
        $this->db->where("r.cate_id",$cate_id);
         $sort =$this->input->get_post('sort_value');//sort
         $sort_type =$this->input->get_post('sort_type');//sort
       
        
        // $this->db->order_by("r.sort",'asc');
        $rows = $this->db->get()->result();
        return $rows;

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
    function gets()
    {
        $sub_query = '';
        $sub = "SELECT o3.name FROM product_option as o3 WHERE o3.product_id = o.product_id AND o3.kind = 'photo' ORDER BY o3.sort ASC LIMIT 0,1";
        $sub_query .= ",($sub) as photo";

        $more_select = '';
        $more_select .= ", GROUP_CONCAT(o2.name) as photos";
        $more_select .= ", (avg(r.score_1)+ avg(r.score_2) + avg(r.score_3)+ avg(r.score_4)+ avg(r.score_5)+ avg(r.score_6)+ avg(r.score_7)+ avg(r.score_8))/8 as avg_score ";
        $this->db->select("o.id as option_id, o.sort,p.*". $more_select . $sub_query)
        ->from("product_option as o")
        ->join("$this->table as p","p.id = o.product_id","LEFT")
        ->join("product_option as o2","o.product_id = o2.product_id AND o2.kind = 'photo'","LEFT")
        ->join("product_reviews as r","o.product_id = r.product_id","LEFT")
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
        $this->load->model("shop/ref_cate_product_model");
        //ref 카테 삭제
        $this->ref_cate_product_model->_delete(array('product_id'=>$id));
        //ref 호텔 삭제
        $this->db->where("product_id",$id)
        ->delete("p_ref_hotel");
        //메인상품 삭제
        $this->load->model("shop/product_option_model");
        $this->product_option_model->_delete(array("product_id"=>$id,"kind"=>"main"));

        //가격 삭제
        $this->load->model("golfpass/p_daily_price_model");
        $this->p_daily_price_model->_delete(array("product_id"=>$id));

    }
}