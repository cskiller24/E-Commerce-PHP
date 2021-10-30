<?php

    function getTransactionsList($conn, $seller_id){
        $params = "SELECT * FROM transactions WHERE seller_id = '$seller_id'";
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

    //**TRANSACTION ACTIONS */
    function transactionPackItem($conn, $seller_id, $product_id, $buyer_id){
        $params = "UPDATE transactions SET status = 'Packed' WHERE seller_id = '$seller_id' AND buyer_id = '$buyer_id' AND product_id = '$product_id'";
        $query = mysqli_query($conn, $params);
        return $query;
        exit(); 
    }