<?php defined('BASEPATH') OR exit('no direct script access allrowed');

class Menus_Model extends Public_Model{
    function __construct(){
        parent:: __construct('menus');
    }
    
    function gets_menus($menu_name)
    {
        $this->db->select("id,is_display_to_login, parent_id ,name,if(instr(uri,'?') >= 1, concat(uri,'&','$menu_name=',id),concat(uri,'?','$menu_name=',id) ) AS uri");
        $this->db->from("menus");
        $this->db->where('parent_id',"(SELECT `id` FROM `menus` WHERE `name` = '$menu_name' limit 0,1)",false);
        $menus = $this->db->get()->result();

        return $menus;
    }
    function gets_sub_menus($menu_name)
    {
        $menu_id= $this->input->get("$menu_name");
        if($menu_id !== null)
        {
            $this->db->select("*, if(instr(uri,'?') >= 1, concat(uri,'&','$menu_name=',parent_id),concat(uri,'?','$menu_name=',parent_id) ) AS uri");
            $this->db->from("menus");
            $this->db->where('parent_id',$menu_id);
            $sub_menus = $this->db->get()->result();
        }
        else
        {
            $sub_menus = null; 
        }
        return $sub_menus;
    }
}