<?php defined('BASEPATH') OR exit('no direct script access allrowed');

if(!function_exists('golfpass_sort')){
    function golfpass_sort($rows){
        $ci = &Public_Controller::$instance;
        $sort_type = $ci->input->get_post('sort_type');
        $sort_value = $ci->input->get_post('sort_value');
        function my_sort($a,$b)
        { 
            $sort_value = $_GET["sort_value"] ?? "created";
            $sort_type = $_GET["sort_type"] ?? "desc";
         if ($a->$sort_value==$b->$sort_value) return 0;
         if($sort_type === "asc")
         {
             return ($a->$sort_value<$b->$sort_value)?-1:1;
         }
         else if ($sort_type === "desc")
         {
            return ($a->$sort_value>$b->$sort_value)?-1:1;
         }
        }
        usort($rows,"my_sort");
            return $rows;
    }
}
if(!function_exists('getClassName_inDailyPriceAdmin')){
    function getClassName_inDailyPriceAdmin($price){
        if($price === null) //값이 존재하지 않을경우
        {
            return "white";
        }
        else if($price === 0) //주말??머였지?
        {
            return "yellow";
        }
        else if($price ===  _cal_apply_exchangeRate_to_price(1)) //휴장일일 경우
        {
            return "red";
        }
        else // 값이 있는경우
        {
            return "green";
        }
    }
}

if(!function_exists('_cal_apply_exchangeRate_to_price')){
    function _cal_apply_exchangeRate_to_price($price){
        $ci = &Public_Controller::$instance;
        $exchange_rate = (float)$ci->setting->exchange_rate;
        $price = (float)$price;
        $price = round(($price * $exchange_rate));
        return (string)$price;
    }
}
if(!function_exists('_cal_apply_margin_to_price')){
    function _cal_apply_margin_to_price($price,$num_people =1){
        $ci = &Public_Controller::$instance;
        $margin = (float)$ci->setting->margin;
        $price = (float)$price;
        $price = $price+ ($margin* $num_people);
        return (string)$price;
    }
}
if(!function_exists('_cal_apply_exchangeRate_and_margin_to_price')){
    function _cal_apply_exchangeRate_and_margin_to_price($price,$num_people =1){
        if($price === "0")
        {
            return "2인 플레이 불가";
        }
        else if($price === "1")
        {
            return "상담 요망";
        }
        $price = _cal_apply_exchangeRate_to_price($price);
        $price =_cal_apply_margin_to_price($price,$num_people);
        return (string)$price;
    }
}
function my_number_format($stirng)
{
    if(is_numeric( $stirng) ===false)
    {
        return $stirng;
    }

    $result =number_format($stirng)."원부터";
    return $result;
}