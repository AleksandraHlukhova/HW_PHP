<?php

require_once __DIR__ . '/settings.php';

spl_autoload_register(function($className)
{
    $pathFile = $className . '.php';

    if(file_exists($pathFile))
    {
        include_once __DIR__ . "/$pathFile";
    }
});

use Core\Classes\DbConnection;

$mysqli = new DbConnection(HOST, USER, PASS, DB_NAME);

$result = $mysqli->query("SELECT * FROM `post`;");

while ($obj = $result->fetch_object()) {
    printf ("<b>%s</b> |  (%s)<br><br>", $obj->title, $obj->description);
}

$result->close();

$mysqli->close();