<?php defined('BASEPATH') OR exit('no direct script access allrowed');


class Board_Model extends Public_Model{
    function __construct($table){
        parent:: __construct($table);
    }


    function _gets_with_pgi($pgi_style,$get_num_rows_func , $get_rows_func,$is_count_field = false)
    {
        if($get_num_rows_func === null)
            $get_num_rows_func = function()
            {
                $this->db->select("count(*) as num_rows");
                return $this->db->get($this->table)->row()->num_rows;
            };
        $this->load->library('pagination');
        //get totoal_rows
        $field = $this->input->get('field');
        if($field !== null && $field !== '')//검색 true
        {
            $this->_like_or_by_split($field,$this->input->get('value'));
            $total_rows = $get_num_rows_func();
        }
        else if($is_count_field === false)
        {
            $total_rows = $get_num_rows_func();
        }
        else if($is_count_field !== false)
        {
            $total_rows =$is_count_field();
        }

        //get pagination
        $pgiData =$this->pagination->get(array(
            'total_rows'=>$total_rows,
            'style_pgi'=>$pgi_style
        ));
        $offset = $pgiData['offset'];
        $per_page = $pgiData['per_page'];
        
        //select from board_$id's contents
        $this->_like_or_by_split($field,$this->input->get('value'));
        $rows =$get_rows_func($offset,$per_page);
        return $rows;
    }
}