<?php

session_start();

require_once __DIR__ . '/settings.php';
require_once __DIR__ . '/vendor/autoload.php';

use App\Classes\Router;

Router::getRout();



