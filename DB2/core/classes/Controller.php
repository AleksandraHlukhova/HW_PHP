<?php

namespace App\Classes;
/**
 * undocumented class
 */
class Controller
{
    /**
     * undocumented function summary
     * @return
     **/
    public function render($view, $params = [])
    {
        return Application::$app->view->renderView($view, $params);
    }
}
