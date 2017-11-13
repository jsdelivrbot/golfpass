<?php


class Map_api
{
    public $api_key;
    public $language = "ko";
    
    function get_address($info)
    {
        return $info->formatted_address;
    }
    function get_location($info)
    {   
        return $info->geometry->location;
    }
    function geocode($address)
    {
        $url ="https://maps.googleapis.com/maps/api/geocode/json?address=";
        $url .= str_replace(" ","+",$address);
        if($this->api_key)
            $url .= "&key={$this->api_key}";
        if($this->language)
            $url .= "&language={$this->language}";

        $ch = curl_init(); 
        curl_setopt ($ch, CURLOPT_URL,$url); //접속할 URL 주소 
        curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, false); // 인증서 체크같은데 true 시 안되는 경우가 많다. 
        // default 값이 true 이기때문에 이부분을 조심 (https 접속시에 필요) 
        curl_setopt ($ch, CURLOPT_SSLVERSION,4); // SSL 버젼 (https 접속시에 필요) 
        curl_setopt ($ch, CURLOPT_HEADER, 0); // 헤더 출력 여부 
        curl_setopt ($ch, CURLOPT_POST, 0); // Post Get 접속 여부 
        // curl_setopt ($ch, CURLOPT_POSTFIELDS, "latlng=37,126.961452&key=AIzaSyDG0o9eNwx-e019j2Xe-yBdwrSojDr29eY"); // Post 값  Get 방식처럼적는다. 
        // curl_setopt ($ch, CURLOPT_POSTFIELDS, "latlng=37,126.961452&key=AIzaSyDG0o9eNwx-e019j2Xe-yBdwrSojDr29eY"); // Post 값  Get 방식처럼적는다. 
        curl_setopt ($ch, CURLOPT_TIMEOUT, 30); // TimeOut 값 
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1); // 결과값을 받을것인지 
        $result = curl_exec ($ch); 
        curl_close ($ch); 

        $result = json_decode($result);
        $result = $result->results;
        
        return $result;
    }
}