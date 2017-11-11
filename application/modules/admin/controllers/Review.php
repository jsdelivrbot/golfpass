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
        $this->_set_rules();
        if($this->fv->run() === false)
        {
            $data['mode'] = "add";
            $data['content'] =(object)array('is_display'=>'1');
            $this->_template("addUpdate",$data);
             
        }else
        {
            $this->load->model('product_reviews_model');
            $this->product_reviews_model->_set_by_obj(array(
                "title"=>$this->input->post('title'),
                "desc"=>$this->input->post('desc'),
                $product_id = $this->input->post('product_id'),
                $user_id = $user_id,
                "is_display"=>$this->input->post('is_display')
            ));
            $this->product_reviews_model->_add();
            // my_redirect(admin_user_uri."/   gets/$kind");
        }

    }
    public function update($id)
    {
        $this->_set_rules();
        if($this->fv->run() === false)
        {
            $this->load->model("product_reviews_model");
            $content =$this->product_reviews_model->_get($id,array('title','desc','is_display'));
            $data =array("content"=>$content,"mode"=>"update/$id");
             
             $this->_template("addUpdate",$data);
             
        }else
        {
            $this->load->model('product_reviews_model');
            $this->product_reviews_model->_set_by_obj(array(
                "title"=>$this->input->post('title'),
                "desc"=>$this->input->post('desc'),
                "is_display"=>$this->input->post('is_display')
            ));
            $this->product_reviews_model->update_admin($id);
            my_redirect(admin_product_review_uri."/gets");
        }
    }

    public function ajax_delete($id){
        parent::_ajax_delete($id);
    }
    function _set_rules()
    {
        $this->fv->set_rules('title',"제목","required");
        $this->fv->set_rules('desc',"내용","required");
    }
   
}