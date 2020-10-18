<?php

// $expire_time = time() + 60;
// while(time() < $expire_time){
    delNotOpenedFiles($file_pathStorage, $timeFileStorageInMinutes);
    // sleep(60);
// }