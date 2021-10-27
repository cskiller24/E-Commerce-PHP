<?php
    $buyer_id = $_SESSION['buyer_id'];

    include("../../dbconnection.php");
    include("../../functions/buyer/cart.fx.php");

    unset($cart_lists);

    $cart_lists = getAllCartList($conn, $buyer_id);

    if($cart_lists){ //Check if cart is available
        $count_cart_list = count($cart_lists);
    
        //**ADDED PRODUCT DETAILS INSIDE THE CART ARRAY TO BE SENT IN THE VIEW */
        for($i = 0; $i < $count_cart_list; $i++){
            $result = getProductDetails($conn, $cart_lists[$i]['product_id']);
            $cart_lists[$i]['product_name'] = $result['product_name'];
            $cart_lists[$i]['product_image'] = $result['image'];
        }
    }

    //**ADD/DECREASE/REMOVE CART FUNCTIONS */

    
    if(isset($_GET['action']) && $_GET['action'] == "add" && isset($_GET['bid']) && isset($_GET['pid']) && isset($_GET['sid']) && isset($_GET['amount'])){
        $buyer_id = $_GET['bid'];
        $product_id = $_GET['pid'];
        $seller_id = $_GET['sid'];
        $amount = $_GET['amount'];

        $result = addCart($conn, $product_id, $buyer_id, $seller_id, $amount);

        if($result){
            header("Location: ../../view/buyer/cart.php?cart=addS");
            exit();
        }
        else{
            header("Location: ../../view/buyer/cart.php?cart=addF");
            exit();
        }
    }
    if(isset($_GET['bid']) && isset($_GET['pid']) && isset($_GET['sid']) && isset($_GET['action']) && $_GET['action'] == "minus" && isset($_GET['amount'])){
        $buyer_id = $_GET['bid'];
        $product_id = $_GET['pid'];
        $seller_id = $_GET['sid'];
        $amount = $_GET['amount'];

        $result = decreaseCart($conn, $product_id, $buyer_id, $seller_id, $amount);

        if($result){
            header("Location: ../../view/buyer/cart.php?cart=minusS");
            exit();
        }
        else{
            header("Location: ../../view/buyer/cart.php?cart=minusF");
            exit();
        }
    }
    if(isset($_GET['bid']) && isset($_GET['pid']) && isset($_GET['sid']) && isset($_GET['action']) && $_GET['action'] == "remove"){
        $buyer_id = $_GET['bid'];
        $product_id = $_GET['pid'];
        $seller_id = $_GET['sid'];

        $result = removeCart($conn, $product_id, $buyer_id, $seller_id);

        if($result){
            header("Location: ../../view/buyer/cart.php?cart=removeS");
            exit();
        }
        else{
            header("Location: ../../view/buyer/cart.php?cart=removeF");
            exit();
        }
    }