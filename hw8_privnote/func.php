<?php

function getTmp($path, $info = []){
    
    $_SESSION['tmp'] = $path;
    $_SESSION['info'] = $info;
    require_once __DIR__ . "/views/layout/master.view.php";
}

function check_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function hash_fileContents($cipher, $fileHash_length, $userMsg, $fileHash_options){
    //generate random bites order/ param:length
    $key = openssl_random_pseudo_bytes($fileHash_length);
    $ivlen = openssl_cipher_iv_length($cipher);
    $iv = openssl_random_pseudo_bytes($ivlen);
    $hashed_text = openssl_encrypt($userMsg, $cipher, $key, $fileHash_options, $iv);
    // return $hashed_text;
    return [
        'key' => $key,
        'ivlen' => $ivlen,
        'iv' => $iv,
        'hashed_text' => $hashed_text
    ];
}  

function rehash_fileContents($cipher, $fileHash_length, $hashed_text, $fileHash_options, $key, $ivlen, $iv){
    $hashed_text = openssl_decrypt($hashed_text, $cipher, $key, $fileHash_options, $iv);
    return $hashed_text;
}  

function getJsonFiles($file_pathStorage){
    $jsonFiles = [];
    $files = new DirectoryIterator($file_pathStorage);
    foreach ($files as $fileinfo) {
        if($fileinfo->isFile()){
            $jsonFiles[] = $fileinfo->getBasename('.json');
        }
    }
    return $jsonFiles;
}

function delNotOpenedFiles($file_pathStorage, $timeFileStorageInMinutes){
    $files = new DirectoryIterator($file_pathStorage);
    foreach ($files as $fileinfo) {
        if($fileinfo->isFile()){
            //return int in Unix
            $timeFileCreate = $fileinfo->getMTime();
            $date = new DateTime();

            $file_time = $date->setTimestamp($timeFileCreate);
            $now = new DateTime();

            $interval = $now->diff($file_time);
            $minutes = $interval->format('%I');
            if($minutes > $timeFileStorageInMinutes){
                unlink($fileinfo->getRealPath());
            }
        }

    }
}