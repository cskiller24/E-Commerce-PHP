<?php
    if(isset($_GET['action']) && isset($_GET['pid']) && isset($_GET['sid']) && isset($_GET['bid'])){
        $seller_id = $_GET['sid'];
        $buyer_id = $_GET['bid'];
        $product_id = $_GET['pid'];
        $action = $_GET['action'];

        include("../../dbconnection.php");
        include("../../functions/seller/transactions.fx.php");

        //**PACK THE ITEMS */
        if($action === "pack"){
            $result = transactionPackItem($conn, $seller_id, $product_id, $buyer_id);
            if($result){
                header("Location: ../../view/seller/transaction.php?success");
                exit();
            }
            else{
                header("Location: ../../view/seller/transaction.php?failed");
                exit();
            }
        }
        else{
            header("Location: ../../view/seller/transaction.php");
            exit();
        }
    }
    else{
        header("Location: ../../view/seller/transaction.php");
        exit();
    }