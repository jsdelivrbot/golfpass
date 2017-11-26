<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Content extends Base_Controller {
    private $board_id;
    private $board;
    function __construct(){
        parent::__construct();
        $this->board_id =$this->input->get("board_id");
        if($this->board_id === null)
            $this->board_id =$this->input->post("board_id");
        if($this->board_id !== null)
        {
            $this->board = $this->db->query("SELECT * FROM boards WHERE id = '$this->board_id'")->row();
            $this->view_dir = "content/{$this->board->skin}/content";
        }
        $this->table = 'board_contents';
        $this->load->model('board_contents_model');
    }
    public function ajax_get($id){
        header("Content-Type:application/json");
        
        $content =$this->board_contents_model->get_content($id);

        $data = array('none'=>'none','content'=>$content);
        echo json_encode($data);
    }
    
    public function _gets(){
        $config['pgi_style'] = "style_1";
        $board_id = $this->board_id;
        if($this->input->get('is_user') === 'true') //로그인한 user의 글만
            $contents =$this->board_contents_model->gets_with_pgi(array(
                    "user_id"=>$this->user->id,
                    'board_id'=>$this->board_id
                ),
                $config
            );
        else
            $contents =$this->board_contents_model->gets_with_pgi(array(
                    'board_id'=>$this->board_id
                ),
                $config
          );
        
        //view
        $data = array('contents' => $contents, 'board'=>$this->board);


        $authLv=$this->board->auth_r_board;
        if(!can_guest($authLv) || ($this->input->get('is_user') === 'true' && !is_login())){
            alert("로그인해주세요.");
            my_redirect(user_uri."/login?return_url=".rawurlencode(my_current_url()),false);
            return; 
        }
        if( !min_lv($authLv) ) {
            alert("게시판을 볼 권한이 없습니다.");
            my_redirect($_SERVER['HTTP_REFERER']);
            return ;
        }
        return $data;
    }
    public function gets()
    { 
        $data =$this->_gets();
        $this->_template(array("gets"),$data,"golfpass2");
		 
    }

    public function get($id,$getdata =false){
       
        $authLv= $this->board->auth_r_content;
        $content = $this->board_contents_model->get_content($id);

        if(!can_guest($authLv)){
            alert("로그인해주세요.");
            my_redirect(user_uri."/login?return_url=".rawurlencode(my_current_url()),false);
            exit; 
        }
        if(!min_lv($authLv) || !is_secret($content)) {
            alert("게시물을 볼 권한이 없습니다.");
            my_redirect($_SERVER['HTTP_REFERER']);
            exit ;
        }

        $this->load->model("board_replys_model");
        $data['user'] = $this->user;
        $data['board'] = $this->board;
        $data['content'] = $content;
        $data['replys']   =$this->board_replys_model->gets_by_recursive($id,$this->board_id);
        $data +=$this->_gets();
        if($getdata === true)
        {
            return $data;
        }
        
        // $reply_view_dir = "content/{$this->board->skin}/reply/gets";
        // $this->_template(array("get",$reply_view_dir,"gets"),$data,"golfpass2");
        $this->_template(array("get"),$data,"golfpass2");
    }

    function _addCallback($func_fv_false,$func_fv_true)
    {
        $authLv= $this->board->auth_w_content;
        $authKind = $this->board->auth_kind_w_content;
        //손님이 가능?
        if(!can_guest($authLv)){
            alert("로그인해주세요.");
            my_redirect(user_uri."/login?return_url=".rawurlencode(my_current_url()),false);
            return; 
        }

        //권한?
        if( !min_lv($authLv) ) {
            alert("글쓰기 권한이 없습니다");
            my_redirect($_SERVER['HTTP_REFERER']);
            return ;
        }
        if( !is_auth_kind($authKind))
        {
            alert("{$authKind} 회원만 쓸수있습니다.");
            my_redirect($_SERVER['HTTP_REFERER'],false);
            return ;
        }
        //손님?
        if(is_guest()){ 
            $this->fv->set_rules('guest_name','아이디','required');
            $this->fv->set_rules('guest_password','비번','required');
        }

       
        $this->_set_rules();
        if(!$this->fv->run()){
            $content= (object)array();
            $data = array('mode'=>'add','content'=>$content,'board_id'=>$this->board_id);
            $func_fv_false($data);

            // $this->_template("addUpdate",$data,'golfpass');
             
        }else{
            if(!is_guest()){ //회원일떄
                $userName = $this->user->userName;
                $user_id =$this->db->query("SELECT id FROM users WHERE userName = '$userName'")->row()->id;
                $this->db->set('user_id',$user_id);
            }else{//손님일떄
                $hash = password_hash($this->input->post('guest_password'), PASSWORD_BCRYPT);
                $this->db->set('guest_name',$this->input->post('guest_name'));
                $this->db->set('guest_password',$hash);
                $this->db->set('user_id','0');
            }

          
            $this->_dbSet_addUpdate();
            $insert_id =$this->board_contents_model->add(array('board_id'=>$this->board_id));
            
            $func_fv_true($insert_id);
            return;
        }
   
    }
    public function add(){
        
        $authLv= $this->board->auth_w_content;
        $authKind = $this->board->auth_kind_w_content;
        //손님이 가능?
        if(!can_guest($authLv)){
            alert("로그인해주세요.");
            my_redirect(user_uri."/login?return_url=".rawurlencode(my_current_url()),false);
            return; 
        }

        //권한?
        if( !min_lv($authLv) ) {
            alert("글쓰기 권한이 없습니다");
            my_redirect($_SERVER['HTTP_REFERER']);
            return ;
        }
        // if( !is_auth_kind($authKind))
        // {
        //     alert("{$authKind} 회원만 쓸수있습니다.");
        //     my_redirect($_SERVER['HTTP_REFERER'],false);
        //     return ;
        // }
        //손님?
        if(is_guest()){ 
            $this->fv->set_rules('guest_name','아이디','required');
            $this->fv->set_rules('guest_password','비번','required');
        }

       
        $this->_set_rules();
        if(!$this->fv->run()){
            $content= (object)array();
            $data = array('mode'=>'add','content'=>$content,'board_id'=>$this->board_id);

            $this->_template("addUpdate",$data,'golfpass2');
             
        }else{
            if(!is_guest()){ //회원일떄
                $userName = $this->user->userName;
                $user_id =$this->db->query("SELECT id FROM users WHERE userName = '$userName'")->row()->id;
                $this->db->set('user_id',$user_id);
            }else{//손님일떄
                $hash = password_hash($this->input->post('guest_password'), PASSWORD_BCRYPT);
                $this->db->set('guest_name',$this->input->post('guest_name'));
                $this->db->set('guest_password',$hash);
                $this->db->set('user_id','0');
            }

            // parent::_dbSet_addUpdate();
            $this->_dbSet_addUpdate();
            $insert_id =$this->board_contents_model->add(array('board_id'=>$this->board_id));

            if($this->board->skin === "panel")
                my_redirect(golfpass_panel_content_uri."/get/$insert_id");
            else
                my_redirect(content_uri."/get/$insert_id");
            return;
        }
   
    }
    public function ajax_check_guest_password($mode,$id){
        header("Content-Type:application/json");
        $this->fv->set_rules("guest_password","비밀번호","required");
        if(!$this->fv->run()){
            $data = array(
                "alert"=> form_error('guest_password',false,false)
            );
            echo json_encode($data);
            return;
        }else{
            $password =$this->input->post("guest_password");
            $hash = $this->db->select("guest_password")->where("id",$id)->get($this->table)->row()->guest_password;
            if (!password_verify($password, $hash)) { //비밀번호 불일치
              
                $data = array(
                    "alert"=>"비밀번호가 일치하지 않습니다",
                );
                 echo json_encode($data);
                 return;

            }else{
                $this->session->set_flashdata("guest_password/$id", true);
                $data = array(
                    "redirect" =>my_site_url(content_uri."/$mode/$id")
                );
                echo json_encode($data);
            }
        }
        return;
    }
    public function update($id){
        $writer_id = $this->db->query("SELECT user_id FROM board_contents WHERE id = '$id'")->row()->user_id;

        //글쓴이 인가요?
        if(!is_writer($writer_id)){
            alert("글쓰기 수정 권한이 없습니다");
            my_redirect(content_uri."/get/$id");
            return;
        }
        //글쓴이가 게스트일떄
        if(is_guest_write($writer_id)){
           if(!$this->session->userdata("guest_password/$id")){
                $data = array("id"=>$id,'mode'=>'update');
                 
                $this->_template('guest_pass',$data);
                return;
           }else{
                $this->session->set_flashdata("guest_password/$id", true);
           }
        }
      
        //폼
        $this->_set_rules();
        if(!$this->fv->run()){ 
            $content =$this->db->query("SELECT * FROM $this->table WHERE id = $id")->row();
            $data = array('mode'=>"update/$id",'content'=>$content,'board_id'=>$this->board_id);
            
            $this->_template('addUpdate',$data,'golfpass2');
            // $this->_template("content/panel/content/addUpdate",$data,'golfpass');
        }else{
            $this->_dbSet_addUpdate();
            $this->board_contents_model->_update($id);
            
            if($this->board->skin === "panel")
                my_redirect(golfpass_panel_content_uri."/get/$id");
            else
                my_redirect(content_uri."/get/$id");
        }
    }
    public function delete($id){
        $writer_id = $this->db->query("SELECT user_id FROM board_contents WHERE id = '$id'")->row()->user_id;
         //글쓴이 인가요?
         if(!is_writer($writer_id)){
            alert("글 삭제 권한이 없습니다");
            my_redirect(content_uri."/get/$id");
            return;
        }

        //글쓴이가 게스트일떄
        if(is_guest_write($writer_id)){
           if(!$this->session->userdata("guest_password/$id")){
                $data = array("id"=>$id,'mode'=>'delete');
                $this->_template('guest_pass',$data);
                return;
           }else{
                $this->session->set_flashdata("guest_password/$id", true);
           }
        }
        //삭제
        $this->board_contents_model->delete($id,$this->board_id);
        if($this->board->skin === "panel")
            my_redirect(golfpass_panel_uri."/gets");
        else
            my_redirect(content_uri."/gets");
    }
    public function _set_rules(){
        $this->fv->set_rules('title','제목','required');
        $this->fv->set_rules('desc','내용','required');
        
    }

    public function _dbSet_addUpdate(){
        $this->board_contents_model->_set_by_obj(array(
          "title"=> $this->input->post('title'),
           "desc"=> $this->input->post('desc'),
           "is_secret"=> $this->input->post('is_secret')
        ));
    }

	
}
