<?php
    function getAllCartList($conn, $buyer_id){
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

    function addCart($conn, $product_id, $buyer_id, $seller_id, $amount){
        $added_amount = $amount + 1;
        $params = "UPDATE cart SET amount = '$added_amount' WHERE product_id = '$product_id' AND buyer_id = '$buyer_id' AND seller_id = '$seller_id'";
        $query = mysqli_query($conn, $params);
        return $query;
        exit();
    }

    function decreaseCart($conn, $product_id, $buyer_id, $seller_id, $amount){
        $decreased_amount = $amount - 1;
        if($decreased_amount > 0){
            $params = "UPDATE cart SET amount = '$decreased_amount' WHERE product_id = '$product_id' AND buyer_id = '$buyer_id' AND seller_id = '$seller_id'";
            $query = mysqli_query($conn, $params);
            return $query;
            exit();
        }
        if($decreased_amount <= 0){
            $params = "DELETE FROM cart WHERE product_id = '$product_id' AND buyer_id = '$buyer_id' AND seller_id = '$seller_id'";
            $query = mysqli_query($conn, $params);
            return $query;
            exit();
        }
    }

    function removeCart($conn, $product_id, $buyer_id, $seller_id){
        $params = "DELETE FROM cart WHERE product_id = '$product_id' AND buyer_id = '$buyer_id' AND seller_id = '$seller_id'";
        $query = mysqli_query($conn, $params);
        return $query;
        exit();
    }