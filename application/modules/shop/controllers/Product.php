<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends Base_Controller {
	function __construct(){
        parent::__construct(array(
            'table'=>'products',
            'view_dir'=>"product/golfpass"
        ));
	}
	

	public function gets($id =1){
        
        $products =$this->products_model->get_by_category_id_recursive_tree($id);        
      
        for($i=0 ;$i <count($products); $i++)
        {
            $photos = $products[$i]->photos;
            if(strpos($photos,',') > -1)
                $products[$i]->photos =  explode(",",$photos);
            else if($photos !== null)
                $products[$i]->photos =  array($photos);
            else
                $products[$i]->photos = array();
        }
        $data['products'] =$products;
        
        // $this->_view("gets",$data);
        $this->_template("gets",$data,'golfpass');
         
    }
    
    
	public function get($id =1){
        $this->products_model->_hits_plus($id);
        $this->load->library('Ajax_pagination');

        // $data['hotel'] = $this->db->select("*")
        // ->from("")
        //product
        $data['product'] = $this->products_model->_get($id);
        
        //product_option
        $this->load->model("product_option_model");
        $data['product_sub_desc'] = $this->product_option_model->gets_options($id,'desc');
        $data['product_options'] = $this->product_option_model->gets_options($id,'option');
        $data['product_photos'] = $this->product_option_model->gets_options($id,'photo');
        // $data['hotel_option'] = $this->db->query("SELECT name FROM hotel_option WHERE hotel_id = $hotel_id AND kind = 'option' ORDER BY id asc")->result();
        
        //hotel
        $this->load->model("p_hotel_model");
        $data['hotel'] = $this->p_hotel_model->get_by_product_id($id);

        //hotel option
        if($data['hotel']!==null){
            $this->load->model("hotel_option_model");
            $data['hotel_options'] = $this->hotel_option_model->gets_options($data['hotel']->id,'option');
        }

        //review

        //user
        $this->load->model("base/users_model");
        $data['user'] = $this->users_model->_get($this->user->id, array("userName,name,phone"));

        //reviews
        $this->load->model('product_reviews_model');
        $data['reviews'] = $this->product_reviews_model->gets(array('r.product_id'=>$id));

        //number
        $data['number'] =1 ;
        //reviews with pagination
        // $this->load->model('product_reviews_model');
        // $data['reviews'] = $this->product_reviews_model->gets_with_ajax_pgi(array(
        //     'product_id'=>$id,
        //     'target' =>'#nid_postList',
        //     'base_url'=> site_url(shop_review_uri."/ajax_pgi_data")
        // ));

        //  $review_view_dir =  view_review_dir."/ajax_gets";
        //  $this->_template(array('sample_get',$review_view_dir),$data);

         $this->_view('get',$data);
        
		 
    }

  
   
}
