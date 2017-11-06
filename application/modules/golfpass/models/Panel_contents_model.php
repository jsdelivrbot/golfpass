<?php defined('BASEPATH') OR exit('no direct script access allrowed');

class Panel_contents_Model extends Public_Model{
    function __construct(){
        parent:: __construct('panel_contents');
    }
    function gets()
    {
        $this->db->select("c.*, p.*");
        $this->db->from("$this->table as c");
        $this->db->join("panels as p","c.panel_id = p.id","LEFT");
        return $this->db->get()->result();
    }

}