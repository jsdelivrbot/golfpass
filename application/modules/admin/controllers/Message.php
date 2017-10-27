<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Message extends Admin_Controller {

    function __construct(){
        parent::__construct(array(
            'table'=>'base/messages',
            'view_dir'=>'admin/message'
        ));
    }
    
    public function gets(){
        $this->load->database();

        //get totoal_rows
        $field = $this->input->post('field');
        if($field) $this->db->like($field, $this->input->post('value'));
        $this->db->select("count(*) AS num_rows");    
        $this->_dbSet_join();
        $total_rows =$this->db->get()->row()->num_rows;

        //get pagination
        $this->load->library('pagination');
        $pgiData =$this->pagination->get(array(
            'total_rows'=>$total_rows,
            'style_pgi'=>'style_1'
        ));
        $offset = $pgiData['offset'];
        $per_page = $pgiData['per_page'];
        
        //select from orders
        $field = $this->input->post('field');
        if($field) $this->db->like($field, $this->input->post('value'));
        $this->db->order_by('id','desc');
        $this->db->select("m.id, m.title, m.desc, m.created, u1.userName 'from_userName', u1.name 'from_name', u2.userName 'to_userName', u2.name 'to_name'");
        $this->_dbSet_join();
        $this->db->limit($per_page, $offset); 
        $messages = $this->db->get()->result();

        //view
        $data = array('messages'=>$messages);
         
        $this->_template("gets",$data);
        
         
    }

    public function _dbSet_join(){
        $this->db->from('messages AS m');
        $this->db->join('users AS u1', 'm.from_user_id = u1.id', 'INNER');
        $this->db->join('users AS u2', 'm.to_user_id = u2.id', 'INNER');
    }
}