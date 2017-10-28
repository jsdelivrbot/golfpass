<?php defined('BASEPATH') OR exit('no direct script access allrowed');

class Users_Model extends Board_Model{
    
    function __construct(){
        parent:: __construct('users');
    }
   
    function gets_with_pgi($where_obj,$pgi_style)
    {
        
        return parent::_gets_with_pgi(
            $pgi_style,
            function() use($where_obj)
            {   
                $this->_where_by_obj($where_obj);
                return $this->get_num_rows();
            },
            function($offset,$per_page) use($where_obj) 
            {
                $this->_where_by_obj($where_obj);
                $this->db->limit($per_page,$offset);
                return $this->gets();
            }
        );
    }

    function gets()
    {
        $this->db->from("$this->table as u");
        return $this->db->get()->result();
    }

    function get_num_rows()
    {
        $this->db->from("$this->table as u");
        return $this->db->count_all_results();
    }
  
}
