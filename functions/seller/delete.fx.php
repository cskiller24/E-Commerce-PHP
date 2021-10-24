<?php
    function deleteProduct($conn, $product_id, $seller_id, $password, $image){
        $params = "SELECT seller_password FROM sellers WHERE seller_id = '$seller_id'";
        $query = mysqli_query($conn, $params);
        if($query && mysqli_num_rows($query) > 0){
            $result = mysqli_fetch_assoc($query);
            $verify = password_verify($password, $result['seller_password']);
            if($verify){
                $params = "DELETE FROM product WHERE product_id = '$product_id'";
                $query = mysqli_query($conn, $params);
                if($query){
                    $path = "../../view/seller/".$image;
                    unlink($path);
                    return "success"; exit(); //return sucess
                }
            }
            else return "password"; exit(); //Return if password is wrong
        }
        else return "seller"; exit();//Return seller string;
    }