<?php

namespace App\Classes;

use App\Classes\MainController;
use App\Classes\ViewController;
use App\Controllers\SiteNavController;
use App\Controllers\AuthController;

class Router
{

    public Request $request;
    public Response $response;
    public View $view;
    public array $routes = [];

    public function __construct(Request $request, Response $response, View $view)
    {
        $this->request = $request;
        $this->response = $response;
        $this->view = $view;

    }
    /**
     * add new $path to array for get method
     * @return 
     **/
    public function get($path, $callback)
    {
        $this->routes['get'][$path] =  $callback;
    }

    /**
     * add new $path to array for post method
     * @return 
     **/
    public function post($path, $callback)
    {
        $this->routes['post'][$path] =  $callback;
    }

    /**
     * get path, method, and user func
     * if callback doesn`t exist, return 404
     * @return string
     **/
    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;

        if($callback === false)
        {
            $this->response->setStatusCode(404);
            return $this->view->renderView('_404');
        }

        if(is_string($callback))
        {
            return $this->view->renderView($callback);
        }

        if(is_array($callback))
        {
            $callback[0] = new $callback[0];
        }
        
        return call_user_func($callback, $this->request);
    }

}