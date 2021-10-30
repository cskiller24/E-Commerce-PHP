<?php
    include("../../dbconnection.php");
    include("../../functions/seller/transactions.fx.php");

    $seller_id = $_SESSION['seller_id'];
    
    $result = getTransactionsList($conn, $seller_id);
    $result_count = count($result);

    for($i = 0; $i < $result_count; $i++){
        $buyer_result = getBuyerDetails($conn, $result[$i]['buyer_id']);
        $product_result = getProductDetails($conn, $result[$i]['product_id']);
        if($buyer_result == false){
            $result[$i]['buyer_name'] = $buyer_result['buyer_name'];
        }
        else{
            $result[$i]['buyer_name'] = $buyer_result['buyer_name'];
        }
        if($product_result == false){
            $result[$i]['product_name'] = $product_result['product_name']; 
        }
        else{

            $result[$i]['product_name'] = $product_result['product_name']; 
        }
    }
