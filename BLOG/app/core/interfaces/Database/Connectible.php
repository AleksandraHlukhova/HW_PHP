<?php

namespace App\Core\Interfaces\Database;

interface Connectible
{
    public function connect(array $params);
    public function disconnect();
}