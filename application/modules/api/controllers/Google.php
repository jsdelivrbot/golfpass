<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Google extends Public_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('google_api');
	}
	function request_auth()
	{
		$this->google_api->requset_auth();
	}
	function redirect_url()
	{
		$result =$this->google_api->login_callback();
		$access_token=$result->access_token;
		$info=$this->google_api->get_user_profile($access_token);

		var_dump($info->names[0]->displayName);
		
	}

}

/* End of file Google.php */
/* Location: .//C/Users/이재윤/Desktop/01shortcut/modules/api/controllers/Google.php */