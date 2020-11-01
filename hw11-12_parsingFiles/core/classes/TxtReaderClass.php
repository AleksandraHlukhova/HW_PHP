<?php

namespace Core\Classes;
use Core\Interfaces\Readable;

class TxtReaderClass implements Readable
{


    public function __construct()
    {
        echo 'class TxtReaderClass!!!!!!!!!!!';
    }

    ///file parsing
    public function parseFile($pathName)
    {

        $info = array_map(
            'str_getcsv' ,file($pathName)
        );
        $txtFile = [];

        foreach($info as $el)
        {
            $files = explode(';', $el[0]);
            $txtFile[] = [
                'id' => $files[0],
                'domain' => $files[1],
                'rang' => $files[2]
            ];
        }

        return $txtFile;
    }
}