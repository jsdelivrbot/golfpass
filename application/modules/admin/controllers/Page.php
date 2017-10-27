<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends Admin_Controller {
    
    function __construct(){
        parent::__construct(array(
            'table'=>'base/pages',
            'view_dir'=>'admin/page'
        ));
    }
   
    public function gets(){
        $pages = $this->db
        ->from($this->table)
        ->order_by("id","desc")
        ->get()
        ->result();

        $data = array("pages"=>$pages);
         
         $this->_template("gets",$data);
         
    }
    public function add(){
        if(parent::_add() === true)
        {
            my_redirect(admin_page_uri."/gets");
        }
                
    }
    public function update($id)
    {
      if(parent::_update($id)===true){
         my_redirect(admin_page_uri."/gets");
      }
    }
    public function ajax_delete($id){
        parent::_ajax_delete($id);
    }
    function _set_rules(){
        $this->fv->set_rules("title","제목","required");
        $this->fv->set_rules("desc","내용","required");
    }
    function _dbset_addUpdate(){
        $this->pages_model->_set_by_obj(array(
          'title'=>$this->input->post("title"),
          'desc'=>$this->input->post("desc")
        ));
        // $this->db->set("keywords",$this->input->post("keywords"));
    }
	
}
