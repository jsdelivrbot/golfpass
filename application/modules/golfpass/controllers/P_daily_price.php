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

        
        //설정 날자차이가 음수일때  오늘보다 시작날자가 이전일시
        if(strtotime($end_date) < strtotime($start_date) || strtotime($start_date) < strtotime(date("Y-m-d")))
        {
            $data['total_price'] = "잘못된 날짜";
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

     
      
      
    
         //하루예약시
        if($period <= 1)
        {
            $data['total_price'] = "1일 예약 불가";
            echo json_encode($data);
            return;
        }
        //날자차이가 10일 이상일떄
        if($period >= 90)
        {
            $data['total_price'] = "90일이상 예약 불가";
            echo json_encode($data);
            return;
        }

      
        $this->num_people = $num_people;
        $this->start_date = $start_date;
        $this->end_date = $end_date;
        $this->period = $period;
        $this->product_id = $product_id;
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
    //   $total_price =0;
    //     for($i =0 ; $i < $period ; $i++)
    //     {
    //         $date = date("Y-m-d",strtotime("{$start_date} +{$i} days"));
    //         $row=$this->p_daily_price_model->_get(array(
    //             'product_id'=>$product_id,
    //             'date'=>$date,
    //             'period'=>"2",
    //             'num_people'=>$num_people
    //         ));
    //         //해당 날자데이터가 없을때
    //         if($row === null)
    //         {
    //             // $data['total_price'] = "{$date} <br> {$num_people}인 데이터가 존재하지 않습니다. <br>예약이 불가능합니다";
    //             $data['total_price'] = "가격 데이터가 존재하지 않습니다. <br>예약이 불가능합니다";
    //             // $data['total_price'] = "(인)수를 선택해주세요.";
    //             echo json_encode($data);
    //             return;
    //         }

    //         $tmp_price =$row->price;
    //         $total_price += (int)$tmp_price/2;
    //     }


    //임시방편
    // $groups =array();
    // while($num_people !== 0) 
    // {
    //     if($num_people >=4)
    //     {
    //         $n=4;
    //     }
    //     else
    //     {
    //         $n =$num_people;
    //     }
    //     $num_people=$num_people -$n;
    //     array_push($groups,$n);
    // }   
    //임시방편

        $this->groups = $this->input->post("groups");
        // $data['total_price'] = $this->groups;
        // echo json_encode($data);
        // return;

        // $this->groups = $groups;
        $config['groups']= $this->input->post("groups");
        $config['num_people']= $num_people;
        $config['start_date']= $start_date;
        $config['end_date']=  $this->input->post("end_date");;
        $config['product_id']= $product_id;
        // $config['period']= $period;
        $total_price= $this->_cal_by_group($config);
        $data['total_price'] = $total_price;
        // $data['total_price'] = $total_price."원";
        echo json_encode($data);
        return;
     
 //    1박 2일 데이터로만 계산

    }
    function test()
    {
        return 1;
    }
    function _cal_by_group($config)
    {
        foreach($config as $key=>$val)
        {
            $$key = $val;
        }
        // $groups = $this->groups;
        // $num_people = $this->num_people;
        // $start_date = $this->start_date;
        // $end_date = $this->end_date;
        // $product_id = $this->product_id;
        $end_date =date("Y-m-d",strtotime("{$end_date} +1 days"));
        $obj_start_date = date_create($start_date);
        $obj_end_date = date_create($end_date);
        $period = date_diff($obj_start_date, $obj_end_date)->days;
        //조별 가격으로 계산
        $total_price =0;
        //전체 그룹 인원수와 num_people 수 같은지 체크
        $tmp_total_num_people = 0;
        for($i = 0 ; $i < count($groups) ; $i++)
        {
            $tmp_total_num_people += (int)$groups[$i];
        }
        // return $groups;
        // return $tmp_total_num_people;
        if((string)$tmp_total_num_people !== (string)$num_people)
        {
            return "조를 편성해주세요.";
        }
        for($i =0 ; $i < $period ; $i++)
        {
            $date = date("Y-m-d",strtotime("{$start_date} +{$i} days"));
            for($j = 0 ; $j < count($groups) ; $j++)
            {
                $row=$this->p_daily_price_model->_get(array(
                'product_id'=>$product_id,
                'date'=>$date,
                'period'=>"1",
                'num_people'=>$groups[$j]
            ));
            //해당 날자데이터가 없을때
            if($row === null)
            {
                  return "데이터값 없음";
            }

            $tmp_price =$row->price;
            $total_price += (int)$tmp_price;
            }
        }
        return $total_price."원";      
        
    }

}