<?php

namespace App\Core\Classes;

/**
 * Request class
 */
class Request
{

    /**
     * get urn
     * @param 
     * @return urn
     **/
    public function getPath()
    {   
        $base_url = Application::$BASE_URL;
        $path = str_replace("$base_url", '', $_SERVER['REQUEST_URI']);
        
        return $path;
    }

    /**
     * get method 
     * @param 
     * @return get/post
     **/
    public function getMethod()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    // /**
    //  * get method 
    //  * @param 
    //  * @return get/post
    //  **/
    // public function input($params)
    // {
    //   $params = $_GET; 
    // }
    
}
