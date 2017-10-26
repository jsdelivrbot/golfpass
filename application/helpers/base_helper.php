<?php defined('BASEPATH') OR exit('no direct script access allrowed');
if(!function_exists('get_file_list')){
    function get_file_list($dir){
        $list = array();
        if ($handle = opendir($dir)) {
            
            while (false !== ($entry = readdir($handle))) {
        
                if ($entry != "." && $entry != "..") {
        
                    array_push($list ,$entry);
                }
            }
        
            closedir($handle);
        }
        return $list;
    }
}
if(!function_exists('load_view')){
    function load_view($view){
        if(!isset($view) || $view === null)
            return false;
        $ci =& get_instance();
        if(!is_array($view))
        {
            $ci->load->view($view);
        }
        else
        {
            foreach($view as $v)
            {
                $ci->load->view($v);
            }
            
        }
    }
}

if(!function_exists('get_menu_view_data')){
    function get_menu_view_data(){
        //메뉴 데이터
        $ci = & get_instance();
        $ci->load->model("base/menus_model");
        $menus=$ci->menus_model->gets_menus('메인메뉴');
        $menus_top=$ci->menus_model->gets_menus('상단메뉴');
        $sub_menus = $ci->menus_model->gets_sub_menus("메인메뉴");
        $querystr_name = "메인메뉴";
        if(count($sub_menus) ===0)
        {
            $querystr_name = "상단메뉴";
            $sub_menus = $ci->menus_model->gets_sub_menus("상단메뉴");
        }

        //메뉴 스킨 데이터
        $menu_skin = count($menus) !==0 ? $ci->menus_model->get(array('name'=>'메인메뉴'))->skin : 'basic';
        $menu_top_skin = count($menus_top) !==0 ? $ci->menus_model->get(array('name'=>'상단메뉴'))->skin :'basic';
        $sub_menu_skin =  count($sub_menus) !==0 ?$ci->menus_model->get(array('id'=>$ci->input->get($querystr_name)))->skin : 'basic';
        $menu_skin = $menu_skin ?? 'basic';
        $menu_top_skin = $menu_top_skin ?? 'basic';
        $sub_menu_skin = $sub_menu_skin ?? 'basic';


        //메뉴 데이터
        $data['menus'] = $menus;
        $data['menus_top'] = $menus_top;
        $data['sub_menus'] = $sub_menus;


        // $data['sidebar_view'] =  $data['sidebar_view'] ?? null;
        // $data['content_view'] =  $data['content_view'] ?? null;
        // $data['menu_top_view'] =  $data['menu_top_view'] ?? null;

        //메뉴 뷰 데이터
        $data['menu_view'] =  "template/menu/$menu_skin";
        $data['menu_top_view'] = "template/menu_top/$menu_top_skin";
        $data['sub_menu_view'] =  "template/sub_menu/$sub_menu_skin";

        return $data;
    }
}
if(!function_exists('get_view_data')){
    function get_view_data($view,$view_dir){
        if(is_array($view))
        {
            if(isset($view['content_view'])){
                foreach($view as $key=>$val)
                {
                    if(is_array($val))
                    {
                        $tmp_view = array();
                        foreach($val as $v)
                        {
                            if(strpos($v,'/') === false)
                            {
                                $v = "$view_dir/$v"; 
                            }
                            array_push($tmp_view,$v);
                        }
                        $data[$key] = $tmp_view;
                    }
                    else
                    {
                        if(strpos($val,'/') === false)
                        {
                            $val = "$view_dir/$val"; 
                        }
                        $data[$key] = $val;
                    }
                }
            }
            else
            {
                
                $content_view = array();
                foreach($view as $v){
                    if(strpos($v,'/') === false)
                    {
                        $v = "$view_dir/$v"; 
                    }
                    array_push($content_view,$v);
                }
                $data["content_view"] = $content_view;
            }
        }
        else
        {
            if(strpos($view,'/') === false)
            {
                $view = "$view_dir/$view"; 
            }
            $data["content_view"]= $view;
        }

        return $data;
    }
}

