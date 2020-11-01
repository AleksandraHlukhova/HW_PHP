<?php

namespace Core\Classes;

use Core\Classes\CsvReaderClass;
use Core\Classes\TxtReaderClass;

class ControllerClass
{

    public $pathToFile = '';

    public function __construct($pathToFile)
    {
        //pathto file will be parsing
        $this->$pathToFile = $pathToFile;
        
        $this->getParser($this->$pathToFile);
    }


    //get extention and connect correct parser
    public function getParser($pathToFile){

        $files = new \DirectoryIterator($pathToFile);

        foreach($files as $file)
        {
            if($file->isFile())
            {
                $parser = __NAMESPACE__ . DIRECTORY_SEPARATOR . ucfirst(
                    sprintf('%sReaderClass' ,$file->getExtension())
                );
                
                new $parser();
            
            }
        }
    }

}