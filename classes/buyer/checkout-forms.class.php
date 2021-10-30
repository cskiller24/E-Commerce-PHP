<?php 
    session_start();
    include("../../dbconnection.php");
    include("../../functions/buyer/checkout.fx.php");

    if(isset($_POST['submit'])){
            $transaction_id = uniqid();
            $address = $_POST['address'];
            $payment_method = $_POST['payment_method'];
            $all_products = $_SESSION['transact'];
            $status = "Pending Order";
            var_dump($all_products);
            
            //**SET TRANSACTIONS AND DELETE THE CARTS*/
            foreach($all_products as $product){
                postProductTransaction($conn, $transaction_id, $product['product_id'], $product['amount'], $payment_method, $product['buyer_id'], $product['seller_id'], $product['product_price'], $status, $address, $product['contact_number']);
                deleteCart($conn,$product['product_id'], $product['buyer_id'], $product['seller_id']);
            }
            unset($_SESSION['transact']);
            unset($product);
            header("Location: ../../view/buyer/homepage.php?page=1&checkout=success");
    }