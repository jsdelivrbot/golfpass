<?php defined('BASEPATH') OR exit('no direct script access allrowed');

class Panel_contents_Model extends Public_Model{
    function __construct(){
        parent:: __construct('panel_contents');
    }
    function gets()
    {
        $this->db->select("c.*, p.* , c.id 'id'");
        $this->db->from("$this->table as c");
        $this->db->join("panels as p","c.panel_id = p.id","LEFT");
        return $this->db->get()->result();
    }

    function _add($set_obj=null)
    {

        $insert_id =parent::_add($set_obj);

        $panel_id =$this->_get($insert_id)->panel_id;
        $this->load->model("panels_model");
        $this->db->set("num_contents","num_contents +1",false);
        $this->panels_model->_update($panel_id);

    }

    function _delete($id)
    {
        $panel_id =$this->_get($id)->panel_id;
        $this->load->model("panels_model");
        $this->db->set("num_contents","num_contents -1",false);
        $this->panels_model->_update($panel_id);

        parent::_delete($id);
    }
}