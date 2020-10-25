<?php

if(is_array($_POST)){
    $data = $_POST;
    ////check input data!!!

    file_put_contents($file_pathStorage, json_encode($data), FILE_APPEND);
    cleanCart();
}
