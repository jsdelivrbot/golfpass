<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends Admin_Controller {
    function __construct(){
        parent::__construct(array(
            'table'=>'setting',
            'view_dir'=>'setting'
        ));
    }
    // public function get_product(){
    //     $row = $this->setting_model->_get(1);
    //     $data = array('row'=>$row);
        
    //     if($row->is_product_review_display === '0'){
    //         $row->is_product_review_display ='관리자가 확인후 보이게';
    //     }else{
    //         $row->is_product_review_display ='바로 보이게';
    //     }

    //     $this->_template("get",$data);
         
    // }
    public function get_product(){

        $data['row']=$this->setting_model->_get(1);
        $this->load->model("shop/products_model");
        $data['products'] =$this->products_model->_gets();
        $this->_template("shop_addUpdate",$data);

       
        
    }
    function ajax_update_product(){
        header("content-type:application/json");

        $this->fv->set_rules('is_product_review_display','상품 자동 후기보이기','required');
        if($this->fv->run() === false){
            $data['alert'] =  '잘못된 접근';
             
        }else{
            // $this->setting_model->_set_by_obj(array(
            //     'is_product_review_display' => $this->input->post('is_product_review_display')
            // ));
            $this->_dbset_addUpdate();
            $this->setting_model->_update(1);

            $data['alert'] = "수정완료";
            $data['reload'] = true;
        }
        echo json_encode($data);
    }
    
}


