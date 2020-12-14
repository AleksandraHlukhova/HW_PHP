<?php

namespace App\Core\Classes\Errors;

/**
 * Exceptions class
 */
class CustomException extends \Exception
{
    public $err = '';

    public function __construct($err)
    {
        $this->err = $err;
        $this->errorMessage($this->err);
    }
    public function errorMessage($err) {
        //error message
        $errorMsg = 'Error on line '.$this->getLine().' in '.$this->getFile()
        .': <b>'.$this->getMessage();
        
        return $errorMsg;
    }
}
