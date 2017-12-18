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
    function ajax_add($product_id)
    {
        header("Content-Type:application/json");

        $this->fv->set_rules("num_people", "명", "required");
        $this->fv->set_rules("date", "날짜", "required");
        $this->fv->set_rules("period", "기간", "required");
        $this->fv->set_rules("price", "가격", "required");
        if($this->fv->run() === false)
        {
            $data['alert'] =  validation_errors(false,false);
        } 
        else
        {
            $num_people = $this->input->post("num_people");
            $date = $this->input->post("date");
            $period = $this->input->post("period");
            $price = $this->input->post("price");
            $price = eval("return $price;");
            $this->db->set("product_id",$product_id);
            $sql=$this->db->insert_string($this->table,array(
                    'product_id'=>$product_id,
                    'date'=>$date,
                    'num_people'=>$num_people,
                    'period'=>$period,
                    'price'=> $price
            ))."ON DUPLICATE KEY UPDATE price = $price";
            $this->db->query($sql);
    
            $data['reload'] =true;
            $data['loding'] =".loding";
        }
        
      
        echo json_encode($data);
        return;

    }
    function ajax_add_all($product_id)
    {
        header("Content-Type:application/json");
        
        $this->_set_rules();
        if($this->fv->run() === false)
        {
            $data['alert'] =  validation_errors(false,false);
        } 
        else 
        {
             set_time_limit(0);
             $start_plus = $this->input->post("start_plus");
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
            
             for ($i=0; $i < count($num_people_times); $i++) { 
                 $num_people_times[$i] = eval("return $num_people_times[$i];");
             }
             if($period_times_sw === '1')
             {
                 $cal_price = function($price,$period) use($period_times,$start_plus)
                 {
                     
                    //  $price =(float)$price/2;
                     $price  =(string)((float)$price * (float)($period_times[$period-1-$start_plus]) * (float)$period);
                    //  $price  =(string)round((float)$price * (float)($period_times[$period-1-$start_plus]) );
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
                    //  $price  =(string)round((float)$price * (float)($num_people_times[$num_people-1]) * (float)$num_people);
                     $price  =(string)round((float)$price * (float)($num_people_times[$num_people-1]));
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

             ////////////////데이터
            //  $year = $this->input->post("year");
            //  if($year === null)
            //      $year = date("Y");
 
            //  $this->db->like("date",$year);
            //  $rows =$this->p_daily_price_model->_gets(array('product_id'=>$product_id));
 
            //  $price = array();
            //  if(count($rows) !== 0){
            //      foreach($rows as $row)
            //      {
            //             $price[$row->date][$row->num_people][$row->period] = $row->price; 
            //      }
            //      $data['price'] = $price;
            //  }
            //  $data['maxium_num_peple'] = 45;
            //  $data['num_period'] = 3;
            //  $data['year'] = $year;
            //  $data['start_plus'] = 1;
            //  $data["product"] = $this->db->where('id',$product_id)->get("products")->row();

            //  ob_start();
            //   $this->_view("ajax_target", $data);
            //  $output = ob_get_clean();

            //  $data['change']['html'] = $output;
            //  $data['change']['target'] = ".target";

             /////////////데이터
             
            //  $data['alert'] ="완료";
             $data['reload'] =true;
             $data['loding'] =".loding";
            }
        
        echo json_encode($data);
        return;
    }
    function ajax_update($id)
    {
        header("content-type:application/json");

        $num_people = $this->input->post("num_people");
        $data['alert'] = "$num_people";
        echo json_encode($data);
        return;
    }
    
    function add($product_id,$year=null)
    {
        

            if($year === null)
                $year = date("Y");

            $this->db->like("date",$year);
            $rows =$this->p_daily_price_model->_gets(array('product_id'=>$product_id));

            if(count($rows) !== 0){
                foreach($rows as $row)
                {
                    
                    $price[$row->date][$row->num_people][$row->period] =  _cal_apply_exchangeRate_to_price($row->price);
                }
                // var_dump($price);
                $data['price'] = $price;
            }

            $this->db->select("max(num_people) as maxium_num_peple");
            $this->db->from("$this->table as d_p");
            $this->db->where("d_p.product_id",$product_id);
            $maxium_num_peple = $this->db->get()->row()->maxium_num_peple;
            // $data['maxium_num_peple'] = $maxium_num_peple;
            $data['maxium_num_peple'] = 4;
            
            $data['num_period'] = 1;

            $data['year'] = $year;

            $data['start_plus'] = 0;

            $data["product"] = $this->db->where('id',$product_id)->get("products")->row();
            

            $this->_view("gets_admin", $data);
           
           
            return;
    
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
    // function ajax_add()
    // {
    //     header("Content-Type:application/json");

    //     parent::_set_rules();
    //      // $this->_set_rules();
    //     if ($this->fv->run() === false) {
    //         $data['alert'] =  validation_errors(false, false);
    //     } else {
    //         parent::_dbSet_addUpdate();
    //         // $this->_dbSet_addUpdate();
    //         $insert_id =$this->{$this->model}->_add();
    //         $data['alert'] ="완료";
    //         $data['reload'] =true;
    //     }
    //     echo json_encode($data);
    //     return;
    // }


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
