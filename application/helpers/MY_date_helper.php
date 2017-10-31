<?php 
function is_leap_year($year) {
	return ((($year % 4) == 0) && ((($year % 100) != 0) || (($year % 400) == 0)));
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




?>