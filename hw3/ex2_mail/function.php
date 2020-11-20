<?php

//connect tmpl
function tmplConnect($path = 'form', $subjectMsg, $data = [])
{
    $_SESSION['path'] = $path;
    $_SESSION['subjectMsg'] = $subjectMsg;
    $_SESSION['data'] = $data;

    require_once __DIR__ . '/views/layout/main.view.php';
}

//cut spaces, not valid chars
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

/*
    *check that name has only letters
    *return bool
*/ 
function validName($name)
{
    return preg_match("/^[a-яA-Я ]*$/",$name);
}

/*
  *check that email has @ and .
  *return bool
*/ 
function validEmail($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

/*
  *check that $msg has more than 15 symbols
  *return bool
*/ 
function validUserMsg($msg)
{
    if(mb_strlen($msg) > 15)
    {
        return true;
    } return false;
    
}

