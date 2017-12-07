<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Test extends Public_Controller
{

    function __construct()
    {
        parent::__construct();
    }
    function test2()
    {
        $this->load->view("test2");
    }
    function index()
    {
        // $p_daily_price =$this->load->modules("golfpass");
        // return "1";
        // echo $p_daily_price->test();
        // echo modules::run("golfpass/P_daily_price/test");
        $this->_view("google");
    }
    function login_success()
    {
          // Initialize variables
        $app_id = "412089359205918";
        $secret = "f80bc29dcdb2830b800ac987e8bd2d36";
        $version = "v2.11"; // 'v1.1' for example

        // Method to send Get request to url
     

        // Exchange authorization code for access token
        $token_exchange_url = 'https://graph.accountkit.com/'.$version.'/access_token?'.
          'grant_type=authorization_code'.
          '&code='.$_POST['code'].
          "&access_token=AA|$app_id|$secret";
        $data = $this->doCurl($token_exchange_url);
        $user_id = $data['id'];
        $user_access_token = $data['access_token'];
        $refresh_interval = $data['token_refresh_interval_sec'];

        // Get Account Kit information
        $me_endpoint_url = 'https://graph.accountkit.com/'.$version.'/me?'.
          'access_token='.$user_access_token;
        $data = $this->doCurl($me_endpoint_url);
        $phone = isset($data['phone']) ? $data['phone']['number'] : '';
        $email = isset($data['email']) ? $data['email']['address'] : '';
    }
    
    function doCurl($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $data = json_decode(curl_exec($ch), true);
        curl_close($ch);
        return $data;
    }
}
