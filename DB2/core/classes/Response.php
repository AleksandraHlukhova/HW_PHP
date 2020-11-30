<?php

namespace App\Classes;

/**
 * undocumented class
 */
class Response
{
    
    /**
     * undocumented function summary
     * @return type
     **/
    public function setStatusCode(int $code)
    {
        http_response_code($code);
    }
}
