<?php

namespace App\Core\Classes;

/**
 * Router class
 */
class Router
{
    protected array $routes = [];
    public Request $request;
    public View $view;

    public function __construct()
    {
        $this->request = new Request();
        $this->view = new View();
    }

    /**
     * 
     * @param $path, $callback
     * @return array
     **/
    public function get($path, $callback)
    {
        $this->routes['GET'][$path] = $callback;
    }

    /**
     * 
     * @param 
     * @return array
     **/
    public function post($path, $callback)
    {
        $this->routes['POST'][$path] = $callback;

    }

    /**
     * connect Class and method
     * @param 
     * @return
     **/
    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $params = $this->request->getParams();
        
        if(!$params)
        {
            $callback = $this->routes[$method][$path];
        }

        if($params)
        {
            $callback = $this->routes[$method][$path];      
        }

        if(is_string($callback))
        {
            return $this->view->render($callback);
        }

        if(is_array($callback))
        {
            $callback[0] = new $callback[0];
        }
        
        return call_user_func($callback, $params);
        
    }





}
