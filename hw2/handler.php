<?php

if(is_array($temp) && count($temp) > 0){
    $everageTemp = round(array_sum($temp)/count($temp), 2);

    $lowest = [];
    $highest = [];
    $unique_temp = array_unique($temp);
    sort($unique_temp);

    for($i = 0; $i < NUMB_OF_HIGHEST; $i++){
        $lowest[] = $unique_temp[$i];
    }
    
    for($i = count($unique_temp)-1; $i > NUMB_OF_HIGHEST; $i--){
        $highest[] = $unique_temp[$i];
    }

}
