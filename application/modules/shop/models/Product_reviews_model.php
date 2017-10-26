<?php defined('BASEPATH') OR exit('no direct script access allrowed');

class Product_reviews_Model extends Public_Model{
    function __construct(){
        parent:: __construct('product_reviews');
    }

    function gets_with_ajax_pgi($config)
    {
        $product_id =$config['product_id'];
        $target = $config['target'];
        $base_url = $config['base_url'];
        $offset = isset($config['offset'])? $config['offset'] : 0;
        

        $this->load->model('shop/products_model');
        $row_nums =$this->products_model->get($product_id,array("reviews_count"))->reviews_count;
        $per_page = 2;
        
        $config_pgi['id'] = $product_id;
        $config_pgi['target']      = $target;
        $config_pgi['base_url']    = $base_url;
        $config_pgi['total_rows']  = $row_nums;
        $config_pgi['per_page']    = $per_page;

        $this->ajax_pagination->initialize($config_pgi);
        
        //get the posts data
        $this->db->order_by('r.id','desc');
        $this->db->where('r.is_display','1');
        $rows = $this->gets(null,null,array($offset,$per_page));
        
        return $rows;

    }
    function get_reveiw($id)
    {
        $this->db->select("r.is_display,r.id, r.title, r.desc, r.created ,if(r.user_id = 0, r.guest_name, u.name) 'user_name', if(r.user_id = 0, '손님', u.userName) 'userName'");
        $this->db->from("$this->table AS r");
        $this->db->join("users AS u","r.user_id = u.id","LEFT");
        $this->db->where('r.id',"$id");
        $content = $this->db->get()->row();
        return $content;
    }

