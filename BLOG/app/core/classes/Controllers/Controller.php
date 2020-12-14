<?php

namespace App\Core\Classes\Controllers;

use App\Core\Models\Category;
use App\Core\Classes\View;
use App\Core\Classes\Transformers\TransformerInfo;


/**
 * Controller class
 */
abstract class Controller
{

    public Category $category;
    public View $view;
    public TransformerInfo $transformer;
    
    public function __construct()
    {
        $this->category = new Category;

        $this->view = new View;
        $this->transformer = new TransformerInfo;
    }

    /**
     * 
     * @param 
     * @return view with data
     **/
    abstract public function index();

}

