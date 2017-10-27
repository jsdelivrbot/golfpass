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
    
    public function add()
    {
        
        $this->fv->set_rules('cate_id','카테고리',array('required',
            array('이미 등록 되어있는 카테고리입니다.',function($str){
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
            $cate_id = $this->input->post('cate_id');
            $product_id = $this->input->post('product_id');
            $this->ref_cate_product_model->add_ref($cate_id,$product_id);
            my_redirect($_SERVER['HTTP_REFERER']);
        }
        
    }
    public function delete($id)
    {
        $this->ref_cate_product_model->_delete($id);
        my_redirect($_SERVER['HTTP_REFERER']);
    }

}
