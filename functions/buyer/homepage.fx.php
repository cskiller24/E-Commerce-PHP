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