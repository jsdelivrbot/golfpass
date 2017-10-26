<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends Admin_Controller {
    private $position;
    function __construct(){
        parent::__construct(array(
            'table'=>'base/menus',
            'view_dir'=>'admin/menu'
        ));

        $this->position = $this->input->get('position');
    }
    public function _recursive_tree($menu_parent){
        $data['id'] = $id = $menu_parent->id;
        $data['parent_id'] =$menu_parent->parent_id;
        $data['name'] = $name =$menu_parent->name;
        $data['uri'] =$menu_parent->uri;
        $menu_childs = $this->db->query("SELECT * FROM $this->table WHERE parent_id= '$id' ORDER BY `order` ASC")->result();
        if(count($menu_childs) ==0){
            return (object)$data;
        }else{
            $data['childs'] = array();
            for($i=0; $i< count($menu_childs); $i++){
                array_push($data['childs'],$this->_recursive_tree($menu_childs[$i]));
            }
        }
        return (object)$data;
        
    }
    public function gets(){
        $this->load->database();
        
        //select from menus
        $menus=array();
        $menus_tmp = $this->db->query("SELECT * FROM $this->table WHERE parent_id= '0' ORDER BY `order` ASC")->result();
        
        for($i=0; $i< count($menus_tmp); $i++){
            array_push($menus,$this->_recursive_tree($menus_tmp[$i]));
        }
    
        //view
        $data = array('menus'=>$menus);
         
        $this->_template("gets",$data);
         
    }
    public function add($parent_id=0){
        $this->_set_rules(null);

        if(!$this->fv->run()){
            $boards = $this->db->query("SELECT * FROM boards")->result();
            $pages = $this->db->query("SELECT * FROM pages")->result();
            $menu= (object)array('parent_id'=>$parent_id,'order'=>'1');
            $data = array(
                "mode"=>"add/$parent_id",
                'menu'=>$menu,
                "boards"=>$boards,
                "pages"=>$pages
            );
            $this->_template("addUpdate",$data);
             
        }else{
            $this->_dbSet_addUpdate();
            $this->menus_model->add();
            my_redirect(admin_menu_uri."/gets");
        }
    }
    
    public function update($id){

        $this->_set_rules($id);
       
        if(!$this->fv->run()){
            $boards = $this->db->query("SELECT * FROM boards")->result();
            $pages = $this->db->query("SELECT * FROM pages")->result();
            $menu =$this->db->query("SELECT * FROM $this->table WHERE id = $id")->row();
            $data = array('mode'=>"update/$id",
            'menu'=>$menu,
            'boards'=>$boards,
            "pages"=>$pages
            );
             
            $this->_template("addUpdate",$data);
             
        }else{
            $this->_dbSet_addUpdate();
            $this->menus_model->update($id);
            
            my_redirect(admin_menu_uri."/gets");
        }
    }

    public function _dbSet_addUpdate(){
        $this->menus_model->set_by_obj(array(
          'position'=>$this->position,
          'parent_id'=>$this->input->post('parent_id'),
          'name'=>$this->input->post('name'),
          'uri'=>$this->input->post('uri'),
          'order'=>$this->input->post('order')
        ));
    }
    public function _set_rules($id =null){
        if($id !== null) define('rules_arg',$id);
        $this->fv->set_rules('parent_id','상속 메뉴 아이디',array('required',
            array('상속될 메뉴 존재하지 않음.',function($str){
                if($str == '0') return true;
                $row =$this->db->query("SELECT id FROM $this->table WHERE id = '$str'")->row();
                if($row == null) return false;
                return true;
            }),
            array('자기자신을 상속할수 없음',function($str){
                if(defined('rules_arg')){
                    if(rules_arg === $str){
                    return false;
                }
                }
                return true;
            })
         ));
        // $this->fv->set_rules('name','메뉴 이름','required');
        $this->fv->set_rules('order','순서 이름','required');
    }

    public function _recursive_tree_delete($id){
        $parent =$this->db->where('id',$id)->get($this->table)->row();
        $this->db->where('id',$id)->delete($this->table);
        $childs = $this->db->where('parent_id',$parent->id)->get($this->table)->result();

        if(count($childs) !== 0){
            for($i = 0 ; $i < count($childs) ; $i++){
                $this->_recursive_tree_delete($childs[$i]->id);
            }
        }
        return ;
    }
    public function delete($id){
        $this->_recursive_tree_delete($id);
        // $this->db->where('id', $id);
        // $this->db->delete($this->table);
        my_redirect(admin_menu_uri."/gets");
        return;
    }
}