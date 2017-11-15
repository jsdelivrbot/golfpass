<?php defined('BASEPATH') OR exit('no direct script access allrowed');

// function remove_duplication_querystring($in_querystring){
//     $data= array("guest_order");
//     if(strpos($in_querystring,"?") !== false)
//     {
//         foreach($data as $value){
//             if( strpos($current_url,"&guest_order=true") > -1){
//                 $current_url = str_replace( "&guest_order=true", "",$current_url);
//             }else if(strpos($current_url,"guest_order=true") > -1 ){
//                 $current_url = str_replace( "guest_order=true", "",$current_url);
//             }
//         }
      
//      }else
//      {
//         $querystring='';
//         parse_str($in_querystring, $arr_queryString);
//         foreach($arr_queryString as $key=>$value)
//         {
//             if($key !== 'guest_order')
//                 $querystring .= "$key=$value&";
//         }
//         $querystring =substr($querystring,0, strlen($querystring)-1);
//     }
//     return $querystring;
    
// }

function domain_url($uri =''){
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $domainName = $_SERVER['HTTP_HOST'];
    return $protocol . $domainName.$uri;
}

function my_current_url()
{
    $current_url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

    if( strpos($current_url,"&guest_order=true") > -1){
        $current_url = str_replace( "&guest_order=true", "",$current_url);
    }else if(strpos($current_url,"guest_order=true") > -1 ){
        $current_url = str_replace( "guest_order=true", "",$current_url);
    }
    return $current_url;
}
function my_site_url2($uri,$sw_querystring = true){
    
        if(($startIdx =strpos($uri,"?")) === false){
           $querystring = $_SERVER['QUERY_STRING'];
        }else{
            $startIdx += 1;
            $length = strlen($uri) - $startIdx;
            $tmp_querystring =substr($uri,$startIdx,$length);
            parse_str($tmp_querystring, $arr_queryString);
            $arr_queryString;
            $querystring ='';
            $menu_sw = false;
            foreach($_GET as $key=>$value){
                $sw =true;
               
                foreach($arr_queryString as $key2=>$value2){
                    if($key == $key2 || $menu_sw){
                        $sw = false;
                    }
                }
            
                if($sw){  // 중복되지않고 해당 key가 없을떄
                    $querystring .= "$key=$value&";
                }
    
                // if($key2 === 'menu_id' || $key2 === 'menu_top_id' || $key === 'menu_id' || $key === 'menu_top_id'){
                //     $menu_sw =true;
                // }
            }
            $querystring =substr($querystring,0, strlen($querystring)-1);
        }
        return $querystring;
    }
function my_site_url($uri,$sw_querystring = true){

    if(($startIdx =strpos($uri,"?")) === false){
       $querystring = $_SERVER['QUERY_STRING'];
    }else{
        $startIdx += 1;
        $length = strlen($uri) - $startIdx;
        $tmp_querystring =substr($uri,$startIdx,$length);
        parse_str($tmp_querystring, $arr_queryString);
        $arr_queryString;
        $querystring ='';
       
      
        foreach($_GET as $key=>$value){
            $sw =true;
          
            foreach($arr_queryString as $key2=>$value2){
                if($key === 'menu_id' || $key === 'menu_top_id'){
                    $sw = false;
                    break;
                }
                if( $key == $key2){
                    $sw = false;
                    break;
                }
            }
          
            if($sw){  // 중복되지않고 해당 key가 없을떄
                $querystring .= "$key=$value&";
            }
           
        }
        $querystring =substr($querystring,0, strlen($querystring)-1);
    }
    $url =$_SERVER['SCRIPT_NAME'];
    $url .= $uri;
    if($sw_querystring && $querystring !== ""){
        if(strpos($uri,'?') > -1){
            $url .= "&";
        }
        else{
            $url .= "?"; 
        }
        $url .=$querystring;
    }
    return $url;
}

