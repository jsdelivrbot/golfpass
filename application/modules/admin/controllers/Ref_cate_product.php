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
        
        $data['alert'] ="수정완료";
        $data['reload'] =true;
        echo json_encode($data);
        return;
    }

}
