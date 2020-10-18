<?php

$jsonFiles = [];
$filePath = '';
$origin_text = '';

$jsonFiles = getJsonFiles($file_pathStorage);

foreach($jsonFiles as $file){
    if($hash === $file){
    $filePath = sprintf('%s%s.json', $file_pathStorage, $file);
    $hashed_text = json_decode(file_get_contents($filePath));
    $origin_text = rehash_fileContents($cipher, $fileHash_length, $hashed_text, $fileHash_options, $_SESSION['hashed_text']['key'], $_SESSION['hashed_text']['ivlen'], $_SESSION['hashed_text']['iv']);
    }
}
$_SESSION['origin_text'] = $origin_text;
if(!empty($filePath)){
    unlink($filePath);
}else{
    $_SESSION['origin_text'] = "You've already read this message or time is over";
}

getTmp('partials/showMsg.view');