<?php 
    $buyer_id = $_SESSION['buyer_id'];
    include("../../dbconnection.php");
    include("../../functions/buyer/transactions.fx.php");

    $result = getUserTransactions($conn, $buyer_id);
    $result_count = count($result);
    if($result){
        for($i = 0; $i < $result_count; $i++){
            $seller = getSellerDetails($conn, $result[$i]['seller_id']);
            $product = getProductDetails($conn, $result[$i]['product_id']);
            if($seller == false){
                $result[$i]['seller_name'] = "Deleted";
            }
            else{
                $result[$i]['seller_name'] = $seller['seller_name'];
            }
            if($product == false){
                $result[$i]['product_name'] = "Deleted";
            }
            else{
                $result[$i]['product_name'] = $product['product_name'];
            }
        }
    }

    