<?php
    function login($conn, $username, $password){
        $params = "SELECT * FROM admin WHERE admin_user = '$username'";
        $query = mysqli_query($conn, $params);
        if($query && mysqli_num_rows($query) > 0){
            $result = mysqli_fetch_assoc($query);
            $verify = password_verify($password, $result['admin_password']);
            if($verify == true){
                session_start();
                $_SESSION['admin_id'] = $result['id'];
                header("Location: ../../view/admin/homepage.php");
                exit();
            }
            else return false;
        }
        else return false;
    }