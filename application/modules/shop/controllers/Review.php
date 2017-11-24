<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Review extends Base_Controller {

    function __construct(){
        parent::__construct(array(
            'table'=>'product_reviews',
            'view_dir'=>"review"
        ));
    }
    public function ajax_pgi_data()
    {
        $this->load->library('Ajax_pagination');
        $conditions = array();
        //calc offset number
        $offset = $this->input->post('page');
        $product_id = $this->input->post('product_id');

        if($offset === null)
            $offset = 0;
        
        $reviews = $this->product_reviews_model->gets_with_ajax_pgi(array(
            'product_id'=>$product_id,
            'target' =>'#nid_postList',
            'base_url'=> site_url(shop_review_uri."/ajax_pgi_data"),
            'offset' => $offset
        ));

        $data = array("reviews"=>$reviews);
        //load the view
        $this->_view("$this->view_dir/ajax-pgi-data", $data, false);
    }
    public function ajax_get($id){
        header("Content-Type:application/json");
        
        $content =$this->product_reviews_model->get_reveiw($id);
        $data['none'] = 'none';
        if($content->is_display === 1)
        {
            $data['content']  =$content;
        }
        echo json_encode($data);
    }

    public function _gets()
    {
        $reivews=$this->product_reviews_model->gets_by_user_id_with_pgi(array('pgi_style'=>'style_1'));
        return $reivews; 
    }

    public function gets_by_user($user_id)
    {
        $config['by_user'] =true;
        $data['reviews'] = $this->product_reviews_model->gets_with_pgi(array('u.userName'=>$this->user->userName),$config);
        // $this->_template("mypage/index",$data,'golfpass2');
        $this->_template("review/golfpass/gets",$data,'golfpass2');
    }
    public function gets($product_id)
    {

        // $data['reviews'] = $this->product_reviews_model->gets(array('r.product_id'=>$product_id));
        $data['reviews'] = $this->product_reviews_model->gets_with_pgi(array('product_id'=>$product_id));
       
        
        $data['product_id'] =$product_id;
        //  $data['reviews'] = $this->_gets();
         $this->_template("review/golfpass/gets",$data,'golfpass2');
         

    }
    public function add($product_id){

        // 상품 후기 게시판인지, 게시판쓸 권한 있는지 확인
        if(!is_login()){
            alert("상품을 구매하신 회원만 후기를 작성할 수 있습니다.");
            my_redirect($_SERVER['HTTP_REFERER']);
            return; 
        }
        
        $this->load->model("product_orders_model");
        $this->db->where("product_id",$product_id);
        $this->db->where("user_id",$this->user->id);
        $this->db->where("is_review_write","0");
        $this->db->where("status","paid");
        $orders = $this->product_orders_model->_gets();
        if(count($orders) === 0 ){
            alert("상품을 구매하셔야 후기를 작성할 수 있습니다.");
            my_redirect($_SERVER['HTTP_REFERER']);
            return ;
        }
        // if(($orders = is_can_product_review($product_id)) === false){
        //     alert("상품을 구매하셔야 후기를 작성할 수 있습니다.");
        //     my_redirect($_SERVER['HTTP_REFERER']);
        //     return ;
        // }
        
        $this->_set_rules();
        if(!$this->fv->run()){
            $content= (object)array();
            $data = array('mode'=>"add/$product_id",'content'=>$content);
             
             $this->_template("review/golfpass/addUpdate",$data,"golfpass2");
             
        }else{
            if(!is_guest()){ //회원일떄
                $this->db->set('user_id',$this->user->id);
            }else{//손님일떄
                $hash = password_hash($this->input->post('guest_password'), PASSWORD_BCRYPT);
                $this->db->set('guest_name',$this->input->post('guest_name'));
                $this->db->set('guest_password',$hash);
                $this->db->set('user_id','0');
            }

            // setting_model is_product_review_display 확인 후 is_display세팅 // default값 수정으로 변경예정
            $this->load->model('admin/setting_model');
            $is_display=$this->setting_model->_get(1,array('is_product_review_display'))->is_product_review_display;
            if($is_display === '0')
            {
                $this->db->set("is_secret","1");
                $this->db->set('is_display', '0');
            
            }
            else if($this->input->post("is_display") === "0")
            {
                $this->db->set('is_display', '0');
            }
            
            //후기 추가
            $this->_dbSet_addUpdate();
           
            $insert_id =$this->product_reviews_model->add(array('product_id'=>$product_id));

            //p_order_products에서  is_review_write 업데이트.
            $this->db->set('is_review_write','1');
            for($i=0;$i<count($orders);$i++){
                $this->db->or_where('id',$orders[$i]->id);
            }
            $this->db->update('product_orders');
            
            my_redirect(shop_product_uri."/get/$product_id");
            return;
        }
   
    }
    public function _dbSet_addUpdate(){
      
        $this->product_reviews_model->_set_by_obj(array(
        //   "title"=> $this->input->post('title'),
           "desc"=> $this->input->post('desc'),
           "score_1"=> $this->input->post('score_1'),
           "score_2"=> $this->input->post('score_2'),
           "score_3"=> $this->input->post('score_3'),
           "score_4"=> $this->input->post('score_4'),
           "score_5"=> $this->input->post('score_5'),
           "score_6"=> $this->input->post('score_6'),
           "score_7"=> $this->input->post('score_7'),
           "score_8"=> $this->input->post('score_8')
        ));
    }
    public function _set_rules(){
        // $this->fv->set_rules('title','제목','required');
        $this->fv->set_rules('desc','내용','required');
        
    }
}
