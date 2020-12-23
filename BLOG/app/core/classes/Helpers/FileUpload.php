<?php

namespace App\Core\Classes\Helpers;

use App\Core\Classes\ConfigLoader;
/**
 * FileUpload
 */
class FileUpload
{

    /**
     * removeFile
     * @param 
     * @return array
     **/
    public static function getPath($data)
    {
        $path = [];

        foreach($data['tmp_name'] as $key => $file)
        {
            $name = self::hashFileName($data['name'][$key]);
            $destionation = ConfigLoader::get('PHOTO_STORAGE'). "/$name";

            if(self::removeFile($file, $destionation))
            {
                $path[] = $destionation;
            }///extention add to log
        }
        return $path;
        
    }

    /**
     * removeFile
     * @param 
     * @return array
     **/
    public static function removeFile($file, $destionation)
    {
        return move_uploaded_file($file, $destionation);

    }

    /**
     * renameFile
     * @param 
     * @return array
     **/
    public static function hashFileName($name)
    {
        $result = [];

        $info = new \SplFileInfo($name);
        $extention = $info->getExtension();
        $result = hash('sha256', $name). '.'.$extention;
        
        return $result;
    }

    
}
