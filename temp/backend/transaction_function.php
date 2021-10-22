<?php
    function getAllTransactions($conn){
        $toSql = "SELECT * FROM transactions";
        $result = mysqli_query($conn, $toSql);
        if($result && mysqli_num_rows($result) > 0){
            $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
            return $result;
        }
        else return false;
    }

    function getTransactionsBuyer($conn, $id){
        $toSql = "SELECT * FROM transactions WHERE buyer_id = '$id'";
        $result = mysqli_query($conn, $toSql);
        if($result && mysqli_num_rows($result) > 0){
            $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
            return $result;
        }
        else return false;
    }

    function getTransactionsSeller($conn, $id){
        $toSql = "SELECT * FROM transactions WHERE seller_id = '$id'";
        $result = mysqli_query($conn, $toSql);
        if($result && mysqli_num_rows($result) > 0){
            $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
            return $result;
        }
        else return false;
    }

    //Buyer
    function cancelOrder($conn, $buyer_id, $product_id){ 
        $toSql = "UPDATE transactions SET status = 'Cancelled' WHERE buyer_id = '$buyer_id' AND product_id = '$product_id'";
        $result = mysqli_query($conn, $toSql);
        return $result;
    }

    //Seller
    function packedOrder($conn, $seller_id, $product_id, $trans_id){
        $toSql = "UPDATE transactions SET status = 'Packed' WHERE seller_id = '$seller_id' AND product_id = '$product_id' AND trans_id = '$trans_id'";
        $result = mysqli_query($conn, $toSql);
        return $result;
    }

    //Admin
    function shippedOrder($conn, $buyer_id, $seller_id, $product_id, $trans_id){
        $toSql = "UPDATE transactions SET status = 'Shipped' WHERE buyer_id = '$buyer_id' AND seller_id = '$seller_id' AND product_id = '$product_id' AND trans_id = '$trans_id'";
        $result = mysqli_query($conn, $toSql); 
        return $result;
        
    }

    function deliveredOrder($conn, $buyer_id, $seller_id, $product_id, $trans_id){
        $toSql = "UPDATE transactions SET status = 'Delivered' WHERE buyer_id = '$buyer_id' AND seller_id = '$seller_id' AND product_id = '$product_id' AND trans_id = '$trans_id'";
        $result = mysqli_query($conn, $toSql);
        return $result;
    }

    function deleteTransaction($conn, $buyer_id, $product_id){
        $toSql = "DELETE from transactions WHERE buyer_id = '$buyer_id' AND product_id = '$product_id'";
        $result = mysqli_query($conn, $toSql);
        return $result;
    }