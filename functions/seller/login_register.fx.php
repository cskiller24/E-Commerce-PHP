<?php
    //**LOGIN */
    function login($conn, $email, $password){ //return re-direct to homepage or return false
        $params = "SELECT * FROM sellers WHERE seller_email = '$email'";
        $query = mysqli_query($conn, $params);
        $result = mysqli_fetch_assoc($query);
        
        $dataPassword = $result['seller_password'];
        $verify = password_verify($password, $dataPassword);
        if($verify == true){
            session_start();
            $_SESSION['seller_id'] = $result['seller_id'];
            $_SESSION['seller_name'] = $result['seller_name'];
            header("Location: ../../view/seller/homepage.php");
            exit();
        }
        else{
            return false;
            exit();
        }
    }

    //**REGISTER */
    function register($conn, $name, $email, $contact_number, $password){ //return true or false
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $id = uniqid();
        $params = "INSERT INTO sellers (seller_id, seller_email, seller_contactNumber, seller_name, seller_password) VALUES ('$id','$email','$contact_number','$name','$hashedPassword')";
        $query = mysqli_query($conn, $params);
        return $query;
        exit();
    }

    function checkEmail($conn, $email){ //return true if there's an email, false if not
        $params = "SELECT seller_email FROM sellers WHERE seller_email = '$email'";
        $query = mysqli_query($conn, $params);
        if($query && mysqli_num_rows($query) > 0) return true;
        else return false;
        exit();
    }