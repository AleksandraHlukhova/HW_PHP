<?php

namespace Core\Classes;

class DbConnection extends \mysqli
{
    public function __construct($host, $user, $pass, $db)
    {
        parent::__construct($host, $user, $pass, $db);

        if (mysqli_connect_error()) {
            die('Connect error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
        }
    }
}