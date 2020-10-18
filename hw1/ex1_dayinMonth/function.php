<?php

function isleap($year){
    return ($year % 4) || (($year % 100 === 0) && ($year % 400)) ? 0 : 1;
}

function daysinMonth($month, $year, $days_arr){

    foreach($days_arr as $key => $days){
        if($month == $key && !empty($days)){
            return $days;
        }else if($month == $key && empty($days)){
            $isleapYear = isleap($year);
            return 28 + $isleapYear;
        }
    }
    
}