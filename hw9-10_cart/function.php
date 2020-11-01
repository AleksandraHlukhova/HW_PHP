<?php

//connects view to main Tmpl
function connectTmpl($path, $products = []){
    $_SESSION['path'] = $path;
    $_SESSION['products'] = $products;
    require_once __DIR__ . '/views/layout/main.view.php';
}

// check if cart is isset
function cartIsset(){
    if(isset($_SESSION['cart'])){
        return true;
    }return false;
}

//make cart
function cartInit(){
    $_SESSION['cart'] = [
        'products' => array(
            ///id => cart
        )
    ];
}

// return products
function &cartProduct(){
    return $_SESSION['cart']['products'];

}

// make array with all info about products
function cartIsFill($products){
    $cartFilled = [];
    $cartProducts = &cartProduct();
    if(count($cartProducts) > 0){
        foreach($cartProducts as $id => $qty){
            $cartFilled[] = [
                'id' => $id,
                'qty' => $qty,
                'info' => (object)$products[$id]
            ];
        }
        
    }
    return $cartFilled;
}


//add to cart new products
function addToCart($id, $qty = 1){
    $products = &cartProduct();

        if(array_key_exists($id, $products)){
            $products[$id]++;
        }else {
            $products[$id] = $qty;
        }    
}


//delate from cart products
function delFromCart($id){
    $products = &cartProduct();
    unset($products[$id]);
}


//recal cart
function recalcCart($post){
    $cartProducts = &cartProduct();
    $id = $post['id'];
    $qty = $post['qty'];
    $cartProducts = array_combine($id, $qty);
    
    foreach ($cartProducts as $id => $qty) {
        if($qty <= 0){
         $cartProducts[$id] = 1; 
        }
     }
}

//clean cart
function cleanCart(){
    $cartProducts = &cartProduct();
    $cartProducts = [];
}

//cout products qty
function countCartProducts(){
    $products = cartProduct();
    $qty = 0;
    if(!empty($products)){
        foreach($products as $key => $product){
            $qty += $product;
        }
        return $qty;
    }
    return false;
}