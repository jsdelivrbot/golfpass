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
         function style_semantic($config){

            $config [ 'full_tag_open'] = '<div class="ui pagination menu">';
            $config [ 'full_tag_close'] = '</div>';
            
            $config['first_link'] = "";
            $config [ 'first_tag_open'] = '<li id="">';
            $config [ 'first_tag_close'] = '</li>';
    
            $config [ 'last_link'] = "";
            // $config [ 'last_link'] =false;
            $config [ 'last_tag_open'] = '<li id="hotel-results-pagination-next">';
            $config [ 'last_tag_close'] = '</li>';
    
            $config [ 'prev_link'] = false;
            $config [ 'next_link'] = false;
            
            $config['attributes'] = array('class' => 'item');

            $config [ 'cur_tag_open'] = '<span class="active item">';
            $config [ 'cur_tag_close'] = '</span>';
            // $config [ 'num_tag_open'] = '<span class="item">';
            // $config [ 'num_tag_close'] = '</span>'; 
            return $config;
        }
        
        function style_zap($config){

            $config [ 'full_tag_open'] = '<ul class="pagination">';
            $config [ 'full_tag_close'] = '</ul>';
            
            // $config['first_link'] = "";
            $config['first_link'] = false;
            // $config [ 'first_tag_open'] = '<li id="">';
            // $config [ 'first_tag_close'] = '</li>';
    
            // $config [ 'last_link'] = "";
            $config [ 'last_link'] =false;
            // $config [ 'last_tag_open'] = '<li id="hotel-results-pagination-next">';
            // $config [ 'last_tag_close'] = '</li>';
    
            $config [ 'prev_link'] = "<i class='fa fa-angle-left'></i>";
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';
            $config [ 'next_link'] = "<i class='fa fa-angle-right'></i>";
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';
            
            $config [ 'cur_tag_open'] = '<li><a style="background-color:#8ece6a ; border-color:#8ece6a ;color:white ">';
            $config [ 'cur_tag_close'] = '</a></li>';
            $config [ 'num_tag_open'] = '<li>';
            $config [ 'num_tag_close'] = '</li>'; 
            return $config;
        }
        function style_golfpass($config){

            $config [ 'full_tag_open'] = '<article id="tp-panel-article" class="tp-container-fluid"><section id="tp-content-boxs" class="tp-ajax_taget_content_list tp-row tp-justify-content-center"><div class="tp-col-12 tp-d-flex tp-justify-content-center tp-align-items-center tp-pagination" style="padding:0;">';
            $config [ 'full_tag_close'] = '</div></section></article>';
            
            $config['first_link'] = false;
            // $config [ 'first_tag_open'] = '<div class="test">';
            // $config [ 'first_tag_close'] = '</div>';
    
            // $config [ 'last_link'] = "";
            $config [ 'last_link'] =false;
            // $config [ 'last_tag_open'] = '<li id="hotel-results-pagination-next">';
            // $config [ 'last_tag_close'] = '</li>';
    
    
            $config [ 'prev_link'] = '<i class="xi xi-angle-left-min"></i> ';
            $config['prev_tag_open'] = '<div class="next">';
            $config['prev_tag_close'] = '</div><ul class="tp-d-flex tp-list-unstyled tp-justify-content-center tp-mb-0">';
            $config [ 'next_link'] = ' <i class="xi xi-angle-right-min"></i> ';
            $config['next_tag_open'] = '</ul> <div class="next">';
            $config['next_tag_close'] = '</div>';
    
            $config [ 'cur_tag_open'] = '<li class="tp-current"><a>';
            $config [ 'cur_tag_close'] = '</a></li>';
            $config [ 'num_tag_open'] = '<li>';
            $config [ 'num_tag_close'] = '</li>'; 
            return $config;
        }

        // public function get($total_rows,$style,$per_page=10,$num_link=5){
        public function get($in_config){
            $config['total_rows'] = isset($in_config['total_rows']) ? $in_config['total_rows'] : null;
            $config['per_page'] = 10;
            $config['num_links'] = 3;
            // $config['num_links'] = 1;

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