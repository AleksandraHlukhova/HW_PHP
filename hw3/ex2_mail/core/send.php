<?php

$errMsg['errMsg'] = [];
$data['oldInput'] = [];

//get info from input
$userName = $_POST['userName'];
$userEmail = $_POST['userEmail'];
$msgCategory = $_POST['msgCategory'];
$userMsg = $_POST['userMsg'];

//cut spaces and unnesessary chars
$userName = test_input($userName);
$userEmail = test_input($userEmail);
$userMsg = test_input($userMsg);

//valid name
if(!validName($userName))
{
    $data['errMsg']['errName'] = 'Enter correct name';
    $data['oldInput']['name'] = $userName;
}

//valid email
if(!validEmail($userEmail))
{
    $data['errMsg']['errEmail'] = 'Enter correct email';
    $data['oldInput']['email'] = $userEmail;
}

//valid msg
if(!validUserMsg($userMsg))
{
    $data['errMsg']['UserMsg'] = 'Describe your problem widely';
    $data['oldInput']['msg'] = $userMsg;

}

if(isset($data['errMsg']))
{

    tmplConnect('form', $subjectMsg, $data);
    return;

}

if(mail($userEmail, $msgCategory, wordwrap($userMsg, 70, "\r\n")))
{
    tmplConnect('success', $subjectMsg, []);

}else
{
    $data['errMsg']['letterErr'] = 'Letter didn`t send, please,try again';
    tmplConnect('form', $subjectMsg, $data);   
}
