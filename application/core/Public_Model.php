<?php defined('BASEPATH') OR exit('no direct script access allrowed');


class Public_Model extends CI_Model{
    public $table;
    function __construct($table=null){
        parent:: __construct();
        $this->table = $table;
    }
    public function _add($set_obj =false){
        if($set_obj !== false && $set_obj !== null){
            $this->_set_by_obj($set_obj);
        }
        $this->db->set('created','NOW()',false);
        $this->db->insert($this->table);
        $id =$this->db->insert_id();
        return $id;
    }
    public function _update($where_obj=null,$set_obj =null,$escape = true)
    {
        if($set_obj !== null)
        {
            $this->_set_by_obj($set_obj,$escape);
        }
        $this->_where_by_obj($where_obj);

        $this->db->update($this->table);
    }

    
    public function _get($where_obj=null,$select_arr =false){
        if($where_obj !== null)
            $this->_where_by_obj($where_obj);
        if($select_arr !== false)
            $this->_select_by_arr($select_arr);
    
        if(strpos($this->db->get_compiled_select(null,false), 'FROM') > -1)
        {
            $row =$this->db->get()->row();
        }   
        else
        {
            $row =$this->db->get($this->table)->row();
        }
      
        return $row;
    }
    public function _gets($where_obj =null,$select_arr =false,$limit=null)
    {

        if(!$where_obj !== null)
            $this->_where_by_obj($where_obj);
        if($select_arr !== false && $select_arr !== null)
            $this->_select_by_arr($select_arr);
        if($limit !== null)
            $this->db->limit($limit[1],$limit[0]);
            
        if(strpos($this->db->get_compiled_select(null,false), 'FROM') > -1)
        {
            $rows =$this->db->get()->result();
        }   
        else
        {
            $rows =$this->db->get($this->table)->result();
        }
        
       
        return $rows;
    }
    public function _delete($where_obj){
        $this->_where_by_obj($where_obj);
        $this->db->delete($this->table);
        return $where_obj;
    }
    public function _get_max_id($table,$column_name){
        $row =$this->db->query("SELECT MAX($column_name) 'max_id' FROM $table")->row();
        return ($row != null) ? ($row->max_id +1) : 1;
    }

    public function _hits_plus($id){
		$this->db->query("UPDATE `{$this->table}` SET hits = hits+1 WHERE id = '$id'");
    }
    
    public function _set_by_obj($set_obj,$escape=true){
        if($set_obj !== null && $set_obj !== false)
        {
            foreach($set_obj as $key=>$val)
            {
                if($val !== false && $val !== null)
                    $this->db->set($key, $val,$escape);
            }
        }
        
    }
    public function _select_by_arr($select_arr =false){
        if($select_arr !== false && $select_arr !==null && is_array($select_arr)){
            $select_str = '';
            foreach($select_arr as $val){
                $select_str .= "$val,";
            }
            $select_str = substr($select_str,0,-1);
            $this->db->select($select_str);
        }
        return;

    }
    public function _where_by_obj($where_obj){
        if($where_obj === null || $where_obj === false)
        {
            return;
        }
        if(is_array( $where_obj )){
            foreach($where_obj as $key=>$val){
                if($val === false || $val === null)
                    $val ='';
                $this->db->where($key, $val);
            }
        }else{
            $this->db->where('id',$where_obj);
        }
    }
    
    function _get_count($where_obj=null, $count_name){

        if($where_obj ===null)
        {
            $this->db->select("sum($count_name) '$count_name'");
        }else
        {
            $this->_where_by_obj($where_obj);
            $this->db->select($count_name);
        }
        
        $count= $this->db->get($this->table)->row()->$count_name;
        return $count;
    }
    function _count_plus($where_obj,$count_name = 'count'){
        $this->_where_by_obj($where_obj);

        $this->db->set($count_name,"{$count_name}+1",false);
        $this->db->update($this->table);
    }
    
    function _count_minus($where_obj,$count_name = 'count'){
        $this->_where_by_obj($where_obj);

        $this->db->set($count_name,"{$count_name}-1",false);
        $this->db->update($this->table);
    }

    function _like_or_by_split($fields,$val)
    {
        if(isset($fields) && $fields !== null && $fields !== '')
        {
            $fields = urldecode($fields);
            $arr_field =explode(",",$fields);
            foreach($arr_field as $field)
            {
                $this->db->or_like($field, $val);       
            }
      }
      return;
   
    }

    function _get_num_rows()
    {
        return $this->db->count_all_results($this->table);
    }

    function set_select()
    {
        $this->db->select("p.*");
    }
}



