<?php

$userInput = $_POST['userInput'];

if(!empty($userInput)){

    $vovelNumb = vovelCount($userInput, $vovel_arr);

}else{
    $errors = [
        'input' => 'Enter sentences, please!',
    ];
}