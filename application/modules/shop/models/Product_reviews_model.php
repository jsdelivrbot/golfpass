<?php defined('BASEPATH') OR exit('no direct script access allrowed');

class Product_reviews_Model extends Board_Model{
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
        $row_nums =$this->products_model->_get($product_id,array("reviews_count"))->reviews_count;
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
        $this->db->select("p.name as product_name,r.* ,if(r.user_id = 0, r.guest_name, u.name) 'user_name', if(r.user_id = 0, '손님', u.userName) 'userName'");
        $this->db->from("$this->table AS r");
        $this->db->join("users AS u","r.user_id = u.id","LEFT");
        $this->db->join("products AS p","r.product_id = p.id","LEFT");
        $this->db->where('r.id',"$id");
        $content = $this->db->get()->row();
        return $content;
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
            $total_rows =$this->products_model->_get_count(null,'reviews_count');
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
            $total_rows =$this->products_model->_get_count(array('id'=>$product_id),'reviews_count');
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
    

    function gets_with_pgi($where_obj,$config=null)
    {
        $style = $config['style'] ?? 'style_golfpass';
        $by_user =$config['by_user'] ?? false;
        if($by_user)
        {
            $count_table=null;
        }
        else
        {
            $count_table = function() use($where_obj)
            {
                $this->load->model("shop/products_model");
                // return 1;
                return $this->products_model->_get($where_obj['product_id'],array('reviews_count'))->reviews_count;
            };
        }
        
        return $reviews = $this->_gets_with_pgi_func(
            $style,
            function() use($where_obj)
            {
                // return 1;
                return count($this->gets($where_obj));
            },
            function($offset,$per_page) use($where_obj) 
            {
                $this->db->limit($per_page,$offset);
                return $this->gets($where_obj);
            },
            $count_table
            ,
            array("per_page"=>6)
        );
    }
    public function gets($where_obj =null,$select_arr =false,$limit=null)
    {
        $this->db->order_by("id","desc");
        $select_query = '';
        // $select_query .= ",CASE DAYOFWEEK(r.created)
        // WHEN '1' THEN '일요일'
        // WHEN '2' THEN '월요일'
        // WHEN '3' THEN '화요일'
        // WHEN '4' THEN '수요일'
        // WHEN '5' THEN '목요일'
        // WHEN '6' THEN '금요일'
        // WHEN '7' THEN '토요일'
        // END AS week";
        $select_query.= ",YEAR(r.created) as year";
        $select_query.= ",DATE_FORMAT(r.created,'%m') as month";
        $select_query.= ",DATE_FORMAT(r.created,'%d') as day";
        // $select_query.= ",DATE_FORMAT(r.created,'%p') as when";
        $select_query .= ",CASE DATE_FORMAT(r.created,'%p')
        WHEN 'AM' THEN '오전'
        WHEN 'PM' THEN '오후'
        END AS ampm";
        // $select_query.= ",DATE_FORMAT(r.created,'%k') as hour";
        $select_query.= ",IF(DATE_FORMAT(r.created,'%k')>12, DATE_FORMAT(r.created,'%k') -12 , DATE_FORMAT(r.created,'%k')) as hour";
        $select_query.= ",DATE_FORMAT(r.created,'%i') as min";

        $this->db->select("r.*,r.id, r.title, r.desc, r.created , (score_1+score_2+score_3+score_4+score_5+score_6+score_7+score_8)/8 'avg_score' ,if(r.user_id = 0, r.guest_name, u.name) 'user_name', if(r.user_id = 0, '손님', u.userName) 'userName'".$select_query);
        
        $this->db->from('product_reviews as r');
        $this->db->join("users AS u","r.user_id = u.id","LEFT");
        // $this->db->where("u.kind",'general');
        $this->db->where("r.is_display",'1');
        $rows = parent::_gets($where_obj,$select_arr,$limit);

        return $rows;
    }
    function add($set_obj =false){
        $product_id = $set_obj['product_id'];
        $id = parent::_add($set_obj);

        $review=parent::_get($id,array('is_display','is_secret','product_id'));
        $is_display=$review->is_display;
        $is_secret=$review->is_secret;
        $product_id = $review->product_id;
        if($is_display === '1'){
            $this->load->model("shop/products_model");
            $this->products_model->_count_plus(array('id'=>$product_id),'reviews_count');
        }
        return $id;
    }
  
    function delete($where,$product_id =false)
    {
        $row =parent::_get($where,array('is_display','product_id','is_secret'));
        $is_display=$row->is_display;
        $is_secret=$row->is_secret;
        $product_id = $row->product_id;
        $where =parent::_delete($where);
        
        if($is_display === '1'){
            $this->load->model("shop/products_model");
            $this->products_model->_count_minus(array('id'=>$product_id),'reviews_count');
        }
    }

    
    
    function update($where_obj,$set_obj =null,$escape = true)
    {
        $row =parent::_get($where_obj, array('is_display','is_secret'));
        $before_is_display = $row->is_display;
        $before_is_secret = $row->is_secret;

        parent::_update($where_obj,$set_obj,$escape);
        $row =parent::_get($where_obj,array('is_display','product_id','is_secret'));
        $is_display = $row->is_display;
        $is_secret = $row->is_secret;
        $product_id = $row->product_id;
        if($before_is_display === '0'  && $is_display === '1' )
        {
            $this->load->model("shop/products_model");
            $this->products_model->_count_plus(array('id'=>$product_id),'reviews_count');
        }else if($before_is_display === '1' && $is_display === '0')
        {
            $this->load->model("shop/products_model");
            $this->products_model->_count_minus(array('id'=>$product_id),'reviews_count');
        }
    }
}