<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reply extends Admin_Controller {

    function __construct(){
        parent::__construct(array(
            'table'=>'base/board_replys',
            'view_dir'=>'admin/reply'
        ));
    }
    
    public function gets(){
       
        //get totoal_rows
        $field = $this->input->post('field');
        if($field) 
            $this->db->like($field, $this->input->post('value'));
        $total_rows= $this->db->count_all_results($this->table);

        //get pagination
        $this->load->library('pagination');
        $pgiData =$this->pagination->get(array(
            'total_rows'=>$total_rows,
            'style_pgi'=>'style_1'
        ));
        $offset = $pgiData['offset'];
        $per_page = $pgiData['per_page'];

        //select from board_$id's contents
        $field = $this->input->post('field');
        if($field) 
            $this->db->like($field, $this->input->post('value'));
        $this->db->order_by('id','desc');
        
        $this->db->select("r.id,r.desc,r.created, b.name 'board_name', c.title 'content_title',u.userName,u.name 'user_name'");
        $this->db->from('board_replys as r');
        $this->db->join('boards as b','b.id = r.board_id','INNER');
        $this->db->join('users as u','u.id = r.user_id','INNER');
        $this->db->join('board_contents as c','c.id = r.content_id','INNER');
        $this->db->limit($per_page, $offset); 
        $reviews = $this->db->get()->result();

        // var_dump($reviews);
        //view
        $data = array('reviews' => $reviews);
         
         $this->_template("gets",$data);
         
    }
    
    public function update(){
       
    }

    public function _dbSet_addUpdate(){
      
    }
    public function _set_rules(){
      
    }

    
    public function delete($id){
     
    }
}