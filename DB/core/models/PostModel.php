<?php

namespace App\Models;

use App\Classes\DbConnect;

class PostModel
{

    public static function getPosts(DbConnect $mysqli)
    {
        $result = $mysqli->query('SELECT * FROM post');

        if (is_a($result, 'mysqli_result')) {

            /* извлечение ассоциативного массива */
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        
            /* очищаем результаты выборки */
            $result->free();
        }
        
        $mysqli->close();
        // echo '<pre>';
        // var_dump($data);
    }
}