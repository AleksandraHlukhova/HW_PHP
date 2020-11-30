<?php

namespace App\Models;

use App\Classes\DbConnect;

class PostModel
{

    public static function getPosts(DbConnect $mysqli, $params = [])
    {
        if(count($params) > 0)
        {
            
           if($result = $mysqli->query("SELECT * FROM post JOIN post_photos ON post_photos.id_post=post.id where post.id={$params['id']}"))
           {

            // $result->bind_param("i", $params['id']);
            // $result->execute();
           }

        }else{
           
            $result = $mysqli->query('SELECT * FROM post_photos JOIN post ON post_photos.id_post=post.id group by post.id DESC');

        }
        
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

    }
}