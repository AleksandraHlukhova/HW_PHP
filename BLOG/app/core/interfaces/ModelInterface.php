<?php


namespace App\Core\Interfaces;

interface ModelInterface
{
    public static function select($stmt, $params = []);
    // public function insert($stmt, $params);
    public static function update($stmt, $params = []);

}