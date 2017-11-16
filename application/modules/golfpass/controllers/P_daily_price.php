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

        $start_date = $this->input->post("start_date");
        $end_date = $this->input->post("end_date");

        //설정 날자차이가 음수일때
        if(strtotime($end_date) < strtotime($start_date))
        {
            $data['total_price'] = "올바르게 설정되지 않았습니다.";
            echo json_encode($data);
            return;
        }

        $product_id = $this->input->post("product_id");
        $num_people = $this->input->post("num_people");
        // $start_date = "2017-11-01";
        // $end_date  ="2017-11-02";
      
        $end_date =date("Y-m-d",strtotime("{$end_date} +1 days"));

        $obj_start_date = date_create($start_date);
        $obj_end_date = date_create($end_date);
        $period = date_diff($obj_start_date, $obj_end_date)->days;

        // //start date하나로 계산
        // $row=$this->p_daily_price_model->_get(array(
        //             'product_id'=>$product_id,
        //             'date'=>$start_date,
        //             'period'=>$period,
        //             'num_people'=>$num_people
        //         ));
        // if($row !== null)
        //     $total_price = "{$row->price}원";
        // else
        //     $total_price = "데이터값 없음";

        // $data['total_price'] = $total_price;
        // echo json_encode($data);
        
        // return;
        // // start date하나로 계산
      
      
         //하루예약시
        if($period <= 1)
        {
            $data['total_price'] = "1일 예약은 불가능합니다.";
            echo json_encode($data);
            return;
        }

        //  //날자 하나씩 계산
        // $total_price =0;
        // for($i =0 ; $i < $period ; $i++)
        // {
        //     $date = date("Y-m-d",strtotime("{$start_date} +{$i} days"));
        //     $row=$this->p_daily_price_model->_get(array(
        //         'product_id'=>$product_id,
        //         'date'=>$date,
        //         'period'=>$period,
        //         'num_people'=>$num_people
        //     ));
        //     //해당 날자데이터가 없을때
        //     if($row === null)
        //     {
        //         $data['total_price'] = "{$date}가격이 없습니다 <br> 예약이 불가능합니다.";
        //         echo json_encode($data);
        //         return;
        //     }

        //     $tmp_price =$row->price;
        //     $total_price += (int)$tmp_price/$period;
        // }

        // $data['total_price'] = $total_price."원";
        // echo json_encode($data);
        
        // return;
        // //날자 하나씩 계산

    //    1박 2일 데이터로만 계산
      $total_price =0;
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
                $data['total_price'] = "{$date} <br> {$num_people}인 데이터가 존재하지 않습니다. <br>예약이 불가능합니다";
                echo json_encode($data);
                return;
            }

            $tmp_price =$row->price;
            $total_price += (int)$tmp_price/2;
        }

        $data['total_price'] = $total_price."원";
        echo json_encode($data);
        
        return;
     
 //    1박 2일 데이터로만 계산

    }

}