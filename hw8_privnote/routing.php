<?php

if(isset($_POST['btn'])){
    require_once __DIR__ . '/core/controllers/form_handler.php';
}

if (isset($_GET['action'])) {
    
    if('show' === $_GET['action']) {
        $hash = $_GET['hash'];
        require_once __DIR__ . '/core/controllers/decode_controller.php';
    }    
}

getTmp('partials/form.view');
