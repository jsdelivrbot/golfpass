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
            for($i =0; $i<$this->input->post("num_reviews"); $i++)
            {
                $this->_dbSet_addUpdate();
                $this->db->set("user_id",$this->user->id);
                $insert_id=$this->product_reviews_model->add();

            }
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
        
            $this->_dbSet_addUpdate();
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
    function _dbSet_addUpdate()
    {
        $this->db->set("is_display",$this->input->post("is_display"));
        $this->db->set("is_secret",$this->input->post("is_secret"));
        $this->db->set("product_id",$this->input->post("product_id"));
        $this->db->set("score_1",$this->input->post("score_1"));
        $this->db->set("score_2",$this->input->post("score_2"));
        $this->db->set("score_3",$this->input->post("score_3"));
        $this->db->set("score_4",$this->input->post("score_4"));
        $this->db->set("score_5",$this->input->post("score_5"));
        $this->db->set("score_6",$this->input->post("score_6"));
        $this->db->set("score_7",$this->input->post("score_7"));
        $this->db->set("score_8",$this->input->post("score_8"));
        $this->db->set("score_9",$this->input->post("score_9"));
        // $this->db->set("title",$this->input->post("title"));
        $this->db->set("desc",$this->input->post("desc"));
    }
    function _set_rules()
    {
        $this->fv->set_rules('is_display',"보이기","required");
        // $this->fv->set_rules('title',"제목","required");
        // $this->fv->set_rules('desc',"내용","required");
    }
   
}