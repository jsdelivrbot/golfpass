<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cartlist extends Base_Controller {

    function __construct(){
        parent::__construct(array(
            'table'=>'product_cartlist',
            'view_dir'=>"cartlist"
        ));
    }
	
    public function _gets()
    {
        
        if(!is_login()){//비회원 세션 장바구니 
            $sess_cartlist= $this->session->userdata('cartlist');
            $cartlist = array();
            if($sess_cartlist){
                foreach($sess_cartlist as $key=>$value){ //key = product_id, $value = count
                $tmp_row=$this->db->select("id 'p_id',name 'p_name',price 'p_price', (price*$value) 'p_total_price', $value 'p_count'")
                ->from("products")
                ->where("id", $key)
                ->get()->result();
                $cartlist= array_merge($cartlist,$tmp_row);
                }
            }
          
        }else{//회원 장바구니
            $this->load->model("product_cartlist_model");
            $cartlist =$this->product_cartlist_model->gets($this->user->id,'cartlist');
          
        }
        return $cartlist;
      
    }
    public function gets()
    {
        $data['cartlist'] =$this->_gets();
        $this->_template('gets',$data);
    }
    public function ajax_add($id){
        header("Content-Type:application/json");

        $order_count = (int)$this->input->post("order_count");

        if(!is_login()){//비회원일떄
            $cartlist = $this->session->userdata("cartlist");
            if($cartlist){
                if(array_key_exists($id,$cartlist)){
                    $cartlist[$id] += $order_count; 
                }else{
                    $cartlist += array($id => $order_count);
                }
            }else{
                $cartlist = array($id => $order_count);
            }
            $this->session->set_userdata(array("cartlist"=>$cartlist));
            $data = array(
                "confirm_redirect" => array("url"=>site_url(shop_cartlist_uri."/gets"),"msg"=>"장바구니에 추가하였습니다. 확인하시겠습니까?")
            );
            echo json_encode($data);
            return;
        }else { //회원일떄
            $user_id = $this->user->id;
            $this->db->query("INSERT INTO {$this->table} (product_id,user_id,count,kind,created) VALUES ($id,$user_id,{$order_count},'cartlist',NOW()) ON DUPLICATE KEY UPDATE count = count+{$order_count}");
       
            $data = array(
                "confirm_redirect" => array("url"=>site_url(shop_cartlist_uri."/gets"),"msg"=>"장바구니에 추가하였습니다. 확인하시겠습니까?")
            );
            echo json_encode($data);
            return;
        }
    }
	public function ajax_delete($id){
        header("content-type:application/json");
        if(!is_login()){
            $sess_cartlist = $this->session->userdata('cartlist');
            unset($sess_cartlist[$id]);
            $this->session->set_userdata(array("cartlist"=>$sess_cartlist));
            $data = array("reload" => true );
            echo json_encode($data);
            return;
        }else{
            $this->product_cartlist_model->delete($id,$this->user->id,'cartlist');
            $data = array("reload" => true );
            echo json_encode($data);
            return;
        }
    }

    public function ajax_update($id){
        header("content-type:application/json");
        if(!is_login()){
            $count = $this->input->post('product_count');
            $sess_cartlist = $this->session->userdata('cartlist');
            if($count === '0')
                unset($sess_cartlist[$id]);
            else
                $sess_cartlist[$id] = $count;
            $this->session->set_userdata(array("cartlist"=>$sess_cartlist));
            $data =array("reload"=>true);
            echo json_encode($data);
            return;
        }else{
            $count = $this->input->post('product_count');
            $user_id = $this->user->id;
            if($count === '0'){
                $this->product_cartlist_model->delete($id,$user_id,'cartlist');
            }else{
                $this->product_cartlist_model->update($count,$id,$user_id,'cartlist');
            }
            $data =array("reload"=>true);
            echo json_encode($data);
            return;
        }
    }
}
