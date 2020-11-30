<?php

namespace App\Classes;

// use App\Classes\Request;
// use App\Classes\Router;

class Application
{
    public static $ROOT_DIR;
    public Router $router;
    public Request $request;
    public Response $response;
    public View $view;
    public static Application $app;

    public function __construct($rootPath)
    {
        self::$ROOT_DIR = $rootPath;
        self::$app = $this; //unsted $app->router->request we will be able write $app->request
        $this->request = new Request;
        $this->response = new Response;
        $this->view = new View;
        $this->router = new Router($this->request, $this->response, $this->view);

    }

    /**
     * undocumented function summary
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function run()
    {
        echo $this->router->resolve();
    }

    
  
}
