<?php

if(isset($_POST['submit']))
{

    if('Submit' == $_POST['submit'])
    {
        require_once __DIR__ . '/core/send.php';
    }
}

tmplConnect('form', $subjectMsg);
