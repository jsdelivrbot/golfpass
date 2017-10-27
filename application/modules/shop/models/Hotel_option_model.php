<?php defined('BASEPATH') OR exit('no direct script access allrowed');

class Hotel_option_Model extends Public_Model{
    function __construct(){
        parent:: __construct('hotel_option');
    }
 
    function gets_options($hotel_id,$kind)
    {
        $this->db->select("name");
        $this->db->from("$this->table");
        $this->db->where("hotel_id",$hotel_id);
        $this->db->where("kind",$kind);
        $this->db->order_by("id","asc");
        return $this->db->get()->result();
    }

}