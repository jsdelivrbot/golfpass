<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Naver_login
{
    public $client_id =null;
    // public $response_type;
    public $redirect_uri =null;
    private $state;
    private $code;
    public $client_secret = null;
    private $user_profile_url ="https://openapi.naver.com/v1/nid/me";
    function __construct()
    {
        $ci = &get_instance();
        $ci->load->helper("url");
        $return_url = rawurldecode(current_url());
        $this->client_id = "desGiq4LhD6U7f_oSZdR";
        $this->redirect_uri = "http://localhost/index.php/api/naver/login_callback?return_url={$return_url}";
        $this->client_secret= "VTc_AV7Ta4";
    }
    private function generate_state()
    {
        $mt = microtime();
        $rand = mt_rand();
        $state = md5($mt . $rand);

        $ci = &get_instance();
        $ci->load->library("session");
        $ci->session->set_userdata(array("state"=>$state));
        return $state;
    }
    function requset_auth()
    {
        $ci = &get_instance();
        $ci->load->helper("url");
        if($this->client_id === null || $this->redirect_uri === null)
        {
            echo "error : no define variable - $this->client_id or $this->redirect_uri";
            return false;
        }
        $redirect_uri =urldecode($this->redirect_uri);
        $state = $this->generate_state();
        $url = "https://nid.naver.com/oauth2.0/authorize?";
        $url .= "client_id={$this->client_id}";
        $url .= "&response_type=code";
        $url .= "&redirect_uri={$redirect_uri}";
        $url .= "&state={$state}";

        redirect($url);
        
    }
    
    function login_callback()
    {
        $ci = &get_instance();
        $ci->load->library("session");
        $this->code = $ci->input->get("code");
        $this->state = $ci->input->get("state");

        if($this->state === $ci->session->userdata("state"))
        {
            $result = $this->curl("https://nid.naver.com/oauth2.0/token?client_id={$this->client_id}&client_secret={$this->client_secret}&grant_type=authorization_code&state={$this->state}&code={$this->code}");
            
            $this->accsess_token =$result->access_token;
            $this->refresh_token= $result->refresh_token;
            // var_dump($result);
            return $result;
        }
        else
        {
            echo "state값이 일치하지 않습니다.";
            return false;
        }
    }
    function get_user_profile($accsess_token)
    {
        // $accsess_token =$this->login_callback();
        $ch = curl_init();
        $auth = array("Authorization: Bearer {$accsess_token}");
        curl_setopt($ch, CURLOPT_URL, $this->user_profile_url );
        curl_setopt($ch, CURLOPT_HTTPHEADER, $auth );
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true );
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt($ch, CURLOPT_COOKIE, '' );
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 300);
        $result = curl_exec($ch);
        curl_close($ch);
        $result = json_decode($result);
        return $result;
    }
    // function delete_token()
    // {
    //     $this->curl("https://nid.naver.com/oauth2.0/token?grant_type=delete&client_id={$this->client_id}&client_secret={$this->client_secret}&access_token={$this->accsess_token}&service_provider=NAVER");
        
    // }
    private function curl($url)
    {
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
        $infos = curl_exec ($ch); 
        curl_close ($ch); 

        $infos = json_decode($infos);
        return $infos;
    }
}

