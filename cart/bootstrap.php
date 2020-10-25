<?php

session_start();

require_once __DIR__ . '/init.php';
require_once __DIR__ . '/settings.php';
require_once __DIR__ . '/function.php';
require_once __DIR__ . '/routing.php';



// make cart
if(!cartIsset()){
    cartInit(); 
}
