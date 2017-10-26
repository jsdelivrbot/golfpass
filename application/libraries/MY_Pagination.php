<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class MY_Pagination extends CI_Pagination {
    
        public function __construct($config = array())
        {
                parent::__construct($config);
        }

        function getConfig($total_rows,$per_page,$num_link){
            $config['total_rows'] =  $total_rows;
            $config['per_page'] = $per_page;
            $config['num_links'] = $num_link;
       
            $config['use_page_numbers'] = false;
            $config['page_query_string'] = TRUE;
            $config['query_string_segment'] = 'offset';
            
            $ci = & get_instance();
            $uriCount= $ci->uri->total_segments();
            $config['base_url'] = 'http://'.$_SERVER['HTTP_HOST']."/index.php";
            for($i=1 ; $i<= $uriCount-1; $i++){
                $segment =$ci->uri->segment($i);
                if($segment != "get")
                    $config['base_url']  .="/$segment";
            }
            $config['base_url']  .="/gets";
    
            $config['first_url'] =  $config['base_url']."?offset=0";
            
            if (count($_GET) > 0){
                $queryStr = "";
                foreach($_GET as $key=>$value){
                    if($key!= "offset") $queryStr .= "&$key=$value";
                }
                $config['suffix'] = $queryStr;
                $config['first_url'] .=  $queryStr;
            } 
          

            return $config;
        }
        function style_1(){
            $config [ 'full_tag_open'] = '<div class="mem_paging">';
            $config [ 'full_tag_close'] = '</div>';
            
            $config['first_link'] = "처음";
            $config [ 'first_tag_open'] = '<span>';
            $config [ 'first_tag_close'] = '</span>';
    
            // $config [ 'last_link'] = "끝";
            $config [ 'last_link'] =false;
            $config [ 'last_tag_open'] = '<span style="margin-left:10px;">';
            $config [ 'last_tag_close'] = '</span>';
    
            $config [ 'prev_link'] = false;
            $config [ 'next_link'] = false;
    
            $config [ 'cur_tag_open'] = '<span class="" style="margin-left:10px;color:pink;">';
            $config [ 'cur_tag_close'] = '</span>';
            $config [ 'num_tag_open'] = '<span class="" style="margin-left:10px;">';
            $config [ 'num_tag_close'] = '</span>'; 
            return $config;
        }

        // public function get($total_rows,$style,$per_page=10,$num_link=5){
        public function get($config){
            $total_rows = isset($config['total_rows']) ? $config['total_rows'] : null;
            $style_pgi = isset($config['style_pgi']) ? $config['style_pgi'] : 'style_1';
            $per_page = isset($config['per_page']) ? $config['per_page'] : 3;
            $num_link = isset($config['num_link']) ? $config['num_link'] : 5;
            
            $config =$this->getConfig($total_rows,$per_page,$num_link);
            $config += $this->$style_pgi();
            $this->initialize($config);

            $offset = isset($_GET['offset']) ? $_GET['offset']: 0;
            $per_page = $config['per_page'];
            return array('offset'=>$offset,'per_page'=>$per_page);
         }
}