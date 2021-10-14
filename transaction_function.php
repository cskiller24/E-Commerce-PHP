<?php
    function getAllTransactions($conn){
        $toSql = "SELECT * FROM transactions";
        $result = mysqli_query($conn, $toSql);
        if($result && mysqli_num_rows($result) > 0){
            $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
            return $result;
        }
        else return false;
    }

    function getTransactionsBuyer($conn, $id){
        $toSql = "SELECT * FROM transactions WHERE buyer_id = '$id'";
        $result = mysqli_query($conn, $toSql);
        if($result && mysqli_num_rows($result) > 0){
            $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
            return $result;
        }
        else return false;
    }

    function getTransactionsSeller($conn, $id){
        $toSql = "SELECT * FROM transactions WHERE seller_id = '$id'";
        $result = mysqli_query($conn, $toSql);
        if($result && mysqli_num_rows($result) > 0){
            $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
            return $result;
        }
        else return false;
    }