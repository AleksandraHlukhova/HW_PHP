<?php


namespace App\Core\Interfaces;

interface ModelInterface
{
    public function select($stmt, $params = []);
    // public function insert($stmt, $params);
    public function update($stmt, $params = []);

}