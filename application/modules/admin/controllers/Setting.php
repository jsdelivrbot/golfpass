<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends Admin_Controller {
    function __construct(){
        parent::__construct(array(
            'table'=>'setting',
            'view_dir'=>'setting'
        ));
    }
    public function get_product(){
        $row = $this->setting_model->get(1);
        $data = array('row'=>$row);
        
        if($row->is_product_review_display === '0'){
            $row->is_product_review_display ='관리자가 확인후 보이게';
        }else{
            $row->is_product_review_display ='바로 보이게';
        }

        $this->_template("get",$data);
         
    }
    public function update_product(){

        $this->fv->set_rules('is_product_review_display','상품 자동 후기보이기','required');
        if($this->fv->run() === false){
            $row=$this->setting_model->get(1);
            $data =array('mode'=>'update_product','row'=>$row);
            $this->_template("addUpdate",$data);
             
        }else{
            $this->setting_model->set_by_obj(array(
                'is_product_review_display' => $this->input->post('is_product_review_display')
            ));
            $this->setting_model->update(1);
            my_redirect(admin_setting_product_uri."/get_product");
        }
        
    }
    
}
