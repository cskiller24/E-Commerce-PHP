<?php

    function getProductSeller($conn, $seller_id){
        $params = "SELECT * FROM product WHERE seller_id = '$seller_id'";
        $query = mysqli_query($conn, $params);
        if($query && mysqli_num_rows($query) > 0){
            $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
            return $result;
        }
        else{
            return false;
        }
        exit();
    }

    