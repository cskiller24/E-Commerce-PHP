<?php
    //**LOGIN */
    function login($conn, $email, $password){
        $params = "SELECT * FROM buyers WHERE buyer_email = '$email'";
        $query = mysqli_query($conn, $params);
        $result = mysqli_fetch_assoc($query);
        
        $dataPassword = $result['buyer_password'];
        $verify = password_verify($password, $dataPassword);
        if($verify == true){
            session_start();
            $_SESSION['buyer_id'] = $result['buyer_id'];
            $_SESSION['buyer_name'] = $result['buyer_name'];
            header("Location: ../../view/buyer/homepage.php");
            exit();
        }
        else{
            return false;
            exit();
        }
    }

    //**REGISTER */
    function register($conn, $name, $email, $contact_number, $password){
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $id = uniqid();
        $params = "INSERT INTO buyers (buyer_id, buyer_email, buyer_contactNumber, buyer_name, buyer_password) VALUES ('$id','$email','$contact_number','$name','$hashedPassword')";
        $query = mysqli_query($conn, $params);
        return $query;
        exit();
    }

    function checkEmail($conn, $email){
        $params = "SELECT buyer_email FROM buyers WHERE buyer_email = '$email'";
        $query = mysqli_query($conn, $params);
        if($query && mysqli_num_rows($query) > 0) return true;
        else return false;
        exit();
    }