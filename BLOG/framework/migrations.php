<?php

/**
 * undocumented class
 */
// class Migration 
// {
    fwrite(STDOUT, "Enter your given name: ");
    $name = trim(fgets(STDIN));
    fwrite(STDOUT, "Enter your last name: ");
    $lastname = trim(fgets(STDIN));
    fwrite(STDOUT, "Hello, $name $lastname!" . PHP_EOL);
// }
