<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Test extends Public_Controller
{

    function __construct()
    {
        parent::__construct();
    }
    function addAll()
    {
        $this->load->model('shop/ref_cate_product_model');
        $this->load->model('admin/categories_model');
        $this->load->model('shop/products_model');

        $cateAll =$this->categories_model->_get(array("name"=>"전체"));

        $allProducts = $this->products_model->_gets();
        foreach ($allProducts as $product) {
            $this->ref_cate_product_model->_add(array("product_id"=>$product->id,"cate_id"=>$cateAll->id));
        }
    }
    function test2()
    {
     
        $result =$this->db->query("SELECT u.id, count(p.id) as num FROM users as u,products as p WHERE u.id = p.id")->result();
        // $this->db->select("u.*, count(p.id)");
        // $this->db->from("users as u ");
        // $this->db->join("products as p","p.id = u.id","left");
        // $this->db->join("products as p","p.id = u.id","left");
        // $result =$this->db->get()->result();

        $sub_query = '';
        $sub = "SELECT o3.name FROM product_option as o3 WHERE o3.product_id = o.product_id AND o3.kind = 'photo' ORDER BY o3.sort ASC LIMIT 0,1";
        $sub_query .= ",($sub) as photo";

        $more_select = '';
        $more_select .= ", GROUP_CONCAT(o2.name) as photos";
        $more_select .= ", (avg(r.score_1)+ avg(r.score_2) + avg(r.score_3)+ avg(r.score_4)+ avg(r.score_5)+ avg(r.score_6)+ avg(r.score_7)+ avg(r.score_8))/8 as avg_score ";
        $this->db->select("count(o.id),o.id as option_id, o.sort,p.*". $more_select . $sub_query)
        ->from("product_option as o")
        ->join("products as p","p.id = o.product_id","LEFT")
        ->join("product_option as o2","o.product_id = o2.product_id AND o2.kind = 'photo'","LEFT")
        ->join("product_reviews as r","o.product_id = r.product_id AND r.is_secret = 1","LEFT")
        ->where("o.kind","main")
        ->order_by("o.sort","asc")
        ->group_by("o.product_id");
        $result=  $this->db->get()->result();
        var_dump($result);
     
    }
    public function test3($var = null)
    {
        $x= 11 ;
        $y= 10.1;
        $z =round($x * $y);
        // $z =$x * $y;
        var_dump($z);
        // $data['tmp']= 1234;
        // $this->load->view('test3', $data, FALSE);
        
    }
    function index()
    {
       
    }
    function login_success()
    {
          // Initialize variables
        $app_id = "412089359205918";
        $secret = "f80bc29dcdb2830b800ac987e8bd2d36";
        $version = "v2.11"; // 'v1.1' for example

        // Method to send Get request to url
     

        // Exchange authorization code for access token
        $token_exchange_url = 'https://graph.accountkit.com/'.$version.'/access_token?'.
          'grant_type=authorization_code'.
          '&code='.$_POST['code'].
          "&access_token=AA|$app_id|$secret";
        $data = $this->doCurl($token_exchange_url);
        $user_id = $data['id'];
        $user_access_token = $data['access_token'];
        $refresh_interval = $data['token_refresh_interval_sec'];

        // Get Account Kit information
        $me_endpoint_url = 'https://graph.accountkit.com/'.$version.'/me?'.
          'access_token='.$user_access_token;
        $data = $this->doCurl($me_endpoint_url);
        $phone = isset($data['phone']) ? $data['phone']['number'] : '';
        $email = isset($data['email']) ? $data['email']['address'] : '';
    }
    
    function doCurl($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $data = json_decode(curl_exec($ch), true);
        curl_close($ch);
        return $data;
    }
}
