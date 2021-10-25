<?php
    function getSellerDetails($conn, $seller_id){
        $params = "SELECT * FROM sellers WHERE seller_id = '$seller_id'";
        $query = mysqli_query($conn, $params);
        if($query && mysqli_num_rows($query) > 0){
            $result = mysqli_fetch_assoc($query);
            return $result; //return an array
            var_dump($result);
        }  
        else{
            return false; // return false if theres no seller found
        }
    }

    function changeSellerDetails($conn, $seller_id, $email, $contact_number, $password, $current_password){
        $verify = password_verify($password, $current_password);
            if($verify == true){
                $params = "UPDATE sellers SET seller_email = '$email', seller_contactNumber = '$contact_number' WHERE seller_id = '$seller_id'";
                $query = mysqli_query($conn, $params);
                if($query){
                    return "true";
                }
                else return "false"; // returns boolean true or false
            }
            else{
                return "password"; //return if wrong password
            }
    }

    function changeSellerPassword($conn, $seller_id, $current_password, $hashed_password, $new_password){
        $verify = password_verify($current_password, $hashed_password);
        if($verify){
            $new_hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
            $params = "UPDATE sellers SET seller_password = '$new_hashed_password' WHERE seller_id = '$seller_id'";
            $query = mysqli_query($conn, $params);
            return $query;
            exit();
        }
        else{
            return "current_password";
            exit();
        }
    }