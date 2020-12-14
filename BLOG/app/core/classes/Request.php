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

        $path = $_GET;

        if(count($path) === 0 )
        {
            $path = '/';
        }
        else
        {
            $path = $_GET['action'];

        }
        
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

    /**
     * get method 
     * @param 
     * @return get/post
     **/
    public function getParams()
    {
        $params = $_GET; 

        //cut first el from array
        array_shift($params);
        var_dump($params);

        return $params;
    }
    
}
