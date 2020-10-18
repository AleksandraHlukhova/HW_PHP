<?php

$userInput = $_POST['userInput'];

if(!empty($userInput)){
    $isPalindrom = isPalindrom($userInput);
}else{
    $errors = [
        'input' => 'Enter word, please!',
    ];
}