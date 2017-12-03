<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test2 extends CI_Controller {

	public function index()
	{
		$this->input->get('name');
		$data['tmp'] ="hi";
		$this->load->view('test', $data, FALSE);
	}

}

/* End of file Test.php */
/* Location: ./application/controllers/Test.php */