<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hotel extends Admin_Controller {
    function __construct(){
        parent::__construct(array(
            'table'=>'shop/p_hotel',
            'view_dir'=>'admin/hotel'
        ));
    }

    function options_reset()
    {
        //모두 삭제하고
        $hotel_id = $this->input->post("hotel_id");
        $this->db->where("hotel_id", $hotel_id);
        $this->db->where("kind", 'option');
        $this->db->delete("hotel_option");

        //다시추가
        $arr_option = $this->input->post("option");
        if(is_array($arr_option))
            foreach($arr_option as $val)
            {
                $this->db->set("name",$val);
                $this->db->set("hotel_id",$hotel_id);
                $this->db->set("kind","option");
                $this->db->insert("hotel_option");
            }   
        alert("옵션 추가완료");
        my_redirect($_SERVER['HTTP_REFERER']);
    }



    function ref_product_delete($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('p_ref_hotel');
        my_redirect($_SERVER['HTTP_REFERER']);
    }
    function ajax_ref_product_delete($id)
    {
        header("content-type:application/json");
        $this->db->where('id',$id);
        $this->db->delete('p_ref_hotel');
        $data['reload'] =true;
        echo json_encode($data);
    }
    function ajax_ref_product_add()
    {
        header("content-type:application/json");
        
        $this->fv->set_rules('hotel_id','호텔',array('required',
            array('이미 등록 되어 있습니다.',function($str){
                $this->db->where('hotel_id',$this->input->post('hotel_id'));
                $this->db->where('product_id',$this->input->post('product_id'));
                $row =$this->db->get("p_ref_hotel")->row();
                if($row !== null)
                    return false;
                return true;
            })
        ));
        if(!$this->fv->run()){

            $data['alert'] =  validation_errors(false,false);
                
        }else{
            $this->db->set('hotel_id',$this->input->post('hotel_id'));
            $this->db->set('product_id',$this->input->post('product_id'));
            $this->db->insert("p_ref_hotel");
        }
        $data['reload'] =true;
        echo json_encode($data);
    }
    function ref_product_add()
    {
        $this->fv->set_rules('hotel_id','호텔',array('required',
            array('이미 등록 되어 있습니다.',function($str){
                $this->db->where('hotel_id',$this->input->post('hotel_id'));
                $this->db->where('product_id',$this->input->post('product_id'));
                $row =$this->db->get("p_ref_hotel")->row();
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
            $this->db->set('hotel_id',$this->input->post('hotel_id'));
            $this->db->set('product_id',$this->input->post('product_id'));
            $this->db->insert("p_ref_hotel");
            my_redirect($_SERVER['HTTP_REFERER']);
        }
    }
    function gets()
    {
        $data['rows'] = $this->p_hotel_model->gets_with_pgi();

        $this->_template('gets',$data);
    }
    function _set_rules()
    {
        $this->fv->set_rules('name','이름','required');
    }
    function add()
    {
        $this->_set_rules();

        if(!$this->fv->run()){
            $data['mode'] ='add';
            $data['row'] = (object)array();
            $this->_template("addUpdate",$data);
        }else{
            $this->_dbSet_addUpdate();
            $insert_id=$this->p_hotel_model->_add();
            my_redirect(admin_hotel_uri."/update/$insert_id");
        }
        
    }
    function ajax_option_delete($id,$kind)
    {
        header("content-type:application/json");
        $row = $this->db->query("SELECT * FROM hotel_option WHERE id = $id")->row();
        if($row->kind ==="photo")
        {
            $dir =$row->name;
            $dir=substr($dir,1,strlen($dir));
            unlink($dir);

        }

        $this->db->where('id',$id);
        $this->db->where('kind',$kind);
        $this->db->delete('hotel_option');
        $data['reload'] =true;
        echo json_encode($data);
        return ;
    }
    function ajax_option_update($id)
    {
        header("content-type:application/json");
        $row = $this->db->query("SELECT * FROM hotel_option WHERE id = $id")->row();
        if($row === null)
        {
            parent::_dbset_addUpdate();
            $this->db->insert("product_option");
            $data['alert'] = "추가되었습니다";
        }
        else
        {
            parent::_dbset_addUpdate();
            $this->db->where("id",$id);
            $this->db->update("product_option");
        }
            $data['reload'] =true;
            echo json_encode($data);
        return ;
    }
  
    function upload_photo()
    {
        $this->load->module("base/common");
        $this->common->_multi_upload_photo('admin','photo',function($imgDir){
            $this->db->set("hotel_id",$this->input->post('hotel_id'));
            $this->db->set("name",$imgDir);
            $this->db->set("kind","photo");
            $this->db->insert("hotel_option");
           
        },
        null,
        function(){
             my_redirect($_SERVER['HTTP_REFERER']);
        });   
      
        
    }
    function update($id)
    {
        $data['hotel'] = $this->db->query("SELECT * FROM p_hotel WHERE id = $id")->row();
        $data['photos'] = $this->db->query("SELECT * FROM hotel_option WHERE hotel_id = $id AND kind = 'photo' ORDER BY sort ASC")->result();
        $data['options'] = $this->db->query("SELECT * FROM hotel_option WHERE hotel_id = $id AND kind = 'option'")->result();
        $data['products'] =$this->db->get("products")->result();

        $setting =$this->db->from("setting")->where("id","1")->get()->row();
        $h_options = $setting->h_options;
        $h_options =explode(",",$h_options); 
        $data['h_options'] = $h_options;


        $this->db->select("*, p.id 'p_id' , r.id 'id'");
        $this->db->from("p_ref_hotel as r");
        $this->db->join("products as p","r.product_id = p.id","LEFT");
        $this->db->where("r.hotel_id",$id);
        $data['ref_products'] =$this->db->get()->result();
        
        // $data['ref_products'] = $this->db->where("hotel_id",$id)->get("p_ref_hotel")->result();

        if(parent::_update($id,$data)===true)
        {
            alert("수정완료");
            my_redirect(admin_hotel_uri."/update/$id");
        }
    }
    function ajax_delete($id){
        header("content-type:application/json");
        $this->p_hotel_model->_delete($id);
        //관련 ref 상품 삭제
        $this->db->where("hotel_id",$id)
        ->delete("p_ref_hotel");
        $data['reload'] = true;
        echo json_encode($data);
        return;
        
    }

    

}