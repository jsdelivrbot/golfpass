<?php
defined('BASEPATH') or exit('No direct script access allowed');

class P_daily_price extends Base_Controller
{

    function __construct()
    {
        parent::__construct(array(
            'table'=>'p_daily_price',
            'view_dir'=>'p_daily_price'
        ));
        
    }
    function ajax_cal()
    {
        header("Content-Type:application/json");
        date_default_timezone_set('Asia/Seoul');

        // $product_id = $this->input->post("product_id");
        // $num_people = $this->input->post("num_people");
        // $start_date = $this->input->post("start_date");
        // $end_date = $this->input->post("end_date");
        $product_id = $this->input->post("product_id");
        $num_people = $this->input->post("num_people");
        $start_date = "2017-11-01";
        $end_date  ="2017-11-02";
      
        $end_date =date("Y-m-d",strtotime("{$end_date} +1 days"));

        $obj_start_date = date_create($start_date);
        $obj_end_date = date_create($end_date);
        $period = date_diff($obj_start_date, $obj_end_date)->days;

        //start date하나로 계산
        $row=$this->p_daily_price_model->_get(array(
                    'product_id'=>$product_id,
                    'date'=>$start_date,
                    'period'=>$period,
                    'num_people'=>$num_people
                ));
        if($row !== null)
            $total_price = $row->price;
        else
            $total_price = "데이터값 없음";

        $data['total_price'] = $total_price;
        echo json_encode($data);
        
        return;
        // start date하나로 계산
        // //날자 하나씩 계산
        // $price =0;
        // for($i =0 ; $i < $period ; $i++)
        // {
        //     $date = date("Y-m-d",strtotime("{$start_date} +{$i} days"));
        //     $tmp_price=$this->p_daily_price_model->_get(array(
        //         'product_id'=>$product_id,
        //         'date'=>$date,
        //         'period'=>$period,
        //         'num_people'=>$num_people
        //     ))->price;

        //     $price += (int)$tmp_price/$period;
        // }
        // //날자 하나씩 계산

       

     


    }

}