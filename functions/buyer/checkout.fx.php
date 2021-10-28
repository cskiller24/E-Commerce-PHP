<?php 
    function getTransactionList($conn, $buyer_id){
        $params = "SELECT * FROM cart WHERE buyer_id = '$buyer_id'";
        $query = mysqli_query($conn, $params);
        if($query && mysqli_num_rows($query) > 0){
            $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
            return $result; 
            exit();
        }
        else{
            return false;
            exit();
        }
    }

    function getProductDetails($conn, $product_id){
        $params = "SELECT * FROM product WHERE product_id = '$product_id'";
        $query = mysqli_query($conn, $params);
        if($query && mysqli_num_rows($query) > 0){
            $result = mysqli_fetch_assoc($query);
            return $result; 
            exit();
        }
        else{
            return false;
            exit();
        }
    }

    function getBuyerDetails($conn, $buyer_id){
        $params = "SELECT * FROM buyers WHERE buyer_id = '$buyer_id'";
        $query = mysqli_query($conn, $params);
        if($query && mysqli_num_rows($query) > 0){
            $result = mysqli_fetch_assoc($query);
            return $result;
            exit();
        }
        else{
            return false;
            exit();
        }
    }

    function postProductTransaction($conn, $trans_id, $product_id, $amount, $payment_method, $buyer_id, $seller_id, $price, $status, $address, $contact_number){
        $params = "INSERT INTO transactions (trans_id, product_id, amount, payment_method, buyer_id, seller_id, price, status, address, contact_number) VALUES ('$trans_id', '$product_id', '$amount', '$payment_method', '$buyer_id', '$seller_id', '$price', '$status', '$address', '$contact_number')";
        mysqli_query($conn, $params);
    }

    function deleteCart($conn, $product_id, $buyer_id, $seller_id){
        $params = "DELETE FROM cart WHERE product_id = '$product_id' AND buyer_id = '$buyer_id' AND seller_id = '$seller_id'";
        mysqli_query($conn, $params);
    }