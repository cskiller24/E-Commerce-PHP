<?php

    function addToCart($conn, $id, $buyer_id){
        $toSQL = "SELECT * from cart WHERE product_id = '$id' and buyer_id = '$buyer_id'";

        $result = mysqli_query($conn, $toSQL);

        if($result && mysqli_num_rows($result) > 0){
            $fetch = mysqli_fetch_assoc($result);
            $addAmount = $fetch['amount'] + 1;
            $toSQL = "UPDATE cart SET amount = '$addAmount' WHERE product_id = '$fetch[product_id]' AND buyer_id = '$buyer_id'";
            mysqli_query($conn, $toSQL);
            return "SUCCESS";
        }
        else{
            $toSQL = "INSERT INTO cart (product_id, buyer_id, amount) VALUES ('$id', '$buyer_id', '1')";
            $result = mysqli_query($conn, $toSQL);
            return "SUCCESS";
        }
    }

?>