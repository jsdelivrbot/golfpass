<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends Admin_Controller {
    function __construct(){
        parent::__construct(array(
            'table'=>'shop/products',
            'view_dir'=>'admin/product'
        ));
    }

    function option_update($id)
    {
        parent::_dbset_addUpdate();
        $this->db->where("id",$id);
        $this->db->update("product_option");
        my_redirect($_SERVER['HTTP_REFERER']);
    }
    function upload_photo()
    {
        $this->load->module("common");
        $this->common->upload_photo('admin',function($imgDir){
            $this->db->set("product_id",$this->input->post('product_id'));
            $this->db->set("sort",$this->input->post('sort'));
            $this->db->set("name",$imgDir);
            $this->db->set("kind","photo");
            $this->db->insert("product_option");
            alert("업로드 완료");
            my_redirect($_SERVER['HTTP_REFERER']);
        });
        
    }
    function option_delete($id,$kind)
    {
        $this->db->where('id',$id);
        $this->db->where('kind',$kind);
        $this->db->delete('product_option');
        my_redirect($_SERVER['HTTP_REFERER']);
    }
    function option_add($kind)
    {
        $product_id = $this->input->post("product_id");
        $name = $this->input->post("name");

        $this->db->where("product_id", $product_id);
        $this->db->where("name", $name);
        $this->db->where("kind", $kind);
        $row = $this->db->get("product_option")->row();

        if($row !== null){
            alert("이미 존재합니다.");
            my_redirect($_SERVER['HTTP_REFERER']);
            return;
        }

        $this->db->set("name",$name);
        $this->db->set("kind",$kind);
        $this->db->set("product_id",$product_id);
        $this->db->set("sort",$this->input->post("sort"));
        $this->db->set("kind","desc");
        $this->db->insert("product_option");

        alert("상품설명 추가완료");
        my_redirect($_SERVER['HTTP_REFERER']);
    }   
    function options_reset()
    {
        //모두 삭제하고
        $product_id = $this->input->post("product_id");
        $this->db->where("product_id", $product_id);
        $this->db->where("kind", 'option');
        $this->db->delete("product_option");

        //다시추가
        $arr_option = $this->input->post("option");
        if(is_array($arr_option))
            foreach($arr_option as $val)
            {
                $this->db->set("name",$val);
                $this->db->set("product_id",$product_id);
                $this->db->set("kind","option");
                $this->db->insert("product_option");
            }   
        alert("옵션 수정완료");
        my_redirect($_SERVER['HTTP_REFERER']);
    }
    // public function gets()
    // {
    //     $products = $this->products_model->_gets();

    //     $data = array('products' => $products);
    //      
    //      $this->_template("gets",$data);
    //      

    // }


	public function gets()
    {
        $this->load->database();

        //get totoal_rows
        $field = $this->input->post('field');
        if($field) $this->db->like($field, $this->input->post('value'));
        $total_rows= $this->db->count_all_results($this->table);

        //get pagination
        $this->load->library('pagination');
        $pgiData =$this->pagination->get(array(
            'total_rows'=>$total_rows,
            'style_pgi'=>'style_1'
        ));
        $offset = $pgiData['offset'];
        $per_page = $pgiData['per_page'];
        
        //select from products
        $field = $this->input->post('field');
        if($field) $this->db->like($field, $this->input->post('value'));
        $this->db->order_by('id','desc');
        $products = $this->db->select("p.*")
        ->from("{$this->table} as p")
        ->limit($per_page,$offset)
        ->get()
        ->result();
        // $products = $this->db->get($this->table, $per_page, $offset)->result();

        //view
        $data = array('products' => $products);
         
         $this->_template("gets",$data);
         
    }
   
    public function _recursive_tree($parent){
        $data['id'] = $id = $parent->id;
        $data['parent_id'] =$parent->parent_id;
        $data['name'] = $name =$parent->name;
        $childs = $this->db->query("SELECT * FROM product_categories WHERE parent_id= '$id'")->result();
        if(count($childs) ==0){
            return (object)$data;
        }else{
            $data['childs'] = array();
            for($i=0; $i< count($childs); $i++){
                array_push($data['childs'],$this->_recursive_tree($childs[$i]));
            }
        }
        return (object)$data;
        
    }
    public function add(){

        // $this->load->model('product_categories_model');
        // $categories =$this->product_categories_model->_gets();

        $this->_set_rules();

        if(!$this->fv->run()){
            $product= (object)array();
             //select from categories
            $categories=array();
            $categories_tmp = $this->db->query("SELECT * FROM product_categories WHERE parent_id= '0'")->result();
            for($i=0; $i< count($categories_tmp); $i++){
                array_push($categories,$this->_recursive_tree($categories_tmp[$i]));
            }

            $data = array("mode"=>"add",'product'=>$product,'categories'=>$categories);
             
             $this->_template("addUpdate",$data);
             
        }else{
            $this->_dbSet_addUpdate();
            $inert_id=$this->products_model->_add();
            my_redirect(admin_product_uri."/update/$inert_id");
        }
    }

    public function update($id){
        $this->_set_rules();
        if(!$this->fv->run()){
            $this->load->model("shop/product_categories_model");
            $this->load->model("shop/p_hotel_model");
            $data['product'] =$this->db->where('id',$id)->get($this->table)->row();
            $data['categories'] = $this->product_categories_model->gets_by_recursive_tree(); 
            $data['product_categories'] = $this->product_categories_model->gets_by_product_id($id);
            $data['p_ref_hotel'] = $this->p_hotel_model->gets_by_product_id($id);
            $data['hotels'] = $this->p_hotel_model->_gets();
            $data['options'] = $this->db->query("SELECT * FROM product_option WHERE product_id = $id AND kind = 'option'")->result();
            $data['descs'] = $this->db->query("SELECT * FROM product_option WHERE product_id = $id AND kind = 'desc' ORDER BY sort ASC")->result();
            $data['photos'] = $this->db->query("SELECT * FROM product_option WHERE product_id = $id AND kind = 'photo' ORDER BY sort ASC")->result();
            $data['mode'] = "update/$id";
            
             $this->_template("addUpdate",$data);
             
        }else{
            
            $this->_dbSet_addUpdate();
            $this->products_model->update($id);
            alert('수정 되었습니다.');
            my_redirect(admin_product_uri."/update/$id");
        }
    }
    public function _set_rules(){
        $this->fv->set_rules('name','상품명','required');
        $this->fv->set_rules('desc','상품 설명','required');
    }

    // public function _dbSet_addUpdate(){
    //     $this->products_model->_set_by_obj(array(
    //         "name"=>$this->input->post('name'),
    //         "desc"=>$this->input->post('desc'),
    //         "price"=>$this->input->post('price')
    //     ));
    // }

    public function delete($id){
        $this->products_model->delete($id);
        my_redirect(admin_product_uri.'/gets');
    }
    
 

}