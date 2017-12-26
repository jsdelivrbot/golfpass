<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ref_cate_product extends Admin_Controller {

    function __construct(){
        parent::__construct( array(
            'table'=>'shop/ref_cate_product'
        ));
    }
	public function index()
    {
     
    }
    public function goToRecycleBin($product_id)
    {
        $this->db->where("product_id",$product_id);
        $this->db->delete("ref_cate_product");

        $this->db->where("name","휴지통");
        $cate=$this->db->get("product_categories")->row();
        $cate_id = $cate->id;

        $this->db->set("cate_id",$cate_id);
        $this->db->set("product_id",$product_id);
        $this->db->insert("ref_cate_product");

        my_redirect(admin_product_uri."/update/{$product_id}");
    }
    function ajax_add()
    {
        header("content-type:application/json");
        
        $this->fv->set_rules('cate_id','카테고리',array('required',
        array('이미 등록 되어있습니다.',function($str){
            $this->db->where('cate_id',$this->input->post('cate_id'));
            $this->db->where('product_id',$this->input->post('product_id'));
            $row =$this->db->get("$this->table")->row();
            if($row !== null)
                return false;
            return true;
            })
        ));

        if(!$this->fv->run()){

            $data['alert'] =  validation_errors(false,false);
                
        }else{
            $this->_dbset_addUpdate();
            $this->ref_cate_product_model->_add();
        }
        $data['reload'] =true;
        echo json_encode($data);
    }
    public function add()
    {
        
        $this->fv->set_rules('cate_id','카테고리',array('required',
            array('이미 등록 되어있습니다.',function($str){
                $this->db->where('cate_id',$this->input->post('cate_id'));
                $this->db->where('product_id',$this->input->post('product_id'));
                $row =$this->db->get("$this->table")->row();
                if($row !== null)
                    return false;
                return true;
            })
        ));
        
        if($this->fv->run() === false)
        {
            alert_validationErrors();
            my_redirect($_SERVER['HTTP_REFERER']);
        }else
        {
            $this->_dbset_addUpdate();
            $this->ref_cate_product_model->_add();
            my_redirect($_SERVER['HTTP_REFERER']);
        }
        
    }
    function ajax_delete($id)
    {
        $this->ref_cate_product_model->_delete($id);
        $data['reload'] =true;
        echo json_encode($data);
    }
    public function delete($id)
    {
        $this->ref_cate_product_model->_delete($id);
        my_redirect($_SERVER['HTTP_REFERER']);
    }
    
    public function ajax_update($id)
    {
        header("content-type:application/json");
     
        $this->_dbset_addUpdate();
        $this->ref_cate_product_model->_update($id);
        
        // $data['alert'] ="수정완료";
        $data['reload'] =true;
        echo json_encode($data);
        return;
    }

}
