<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends Base_Controller
{

    function __construct()
    {
        parent::__construct(array(
            'view_dir'=>"main"
        ));
   
    }
    function ajax_gets_by_ranking()
    {
        
        // //product_option 사진들
        // $sub_query1 = "SELECT group_concat(o.name) FROM `product_option` AS `o` WHERE o.product_id= p.id AND o.kind = 'photo'";
        // $query .= ",($sub_query1) as photos";
        // //호텔 여부
        // $sub_query2 = "SELECT group_concat(p_ref_h.hotel_id) FROM `p_ref_hotel` as p_ref_h WHERE p_ref_h.product_id = p.id";
        // $query .= ",($sub_query2) as hotel_id";

    

        // //product_reviews score_1 
        // $sub_query4 = "SELECT avg(score_1) FROM product_reviews as s_r1 WHERE s_r1.product_id = p.id AND s_r1.is_display = 1 AND s_r1.is_secret = 0";
        // $query .= ",($sub_query4) as score_1";
        // //product_reviews score_2 
        // $sub_query4 = "SELECT avg(score_2) FROM product_reviews as s_r1 WHERE s_r1.product_id = p.id AND s_r1.is_display = 1 AND s_r1.is_secret = 0";
        // $query .= ",($sub_query4) as score_2";

        // //product_reviews score_3 
        // $sub_query4 = "SELECT avg(score_3) FROM product_reviews as s_r1 WHERE s_r1.product_id = p.id AND s_r1.is_display = 1 AND s_r1.is_secret = 0";
        // $query .= ",($sub_query4) as score_3";
        // //product_reviews score_4 
        // $sub_query4 = "SELECT avg(score_4) FROM product_reviews as s_r1 WHERE s_r1.product_id = p.id AND s_r1.is_display = 1 AND s_r1.is_secret = 0";
        // $query .= ",($sub_query4) as score_4";
        // //product_reviews score_5 
        // $sub_query4 = "SELECT avg(score_5) FROM product_reviews as s_r1 WHERE s_r1.product_id = p.id AND s_r1.is_display = 1 AND s_r1.is_secret = 0";
        // $query .= ",($sub_query4) as score_5";

        // //product_reviews score_6 (시설 설비가 좋다.)
        // $sub_query4 = "SELECT avg(score_6) FROM product_reviews as s_r1 WHERE s_r1.product_id = p.id AND s_r1.is_display = 1 AND s_r1.is_secret = 0";
        // $query .= ",($sub_query4) as score_6";

        // //product_reviews score_7 (식사)
        // $sub_query4 = "SELECT avg(score_7) FROM product_reviews as s_r1 WHERE s_r1.product_id = p.id AND s_r1.is_display = 1 AND s_r1.is_secret = 0";
        // $query .= ",($sub_query4) as score_7";

        // //product_reviews score_8 (식사)
        // $sub_query4 = "SELECT avg(score_8) FROM product_reviews as s_r1 WHERE s_r1.product_id = p.id AND s_r1.is_display = 1 AND s_r1.is_secret = 0";
        // $query .= ",($sub_query4) as score_8";

        $rankingType = $this->input->post("rankingType");
       
        $this->load->model("shop/products_model");
        $products_avgScore =$this->products_model->gets_by_ranking($rankingType);

        for($i=0 ;$i <count($products_avgScore); $i++)
        {
            $photos = $products_avgScore[$i]->photos;
            if(strpos($photos,',') > -1)
                $products_avgScore[$i]->photos =  explode(",",$photos);
            else if($photos !== null)
                $products_avgScore[$i]->photos =  array($photos);
            else
                $products_avgScore[$i]->photos = array();
        }
        $data['products_avgScore'] = $products_avgScore;
        $data['rankingType'] = $rankingType;
        
         $this->_view("ajax_gets_by_ranking",$data);
    }
    function index()
    {
        //메인 상품
        $this->load->model("shop/products_model");
        $this->load->model("shop/product_option_model");
        $this->load->model("shop/product_reviews_model");
        $this->load->model("admin/setting_model");
        $product_setting =$this->setting_model->_get(1);
        $product_main_id = $product_setting->representative_product;
        $data['product_main'] = $this->products_model->get($product_main_id);
        $data['product_main_photos'] = $this->product_option_model->gets_options($product_main_id,'photo');
        //나라 분류 리스트
        $this->load->model("shop/product_categories_model");
        $menu_id=$this->product_categories_model->_get(array('name'=>'나라별'),array('id'))->id;
        $this->db->order_by("sort","asc");
        $data['nation_list'] = $this->product_categories_model->_gets(array('parent_id'=>$menu_id));

        //테마별 분류 리스트
        $menu_id=$this->product_categories_model->_get(array('name'=>'테마별'),array('id'))->id;
        $this->db->order_by("sort","asc");
        $data['thema_list'] = $this->product_categories_model->_gets(array('parent_id'=>$menu_id));
        
        //골프 패스 패널이 추천한 상품 리스트
        $menu_id=$this->product_categories_model->_get(array('name'=>'골프패스 패널 추천'),array('id'))->id;
        $products_panel = $this->products_model->gets_by_category_id_recursive_tree($menu_id);
        for($i=0 ;$i <count($products_panel); $i++)
        {
            $photos = $products_panel[$i]->photos;
            if(strpos($photos,',') > -1)
                $products_panel[$i]->photos =  explode(",",$photos);
            else if($photos !== null)
                $products_panel[$i]->photos =  array($photos);
            else
                $products_panel[$i]->photos = array();
        }
        $data['products_panel'] =$products_panel;

        //리뷰 평균점수 높은대로순
        $products_avgScore =$this->products_model->gets_by_ranking("avg_score");
        for($i=0 ;$i <count($products_avgScore); $i++)
        {
            $photos = $products_avgScore[$i]->photos;
            if(strpos($photos,',') > -1)
                $products_avgScore[$i]->photos =  explode(",",$photos);
            else if($photos !== null)
                $products_avgScore[$i]->photos =  array($photos);
            else
                $products_avgScore[$i]->photos = array();
        }
        $data['products_avgScore'] = $products_avgScore;
        
        //패널
        $this->load->model("users_model");
        $this->db->limit(10,0);
        $this->db->select("u.*, (SELECT count(*) FROM board_contents as c WHERE u.id = c.user_id AND c.board_id = 1) as num_contents");
        $this->db->where("kind","panel");
        $this->db->from("users as u");
        $data['panels'] = $this->db->get()->result();;
        // $this->users_model->_gets(array("kind"=>"panel"));

        // $this->_template('index');
        $this->_view('main/golfpass',$data);
        
    }

}