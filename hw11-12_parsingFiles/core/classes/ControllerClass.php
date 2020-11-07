<?php

namespace Core\Classes;

use Core\Classes\CsvReaderClass;
use Core\Classes\TxtReaderClass;
use Core\Interfaces\Readable;


class ControllerClass
{

    public $pathToFile = '';
    public $src;

    public function __construct($pathToFile)
    {
        //pathto file will be parsing
        $this->$pathToFile = $pathToFile;
        
        $this->getClassName($this->$pathToFile);
    }


    //get extention and connect correct parser
    public function getClassName($pathToFile){
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

                $this->getParser(new $parser($fileName));
            
            }
        }

    }

    ///get parser 
    public function getParser(Readable $info)
    {
        $this->src[] = $info;
    }

    //get data from files
    public function getData()
    {
        $data = [];
        $result = [];

        foreach($this->src as $src)
        {
            $data[] = $src->parseFile();

            foreach($data as $value)
            {
                $result = array_merge($result, array_combine(
                    array_column($value, 'domain'),
                    array_column($value, 'rang')
                ));
            }

        }

        return $result;
    }

}