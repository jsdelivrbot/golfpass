<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Facebook extends Public_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('facebook_api');
	}
	function request_auth()
	{
		$this->facebook_api->requset_auth();
	}
	function redirect_url()
	{
        $result =$this->facebook_api->login_callback();
        
        $access_token=$result->access_token;
        var_dump($access_token);
        $info=$this->facebook_api->get_user_profile($access_token);
        var_dump($info);

		
	}

}

/* End of file Google.php */
/* Location: .//C/Users/이재윤/Desktop/01shortcut/modules/api/controllers/Google.php */