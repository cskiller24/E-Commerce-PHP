<?php
     
    function getUserTransactions($conn, $buyer_id){
        $params = "SELECT * FROM transactions WHERE buyer_id = '$buyer_id'";
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

    function getSellerDetails($conn, $seller_id){
        $params = "SELECT * FROM sellers WHERE seller_id = '$seller_id'";
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

    //**UPDATE TRANSACTIONS */
    function transactionCancelItem($conn, $seller_id, $buyer_id, $product_id){
        $params = "UPDATE transactions SET status = 'Cancelled' WHERE seller_id = '$seller_id' AND buyer_id = '$buyer_id' AND product_id = '$product_id'";
        $query = mysqli_query($conn, $params);
        return $query;
        exit();
    }
    function transactionPackItem($conn, $seller_id, $buyer_id, $product_id){
        $params = "UPDATE transactions SET status = 'Packed' WHERE seller_id = '$seller_id' AND buyer_id = '$buyer_id' AND product_id = '$product_id";
        $query = mysqli_query($conn, $params);
        return $query;
        exit();
    }
    function transactionShipItem($conn, $seller_id, $buyer_id, $product_id){
        $params = "UPDATE transactions SET status = 'Shipped' WHERE seller_id = '$seller_id' AND buyer_id = '$buyer_id' AND product_id = '$product_id";
        $query = mysqli_query($conn, $params);
        return $query;
        exit();
    }
    function transactionDeliverItem($conn, $seller_id, $buyer_id, $product_id){
        $params = "UPDATE transactions SET status = 'Delivered' WHERE seller_id = '$seller_id' AND buyer_id = '$buyer_id' AND product_id = '$product_id";
        $query = mysqli_query($conn, $params);
        return $query;
        exit();
    }