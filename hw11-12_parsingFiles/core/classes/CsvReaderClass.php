<?php

namespace Core\Classes;
use Core\Classes\MainReaderClass;
use Core\Interfaces\Readable;

class CsvReaderClass extends MainReaderClass implements Readable
{    
    ///file parsing
    public function parseFile()
    {
        $info = array_map(
            'str_getcsv' ,file($this->pathName)
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