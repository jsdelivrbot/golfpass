
<?php defined('BASEPATH') OR exit('no direct script access allrowed');

if(!function_exists('get_merchant_code')){
    function get_merchant_code($merchant_uid){
        if(strpos($merchant_uid,"merchant") > -1){
            $merchant_uid = substr($merchant_uid,9, strlen($merchant_uid)-9);
        }
        return $merchant_uid;
    }
}
if(!function_exists('get_merchant_uid')){
    function get_merchant_uid($merchant_uid){
        $merchant_uid = "merchant_{$merchant_uid}";
        return $merchant_uid;
    }
}


if(!function_exists('get_pay_method_enum')){
    function get_pay_method_enum($data){
        
        if($data === 'vbank')
            $result = '가상계좌';
        else if($data === 'card')
            $result = '카드';
        else if($data === 'bank')
            $result = '무통장';
        else
            $result = '알수없음';
        
        return $result;
    }
}

if(!function_exists('get_status_enum')){
    function get_status_enum($data){
        
        if($data === 'confirm')
            $result = '결제확인';
        else if($data === 'ready')
            $result = '미결제';
        else if($data === 'try')
            $result = '결제시도';
        else if($data === 'paid')
            $result = '결제완료';
        else if($data === 'fail')
            $result = '실패';
        else if($data === 'user_cancel')
            $result = '취소함';
        else if($data === 'request_refend')
            $result = '환불 요청중';
        else if($data === 'confirm_refend')
            $result = '환불 완료';
        else if($data === 'reject_refend')
            $result = '환불 요청 실패';
        else
            $result = "알수없음";
        return $result;
    }
}