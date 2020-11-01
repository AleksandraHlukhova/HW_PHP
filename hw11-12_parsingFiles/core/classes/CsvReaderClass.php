<?php

namespace Core\Classes;
use Core\Interfaces\Readable;

class CsvReaderClass implements Readable
{

    public function __construct()
    {

        echo 'class CsvReaderClass!!!!!!!!!!!';
    }

    ///file parsing
    public function parseFile($pathName)
    {
        $info = array_map(
            'str_getcsv' ,file($pathName)
        );

        $csvFile = [];
        foreach($info as $el)
        {
            $csvFile[] = [
                'id' => $el[0],
                'domain' => $el[1],
                'rang' => $el[2]
            ];

        }
        
        return $csvFile;
        
    }
}