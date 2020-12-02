<?php

namespace App\Core\Classes;

/**
 * Application class
 */
class Application
{

    // static private $_instance;


    public static string $BASE_URL;
    public static string $BASE_PATH;
    public Router $router;

    public function __construct($BASE_URL, $BASE_PATH)
    {
        // $this->_instance = new Application();
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

	  


    // //не даст создать клон класса
    // private function __clone(){ 
    // }

    // static public function getInstance(){
    //     //return self::$_instance;
    //     if(self::$_instance instanceof self){
    //         return self::$_instance;
    //     }
    //     return self::$_instance = new self;
    // }
}