<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class MY_Email extends CI_Email {
    
        public function __construct($config = array())
        {
                parent::__construct($config);
        }

        function send_email($from,$to,$content){
		$host =$_SERVER['HTTP_HOST'];
		
		$this->from("$from@$host", '아이디/비밀번호 찾기');
		$this->to($to);
		
		$this->subject('이메일 인증');
		$this->message($content);
		
		$this->send();
	}
    
}