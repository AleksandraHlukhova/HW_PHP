<?php

namespace App\Core\Classes;

/**
 * ConfigLoader class
 */
class ConfigLoader
{

    protected static $config;
    public function __construct($config)
    {
        self::$config = $config;
    }
    public static function get($param_name)
    {
        return self::$config[$param_name];
    }
    ///таблиці в множині, моделі в однині
}
