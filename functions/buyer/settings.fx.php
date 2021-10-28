<?php
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

    function changeBuyerDetails($conn, $buyer_id, $buyer_email, $buyer_contactNumber){
        $params = "UPDATE buyers SET buyer_email = '$buyer_email', buyer_contactNumber = '$buyer_contactNumber' WHERE buyer_id = '$buyer_id'";
        $query = mysqli_query($conn, $params);
        return $query;
        exit();
    }

    function changeBuyerPassword($conn, $buyer_id, $password){
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $params = "UPDATE buyers SET buyer_password = '$hashed_password' WHERE buyer_id = '$buyer_id'";
        $query = mysqli_query($conn, $params);
        return $query;
        exit();
    }