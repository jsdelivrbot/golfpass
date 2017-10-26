<?php defined('BASEPATH') OR exit('no direct script access allrowed');

class Boards_Model extends Public_Model{
    function __construct(){
        parent:: __construct('boards');
    }
    function get_contents_count_by_skin($skin)
    {
        $this->db->select("sum(contents_count) contents_count");
        $this->db->where('skin',$skin);
        $contents_count=$this->db->get($this->table)->row()->contents_count;

        return $contents_count;
    }

    function add($set_obj =false)
    {
        $insert_id=parent::add($set_obj);
        $board  = $this->get($insert_id,array('id,is_linked_with_product'));

        if($board->is_linked_with_product === '1')
        {
            $field_name ="{$board->id}_count";
            $this->db->query("ALTER TABLE `products` ADD `$field_name` INT NOT NULL ");
        }
        return $insert_id;
    }
    function delete($where_obj)
    {
        $board=$this->get($where_obj,array('id','is_linked_with_product'));
        if($board->is_linked_with_product === '1')
        {
            $field_name = "{$board->id}_count";
            $this->db->query("ALTER TABLE `products` DROP `$field_name`;");
        }
        parent::delete($where_obj);
        return $where_obj;
    }
    function update($where_obj,$set_obj =null,$escape = true)
    {
        parent::update($where_obj,$set_obj,$escape);
        $board=$this->get($where_obj,array('id','is_linked_with_product'));
        $field_name = "{$board->id}_count";

        $fields_arr=$this->db->list_fields('products');
        if($board->is_linked_with_product === '0' && in_array($field_name,$fields_arr))
        {
            $this->db->query("ALTER TABLE `products` DROP `$field_name`;");
        }
        else if($board->is_linked_with_product === '1' && !in_array($field_name,$fields_arr))
        {
            $this->db->query("ALTER TABLE `products` ADD `$field_name` INT NOT NULL ");
        }
    }
}