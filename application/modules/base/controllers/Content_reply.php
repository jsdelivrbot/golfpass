<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Content_reply extends Base_Controller {

    private $board;
    private $board_id;
    private $content_id;
    function __construct(){
        parent::__construct(array(
            'table'=>'board_replys',
            'view_dir'=>"base/board"
        ));
        $this->content_id = $this->input->post('content_id');
        $this->board_id = $this->input->get('board_id');
        if(!$this->board_id)
            $this->board_id = $this->input->post('board_id');
        $this->board = $this->db->where('id',$this->board_id)->get('boards')->row();
        // $this->load->library(array('verify'=>'vf'),array('user_auth'=>$this->user->auth));
    }

    public function ajax_add($parent_id){
        header("Content-Type:application/json");
        $authLv = $this->db->query("SELECT auth_w_review FROM boards WHERE id = '$this->board_id'")->row()->auth_w_review;

        if(!can_guest($authLv)){
            $data = array(
                "alert"=>"로그인해주세요",
                "redirect" =>site_url(user_uri."/login?return_url=".rawurlencode(content_uri."/get/{$this->content_id}?{$_SERVER['QUERY_STRING']}"))
            );
             echo json_encode($data);
             return;
        } 
        if(!min_lv($authLv) ) {
            $data = array(
                "alert"=>"댓글쓰기 권한이 없습니다"
            );
             echo json_encode($data);
             return;
        }

        if(is_guest()){
            $this->fv->set_rules('guest_name','아이디','required');
            $this->fv->set_rules('guest_password','비번','required');
        }
        $this->_set_rules();
        if(!$this->fv->run()){
            if(!is_guest())
                $data = array(
                    "alert"=> form_error('desc',false,false));
            else
                $data = array(
                    "alert"=> form_error('desc',false,false)."\r\n".form_error('guest_name',false,false)."\r\n".form_error('guest_password',false,false));
        }else{
            if(is_guest()){
                $this->db->set("guest_name",$this->input->post("guest_name"));
                $hash =password_hash($this->input->post('guest_password'), PASSWORD_BCRYPT);
                $this->db->set("guest_password", $hash);
            }

            $this->board_replys_model->add(array(
                'parent_id'=>$parent_id,
                'user_id'=>$this->user->id,
                'board_id'=>$this->board_id,
                'content_id'=>$this->content_id,
                'desc'=>$this->input->post('desc')
            ));
            $data = array(
                "reload"=>true
            );
        }
     
        echo json_encode($data);
        return;
    }
    public function ajax_update($id){
        header("Content-Type:application/json");
        $writer_id = $this->db->select('user_id')->from($this->table)->where("id",$id)->get()->row()->user_id;
        //글쓴이 인가요?
         if(!is_writer($writer_id)){
            $data = array("alert"=> "댓글 수정 권한이없습니다");
            echo json_encode($data);
            return;
        }
        //글쓴이가 게스트일떄
        if(is_guest_write($writer_id)){
            $guest_password = $this->input->post("guest_password");
            $hash = $this->db->select('guest_password')->from($this->table)->where("id",$id)->get()->row()->guest_password;
            if(!password_verify($guest_password,$hash)){
                $data = array("alert"=> "비밀번호가 일치하지않습니다.");
                echo json_encode($data);
                return;
            }
        }
      
        $this->_set_rules();
        if(!$this->fv->run()){
            $data = array("alert"=> form_error('desc',false,false));
        }else{
            $this->db->where('id',$id);
            $this->db->set("desc",$this->input->post('desc'));
            $this->db->update($this->table);
            $data = array("reload"=> true);
        }
        echo json_encode($data);
        return;
      
    }
    public function _set_rules(){
        $this->fv->set_rules('desc','댓글내용','required');
    }

   
	public function ajax_delete($id){
        header("Content-Type:application/json");
        $writer_id = $this->db->select("user_id")->from($this->table)->where("id",$id)->get()->row()->user_id;

        //글쓴이 인가요?
        if(!is_writer($writer_id)){
            $data = array("alert"=> "댓글 삭제 권한이없습니다");
            echo json_encode($data);
            return;
        }
        //글쓴이가 게스트일떄
        if(is_guest_write($writer_id)){
            $guest_password = $this->input->post("guest_password");
            $hash = $this->db->select('guest_password')->from($this->table)->where("id",$id)->get()->row()->guest_password;
            if(!password_verify($guest_password,$hash)){
                $data = array("alert"=> "비밀번호가 일치하지않습니다.");
                echo json_encode($data);
                return;
            }
        }

        $this->board_replys_model->delete($id);
        $data = array("reload"=>true);
        echo json_encode($data);
        return;
    }

    public function ajax_update_form(){
        header('content-type:application/json');
        $id = $this->input->post('id');
        $review=$this->db->where("id",$id)->get($this->table)->row();
       
        $data = array("none"=>"none","review"=>$review);
        echo json_encode($data);
    }
}
