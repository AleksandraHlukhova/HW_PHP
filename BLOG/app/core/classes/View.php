<?php

namespace App\Core\Classes;

/**
 * View class
 */
class View
{

    /**
     * generate tmpl to connect
     * @param $view
     * @return tmpl
     **/
    public function render($view, $data = [])
    {
        $layout = $this->loadLayout($data);
        $content = $this->loadContent($view, $data);
        $tmpl = str_replace('{{content}}', $content, $layout);
        
        return $tmpl;

    }

    /**
     * connect main tmpl
     * @param 
     * @return main tmpl
     **/
    public function loadLayout($data = [])
    {
        ob_start();
        
        $this->extractData($data);

        require_once Application::$BASE_PATH . '/views/layouts/main.view.php';
    
        return ob_get_clean();
    }

    /**
     * connect content
     * @param 
     * @return contetnt tmpl
     **/
    public function loadContent($view, $data = [])
    {
        ob_start();
        
        $this->extractData($data);
        require_once Application::$BASE_PATH . "/views/$view.view.php";

        return ob_get_clean();
    }

    /**
     * data extract
     * @param 
     * @return contetnt tmpl
     **/
    public function extractData($data = [])
    {
        extract($data);
    }


}
