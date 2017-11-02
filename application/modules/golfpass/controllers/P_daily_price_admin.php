<?php
defined('BASEPATH') or exit('No direct script access allowed');

class P_daily_price_admin extends Admin_Controller
{

    function __construct()
    {
        parent::__construct(array(
            'table'=>'p_daily_price',
            'view_dir'=>'p_daily_price'
        ));
    }
    function get($id)
    {
        $data['p_daily_price'] = $this->{$this->model}->_get($id);
    }
    function gets($product_id)
    {
        // // $data['p_daily_price'] = $this->{$this->model}->_gets_with_pgi(null,'style_1');
        // // $data['p_daily_price'] = $this->{$this->model}->_gets();

        // $data["product"] = $this->db->where('id',$product_id)->get("products")->row();
        // // $this->_template("gets_admin",$data);
        // $this->_view("gets_admin", $data);
    }

    function add($product_id)
    {
        
        $this->_set_rules();
        if ($this->fv->run() === false) {
            $period= $this->input->post("period");
            $period = $period ?: 2;
            $data['p_daily_price']  = (object)array();
            $data['mode'] = "add";
            $data["product"] = $this->db->where('id',$product_id)->get("products")->row();
            
            $this->db->select("max(num_people) as maxium_num_peple");
            $this->db->from("$this->table as d_p");
            $this->db->where("d_p.product_id",$product_id);
            $maxium_num_peple = $this->db->get()->row()->maxium_num_peple;
            $data['maxium_num_peple'] = $maxium_num_peple;

            $sub_query = "";
            for($i= 1 ; $i <= (int)$maxium_num_peple ; $i++)
            {
                $sub_query .= "(SELECT s_d_p.price FROM {$this->table} as s_d_p WHERE s_d_p.date = d_p.date AND s_d_p.product_id = '$product_id' AND s_d_p.period = '$period' AND s_d_p.num_people = '$i' ) as num_people_{$i} ,";
            }
            $sub_query =substr($sub_query,0,-1);

            $this->db->select("*,$sub_query");
            $this->db->from("$this->table as d_p");
            $this->db->where("d_p.product_id",$product_id);
            $this->db->where("d_p.period",$period);
            $this->db->group_by("d_p.date");
            $data["daily_price"] = $this->db->get()->result_array();

            // $this->_template("gets_admin",$data);
            $this->_view("gets_admin", $data);
            return;
        } else {
            // var_dump($_POST);
            $arr_days =$this->input->post("day");
            $arr_num_people = $this->input->post("num_people");
            $start_date = $this->input->post("start_date");
            $end_date = $this->input->post("end_date");
            $arr_period = $this->input->post("period");
            $times = $this->input->post("times");
            $price = $this->input->post("price");
         
            $price =(int)$price/2;
            foreach($arr_period as $period)
            {
                foreach ($arr_num_people as $num_people) {
                    $n = 0;
                    do {
                        $date = strtotime("+{$n} day", strtotime($start_date));
                        $date = date("Y-m-d", $date);
                        $this->p_daily_price_model->_add(array(
                            'product_id'=>$product_id,
                            'date'=>$date,
                            'num_people'=>$num_people,
                            'period'=>$period,
                            'price'=> (string)((int)$price * (int)$period)
                        ));
                        $n++;
                    } while ($date !== $end_date);
                }
            }


            // for()
            // $this->P_daily_price_model->_add(array());
            // parent::_dbSet_addUpdate();
            // // $this->_dbSet_addUpdate();
            // $insert_id =$this->{$this->model}->_add();
            // my_redirect(p_daily_price_uri."/update/$insert_id");
            // // my_redirect($_SERVER['HTTP_REFERER']);
            // return;
        }
    }

    function update($id)
    {
        parent::_set_rules();
        // $this->_set_rules();
        if ($this->fv->run() === false) {
            $data['panel']  = $this->{$this->model}->_get($id);
            $data['mode'] = "update/$id";
            $this->_template("admin_addUpdate", $data);
            return;
        } else {
            parent::_dbSet_addUpdate();
            // $this->_dbSet_addUpdate();
            $this->{$this->model}->_update($id);
            // my_redirect(p_daily_price_uri."/update/$insert_id");
            my_redirect(p_daily_price_uri."/get/$id");
            // my_redirect($_SERVER['HTTP_REFERER']);
            return;
        }
    }
    function delete($id)
    {
        $this->{$this->model}->_delete($id);
        my_redirect(p_daily_price_uri."/gets");
        // my_redirect($_SERVER['HTTP_REFERER']);
    }
    function ajax_add()
    {
        header("Content-Type:application/json");

        parent::_set_rules();
         // $this->_set_rules();
        if ($this->fv->run() === false) {
            $data['alert'] =  validation_errors(false, false);
        } else {
            parent::_dbSet_addUpdate();
            // $this->_dbSet_addUpdate();
            $insert_id =$this->{$this->model}->_add();
            $data['alert'] ="완료";
            $data['reload'] =true;
        }
        echo json_encode($data);
        return;
    }


    public function ajax_delete($id)
    {
        header("content-type:application/json");
        $this->{$this->model}->_delete($id);

        $data = array("reload"=>true);
        echo json_encode($data);
        return;
    }
    function _set_rules()
    {
        $this->fv->set_rules("start_date", "시작날자", "required");
        $this->fv->set_rules("end_date", "끝날자", "required");
        $this->fv->set_rules("num_people[]", "사람수", "required");
    }

    function _dbSet_addUpdate()
    {
        $this->db->set("name", $this->input->post("name"));
    }
}
