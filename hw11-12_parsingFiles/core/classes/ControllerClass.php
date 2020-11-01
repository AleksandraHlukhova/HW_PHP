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
        $infoArr = [];
        $files = new \DirectoryIterator($pathToFile);

        foreach($files as $file)
        {
            if($file->isFile())
            {
                $fileName = $file->getPathname();
                $parser = __NAMESPACE__ . DIRECTORY_SEPARATOR . ucfirst(
                    sprintf('%sReaderClass' ,$file->getExtension())
                );

                $info = new $parser();
                $infoArr[] = $info->parseFile($fileName);
            
            }
        }
        $infoArr = array_merge($infoArr[0], $infoArr[1]);
        // echo '<pre>';
        // var_dump($infoArr);
        $this->sortArray($infoArr);
    }

    public function sortArray($data)
    {
        sort($data);
        ////проверить на уникальность!!
        ///поменять этот метод, добавить подключение шаблонов
        ////пересмотреть txtReader 
    
        require_once __DIR__ . '/../../view/show-domains.view.php';


    }

}