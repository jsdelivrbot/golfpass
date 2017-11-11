<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Review extends Admin_Controller {

   
    function __construct(){
        parent::__construct(array(
            'table'=>'shop/product_reviews',
            'view_dir'=>'admin/review'
        ));
    }
    public function gets()
    {
        
        $contents =$this->product_reviews_model->gets_with_pagination_in_admin(array(
            'pgi_style'=>'style_1'
        ));
        
        $data = array('contents'=>$contents);
         
         $this->_template("gets",$data);
         

    }
    function add()
    {
        $this->fv->set_rules('product_id',"상품","required");
        if($this->fv->run() === false)
        {
            $data['mode'] = "add";
            $data['content'] =(object)array('is_display'=>'0','is_secret'=>'0');
            $data['products'] =$this->db->get("products")->result();
            $this->_template("addUpdate",$data);
             
        }else
        {
            $this->load->model('product_reviews_model');
            parent::_dbSet_addUpdate();
            $this->db->set("user_id",$this->user->id);
            $insert_id=$this->product_reviews_model->add();
            // my_redirect(admin_product_review_uri."/update/$insert_id");
            my_redirect(admin_product_review_uri."/gets");
        }

    }
    public function update($id)
    {
        $this->_set_rules();
        if($this->fv->run() === false)
        {
            $this->load->model("product_reviews_model");
             $data['content'] = $this->product_reviews_model->get_reveiw($id);
             $data['mode'] ="update/$id";

             $this->_template("addUpdate",$data);
             
        }else
        {
            $this->load->model('product_reviews_model');
        
            parent::_dbSet_addUpdate();
            $this->product_reviews_model->update($id);
            my_redirect(admin_product_review_uri."/update/$id");
        }
    }

    public function ajax_delete($id){
        header("content-type:application/json");
        $this->product_reviews_model->delete($id);
        $data['reload'] =true;
        echo json_encode($data);
        return;
    }
    function _set_rules()
    {
        $this->fv->set_rules('is_display',"보이기","required");
        // $this->fv->set_rules('title',"제목","required");
        // $this->fv->set_rules('desc',"내용","required");
    }
   
}