<?php defined('BASEPATH') OR exit('no direct script access allrowed');

class Panels_Model extends Board_Model{
    function __construct(){
        parent:: __construct('panels');
    }

    // function set_select()
    // {
    //     $this->db->select("p.*");
    // }
    // function set_from()
    // {
    //     $this->db->from("$this->table as p");
    //     // $this->db->join("","","");
    // }
    // function gets()
    // {
    //     $this->set_select();
    //     $this->set_from();
    //     return $this->_gets();
    // }
    

    // function gets_with_pgi($where_obj,$pgi_style)
    // {

    //     return parent::_gets_with_pgi_func(
    //         $pgi_style,
    //         function() use ($where_obj)
    //         {   
    //             $this->_where_by_obj($where_obj);
    //             return $this->_get_num_rows();
    //         },
    //         function($offset,$per_page) use($where_obj) 
    //         {
    //             $this->_where_by_obj($where_obj);
    //             return $this->gets();
    //         }
    //     );
    // }
}