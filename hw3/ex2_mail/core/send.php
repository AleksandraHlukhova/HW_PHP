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

if(!empty($userName) && !empty($userEmail) && !empty($userMsg))
{

    //valid name
    if(!validName($userName))
    {
        $data['errMsg']['errName'] = 'Enter correct name';
        $data['oldInput']['userName'] = $userName;
    }

    //valid email
    if(!validEmail($userEmail))
    {
        $data['errMsg']['errEmail'] = 'Enter correct email';
        $data['oldInput']['userEmail'] = $userEmail;
    }

    //valid msg
    if(!validUserMsg($userMsg))
    {
        $data['errMsg']['UserMsg'] = 'Describe your problem widely';
        $data['oldInput']['userMsg'] = $userMsg;

    }

}

//if isset errMsg back to form
if(isset($data['errMsg']))
{
    tmplConnect('form', $subjectMsg, $data);
    return;
}


//if mail go to seccess else to form
if(mail($userEmail, $msgCategory, wordwrap($userMsg, 70, "\r\n")))
{
    tmplConnect('success', $subjectMsg, []);

}else
{
    $data['errMsg']['letterErr'] = 'Letter didn`t send, please,try again';
    tmplConnect('form', $subjectMsg, $data);   
}
