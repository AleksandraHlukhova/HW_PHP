<?php

namespace App\Classes;
/**
 * undocumented class
 */
class View
{
        /**
     * undocumented function summary
     * @return
     **/
    public function renderView($view, $params = [])
    {
        
        $layoutContent = $this->layoutContent();
        // var_dump($layoutContent);
        // exit;
        $viewContent = $this->renderOnlyView($view, $params);
        
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    // /**
    //  * when we have 404, we will be able click to home page
    //  * @return type
    //  **/
    // public function renderContent($viewContent)
    // {
    //     $layoutContent = $this->layoutContent();
    //     return str_replace('{{content}}', $viewContent, $layoutContent);
    // }

    /**
     * undocumented function summary
     * @return type
     **/
    protected function layoutContent()
    {
        ob_start();
        include_once Application::$ROOT_DIR . "/views/layouts/main.view.php";
        return ob_get_clean();
    }

    /**
     * undocumented function summary
     * @return type
     **/
    protected function renderOnlyView($view, array $params)
    {

        foreach($params as $key => $value)
        {
            
            //the name of key will be the name of the variable in case of $$
            $$key = $value;
        }

        ob_start();
        include_once Application::$ROOT_DIR . "/views/$view.view.php";
        return ob_get_clean();
    }
    
}
