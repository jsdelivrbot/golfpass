<?php defined('BASEPATH') OR exit('no direct script access allrowed');

class Package_daily_price_Model extends Board_Model{
    function __construct(){
        parent:: __construct('package_daily_price');
    }
    
    function get_daily_price($id, $date) {
    	$this->db->select('price');
    	$this->db->from('package_daily_price');
    	$this->db->where('product_id', $id);
    	$this->db->where('date', $date);
    	$result = $this->db->get()->row_array();
    	return $result;
    }
    
    function get_price($id) {
    	$this->db->select('*');
    	$this->db->from('package_daily_price');
    	$this->db->where('product_id', $id);
    	$this->db->where('date >=', 'curdate()', false);
    	$this->db->order_by('date', 'DESC');
    	$result = $this->db->get()->result();
    	return $result;
    }
}