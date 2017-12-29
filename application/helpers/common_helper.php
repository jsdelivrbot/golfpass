<?php defined('BASEPATH') OR exit('no direct script access allrowed');



if(!function_exists('string_for')){
    function string_for($str,$count){
        $out_str ='';
        for($i=0 ; $i <$count ;$i++)
        {
            $out_str.=$str;
        }
        return $out_str;
    }
}



if(!function_exists('check_auth')){
    function check_auth($auth,$message,$redirect_uri,$return_url = '',$user_id=null){
        $ci = &get_instance();
        $user_auth =  $ci->session->userdata('auth');
        if($auth !== '0' && !$ci->session->userdata('is_login')){
            alert("로그인해주세요.");
            if($return_url ==='')
                my_redirect("/user/login?return_url=".rawurlencode(my_current_url()),false);
            else 
                my_redirect("/user/login?return_url=".rawurlencode($return_url."?".$_SERVER['QUERY_STRING']),false);
            exit; 
        }

        if( admin_auth <$user_auth &&  $auth > $user_auth  && $user_id !== $ci->session->userdata('user_id')){
            alert($message);
            my_redirect($redirect_uri);
            exit;
        }
        
    }
}

if(!function_exists('check_auth_update_delete')){
    function check_auth_update_delete($user_id,$message,$redirect_uri,$return_url = ''){
        $ci = &get_instance();
        if(!$ci->session->userdata('is_login')){
            alert("로그인해주세요.");
            if($return_url ==='')
                my_redirect("/user/login?return_url=".rawurlencode(my_current_url()),false);
            else 
                my_redirect("/user/login?return_url=".rawurlencode($return_url),false);
            exit; 
        }else if(admin_auth !== $ci->session->userdata('auth') && $user_id !== $ci->session->userdata('user_id')){
            alert($message);
            my_redirect($redirect_uri);
            exit;
        }
        
    }
}




if(!function_exists('set_custom')){
    function set_active(string $names,string $targets,string $str){
        $ci = &get_instance();
        $names = explode (",",$names);
        $targets = explode (",",$targets);
        if(count($names) !== count($targets)) return "#111";
        for ($i=0; $i < count($names); $i++) { 
            $value =$ci->input->get_post($names[$i]);
            if($value === null) return "";
            if($targets[$i] !== $value) return "#222";
        }
        return $str;
    }
}


if(!function_exists('set_value_data')){
    function set_value_data($obj,$name){
        if(isset($_POST[$name])){
            return $_POST[$name];
        }else if(!property_exists($obj,$name) ){
            return '';
        }else{
            return $obj->$name;
        }
    }
}


if(!function_exists('get_duble_digit')){
    function get_duble_digit($n){
        $n=(string)$n;
        if(strlen($n) === 1){
            return "0$n";
        }else if (strlen($n) === 2){
            return $n;
        }else{
            false;
        }
    }
}

if(!function_exists('my_set_value')){
    function my_set_value($val,$method){
        if($method=='GET') return isset($_GET[$val]) ? $_GET[$val] : '';
        else if($method=='POST') return isset($_POST[$val]) ? $_POST[$val] : '';
    }
}

if(!function_exists('my_set_checked')){
    function my_set_checked($obj, $name,$value){
        $value = (string)$value;
        if(isset($_POST[$name]) && $_POST[$name]  === $value){
            return "checked";
        }else if(!isset($_POST[$name]) && !property_exists($obj,$name) ){
            return '';
        }else if(!isset($_POST[$name]) && property_exists($obj,$name) && $value === $obj->$name){
            return "checked";
        }

    }
}

if(!function_exists('my_set_checked_arr')){
    function my_set_checked_arr($rows,$key,$value){
        foreach($rows as $row)
        {
            if($row->$key ===$value)
            {
                echo "checked";
                break;
            }
        }
    }
}


if(!function_exists('my_set_selected')){
    function my_set_selected($obj, $name,$value){
        $value = (string)$value;
        if(isset($_POST[$name]) && $_POST[$name]  === $value){
            return "selected";
        }
        else if(isset($_GET[$name]) && urldecode($_GET[$name])  === $value)
        {
            return "selected";
        }
        else if(is_string($obj) && $obj === $value)
        {
            return "selected";
        }
        else if( $obj === null){
            return '';
        }
        else if(!isset($_POST[$name]) && !property_exists($obj,$name)){
            return '';
        }
        else if(!isset($_POST[$name]) && property_exists($obj,$name) && $value === $obj->$name){
            return "selected";
        }
      

    }
}


if(!function_exists('getAge')){
    function getAge($birth){
        $birthYear = substr($birth,0,4);
        $age =Date('Y') - $birthYear+1;
        return $age;
    }
}

if(!function_exists('get_expiredDays')){
    function get_expiredDays($start,$end){
         $start=strtotime($start);
         $end = strtotime($end);
         $datediff =$end - $start;
       $datediff = floor($datediff / (60 * 60 * 24));
        return $datediff;
     
    }
}

if(!function_exists('alert_validationErrors')){
    function alert_validationErrors(){
        if(!empty(validation_errors())){
           echo "<script>alert('". preg_replace( "/\r|\n/", "", validation_errors(false,"\\n") )."'); </script>";
        }
    }
}

if(!function_exists('alert')){
    function alert($msg){
        ?> <script>alert('<?=$msg?>')</script><?php
    }
}

if(!function_exists('my_date_format')){
    function my_date_format(){
        for ( $a = 0; $a < func_num_args(); $a++ )
            $args[] = func_get_arg($a);

        if(func_num_args()==3){
            $strDate =(new DateTime($args[0]."-".$args[1]."-".$args[2]))->format("Y-m-d");
        }
        return $strDate;
    }
}

if(!function_exists('intdiv')){
    function intdiv($dividend ,$divisor ){
        if($dividend == 0 || $divisor ==0){
            return 0;
        }else{
            return floor($dividend / $divisor);
        }
    }
}


if(!function_exists('get_time')){
    function get_time() {
        list($usec, $sec) = explode(" ", microtime());
        return ((float)$usec + (float)$sec);
    }
}
if(!function_exists('check_isset_zero')){
    function check_isset_zero($data) {
        if(isset($data) && $data !== 0)
        {
            return true;
        }
        return false;
    }
}

