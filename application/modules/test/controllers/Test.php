<?php
defined('BASEPATH') or exit('No direct script access allowed');

// use Ivory\GoogleMap\Helper\Builder\ApiHelperBuilder;
// use Ivory\GoogleMap\Helper\Builder\MapHelperBuilder;
// use Ivory\GoogleMap\Map;
// use Ivory\GoogleMap\Layer\GeoJsonLayer;
class Test extends Public_Controller
// class Sample extends Public_Controller
{

    function __construct()
    {
        parent::__construct();
        
        $this->load->library("map_api");
        $this->map_api->api_key = $this->setting->google_map_api_key;
        
    }
    function test3(){
        $this->_view("test");
    }
        
    function css()
    {
        $this->fv->set_rules('html',"html","required");
        if($this->fv->run() === false)
        {
            $this->_view("css");
        }
        else
        {
            $html=$this->input->post("html");
            // $html =preg_match("/(?<=\bclass=\"[^\"]*?)[^\"\s]+/",$html,$match);

            // $url = "www.exampe.com/id/1234";
            // preg_match("/(?<=id\/)\d+/",$url,$matches);
            // print_r($matches);

            $html =preg_match_all("/\.(-?[_a-zA-Z]+[_a-zA-Z0-9-]*)[^}]+{/",$html,$match);

            // var_dump($html);
            var_dump($match);
        }


    }
    function test2()
    {
        $per_page = 2;
        $offset= 0;
        $total_rows =3;
        $this->db->select("{$total_rows}-{$offset}-@count 'numrow', @count:=@count+1 'none'");
        $this->db->from("(SELECT @count:=0) der_tap");
        $this->db->select("p.name '상품이름' , u.userName '유저아이디'")
        ->from("product_cartlist as c")
        ->join("users u","c.user_id = u.id","LEFT")
        ->join("products as p","p.id = c.product_id","LEFT")
        ->where("u.id","1")
        ->limit($per_page,$offset);

        $result = $this->db->get()->result();
        var_dump($result);
        

        // $r=$this->db->query("SELECT @rownum:=@rownum+1 'rownum' FROM users as u , (SELECT @rownum:=0,@num_rows:=40) der_tab")->result();;
        // var_dump($r);
        // $this->_view("test/test2");
    }
   
    function add($id=null)
    {
    $t=array("홈"=>"1");
        var_dump($t['홈']);

        // $r=$this->db->query("SELECT group_concat(c.title) FROM users as u INNER JOIN board_contents as c ON u.id = c.user_id WHERE u.id = 3 GROUP BY u.id")->result();

        // var_dump($r);

    }
    function product($id)
    {
        $this->load->model("shop/products_model");
        $t =$this->products_model->get($id);

        var_dump($t);
    }
    function semantic()
    {
        $this->_view("test/semantic");
        // $this->_template("test/semantic",array(),"golfpass");
    }




    
 
    function admin()
    {
        // $this->_template("test/admin",array(),"admin");
        $this->_view("test/admin");
    }
    function cal()
    {
        $m = 2;
        $year =2016;
        echo date('t', mktime(0, 0, 0, $m, 1, $year)); 

        $num_days = cal_days_in_month(CAL_GREGORIAN, $m, $year);
        echo $num_days;
    }
    function int()
    {
        $i = (int)10;
        $j = (float)"0.866";
        var_dump($j);
        var_dump((string)round(($i * $j)));

    }
    function date_test()
    {
           // $daily = array('일','월','화','수','목','금','토');


        // echo "현재:".date("Y-m-d H:i:s W");
        // echo "<br>";
        // echo "현재:".date("Y-m-d H:i:s",time());
        // echo "<br>";
        // echo "-1 월:".date("Y-m-d H:i:s",strtotime ("-6 months"));
        // echo "<br>";
        // echo "+1 일:".date("Y-m-d H:i:s",strtotime ("-31 days"));
        // echo "+1 일:".date("Y-m-d",strtotime ("+1 days"));
        // $date = "2017-10-31";
        // $date = strtotime($date);
        // $date = strtotime("+1 day", $date);
        // var_dump($date);
        // echo date('Y-m-d', $date);
        // echo "+1 일:".date("2017-05-01",strtotime ("+2 days"));
        // echo "<br>";
        // echo "+1 년".date("Y-m-d H:i:s",strtotime ("+1 years"));
        // echo "<br>";
        // echo "+24 시간".date("Y-m-d H:i:s",strtotime ("+24 hours"));
        // echo "<br>";
        // echo "+ 분: ".date("Y-m-d H:i:s",strtotime ("+{360*1} minutes"));
        // echo "<br>";

        // echo "<br>";

        // echo "<br>";


        // // $startDate = date_create(date('Y-m-d')); // 오늘 날짜입니다.
        // $startDate = date_create('2016-02-01'); // 오늘 날짜입니다.
        // $targetDate = date_create('2017-02-01'); // 타겟 날짜를 지정합니다.
        // $interval = date_diff($startDate, $targetDate,true);
         
        // echo $interval->days;
        // echo "<br>";
        
        // var_dump($interval);
        // // for($i=0; $i<$interval->days ; $i++ ){
        // //     echo "+{$i} 일:".date("Y-m-d H:i:s",strtotime ("+{$i} days"));
        // //     echo "<br>";
        // // }

        // echo "+{$interval->days} 일:".date("Y-m-d H:i:s",strtotime ("+{$interval->days} days"));

        // $startDate = '2017-11-31'; // 오늘 날짜입니다.
        // $targetDate = '2017-12-14'; // 타겟 날짜를 지정합니다.
        // // $startDate = '2016-02-01'; // 오늘 날짜입니다.
        // // $targetDate = '2017-02-01'; // 타겟 날짜를 지정합니다.
        // $interval = date_diff(date_create($startDate), date_create($targetDate),true);
        // echo "<br>";
        // echo "<br>";
        // echo "차이: ".$interval->days;
        // echo "<br>";
        // echo "<br>";
        // echo "워킹데이: ".$num_working_days=$this->number_of_working_days($startDate, $targetDate);
        // echo "<br>";
        // echo "주말: ".$num_weekend_days=$this->number_of_weekend_days($startDate, $targetDate);
        // echo "<br>";
        // echo "합: ".($num_weekend_days + $num_working_days);

        // echo "<br>";
        // echo "<br>";
        // $obj_num_days =$this->number_of_days($startDate, $targetDate);
        // echo "워킹데이: ".$num_working_days=$obj_num_days->num_workingdays;
        // echo "<br>";
        // echo "주말: ".$num_weekend_days=$obj_num_days->num_weekenddays;
        // echo "<br>";
        // echo "공휴일: ".$num_holidays=$obj_num_days->num_holidays;
        // echo "<br>";
        // echo "합: ".$obj_num_days->num_days;
        // // var_dump($num_working_days);
        // // var_dump($num_weekend_days);
    }
    function index()
    {
        // $this->load->helper("date");
        $this->load->library("date");
        $startDate = '2017-11-30'; // 오늘 날짜입니다.
        $targetDate = '2017-12-14'; // 타겟 날짜를 지정합니다.
         echo "<br>";
        echo "<br>";
        $obj_num_days =$this->date->number_of_days($startDate, $targetDate);
        // $obj_num_days =number_of_days($startDate, $targetDate);
        echo "워킹데이: ".$num_working_days=$obj_num_days->num_workingdays;
        echo "<br>";
        echo "주말: ".$num_weekend_days=$obj_num_days->num_weekenddays;
        echo "<br>";
        echo "공휴일: ".$num_holidays=$obj_num_days->num_holidays;
        echo "<br>";
        echo "합: ".$obj_num_days->num_days;
        echo "<br>";
        echo "<br>";
        $current_year = (int)date("Y");
   var_dump($current_year);     
   var_dump((string)$current_year);     


   echo "<br>";
   echo "<br>";
   $date = "2017-01-01";
   $in_date = strtotime($date);
   
   $sw=0;
        for($i= 0 ;$i<= 365 ;$i++)
        {
            $date = strtotime("+{$i} day", $in_date);
            

            $month = date('n', $date);
            if($sw !== $month)
            {
                $sw = $month;
                echo "<br><br> <b>{$month}월</b><br>";
            }
            
            echo date('Y-m-d', $date);
            echo "<br>";


            $solar = (object)array();
            $solar->solarYear = (int)date('Y', $date);
            $solar->solarMonth =(int)date('n', $date);
           $solar->solarDay =(int)date('j', $date);
            $lunar = Date::SolarToLunar($solar);
            echo ($lunar);
            echo "<br>";
            echo "<br>";
        }
     $solar = (object)array();
     $solar->solarYear = 2016;
     $solar->solarMonth = 4;
     $solar->solarDay = 6;
     $lunar = Date::SolarToLunar($solar);

    //  var_dump($lunar);
        // echo "<br>";
        // echo "<br>";
        // $solar =$this->date->LunarToSolar('2018-01-01');
        // var_dump($solar);
        // echo "<br>";


      

    }

    function number_of_days($from, $to) {
        $workingDays = [1, 2, 3, 4, 5]; # date format = N (1 = Monday, ...)
        $weekendDays = [6,7]; # date format = N (1 = Monday, ...)
        $holidayDays = ['*-12-03']; # variable and fixed holidays
        // $holidayDays = ['*-12-25', '*-01-01', '2013-12-23']; # variable and fixed holidays
    
        $from = new DateTime($from);
        $to = new DateTime($to);
        $to->modify('+1 day');
        $interval = new DateInterval('P1D');
        $periods = new DatePeriod($from, $interval, $to);
    
         $num_workingdays = 0;
        $num_holidays =0;
        $num_weekenddays=0;
        foreach ($periods as $period) {
            //날짜 카운팅(공휴일, 주말 제외)
            if (in_array($period->format('N'), $workingDays) && !in_array($period->format('*-m-d'), $holidayDays) && !in_array($period->format('Y-m-d'), $holidayDays))
            {
               $num_workingdays++;
            }
            //주말카운팅 (공휴일제외)
            if (in_array($period->format('N'), $weekendDays) && !in_array($period->format('*-m-d'), $holidayDays) && !in_array($period->format('Y-m-d'), $holidayDays))
            {
               $num_weekenddays++;
            }
            //공휴일 카운팅
            if (in_array($period->format('*-m-d'), $holidayDays)||in_array($period->format('*-m-d'), $holidayDays))
            {
                $num_holidays++;
            }
        }
        //전체일수
        $num_days = $num_workingdays + $num_holidays +$num_weekenddays;
        return (object)array('num_holidays'=>$num_holidays,'num_workingdays'=>$num_workingdays,'num_weekenddays'=>$num_weekenddays,'num_days'=>$num_days);
    }
    function number_of_working_days($from, $to) {
        $workingDays = [1, 2, 3, 4, 5]; # date format = N (1 = Monday, ...)
        // $holidayDays = ['*-12-25', '*-01-01', '2013-12-23']; # variable and fixed holidays
        $holidayDays = ['*-12-03']; # variable and fixed holidays
        // $holidayDays = []; # variable and fixed holidays
    
        $from = new DateTime($from);
        $to = new DateTime($to);
        $to->modify('+1 day');
        $interval = new DateInterval('P1D');
        $periods = new DatePeriod($from, $interval, $to);
    
        $days = 0;
        foreach ($periods as $period) {
            if (!in_array($period->format('N'), $workingDays)) continue;
            if (in_array($period->format('Y-m-d'), $holidayDays)) continue;
            if (in_array($period->format('*-m-d'), $holidayDays)) continue;
            $days++;
        }
        return $days;
    }
    function number_of_weekend_days($from, $to) {
        $workingDays = [6,7]; # date format = N (1 = Monday, ...)
        $holidayDays = ['*-12-03']; # variable and fixed holidays
    
        // $holidayDays = []; # variable and fixed holidays
    
        $from = new DateTime($from);
        $to = new DateTime($to);
        $to->modify('+1 day');
        $interval = new DateInterval('P1D');
        $periods = new DatePeriod($from, $interval, $to);
    
        $days = 0;
        foreach ($periods as $period) {
            if (!in_array($period->format('N'), $workingDays)) continue;
            if (in_array($period->format('Y-m-d'), $holidayDays)) continue;
            if (in_array($period->format('*-m-d'), $holidayDays)) continue;
            $days++;
        }
        return $days;
    }

  

}