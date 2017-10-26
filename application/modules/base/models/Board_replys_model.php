<?php defined('BASEPATH') OR exit('no direct script access allrowed');

class Board_replys_Model extends Public_Model{
    function __construct(){
        parent:: __construct('board_replys');
    }
   
    function add($set_obj = false){
        $review_id=parent::add($set_obj);
        
        $content_id = $set_obj['content_id'];

        $this->load->model('base/board_contents_model');
        $this->board_contents_model->count_plus(array('id'=>$content_id),'replys_count');
    }

    function delete($where_obj){
        $content_id =parent::get($where_obj,array("content_id"))->content_id;
        parent::delete($where_obj);

        $this->load->model('base/board_contents_model');
        $this->board_contents_model->count_minus(array('id'=>$content_id),'replys_count');
    }

    public function _recursive($parent,$deep,$content_id,$board_id){
        $data= array();
        for($i=0; $i <count($parent) ; $i++){
            $tmp_data =$parent[$i];
            $tmp_data->deep = (string)$deep;
            array_push($data ,$tmp_data);

            $childs = $this->db->select("r.id,r.desc, r.user_id ,r.created, if(r.user_id= 0,r.guest_name,u.name) 'user_name', if(r.user_id= 0, '손님',u.userName) 'userName'")
            ->from("board_replys as r")
            ->join("users as u","r.user_id = u.id","LEFT")
            ->where("r.content_id",$content_id)
            ->where("r.board_id",$board_id)
            ->where("parent_id",$parent[$i]->id)
            ->get()->result();
            
            if(count($childs) !==0){
                $data = array_merge($data,$this->_recursive($childs,$deep+1,$content_id,$board_id)) ;
            }
            
        }
        return $data;
    }


    function gets_by_recursive($content_id,$board_id)
    {
        $this->db->select("r.id,r.desc, r.user_id ,r.created, if(r.user_id= 0,r.guest_name,u.name) 'user_name', if(r.user_id= 0, '손님',u.userName) 'userName'");
        $this->db->from("board_replys as r");
        $this->db->join("users as u","r.user_id = u.id","LEFT");
        $this->db->where("r.content_id",$content_id);
        $this->db->where("r.board_id",$board_id);
        $this->db->where("parent_id",0);
        
        $rows =$this->db->get()->result();

        $rows =$this->_recursive($rows,0,$content_id,$board_id);
        return $rows;
    }
  
}