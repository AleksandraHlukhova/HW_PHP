<?php

namespace App\Models;

use App\Classes\DbConnect;

class PostModel
{

    public static function getPosts(DbConnect $mysqli, $params = [])
    {
        if(count($params) > 0)
        {
            
           if($result = $mysqli->query("SELECT * FROM post"))
           {

            // $result->bind_param("i", $params['id']);
            // $result->execute();
           }

        }else{
           
            $result = $mysqli->query('SELECT * FROM post');

        }
        
        if (is_a($result, 'mysqli_result')) {
            
            /* извлечение ассоциативного массива */
            while ($obj = $result->fetch_object()) {
                $data[$obj->category_id] = $obj;
           
            }
           
            /* очищаем результаты выборки */
            $result->free();
        }

        //$mysqli->close();

        return $data;

    }
}