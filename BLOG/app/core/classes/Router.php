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
     * @param 
     * @return
     **/
    public function get($path, $callback)
    {
        $this->routes['GET'][$path] = $callback;

    }

    /**
     * 
     * @param 
     * @return
     **/
    public function post($path, $callback)
    {
        $this->routes['POST'][$path] = $callback;

    }

    /**
     * add path to router
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
