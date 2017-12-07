<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kakao_api extends Oauth
{
	protected $ci;
	public $client_id =null;
    // public $response_type;
	public $redirect_uri =null;
	private $state;
	private $code;
	public $client_secret = null;
	private $user_profile_url ="https://openapi.naver.com/v1/nid/me";
	public function __construct()
	{
		$this->ci =& get_instance();
        $return_url = $this->ci->input->get("return_url");
        //설정
		$this->client_id = "eb6f30a5bc2e6e019faed8dbf16a5bcd";
        $this->redirect_uri = domain_url()."/index.php/api/kakao/redirect_url";
        $this->client_secret= "NQbXPSqE6xbBFDq7CM9wSmMyUYIuZOX5";
        //
		if($return_url !== null)
		{
			$this->redirect_uri .= "?return_url={$return_url}";
		}

	}

	function requset_auth()
	{
        $host ="https://kauth.kakao.com";
        $url ="/oauth/authorize?client_id={$this->client_id}&redirect_uri={$this->redirect_uri}&response_type=code";
		redirect($host.$url);
	}
	
	function login_callback()
	{
		$ci = &get_instance();
		$this->code = $ci->input->get("code");
		$post ="";
		$post .="code={$this->code}";
		$post .="&client_id={$this->client_id}";
		$post .="&client_secret={$this->client_secret}";
		$post .="&redirect_uri={$this->redirect_uri}";
		$post .="&grant_type=authorization_code";
		$url = "https://kauth.kakao.com/oauth/token";
		$result=$this->curl($url,$post);
		return $result;

	
	}
	function get_user_profile($accsess_token)
    {

		$this->user_profile_url = "https://kapi.kakao.com/v1/api/talk/profile";

        $result = $this->curl_bearer($this->user_profile_url,$accsess_token);
        $result = json_decode($result);
        return $result;
	}
	

}

/* End of file Google.php */
/* Location: .//C/Users/이재윤/Desktop/01shortcut/03libraries/Google.php */
