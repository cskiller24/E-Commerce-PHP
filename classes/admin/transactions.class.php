<?php
    include("../../dbconnection.php");
    include("../../functions/admin/transactions.fx.php");

    $result = getAllTransactions($conn);

    if($result){
        $result_count = count($result);
        for($i = 0; $i < $result_count; $i++){
            $buyer_name = getBuyerDetails($conn, $result[$i]['buyer_id']);
            $seller_name = getSellerDetails($conn, $result[$i]['seller_id']);
            $product_name = getProductDetails($conn, $result[$i]['product_id']);
            if($buyer_name){
                $result[$i]['buyer_name'] = $buyer_name['buyer_name'];
            }
            else{
                $result[$i]['buyer_name'] = "Buyer Deleted";
            }
            if($seller_name){
                $result[$i]['seller_name'] = $seller_name['seller_name'];
            }
            else{
                $result[$i]['seller_name'] = "Seller Deleted";
            }
            if($product_name){
                $result[$i]['product_name'] = $product_name['product_name'];
            }
            else{
                $result[$i]['product_name'] = "Product Deleted";
            }
        }
    }
    