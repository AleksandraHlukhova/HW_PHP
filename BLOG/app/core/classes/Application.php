<?php

namespace App\Core\Classes;

/**
 * Application class
 */
class Application
{

    public static string $BASE_URL;
    public static string $BASE_PATH;
    public Router $router;

    public function __construct($BASE_URL, $BASE_PATH)
    {
        self::$BASE_URL = $BASE_URL;
        self::$BASE_PATH = $BASE_PATH;
        $this->router = new Router();
    }

    /**
     * undocumented function summary
     * @param 
     * @return 
    **/
    public function run()
    {
        echo $this->router->resolve();

    }
}