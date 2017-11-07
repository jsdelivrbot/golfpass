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

            $year = $this->input->post("year");
            if($year === null)
                $year = date("Y");

            $this->db->like("date",$year);
            $rows =$this->p_daily_price_model->_gets(array('product_id'=>$product_id));

            if(count($rows) !== 0){
                foreach($rows as $row)
                {
                    $price[$row->date][$row->num_people][$row->period] = $row->price; 
                }
                // var_dump($price);
                $data['price'] = $price;
            }

            $this->db->select("max(num_people) as maxium_num_peple");
            $this->db->from("$this->table as d_p");
            $this->db->where("d_p.product_id",$product_id);
            $maxium_num_peple = $this->db->get()->row()->maxium_num_peple;
            // $data['maxium_num_peple'] = $maxium_num_peple;
            $data['maxium_num_peple'] = 45;
            // $data['maxium_num_peple'] = 10;
            
            $data['num_period'] = 3;

            $data['year'] = $year;

            $data['start_plus'] = 1;

            $data["product"] = $this->db->where('id',$product_id)->get("products")->row();


            $this->_view("gets_admin", $data);
           
            // $period= $this->input->post("search_period");
            // $period = $period ?: 2;
            // $data['p_daily_price']  = (object)array();
            // $data['mode'] = "add";
            // $data["product"] = $this->db->where('id',$product_id)->get("products")->row();
            
            // $this->db->select("max(num_people) as maxium_num_peple");
            // $this->db->from("$this->table as d_p");
            // $this->db->where("d_p.product_id",$product_id);
            // $maxium_num_peple = $this->db->get()->row()->maxium_num_peple;
            // $data['maxium_num_peple'] = $maxium_num_peple;

            // $sub_query = "";
            // for($i= 1 ; $i <= (int)$maxium_num_peple ; $i++)
            // {
            //     $sub_query .= "(SELECT s_d_p.price FROM {$this->table} as s_d_p WHERE s_d_p.date = d_p.date AND s_d_p.product_id = '$product_id' AND s_d_p.period = '$period' AND s_d_p.num_people = '$i' ) as num_people_{$i} ,";
            // }
            // $sub_query =substr($sub_query,0,-1);

            // $this->db->select("*,$sub_query");
            // $this->db->from("$this->table as d_p");
            // $this->db->where("d_p.product_id",$product_id);
            // $this->db->where("d_p.period",$period);
            // $this->db->group_by("d_p.date");
            // $data["daily_price"] = $this->db->get()->result_array();

            // // $this->_template("gets_admin",$data);
            // $this->_view("gets_admin", $data);
            return;
        } else {
            // set_time_limit(2400);
            set_time_limit(0);
            // var_dump($_POST);
            $arr_days =$this->input->post("day");
            $arr_num_people = $this->input->post("num_people");
            $start_date = $this->input->post("start_date");
            $end_date = $this->input->post("end_date");
            $arr_period = $this->input->post("period");
            $times = $this->input->post("times");
            $price = $this->input->post("price");
         
            $period_times_sw = $this->input->post("period_times_sw");
            $period_times = $this->input->post("period_times");
            $num_people_sw_times = $this->input->post("num_people_sw_times");
            $num_people_times = $this->input->post("num_people_times");
            // if(in_array('2',$arr_period)===true)
        
            if($period_times_sw === '1')
            {
                $cal_price = function($price,$period) use($period_times)
                {
                    $price =(int)$price/2;
                    $price  =(string)round((int)$price * (float)($period_times[$period-2]) * (int)$period);
                    // echo "time :{$period_times[$period-2]} price : {$price} <br>";
                    return $price;
                };
            }
            else
            {
                $cal_price = function($price)
                {
                    return $price;
                };
            }
            if($num_people_sw_times === '1')
            {
                $cal_price_2 = function($price,$num_people) use($num_people_times)
                {
                    $price  =(string)round((int)$price * (float)($num_people_times[$num_people-1]) * (int)$num_people);
                      echo "{$num_people}time :{$num_people_times[$num_people-1]} price : {$price} <br>";
                    return $price;
                };
            }
            else
            {
                $cal_price_2 = function($price)
                {
                    return $price;
                };
            }
            
            // $this->db->db_debug = FALSE; 
            foreach($arr_period as $period)
            {
                $tmp_price =$cal_price($price,$period);
                foreach ($arr_num_people as $num_people) {
                    $insert_price =$cal_price_2($tmp_price,$num_people);
                    $n = 0;
                    do {
                        $date = strtotime("+{$n} day", strtotime($start_date));
                        $date = date("Y-m-d", $date);
                   
                        if(in_array(date('w',strtotime($date)),$arr_days))     //요일검사
                        {
                            $this->db->set("product_id",$product_id);
                            $sql=$this->db->insert_string($this->table,array(
                                    'product_id'=>$product_id,
                                    'date'=>$date,
                                    'num_people'=>$num_people,
                                    'period'=>$period,
                                    'price'=> $insert_price
                            ))."ON DUPLICATE KEY UPDATE price = $insert_price";
                            $this->db->query($sql);
                        }
                      
                        
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
