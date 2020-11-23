<?php

namespace App\Models;

use App\Classes\DbConnect;

class PostPhotoModel
{

    public static function getPostPhotos(DbConnect $mysqli)
    {
        
        $result = $mysqli->query('SELECT * FROM post_photos');
        // echo '<pre>';
        // var_dump($result);
        // exit;
        if (is_a($result, 'mysqli_result')) {

            /* извлечение ассоциативного массива */
            while ($obj = $result->fetch_object()) {
                $data[] = $obj;
            }
            // echo '<pre>';

            // var_dump($data);
            // exit;
            /* очищаем результаты выборки */
            $result->free();
        }
        
        $mysqli->close();

        return $data;
        // echo '<pre>';
        // var_dump($data);
        // exit;
    }
}