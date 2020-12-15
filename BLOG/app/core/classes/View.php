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
    public function render($view, $data = [], $layout = 'main')
    {
        $layout = $this->loadLayout($data, $layout);
        $content = $this->loadContent($view, $data);
        $tmpl = str_replace('{{content}}', $content, $layout);
        
        return $tmpl;

    }

    /**
     * connect main tmpl
     * @param 
     * @return main tmpl
     **/
    public function loadLayout($data = [], $layout)
    {
        ob_start();
        
        $this->extractData($data);

        require_once Application::$BASE_PATH . "/views/layouts/$layout.view.php";
    
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
