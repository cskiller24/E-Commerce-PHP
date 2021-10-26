<?php
    function getAllProducts($conn){
        $params = "SELECT * FROM product";
        $query = mysqli_query($conn, $params);
        if($query && mysqli_num_rows($query) > 0){
            $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
            return $result; // returns array
        }
        else return false; // returns false if there's no product
        
        exit();
    }
    
    function getProductsPerPage($conn, $page, $results_per_page){
        $number_of_products = getListOfProducts($conn);
        if($number_of_products > 0){
            $product_per_page = ($page-1) * $results_per_page;
            $params = "SELECT * FROM product LIMIT ".$product_per_page.",".$results_per_page;
            $query = mysqli_query($conn, $params);     
            if($query && mysqli_num_rows($query)>0){
                $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
                return $result; //returns array
            }                                                                
            else{
                return false; // return false if no data found
            }
        }   
        else return false; //if no data found
        
        exit();
    }
    
    function getListOfProducts($conn){
        $params = "SELECT * FROM product";
        $query = mysqli_query($conn, $params);
        if($query && mysqli_num_rows($query) > 0){
            $result = mysqli_num_rows($query);
            return $result; // returns int
        }
        else return false;// returns false if there's no product
        
        exit();
    }

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