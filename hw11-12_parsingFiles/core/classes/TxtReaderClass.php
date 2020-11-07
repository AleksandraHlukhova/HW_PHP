<?php

namespace Core\Classes;
use Core\Classes\MainReaderClass;
use Core\Interfaces\Readable;

class TxtReaderClass extends MainReaderClass implements Readable
{
    ///file parsing
    public function parseFile()
    {

        $info = array_map(
            'str_getcsv' ,file($this->pathName)
        );

        $txtFile = [];

        foreach($info as $el)
        {
            $files = explode(';', str_replace('"', '', $el[0]));
            $txtFile[] = [
                'id' => $files[0],
                'domain' => $files[1],
                'rang' => $files[2]
            ];
        }

        return $txtFile;
    }
}