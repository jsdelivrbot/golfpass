<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panel_content extends Base_Controller {

   
    function __construct(){
        parent::__construct(array(
            'table'=>'base/board_contents',
            'view_dir'=>'panel_content'
        ));
    }

    function get($id)
    {
        $data['user'] =$this->user;
        $data['content'] = $this->db->select("c.*,u.*, c.created,c.id,u.id 'user_id',u.name 'user_name'")
        ->from("board_contents as c")
        ->join("users as u","c.user_id =u.id","LEFT")
        ->where("c.id",$id)
        ->get()->row();
        // var_dump($data['content']);
        $this->_template("get",$data,'golfpass2');
    }
}