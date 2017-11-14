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
    function get_general()
    {
        
        $data['row']=$this->setting_model->_get(1);
        $this->_template("get_general",$data);
    }
    public function get_product()
    {

        $data['row']=$this->setting_model->_get(1);
        $this->load->model("shop/products_model");
        $data['products'] =$this->products_model->_gets();
        $data['products_main'] = $this->products_model->gets();

        $this->_template("get_product",$data);

    }
    function get_sms()
    {
        $data['row']=$this->setting_model->_get(1);
        $this->_template("get_sms",$data);
    }
   

    function ajax_update()
    {
        header("content-type:application/json");

        

        parent::_dbset_addUpdate();
        $this->setting_model->_update(1);

        $data['reload'] = true;
        echo json_encode($data);
    }
}


