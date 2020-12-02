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
    public function get($path, $callback) : arrray
    {
        $this->routes['GET'][$path] = $callback;

    }

    /**
     * 
     * @param 
     * @return array
     **/
    public function post($path, $callback) : array
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
        $callback = $this->routes[$method][$path];
        
        if(is_string($callback))
        {
            return $this->view->render($callback);
        }
        // var_dump($callback);

        if(is_array($callback))
        {
            $callback[0] = new $callback[0];
        }
        // var_dump($callback, $this->request);
        // exit;
        return call_user_func($callback);
        
    }





}
