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

    /**
     * 
     * @param key of array
     * @return value
     **/
    public static function get($param_name)
    {
        return self::$config[$param_name];
    }
}
