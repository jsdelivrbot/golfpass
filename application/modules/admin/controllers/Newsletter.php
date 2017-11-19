<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Newsletter extends Admin_Controller {

    function __construct(){
        parent::__construct(array(
            'view_dir'=>'admin/newsletter'
        ));
    }
  
    public function gets(){
        $this->db->from("newsLetter");
        $data['rows']=$this->db->get()->result();

        $this->_template("gets",$data);

    }

}