<?php
    function addToCart($conn, $id, $buyer_id){
        $toSql = "SELECT * from cart WHERE product_id = '$id' and buyer_id = '$buyer_id'";

        $result = mysqli_query($conn, $toSql);

        if($result && mysqli_num_rows($result) > 0){
            $fetch = mysqli_fetch_assoc($result);
            $addAmount = $fetch['amount'] + 1;
            $toSql = "UPDATE cart SET amount = '$addAmount' WHERE product_id = '$fetch[product_id]' AND buyer_id = '$buyer_id'";
            mysqli_query($conn, $toSql);
            return "SUCESS";
        }
        else{
            $toSQL = "SELECT * FROM product WHERE product_id = '$id'";
            $result = mysqli_query($conn, $toSQL);
            $result = mysqli_fetch_assoc($result);
            $seller_id = $result['seller_id'];
            $toSQL = "INSERT INTO cart (product_id, buyer_id, seller_id, amount) VALUES ('$id', '$buyer_id', '$seller_id', '1')";
            $result = mysqli_query($conn, $toSQL);
            return "SUCCESS";
        }
    }

    function decreaseCart($conn, $id, $buyer_id){
        $toSql = "SELECT * from cart WHERE product_id = '$id' and buyer_id = '$buyer_id'";
        $result = mysqli_query($conn, $toSql);
        $fetch = mysqli_fetch_assoc($result);
        $decreaseAmount = $fetch['amount'] - 1;

        if($fetch['amount'] > 0){
            $toSql = "UPDATE cart SET amount = '$decreaseAmount' WHERE product_id = '$id' AND buyer_id = '$buyer_id'";
            mysqli_query($conn, $toSql);
        }
        else{
            $toSql = "DELETE FROM cart WHERE product_id = '$id' AND buyer_id = '$buyer_id'";
            mysqli_query($conn, $toSql);
        }
    }

    function removeCart($conn, $id, $buyer_id){
        $toSql = "DELETE FROM cart WHERE product_id = '$id' AND buyer_id = '$buyer_id'";
        mysqli_query($conn, $toSql);
    }

?>