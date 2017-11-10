<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends Admin_Controller {

    function __construct(){
        parent::__construct(array(
            'table'=>'base/users',
            'view_dir'=>'admin/user'
        ));
    }
    
    public function gets($kind ='general'){
        $this->load->database();
        
        //get totoal_rows
        $field = $this->input->post('field');
        if($field) $this->db->like($field, $this->input->post('value'));
        $this->db->where("kind",$kind);
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
        $this->db->where("kind",$kind);
        if($field) $this->db->like($field, $this->input->post('value'));
        $this->db->order_by('id','desc');
        $users = $this->db->get($this->table, $per_page, $offset)->result();

        //view
        $data['users'] =$users;
        $data['kind'] =$kind;
        $this->_template("gets",$data);
    }

    function add($kind)
    {
        
        $this->fv->set_rules('name','이름','required');
        if ($this->fv->run()=== false) {
            $data['user'] = (object)array();
            $data['mode']="add/$kind";
            $data['kind'] =$kind;
            $this->_template("addUpdate",$data);

        } else{
            $kind = $this->input->post('kind');
            $this->_dbSet_addUpdate();
            $this->db->set('kind',$kind);
            $this->db->insert('users');
            $insert_id =$this->db->insert_id();
            if($kind ==='panel')
            {
                my_redirect(admin_user_uri."/update/{$insert_id}/{$kind}");    
                return ;
            }

            my_redirect(admin_user_uri."/gets/{$kind}");
        }

    }
    function update($user_id,$kind)
    {
        $this->fv->set_rules('name','이름','required');
        if ($this->fv->run()=== false) {
            $data['kind'] =$kind;
            $data['user'] = $this->users_model->_get(array("id"=>$user_id));
            $data['mode']="update/$user_id/$kind";
            
            if($kind ==='panel'){
                $this->load->model("base/boards_model");
                $board_panel_id = $this->boards_model->_get(array("name"=>"패널 게시판"),array("id"))->id;
                $data['board_id'] = $board_panel_id; //패널 글쓰기 게시판 id
            }
            $this->load->model("base/board_contents_model");
            $data['user_contents'] = $this->board_contents_model->_gets(array("user_id"=>$user_id));
            $this->_template("addUpdate",$data);

        } else {
            $kind = $this->input->post('kind');
            $this->_dbSet_addUpdate();
            $this->db->set('kind',$kind);
            $this->db->where('id',$user_id);
            $this->db->update('users');

            // var_dump($kind);
            alert("수정완료");
            my_redirect($_SERVER['HTTP_REFERER']);
        }
    }
    function delete($id,$kind)
    {
        $this->users_model->_delete($id);
        my_redirect(admin_user_uri."/gets/{$kind}");
    }
    function _dbSet_addUpdate(){
        $birth = my_date_format($this->input->post('year'), $this->input->post('month'), $this->input->post('day'));
        $userName= $this->input->post('userName');
        if($userName === ''){
            $userName=null;
        }
        
        $this->db->set('userName',$userName);
        $this->db->set('postal_number', $this->input->post('postal_number'));
        $this->db->set('email', $this->input->post('email'));
        $this->db->set('address', $this->input->post('address'));
        $this->db->set('address_more', $this->input->post('address_more'));
        $this->db->set('name', $this->input->post('name'));
        $this->db->set('sex', $this->input->post('sex'));
        $this->db->set('birth', $birth);
        $this->db->set('phone', $this->input->post('phone'));
        $this->db->set('profilePhoto',$this->input->post('profilePhoto'));
        
    }


}