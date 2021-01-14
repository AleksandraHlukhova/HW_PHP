<?php

namespace App\Core\Classes;

use App\Core\Classes\ConfigLoader;
/**
 * Application class
 */
class Application
{

    static private $_instance = null;

    public static string $BASE_URL;
    public static string $BASE_PATH;
    public static Router $router;

    private function __construct()
    {

        self::$BASE_URL = ConfigLoader::get('BASE_URL');
        self::$BASE_PATH = ConfigLoader::get('BASE_PATH');
        self::$router = new Router();
    }

    /**
     * run application
     * @param 
     * @return 
    **/
    public static function run()
    {
        echo self::$router->resolve();

    }

    private function __clone () {}
        private function __wakeup () {}
    
        public static function getInstance()
        {
            if (self::$_instance != null) {
                return self::$_instance;
            }
    
            return new self;
        }
}