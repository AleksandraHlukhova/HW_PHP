<?php

namespace App\Models;

use App\Classes\DbConnect;

class CategoryModel
{

    public static function getCategories(DbConnect $mysqli)
    {
        $result = $mysqli->query('SELECT * FROM category');

        if (is_a($result, 'mysqli_result')) {

            /* извлечение ассоциативного массива */
            while ($obj = $result->fetch_object()) {
                $data[] = $obj;
            }

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