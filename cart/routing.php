<?php

if(isset($_GET['action'])){
    //add to cart
    if('add' === $_GET['action']) {
        $id = (int)$_GET['id'];
        addToCart($id);
    } 

    //go to cart
    if('cart' === $_GET['action']) {
        if(count(cartProduct())){
            $cartFilled = cartIsFill($products);

            connectTmpl('cart', $cartFilled);
        }else{
            connectTmpl('empty-cart');
        }

    }     

    //del from cart
    if('delate' === $_GET['action']) {
        $id = (int)$_GET['id'];
        delFromCart($id);
        $cartFilled = cartIsFill($products);
        connectTmpl('cart', $cartFilled);

    }

    //payment view
    if('chackout' === $_GET['action']) {
        $cartFilled = cartIsFill($products);
        connectTmpl('chackout', $cartFilled);

    }     
}

if(isset($_POST['submit'])){

    if('Save changes' === $_POST['submit']) {
        recalcCart($_POST['qty']);
        $cartFilled = cartIsFill($products);
        connectTmpl('cart', $cartFilled);

    } 
    if('Clean Up' === $_POST['submit']) {
        cleanCart();
        $cartFilled = cartIsFill($products);
        connectTmpl('empty-cart', $cartFilled);

    }

    //make paynemt, put info to file
    if('Chackout' === $_POST['submit']) {
        require_once __DIR__ . '/core/handlers/form_controller.php';
        connectTmpl('success-chackout');    
    }
}

//main page view
connectTmpl('show.products', $products);
