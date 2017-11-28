<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panel_content extends Base_Controller {

   
    function __construct(){
        parent::__construct(array(
            'table'=>'base/board_contents',
            'view_dir'=>'panel_content'
        ));
    }

    function get($id)
    {
        $data['user'] =$this->user;
        $data['content'] = $this->db->select("c.*,u.*, c.created,c.id,u.id 'user_id',u.name 'user_name'")
        ->from("board_contents as c")
        ->join("users as u","c.user_id =u.id","LEFT")
        ->where("c.id",$id)
        ->get()->row();
        // var_dump($data['content']);
        if($this->input->get("search") !== null)
        {
            $data['gets_url'] =  my_site_url(golfpass_panel_content_uri."/gets_by_hash");
        }
        else
        {
            $data['gets_url'] =site_url(golfpass_panel_uri."/gets");
        }
        $this->_template("get",$data,'golfpass2');
    }

    function gets_by_hash($where=null)
    {
        if($this->input->get("search") !== null)
        {
            $where = $this->input->get("search");
        }
        $where = urldecode($where);
        $this->load->model("base/board_contents_model");
        $this->db->or_like("c.hashtag",$where);
        $this->db->or_like("c.title",$where);
        $contents=$this->board_contents_model->gets(array("board_id"=>"1"));
        $num_contents =count($contents);
        // var_dump($contents);
       $contents= $this->board_contents_model->_gets_with_pgi_func(
            "style_zap",
            function() use($num_contents)
            {
                return $num_contents;
            },
            function($offset,$per_page) use($contents)
            {
                return array_slice($contents,$offset,$per_page);
            },
            null,
            array("per_page"=>10,"is_numrow"=>false)
        );

        $this->load->model("shop/products_model");
        $this->db->or_like("p.hashtag",$where);
        $this->db->or_like("p.name",$where);

        $products=$this->products_model->gets_by_ranking('avg_score');
        $num_products =  count($products);
        $data['num_products'] = $num_products;
        $data['num_total'] = $num_products+$num_contents;
    // var_dump($contents);
    $data['panel_contents'] = $contents;
    $data['num_panel_contents'] = $num_contents;
    $data['search'] = $where;
    $this->_template("gets_by_hash",$data,'golfpass2');
    
    }
}