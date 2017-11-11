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
        $rankingType = $this->input->post("rankingType");
       
        $this->load->model("shop/products_model");
        $this->db->limit(10,0);
        $data['products_avgScore'] =$this->products_model->gets_by_ranking($rankingType);
        
        $data['rankingType'] = $rankingType;
        
         $this->_view("ajax_gets_by_ranking",$data);
    }
    function search()
    {
        header("content-type:application/json");

        $search =$this->input->post("search");
        $search = str_replace(" ","",$search);

        $this->load->model("shop/products_model");
        $this->db->or_like("p.hashtag",$search);
        $this->db->or_like("p.name",$search);
        $this->db->limit(10,0);
         $products=$this->products_model->gets_by_ranking('avg_score');

        $data =array();
        foreach($products as $product)
        {
            $photo = $product->photos[0] ?? '';
            array_push($data,array(
                'title'=>$product->name,
                'imagePath'=>$photo,
                'score' => $product->avg_score,
                "article"=>$product->desc
            ));
        } 

        echo json_encode($data);
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
        $this->db->limit(10,0);
        $data['products_avgScore'] =$this->products_model->gets_by_ranking("avg_score");
       
        
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