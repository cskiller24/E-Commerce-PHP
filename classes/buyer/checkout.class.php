<?php
     $buyer_id = $_SESSION['buyer_id'];

    include("../../dbconnection.php");
    include("../../functions/buyer/checkout.fx.php");

    $transaction_result = getTransactionList($conn, $buyer_id);
    $result_array_count = count($transaction_result);
    if($transaction_result){
        for($i = 0; $i < $result_array_count; $i++){
            $product_result = getProductDetails($conn, $transaction_result[$i]['product_id']);
            $transaction_result[$i]['product_name'] = $product_result['product_name'];
            $transaction_result[$i]['product_price'] = $product_result['price'];
            $buyer_details = getBuyerDetails($conn, $transaction_result[$i]['buyer_id']);
            $transaction_result[$i]['contact_number'] = $buyer_details['buyer_contactNumber'];
        }
    }
    $_SESSION['transact'] = $transaction_result;

    