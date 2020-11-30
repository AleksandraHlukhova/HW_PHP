<?php


namespace App\Classes;

/**
 * undocumented class
 */
class Request 
{
    
    /**
     * get path without params
     * @return $path
     **/
    public function getPath()
    {
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        $position = strpos($path, '?');

        if($position === false)
        {
            return $path;
        }

        return $path = substr($path, 0, $position);
    }

    /**
     * get method (get/post)
     * @return $method
     **/
    public function getMethod()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    /**
     * get method (get/post)
     * @return $method
     **/
    public function isGet()
    {
        return $this->getMethod() === 'get';
    }

    /**
     * get method (get/post)
     * @return $method
     **/
    public function isPost()
    {
        return $this->getMethod() === 'post';
    }

    /**
     * undocumented function summary
     * @return 
     **/
    public function getBody()
    {
        $body = [];
        // var_dump($this->getMethod());
        // exit;
        if($this->getMethod() === 'get')
        {
            foreach($_GET as $key => $value)
            {
                $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
        if($this->getMethod() === 'post')
        {
            foreach($_POST as $key => $value)
            {
                $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

        return $body;
    }
}
