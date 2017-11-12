<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class MY_Pagination extends CI_Pagination {
    
        public function __construct($config = array())
        {
                parent::__construct($config);
        }

        function getConfig(){
          
       
            $config['use_page_numbers'] = false;
            $config['page_query_string'] = TRUE;
            $config['query_string_segment'] = 'offset';
            
            $ci = & get_instance();
            $uriCount= $ci->uri->total_segments();
            $config['base_url'] = 'http://'.$_SERVER['HTTP_HOST']."/index.php";
            for($i=1 ; $i<= $uriCount; $i++){
                $segment =$ci->uri->segment($i);
                    $config['base_url']  .="/$segment";
            }
           
    
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
        function style_1($config){
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
        function style_hotel($config){

            $config [ 'full_tag_open'] = '<ol id="hotel-results-pagination" class="hotel-results-pagination">';
            $config [ 'full_tag_close'] = '</ol>';
            
            $config['first_link'] = "";
            $config [ 'first_tag_open'] = '<li id="hotel-results-pagination-next">';
            $config [ 'first_tag_close'] = '</li>';
    
            $config [ 'last_link'] = "";
            // $config [ 'last_link'] =false;
            $config [ 'last_tag_open'] = '<li id="hotel-results-pagination-next">';
            $config [ 'last_tag_close'] = '</li>';
    
            $config [ 'prev_link'] = false;
            $config [ 'next_link'] = false;
    
            $config [ 'cur_tag_open'] = '<li class="selected"><a href="#">';
            $config [ 'cur_tag_close'] = '</a></li>';
            $config [ 'num_tag_open'] = '<li class="">';
            $config [ 'num_tag_close'] = '</li>'; 
            return $config;
        }
        function style_golfpass($config){

            $config [ 'full_tag_open'] = '<ul class="d-flex list-unstyled justify-content-center mb-0">';
            $config [ 'full_tag_close'] = '</ul>';
            
            $config['first_link'] = "";
            $config [ 'first_tag_open'] = '<li id="hotel-results-pagination-next">';
            $config [ 'first_tag_close'] = '</li>';
    
            $config [ 'last_link'] = "";
            // $config [ 'last_link'] =false;
            $config [ 'last_tag_open'] = '<li id="hotel-results-pagination-next">';
            $config [ 'last_tag_close'] = '</li>';
    
            $config [ 'prev_link'] = false;
            $config [ 'next_link'] = false;
    
            $config [ 'cur_tag_open'] = '<li class="current"><a>';
            $config [ 'cur_tag_close'] = '</a></li>';
            $config [ 'num_tag_open'] = '<li>';
            $config [ 'num_tag_close'] = '</li>'; 
            return $config;
        }

        // public function get($total_rows,$style,$per_page=10,$num_link=5){
        public function get($in_config){
            $config['total_rows'] = isset($in_config['total_rows']) ? $in_config['total_rows'] : null;
            $config['per_page'] = 5;
            $config['num_links'] = 3;

            $style_pgi = isset($in_config['style_pgi']) ? $in_config['style_pgi'] : 'style_1';
            $config +=$this->getConfig();
            $config = $this->$style_pgi($config);

           if(isset($in_config['per_page']) && $in_config['per_page'] !== null)
                $config['per_page'] =$in_config['per_page'];
           if(isset($in_config['num_links']) && $in_config['num_links'] !== null)
                $config['num_links'] =$in_config['num_links'];
            $this->initialize($config);

            $offset = isset($_GET['offset']) ? $_GET['offset']: 0;
            $per_page = $config['per_page'];
            return array('offset'=>$offset,'per_page'=>$per_page);
         }
}