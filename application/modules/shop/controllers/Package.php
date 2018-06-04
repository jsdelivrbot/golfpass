<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Package extends Base_Controller {
	function __construct(){
        parent::__construct(array(
            'table'=>'product_package',
            'view_dir'=>"package/golfpass"
        ));
	}
    function date()
    {
        
    }
    
    function gets_by_hash($where)
    {

        $where = urldecode($where);
        $this->load->model("shop/product_package_model");
        $this->db->or_like("p.hashtag",$where);
        $this->db->or_like("p.name",$where);

        $packages = $this->product_package_model->gets_by_ranking('id');
        $num_packages = count($packages);
        
        $packages = $this->product_package_model->_gets_with_pgi_func(
            "style_zap",
        		function() use($num_packages)
            {
            	return $num_packages;
            },
            function($offset,$per_page) use($packages)
            {
            	return array_slice($packages,$offset,$per_page);
            },
            null,
            array("per_page"=>12,"is_numrow"=>false)
        );
        
        $data['num_packages'] = $num_packages;
        $data['category']= (object)array("name"=>$where);
        $data['parent_categories']= (object)array("name"=>"");
        $data['parent_category'] =  (object)array("name"=>"","photo4"=>"");
        $data['packages'] =$packages;
        $data['search'] = $where;
        
        $this->load->model("shop/products_model");
        $this->db->or_like("p.hashtag",$where);
        $this->db->or_like("p.name",$where);
        $products=$this->products_model->gets_by_ranking('avg_score');
        $num_products = count($products);
        
        $this->load->model("base/board_contents_model");
        $this->db->or_like("c.hashtag",$where);
        $this->db->or_like("c.title",$where);
        $contents=$this->board_contents_model->gets(array("board_id"=>"1"));
        $num_contents = count($contents);
        
        $data['num_products'] = $num_products;
        $data['num_panel_contents'] = $num_contents;
        $data['num_total'] = $num_products+$num_contents+$num_packages;
//         var_dump($data);exit;
		$this->_template("gets",$data,'golfpass2');
    }
	public function gets($id =1){
		//products
		$this->load->model("shop/products_model");
		$products = $this->products_model->get_by_category_id_pgi($id);
		for($i=0 ;$i <count($products); $i++)
		{
			$photos = $products[$i]->photos;
			if(strpos($photos,',') > -1) $products[$i]->photos =  explode(",",$photos);
			else if($photos !== null) $products[$i]->photos =  array($photos);
			else $products[$i]->photos = array('','','');
		}
		$data['products'] = $products;

		//packages
		$packages =$this->product_package_model->get_by_category_id_pgi($id);
		$data['packages'] = $packages;
        
        //category
        $this->load->model("product_categories_model");
        $category= $this->product_categories_model->_get($id);
        $data['category'] = $category;
        $parent_category = $this->product_categories_model->_get($category->parent_id);
        if($category->parent_id ==="0")
        {
            $parent_category = $category;
        }
        else if($parent_category->name === "나라별")
        {
            $parent_category = $category;
        }
     
        $data['parent_category'] = $parent_category;
        $data['child_categories'] = $this->product_categories_model->_gets(array("parent_id"=>$parent_category->id));
        $data['parent_categories']= $this->product_categories_model->revert_recursive($id);
        
        $this->_template("gets",$data,'golfpass2');
    }


    function gets_by_ranking($rankingType)
    {

         //리뷰 평균점수 높은대로순
         $products =$this->product_package_model->gets_by_ranking($rankingType);
         $products= $this->product_package_model->_gets_with_pgi_func(
             "style_golfpass",
            function() use($products)
            {
                return count($products);
            },
            function($offset,$per_page) use($products,$rankingType)
            {
                $this->db->limit($per_page,$offset);
               return $this->product_package_model->gets_by_ranking($rankingType);
            },
            null,
            array("per_page"=>10)
         );
         $data['rankingType'] = $rankingType;
         $data['products_avgScore'] = $products;
        $this->_template("gets_by_ranking",$data,'golfpass2');
        // $this->_view("gets_by_ranking",$data);
    }
    
    // ------------------------------ ↓↓↓ USE ↓↓↓ ------------------------------
	public function get($id =1){
// 		$this->products_model->_hits_plus($id);
        $this->load->library('Ajax_pagination');

        //product
        $product= $this->product_package_model->get($id);
        $data['product'] =$product;
        
        $current_date = date("Y-m-d");
        $data["start_date"] = date("Y-m-d",strtotime("{$current_date} +1 days"));
        $data["end_date"] = date("Y-m-d",strtotime("{$current_date} +2 days"));
        
        //schedule
        $schedule = $this->product_package_model->getSchedule($id);
        $data['schedule'] = $schedule;
        
        //user
        $this->load->model("base/users_model");
        $data['user'] = $this->users_model->_get($this->user->id);
        
        //googld map
        $this->load->library("map_api");
        $this->map_api->api_key = $this->setting->google_map_api_key;

        //number
        $data['number'] = 1;
        
        $this->_view('get', $data);
    }
    // ------------------------------ ↑↑↑ USE ↑↑↑ ------------------------------
    
    function add_option()
    {

        $product_id = $this->input->post("product_id");
        $num_people = $this->input->post("num_people");
        $total_price = $this->input->post("total_price");
        $start_date = $this->input->post("start_date");
        $end_date = $this->input->post("end_date");

        //5개값 유효성 체크
        if(is_numeric($num_people) === false)
        {
            alert("인수를 선택해주세요.");
            my_redirect(shop_product_uri."/get/{$product_id}");
        }
        if(is_numeric($total_price) === false)
        {
            alert("가격이 잘못되었습니다.");
            my_redirect(shop_product_uri."/get/{$product_id}");
        }
        if(is_numeric($product_id) === false)
        {
            alert("상품 아이디가 잘못되었습니다.");
            my_redirect(shop_product_uri."/get/{$product_id}");
        }

        $check_date =preg_match("/^(19|20)\d{2}-(0[1-9]|1[012])-(0[1-9]|[12][0-9]|3[0-1])$/",$start_date);
        if($check_date === 0)
        {
            alert("시작날짜가 잘못 되었습니다.");
            my_redirect(shop_product_uri."/get/{$product_id}");
        }
        $check_date =preg_match("/^(19|20)\d{2}-(0[1-9]|1[012])-(0[1-9]|[12][0-9]|3[0-1])$/",$end_date);
        if($check_date === 0)
        {
            alert("종료날짜가 잘못 되었습니다.");
            my_redirect(shop_product_uri."/get/{$product_id}");
        }
        //5개값 유효성 체크

        $data["start_date"] = $start_date;
        $data["end_date"] = $end_date;
        $data["num_people"] = $num_people;
        $data["product_id"] = $product_id;
        $data["total_price"] = $total_price;
        $this->_template("add_option",$data,"golfpass2");
    }
   
}
