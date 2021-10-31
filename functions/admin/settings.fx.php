<?php
    function changeAdminPassword($conn, $password){
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $params = "UPDATE admin SET admin_password = '$hashed_password'";
        $query = mysqli_query($conn, $params);
        return $query;
        exit();
    }