<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PatchNote extends Admin_Controller {

    function __construct(){
        parent::__construct(array(
            'view_dir'=>'admin/patchNote'
        ));
    }
    
    function gets()
    {
    
        $data['notes'] = array(
            (object)array("id"=>"1","title"=>"패칯노트1", "desc"=>"")
        );
        $this->_template("gets",$data);
    }
    function get(string $id ="1")
    { 
        
        
    }

}
 
