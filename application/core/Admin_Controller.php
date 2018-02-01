<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class Admin_Controller extends Public_Controller{
    
    function __construct($args=null){
        $args['template_kind'] =$args['template_kind'] ?? 'admin';
        parent::__construct($args);
        if(!is_admin()){
            alert('접근권한이 없습니다.');
            my_redirect(user_uri.'/login');
        }
    }

    public function list()
    {
        $rows =$this->{$this->modelName}->pagination();
        $data['rows'] = $rows;
        $this->_template("list",$data);


    }
}
