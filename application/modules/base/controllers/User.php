<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends Base_Controller 
// class User extends Public_Controller
{

    function __construct()
    {
        parent::__construct(array(
            'view_dir'=>'user',
            'table'=>'users'
        ));
        // $this->load->model('users_model');
    }
  
  

    function index()
    {
           $data["content_view"] = "user/login";
           $this->template->base($data);
    }
    function find_pw(){

        $this->fv->set_rules("userName","아이디","required");
        if($this->fv->run() === false)
        {
            $this->_template("user/golfpass/find_pw",array(),'golfpass2');
        }
        else//input userName 값 존재
        {
            $userName =$this->input->post("userName");
            $user =$this->users_model->_get(array("userName"=>$userName));

            if($user === null)//--아이디 존재하지 않음
            {
                //아이디 입력 view
            }
            else//--아이디존재
            {
                $auth_code = $this->input->post("auth_code");
                if($auth_code === null)//--인증코드 데이터 없을때  //input userName 값 존재
                {
                    //인증코드 플래시세션 등록
                    //인증코드 보내기
                    //인증코드 입력 view
                }
                else //--인증코드 데이터 있을떄 //input userName,auth_code 값 존재
                {
                    if($auth_code === $this->session->userdata("auth_code")) //--인증코드 일치할떄 //input userName,auth_code 값 존재
                    {
                        $password = $this->input->post("password");
                        $re_password = $this->input->post("re_password");
                        if($password === null || $re_password === null)//--패스워드 빈값  //input userName,auth_code 값 존재
                        {
                            //패스워드 입력 view
                        }
                        else if($password !== $repassword)//-- 패스워드 서로  불일치  //input userName,auth_code,password,re_password 값 존재
                        {

                        }
                        else //--패스워드 일치 //input userName,auth_code,password,re_password 값 존재
                        {
                            //패스워드 변경
                        }
                        
                    }
                    else //--인증코드 불일치
                    {
                        //인증코드 다시보내기 버튼
                        //인증코드 입력 view
                    }
                }
            }
            

        }

        
    }
    function find_id()
    {
        $this->fv->set_rules("phone","폰 번호","required");
         if($this->fv->run() === false)
         {
             $this->_template("user/golfpass/find_id",array(),'golfpass2');
         }
         else
        {
            $user = $this->users_model->_get(array("phone"=>$this->input->post("phone")),array("userName"));
            $data['userName'] = $user ? $user->userName : "존재하지않음"; 

            $this->_template("user/golfpass/find_id",$data,'golfpass2');
         }
    }

    function register_agree_1()
    {
        $this->_template('user/golfpass/register_agree_1',array(),'golfpass2');
        // $this->_view('user/golfpass/register_agree_1',array());
    }
   function _login_view($data = array())
   {
        // $view =array('login');
        // if($this->input->get('guest_order')){//비회원주문
        //     $data['order_id'] = $this->input->get('order_id');
        //     $data['order_count'] = $this->input->get('order_count');
        //     array_push($view,"shop/order/guest_order_button");
        // }
       
        // $this->_template($view,$data);
        $this->_template('user/golfpass/login',$data,'golfpass2');
        // $this->_view('user/golfpass/login',$data);
   }
    function login()
    {
        $this->fv->set_rules('userName', '아이디', 'required|min_length[2]|max_length[20]');
        $this->fv->set_rules('password', '비밀번호', 'required|min_length[2]|max_length[20]');
        $data['return_url'] =  $this->input->get("return_url");

        if ($this->fv->run() === false) { // fail post
            if (!is_login()) {//세션 false
              $this->_login_view($data);
                alert_validationErrors();
                return;
            } else { //세션 true
                my_redirect("/");
                return;
            }
        } else { //post
             $userName = $this->input->post('userName');
             $password = $this->input->post('password');

             $user = $this->users_model->_get(array("userName"=>$userName));
             
            if (!isset($user)) {  //아이디 존재하지않음
                alert("아이디가 존재하지 않습니다.");
               $this->_login_view($data);
                return ;
            }
             
             $hash =$user->password;
            if (!password_verify($password, $hash)) { //비밀번호 불일치
                alert("비밀번호가 일치하지 않습니다.");
               $this->_login_view($data);
            } else if (password_verify($password, $hash)) {  //로그인 성공
               
                $this->session->set_userdata(array('is_login'=>'true','user_id'=>$user->id,'userName'=>$userName,'auth'=> $user->auth));
                if($user->auth === admin_auth)
                    redirect(admin_home_uri."");    
                else
                    redirect_return_url("/");
            }
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect_return_url("");
    }

    function add()
    {
        $userName = $this->input->post('userName');
        if(!$userName) $userName ='';
        $this->fv->set_rules('userName', '아이디', 'required|is_unique[users.userName]|min_length[2]|max_length[10]', array('is_unique'=>"$userName 는(은) 이미 존재합니다"));
        $this->fv->set_rules('password', '암호', 'required|matches[re_password]|min_length[4]|max_length[20]', array('matches'=>'비밀번호가 일치 하지 않습니다.'));
        $this->fv->set_rules('re_password', '암호확인', 'required|min_length[4]|max_length[20]');
        $this->fv->set_rules('phone', '연락처', 'required|min_length[1]|max_length[20]');
        // $this->fv->set_rules('email', '이메일', 'required|valid_email|is_unique[users.email]|min_length[1]|max_length[30]', array('is_unique'=>'%s이 이미 존재합니다'));
        $this->_set_rules();
       
        if ($this->fv->run()=== false) {
            $user = (object)array();
            $data = array("mode" =>"add","user"=>$user);
            $this->_template("user/golfpass/addUpdate",$data,'golfpass2');
            // $this->_template("addUpdate",$data);

            if($this->session->userdata('email_auth') !== null && $this->session->userdata('email') !== null){
                $this->session->set_flashdata( 'email',$this->session->userdata("email"));
                $this->session->set_flashdata('email_auth',true);
            }
            if($this->session->userdata('phone_auth') !== null && $this->session->userdata('phone') !== null){
                $this->session->set_flashdata( 'phone',$this->session->userdata("phone"));
                $this->session->set_flashdata('phone_auth',true);
            }
                
        }
        // else if($this->session->userdata('email_auth') === null)
        // {
        //     $user = (object)array();
        //     $data = array("mode" =>"add","user"=>$user);

        //     echo "<script>alert('이메일 인증이 완료되지 않았습니다.')</script>";
        //     // $this->_template("user/golfpass/addUpdate",$data,'golfpass');
        //     $this->_template("addUpdate",$data);
        // }
        else if($this->session->userdata('phone_auth') === null)
        {
            $user = (object)array();
            $data = array("mode" =>"add","user"=>$user);

            echo "<script>alert('휴대폰 인증이 완료되지 않았습니다.')</script>";
            // $this->_template("user/golfpass/addUpdate",$data,'golfpass');
            // $this->_template("addUpdate",$data);
            $this->_template("user/golfpass/addUpdate",$data,'golfpass2');
        }
        else
        {
            $this->_dbSet_addUpdate();

            $hash = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
            $userName =$this->input->post('userName');
            $this->db->set('userName', $userName);
            $this->db->set('password', $hash);
            // $this->db->set('email', $_SESSION['email']);
            $this->db->set('email', $this->input->post('email'));
            // // $this->db->set('phone', $this->input->post('phone'));
            $phone = str_replace("-","",$_SESSION['phone']);
            $this->db->set('phone', $phone);
            
            $this->db->insert('users');

            unset($_SESSION["email_auth"]);
            unset($_SESSION["email"]);
            unset($_SESSION["phone"]);
            unset($_SESSION["phone_auth"]);

            $insert_id = $this->db->insert_id();
            $this->session->set_userdata(array('is_login'=>'true','user_id'=>$insert_id,'userName'=>$userName,'auth'=>'1'));
            msg_redirect("회원가입 성공", "/");
        }
    }

    public function update(){
        if(!$this->session->userdata("user_update")){
            alert("잘못된 접근!");
            my_redirect(user_uri."/check_pssword_forUpdate");
            exit;
        }

        if($this->input->post("password") !== "" || $this->input->post("re_password") !== ""){
            $this->fv->set_rules('password', '암호', 'required|matches[re_password]|min_length[4]|max_length[20]', array('matches'=>'비밀번호가 일치 하지 않습니다.'));
            $this->fv->set_rules('re_password', '암호확인', 'required|min_length[4]|max_length[20]');
        }
        $this->_set_rules();
        if ($this->fv->run()=== false) {
           
            $this->session->set_flashdata('user_update', true);
            // $this->db->select("userName,postal_number,address,address_more,name,phone,sex,profilePhoto, substring(birth,1,4) 'year', substring(birth,6,2) 'month', substring(birth,9,2) 'day'");
            // $this->db->from($this->table);
            // $this->db->where("userName",$this->session->userdata('userName'));
            // $user= $this->db->get()->row();
            $data['user'] = $this->user;
            $data['mode'] = "update";
           
            $this->_template("user/golfpass/addUpdate",$data,"golfpass2");
        } else {
            if($this->input->post("password") !== "" || $this->input->post("re_password") !== ""){
                $hash = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
                $this->db->set('password', $hash);
            }

            $this->_dbSet_addUpdate();
            $this->db->where('userName',$this->session->userdata('userName'));
            $this->db->update('users');

            msg_redirect("수정완료", shop_mypage_uri."/gets_wishlist");
        }
    }
    function _dbSet_addUpdate(){
        // $birth = my_date_format($this->input->post('year'), $this->input->post('month'), $this->input->post('day'));
        // $this->db->set('birth', $birth);
        $this->db->set('birth', $this->input->post("birth"));

        $this->db->set('postal_number', $this->input->post('postal_number'));
        $this->db->set('address', $this->input->post('address'));
        $this->db->set('address_more', $this->input->post('address_more'));
        $this->db->set('name', $this->input->post('name'));
        // $this->db->set('sex', $this->input->post('sex'));
        
        $this->db->set('profilePhoto',$this->input->post('profilePhoto'));
        $this->db->set('email',$this->input->post('email'));
        $this->db->set('option_1',$this->input->post('option_1'));
        $this->db->set('option_2',$this->input->post('option_2'));
        $this->db->set('option_3',$this->input->post('option_3'));
        $this->db->set('option_4',$this->input->post('option_4'));
        $this->db->set('option_5',$this->input->post('option_5'));
        
        $this->db->set('created', 'NOW()', false);
    }

    function _set_rules(){
        // $this->fv->set_rules('postal_number', '우편번호', 'required',array('required'=>'주소를 검색선택해주세요.'));
        // $this->fv->set_rules('address', '기본주소', 'required');
        // $this->fv->set_rules('address_more', '상세주소', 'required');
        $this->fv->set_rules('name', '이름', 'required|min_length[1]|max_length[15]');
        $this->fv->set_rules('name', '이름',array('required','min_length[1]','max_length[15]',
    array("해당 닉네임으로 지정할수 없습니다.",function($str){
        if(strpos($str,"운영자") > -1 || strpos($str,"손님") > -1 || strpos($str,"admin") > -1){
            return false;
        }
        return true;
    })
));
        // $this->fv->set_rules('sex', '성별', 'required|min_length[1]|max_length[5]',array('required'=>'%s을 선택해주세요'));
     
        // $this->fv->set_rules('phone', '연락처', 'required|min_length[1]|max_length[20]');
    }
    function email_auth()
    {
        $email = $this->input->get('email');
        $this->fv->set_data(array("email"=>$email));
        $this->fv->set_rules("email", $email, 'required|valid_email|is_unique[users.email]', array('is_unique' => '%s는 이미 존재합니다.'));
        if ($this->fv->run() === false) { //이메일 유효성 검사
            echo "<script>alert('".form_error("email", false, false)."');window.close();</script>";
        } else { //GET 이메일 전송 , 세션 키
            if ($this->input->post('auth_key') === null) 
            {
                $this->_view('email_auth',array("msg"=>"해당 이메일로 인증키를 보냈습니다. 확인해주세요.",'email'=>$email));
                $auth_key= rand(1000, 9999);
                // $this->session->set_userdata(array("auth_key"=> $auth_key,"email"=>$this->input->get('email')));
                $expried_sec = 300;
                $expried_min = 300/5;
                $this->session->set_tempdata(array(
                    "auth_key"=>$auth_key
                    
                ), null, $expried_sec);
                $this->session->set_flashdata( 'email',$this->session->userdata("email"));

                $fromEmail= $this->config->item('email');
                $to =$this->input->get('email');
                $content = "이메일 인증 키입니다. $auth_key / {$expried_min}분 안에 입력해주세요.";
                
                $this->load->library('email');
                $this->email->send_email($fromEmail, $to, $content);
            }
            else 
            { //POST
                if($this->session->userdata("email") === null)
                {
                    echo "<script>alert('인증 중에 페이지 이동을 하지말아주세요.');window.close();</script>";
                }
                else if ($this->input->post('auth_key')== $this->session->userdata('auth_key')) 
                { //인증성공
                    // $this->session->set_tempdata(array("email_auth"=>true), null, 300);
                    $this->session->set_flashdata("email_auth",true);
                    $this->session->set_flashdata( 'email',$this->session->userdata("email"));
                      echo "<script>alert('이메일 인증 완료');window.close();</script>";
                } else { //인증실패
                    $this->session->set_flashdata( 'email',$this->session->userdata("email"));
                    $this->_view('email_auth',array("msg"=>"인증실패. 인증키를 확인해주세요.",'email'=>$email));
                }
            }
        }
    }
    function phone_auth()
    {
        // $phone = $this->session->userdata("phone");
        // if($phone === null)
        $phone = $this->input->get('phone');
        $this->fv->set_data(array("phone"=>$phone)); //팝업창에 에러 띄우기 위해 세팅
        $this->fv->set_rules("phone", "휴대폰", 'required|numeric|is_unique[users.phone]', array('is_unique' => '%s는 이미 존재합니다.'));
        // $this->fv->set_rules("phone", "휴대폰", 'required');
        if ($this->fv->run() === false) 
        { //이메일 유효성 검사
            echo "<script>alert('".form_error("phone", false, false)."');window.close();</script>";
        } 
        else //GET 이메일 전송 , 세션 키
        {
            if ($this->input->post('auth_key') === null) 
            {
                $this->_view('phone_auth',array("msg"=>"해당 휴대폰으로 인증키를 보냈습니다. 확인해주세요.",'phone'=>$phone));
                $auth_key= rand(1000, 9999);
                $expried_sec = 300;
                $expried_min = 300/5;
                $this->session->set_tempdata(array(
                    "auth_key"=>$auth_key
                    
                ), null, $expried_sec);
                //인증후 번호만 바꿔서 도용 방지
                // $this->session->set_userdata( array( 'phone'=> $this->input->get('phone') ));
                $this->session->set_flashdata( 'phone',$this->input->get('phone'));
                $to =$this->input->get('phone');
                $content = "이메일 인증 키입니다. $auth_key / {$expried_min}분 안에 입력해주세요.";
                
               //폰에 번호보내기 
               $this->load->library("sms_cafe24");
               
               $this->sms_cafe24->secure = $this->setting->cafe24_sms_api_key;
               $this->sms_cafe24->user_id = $this->setting->cafe24_userName;
               $this->sms_cafe24->send("{$this->setting->cafe24_sms_number}",$to,"[{$auth_key}] 골프패스 인증번호입니다.");
            }
            else //POST
            { 
                if($this->session->userdata("phone") === null)
                {
                    echo "<script>alert('인증 중에 페이지 이동을 하지말아주세요.');window.close();</script>";
                    // $data['phone'] =$phone;
                    // $data['msg'] = "인증실패. 처음부터 다시시도해주세요.";
                    // $this->_view('phone_auth',$data);
                }
                else if ($this->input->post('auth_key')== $this->session->userdata('auth_key'))
                { //인증성공
                    // $this->session->set_tempdata(array("email_auth"=>true), null, 300);
                    $this->session->set_flashdata( 'phone',$this->session->userdata("phone"));
                    $this->session->set_flashdata("phone_auth",true);
                      echo "<script>alert('휴대폰 인증 완료');window.close();</script>";
                }
                else
                { //인증실패
                    $this->session->set_flashdata( 'phone',$this->session->userdata("phone"));
                    $data['phone'] =$phone;
                    $data['msg'] = "인증실패, 인증키를 확인해주세요.";
                    $this->_view('phone_auth',$data);
                }
            }
        }
    }

    //파일 업로드
    function profilePhoto_upload()
    {
        $imgDir = "";
        $this->session->set_flashdata('user_update', true);
        if (isset($_FILES['profilePhoto'])) {
            $config['upload_path'] = './public/uploads/user/images';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['max_size'] = '500000'; //500KB
            $config['max_width']  = '10240';
            $config['max_height']  = '7680';
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('profilePhoto')) {
                echo ($this->upload->display_errors());
            } else {
                $fileName= $this->upload->data()['file_name'];
                $imgDir= "/public/uploads/user/images/$fileName";
                //리사이즈
                // $config['image_library'] = 'gd2';
                // $config['source_image'] = "./public/uploads/user/images/$fileName";
                // $config['maintain_ratio'] = true;
                // $config['width']   = 80;
                // $config['height']   = 80;

                // $this->load->library('image_lib', $config);

                // $this->image_lib->resize();
            }
        }
        $this->_view("profilePhoto_upload", array("profilePhoto"=>$imgDir));
    }

    public function check_pssword_forUpdate(){
        $this->fv->set_rules('password', '암호', 'required|min_length[4]|max_length[20]');


        if($this->fv->run() === false){
            $this->_template("check_pssword_forUpdate",array(),"golfpass2");
        }else{

            $hash= $this->db->query("SELECT password FROM $this->table WHERE userName = '{$this->session->userdata('userName')}'")->row()->password;
            $password = $this->input->post('password');
            if (!password_verify($password, $hash)) { //비밀번호 불일치
                alert("비밀번호가 일치하지 않습니다.");
                $this->_template("check_pssword_forUpdate",array(),"golfpass2");
            }else{
                $this->session->set_flashdata('user_update', true);
                redirect(user_uri."/update");
            }
    
        }
    }

 
}
