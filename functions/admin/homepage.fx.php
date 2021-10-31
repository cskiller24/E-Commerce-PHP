<?php
    function getListofBuyers($conn){
        $params = "SELECT * FROM buyers";
        $query = mysqli_query($conn, $params);
        if($query && mysqli_num_rows($query) > 0){
            $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
            return $result; 
            exit();
        }
        else{
            return false;
            exit();
        }
    }

    function getListofSellers($conn){
        $params = "SELECT * FROM sellers";
        $query = mysqli_query($conn, $params);
        if($query && mysqli_num_rows($query) > 0){
            $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
            return $result; 
            exit();
        }
        else{
            return false;
            exit();
        }
    }

    function getAdminPassword($conn){
        $params = "SELECT admin_password FROM admin";
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




