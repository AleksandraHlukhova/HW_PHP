<?php

function isPalindrom($input){
    return (strrev($input) === $input) ? 'is palindrom' : 'is not palindrom';
}