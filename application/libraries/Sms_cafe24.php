<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class Sms_cafe24
{
    // public id;
    // public 
    function send($from,$to,$desc)
    {
         /******************** 인증정보 ********************/
         $sms_url = "https://sslsms.cafe24.com/sms_sender.php"; // 전송요청 URL
         // $sms_url = "https://sslsms.cafe24.com/sms_sender.php"; // HTTPS 전송요청 URL
         $sms['user_id'] = base64_encode("santutu6"); //SMS 아이디.
         $sms['secure'] = base64_encode("1856aaacd1dee9bdb79b60c1c8746f38") ;//인증키
         // $sms['msg'] = base64_encode(stripslashes("[2456] 골프패스 회원가입 인증코드입니다."));  //내용
         $sms['msg'] = base64_encode(stripslashes($desc));  //내용
         $sms['rphone'] = base64_encode('010-5100-8825'); //받는번호
         $sms['sphone1'] = base64_encode('010'); //보내는 번호
         $sms['sphone2'] = base64_encode('5100');
         $sms['sphone3'] = base64_encode('8825');
         $sms['mode'] = base64_encode("1"); // base64 사용시 반드시 모드값을 1로 주셔야 합니다.
         $sms['smsType'] = base64_encode('S'); // LMS일경우 L
         // $nointeractive = $_POST['nointeractive']; //사용할 경우 : 1, 성공시 대화상자(alert)를 생략
 
         $host_info = explode("/", $sms_url);
         $host = $host_info[2];
         $path = $host_info[3];
 
         srand((double)microtime()*1000000);
         $boundary = "---------------------".substr(md5(rand(0,32000)),0,10);
         //print_r($sms);
         // 헤더 생성
         $header = "POST /".$path ." HTTP/1.0\r\n";
         $header .= "Host: ".$host."\r\n";
         $header .= "Content-type: multipart/form-data, boundary=".$boundary."\r\n";
         
         // 본문 생성
         $data ="";
         foreach($sms AS $index => $value){
             $data .="--$boundary\r\n";
             $data .= "Content-Disposition: form-data; name=\"".$index."\"\r\n";
             $data .= "\r\n".$value."\r\n";
             $data .="--$boundary\r\n";
         }
         $header .= "Content-length: " . strlen($data) . "\r\n\r\n";
 
         $fp = fsockopen($host, 80);
 
         if ($fp) {
             fputs($fp, $header.$data);
             $rsp = '';
             while(!feof($fp)) {
                 $rsp .= fgets($fp,8192);
             }
             fclose($fp);
          
        }
    }
}