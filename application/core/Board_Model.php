<?php defined('BASEPATH') OR exit('no direct script access allrowed');


class Board_Model extends Public_Model{
    function __construct($table){
        parent:: __construct($table);
    }

    ////use this samle function
    // function gets_with_pgi($pgi_style)
    // {
    //     return parent::_gets_with_pgi_func(
    //         $pgi_style,
    //         function()
    //         {   
                
    //         },
    //         function($offset,$per_page) 
    //         {
             
    //         }
    //     );
    // }

    ////use this sample2 function
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
    function _gets_with_pgi_func($pgi_style,$get_num_rows_func , $get_rows_func,$is_count_field = null,$config =array())
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
        else if($is_count_field === null)
        {
            $total_rows = $get_num_rows_func();
        }
        else if($is_count_field !== null)
        {
            $total_rows =$is_count_field();
        }
        $config +=array(
            'total_rows'=>$total_rows,
            'style_pgi'=>$pgi_style,
        );
        //get pagination
        $pgiData =$this->pagination->get($config);
        $offset = $pgiData['offset'];
        $per_page = $pgiData['per_page'];
        
        //select from board_$id's contents
        $this->_like_or_by_split($field,$this->input->get('value'));
        //numrow
        $this->db->select("{$total_rows}-{$offset}-@count 'numrow', @count:=@count+1 'none'");
        $this->db->from("(SELECT @count:=0) der_tap");

        $rows =$get_rows_func($offset,$per_page);
        return $rows;
    }


    function set_select()
    {
        $this->db->select("*");
    }
    function set_from()
    {
        $this->db->from("$this->table");
        // $this->db->join("","","");
    }
    function gets()
    {
        $this->set_select();
        $this->set_from();
        return $this->_gets();
    }
    

    function _gets_with_pgi($where_obj,$pgi_style)
    {

        return $this->_gets_with_pgi_func(
            $pgi_style,
            function() use ($where_obj)
            {   
                parent::_where_by_obj($where_obj);
                // return paren::_get_num_rows();
                return count($this->gets());
            },
            function($offset,$per_page) use($where_obj) 
            {
                parent::_where_by_obj($where_obj);
                $this->db->limit($per_page,$offset);
                //gets()를 재정의해주세요.
                return $this->gets();
            }
        );
    }

    ////샘플
    // function gets_with_pgi($where_obj=null)
    // {
    //     return  $this->_gets_with_pgi_func(
    //         "style_1",
    //         function() use($where_obj)
    //         {
    //             return count($this->gets($where_obj)); //총 rows 갯수//gets함수를 작성해주세요
    //         },
    //         function($offset,$per_page) use($where_obj) 
    //         {
    //             $this->db->limit($per_page,$offset); //보여질 rows값들//gets함수를 작성해주세요
    //             return $this->gets($where_obj);
    //         },
    //         function() use($where_obj) //카운터데이터가 있다면 func, 없다면 null
    //         {
                 
    //             $this->load->model("shop/products_model");
    //             return $this->products_model->_get($where_obj['product_id'],array('reviews_count'))->reviews_count;
    //         }
    //         ,
    //         array("per_page"=>6) //per_page
    //     );
    // }
//    function gets($where_obj =null)
//     {
//         $this->db->select("c.*,p.*")
//         ->from("$this->table as c")
//         ->join("products as p","c.product_id = p.id","LEFT");
//        parent::_where_by_obj($where_obj);
        //  return $this->db->get()->result();

//     }
    
}