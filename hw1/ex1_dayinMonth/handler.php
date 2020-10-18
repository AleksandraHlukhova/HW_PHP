<?php


$year = $_POST['year'];
$month = $_POST['month'];

if(!empty($year)){
    
    $isLeapYear = (isleap($year)) ? 'is leap' : 'is not leap';
    $dayinMonth = daysinMonth($month, $year, $days_arr);

}else{
    $errors = [
        'year' => 'Enter year before calculation!',
    ];
}

