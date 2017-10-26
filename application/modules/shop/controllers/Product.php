<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends Base_Controller {
	function __construct(){
        parent::__construct(array(
            'table'=>'products',
            'view_dir'=>"product"
        ));
	}
	

	public function gets($id =1){
        
         $products =$this->products_model->get_by_category_id_recursive_tree($id);        
        
        $data = array("products"=>$products);
         
         
         $this->_template("gets",$data);
         
    }
    
    
	public function get($id =1){
        $this->products_model->hits_plus($id);
        $this->load->library('Ajax_pagination');

        // $data['hotel'] = $this->db->select("*")
        // ->from("")
        //product
        $product = $this->products_model->get($id);
        $this->load->model("base/users_model");
        $user = $this->users_model->get($this->user->id, array("userName,name,phone"));
        //product_option
        $data['product_option'] = $this->db->query("SELECT name FROM product_option WHERE product_id = $id AND kind = 'option' ORDER BY id asc")->result();
        // $data['hotel_option'] = $this->db->query("SELECT name FROM hotel_option WHERE hotel_id = $hotel_id AND kind = 'option' ORDER BY id asc")->result();
        //review with pagination
        $this->load->model('product_reviews_model');
        $reviews = $this->product_reviews_model->gets_with_ajax_pgi(array(
            'product_id'=>$id,
            'target' =>'#nid_postList',
            'base_url'=> site_url(shop_review_uri."/ajax_pgi_data")
        ));
        
        //view
         $data['product'] =$product;
         $data['user'] =$user;
         $data['reviews'] =$reviews;
         $data['product_id'] =$id;


        //  $review_view_dir =  view_review_dir."/ajax_gets";
        //  $this->_template(array('sample_get',$review_view_dir),$data);
         $this->_view('get',$data);
        
		 
    }

  
   
}
