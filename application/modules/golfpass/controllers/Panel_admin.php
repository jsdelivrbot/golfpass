<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panel_admin extends Admin_Controller {

    function __construct(){
        parent::__construct(array(
            'table'=>'panels',
            'view_dir'=>'panel'
        ));
    }
    
    function gets()
    {
        $data['panels'] = $this->panels_model->_gets_with_pgi(null,'style_1');
        $this->_template("admin_gets",$data,'admin');
    }

    function add()
    {
        $this->_set_rules();
        if($this->fv->run() === false)
        {
            $data['panel']  = (object)array();
            $data['mode'] = "add";
            $this->_template("admin_addUpdate",$data,'admin');
            return;
        }
        else
        {
            parent::_dbSet_addUpdate();
            $insert_id =$this->panels_model->_add();
            my_redirect(golfpass_panel_admin_uri."/update/$insert_id");
            my_redirect($_SERVER['HTTP_REFERER']);
            return;
        }
    }

    function update($panel_id)
    {
        $this->_set_rules();
        if($this->fv->run() === false)
        {
            $data['panel']  = $this->panels_model->_get($panel_id);
            $data['mode'] = "update/$panel_id";
            $this->load->model("panel_contents_model");
            $data['panel_contents'] = $this->panel_contents_model->_gets(array('panel_id'=>$panel_id));
            $this->_template("admin_addUpdate",$data,'admin');
            return;
        }
        else
        {
            parent::_dbSet_addUpdate();
            $this->panels_model->_update($panel_id);
            my_redirect(golfpass_panel_admin_uri."/update/$panel_id");
            // my_redirect($_SERVER['HTTP_REFERER']);
            return;
        }
    }

    function delete($id)
    {
        $this->panels_model->_delete($id);
        $this->load->model("panel_contents_model");
        $this->panel_contents_model->_delete(array("panel_id"=>$id));
        my_redirect(golfpass_panel_admin_uri."/gets");
        // my_redirect($_SERVER['HTTP_REFERER']);
    }

    public function ajax_delete($id)
    {
        header("content-type:application/json");
        $this->panels_model->_delete($id);

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