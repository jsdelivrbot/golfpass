<?php defined('BASEPATH') OR exit('no direct script access allrowed');

class Board_contents_Model extends Board_Model{
    function __construct(){
        parent:: __construct('board_contents');
    }
    function get_content($id,$select=false){

        $this->db->select("c.*,c.id, c.title, c.desc, c.created ,if(c.user_id = 0, c.guest_name, u.name) 'user_name', if(c.user_id = 0, '손님', u.userName) 'userName'");
        $this->db->from("$this->table AS c");
        $this->db->join("users AS u","c.user_id = u.id","LEFT");
        $this->db->where('c.id',"$id");
        $content = $this->db->get()->row();
        return $content;
    }
    


    // function ($config)
    // {
    //     $ci = Public_Controller:: $instance;
        
    //     $board_id =  isset($config['board_id']) ?  $config['board_id'] : null;
    //     $pgi_style =  isset($config['pgi_style']) ?  $config['pgi_style'] : 'style_1';
    //     $this->load->library('pagination');
    //     //get totoal_rows
    //     $field = $this->input->get('field');
    //     $this->db->select('count(*) as rows_num');
    //     $this->db->from("$this->table as c");
    //     if($field !== null)//검색 true
    //     {
    //         $this->_like_or_by_split($field,$this->input->get('value'));
    //     }
    //     $this->db->where('c.is_display','1');
    //     $this->db->where('c.user_id',$ci->user->id);
    //     $total_rows= $this->db->get()->row()->rows_num;
        
    //     //get pagination
    //      $pgiData =$this->pagination->get(array(
    //         'total_rows'=>$total_rows,
    //         'style_pgi'=>$pgi_style
    //     ));
    //     $offset = $pgiData['offset'];
    //     $per_page = $pgiData['per_page'];
        
    //     //select from board_$id's contents
    //     $field = $this->input->get('field');
    //     if($field)
    //       $this->_like_or_by_split($field,$this->input->get('value'));
    //     $this->db->order_by('c.id','desc');
    //     $this->db->limit($per_page,$offset);
    //     $this->db->where('c.user_id',$ci->user->id);
    //     $this->db->where('c.is_display','1');
    //     $rows=$this->gets();
    //     return $rows;
    // }
    function gets_with_pgi($where_obj,$config)
    {
        $pgi_style =  isset($config['pgi_style']) ?  $config['pgi_style'] : 'style_1';
        $board_id = $where_obj['board_id'];
        $rows=$this->_gets_with_pgi_func(
            $pgi_style,
            function() use ($where_obj){
                $this->db->select("count(*) as rows_num");
                $this->db->from("$this->table as c");
                $this->db->join("users as u","c.user_id = u.id","LEFT");
                $this->db->where('c.is_display','1');
                parent::_where_by_obj($where_obj);
                $total_rows= $this->db->get()->row()->rows_num;
                return $total_rows;
            },
            function($offset,$per_page) use($where_obj){
                $this->db->order_by('c.id','desc');
                $this->db->limit($per_page,$offset);
                parent::_where_by_obj($where_obj);
                $this->db->where('c.is_display','1');
                $rows = $this->gets();
                return $rows;
            }
            ,
            function() use ($board_id){
                $this->load->model("base/boards_model");
                $total_rows =$this->boards_model->_get_count(array('id'=>$board_id),'contents_count');
                return $total_rows;
            });
            return $rows;
    }
 
   
    function gets($where_obj =null)
    {
        $this->db->select("u.*,c.id as id, c.title, c.desc, c.created ,if(c.user_id = 0, c.guest_name, u.name) 'user_name', if(c.user_id = 0, '손님', u.userName) 'userName',c.title'제목', u.name'글쓴이',c.created'날짜'");
        $this->db->from("$this->table AS c");
        $this->db->join("users AS u","c.user_id = u.id","LEFT");
        $this->db->order_by("c.id","desc");
        $this->_where_by_obj($where_obj);
        $rows = $this->db->get()->result();

        return $rows;
    }
    function add($set_obj =false){
        $board_id = $set_obj['board_id'];
        $id = parent::_add($set_obj);

        $is_display=parent::_get($id,array('is_display'))->is_display;

        if($is_display === '1'){
            $this->load->model("base/boards_model");
            $this->boards_model->_count_plus(array('id'=>$board_id),'contents_count');
        }
        return $id;
    }
  
    function delete($where,$board_id =false)
    {
        $row =parent::_get($where,array('is_display','board_id'));
        $is_display=$row->is_display;
        $board_id = $row->board_id;
        $where =parent::_delete($where);
        
        if($is_display === '1'){
            $this->load->model("base/boards_model");
            $this->boards_model->_count_minus(array('id'=>$board_id),'contents_count');
        }
    }
 
    


}