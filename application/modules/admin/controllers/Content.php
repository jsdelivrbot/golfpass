<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Content extends Admin_Controller {

    function __construct(){
        parent::__construct(array(
            'table'=>'base/board_contents',
            'view_dir'=>'admin/content'
        ));
    }
    function gets()
    {
        $data['contents'] = $this->board_contents_model->_gets();
        $this->_template("gets",$data);
    }
 

    function add($board_id =null ,$user_id=null)
    {
        $this->_set_rules();
        if(!$this->fv->run()){
            $this->load->model("base/users_model");
            $this->load->model("base/boards_model");
            $data['mode'] ='add';
            $data['content'] =(object)array("board_id"=>$board_id,'user_id'=>$user_id);
            // $data['board_id'] =$board_id;
            // $data['user_id'] =$user_id;
            $data['users'] =$this->users_model->_gets();
            $data['boards'] =$this->boards_model->_gets();

            $this->_template("addUpdate",$data);
                
        }else{
            $this->_dbSet_addUpdate();
            $insert_id =$this->board_contents_model->add();
            my_redirect($_SERVER['HTTP_REFERER']);
            return;
        }
    }

    function update($id)
    {
        $this->_set_rules();
        if(!$this->fv->run()){
            $this->load->model("base/users_model");
            $this->load->model("base/boards_model");
            $data['mode'] ="update/$id";
            $data['content'] = $this->board_contents_model->_get($id);
            $data['users'] =$this->users_model->_gets();
            $data['boards'] =$this->boards_model->_gets();

            $this->_template("addUpdate",$data);
                
        }else{
            $this->_dbSet_addUpdate();
            $insert_id =$this->board_contents_model->_update($id);
            my_redirect($_SERVER['HTTP_REFERER']);
            return;
        }
    }
    function delete($id)
    {
        $this->board_contents_model->delete($id);
        my_redirect(admin_content_uri."/gets");
    }
    public function _set_rules(){
        $this->fv->set_rules('title','제목','required');
        $this->fv->set_rules('desc','내용','required');
        $this->fv->set_rules('user_id','user_id','required');
        $this->fv->set_rules('board_id','board_id','required');
        
    }

    public function _dbSet_addUpdate(){
        $this->board_contents_model->_set_by_obj(array(
          "title"=> $this->input->post('title'),
           "desc"=> $this->input->post('desc'),
           "user_id"=> $this->input->post('user_id'),
           "board_id"=> $this->input->post('board_id')
        ));
    }
}
  