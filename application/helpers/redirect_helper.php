<?php defined('BASEPATH') OR exit('no direct script access allrowed');

if(!function_exists('msg_redirect')){
    function msg_redirect($msg, $uri){
        $source = "<script>alert('$msg'); window.location.href ='/index.php$uri';</script>";
        echo $source;
        exit;
    }
    
}

if(!function_exists('my_redirect')){
    function my_redirect($uri,$sw_querystring = true){

        // if(strpos($uri,"http") > -1){
        //     header('Location: '.$uri, TRUE, null);
        //     exit;
        // }
       $domain = domain_url();
        if(strpos($uri,"http") > -1){
            $uri =str_replace("$domain/index.php","",$uri);
            $source = "<script>window.location.href ='/index.php$uri';</script>";
            echo $source;
            exit;
        }
        if(($startIdx =strpos($uri,"?")) > -1){
            $startIdx += 1;
            $length = strlen($uri) - $startIdx;
            $tmp_querystring =substr($uri,$startIdx,$length);
            parse_str($tmp_querystring, $arr_queryString);
            $arr_queryString;
            $querystring ='';
           
            foreach($_GET as $key=>$value){
                $sw =true;
                foreach($arr_queryString as $key2=>$value2){
                    if($key == $key2){
                        $sw = false;
                    }
                }
                if($sw){
                    $querystring .= "$key=$value&";
                }
            }
            
            $querystring =substr($querystring,0, strlen($querystring)-1);
    
        }else{
            $querystring = $_SERVER['QUERY_STRING'];
        }


        if($sw_querystring && $_SERVER['QUERY_STRING'] !== ""){
            if(!strpos($uri,'?')){
                $uri .= "?";
            }
            else{
                $uri .= "&";
            }
            $uri .=$querystring ;
        }
        $source = "<script>window.location.href ='/index.php$uri';</script>";
        echo $source;
        exit;
    }
}

if(!function_exists('redirect_return_url')){
    function redirect_return_url($url){
        if(!isset($_GET['return_url']) || $_GET['return_url'] === ''){
            my_redirect("");
            exit;
        }else{
            $return_url = $_GET['return_url'];
            redirect($return_url);
            exit;
        }
        // var_dump($return_url);
    }
}