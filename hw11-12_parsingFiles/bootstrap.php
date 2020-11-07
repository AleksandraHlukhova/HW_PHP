<?php

require_once __DIR__ . '/init.php';
require_once __DIR__ . '/settings.php';
require_once __DIR__ . '/core/classes/AutoloadClass.php';

use Core\Classes\AutoloadClass;
use Core\Classes\ControllerClass;
use Core\Classes\CurlClass;
use Core\Classes\ConnectTmpl;

// autoload
AutoloadClass::load();

// main controller
$files = new ControllerClass($pathToInputSmall);
$data = $files->getData();

array_unique($data);
arsort($data);
$data = array_slice($data, 0, 15);

new CurlClass();

ConnectTmpl::getTmpl($pathToMainView, 'show-domains', $data);