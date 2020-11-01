<?php

require_once __DIR__ . '/init.php';
require_once __DIR__ . '/settings.php';
require_once __DIR__ . '/core/classes/AutoloadClass.php';

use Core\Classes\AutoloadClass;
use Core\Classes\ControllerClass;

// autoload
AutoloadClass::load();

// main controller
$files = new ControllerClass($pathToInputSmall);