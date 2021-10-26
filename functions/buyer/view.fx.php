<?php 
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