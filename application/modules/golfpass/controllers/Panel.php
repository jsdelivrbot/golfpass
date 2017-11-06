<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panel extends Base_Controller {

   
    function __construct(){
        parent::__construct(array(
            'table'=>'panels',
            'view_dir'=>'panel'
        ));
        $this->per_page = 2;
    }
    function get($id)
    {
        $data['panel'] = $this->{$this->model}->_get($id);
    }
    public function getst(){
        $data = array();
        //total rows count
        $totalRec = count($this->post->getRows());
        
        //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    =site_url('posts/ajaxPaginationData');
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        // $config['link_func']   = 'searchFilter';
        $this->ajax_pagination->initialize($config);
        
        //get the posts data
        $data['posts'] = $this->post->getRows(array('limit'=>$this->perPage));
        
        //load the view
        $this->load->view('posts/index', $data);
    }
    function gets()
    {
        $this->load->library(array("Ajax_pagination"=>"ajax_pgi_1"));
        $this->load->library(array("Ajax_pagination"=>"ajax_pgi_2"));
        
        $num_rows = $this->db->count_all_results("panels");
        $config['target']      = '.ajax_taget_panel_list';
        $config['base_url']    =site_url(golfpass_panel_uri.'/ajax_pgi_panels');
        $config['total_rows']  =$num_rows;
        $config['per_page']    = $this->per_page;
        $config['link_func']    = "get_data_1";
        $this->ajax_pgi_1->initialize($config);
        $data['panels'] = $this->db->limit($this->per_page,0)->get("panels")->result();

        $num_rows = $this->db->count_all_results("panel_contents");
        $config['target']      = '.ajax_taget_content_list';
        $config['base_url']    =site_url(golfpass_panel_uri.'/ajax_pgi_contents');
        $config['total_rows']  =$num_rows;
        $config['per_page']    = $this->per_page;
        $config['link_func']    = "get_data_2";
        $this->ajax_pgi_2->initialize($config);
        
        $this->load->model("panel_contents_model");
        $this->db->limit($this->per_page,0);
        $data['panel_contents'] =$this->panel_contents_model->gets();
        // $data['panel_contents'] = $this->db->limit($this->per_page,0)->get("panel_contents")->result();

        // var_dump($data['panels']);
        // $this->_template("gets",$data,'golfpass');
        $this->_view("gets",$data);

 
    }
    function ajax_pgi_panels()
    {
        $this->load->library(array("Ajax_pagination"=>"ajax_pgi_1"));
        $offset = $this->input->post('page');
        if(!$offset)
            $offset= 0;
        $num_rows = $this->db->count_all_results("panels");
        $config['target']      = '.ajax_taget_panel_list';
        $config['base_url']    =site_url(golfpass_panel_uri.'/ajax_pgi_panels');
        $config['total_rows']  =$num_rows;
        $config['per_page']    = $this->per_page;
        $config['link_func']    = "get_data_1";
        $this->ajax_pgi_1->initialize($config);
        $data['panels'] = $this->db->limit($this->per_page,$offset)->get("panels")->result();

        $this->_view("ajax_pgi_panels",$data);
    }
    function ajax_pgi_contents()
    {
        $this->load->library(array("Ajax_pagination"=>"ajax_pgi_2"));
        $offset = $this->input->post('page');
        if(!$offset)
            $offset= 0;
        $num_rows = $this->db->count_all_results("panel_contents");
        $config['target']      = '.ajax_taget_content_list';
        $config['base_url']    =site_url(golfpass_panel_uri.'/ajax_pgi_contents');
        $config['total_rows']  =$num_rows;
        $config['per_page']    = $this->per_page;
        $config['link_func']    = "get_data_2";
        $this->ajax_pgi_2->initialize($config);

        $this->load->model("panel_contents_model");
        $this->db->limit($this->per_page,$offset);
        $data['panel_contents'] =$this->panel_contents_model->gets();
      
        // $data['panel_contents'] = $this->db->limit($this->per_page,$offset)->get("panel_contents")->result();

        $this->_view("ajax_pgi_contents",$data);
    }

    // function gets()
    // {

        
    //     // $data['panels'] = $this->{$this->model}->_gets_with_pgi(null,'style_1');
    //     $data['panels'] = $this->{$this->model}->_gets();
    //     $this->_template("gets",$data,'golfpass');
    // }

    // function add()
    // {
    //     $this->_set_rules();
    //     if($this->fv->run() === false)
    //     {
    //         $data['panel']  = (object)array();
    //         $data['mode'] = "add";
    //         $this->_template("admin_addUpdate",$data);
    //         return;
    //     }
    //     else
    //     {
    //         parent::_dbSet_addUpdate();
    //         // $this->_dbSet_addUpdate();
    //         $insert_id =$this->{$this->model}->_add();
    //         my_redirect(panel_uri."/update/$insert_id");
    //         // my_redirect($_SERVER['HTTP_REFERER']);
    //         return;
    //     }
    // }

    // function update($id)
    // {
    //     parent::_set_rules();
    //     // $this->_set_rules();
    //     if($this->fv->run() === false)
    //     {
    //         $data['panel']  = $this->{$this->model}->_get($id);
    //         $data['mode'] = "update/$id";
    //         $this->_template("admin_addUpdate",$data);
    //         return;
    //     }
    //     else
    //     {
    //         parent::_dbSet_addUpdate();
    //         // $this->_dbSet_addUpdate();
    //         $this->{$this->model}->_update($id);
    //         // my_redirect(panel_uri."/update/$insert_id");
    //         my_redirect(panel_uri."/get/$id");
    //         // my_redirect($_SERVER['HTTP_REFERER']);
    //         return;
    //     }
    // }
    // function delete($id)
    // {
    //     $this->{$this->model}->_delete($id);
    //     my_redirect(panel_uri."/gets");
    //     // my_redirect($_SERVER['HTTP_REFERER']);
    // }
    // function ajax_add(){
    //     header("Content-Type:application/json");

    //     parent::_set_rules();
    //      // $this->_set_rules();
    //     if($this->fv->run() === false)
    //     {
    //         $data['alert'] =  validation_errors(false,false);

    //     }
    //     else
    //     {
    //         parent::_dbSet_addUpdate();
    //         // $this->_dbSet_addUpdate();
    //         $insert_id =$this->{$this->model}->_add();
    //         $data['alert'] ="완료";
    //         $data['reload'] =true;
    //     }
    //     echo json_encode($data);
    //     return;
    // }


    // public function ajax_delete($id)
    // {
    //     header("content-type:application/json");
    //     $this->{$this->model}->_delete($id);

    //     $data = array("reload"=>true);
    //     echo json_encode($data);
    //     return;
    // }
    // function _set_rules()
    // {
    //     $this->fv->set_rules("name","이름","required");
    // }

    // function _dbSet_addUpdate()
    // {
    //     $this->db->set("name",$this->input->post("name"));
    // }
}