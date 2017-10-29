<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panel extends Base_Controller {

    function __construct(){
        parent::__construct(array(
            'table'=>'panels',
            'view_dir'=>'panel'
        ));
    }
    function get($id)
    {
        $data['panel'] = $this->{$this->model}->_get($id);
    }
    function gets()
    {
        // $data['panels'] = $this->{$this->model}->_gets_with_pgi(null,'style_1');
        $data['panels'] = $this->{$this->model}->_gets();
        $this->_template("gets",$data,'golfpass');
    }

    function add()
    {
        $this->_set_rules();
        if($this->fv->run() === false)
        {
            $data['panel']  = (object)array();
            $data['mode'] = "add";
            $this->_template("admin_addUpdate",$data);
            return;
        }
        else
        {
            parent::_dbSet_addUpdate();
            // $this->_dbSet_addUpdate();
            $insert_id =$this->{$this->model}->_add();
            my_redirect(panel_uri."/update/$insert_id");
            // my_redirect($_SERVER['HTTP_REFERER']);
            return;
        }
    }

    function update($id)
    {
        parent::_set_rules();
        // $this->_set_rules();
        if($this->fv->run() === false)
        {
            $data['panel']  = $this->{$this->model}->_get($id);
            $data['mode'] = "update/$id";
            $this->_template("admin_addUpdate",$data);
            return;
        }
        else
        {
            parent::_dbSet_addUpdate();
            // $this->_dbSet_addUpdate();
            $this->{$this->model}->_update($id);
            // my_redirect(panel_uri."/update/$insert_id");
            my_redirect(panel_uri."/get/$id");
            // my_redirect($_SERVER['HTTP_REFERER']);
            return;
        }
    }
    function delete($id)
    {
        $this->{$this->model}->_delete($id);
        my_redirect(panel_uri."/gets");
        // my_redirect($_SERVER['HTTP_REFERER']);
    }
    function ajax_add(){
        header("Content-Type:application/json");

        parent::_set_rules();
         // $this->_set_rules();
        if($this->fv->run() === false)
        {
            $data['alert'] =  validation_errors(false,false);

        }
        else
        {
            parent::_dbSet_addUpdate();
            // $this->_dbSet_addUpdate();
            $insert_id =$this->{$this->model}->_add();
            $data['alert'] ="완료";
            $data['reload'] =true;
        }
        echo json_encode($data);
        return;
    }


    public function ajax_delete($id)
    {
        header("content-type:application/json");
        $this->{$this->model}->_delete($id);

        $data = array("reload"=>true);
        echo json_encode($data);
        return;
    }
    function _set_rules()
    {
        $this->fv->set_rules("name","이름","required");
    }

    function _dbSet_addUpdate()
    {
        $this->db->set("name",$this->input->post("name"));
    }
}