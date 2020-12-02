<?php


namespace App\Core\Interfaces;

interface ModelInt
{
    public function queryDb($stmt);
    public function prepareDb($stmt);
    public function insert($stmt);
}