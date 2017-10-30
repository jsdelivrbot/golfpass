<?php defined('BASEPATH') or exit('no direct script access allrowed');

class Categories_Model extends Public_Model
{
    function __construct()
    {
        parent:: __construct('product_categories');
    }
    
    function gets()
    {
        $categories=array();
        $deep=0;
        $categories_tmp = $this->db->query("SELECT *, $deep as deep FROM $this->table WHERE parent_id= '0'")->result();

        for ($i=0; $i< count($categories_tmp); $i++) {
            array_push($categories, $this->_recursive_tree($categories_tmp[$i]), $deep);
        }

        return $categories;
    }

    public function _recursive($parent,$deep){
        $data= array();
        for($i=0; $i <count($parent) ; $i++){
            $tmp_data =$parent[$i];
            $tmp_data->deep = (string)$deep;
            array_push($data ,$tmp_data);

            // $childs = $this->db->query("SELECT * FROM $this->table WHERE parent_id= '{$parent[$i]->id}'")->result();
            $childs =$this->db->select("*")->from("$this->table")->where('parent_id',$parent[$i]->id)->order_by("sort","asc")
            ->get()->result();
            
            if(count($childs) !==0){
                $data = array_merge($data,$this->_recursive($childs,$deep+1)) ;
            }
            
        }
        return $data;
    }

    function gets_by_recursive()
    {
            // $rows =$this->db->query("SELECT * FROM $this->table WHERE parent_id= '0'")->result();   
        $rows =$this->db->select("*")->from("$this->table")->where('parent_id','0')->order_by("sort","asc")
        ->get()->result();

        $rows =$this->_recursive($rows,0);
        return $rows;
    }


}
