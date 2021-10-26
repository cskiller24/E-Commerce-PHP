<?php
    function addToCart($conn, $buyer_id, $product_id, $seller_id){
        //GET the cart first
        $params = "SELECT amount FROM cart WHERE buyer_id = '$buyer_id' AND seller_id = '$seller_id' AND product_id = '$product_id'";
        $query = mysqli_query($conn, $params);
        if($query && mysqli_num_rows($query) > 0){ //if  the cart is already in the database add 1
            $amount = mysqli_fetch_assoc($query);
            $added_amount = $amount['amount'] + 1;
            var_dump($added_amount);
            $params = "UPDATE cart SET amount = '$added_amount' WHERE buyer_id = '$buyer_id' AND seller_id = '$seller_id' AND product_id = '$product_id'";
            $query = mysqli_query($conn, $params);
        }
        else if($query && mysqli_num_rows($query) <= 0){ //if cart is not added insert a cart value
            $params = "INSERT INTO cart (product_id, buyer_id, seller_id, amount) VALUES('$product_id', '$buyer_id', '$seller_id', '1')";
            $query = mysqli_query($conn, $params);
        } 
        return $query;
        exit();
    }