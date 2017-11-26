<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends Base_Controller {
	function __construct(){
        parent::__construct(array(
            'table'=>'product_orders',
            'view_dir'=>"order"
        ));
        $this->load->helper('enum');
        if(!is_login())
        {
            alert("로그인해주세요.");
            my_redirect(user_uri."/login?return_url=".rawurlencode(my_current_url()),false);
        }
    }
    function update_info($merchant_uid)
    {
        $arr_name_with = $this->input->post("name_with");
        $arr_eng_name_with = $this->input->post("eng_name_with");
        $arr_email_with = $this->input->post("email_with");
        $arr_phone_with = $this->input->post("phone_with");
        $rows =$this->db->query("SELECT id FROM p_order_infos WHERE merchant_uid = $merchant_uid")->result();
        for($i = 0 ;$i < count($rows) ; $i++)
        {
            $this->db->set("name_with",$arr_name_with[$i]);
            $this->db->set("eng_name_with",$arr_eng_name_with[$i]);
            $this->db->set("name_with",$arr_name_with[$i]);
            $this->db->set("email_with",$arr_email_with[$i]);
            $this->db->set("phone_with",$arr_phone_with[$i]);
            $this->db->where("id",$rows[$i]->id);
            $this->db->update("p_order_infos");
        }
        $order_id =$this->db->query("SELECT id FROM product_orders WHERE merchant_uid = $merchant_uid")->row()->id;
        my_redirect(shop_mypage_uri."/get_order/$order_id");
    }
    function ajax_check_payment()
    {
        header("content-type:application/json");
      
        $product_id = $this->input->post("product_id");
        $num_people = $this->input->post("num_people");
        $total_price = $this->input->post("total_price");
        $start_date = $this->input->post("start_date");
        $end_date = $this->input->post("end_date");

        $data['total_price'] = "1000";
        $this->load->model("products_model");
        $data['product'] = $this->products_model->_get($product_id);
        $data['user'] = $this->user;
        if(true) //계산이 맞다면
        {

            $data["is_check"] =  true;
        }
        else //계산이 틀리다면
        {
            $data["is_check"] =  false;
        }

        echo json_encode($data);
    }
    
    function golfpass()
    {
        if($this->user->phone === null || $this->user->phone === "" )
        {
            alert("고객님의 안전한 거래를 위해 휴대폰 인증을 하셔야합니다.\\n(한번만 인증하시면 다음부터는 인증없이 예약이 가능합니다.)");
            $this->session->set_flashdata('user_update', true);
            my_redirect(user_uri."/update_phone?return_url=".rawurlencode(my_current_url()));
        }

        $product_id = $this->input->get("product_id");
        $num_people = $this->input->get("num_people");
        $total_price = $this->input->get("total_price");
        $start_date = $this->input->get("start_date");
        $end_date = $this->input->get("end_date");

        //5개값 유효성 체크 시작
        if(is_numeric($num_people) === false)
        {
            alert("인수를 선택해주세요.");
            my_redirect(shop_product_uri."/get/{$product_id}");
        }
        if(is_numeric($total_price) === false)
        {
            alert("가격이 잘못되었습니다.");
            my_redirect(shop_product_uri."/get/{$product_id}");
        }
        if(is_numeric($product_id) === false)
        {
            alert("상품 아이디가 잘못되었습니다.");
            my_redirect(shop_product_uri."/get/{$product_id}");
        }

        $check_date =preg_match("/^(19|20)\d{2}-(0[1-9]|1[012])-(0[1-9]|[12][0-9]|3[0-1])$/",$start_date);
        if($check_date === 0)
        {
            alert("시작날짜가 잘못 되었습니다.");
            my_redirect(shop_product_uri."/get/{$product_id}");
        }
        $check_date =preg_match("/^(19|20)\d{2}-(0[1-9]|1[012])-(0[1-9]|[12][0-9]|3[0-1])$/",$end_date);
        if($check_date === 0)
        {
            alert("종료날짜가 잘못 되었습니다.");
            my_redirect(shop_product_uri."/get/{$product_id}");
        }
        //5개값 유효성 체크 끝
        $this->load->model("shop/products_model");
        $data['user'] = $this->user;
        $data['product'] =$this->products_model->_get(array("id"=>$product_id));

        $data["start_date"] = $start_date;
        $data["end_date"] = $end_date;
        $data["num_people"] = $num_people;
        $data["product_id"] = $product_id;
        $data["total_price"] = $total_price;
        $data["options"] = $this->db->where("kind","main_option")
        ->where("product_id",$product_id)->from("product_option")
        ->order_by("sort","asc")
        ->get()->result();
        $data["hole_options"] = $this->db->where("kind","hole_option")
        ->where("product_id",$product_id)->from("product_option")
        ->order_by("sort","asc")
        ->get()->result();

        $data['imp_franchises_code'] = $this->setting->imp_franchises_code;
        $this->_template("golfpass",$data,"golfpass2");

    }
    public function index($product_id){

        
        $guest_order =$this->input->get("guest_order");
        $order_count = $this->input->get("order_count") ?? 1;
        
        // var_dump($start_date);
        // var_dump($end_date);
        if(!is_login() && !$guest_order){
            redirect(user_uri."/login?order_count=$order_count&order_id=$product_id&guest_order=true&return_url=".rawurlencode(my_current_url()));
        }
        
        if($product_id !== "cartlist"){//하나만 구매
            
            $cartlist = $this->db
            ->select("p.id 'p_id',p.name 'p_name',p.price 'p_price', {$order_count} 'p_count' ,(p.price * {$order_count}) 'p_total_price'")
            ->from("products as p")
            ->where('id',$product_id)
            ->get()->result();    
        }else{//장바구니로 구매
            if(!is_login() ){//비회원
                $cartlist =array();
                if($tmp_cartlist = $this->session->userdata('cartlist')){ //장바구니 비었나확인
                    foreach($tmp_cartlist as $key=>$value){
                        $row =$this->db->select("id 'p_id', name 'p_name', price 'p_price', {$value} 'p_count', (price * {$value}) 'p_total_price'")
                        ->from("products")
                        ->where('id',$key)->get()->result();
                        $cartlist =array_merge($cartlist,$row);
                    }
                }
            }else if (is_login()){//회원
                $this->load->model("product_cartlist_model");
                $cartlist =$this->product_cartlist_model->gets($this->user->id,'cartlist');
            }
            
        }
        if(count($cartlist)===0){ //장바구니가 비었음
            alert("장바구니가 비었습니다.");
            my_redirect(shop_cartlist_uri."/gets",true);
            return;
        }
            
        //전체합계
        $total_price=0;
        for($i=0; $i < count($cartlist);$i++){
                $total_price+=$cartlist[$i]->p_total_price;
        }
        //상품이름
        $order_name = $cartlist[0]->p_name;
        if(count($cartlist) !== 1)
            $order_name .= "외에 ".(string)(count($cartlist)-1)."종";

        //user데이터
        if($this->session->userdata("is_login"))
            $user = $this->db->select("userName, name 'user_name', phone, email")->from("users")->where('id',$this->session->userdata("user_id"))->get()->row();
        else $user = (object)array();

        $data = array(
            'user'=>$user,
            "cartlist" =>$cartlist,
            "total_price" =>$total_price,
            "order_name" =>$order_name
        );
         
        $this->_template('index',$data,"golfpass2");
         
    }

    function _gets()
    {
        $this->load->model('product_orders_model');
        $orders = $this->product_orders_model->gets();
        return $orders;
    }
    public function gets()
    {
        //로그인한 회원 주문정보
        $this->load->model('product_orders_model');
        $data['page_name'] ="주문내역";         
        $data['rows'] =$this->product_orders_model->gets_with_pgi();
        $data['user'] = $this->user;
        $data['ths'] = array("번호","주문명","주문금액","결제방식","후기작성여부");
        $this->_template('mypage/index',$data,"golfpass2");
         
    }
    public function _get($merchant_uid)
    {

        $this->load->model('p_order_products_model');
        $order_products = $this->p_order_products_model->gets_order_products($merchant_uid);
        $order = $this->product_orders_model->get_with_join(array('o.merchant_uid'=>$merchant_uid));

        $data['order'] = $order;
        $data['order_products'] = $order_products;

        return $data;
    }
    public function get($merchant_uid){
       $data= $this->_get($merchant_uid);
        $this->_template('get',$data);
         
    }
    function get_by_guest()
    {
        $merchant_uid = $this->input->post('merchant_uid');
        $user_name = $this->input->post('user_name');
        
        $this->load->model('p_order_products_model');
        $order = $this->product_orders_model->get_with_join(array('o.merchant_uid'=>$merchant_uid,'o.user_name'=>$user_name));
        if($order === null)
        {
            $data['return_url'] =  $this->input->get("return_url");
            alert("잘못 입력하셨습니다.");
            $this->_template('user/login',$data);
            // my_redirect(user_uri.'/login');
            return;
        }
        $order_products =$this->p_order_products_model->gets_order_products($merchant_uid);

        $data['order'] = $order;
        $data['order_products'] = $order_products;
        $this->_template('get',$data);

    }
  
    ////결제
    function golfpass_ajax_add()
    {
        header("content-type:application/json");

        //계산 === 총합계 맞는지 체크 시작

        //시작~끝 날자 , 인수 계산
        $product_id = $this->input->post('product_id');
        $start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');
        $num_people = $this->input->post('num_people');
        $total_price =$this->_golfpass_cal_total_price((object)array(
            "product_id"=>$product_id,
            "start_date"=>$start_date,
            "end_date"=>$end_date,
            "num_people"=>$num_people
        ));        
        //총합계애 옵션가격더하기
        $options = $this->input->post("options[]");
        $this->load->model("product_option_model");
        for($i=0; $i < count($options); $i++)
        {
            $option_price =$this->product_option_model->_get($options[$i])->price;
            $total_price += $option_price;
        }
        
        //홀추가 가격 더하기
        $hole_option_id = $this->input->post("hole_option");
       
        if($hole_option_id !== null &&  $hole_option_id !== ""){
            $hole_option_price = $this->product_option_model->_get($hole_option_id)->price;
            $added_hole_price = $hole_option_price * $num_people;
            $total_price += $added_hole_price;
        }
        
    
        //싱글룸 가격 더하기
        $this->load->model("products_model");
        $num_singlerooms = $this->input->post("singleroom");
        if($num_singlerooms !== null &&  $num_singlerooms !== ""){
            $singleroom_price = $this->products_model->_get($this->input->post('product_id'))->singleroom_price;
            $added_singleroom_price = $singleroom_price * $num_singlerooms;
            $total_price += $added_singleroom_price;
        }
      
        // $data["is_check"] =  false;
        // echo json_encode($data);
        // return;
        if((string)$total_price !== (string)$this->input->post('total_price'))
        {
            $data["is_check"] =  false;
            echo json_encode($data);
            return;
        }
        //-------------------------------계산 === 총합계 맞는지 체크 끝

        //product_orders테이블에 order정보 추가
        $pay_method =$this->input->post('pay_method');
            $status = ($pay_method === 'bank') ? "ready" : "try";

            //table insert product_orders
            $merchant_uid = $this->input->post("merchant_uid");
            $merchant_uid = get_merchant_code($merchant_uid);
            $this->db->set('merchant_uid',$merchant_uid);
            $this->db->set('num_singleroom',$this->input->post('singleroom'));
            $this->db->set('order_name',$this->input->post('order_name'));
            $this->db->set('user_id',$this->user->id);
            $this->db->set('user_name',$this->input->post("user_name"));
            $this->db->set('phone',$this->input->post("phone"));
            $this->db->set('status',$status);
            $this->db->set('email',$this->input->post('email'));
            $this->db->set('product_id',$product_id);
            $this->db->set('address',$this->user->address);
            $this->db->set('pay_method',$pay_method);
            $this->db->set('total_price',$this->input->post('total_price'));
            $this->db->set('start_date',$start_date);
            $this->db->set('end_date',$end_date);
            $this->db->set('num_people',$num_people);
            $this->db->set('created',"NOW()",false);
            $this->db->insert($this->table);
            //p_order_options테이블에 옵션정보 추가
            for($i=0; $i < count($options); $i++)
            {
                $this->db->set("merchant_uid",$merchant_uid);
                $this->db->set("option_id",$options[$i]);
                $this->db->set("option_kind","main_option");
                $option_price =$this->db->insert("p_order_options");
            }
            //p_order_options테이블에 홀추가 옵션정보 추가
            $this->db->set("merchant_uid",$merchant_uid);
            $this->db->set("option_id",$hole_option_id);
            $this->db->set("option_kind","hole_option");
            $option_price =$this->db->insert("p_order_options");

            //p_order_infos 테이블에 동행자정보 추가 시작
            $product_id=$this->input->post('product_id');
            $names_with =$this->input->post("name_with[]");
            $eng_names =$this->input->post("eng_name_with[]");
            $phones =$this->input->post("phone_with[]");
            $emails =$this->input->post("email_with[]");

            for($i =0 ; $i < count($names_with) ; $i++){
                $this->db->set('merchant_uid',$merchant_uid);
                $this->db->set('product_id',$product_id);
                $this->db->set('created',"NOW()",false);

                $this->db->set('phone_with',$phones[$i]);
                $this->db->set('email_with',$emails[$i]);
                $this->db->set('eng_name_with',$eng_names[$i]);
                $this->db->set('name_with',$names_with[$i]);
                $this->db->insert('p_order_infos');
            }
            //동행자정보 추가 끝

            $data["is_check"] =  true;
            echo json_encode($data);
    }
    function _golfpass_cal_total_price($order)
    {
         //시작 날자 ~끝날자 * 인 === 총가격 변조 있는지 체크 시작
         $product_id = $order->product_id;
         $start_date = $order->start_date;
         $num_people = $order->num_people;
         $end_date = $order->end_date;
         $end_date =date("Y-m-d",strtotime("{$end_date} +1 days"));
         $obj_start_date = date_create($start_date);
         $obj_end_date = date_create($end_date);
         $period = date_diff($obj_start_date, $obj_end_date)->days;
         $total_price =0;
         $this->load->model("golfpass/p_daily_price_model");
         for($i =0 ; $i < $period ; $i++)
         {
             $date = date("Y-m-d",strtotime("{$start_date} +{$i} days"));
             $row=$this->p_daily_price_model->_get(array(
                 'product_id'=>$product_id,
                 'date'=>$date,
                 'period'=>"2",
                 'num_people'=>$num_people
             ));
             //해당 날자데이터가 없을때
             if($row === null)
             {
                  return "{$date}날자 {$num_people}명에 가격 데이터가 존재하지 않습니다.";
             }
             $tmp_price =$row->price;
             $total_price += (int)$tmp_price/2;
         }
 
         return $total_price;
    }
    public function golfpass_ajax_payment_check_update()
    {

        header("content-type:application/json");
       

        $imp_uid =$this->input->post('imp_uid');
        $merchant_uid =$this->input->post('merchant_uid');
        $merchant_uid =get_merchant_code($merchant_uid);
        $this->load->model('p_order_products_model');
        $order = $this->product_orders_model->_get(array("merchant_uid"=>$merchant_uid));
        $amount_to_be_paid =  $order->total_price;

        //시작 날자 ~끝날자 * 인 === 총가격 변조 있는지 체크 시작
        $total_price = $this->_golfpass_cal_total_price($order);

        if((string)$total_price !== (string)$amount_to_be_paid)
        {
            $data['payment_check'] = "날자,인 가격 계산이 총합계와 맞지않습니다.";
            echo json_encode($data);
            return;
            
        }
        //시작 날자 ~끝날자 * 인 === 총가격 변조 있는지 체크 끝
        
        //아이엠포트시작
        $imp_key = $this->setting->imp_key;
        $imp_secret = $this->setting->imp_secret;
        $this->load->library("Iamport",array("imp_key"=>$imp_key, "imp_secret"=>$imp_secret));
        $result =$this->iamport->findByImpUID($imp_uid);


        if(!$result->success){
            $data['payment_check'] ='fail_1';
            echo json_encode($data);
            return;
        }else{
            $result = $result->data;
        }
        
        $data['result'] = $result;
        $data["amount_to_be_paid"] =$amount_to_be_paid;
        if($result->status === 'paid' && (string)$result->amount === (string)$amount_to_be_paid )
        {
            $payment_check = 'paid';
            $this->db->set("status",$this->input->post("status"));
            //success_post_process(payment_result) 결제까지 성공적으로 완료
        }
        else if($result->status === 'ready' && $result->pay_method === 'vbank' && (string)$result->amount === (string)$amount_to_be_paid)
        {
            $payment_check = "vbank";
            $this->db->set("status",$this->input->post("status"));
            //  vbank_number_assigned(payment_result) 가상계좌 발급성공
        }
        else
        {
            $payment_check = "error";
            $this->db->set("status","error");
            //fail_post_process(payment_result) 결제실패 처리
        }
        // // var_dump($result);

        // //update

        $this->db->set('total_price',$amount_to_be_paid);
        $this->db->set("apply_num",$this->input->post("apply_num"));
        $this->db->set("vbank_num",$this->input->post("vbank_num"));
        $this->db->set("vbank_name",$this->input->post("vbank_name"));
        $this->db->set("vbank_holder",$this->input->post("vbank_holder"));
        $this->db->set("vbank_date",$this->input->post("vbank_date"));
        $this->db->where("merchant_uid",$merchant_uid);
        $this->db->update($this->table);

        $data['payment_check'] = $payment_check;
        echo json_encode($data);
   
    }
    public function ajax_add(){
        header("content-type:application/json");
    
        //table insert product_orders
        $merchant_uid = $this->input->post("merchant_uid");
        $merchant_uid = get_merchant_code($merchant_uid);
        $status ='try';
        $this->db->set('merchant_uid',$merchant_uid);
        $this->db->set('order_name',$this->input->post('order_name'));
        $this->db->set('user_id',$this->user->id);
        $this->db->set('user_name',$this->input->post("user_name"));
        $this->db->set('phone',$this->input->post("phone"));
        $this->db->set('status',$status);
        $this->db->set('pay_method',$this->input->post('pay_method'));
     
       
        $this->db->set('created',"NOW()",false);
        $this->db->insert($this->table);

        $product_ids = $this->input->post("product_id[]");
        $counts = $this->input->post("count[]");
        $prices = $this->input->post("price[]");

        //table insert p_order_products
        for($i =0 ; $i < count($product_ids) ; $i++){
            $product_id = $product_ids[$i];
            $count  = $counts[$i];
            $price = $prices[$i];

            $this->db->set('merchant_uid',$merchant_uid);
            $this->db->set('product_id',$product_id);
            $this->db->set('count',$count);
            $this->db->set('price',$price);
            $this->db->set('created',"NOW()",false);
            $this->db->insert('p_order_products');
        }
        $data = array("temp"=>'temp');
        echo json_encode($data);
    }
   


    public function ajax_payment_check_update()
    {

        header("content-type:application/json");

        $imp_key = $this->setting->imp_key;
        $imp_secret = $this->setting->imp_secret;
        $this->load->library("Iamport",array("imp_key"=>$imp_key, "imp_secret"=>$imp_secret));

        $imp_uid =$this->input->post('imp_uid');
        $result =$this->iamport->findByImpUID($imp_uid);

        $merchant_uid =$this->input->post('merchant_uid');
        $merchant_uid =get_merchant_code($merchant_uid);

        $this->load->model('p_order_products_model');
        $amount_to_be_paid = $this->p_order_products_model->get_total_price($merchant_uid);

        // var_dump($amount_to_be_paid);
        if(!$result->success){
            $data = array("payment_check"=>'fail_1');
            echo json_encode($data);
            return;
        }else{
            $result = $result->data;
        }
        
       
        if($result->status === 'paid' && (string)$result->amount === (string)$amount_to_be_paid )
        {
            $payment_check = 'paid';
            $this->db->set("status",$this->input->post("status"));
            //success_post_process(payment_result) 결제까지 성공적으로 완료
        }
        else if($result->status === 'ready' && $result->pay_method === 'vbank' && (string)$result->amount === (string)$amount_to_be_paid)
        {
            $payment_check = "vbank";
            $this->db->set("status",$this->input->post("status"));
            //  vbank_number_assigned(payment_result) 가상계좌 발급성공
        }
        else
        {
            $payment_check = "error";
            $this->db->set("status","error");
            //fail_post_process(payment_result) 결제실패 처리
        }
        // var_dump($result);

        //update

        $this->db->set('total_price',$amount_to_be_paid);
        $this->db->set("apply_num",$this->input->post("apply_num"));
        $this->db->set("vbank_num",$this->input->post("vbank_num"));
        $this->db->set("vbank_name",$this->input->post("vbank_name"));
        $this->db->set("vbank_holder",$this->input->post("vbank_holder"));
        $this->db->set("vbank_date",$this->input->post("vbank_date"));
        $this->db->where("merchant_uid",$merchant_uid);
        $this->db->update($this->table);

        $data = array("payment_check"=>$payment_check);
        echo json_encode($data);
        //  
        // $this->load->view("{$this->view_dir}/complete",$data);
        //  
    }
    
   
    public function complete($merchant_uid){

        //delete cartlist
        if(!is_login()){
            $this->session->sess_destroy();
        }else{
            $this->db->where("user_id",$this->user->id);
            $this->db->where("kind",'cartlist');
            $this->db->delete("product_cartlist");
        }//

        $order =$this->db->select("*")->from($this->table)->where("merchant_uid",$merchant_uid)->get()->row();

        $order_products = $this->db->select("op.*, (op.price * op.count) 'p_total_price' , p.name 'p_name' ")
        ->from("p_order_products as op")
        ->join("products as p","op.product_id = p.id","INNER")
        ->where("merchant_uid", $merchant_uid)
        ->get()->result();
        

        if($order->pay_method === 'card')
            $order->pay_method_enum = "카드";
        else if($order->pay_method === 'vbank')
            $order->pay_method_enum = "가상은행";            
        else if($order->pay_method === 'bank')
            $order->pay_method_enum = "무통장입금";            
        else 
            $order->pay_method_enum = "알수없음";            

        if($order->status === 'ready' || $order->status === 'try')
            $order->status_enum = '미결제';
        else if($order->status === 'paid')            
            $order->status_enum = '결제완료';
        else
            $order->status_enum = '알수없음';

        // var_dump($order_products);
        $data['order_infos'] =$this->db->where("merchant_uid",$merchant_uid)->from("p_order_infos")->get()->result();
        $data['order']= $order;
        $data['order_products'] = $order_products;
        $data['setting'] =$this->setting;      
        $data['photo'] = $this->db->where("product_id",$order->product_id)
        ->where("kind","photo")->limit(1,0)->order_by("sort","asc")->get("product_option")->row()->name;   
        $data['product'] =$this->db->where("id",$order->product_id)->get("products")->row();
        $this->_template('complete',$data,"golfpass2");

    }

    public function ajax_payment_user_cancel(){
        header("content-type:application/json");

        $merchant_uid = get_merchant_code($this->input->post("merchant_uid"));
        $this->db->set("status","user_cancel");
        $this->db->where("merchant_uid",$merchant_uid);
        $this->db->update($this->table);

        $data =array("tmp"=>"tmp");
        echo json_encode($data);
    }

    public function ajax_payment_error_cancel(){
        header("content-type:application/json");

        $imp_key = $this->setting->imp_key;
        $imp_secret = $this->setting->imp_secret;
        // $imp_key = $this->config->item('imp_key');
        // $imp_secret = $this->config->item('imp_secret');
        $this->load->library("Iamport",array("imp_key"=>$imp_key, "imp_secret"=>$imp_secret));

        $merchant_uid = $this->input->post("merchant_uid");
        $imp_uid = $this->input->post("imp_uid");

        $data = array('merchant_uid' =>$merchant_uid, 'imp_uid'=>$imp_uid);
        $this->iamport->cancel($data);

        $merchant_uid_code = get_merchant_code($merchant_uid);
        $this->db->set("status","cancelled");
        $this->db->where("merchant_uid",$merchant_uid_code);
        $this->db->update($this->table);


        $data =array("tmp"=>"tmp");
        echo json_encode($data);
    }
    ////결제
}
