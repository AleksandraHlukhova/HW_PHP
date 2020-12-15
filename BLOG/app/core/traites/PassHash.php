<?php

namespace App\Core\Traites;

use App\Core\Classes\ConfigLoader;

/**
 * make pass hash
 */
trait PassHash
{
    protected function makeHash($pass)
    {
        return password_hash($pass, PASSWORD_BCRYPT, ["cost" => ConfigLoader::get('COST_HASH')]);
    }
}