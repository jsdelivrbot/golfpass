<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Google_api extends Api
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
		$this->client_id = "391805447121-4o2t2ubu1luibsup3kbjq79p5nujtqmq.apps.googleusercontent.com";
		$this->redirect_uri = domain_url()."/index.php/api/google/redirect_url";
		if($return_url !== null)
		{
			$this->redirect_uri .= "?return_url={$return_url}";
		}
		$this->client_secret= "52jtyRRpKIKdg33kKeCVFron";

	}

	function requset_auth()
	{
		$url ="https://accounts.google.com/o/oauth2/v2/auth?scope=https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fdrive.metadata.readonly&access_type=offline&include_granted_scopes=true&state=state_parameter_passthrough_value&redirect_uri={$this->redirect_uri}&response_type=code&client_id={$this->client_id}";

		redirect($url);
	}
	
	function login_callback()
	{
		$ci = &get_instance();
		$ci->load->library("session");
		$this->code = $ci->input->get("code");
		$post ="";
		$post .="code={$this->code}";
		$post .="&client_id={$this->client_id}";
		$post .="&client_secret={$this->client_secret}";
		$post .="&redirect_uri={$this->redirect_uri}";
		$post .="&grant_type=authorization_code";
		$url = "https://www.googleapis.com/oauth2/v4/token";
		$result=$this->curl($url,$post);
		return $result;
		

	
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
	
	
}

/* End of file Google.php */
/* Location: .//C/Users/이재윤/Desktop/01shortcut/03libraries/Google.php */
