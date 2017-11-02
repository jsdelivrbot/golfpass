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
        // $data['p_daily_price'] = $this->{$this->model}->_gets_with_pgi(null,'style_1');
        // $data['p_daily_price'] = $this->{$this->model}->_gets();
        $data["product_id"] = $product_id;
        // $this->_template("gets_admin",$data);
        $this->_view("gets_admin", $data);
    }

    function add($product_id)
    {
        
        $this->_set_rules();
        if ($this->fv->run() === false) {
            $data['p_daily_price']  = (object)array();
            $data['mode'] = "add";
            $data["product_id"] = $product_id;
            // $this->_template("gets_admin",$data);
            $this->_view("gets_admin", $data);
            return;
        } else {
            // var_dump($_POST);
            $arr_days =$this->input->post("day");
            $arr_num_people = $this->input->post("num_people");
            $start_date = $this->input->post("start_date");
            $end_date = $this->input->post("end_date");
            foreach ($arr_num_people as $num_people) {
                $n = 0;
                do {
                    $date = strtotime("+{$n} day", strtotime($start_date));
                    $date = date("Y-m-d", $date);
                    $this->p_daily_price_model->_add(array(
                        'product_id'=>$product_id,
                        'date'=>$date,
                        'num_people'=>$num_people,
                        'price'=>'1000'
                    ));
                    $n++;
                } while ($date !== $end_date);
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
    }

    function _dbSet_addUpdate()
    {
        $this->db->set("name", $this->input->post("name"));
    }
}
