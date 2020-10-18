<?php

function vovelCount($input, $vovel_arr){

    $numb = 0;
    for($i = 0; $i < mb_strlen($input); $i++){
        for($j = 0; $j < count($vovel_arr); $j++){

            if($input[$i] === $vovel_arr[$j]){
                $numb++;
            }
        }
    }
    return $numb;
}