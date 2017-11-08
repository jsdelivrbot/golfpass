<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panel_content extends Base_Controller {

   
    function __construct(){
        parent::__construct(array(
            'table'=>'panel_contents',
            'view_dir'=>'panel_content'
        ));
    }

    function get($id)
    {
        $data['content'] = $this->panel_contents_model->_get($id);
       
        $this->_template("get",$data,'golfpass');
    }
}