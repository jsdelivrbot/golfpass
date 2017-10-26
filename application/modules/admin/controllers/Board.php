<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Board extends Admin_Controller {

    function __construct(){
        parent::__construct(array(
            'table'=>'base/boards',
            'view_dir'=>'admin/board'
        ));
    }
  
    public function gets(){
        //get totoal_rows
        $total_rows= $this->db->count_all_results($this->table);

        //get pagination
        $this->load->library('pagination');
        $pgiData =$this->pagination->get(array(
            'total_rows'=>$total_rows,
            'style_pgi'=>'style_1'
        ));
        $offset = $pgiData['offset'];
        $per_page = $pgiData['per_page'];

        //select from users
        $this->db->order_by('id','desc');
        $boards = $this->db->get($this->table, $per_page, $offset)->result();

        //view
        $data = array('boards'=>$boards);
        $this->_template("gets",$data);
    }
    public function add(){
        $this->_set_rules();
        
        if(!$this->fv->run()){
            $skins= get_file_list(skin_board_dir);
            $board = (object)array('auth_r_board'=>'0','auth_w_content'=>'1','auth_r_content'=>'0','auth_w_review'=>'1','skin'=>'basic');
            
            $data = array("mode"=>"add",'board'=>$board,"skins"=>$skins);
            $this->_template("addUpdate",$data);
        }else{
            $this->_dbSet_addUpdate();
            $this->boards_model->add();
            
            my_redirect(admin_board_uri."/gets");
        }
    }
    
    public function update($id){
        $this->_set_rules();

        if(!$this->fv->run()){
            $skins= get_file_list(skin_board_dir);

            $this->db->where('id',$id);
            $board=$this->db->get($this->table)->row();
            $data = array('mode'=>"update/$id",'board'=>$board,"skins"=>$skins);
            $this->_template("addUpdate",$data);
        }else{
            $this->_dbSet_addUpdate();
            $this->boards_model->update($id);
            my_redirect(admin_board_uri."/gets");
        }
    }

    public function _dbSet_addUpdate(){
        if($this->input->post('is_linked_with_product')=== null)
            $is_linked_with_product = '0';
        else
            $is_linked_with_product = '1';

        $this->boards_model->set_by_obj(array(
            "name"=>$this->input->post('name'),
            "skin"=>$this->input->post('skin'),
            "auth_r_board"=>$this->input->post('auth_r_board'),
            "auth_r_content"=>$this->input->post('auth_r_content'),
            "auth_w_content"=>$this->input->post('auth_w_content'),
            "auth_w_review"=>$this->input->post('auth_w_review'),
            "is_linked_with_product"=>$is_linked_with_product
        ));
    }
    public function _set_rules(){
        $this->fv->set_rules('name','이름','required');
        $this->fv->set_rules('auth_r_board','게시판 볼 권한','required');
        $this->fv->set_rules('auth_w_content','쓰기권한','required');
        $this->fv->set_rules('auth_r_content','읽기권한','required');
        $this->fv->set_rules('auth_w_review','댓글권한','required');
        $this->fv->set_rules('skin','종류','required');
    }

    
    public function delete($id){
        $this->boards_model->delete(array('id'=>$id));

        my_redirect(admin_board_uri."/gets");
    }
}