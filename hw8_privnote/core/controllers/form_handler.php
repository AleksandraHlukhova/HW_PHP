<?php

$userMsg = $_POST['userMsg'];
$hashed_text = [];
check_input($userMsg);

if(!empty($userMsg)){
    $solt = rand();
    //hash file name
    $file_name = sha1($userMsg . $solt);
    if (in_array($cipher, openssl_get_cipher_methods())){
        //hash file contents
        $hashed_text = hash_fileContents($cipher, $fileHash_length, $userMsg, $fileHash_options);
    }

    $filePath = sprintf('%s%s.json', $file_pathStorage, $file_name);

    file_put_contents($filePath, json_encode($hashed_text['hashed_text']));

    //bild link
    $link = "?action=show&hash=$file_name";
    $_SESSION['link'] = $link;
    $_SESSION['hashed_text'] = $hashed_text;

}
getTmp('partials/generatedlink.view', );