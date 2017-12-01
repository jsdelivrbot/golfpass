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
    function ajax_option_update($id)
    {
        header("content-type:application/json");
        $row =$this->db->from("product_option")->where("id",$id)->get()->row();
        if($row === null)
        {
            parent::_dbset_addUpdate();
            $this->db->insert("product_option");
            $data['alert'] = "추가되었습니다";
        }
        else
        {
            parent::_dbset_addUpdate();
            $this->db->where("id",$id);
            $this->db->update("product_option");
        }
            $data['reload'] =true;
            echo json_encode($data);
        return ;
    }
  


    function upload_photo()
    {
        $this->load->module("base/common");
        $this->common->_multi_upload_photo('admin','photo',function($imgDir){
            $this->db->set("product_id",$this->input->post('product_id'));
            $this->db->set("name",$imgDir);
            $this->db->set("kind","photo");
            $this->db->insert("product_option");
           
        },
        null,
        function(){
             my_redirect($_SERVER['HTTP_REFERER']);
        });   
        // $this->common->_upload_photo('admin','photo',function($imgDir){
        //     $this->db->set("product_id",$this->input->post('product_id'));
        //     $this->db->set("sort",$this->input->post('sort'));
        //     $this->db->set("name",$imgDir);
        //     $this->db->set("kind","photo");
        //     $this->db->insert("product_option");
        //     // my_redirect($_SERVER['HTTP_REFERER']);
        // });
        
    }
    function option_delete($id,$kind)
    {
        $this->db->where('id',$id);
        $this->db->where('kind',$kind);
        $this->db->delete('product_option');
        my_redirect($_SERVER['HTTP_REFERER']);
    }
    function ajax_option_delete($id,$kind)
    {
        header("content-type:application/json");
        $this->load->model("shop/product_option_model");

        
        $row=$this->product_option_model->_get($id);
        if($row->kind ==="photo")
        {
            $dir =$row->name;
            $dir=substr($dir,1,strlen($dir));
            unlink($dir);

        }

        $this->db->where('id',$id);
        $this->db->where('kind',$kind);
        $this->db->delete('product_option');
        $data['reload'] =true;
        echo json_encode($data);
        return ;
    }
    function ajax_option_add($kind)
    {
        header("content-type:application/json");
        
        $product_id = $this->input->post("product_id");
        $name = $this->input->post("name");

        $this->db->where("product_id", $product_id);
        $this->db->where("name", $name);
        $this->db->where("kind", $kind);
        $row = $this->db->get("product_option")->row();

        // if($row !== null){
        //     $data['alert'] = "이미존재합니다";
        //     $data['reload'] =true;
        //     echo json_encode($data);
        //     return;
        // }

        $this->db->set("name",$name);
        $this->db->set("kind",$kind);
        $this->db->set("product_id",$product_id);
        $this->db->set("option_1",$this->input->post("option_1"));
        $this->db->set("price",$this->input->post("price"));
        $this->db->set("sort",$this->input->post("sort"));
        $this->db->insert("product_option");

        $data['reload'] =true;
        echo json_encode($data);
        return ;
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
    function ajax_options_reset()
    {
        header("content-type:application/json");
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
        $data = array("reload"=>true);
        echo json_encode($data);
        return;
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
            'style_pgi'=>'style_semantic'
        ));
        $offset = $pgiData['offset'];
        $per_page = $pgiData['per_page'];
        
        //select from products
        $field = $this->input->post('field');
        if($field) $this->db->like($field, $this->input->post('value'));
        $this->db->order_by('id','desc');
        $data['products'] = $this->db->select("p.* , left(p.desc,10) as 'desc'")
        ->from("{$this->table} as p")
        ->limit($per_page,$offset)
        ->get()
        ->result();
        // $products = $this->db->get($this->table, $per_page, $offset)->result();

        //view
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

    function ajax_update($id)
    {
        header("content-type:application/json");

        $this->_set_rules();
        if(!$this->fv->run()){

            $data['alert'] =  validation_errors(false,false);
             
        }else{
            parent::_dbSet_addUpdate();
            $this->products_model->_update($id);
        }
        $data['reload'] =true;
        echo json_encode($data);
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
            $data['main_options'] = $this->db->query("SELECT * FROM product_option WHERE product_id = $id AND kind = 'main_option' ORDER BY sort ASC")->result();
            $data['hole_options'] = $this->db->query("SELECT * FROM product_option WHERE product_id = $id AND kind = 'hole_option' ORDER BY sort ASC")->result();
            $data['options'] = $this->db->query("SELECT * FROM product_option WHERE product_id = $id AND kind = 'option'")->result();
            $data['descs'] = $this->db->query("SELECT * FROM product_option WHERE product_id = $id AND kind = 'desc' ORDER BY sort ASC")->result();
            $data['photos'] = $this->db->query("SELECT * FROM product_option WHERE product_id = $id AND kind = 'photo' ORDER BY sort ASC")->result();
            $data['mode'] = "update/$id";
            
            $setting =$this->db->from("setting")->where("id","1")->get()->row();
            $p_options = $setting->p_options;
            $p_options =explode(",",$p_options); 
            $data['p_options'] = $p_options;
            $this->load->library("map_api");
            $this->map_api->api_key = $this->setting->google_map_api_key;

            $this->_template("addUpdate",$data);
             
        }else{
            
            parent::_dbSet_addUpdate();
            $this->products_model->_update($id);
            // alert('수정 되었습니다.');
            my_redirect(admin_product_uri."/update/$id");
        }
    }
    public function _set_rules(){
        $this->fv->set_rules('name','상품명','required');
        // $this->fv->set_rules('desc','상품 설명','required');
    }

    // public function _dbSet_addUpdate(){
    //     $this->products_model->_set_by_obj(array(
    //         "name"=>$this->input->post('name'),
    //         "desc"=>$this->input->post('desc'),
    //         "price"=>$this->input->post('price')
    //     ));
    // }

    public function delete($id){
        $this->load->model("admin/products_model");
        $this->products_model->delete($id);
        my_redirect(admin_product_uri.'/gets');
    }
    
 

}