    function gets_by_user_id_with_pgi($config)
    {
        $ci = Public_Controller::$instance;

        $pgi_style =  isset($config['pgi_style']) ?  $config['pgi_style'] : 'style_1';
        $this->load->library('pagination');
        //get totoal_rows
        $field = $this->input->get('field');
    
        if($field !== null)//검색 true
        {
            $this->like_or_by_split($field,$this->input->get('value'));
            $this->db->join("users as u","r.user_id = u.id","LEFT");
        }
        $this->db->select('count(*) as rows_num');
        $this->db->from("$this->table as r");
        $this->db->where('r.is_display','1');
        $this->db->where('r.user_id',$ci->user->id);
        $total_rows= $this->db->get()->row()->rows_num;
        
        //get pagination
        $pgiData =$this->pagination->get(array(
            'total_rows'=>$total_rows,
            'style_pgi'=>$pgi_style
        ));
        $offset = $pgiData['offset'];
        $per_page = $pgiData['per_page'];
        
        //select from board_$id's contents
        $field = $this->input->get('field');
        if($field)
            $this->like_or_by_split($field,$this->input->get('value'));
        $this->db->order_by('id','desc');
        $this->db->limit($per_page,$offset);
        $this->db->where('r.user_id',$ci->user->id);
        $this->db->where('r.is_display','1');

       
        $rows=$this->gets();
        return $rows;
    }
    function gets_with_pagination_in_admin($config)
    {
        $pgi_style =  isset($config['pgi_style']) ?  $config['pgi_style'] : 'style_1';

        $this->load->library('pagination');
        //get totoal_rows
        $field = $this->input->get('field');
        if($field !== null)//검색 true
        {
            $this->db->like($field, $this->input->get('value'));
            $this->db->select("count(*) as nums_row");
            $this->db->from('product_reviews as r');
            $this->db->join("users AS u","r.user_id = u.id","LEFT");
            $this->db->join("products AS p","r.product_id = p.id","LEFT");
            $total_rows= $this->db->get()->row()->nums_row;
        }
        else
        {
            $this->load->model("shop/products_model");
            $total_rows =$this->products_model->get_count(null,'reviews_count');
            $no_display_rows = $this->db->query("SELECT count(*)'rows_num' FROM $this->table WHERE is_display = '0'")->row()->rows_num;
            $total_rows  = (int)$total_rows  + (int)$no_display_rows;
            $total_rows =(string)$total_rows;
           
        }
        //get pagination
        $pgiData =$this->pagination->get(array(
            'total_rows'=>$total_rows,
            'style_pgi'=>$pgi_style
        ));
        $offset = $pgiData['offset'];
        $per_page = $pgiData['per_page'];
        
        //select from board_$id's contents
        $field = $this->input->get('field');
        if($field)
            $this->db->like($field, $this->input->get('value'));
        $this->db->order_by('id','desc');
        $this->db->limit($per_page,$offset);

        $this->db->select("p.id 'product_id',p.name 'product_name',r.is_display, r.id, r.title, r.desc, r.created ,if(r.user_id = 0, r.guest_name, u.name) 'user_name', if(r.user_id = 0, '손님', u.userName) 'userName'");
        $this->db->from('product_reviews as r');
        $this->db->join("users AS u","r.user_id = u.id","LEFT");
        $this->db->join("products AS p","r.product_id = p.id","LEFT");
        
        $rows = $this->db->get()->result();

        return $rows;

    }
    function gets_with_pagination($config)
    {
     
        $product_id =  isset($config['product_id']) ?  $config['product_id'] : null;
        $pgi_style =  isset($config['pgi_style']) ?  $config['pgi_style'] : 'style_1';
        $this->load->library('pagination');
        //get totoal_rows
        $field = $this->input->get('field');
        if($field !== null)//검색 true
        {
            $this->db->like($field, $this->input->get('value'));
            $this->db->where('is_display','1');
            $this->db->where('product_id',$product_id);
            $total_rows= $this->db->count_all_results($this->table);
        }
        else
        {
            $this->load->model("shop/products_model");
            $total_rows =$this->products_model->get_count(array('id'=>$product_id),'reviews_count');
        }
        //get pagination
        $pgiData =$this->pagination->get(array(
            'total_rows'=>$total_rows,
            'style_pgi'=>$pgi_style
        ));
        $offset = $pgiData['offset'];
        $per_page = $pgiData['per_page'];
        
        //select from board_$id's contents
        $field = $this->input->get('field');
        if($field)
            $this->db->like($field, $this->input->get('value'));
        $this->db->order_by('id','desc');
        $this->db->limit($per_page,$offset);
        $this->db->where("r.product_id",$product_id);
        $this->db->where('r.is_display','1');

        $rows=$this->gets();
        return $rows;
    }
    public function gets($where_obj =null,$select_arr =false,$limit=null)
    {
        $this->db->select("r.id, r.title, r.desc, r.created ,if(r.user_id = 0, r.guest_name, u.name) 'user_name', if(r.user_id = 0, '손님', u.userName) 'userName'");
        $this->db->from('product_reviews as r');
        $this->db->join("users AS u","r.user_id = u.id","LEFT");
        $rows = parent::gets($where_obj,$select_arr,$limit);

        return $rows;
    }
    function add($set_obj =false){
        $product_id = $set_obj['product_id'];
        $id = parent::add($set_obj);

        $is_display=parent::get($id,array('is_display'))->is_display;

        if($is_display === '1'){
            $this->load->model("shop/products_model");
            $this->products_model->count_plus(array('id'=>$product_id),'reviews_count');
        }
        return $id;
    }
  
    function delete($where,$product_id =false)
    {
        $row =parent::get($where,array('is_display','product_id'));
        $is_display=$row->is_display;
        $product_id = $row->product_id;
        $where =parent::delete($where);
        
        if($is_display === '1'){
            $this->load->model("shop/products_model");
            $this->products_model->count_minus(array('id'=>$product_id),'reviews_count');
        }
    }

    
    
    function update_admin($where_obj,$set_obj =null,$escape = true)
    {
        parent::update($where_obj,$set_obj,$escape);
        $row =parent::get($where_obj,array('is_display','product_id'));
        $is_display = $row->is_display;
        $product_id = $row->product_id;
        if($is_display === '1')
        {
            $this->load->model("shop/products_model");
            $this->products_model->count_plus(array('id'=>$product_id),'reviews_count');
        }else if($is_display === '0')
        {
            $this->load->model("shop/products_model");
            $this->products_model->count_minus(array('id'=>$product_id),'reviews_count');
        }
    }
}