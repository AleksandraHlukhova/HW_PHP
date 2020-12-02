<?php

namespace App\Core\Classes\Controllers;

use App\Core\Classes\View;
use App\Core\Classes\Transformers\TransformerInfo;


/**
 * Controller class
 */
abstract class Controller
{

    public View $view;
    public TransformerInfo $transformer;
    
    public function __construct()
    {
        $this->view = new View;
        $this->transformer = new TransformerInfo;
    }

    abstract public function index();

}

