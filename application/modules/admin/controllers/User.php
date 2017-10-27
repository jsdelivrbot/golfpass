<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends Admin_Controller {

    function __construct(){
        parent::__construct(array(
            'table'=>'base/users',
            'view_dir'=>'admin/user'
        ));
    }
    
    public function gets(){
        $this->load->database();
        
        //get totoal_rows
        $field = $this->input->post('field');
        if($field) $this->db->like($field, $this->input->post('value'));
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
        $field = $this->input->post('field');
        if($field) $this->db->like($field, $this->input->post('value'));
        $this->db->order_by('id','desc');
        $users = $this->db->get($this->table, $per_page, $offset)->result();

        //view
        $data = array('users'=>$users);
        $this->_template("gets",$data);
    }

}